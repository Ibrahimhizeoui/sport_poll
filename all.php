<?php 
                     require_once("backend/connect.php");
                     $select=$pdo->prepare("select * from events ORDER BY id DESC ");
                     $select->execute();
                     $allevent=$select->fetchALL();
                     
                     

    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Traning</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css" 	type="text/css" media="all">
	<link rel="stylesheet" href="css/themes.css">
    <link rel="stylesheet" href="css/responsiveslides.css">
    
		
<script src="js/modernizr.js"></script>

</head>
<body>
<header>
<div id="container">
	<div id="logo"><a href="#"><img src="image/logo.png" width="220"></a></div>
    <div id="menu" ><a href="#"><img src="image/menu.png" ></a></div>
	
		<nav class="nnav">
        <ul>
            <li class="active" ><a href="index.php">Home</a></li>
            
        </ul>
    </nav>
	
</div>
</header>
<div class="">


    <!-- Slideshow 1 -->
    

    <div id="all" class="all">
    	<div class="container-fluid">
        <h1>All EVENTS</h1>
            <div class="table-responsive">
            <dir style="clear:both;"></dir>
              <table class="table table-striped tablevote table-responsive">
                 <thead> 

                     <tr> 
                     <th>#</th>
                     <th>Name</th>
                     <th>Home Name</th>
                     <th>Away Name</th>
                     <th>Sport</th>
                     <th>Group</th>
                     
                     <th style="text-align:center;">Vote</th>
                     <th></th>
                     
                     </tr> 
                     
                 </thead>
                 <tbody>
                 <?php 
                 $i=1;
                 foreach ($allevent as $event) {
                  ?>
                      <tr> 
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $event['name'];?></td> 
                      <td><?php echo $event['homeName'];?></td> 
                      <td><?php echo $event['awayName'];?></td>
                      <td><?php echo $event['sport'];?></td> 
                      <td><?php echo $event['group'];?></td> 
                      
                     
                      <td style="text-align:center;">
                         <div>
                             <a href="?id=<?php echo $event['objectId'];?>&p=1" class="homev">Home</a>
                             <a href="?id=<?php echo $event['objectId'];?>&p=0" class="drawv">Draw</a>
                             <a href="?id=<?php echo $event['objectId'];?>&p=2" class="awayv">Away</a>
                         </div> 
                      </td> 
                       <td><a href="poll.php?id=<?php echo $event['objectId'];?>" class="viewv  ">view</a></td>
                      </tr> 
                      <?php
                      $i++; } ?>
                      
                  </tbody> 
                  </table> 
    		</div>
    	</div>
    </div> 

    

    <footer>
         <div>All Rights Reserved @ Sport Poll 2016</div> 
    </footer>
   
 
  



 <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.js"></script>
  
  <script src="js/responsiveslides.js"></script>
  <script>
    // You can also use "$(window).load(function() {"
    $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 3000,
        
        namespace: "centered-btns"
      });
});
  </script>

  <script type="text/javascript" src="js/Chart.js"></script>

<script>
var ctx = document.getElementById("myChart");
var data = {
    labels: [
        "Home Team",
        "Draw",
        "Away Team"
    ],
    datasets: [
        {
            data: [<?php echo $home['total']?>, <?php echo $draw['total']?>, <?php echo $away['total']?>],
            backgroundColor: [
                "#54c9e9",
                "#c4e954",
                "#FF5252"
            ],
            hoverBackgroundColor: [
                "#54c9e9",
                "#c4e954",
                "#FF5252"
            ]
        }]
};
var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: data,
    
});

if ($(window).width()<1025) {
    $('#menu img').click(function(){
    $('.nnav').toggle(20);});
}
if ($(window).width()<767) {
    $( ".img-responsive" ).each(function( index ) {
  $(this).attr({src:"image/slide-"+ (index+1) +"-phone.jpg"});
  //console.log( index + ": " + $( this ).text() );
});
    }
    

</script>
</body>
</html>