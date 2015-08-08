<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html');
header("Access-Control-Allow-Origin: *");
// session_save_path('/nfs/stak/students/l/liangt/php_sessions');
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pick for Success</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/functions.js"></script>
	<!-- Custom CSS -->
	<style>
		body {
		        padding-top: 70px;
		        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
		    }
	    </style>
	<title>Personality Test</title>
  <script src="https://cdn.traitify.com/js/widgets/v1.js"></script>
  <script src="main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>



	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Pick for Success</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



<div class="panel-group center-block" id="accordion" role="tablist" aria-multiselectable="true" style="width: 70%;">
    <div class="panel panel-default" style="border: 2px solid #33A6CC; border-radius: 5px;">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
            <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <strong>Personality Assessment ></strong>
            </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <p>This section will assess your personality traits and attributes to give you a list of careers that are a 
                    good fit for you.</p>
                <div id="assessmentJSON"></div>
				  <div id="slideDeck"></div>
				  <div id="careersJSON"></div>​

            </div>
        </div>
    </div>
    <div class="panel panel-default" style="border: 2px solid #33A6CC; border-radius: 5px;">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <strong>Fiscal Requirements ></strong>
            </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body" id="fiscalRequirements">
                <p>This section will help you to figure out the fiscal requirements that you will need to follow in order to have
                the lifestyle you desire.</p> 


                <!--<div class="input-group input-group-sm">
                  <span class="input-group-addon" id="sizing-addon3">Enter your ideal location (City Name)</span>
                  <input type="text" class="form-control" placeholder="Location" aria-describedby="sizing-addon3">
                </div>
                <div class="input-group input-group-sm">
                  <input type="submit" class="form-control" placeholder="Location" aria-describedby="sizing-addon3" onclick="getFiscalRequirements()">
                </div>-->

                <form onsubmit="getFiscalRequirements()">
                    <label>Enter your ideal location:</label><input type="text" placeholder="Location" id="Location"></input>
                    <br>
                    <input type="submit" value="Submit">
                </form>

                <div id="fiscal"></div>

            </div>
        </div>

    </div>
    <div class="panel panel-default" style="border: 2px solid #33A6CC; border-radius: 5px;">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
            <strong>Location ></strong>
            </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body" id="location">
            
            </div>
        </div>
    </div>
    <div class="panel panel-default" style="border: 2px solid #33A6CC; border-radius: 5px;">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
            <strong>Transcript Analysis ></strong>
            </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body" id="transcriptAnalysis">
                
            </div>
        </div>
    </div>
</div>



<script>

//function getFiscalRequirements() {
//    alert("Form submitted");
//    ajaxCall();
    //make ajax call
    
    //$.get("http://www.numbeo.com/api/city_prices?api_key=vr5x2c8nzqofyv&query=San+Francisco").done(function (data) {
     //   console.log(data);
    //});
    

//    trHTML = '<p>Fiscal data</p>';
//    var fiscalData = document.getElementById("fiscal");
//    fiscalData.innerHTML = trHTML;
//}


/*function getFiscalRequirements() {
    alert("In function");
    $.ajax({
        url: 'http://www.numbeo.com/api/city_prices?api_key=vr5x2c8nzqofyv&query=San+Francisco',
        type: 'GET',
        dataType: 'json',
        headers: 'Access-Control-Allow-Origin: *',
        success: function(data){
            alert("Success!");
            console.log(data);
        },
        error: function (){
            alert("Error");
        }

    });
    }*/

    function getFiscalRequirements() {
       $.ajax({
        headers: { "Accept": "application/json"},
            type: 'GET',
            url: 'http://www.numbeo.com/api/city_prices?api_key=vr5x2c8nzqofyv&query=San+Francisco',
            crossDomain: true,
            beforeSend: function(xhr){
                xhr.withCredentials = true;
          },
            success: function(data, textStatus, request){
                console.log(data);
            }
        }); 
    }
    
    

</script>

</body>
</html>
