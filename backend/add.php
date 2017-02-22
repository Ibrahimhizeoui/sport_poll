<?php 
 function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//echo generateRandomString();

if (isset($_POST)) {
    if (isset($_POST['submit'])) {
        # code...
    

   require_once("connect.php");
              $x=generateRandomString();
              $sp=$_POST['sport'];
              $name=$_POST['name'];
              $hn=$_POST['homeName'];
              $an=$_POST['awayName'];
              $gr=$_POST['group'];
              $st=$_POST['state'];
              $count=$_POST['country'];
              $dt=$_POST['createAt'];
              $selectAll=$pdo->prepare("INSERT INTO `sports_poll`.`events` VALUES (NULL,  '$x', '$sp', '$name', '$hn', '$an', '$gr', '$st', '', '');
");
              $selectAll->execute();
    # code...
}}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Event | Sports Poll</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css" 	type="text/css" media="all">
	<link rel="stylesheet" href="css/themes.css">
   
   
	<style type="text/css">
		input,select{
            float: right;
    /* text-align: right; */
    border: 2px solid #FF5252;
    width: 40%;
    margin-right: 20px;
        }
        label{
            margin-left: 200px;
        }
        .sub {
    padding: 15px 20px 15px 20px;
    background: #FF5252;
    color: white;
    border: none;
    font-size: 14px;
    
    font-weight: bolder;
}
	</style>
</head>
<body>
<div id="left">
    <div class="menu" >
            <img src="image/logo.png">
               <nav class="">
                     <ul>
                        <li class="active" ><a id="home" href="admin.php">Home</a></li>
                        <li><a href="#" id="open">Opend</a></li>
                        <li><a href="#" id="finish">Finished</a></li>
                        
                    </ul>
                </nav>
                <div style="clear:both;"></div>
                <a href="#" class="import">Import JSON</a>
                <img src="image/ajax.gif" class="bb" style="display:none">
              </div>

</div>
<div id="right">
     <div class="content">
     <h1 style="margin:30px;">ADD EVENT</h1>
         <div class="col-md-8 col-sm-8">
                
                <div id="poll_form">

                     <form method="post" action="">
                           <ul class="event">
                                   <li class="team"><label>Name:  </label><input type="text" name="name"></li>
                                  <li class="team"><label>Home Name:   </label><input type="text" name="homeName"></li>
                                   <li class="team"><label>Away Name:  </label><input type="text" name="awayName"></li>
                                  <li class="team"><label>Sport:  </label><input type="text" name="sport"></li>
                                  <li class="team"><label>Competition:   </label><input type="text" name="group"></li>
                                  <li class="team"><label>State:  </label>
                                  <select name="state">
                                      <option value="NOT_STARTED">NOT STARTED</option>
                                      <option value="STARTED">STARTED</option>
                                      <option value="FINISHED">FINISHED</option>

                                  </select>

                                  </li>
                                  <li class="team"><label>Country:  </label><input type="text" name="country"></li>
                                  <li class="team"><label>Create At:  </label> <input type="date" name="createAt"></li>
                                  <li class="team"><label>  </label> <input type="submit" name="submit" value="Add Event" class="sub" width="100"></li>
                                  
                                  
                             </ul> </form></div>
     	
     </div>


</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
   

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

    $("#open").click(function(){
    	$(".content").load('opened.php');
    });

    $("#finish").click(function(){
    	$(".content").load('finished.php');
    });

    $(".add").click(function(){
    	$(".content").load('finished.php');
    });

</script>
</body>
</html>