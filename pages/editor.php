<?php 
$title = "Editor"; 
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
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-3">
			<div class="card border-dark bg-danger">
			  <div class="card-header text-white bg-dark text-center">
				Choose Team
			  </div>
			  <div class="card-body p-1 py-5">
				<div class="form-group col-12 py-2">
					<select class="form-control" id="SelectMenu">
					  <option>Team 1</option>
					  <option>Team 2</option>
					  <option>Team 3</option>
					  <option>Team 4</option>
					  <option>Team 5</option>
					</select>
				 </div>
				 <div class="form-group col-12 py-2">
					<input class="form-control py-2" placeholder="Ratio" />
				 </div>
				 <div class="d-flex justify-content-center align-items-center">
					<button class="btn btn-dark px-3 m-1 small">GENERATE&nbsp;ID</button>
				</div>
			  </div>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="card bg-light">
			  <div class="card-header text-white bg-dark text-center">
				Editor Page
			  </div>
			  <img src="<?php echo $site_url; ?>/images/editor.jpg" class="w-100">
			  <button class="btn btn-dark px-3 m-1 small">MY&nbsp;PAGE</button>
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
</script>