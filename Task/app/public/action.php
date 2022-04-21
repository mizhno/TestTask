<?php

$name = $_POST['number'];
$ss = $_POST['Yes'] ?? $_POST['No'];
$flag = false;
$result = 'lose';
$dsn='pgsql:dbname=testdb; host=postgres';

function checkToFalse($name): bool
{
    $arr = str_split($name,3);
    $arr[0] = str_split($arr[0], 1);
    $arr[1] = str_split($arr[1], 1);

    if (array_sum($arr[0]) == array_sum($arr[1])) {
        return true;
    }

    return false;
}

if (empty($name)){
    echo "Unnable to check, something went wrong";

    return null;
}

if (isset($_POST['Yes'])){
    $flag = checkToFalse($name);

    if ($flag === true){
        echo "You're right! Well done.";
        $result = 'won';
    } else {
        echo "Oops, you lose...";
    }
} elseif (isset($_POST['No'])) {
    $flag = checkToFalse($name);

    if ($flag === false){
        echo "You're guess right! Well done.";
        $result = 'won';
    } else {
        echo "Oops, you lose...";
    }
}

$db = new PDO("$dsn", 'user','password');

$sql = "INSERT INTO test_table (ticket_num, result) VALUES(?,?)";

$stmt = $db->prepare($sql);
$stmt->execute([$name, $result]);
