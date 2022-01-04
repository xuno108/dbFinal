<?php
session_start();
?>

<!DOCTYPE HTML>

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
				<header>
					<h1>電影搜查棧</h1>
					<p>在寒冷的冬天，是不是都想窩在被窩不想出來呢？這邊推薦好看的電影，讓你冬天不出門不起床也能充實你的每一天！</p>
				</header>
				<section class="tiles">
					<article class="style1">
						<span class="image">
							<img src="image/pic01.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=科幻'">
							<h2>科幻</h2>
							<div class="content">
								<p>一系列奇幻及魔法的世界帶給你不同的視覺享受</p>
							</div>
						</a>
					</article>
					<article class="style2">
						<span class="image">
							<img src="image/pic02.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=犯罪'">
							<h2>犯罪</h2>
							<div class="content">
								<p>刺激又鬼才的犯罪手法，看完讓你心裡的犯罪細胞都甦醒</p>
							</div>
						</a>
					</article>
					<article class="style3">
						<span class="image">
							<img src="image/pic03.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=愛情'">
							<h2>愛情</h2>
							<div class="content">
								<p>必修的大學學分，酸甜苦辣的人生課題，愛恨情仇你懂多少</p>
							</div>
						</a>
					</article>
					<article class="style4">
						<span class="image">
							<img src="image/pic04.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=懸疑'">
							<h2>懸疑</h2>
							<div class="content">
								<p>燒腦的劇情充滿了許多疑點，層層堆疊的劇情讓你猜不透</p>
							</div>
						</a>
					</article>
					<article class="style5">
						<span class="image">
							<img src="image/pic05.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=冒險'">
							<h2>冒險</h2>
							<div class="content">
								<p>探險尋寶從來都不是問題，是什麼樣未知的旅程等著他們呢</p>
							</div>
						</a>
					</article>
					<article class="style6">
						<span class="image">
							<img src="image/pic06.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=動作'">
							<h2>動作</h2>
							<div class="content">
								<p>打鬥追逐充滿刺激的電影，看完都渾身熱血沸騰ㄌ</p>
							</div>
						</a>
					</article>
					<article class="style2">
						<span class="image">
							<img src="image/pic07.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=喜劇'">
							<h2>喜劇</h2>
							<div class="content">
								<p>搞笑及幽默十足的電影，逗得你心癢癢，趕走你一天ㄉ壞心情</p>
							</div>
						</a>
					</article>
					<article class="style3">
						<span class="image">
							<img src="image/pic08.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=溫馨家庭'">
							<h2>溫馨家庭</h2>
							<div class="content">
								<p>闔家觀賞ㄉ家庭電影，滿滿的溫暖透過電影穿透你的心</p>
							</div>
						</a>
					</article>
					<article class="style1">
						<span class="image">
							<img src="image/pic09.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=驚悚'">
							<h2>驚悚</h2>
							<div class="content">
								<p>視覺與影像ㄉ雙重感官衝擊，興奮與緊張感充斥著你/妳每</p>
							</div>
						</a>
					</article>
					<article class="style5">
						<span class="image">
							<img src="image/pic10.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=劇情'">
							<h2>劇情</h2>
							<div class="content">
								<p>透過導演的細膩編排，故事的起承轉合，每個小細節從來不馬虎</p>
							</div>
						</a>
					</article>
					<article class="style6">
						<span class="image">
							<img src="image/pic11.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=動畫'">
							<h2>動畫</h2>
							<div class="content">
								<p>二次元動畫的吸引力，不論是男孩還是女孩都沒有人敵得過</p>
							</div>
						</a>
					</article>
					<article class="style4">
						<span class="image">
							<img src="image/pic12.jpg" alt="" />
						</span>
						<a formmethod="get" onclick="location.href='search.php?keyword=間諜'">
							<h2>間諜</h2>
							<div class="content">
								<p>令人興奮逃避現實的反派角色，究竟是敵是友你分辨的出來嗎</p>
							</div>
						</a>
					</article>
				</section>
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