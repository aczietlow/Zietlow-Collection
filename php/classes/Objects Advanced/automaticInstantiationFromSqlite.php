
<?php
/*
 * product class
 * 
 * from php objects book
 */
class ShopProduct{
	private $title;				//title of the product
	private $producerMainName;	//last name of the author of the product
	private $producerFirstName;	//first name of the author of the product
	protected $price;			//price of the product
	protected $discount;		//discount of product
	private	$id =0;				//
	
	/*
	 * sets instance id
	 */
	public function setID($ID){
		$this->id = $id;
	}
	
	
	public static function getInstance($id, PDO $pdo){
		$query = "select * from products where id='$id'";
		$stmt = $pdo->query( $query);
		$row = $stmt->fetch( );
		
		if (empty($row)) {return null; }
		
		if ($row['type']== "book"){
			$product = new BookProduct($row['title'], 
										$row['firstname'],
										$row['mainname'], 
										$row['price'], 
										$row['numpages']);
		}
		
		if ($row ['type']=="cd"){
			$product = new CdProduct($row['title'], 
										$row['firstname'],
										$row['mainname'], 
										$row['price'], 
										$row['playlength']);
		}
		
		else {$product = new ShopProduct($row['title'], 
										$row['firstname'],
										$row['mainname'], 
										$row['price']);
			
		}
		
		$product->setID( $row['id']);
		$product->setDiscount( $row['discount']);
		return $product;
	}
	
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
		print_r ($products[0]);
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
 * Executable code
 */

$dsn = "sqlite:items.db"; 
$pdo = new PDO($dsn, null, null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);


var_dump($obj);

$writer =  new ShopProductWriter();

$writer->addProduct($obj);
$writer->write();

?>