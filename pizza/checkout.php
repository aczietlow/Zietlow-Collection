<?php
session_start();
$dom = simplexml_load_file("menu.xml");


$price = $dom->xpath("category[@title='pizza']/item[@name='".$_SESSION['order']."']/sizes/size[@size='".$_SESSION['size']."']/price");
$total = (float)$price[0] * $_SESSION['qty'];
//print  ('total: $'.number_format($total, 2, '.', ','));
var_dump($price);

print ('<br />');
print_r($_SESSION['cart']);

print ('<br />');
	

?>
