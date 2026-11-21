<?php
  header('Content-Type: text/plain; charset=UTF-8');
  $body = $_POST['request'];


  $dom = new DOMDocument('1.0', 'UTF-8');
  $html = file_get_contents($body);
  $html = mb_convert_encoding($html, "HTML-ENTITIES", 'auto');
  @$dom->loadHTML($html);
  $xpath = new DOMXpath($dom);
  $title = $xpath->query("//body")->item(0)->nodeValue;
  echo $title;
