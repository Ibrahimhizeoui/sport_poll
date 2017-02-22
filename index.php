<?php 
                     require_once("backend/connect.php");
                     $select=$pdo->prepare("select * from events ORDER BY id DESC LIMIT 10");
                     $select->execute();
                     $allevent=$select->fetchALL();
                     
                    $select=$pdo->prepare("select id   from events");
                     $select->execute();
                     $maxid=$select->fetchAll(PDO::FETCH_COLUMN, 0);
                     
                     
                     $input =$maxid;
                     $rand_keys = array_rand($input,2);
                     $max=$input[$rand_keys[0]];
                     
                     $sel=$pdo->prepare("select * from events WHERE id=$max");
                     $sel->execute();
                     $event=$sel->fetch();
                     
                     $id=$max; 
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

    if (isset($_POST['submit'])) {
      var_dump($_POST);
      $id_event=$_POST['id_event'];
      $poll=$_POST['poll'];
      $insert=$pdo->prepare("INSERT INTO `sports_poll`.`poll` (`id`, `id_event`, `poll`, `date`) VALUES (NULL, '$id_event', '$poll', CURDATE())");
      $insert->execute();
      echo "b1";

      # code...
    }

    if (isset($_GET['id']) && isset($_GET['p']) ) {
     $id_event=$_GET['id'];
     $selectid=$pdo->prepare("SELECT id from events where objectId ='$id_event' ");
       $selectid->execute();
       $xx=$selectid->fetch();
       $this_id=$xx['id'];
 
      

     $poll=$_GET['p'];
       $insert=$pdo->prepare("INSERT INTO `sports_poll`.`poll` VALUES (NULL, '$this_id', '$poll', CURDATE())");
       $insert->execute();
      header("Location: index.php");
      # code...
    }

    
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
            <li class="active"><a>Home</a></li>
            <li><a>Vote</a></li>
            <li><a>Top 10</a></li>
            <li><a>About</a></li>
            <li><a>Contact</a></li>
        </ul>
    </nav>
	
</div>
</header>



    <!-- Slideshow 1 -->
    <div class="rslides_container">
      <ul class="rslides" id="slider1">
                     <li>
						<div class="slider-img">
							<img src="image/slide-1.jpg" class="img-responsive" alt="Manufactory">
						</div>
						<div class="slider-info">
							<h3>WELCOME TO SPORT POLL</h3>
							<div class="underline"></div>
							<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor et.</p>
							<div class="arrow">
								<img src="image/slide-icon-1.png" alt="Manufactory" class="limg" width="100">
							</div>
						</div>
					</li>

					<li>
						<div class="slider-img">
							<img src="image/slide-2.jpg" class="img-responsive" alt="Manufactory">
						</div>
						<div class="slider-info">
							<h3>SNOOKER POLL</h3>
							<div class="underline"></div>
							<p class="desc">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
							<div class="arrow">
								<img src="image/slide-icon-2.png" alt="Manufactory">
							</div>
						</div>
					</li>
                    <li>
						<div class="slider-img">
							<img src="image/slide-3.jpg" class="img-responsive" alt="Manufactory">
						</div>
						<div class="slider-info">
							<h3>FOOTBALL POLL</h3>
							<div class="underline"></div>
							<p class="desc">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
							<div class="arrow">
								<img src="image/slide-icon-3.png" alt="Manufactory">
							</div>
						</div>
					</li>

					

         </ul>
    </div>
    

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
        <h2>Chart of event</h2>
    			<canvas id="myChart" width="300" height="200"></canvas>
                
    		</div>
          

    	</div>
    </div> 
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
                     <th>Country</th>
                     
                     <th style="text-align:center;">Vote</th>
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
                      <td><?php echo $event['country'];?></td>
                     
                      <td style="text-align:center;">
                         <div>
                             <a href="?id=<?php echo $event['objectId'];?>&p=1" class="homev">Home</a>
                             <a href="?id=<?php echo $event['objectId'];?>&p=0" class="drawv">Draw</a>
                             <a href="?id=<?php echo $event['objectId'];?>&p=2" class="awayv">Away</a>
                         </div> 
                      </td> 
                       
                      </tr> 
                      <?php
                      $i++; } ?>
                      
                  </tbody> 
                  </table> 
                  <a href="#" class="votting" style="background:#333;">View All</a>
            <dir style="clear:both;"></dir>
    		</div>
    	</div>
    </div> 

    <div id="services" class=" about">
    	<h1>ABOUT Us</h1>
    		<p style="text-align:center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor et quidem
    		<br> rerum facilis est et expedita distinctio nam libero tempora.</p>
    		<div class="underline1"></div>
            <div class="container">
                 <div class="col-md-4 service">
                      <a href="#">
                     <img src="image/service-icon-1.png">
                     <h2>Sport Events</h2>
                     <div class="underline3"></div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor et.</p></a></div>
                 <div class="col-md-4 service">
                      <a href="#">
                     <img src="image/service-icon-2.png">
                     <h2>Snooker Events</h2>
                     <div class="underline3"></div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor et.</p></a></div>
                 <div class="col-md-4 service">
                     <a href="#">
                     <img src="image/service-icon-3.png">
                     <h2>FootBall Events</h2>
                     <div class="underline3"></div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor et.</p></a>
                <div class="espace"></div>
                </div>
            
        
        </div>
    
    	
    	
    </div> 

    <div class="contact">
      <div class="container">
    	   <h1>CONTACT US</h1>
           <div class="col-md-6 col-sm-6">
           <form id="formcontact" method="post">
              <label>Name:</label><br> <input type="text"><br>  
              <label>Email:</label> <br> <input type="text"><br>
              <label>Subject:</label><br> <input type="text" ><br>
              <label>Message:</label><br> <textarea rows="4" cols="50"></textarea><br>
              <button class="current" type="submit">Send</button>
              <div style="clear:both;"></div>
            </form>
             </div>  
            <div class="col-md-6 col-sm-6">
                 <h3 style="text-align: left;color: white;">Find Us</h3>
                     <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                     <div class="mymap" >
                     <div id='gmap_canvas' style='height:440px;width:100%;'></div>
                     <div><small><a href="http://googlemapsgenerator.com/">Incluez une carte Google sur votre site</a></small></div><div><small><a href="http://www.youtubeembedcode.com">Generate youtube code quick and easy</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(59.32932349999999,18.068580800000063),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(59.32932349999999,18.068580800000063)});infowindow = new google.maps.InfoWindow({content:'<strong>Titre</strong><br>Stockholm,Sweden<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                
                <div class="cord">
                     <h3>Sports Poll</h3>
                     
                     <label>Adress</label><address>Birger Jarlsgatan 18, 114 34 Stockholm</address>
                     <label>Phone</label><p>+46 xxx xxx xx</p>
                     <label>Mail</label><p>xxxxx@yyy.zzz</p>
                </div>
  
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