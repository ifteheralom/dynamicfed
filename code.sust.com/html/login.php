<?php

require_once('../simplesamlphp/lib/_autoload.php');

$auth = new \SimpleSAML\Auth\Simple('default-sp');
$spentityid = $_GET['spentityid'];
$idpentityid = $_GET['idpentityid'];

if ($auth->isAuthenticated()) {
    header("Location: http://code.sust.com?spentityid=$spentityid&&idpentityid=$idpentityid");
}

$auth->requireAuth([
    'ReturnTo' => 'http://code.sust.com?' . 'spentityid=' . $spentityid . '&&' . 'idpentityid=' . $idpentityid,
    'KeepPost' => FALSE,
]);

$attributes = $auth->getAttributes();
print_r($attributes);

// phpinfo();
