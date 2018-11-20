<?php

session_start();

require_once 'serv.php';
require_once 'function.php';

$dbc = mysqli_connect(DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_query($dbc, "set names utf8");


$pEvent = filter_input(INPUT_POST, "event", FILTER_SANITIZE_SPECIAL_CHARS);
$gEvent = filter_input(INPUT_GET, "event", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$jelszo = filter_input(INPUT_POST, "jelszo", FILTER_SANITIZE_SPECIAL_CHARS);
$jelszo1 = filter_input(INPUT_POST, "jelszo1", FILTER_SANITIZE_SPECIAL_CHARS);
$bjelszo = filter_input(INPUT_POST, "bjelszo", FILTER_SANITIZE_SPECIAL_CHARS);
$felhasznalonev = filter_input(INPUT_POST, "felhasznalonev", FILTER_SANITIZE_SPECIAL_CHARS);
$nev = filter_input(INPUT_POST, "nev", FILTER_SANITIZE_SPECIAL_CHARS);
$uzenet = "Hiba! Ez az e-mail cím már regisztrálva van! Adj meg másik e-mail címet!";
if ($jelszo != $jelszo1) {
    echo "<script type='text/javascript'>alert('A két jelszó nem egyezik!');</script>"; 
    return false;
}

if ($pEvent === "regisztracio") {
    $sql = "select count(*) as db from userek where email = '$email'";
    $table = mysqli_query($dbc, $sql);
    list($db) = mysqli_fetch_row($table);
    if ($db > 0) {
        echo "<script type='text/javascript'>alert('$uzenet!');</script>";
    } else {
       $command = $dbc->prepare('insert into userek (nev, felhasznalonev, email, jelszo) values(?,?,?,?)');
			$command->bind_param('ssss', $nev, $felhasznalonev, $email, $jelszo);
			if ($command->execute()) print "<script type='text/javascript'>alert('Sikeres regisztráció')</script>";
			else print "<script type='text/javascript'>alert('Sikertelen regisztráció')"."mysqli_stmt_error($command)</script>";
			$command->close();
			$dbc->close();
                         header("Location: http://localhost/regNkom/bej.php");   
    }
           
}




$Buzenet="Sikeres bejelentkezés";
$Nuzenet="Sikertelen bejelentkezés";
if ($pEvent === "bejelentkezes") {
$sql = "select nev, jelszo from userek where felhasznalonev = '$felhasznalonev' and jelszo = '$bjelszo'";
    $table = mysqli_query($dbc, $sql);
     $row = mysqli_fetch_array($table,MYSQLI_ASSOC);
     
    
   $count = mysqli_num_rows($table); //szuro
    
  if($count == 1){
      $sql="select uid from userek where felhasznalonev='$felhasznalonev'";
          $table = mysqli_query($dbc, $sql);
          $seg= mysqli_fetch_assoc($table);
          foreach ($seg as $key =>$value) {
              $_SESSION["uid"]=$value;
          }
        echo "<script type='text/javascript'>alert($Buzenet)</script>"; 
     header("Location: http://localhost/regNkom/forum.php"); 
    }else{
         echo "<script type='text/javascript'>alert('$Nuzenet!');</script>";
    }
    if(isset($active)){ //az aktiv vátozoban van e ertek ha igen akkor keresi meg az aktiv indxet
         
         
         $active=$row['active']; //(active) a változó amibe beleteszem az eredményt (objektum a lekerdezesbol)
     }

    
        
}

?> 