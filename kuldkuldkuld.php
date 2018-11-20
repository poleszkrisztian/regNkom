 <?php
 $uid=$_SESSION["uid"];

                
            $szoveg=$_GET["kommentke"];
            $kategoriaID=$_GET[$cimI];
        $command = $dbc->prepare('insert into kommentek (uid, szoveg, kategoriaID) values(?,?,?)');
			$command->bind_param('isi', $uid, $szoveg, $kategoriaID);
			if ($command->execute()) print "<script type='text/javascript'>alert('Sikeres komment')</script>";
			else print mysqli_stmt_error($command);
			$command->close();
			$dbc->close();
                        unset($_GET["komment"]);
                
                
                    
                    
                    ?>