<?php
    
require_once 'cont.php';

?>

<html>          
    <head>

        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
<div class="container">
        <h1 class="text-center">Bejelentkezés</h1>
        <form class="col-sm-6 col-sm-push-3" action="bej.php" method="post">
            <div class="form-group">
                <label for="nev">Felhasználónév</label>
                <input type="text" class="form-control" name="felhasznalonev" id="felhasznalonev" placeholder="Felhasznalónév" autofocus required>
            </div>
        <div class="form-group">
            <label for="bjelszo">Jelszó:</label>
            <input type="password" class="form-control" name="bjelszo" id="bjelszo" placeholder="Jelszó" required autofocus>
        </div>
        <div class="form-group text-center">
                <input type="hidden" name="event" id="event" value="bejelentkezes">
                <button type="submit" class="btn btn-success">Bejelentkezek</button>
            </div>
        </form>
    </div>
    </body>
</html>