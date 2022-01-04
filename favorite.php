<?php
session_start();
?>
<!DOCTYPE html>

<?php
if (@!$_SESSION['login']) { ?>
	<script language="javascript">
		location.href = "login.php"
	</script>
<?php
}
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
	<link href="image/icon.ico" rel="shortcut icon" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
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

		<!-- 側邊攔 -->
		<nav id="menu">
			<h2>Menu</h2>
			<ul>
				<?php
				if (@!$_SESSION['login']) { ?>
					<li><a href="login.php">登入</a></li>
					<li><a href="register.php">註冊</a></li>
				<?php
				} else { ?>
					<li class="hassubs">
					<li><a href="">哈囉，<?php echo $_SESSION['uName']; ?></a></li>
					<li><a href="favorite.php">收藏清單</a></li>
					<li><a href="logout.php">登出</a></li>
					</li>
				<?php
				} ?>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<h1>收藏清單</h1>



				<form action="favorite.php" method="post">
					<?php
					$con = new mysqli("localhost", "root", "Tl51189@", "moviedb");

					if ($con->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					$uId = $_SESSION['uId'];

					//$sqlquery = "SELECT fId, mChiName, mEngName, mDate, mDir, mInfo, mImg FROM favorite, movie, account WHERE favorite.mId=movie.mId AND favorite.uId='$uId'"
					$sqlquery = "SELECT fId, mChiName, mEngName, mDate, mDir, mInfo, mImg FROM favorite LEFT JOIN movie ON favorite.mId = movie.mId WHERE favorite.uId='$uId'";
					$result = $con->query($sqlquery);

					while ($row = mysqli_fetch_array($result)) //一直撈
					{
						echo
						"<section class='spotlights'>
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
						//echo $row['fId'];
						echo "<ul class=\"actions\">";
					?>
						<li><a class="button" type="submit" formmethod="get" onclick="location.href='delete.php?fId=<?= $row['fId'] ?>'">移除</a></li>
					<?php
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
					<h2>聯絡我們</h2>
					<form method="post" action="fbpost.php">
						<div class="fields">
							<div class="field half">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>
							<div class="field half">
								<input type="email" name="email" id="email" placeholder="Email" />
							</div>
							<div class="field">
								<textarea name="content" id="message" placeholder="Message"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" value="送出" class="primary" onclick="alert('已送出回饋！')"/></li>
						</ul>
					</form>
				</section>
				<section>
					<h2>追隨我們</h2>
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