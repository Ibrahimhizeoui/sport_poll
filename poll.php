<?php 
                     
require_once("backend/connect.php");

                     
                     if (isset($_GET['id'])) {
                     	 if (isset($_POST['submit'])) {
                              var_dump($_POST);
                              $id_event=$_POST['id_event'];
                              $poll=$_POST['poll'];
                              $insert=$pdo->prepare("INSERT INTO `sports_poll`.`poll` (`id`, `id_event`, `poll`, `date`) VALUES (NULL, '$id_event', '$poll', CURDATE())");
                              $insert->execute();
                              
                              }

                           	# code...
                           
                     $max=$_GET['id']; 
                     $sel=$pdo->prepare("select * from events WHERE objectId='$max'");
                     $sel->execute();
                     $event=$sel->fetch();
                    
                     $id=$event['id'];
                     
                           $selectAll=$pdo->prepare(" select COUNT(id) as total from poll where id_event=$id");
                           $selectAll->execute();
                           $count=$selectAll->fetch();
                           
                           //home poll
                           $selectAll=$pdo->prepare(" select COUNT(id) as total from poll where id_event=$id AND poll=1");
                           $selectAll->execute();
                           $home=$selectAll->fetch();
                           
                           //draw poll
                           $selectAll=$pdo->prepare(" select COUNT(id) as total from poll where id_event=$id AND poll=0");
                           $selectAll->execute();
                           $draw=$selectAll->fetch();
                           
                           //away poll
                           $selectAll=$pdo->prepare(" select COUNT(id) as total from poll where id_event=$id AND poll=2");
                           $selectAll->execute();
                           $away=$selectAll->fetch();
    
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
<div class="new_poll" id="new_poll">
    	<div class="container">
            <h1>LAST EVENTS</h1>
    		
    		<div class="col-md-6 col-sm-6 description">
                
                <div id="poll_form">
                     <form method="post" action="">
                     <?php
                     

                      ?>
                          <h3 style=""><?php echo $event['homeName']; ?><span class="vs">Vs</span><?php echo $event['awayName']; ?></h3>
                           <ul class="event">
                                  <li class="team"><label>Sport:  </label><?php echo $event['sport']; ?></li>
                                  <li class="team"><label>Competition:   </label><?php echo $event['group']; ?></li>
                                  <li class="team"><label>Country:  </label><?php echo $event['country']; ?></li>
                             </ul>   <br>

                          <div class="team">
                                <input type="radio" name="poll" value="1" id="home" />
                                <label for="home" style="color: #FF5252;">Home Team win (Ding Junhui)</label>
                          </div>

                          <div class="team">
                                <input type="radio" name="poll" value="0" id="draw" />
                                <label for="draw" style="color: #FF5252;">Draw</label>
                          </div>

                          <div class="team">
                                <input type="radio" name="poll" value="2" id="away" />
                                <label for="away" style="color: #FF5252;">Away Team win (Allen, Gareth)</label>
                          </div>
                          <input type="text" name="id_event" value="<?php echo "$id"; ?>" style="display:none;">

                          
                       

                            
                           <input type="submit" name="submit" value="Vote" class="votting">
                            <dir style="clear:both;"></dir>
                     </form>
                </div>

                 
                
    		</div>
    		<div class="col-md-6 col-sm-6 about-grid about-image">
    			<canvas id="myChart" width="300" height="200"></canvas>
                
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
<?php 
}
else
	header("Location: index.php")


?>