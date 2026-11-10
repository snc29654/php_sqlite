<?php
  header('Content-Type: text/plain; charset=UTF-8');
$delno = (int)$_POST['delno'];
  $db = new SQLite3('db.sqlite3');
  $delno =$_POST['delno'];
// 1. プリペアドステートメントを準備
$stmt = $db->prepare('SELECT * FROM entries WHERE id = :delno;');

// 2. パラメータをバインド（代入）
$id = 1; // 取得したいID
$stmt->bindValue(':delno', $delno, SQLITE3_INTEGER); // 型に応じ SQLITE3_INTEGER や SQLITE3_TEXT を指定

// 3. クエリを実行
$result = $stmt->execute();

// 4. 結果を連想配列などで取得
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    var_dump($row['body']);
}