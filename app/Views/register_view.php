<html>
	<head>
		<meta charset="utf-8">
		<title>註冊畫面</title>
		<script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <style>
      #register label{
        display: block;
      }
    </style>
	</head>
	<body>
    <h1>註冊畫面</h1>
    <form id="register">
      <label>
        暱稱
        <input type="text" name="name" placeholder="請輸入暱稱" required>
      </label>
      <label>
        電子信箱
        <input type="email" name="email" placeholder="Email" required>
      </label>
      <label>
        帳號
        <input type="text" name="account" placeholder="請輸入帳號" required>
      </label>
      <label>
        密碼
        <input type="password" name="password" placeholder="請輸入密碼" required>
      </label>
      <label>
        密碼確認
        <input type="password" placeholder="再次輸入密碼" required>
      </label>
      <input type="submit" value="送出">
    </form>
    <script>
      $(document).ready(function() {
        $("#register").submit(function(event) {
          event.preventDefault();
          doSignup();
        });
      });

      function doSignup() {
        $.ajax({
          url: "<?= base_url("register/doSignup") ?>",
          type: 'POST',
          dataType: 'json',
          data: $("#register").serialize()
        })
        .done(function() {
          console.log('window.location.href')
          window.location.href = '/login';
        })
        .fail(function(e) {
          try {
            console.log(e.responseJSON)
            // alert(e.responseJSON.messages.error)
          } catch (error) {
            alert("伺服器處理連線失敗請重新再試")
          }
        });
      }
    </script>
	</body>
</html>
