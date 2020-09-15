<?php
require_once('../simplesamlphp/lib/_autoload.php');

$auth = new \SimpleSAML\Auth\Simple('default-sp');
$spentityid = $_GET['spentityid'];
$idpentityid = $_GET['idpentityid'];
$submiturl = substr($spentityid, 0, -54) . "/dynamicfed.php";
if (!$auth->isAuthenticated()) {
    /* Show login link. */
    header("Location: /login.php?spentityid=$spentityid&&idpentityid=$idpentityid");
} else {
    echo "New Federation process initialized";
    // echo $spentityid;
    // echo $idpentityid;
    // echo $submiturl;
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CodeGen</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="/docs/4.4/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            Code Generation
        </a>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="window.location.href = 'http://code.sust.com/logout.php';">Logout</button>
        </form>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Welcome to New Federation Service</h1>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="<?php echo $submiturl ?>">
                    <div class="form-group">
                        <label for="spentityid">SP Entity ID</label>
                        <input type="text" class="form-control" name="spentityid" id="spentityid" value="<?php echo $spentityid ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="idpentityid">IDP Entity ID</label>
                        <input type="text" class="form-control" name="idpentityid" id="idpentityid" value="<?php echo $idpentityid ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="idpcode">IDP Code</label>
                        <input type="text" class="form-control" name="idpcode" id="idpcode" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="col-md-6">
                <p class="h3">Code Generator</p>
                <p>
                    Here we will generate a random code that will allow the IDP to confirm that an authentic user has initialized the process.
                    This code will act like a OTP for the IDP to share its metadata.
                </p>
                <br>
                <button id="codeGenBtn" class="btn btn-primary">Generate</button>
                <br><br>
                <p class="h3" id="thecode">XXXXXX</p>
                <script>
                    document.getElementById("codeGenBtn").addEventListener("click", (e) => {
                        let code = Math.floor(Math.random() * 1000000);
                        document.getElementById("thecode").innerHTML = code;
                        document.getElementById('idpcode').value = code;
                    })
                </script>
            </div>
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>