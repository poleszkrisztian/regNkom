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
        <h1 class="text-center">Regisztrácó</h1>
        <form class="col-sm-6 col-sm-push-3" action="index.php" method="post">
            <div class="form-group">
                <label for="nev">Név:</label>
                <input type="text" class="form-control" name="nev" id="nev" placeholder="Név" autofocus required>
            </div>
            <div class="form-group">
                <label for="nev">Felhasznlónév:</label>
                <input type="text" class="form-control" name="felhasznalonev" id="felhasznalonev" placeholder="Felhasznlónév" autofocus required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
            </div>
            <div class="form-group">
            <label for="jelszo">Új jelszó:</label>
            <input type="password" class="form-control" name="jelszo" id="jelszo" placeholder="Új jelszó" required autofocus>
        </div>
        <div class="form-group">
            <label for="jelszo1">Jelszó ismét:</label>
            <input type="password" class="form-control" name="jelszo1" id="jelszo1" placeholder="Jelszó ismét" required>
        </div>
            <div class="form-group text-center">
                <input type="hidden" name="event" id="event" value="regisztracio">
               
                <button type="submit" class="btn btn-success">Regisztrálok</button>
            
                        </div>
        </form>
    </div>
        <p class="text-center" ><a href="bej.php">Van már profilom bejelentkezek</a></p>
       
    </body>
</html>
