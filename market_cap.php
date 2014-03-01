<?php
include('simple_html_dom.php');
$html = file_get_html('http://coinmarketcap.com/');
$i = 1;
$list = array();
while ($i<=100) {
$step = $html->find('tr', $i);
$name = $step->find('a', 0);
$cap = $step->find('td', 2);
$price = $step->find('a', 1);
$supply = $step->find('td', 4);
$volume = $step->find('td', 5);
$change = $step->find('td', 6);
$name = $name->plaintext;
$cap = $cap->plaintext;
$price = $price->plaintext;
$supply = $supply->plaintext;
$volume = $volume->plaintext;
$change = $change->plaintext;
$arr = array('name'.$i => $name, 'market_cap'.$i => $cap, 'price'.$i => $price, 'supply'.$i => $supply, 'volume'.$i => $volume, 'change'.$i => $change);
array_push($list, $arr);
$i++;
}
echo json_encode($list);
?>
