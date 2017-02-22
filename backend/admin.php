
<!DOCTYPE html>
<html>
<head>
	<title>Admistation | Sports Poll</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css" 	type="text/css" media="all">
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
                        <li><a href="#" id="open">Opend</a></li>
                        <li><a href="#" id="finish">Finished</a></li>
                        
                    </ul>
                </nav>
                <div style="clear:both;"></div>
                <a href="#" class="import">Import JSON</a>
                
              </div>

</div>
<div id="right">
     <div class="content">
     	
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
                            location.reload();
                            
                           
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