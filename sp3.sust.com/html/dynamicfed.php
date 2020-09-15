<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SP-3</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="/docs/4.4/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            SP3
        </a>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="window.location.href = 'http://code.sust.com/logout.php';">Logout</button>
        </form>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Welcome to SP 3 Dynamic Federation</h1>
        </div>
    </div>

    <?php
    $spentityid = $_POST['spentityid'];
    $idpentityid = $_POST['idpentityid'];
    $idpcode = $_POST['idpcode'];
    $headurl = $idpentityid . '?idpcode=' . $idpcode . '&&spentityid=' . $spentityid . '&&idpentityid=' . $idpentityid;
    $posturl = 'http://18.191.122.156:3000/trustedlist';
    $fields = array(
        'title' => urlencode('sp3'),
        'spentityid' => urlencode($spentityid),
        'idpentityid' => urlencode($idpentityid)
    );
    $fields_string = '';
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $posturl,
        CURLOPT_POST => count($fields),
        CURLOPT_POSTFIELDS => $fields_string
    ]);
    $resp = curl_exec($curl);
    curl_close($curl);

    if ($resp == 'success') {
        header("Location: $headurl");
    }
    ?>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>