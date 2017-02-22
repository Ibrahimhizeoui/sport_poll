<?php 
            if (isset($_GET['ev'])) {
            	echo $_GET['ev'];
            	if ($_GET['action']=='del') {
            		echo "string";
            		$objectId=$_GET['ev'];
              require_once("connect.php");
              $selectAll=$pdo->prepare("delete from events where objectId='$objectId'");
              $selectAll->execute();
              header("Location: admin.php");
            		# code...
            	}
              }

           
       ?>