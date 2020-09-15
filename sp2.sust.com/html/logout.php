<?php   

require_once('../simplesamlphp/lib/_autoload.php');
$auth = new \SimpleSAML\Auth\Simple('default-sp');
$auth->logout('http://sp2.sust.com');


?>
