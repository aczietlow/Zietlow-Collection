
<?php
/*
 * product class
 * 
 * from php objects book
 */
class ShopProduct{
	private $title;
	private $producerMainName;
	private $producerFirstName;
	protected $price;
	protected $discount;

	
	/*
	 * constructor for shopProduct objects
	 */
	public function __construct($title, $firstName, $mainName, $price){
		$this->title				= $title;
		$this->producerFirstName	=$firstName;
		$this->producerMainName		=$mainName;
		$this->price				=$price;

	}
	
	public function getProducerFirstName(){
		return $this->producerFirstName;
	}
	
	public function getProducerMainName(){
		return $this->producerMainName;
	}
	
	public function setDiscount( $num){
		$this->discount = $num;
	}
	
	public function getDiscount(){
		return $this->discount;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function getPrice(){
		return ($this->price - $this->discount);
	}
	
	/*
	 * returns the producer Name of instance
	 */
	public function getProducer(){
		return "{$this->producerFirstName}".
				"{$this->producerMainName}";	
	}
		
	public function getSummaryLine (){
		$base 	= "$this->title ( {$this->producerMainName}, ";
		$base	.="{$this->producerFirstName } )";
		return $base;
		
	}
}

/*
 * extends ShopProduct class
 * has properties unique to cd's
 */
class CdProduct extends ShopProduct{
	private $playLength;
	
	public function __construct($title, $firstName, $mainName, $price, $playLength){
		parent::__construct($title, $firstName, $mainName, $price);
		$this->playLength = $playLength;
	}
	
	public function getPlayLength(){
		return $this->playLength;
	}
	
	
	public function getSummaryLine(){
		$base 	= parent::getSummaryLine();
		$base	.=": playing time - {$this->playLength}";
		return $base;
	}
}


/*
 * extends ShopProduct class
 * has properties unique to books
 */
class BookProduct extends ShopProduct{
	private $numPages;
	
	public function __construct($title, $firstName, $mainName, $price, $numPages){
		parent::__construct($title, $firstName, $mainName, $price);
		$this->numPages = $numPages;
	}
	
	public function getNumberOfPages(){
		return $this->numPages;
	}
	
	/*
	 * orrides the get price method from the parent class
	 * 
	 * discounts do not apply to books
	 */
	public function getPrice(){
		return $this->price;
	}
	
	public function getSummaryLine(){
		$base 	= parent::getSummaryLine();
		$base	.=": page count - {$this->numPages}";
		return $base;		
	}
	
}


/*
 * Class to write objects
 * only for ShopProduct class
 */
class ShopProductWriter{
	private $products = array();
	
	public function addProduct( ShopProduct $shopProduct){
		$this->products[]= $shopProduct;
	}
	
	public function write(){
		$str = "";
		foreach( $this->products as $shopProduct ){
			$str	.= "{$shopProduct->title}:";
			$str	.= $shopProduct->getProducer();
			$str 	.= "({$shopProduct->getPrice()})\n";
		}
		print $str;
	}
}
	
	
	
	
/*
 * create class objects
 */

$product1 = new BookProduct('stars', 'Dean', 'Koontz', 15.99, 385);
$product2 = new CdProduct('Hey Jude', 'Rengo', 'Starr', 1.99, 3.15);
$writer = new ShopProductWriter();


/*
$writer->addProduct($product1);
$writer->addProduct($product2);
$writer->write();
*/


var_dump($product1);



?>