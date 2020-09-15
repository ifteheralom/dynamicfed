<?php   

require_once('../simplesamlphp/lib/_autoload.php');

$auth = new \SimpleSAML\Auth\Simple('default-sp');

if (!$auth->isAuthenticated()) {
    /* Show login link. */
    header("Location: /login.php");
}

$auth->requireAuth([
    'ReturnTo' => 'http://sp2.sust.com/' .$_GET['service'] .'.php',
    'KeepPost' => FALSE,
]);

$attributes = $auth->getAttributes();
print_r($attributes);

// phpinfo();


?>
