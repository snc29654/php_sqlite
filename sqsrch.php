<?php
  header('Content-Type: text/plain; charset=UTF-8');

  $db = new SQLite3('db.sqlite3');

  $srch = $_POST['srch'];
  $string_srch = (string)$srch;

  //$string_srch="大雨";
$keyword = 'テスト';
$stmt = $db->prepare('SELECT * FROM entries WHERE body LIKE :string_srch');
$stmt->bindValue(':string_srch', '%' . $string_srch . '%', SQLITE3_TEXT);
$result = $stmt->execute();

  while ($row = $result->fetchArray()) {
    print_r($row['id']);
    print_r("   ");
    print_r($row['title']);
    print_r("   ");
    print_r(mb_substr($row['body'],0, 30, "UTF-8"));

    $kai="\n";
    print_r($kai);
  }



//while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
//    echo $row['id'] . ': ' . htmlspecialchars($row['body'], ENT_QUOTES, 'UTF-8') . PHP_EOL;
//}

