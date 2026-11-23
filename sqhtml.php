<?php
  header('Content-Type: text/plain; charset=UTF-8');
  $body = $_POST['request'];


  $dom = new DOMDocument('1.0', 'UTF-8');
  $html = file_get_contents($body);
  $htmls = file_get_contents($body);
  $html = mb_convert_encoding($html, "HTML-ENTITIES", 'auto');
  @$dom->loadHTML($html);
  $xpath = new DOMXpath($dom);
  $titley = $xpath->query("//title")->item(0)->nodeValue;
  echo $titley;



  $titlex = date('Y年m月d日 H時i分s秒');
  $body = $_POST['request'];

  $db = new SQLite3('db.sqlite3');
  $db->exec('CREATE TABLE IF NOT EXISTS entries(id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, body TEXT)');

  $stmt = $db->prepare('INSERT INTO entries VALUES(NULL, :title, :body)');
  $stmt->bindValue(':title', $titlex, SQLITE3_TEXT);
  $stmt->bindValue(':body', $titley.$body.$htmls, SQLITE3_TEXT);
  $stmt->execute();

  $msg="DBに書き込みました";
  echo  $msg;