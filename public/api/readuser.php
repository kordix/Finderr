<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;

require_once 'db.php';

// $dbh = null;

$dane = json_decode(file_get_contents('php://input'));

$login = $dane->login;

//REPLACE
$query_run = $dbh->prepare("SELECT * FROM userdata where login = '$login'");
$query_run->execute();

class dummy {}

$rows = $query_run->fetchAll(PDO::FETCH_CLASS, "dummy");


$results=[];

echo json_encode($rows[0]);
