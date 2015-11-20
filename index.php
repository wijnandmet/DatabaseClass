<?php 
include_once("db.php");

use Libraries\DB\Foundation2;

class DBException extends Exception {

}

Foundation2::host(['dns' => 'mysql:host=localhost;dbname=testwie;charset=UTF8','user' => 'root','pass' => '']);

class Town extends Foundation2 {
	protected $_table = 'town';

	public function customers() {
		return $this->hasMany('Customer','town_id');
	}
}

class Customer extends Foundation2 {
	protected $_table = 'customer';

	public function town() {
		return $this->belongsTo('Town','town_id');
	}
}

echo '<pre>';


$a = Customer::start()->where(['id' => 2])->first();
var_dump($a);

$db = new Customer(1);



$customer = $db->first();




$town = $customer->town();

var_dump($customer);
var_dump($town);
$town->name = 'test';


var_dump($town->customers()->fetch());
//$town->save();


$r = Customer::start()->fetch(['town_id' => 1]);
var_dump($r[0]->toJson());
?>