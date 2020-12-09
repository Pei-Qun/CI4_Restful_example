<html>

<head>
	<meta charset="utf-8">
	<title>登入程式</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
	<form id="form">
		帳號: <input type="text" name="account">
		<br><br>
		密碼: <input type="password" name="password">
		<br><br>
		<div class="g-recaptcha" data-sitekey="<?= env("DATA_STIEKEY") ?>"></div>
		<a href="/register">註冊</a>
		<input type="submit" value="登入">
		<br>
	</form>
	<h5 style="color: red" id="errorText"></h5>
	<script>
		$(document).ready(function() {
			$("#form").submit(function(event) {
				//阻止自動提交
				event.preventDefault();
				var account = $("input[name='account']").val();
				var password = $("input[name='password']").val();
				if (account == "") {
					$('#errorText').html('帳號不可為空');
					return;
				} else if (password == "") {
					$('#errorText').html('密碼不可為空');
					return;
				}
				doLogin();
			});
		});

		function doLogin() {
			$.ajax({
				url: "<?= base_url("login/dologin") ?>",
				type: 'POST',
				dataType: 'json',
				data: $("#form").serialize()
			})
			.done(function() {
				window.location.reload();
			})
			.fail(function(e) {
				try { 	
					$('#errorText').html(e.responseJSON.messages.error);
				} catch (error) {
					$('#errorText').html("伺服器處理連線失敗請重新再試");
				}
			});
		}
	</script>
</body>

</html>