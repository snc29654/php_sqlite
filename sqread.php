<?php
  header('Content-Type: text/plain; charset=UTF-8');

  $db = new SQLite3('db.sqlite3');

  $result = $db->query('SELECT * FROM entries');
  while ($row = $result->fetchArray()) {
    print_r($row);
  }
