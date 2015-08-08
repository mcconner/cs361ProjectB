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


<div class="container">
    <div class="col-xs-2"></div>
    <div class="col-xs-8">
    <h4>Welcome to Picking for Success! Complete the following four modules to the best of your ability and we will show you
    careers and college majors that are the best fit for YOU!</h4>
    </div>
    <div class="col-xs-2"></div>
</div>
<br><br>
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
                <p><strong>Please enter the following information</strong></p>

                <form onsubmit="return getFiscalRequirements()">
                    <table class="table" width="60%">
                    <tr><td align="right"><label>Expected retirement age:</label></td><td><input type="text" placeholder="Retirement Age" id="Location"></input></td></tr>
                    <tr><td align="right"><label>Housing arrangement:</label></td><td><input type="text" placeholder="Home, apartment, etc." id="Housing"></input></td></tr>
                    <tr><td colspan="2" align="center"><input type="submit" value="Submit"></td></tr>
                </table>
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
                This section will allow you to enter a location that you would like to live in, and it will be taken into consideration
                in the career calculation.

                <form onsubmit="return getLocationRequirements()">
                    <table class="table" width="60%">
                    <tr><td align="right"><label>Desired location (city):</label></td><td><input type="text" placeholder="Location" id="userLocation"></input></td></tr>
                    <tr><td colspan="2" align="center"><input type="submit" value="Submit"></td></tr>
                </table>
                </form>

                <div id="locationData"></div>
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
                This section will take your transcript information into account to determine possible scholarships you 
                may qualify for, your likelihood of admission into specific colleges, and aptitude.
            </div>
        </div>
    </div>
</div>



<script>

    function getLocationRequirements() {
        var userLocation = $('#userLocation').val();
        console.log(userLocation);
        alert("In function");
       $.ajax({
        headers: { "Accept": "application/json"},
            type: 'GET',
            dataType: 'json',
            //url: 'fiscal_data.php?location=San+Francisco',
            url: 'fiscal_data.php?location=' + userLocation,
            success: function(data, textStatus, request){
                console.log(data);
                //console.log(data.name);
                //console.log(data.prices[22].item_name);
                var trHTML = '<table class="table">';
                trHTML += '<tr><td>CPI and rent index</td><td>'+ data.cpi_and_rent_index +'</td></tr>'; 
                trHTML += '<tr><td>Restaurant index</td><td>'+ data.restaurant_price_index +'</td></tr>'; 
                trHTML += '<tr><td>Quality of life index</td><td>'+ data.quality_of_life_index +'</td></tr>'; 
                trHTML += '<tr><td>Safety index</td><td>'+ data.safety_index +'</td></tr>'; 
                //trHTML += '<tr><td>You selected:</td><td>'+ data.name +'</td></tr>';
                //trHTML += '<tr><td colspan="2"><strong> Average Cost Information: </strong></td></tr>';
                //for (var i=0; i<data.prices.length; i++){
                //    trHTML += '<tr><td>'+data.prices[i].item_name+'</td><td>'+ data.prices[i].average_price +'</td></tr>';  
                //}
                trHTML += '</table>';
                var locationInfo = document.getElementById("locationData");
                locationInfo.innerHTML = trHTML;
            }
        }); 
	return false;
    }

    
    

</script>

</body>
</html>
