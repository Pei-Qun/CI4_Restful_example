<html>
	<head>
		<meta charset="utf-8">
		<title>會員畫面</title>
		<script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
	</head>
	<body>
		<h1>嗨，<?=$name?></h1>
		<a href="<?=base_url("login/doLogout")?>">登出</a>
	</body>
</html>
