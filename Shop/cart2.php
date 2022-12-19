<?php
error_reporting(E_ALL); 
error_reporting(0);
$products = array();
$no = array();
$d = 0;
if (is_array($_COOKIE['item'])) {
    $d = $d + 1;
}
foreach ($_COOKIE['item'] as $name1 => $value) {
    $value11 = explode("__", $value);
    array_push($products, $value11[7]);
    array_push($no, $value11[5]);
    $_SESSION['id'] = $products;
    $_SESSION['no'] = $no;

    echo "Img Path: " . $value11[0] ."<br>";
    echo "Name: " . $value11[1] ."<br>";
    echo "Price: " . $value11[2] ."<br>";
    echo "Packet: " . $value11[3] ."<br>";
    echo "Quantity: " . $value11[4] ."<br>";
    echo "Quantity: " . $value11[5] ."<br>";
    echo "Id: " . $value11[6] ."<br>";
}
$tot = 0;
        foreach ($_COOKIE['item'] as $name1 => $value) {
            $value11 = explode("__", $value);
            $tot = $tot + $value11[2];
            $_SESSION["total"] = $tot;
        }
        echo "Total: " . $_SESSION["total"] ."<br>";
?>
