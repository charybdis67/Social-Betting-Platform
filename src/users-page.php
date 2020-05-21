<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/user.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="left">
		
        <img src="image/User-profile-webpage-account-interface-512.png"
             alt="user" width="200">
		<h3>MY PERSONAL PAGE</h3>	 
        <h4>@username</h4>
        <p>I'm a huge fan of Manchester United FC!</p>
        <div class="social_media">
            <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul><br>
			
			<button onclick="window.location.href = 'https://facebook.com';">FACEBOOK</button>
			<button onclick="window.location.href = 'https://twitter.com';">TWITTER</button>
			<button onclick="window.location.href = 'https://instagram.com';">INSTAGRAM</button>
		
		</div>
		<br><br>
		<!--<form method="post"> 
        <input type="submit" name="posts-comments-button"
                class="button" value="SEE POSTS & COMMENTS" />-->
		<?php
			/*if(array_key_exists('posts-comments-button', $_POST)) { 
				echo '<script language="javascript">';
				echo 'alert("POSTS")';
				echo '</script>';				
			}*/  
		?>
		<br>
		<button onclick="postsFunction()">POSTS</button>
		<button onclick="commentsFunction()">COMMENTS</button>
		<!--<p id="posts"></p>
		<p id="comments"></p>-->
		<script>
		function postsFunction() {
		  document.getElementById("posts").innerHTML = alert("Posts are shown here.");
		}
		
		function commentsFunction() {
		  document.getElementById("comments").innerHTML = alert("Comments are shown here.");
		}
		</script>
		
          
    </form>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                <div class="data">
                    <h4>Email</h4>
                    <p>user@gmail.com</p>
                </div>
                <div class="data">
                    <h4>Phone</h4>
                    <p>0(555)9871234</p>
                </div>
            </div>
        </div>

        <div class="betslips">
            <h3>BETSLIPS</h3>
            <div class="projects_data">
                <div class="data">
                    <h4>Most Viewed</h4>
                    <p>BLR<br>
						19:00
						1
						Neman Grodno
						Torpedo Belaz Zhodino
						12.50
						X2.75
						22.20
						+0
						<br>AL2
						19:30
						1
						Nürnberg
						Erzgebirge Aue
						11.75
						X2.95
						23.15
						+0
						</p>
                </div>
                <div class="data">
                    <h4>Recent</h4>
                    <p>TTK<br>
					18:10
					3
					Vorsulyak, Yaroslav
					Savenkov, Oleg
					11.40
					22.05
					+0
					<br>TTK<br>
					18:20
					3
					Laevsky, Maksim
					Alekseenko, Dmytro
					12.25
					21.30
					+0
					</p>
                </div>
            </div>
        </div>

        <div class="communities">
            <h3>COMMUNITY</h3>
            <div class="projects_data">
                <div class="data">
                    <h4>BJK</h4>
                    <p>Çarşı her şeye karşı!</p>
                </div>
            </div>
        </div>
       
		<h3>TOTAL BALANCE: 800$</h3>

    </div>
</div>

</body>
</html>
