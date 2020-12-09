<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
</head>
<body>
  <form id="verify">
    <section>
      <label>
        email: 
        <input type="text" name="email" placeholder="email" required>
      </label>
    </section>
    <section>
      <label>
        驗證碼: 
        <input type="text" name="code" placeholder="驗證碼" required>
      </label>
    </section>
    <input type="submit">
  </form>
  <script>
    $(document).ready(function() {
      $("#verify").submit(function(event) {
        event.preventDefault();
        doVerify();
      });
    });
    
    function doVerify() {
      $.ajax({
        url: "<?= base_url("verify/doVerify") ?>",
        type: 'POST',
        dataType: 'json',
        data: $("#verify").serialize()
      })
    }
  </script>
</body>
</html>