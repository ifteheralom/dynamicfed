<?php

require_once('../simplesamlphp/lib/_autoload.php');

$auth = new \SimpleSAML\Auth\Simple('default-sp');

if (!$auth->isAuthenticated()) {
    /* Show login link. */
    header("Location: /login.php?service=office");
} else {
    $attrs = $auth->getAttributes();

    if ($attrs['eduPersonAffiliation'][1] == 'employee') {
        echo "You are logged in";
    } else {
        header("Location: /test.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Office</title>
</head>

<body>
    <h2>Welcome to Office service</h2>
    <a href="http://sp2.sust.com">Home</a>
    <a href="http://sp2.sust.com/logout.php">Logout</a>

</body>

</html>
