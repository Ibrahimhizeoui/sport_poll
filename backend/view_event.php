<!DOCTYPE html>
<html>
<head>
  <title>Admistation | Sports Poll</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css" media="all">
  <link rel="stylesheet" href="css/themes.css">
    <link rel="stylesheet" href="css/responsiveslides.css">
   
  <style type="text/css">
    
  </style>
</head>
<body>
<div id="left">
    <div class="menu" >
            <img src="image/logo.png">
               <nav class="">
                     <ul>
                        <li class="active" ><a id="home" href="#">Home</a></li>
                        <li><a>Lastest</a></li>
                        <li><a>All</a></li>
                        <li><a>About</a></li>
                        <li><a>Contact</a></li>
                    </ul>
                </nav>
                <div style="clear:both;"></div>
                <a href="#" class="import">Import JSON</a>
                <img src="image/ajax.gif" class="bb" style="display:none">
              </div>

</div>
<div id="right">
     <div class="new_poll" id="new_poll" style="margin: 50px;">
       <?php 
            if (isset($_GET['ev'])) {
              $objectId=$_GET['ev'];
              require_once("connect.php");
              $selectAll=$pdo->prepare("select * from events where objectId='$objectId'");
              $selectAll->execute();
              $event=$selectAll->fetch();
              

           
       ?>
            <h1 style="margin: 50px;"><?php echo $event['homeName'];?> <span class="vs">Vs</span><?php echo $event['awayName'];?></h1>
        
        <div class="col-md-4 col-sm-6">
                
                <div id="poll_form">
                     <form >
                           <ul class="event">
                                  <li class="team"><label>Event Number:  </label><?php echo $event['id'];?></li>
                                  <li class="team"><label>Sport:  </label><?php echo $event['sport'];?></li>
                                  <li class="team"><label>Competition:   </label><?php echo $event['group'];?></li>
                                  <li class="team"><label>Country:  </label><?php echo $event['country'];?></li>
                                  <li class="team"><label>Sport:  </label><?php echo $event['state'];?></li>
                                  
                                  <li class="team"><label>Sport:  </label><?php echo $event['createdAt'];?></li>
                                  
                             </ul>   <br>
                          <?php
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
                          <div class="team">
                                <label for="home" style="color: #333;border-bottom:2px solid #333 ;">Total polls :</label><?php echo $count['total']?>
                          </div>

                          <div class="team">
                                <label for="home" style="color: #54c9e9";>Home Team win </label>(<?php echo $home['total']?>)
                          </div>

                          <div class="team">
                                <label for="draw" style="color: #c4e954;">Draw</label>(<?php echo $draw['total']?>)
                          </div>

                          <div class="team">
                                <label for="away" style="color: #FF5252;">Away Team win</label>(<?php echo $away['total']?>)
                          </div>

                       

                            
                          
                     </form>
                </div>

                 
                
        </div>
        <div class="col-md-6 col-sm-6 about-grid about-image">
          <canvas id="myChart" width="300" height="200"></canvas>
                
        </div>
     </div>
    

</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    $(".content").load('events.php');
  $(".import").click(function(){
    $.ajax({url: "import.php",
      beforeSend: function(){
                            console.log('charge');
                            $('.bb').css( "display", "initial" );
                        },
                        success: function(data){
                            $('.bb').css( "display", "none" );
                            
                           
                            },
                        error: function (xhr, ajaxOptions, thrownError) {
                                 console.log(xhr.status);
                                 console.log(xhr.responseText);
                                 alert(xhr.responseText);
                                 alert(xhr.status);
                                 alert(xhr.thrownError);
                                 console.log(thrownError);
                                 $('.bb').css( "display", "none" );
                            },


     });
    
});
  $("#home").click(function(){
      $(".content").load('events.php');
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
            data: [ <?php echo $home['total']?>, <?php echo $draw['total']?>, <?php echo $away['total']?>],
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
 <?php  }else
       header('admin.php');?>
