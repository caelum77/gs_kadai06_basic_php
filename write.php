<?php
// input.php の入力を $_POST で受け取り、data/data.csv に1行追記

$shop = $_POST['shop'];
$date = $_POST['date'];
$origin = $_POST['origin'];
$brew = $_POST['brew'];
$price = $_POST['price'];
$notes = $_POST['notes'];
$overall = $_POST['overall'];

//CSV書き込みなのでカンマ区切りでくっつける
// $line = $shop . "," . $date . "," . $origin . "," . $brew . "," . $price . "," . $notes . "," . $overall . "\n";

$file = fopen("data/data.csv", "a");

fputcsv($file, [
    $shop,
    $date,
    $origin,
    $brew,
    $price,
    $notes,
    $overall
]);

// fwrite($file, $line);

fclose($file);

header('Location: input.php');
exit;

?>
