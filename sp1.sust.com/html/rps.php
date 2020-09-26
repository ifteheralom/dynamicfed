<?php

require_once('../simplesamlphp/lib/_autoload.php');

$auth = new \SimpleSAML\Auth\Simple('default-sp');

if (!$auth->isAuthenticated()) {
    /* Show login link. */
    header("Location: /login.php?service=rps");
} else {
    $attrs = $auth->getAttributes();

    if ($attrs['eduPersonAffiliation'][1] == 'employee') {
        // echo "You are logged in";
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>RPS</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            <!-- <img src="/docs/4.4/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
            SUST Online RPS
        </a>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="button" onclick="window.location.href = '/logout.php';">Logout</button>
        </form>
    </nav>


    <div class="container">
        <br> <br>
        <div class="card text-center">
            <div class="card-header">
                Coming Soon...
            </div>
            <div class="card-body">
                <h5 class="card-title">Online Result Processing System</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="/" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="card-footer text-muted">
                Shahjalal University of Science and Technology
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>