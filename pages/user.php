<?php 
$title = "User"; 
$description = $site_name." | Bet Sitesi"; 
include('header.php'); 
$loginuser = "1"; //Giriş Yapmış Kullanıcı
$sporttype = "1"; //Spor tipi 1 = futbol
$postssql = "SELECT * FROM post WHERE post_type='1'";
$postsquery = mysqli_query($vtbaglan, $postssql);
$posts = array();
while($postsrow = mysqli_fetch_assoc($postsquery))
{
	$posts[] = $postsrow;
}
	
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
.likeactive{
	color:green!important;
}
.dislikeactive{
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
				<div class="btn btn-lg btn-dark btn-block">Submit</div>
				<p class="my-1">Survey: Which team will win the match ?</p>
				<div class="d-flex justify-content-center"><button class="btn btn-dark m-1">Team1</button><button class="btn btn-dark m-1">Team2</button></div>
			  </div>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="card bg-light">
			  <div class="card-header text-white bg-dark text-center">
				EDITORS
			  </div>
			  <div class="card-body">
				<form class="w-100">
				<div class="input-group d-flex justify-content-center">
				  <input style="width:90%" type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search Editor">
				  <div style="width:10%" class="input-group-append">
					<span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
				  </div>
				</div>
					<div id="livesearch" class="bg-white" style="width:100%"></div>
				</form>
				<div class="d-flex my-2 border rounded bg-white p-2">
					<textarea placeholder="Your Post Text Here" id="newpostarea" class="w-100 m-1"></textarea>
					<button class="btn btn-dark btn-lg m-1" onclick="submitnewpost()">POST</button>
				</div>
				<div class="w-100 card-header bg-dark text-white text-center">DAILY&nbsp;POSTS</div>

				<?php foreach ($posts as $post){  
				$namesql = "SELECT * FROM user WHERE id=".$post['user_id']."";
				$namequery = mysqli_query($vtbaglan, $namesql);
				$namerow = mysqli_fetch_array($namequery);
				
				$commentssql = "SELECT * FROM comment WHERE post_id='".$post['id']."'";
				$commentsquery = mysqli_query($vtbaglan, $commentssql);
				$comments = array();
				while($row = mysqli_fetch_assoc($commentsquery))
				{
					$comments[] = $row;
					}
					?>
					<div class="bg-white d-flex p-2 card-body border border-dark">
						<div class="col-9" id="commentcard">
							<p><u><?php echo $namerow['username']; ?></u></p>
							<p class="mb-0"><?php echo $post['content']; ?></p>
							<?php foreach ($comments as $comment){  
								$commentname = "SELECT * FROM user WHERE id=".$comment['user_id']."";
								$commentnamequery = mysqli_query($vtbaglan, $commentname);
								$commentnamerow = mysqli_fetch_array($commentnamequery);
							?>
						<div class="border border-dark rounded-lg px-2" id="comments">
							<p class="mb-0"><a href="#"><?php echo $commentnamerow['username']; ?></a></p>
							<p>Manchester is gonna win!</p>
						</div>
						<?php } ?>
					</div>
					<div class="col-3 d-inline-flex align-items-center justify-content-center">
						<i class="far fa-thumbs-up h2 text-dark likebutton" id="likebutton1" onclick="buttonlike(1)"></i>
						<i class="far fa-thumbs-down h2 text-dark dislikebutton" id="dislikebutton1" onclick="buttondislike(1)"></i>
					</div>
				</div>
				<?php } ?>
				
				<div class="btn btn-dark btn-block mt-3">COMMUNITIES</div>
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
function submitnewpost(){
	jQuery.ajax({
		url: "<?php echo $site_url;?>/pages/newpost.php",
		data:{
			content: $("#newpostarea").val(),
			post_type: 1,
			userid: "<?php echo $loginuser; ?>"
			},
		type: "POST",
		success:function(data){
			if(data=="ok"){
				window.location = '<?php echo $site_url; ?>/user';
			}
		}
	});
}
function buttonlike(value) {
	$('#likebutton'+value).addClass('likeactive');
	$('#dislikebutton'+value).removeClass('dislikeactive');
}
function buttondislike(value) {
	$('#likebutton'+value).removeClass('likeactive');
	$('#dislikebutton'+value).addClass('dislikeactive');
}
</script>