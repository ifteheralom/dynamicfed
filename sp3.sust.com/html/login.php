<?php

require_once('../simplesamlphp/lib/_autoload.php');

$auth = new \SimpleSAML\Auth\Simple('default-sp');
$spentityid = $_GET['spentityid'];
$idpentityid = $_GET['idpentityid'];

if ($auth->isAuthenticated()) {
    header("Location: http://sp3.sust.com");
}

$auth->requireAuth([
    'ReturnTo' => 'http://sp3.sust.com',
    'KeepPost' => FALSE,
]);

$attributes = $auth->getAttributes();
print_r($attributes);

// phpinfo();
