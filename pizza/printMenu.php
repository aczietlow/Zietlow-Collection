<?php
session_start();

print ('<title> test menu print</title>');

print ('<h1> Menu Print out</h1>');



$dom = simplexml_load_file("menu.xml");

print ("<h3>".$dom->category["title"]."</h3>");
//put menu into table for formatting purposes
//learn to type

//This is more of a print menu and order form all in one file
//This method of ordering really doesn't take in account session cookies or "shopping carts"


print ('<table border="0">');
print ('<tr>');
print ('<td>Pizza.</td>');
print ('<td>Small</td>');
print ('<td>Large</td>');
print ('<td>Size</td>');
print ('<td>QTY</td>');
print ('<td>Add to Cart</td>');
print ('</tr>');

//need to be able to print by categories, not all at once (xml redesign)
foreach($dom->category->item as $item )
{
	print ('<tr>');
	print ('<form action="'.$_SERVER['PHP_SELF'].'" method="post">');
	print ('<td>'.$item["name"].'</td>');
	

	
	foreach ($item->sizes->children() as $size)
	{
		
		print ('<td>$'.$size->price.'</td>');
	}	
	
	print ('<td>');
		foreach ($item->sizes->children() as $size)
	{
		print ('<select name="size">');
		//bad => sends a string?
		print ('<option>'.$size["size"].'</option>');
		print ('</select');
	}	
	print ('</td>');
	
	print ('<td>');
	print ('<input type="text" name="qty"  style="width:25px;">');
	print ('</td>');
	
	print ('<td>');
	print ('<input type="hidden" value="'.$item["name"].'" name="order">');
	print ('<input type="submit" value="add to cart">');
	print ('</td>');

	
	print ('</form>');
	print('</tr>');
}
print('</table>');






if(isset($_POST['order']))
{
	/*
	print ('<br />');
	print $_POST['size'];
	print ('<br />');
	print $_POST['qty'];
	print ('<br />');
	print $_POST['order'];
	print ('<br />');
	*/
	$order =array ($i=> array (order=>$_POST['order'], size=>$_POST['size'],qty=>$_POST['qty']));
	
	print ('<br />');
	
	if ($_SESSION['orders'] != null)
	{
		$i = $_SESSION['orders'];
		print 'orders is set';
	}
	
	if($_SESSION['orders'] == null)
	{
		$i = 0;
		print 'orders is set';
	}
	

	$i=$i+1;
	$order =array ($i=> array (order=>$_POST['order'], size=>$_POST['size'],qty=>$_POST['qty']));
	$_SESSION['cart'][$i]=  $order;
	$_SESSION['orders'] = $i;
	
	
	
	
	
	
	
	
	

}
?>
