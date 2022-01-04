<?php
session_start();
?>

<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>電影搜查棧</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="image/icon.ico" rel="shortcut icon"/>
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.php" class="logo">
								<span class="symbol"><img src="image/logo.png" alt="" /></span><span class="title">Movie</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="login.php">Log In</a></li>
							<li><a href="register.php">Register</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>溫馨家庭電影</h1>
							<h3>闔家觀賞ㄉ家庭電影，滿滿的溫暖透過電影穿透你的心</h3>
							<?php
								$con = new mysqli("localhost", "root", "Tl51189@", "moviedb");

									if ($con->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									}					

									$result = $con->query ("SELECT * FROM movie WHERE mCat Like '%溫馨家庭%' ");
								
								while($row = mysqli_fetch_array($result))
								{
									echo 
									"<section id='one' class='spotlights'>
										<section>
											
											<img src=\"" . $row['mImg'] .  "\" width=\"200\" alt=\"\" data-position=\"center center\" />
											
											<div class=\"content\">
												<div class=\"inner\">
													<header class=\"major\">
														<h2>" . $row['mChiName'] . "</h2> <h2>" . $row['mEngName'] . "</h2>
													</header>";
													echo "上映日期：" . $row['mDate'] . "<br>";
													echo "導演：" . $row['mDir'] . "<p>";
													echo "" . $row['mInfo'] . "<br>";
													echo "<ul class=\"actions\">";
														if (@$_SESSION['login'] === true)
														{
															?>
															<li><a href="generic.html" class="button" onclick="location.href='get.php?mID=<?=$row['mID']?>&mChiName=<?=$row['mChiName']?>&mEngName=<?=$row['mEngName']?>&mDate=<?=$row['mDate']?>&mDir=<?=$row['mDir']?>&mInfo=<?=$row['mInfo']?>'">My Favorite</a></li>
															<?php
														}
													echo "</ul>
												</div>
											</div>
										</section>
									</section>
									<hr>";
								}

								$con->close();
							?>			
						</div>
					</div>
					
				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Get in touch</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>
										<div class="field half">
											<input type="email" name="email" id="email" placeholder="Email" />
										</div>
										<div class="field">
											<textarea name="message" id="message" placeholder="Message"></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send" class="primary" /></li>
									</ul>
								</form>
							</section>
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="https://www.facebook.com/profile.php?id=100002860339874" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="https://www.instagram.com/xxzlq28/" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
								</ul>
							</section>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>