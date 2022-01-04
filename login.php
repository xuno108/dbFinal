<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<style type="text/css">

	</style>

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

		<?php
		$con = new mysqli("localhost", "root", "Tl51189@", "moviedb");
		$sql = "SELECT * FROM account";
		if ($con->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $con->query($sql);
		$msg = '';
		if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {

			$username = $_POST['username'];
			$password = $_POST['password'];

			while ($row = $result->fetch_assoc()) { // 一直撈
				if ($username == $row["username"] && $password == $row["password"]) {

					$_SESSION['login'] = true;
					$_SESSION['uId'] = $row['uId'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['uName'] = $row['uName'];
					$_SESSION['uPhone'] = $row['uPhone'];
					$_SESSION['uEmail'] = $row['uEmail'];
				}
			}
			if (@$_SESSION['login'])
				header("Location: index.php");
			$msg = "Wrong account or password";
		}
		$con->close();
		?>

		<div class="BOX">
			<div class="container form-signin">

			</div> <!-- /container -->

		</div>

		<div class="container">
			<form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
															?>" method="post">
				<h1>登入</h1>
				<h4 class="form-signin-heading"><?php echo $msg; ?></h4>
				<div align="center">
					<input type="text" class="form-control" name="username" style="width:30%;height:40px;">
				</div></br>
				<div align="center">
					<input type="password" class="form-control" name="password" style="width:30%;height:40px;">
				</div>
				<!-- btn btn-lg btn-primary btn-block -->
				<br>

				<div align="center"><button class="btn btn-primary" type="submit" name="login" style="width:30%;height:60px;">Login</button></div><br>
				<div align="center"><input type="button" class="btn btn-lg btn-info btn-block" onclick="javascript:location.href='register.php'" value="Register" style="width:30%;height:60px;"></input></div>
			</form>
		</div>

</body>






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
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>

</html>