<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<style type="text/css">
		/*.BOX {
	top: 50%;
	position:absolute;
*/
		/*
.container {
	top: 90%;
	position:absolute;
}
*/
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
					<li><a href="searchby.php?mySearch=">進階搜尋</a></li>
				<?php
				} else { ?>
					<li class="hassubs">
					<li><a href="">哈囉，<?php echo $_SESSION['uName']; ?></a></li>
					<li><a href="searchby.php?mySearch=">進階搜尋</a></li>
					<li><a href="favorite.php">收藏清單</a></li>
					<li><a href="logout.php">登出</a></li>
					</li>
				<?php
				} ?>
			</ul>
		</nav>

		<?php
		$con = new mysqli("localhost", "root", "Tl51189@", "moviedb");
		if ($con->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$rsql = "SELECT * FROM account";
		$result = $con->query($rsql);
		$msg = '';
		if (
			isset($_POST['register']) && !empty($_POST['username']) && !empty($_POST['password'])
			&& !empty($_POST['uName']) && !empty($_POST['uPhone']) && !empty($_POST['uEmail'])
		) {

			//$uId = $_POST['uId'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$uName = $_POST['uName'];
			$uPhone = $_POST['uPhone'];
			$uEmail = $_POST['uEmail'];

			$duplicate = false; // 檢查帳號是否重複
			while ($row = $result->fetch_assoc()) { // 一直撈
				if ($username == $row["username"]) {
					$duplicate = true;
				}
			}
			if (!$duplicate) {
				$wsql = "INSERT INTO account (username, password, uName, uPhone, uEmail) 
						VALUES ('$username','$password','$uName','$uPhone','$uEmail')";

				if ($con->query($wsql) === true) {

					$msg = "Hi $uName, 您已成功加入會員, 請重新登入!"; ?>
					<script language="javascript">
						alert('<?= $msg ?>');
					</script>
					<script language="javascript">
						location.href = "login.php";
					</script>
		<?php
				}
			} else
				$msg = "帳號已存在！";
		}

		$con->close();
		?>
		<div class="BOX">
			<div class="container form-signin">

			</div> <!-- /container -->

		</div>

		<div class="container" style="width:700px;margin:0px auto; top:50px; margin-bottom:200px; font-family:Microsoft JhengHei;">
			<form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
															?>" method="post">
				<h1>註冊<h1>
						<h4 class="form-signin-heading"><?php echo $msg; ?></h4>
						<input type="text" class="form-control" required="required" name="username" placeholder="username"></br>
						<input type="password" class="form-control" required="required" name="password" placeholder="password"></br>
						<input type="text" class="form-control" required="required" name="uName" placeholder="name"></br>
						<input type="text" class="form-control" required="required" name="uPhone" placeholder="phone"></br>
						<input type="email" class="form-control" required="required" name="uEmail" placeholder="email"></br>
						<button class="btn btn-lg btn-primary btn-block" type="submit" name="register">註冊</button>
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


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
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