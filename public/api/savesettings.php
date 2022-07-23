<?php
//if($_SERVER['REQUEST_METHOD'] != 'POST') return;
//session_start();

echo 'fadfadsfasfdsdfds';

require_once('db.php');

//replace
$dane = json_decode(file_get_contents('php://input'));

$tabela = $dane->tabela;
$login = $dane->login;

$kwerenda='';

foreach ($dane->dane as $key => $value) {
    $kwerenda .= $key;
    $kwerenda .= '=';
    $kwerenda .= "'".$value."'";
    $kwerenda .= ',';
}

$kwerenda = substr($kwerenda, 0, -1);

print_r($dane);

$query = "UPDATE userdata SET $kwerenda WHERE login = '$login'";
echo $query;
$sth = $dbh->prepare($query);


if ($sth->execute() ==false) {
    echo 'nie udało się';
}


?>



