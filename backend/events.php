<?php
require_once("connect.php");
$selectAll=$pdo->prepare("select * from events");
	$selectAll->execute();
	$events=$selectAll->fetchAll();
	
 ?>
<div id="all" class="all col">

    	<h1>All EVENTS</h1>
    	<a href="add.php" class="add">Add Events</a>
            <div class="table-responsive">
              <table class="table table-striped tablevote table-responsive">
                 <thead> 
                     <tr> 
                     <th>#</th>
                     <th>Name</th>
                     <th>Home Name</th>
                     <th>Away Name</th>
                     <th>Sport</th>
                     <th>Group</th>
                     <td></td>
                     </tr> 
                 </thead>
                 <tbody>
                 <?php foreach ($events as $event) {
                 	# code...
                 ?>
                      <tr> 
                      <th scope="row"> <?php echo $event['id'];?></th>
                      <td><?php echo $event['name'];?></td> 
                      <td><?php echo $event['homeName'];?> </td> 
                      <td><?php echo $event['awayName'];?></td>
                      <td><?php echo $event['sport'];?></td> 
                      <td><?php echo $event['group'];?></td> 
                        <td><a class="view_event drawv" href="view_event.php?ev=<?php echo $event['objectId'];?>">view</a></td>
                        <td><a class="view_event awayv" href="update.php?action=del&ev=<?php echo $event['objectId'];?>">X</a></td>
                     
                      </tr> 
                   <?php }  ?>  
                  </tbody> 
                  </table> 
    		</div>
    </div> 