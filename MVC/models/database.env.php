<?php
$DB = [
  'charset'=>'utf8',
  'name'=> getenv('DB_NAME') ? getenv('DB_NAME') : $DB['name'],
  'host'=> getenv('DB_HOST') ? getenv('DB_HOST') : $DB['host'],
  'login'=> getenv('DB_USER') ? getenv('DB_USER') : $DB['login'],
  'passwd'=> getenv('DB_PASS') ? getenv('DB_PASS') : $DB['passwd'],
];