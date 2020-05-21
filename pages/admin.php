<?php 
$title = "Admin"; 
$description = $site_name." | Bet Sitesi"; 
include('header.php'); 

$sporttype = "1"; //Spor tipi 1 = futbol
$betssql = "SELECT * FROM bet WHERE sport_type='".$sporttype."'";
$betsquery = mysqli_query($vtbaglan, $betssql);
$bets = array();
while($betsrow = mysqli_fetch_assoc($betsquery))
{
	$bets[] = $betsrow;
}

?>
<style>
.likebutton:hover{
	color:green!important;
}
.dislikebutton:hover{
	color:red!important;
}
</style>
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-3">
			<div class="card border-dark">
			  <div class="card-header text-white bg-dark text-center">
				JOIN LOTTERY
			  </div>
			  <div class="card-body">
				<div class="p-1 p-md-2"><img class="w-100" src="<?php echo $site_url; ?>/images/megaloto.jpg"></div>
				<div class="btn btn-lg btn-dark btn-block">Add Loto</div>
			  </div>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="card bg-light">
			  <div class="card-header text-white bg-dark text-center">
				Admin Page
			  </div>
			  <div class="card-body">
				<div class="w-100 card-header bg-dark text-white text-center">DAILY&nbsp;POSTS</div>
				<div class="bg-white d-flex p-2 card-body border border-dark">
					<div class="col-9" id="commentcard">
						<p><u>FRIEND 1 SHARED THIS</u></p>
						<p class="mb-0"><b>Real Madrid- Machester United</b></p>
						<p class="mb-2">This match is crazy!!</p>
						
						<div class="border border-dark rounded-lg px-2" id="comments">
							<p class="mb-0"><a href="#">USER</a></p>
							<p>Manchester is gonna win!</p>
						</div>
					</div>
					<div class="col-3 d-inline-flex align-items-center justify-content-center">
						<i class="far fa-thumbs-up h2 text-dark likebutton"></i>
						<i class="far fa-thumbs-down h2 text-dark dislikebutton"></i>
					</div>
				</div>
				<div class="btn btn-dark btn-block mt-3" onclick="createnewbet()">Create Bet</div>
			  </div>
			</div>
		</div>
		<div class="col-lg-4">
				<div class="card">
				  <div class="card-header text-white bg-dark text-center">
					CURRENT BETS
				  </div>
				  <div class="card-body">
					<table id="betTable" class="display table-responsive" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>League</th>
							<th>BetID</th>
							<th>MBN</th>
							<th>Team1</th>
							<th>Team2</th>
						</tr>
					</thead>
			 
					<tbody>
					<?php foreach ($bets as $bet){ ?>
						<tr>
							<td><?php echo $bet['league']; ?></td>
							<td><?php echo $bet['id']; ?></td>
							<td><?php echo $bet['mbn']; ?></td>
							<td><?php echo str_replace(" ","&nbsp;",$bet['team1']); ?></td>
							<td><?php echo str_replace(" ","&nbsp;",$bet['team2']); ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
<script>
$('#betTable').DataTable( {
    responsive: true,
	searching:false,
	paging:false,
	info:false
} );
</script>
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","pages/geteditor.php?q="+str,true);
  xmlhttp.send();
}

function createnewbet(){
	swal({
	html: 
	'<div class="row">'+
	'<input class="form-control col-12 my-2" placeholder="League" id="league">'+
	'<input class="form-control col-12 my-2" placeholder="MBN" id="MBN">'+
	'<input class="form-control col-12 my-2" placeholder="Team1" id="Team1">'+
	'<input class="form-control col-12 my-2" placeholder="Team2" id="Team2">'+
	'</div>',
	showCancelButton: true,
	cancelButtonText: 'Vazgeç',
	confirmButtonColor: '#343A40',
	confirmButtonText: 'Tamam',
}).then((result) => {
	var league = $("#league");
	var mbn = $("#MBN");
	var team1 = $("#Team1");
	var team2 = $("#Team2");
	if (result.value) {
		jQuery.ajax({
			url: "<?php echo $site_url; ?>/pages/createnewbet.php",
			data:{
			league: league.val(),
			mbn: mbn.val(),
			team1: team1.val(),
			team2: team2.val(),
			sport_type: "<?php echo $sporttype;?>"
			},
			type: "POST",
			success:function(data){
				if(data=="ok"){
					swal({
						title: "Başarılı",
						text: "Bet Başarıyla Eklendi.",
						type: "success",
						showCancelButton: false,
						confirmButtonColor: '#343A40',
						confirmButtonText: 'Tamam',
					})
					.then((result) => {
							window.location = '<?php echo $site_url; ?>/admin';
					})
				}
			}
		});
		}
	})
}
</script>