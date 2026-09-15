<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <title>PHP ajax</title>
  <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#send').click(function() {
      var data = {
        'request' : $('#request').val(),
        'action' : $('#action').val(),
    
    };
      $.ajax({
        type: "POST",
        url: "sqwrite.php",
        data: data,
      }).success(function(data, dataType) {
        alert(data);
      }).error(function(XMLHttpRequest, textStatus, errorThrown) {
        alert('Error : ' + errorThrown);
      });
      return false;
    });
    $('#read').click(function() {
      var data = {
        'request' : $('#request').val(),
        'action' : $('#action').val(),
    
    };
      $.ajax({
        type: "POST",
        url: "sqread.php",
        data: data,
      }).success(function(data, dataType) {
	       document.getElementById( "request1" ).value = data ;


      }).error(function(XMLHttpRequest, textStatus, errorThrown) {
        alert('Error : ' + errorThrown);
      });
      return false;
    });


  });
  </script>
</head>
<body>
  <h1>AJAXからsqliteを実験する</h1>

  <form method="post">
    <p><input id="send" value="DB書き込み" type="submit" /></p>
    <p><input id="read" value="DB読み出し" type="submit" /></p>
    <p><textarea name="request" id="request" cols="80" rows="10">ここになにか書いてください</textarea></p>
    <p><textarea name="request1" id="request1" cols="80" rows="30">読み出し領域</textarea></p>

  </form>
</body>
</html>