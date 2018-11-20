<?php
    
require_once 'cont.php';
require_once 'adatok.php';

if (bejelentkezve()) {
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <title>Forum</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/stilusok.css">
        <link rel="stylesheet" href="css/accordion.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div id="container">
            <header>
                <h1>Témák</h1>
            </header>
          <section>
              
              <?php
              $cimI=0;
           
              for($i=0; $i<$darab; $i++){
                echo ' <div class="accordionPanel">
                    <div class="accordionLabel">
                        <h3>';
               echo $cim[$cimI];
                  echo  '</h3>
                    </div>
                    <div class="accordionContent">
                   <p>';
                    echo $katszov[$cimI];
                  echo  '</p>
                      <form action="forum.php" method="get">
                       <input type="hidden" name="';
                 
                      echo $cimI;
                       echo '" id="event" value="komment">
                       <textarea rows="4" cols="187" name="komment"></textarea>';
                  echo    '   <button type="submit" class="btn btn-success gomb" id="gomb"';
                  
                   echo $cimI;
                      echo    '>Komment</button>
                    </form>
                    </div>
                </div>';
               

                
                
                $uid=$_SESSION["uid"];
        if(isset($_GET["komment"])){
            if($_GET["komment"]!=""){
             $szoveg = filter_input(INPUT_POST, "szoveg", FILTER_SANITIZE_SPECIAL_CHARS);
            $szoveg=$_GET["komment"];
            $kategoriaID=$cimI;
        $command = $dbc->prepare('insert into kommentek (uid, szoveg, kategoriaID) values(?,?,?)');
			$command->bind_param('isi', $uid, $szoveg, $kategoriaID);
			if ($command->execute()) print "<script type='text/javascript'>setTimeout(function(){ alert('Sikeres komment'); }, 88);</script>";
			else print mysqli_stmt_error($command);
			$command->close();
			$dbc->close();
                        unset($_GET["komment"]);
        }
        else{
            print "<script type='text/javascript'>setTimeout(function(){ alert('Sikertelen komment'); }, 88);</script>";
        }
        }
                 $cimI++;
   }
              
            ?>
             
            </section>
        </div>
        <?php 
        
        
        
        
}
        ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/accordion.js"></script>
        <script src="js/komment.js" type="text/javascript"></script>
    </body>
</html>
