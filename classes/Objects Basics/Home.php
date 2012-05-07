<?php
/*
 * product class
 * 
 * from php objects book
 */
class ShopProduct{
	public $title				= "default product";
	public $producerMainName	= "main name";
	public $producerFirstName	= "first name";
	public $price				= 0;
	
	
	/*
	 * constructor for shopProduct objects
	 */
	function __construct($title, $firstName, $mainName, $price ){
		$this->title				=$title;
		$this->producerFirstName	=$firstName;
		$this->producerMainName		=$mainName;
		$this->price				=$price;
	}
	
	
	/*
	 * returns the producer Name of instance
	 */
	function getProducer(){
		return "{$this->producerFirstName}".
				"{$this->producerMainName}";	
	}
}


/*
 * Class to write objects
 * only for ShopProduct class
 */
class ShopProductWriter{
	public function write(ShopProduct $shopProduct){
		$str = "{$shopProduct->title}: ".
				$shopProduct->getProducer().
				"({$shopProduct->price})\n";
				print $str;
		}
	}
	
	
	
	
/*
 * create class objects
 */
$product1 = new ShopProduct();
$product2 = new ShopProduct('My Guitar Gently Weeps', 'Rengo', 'Star', '2.99'); //set with constructor
$writer = new ShopProductWriter();



/*
 * product 1 (without setter)
 */
$product1->title="Hey Jude";
$product1->producerFirstName="John";
$product1->producerMainName="Lennon";
$product1->price="1.99";

//$product1->abitraryAddition="treehouse"; // ---> can add properties outside the class




print "author: {$product1->getProducer()}\n";

$writer->write($product2);


var_dump($product1);
var_dump($product2);



?>