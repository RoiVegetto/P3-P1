<?php
require_once 'DBConnect.php';

$db = new DBConnect();
var_dump($db->getPDO());
