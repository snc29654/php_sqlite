<?php
  header('Content-Type: text/plain; charset=UTF-8');

  $db = new SQLite3('db.sqlite3');

  $result = $db->query('SELECT * FROM entries');
  while ($row = $result->fetchArray()) {
    print_r($row['id']);
    print_r("   ");
    print_r($row['title']);
    print_r("   ");
    print_r(mb_substr($row['body'],0, 10, "UTF-8"));

    $kai="\n";
    print_r($kai);
  }
