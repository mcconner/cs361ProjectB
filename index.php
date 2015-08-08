<?php
session_save_path('/nfs/stak/students/p/pattejon/php_sessions');
session_start();
if(isset($_SESSION['User'])) {
  //Send user back to main page
  header("Location: main.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pick for Success</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

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

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Get Help Picking a College Major</h1>
                <h3>choose a major that will start you on the path to success!</h3>
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">First time here?</h3>
                        </div>
                        <div class="panel-body">
                            <form id="register" class="form-signin" role="form">
                                <div class="form-group">
                                    <label for="newuseremail">Your Email Address</label>
                                    <input type="email" class="form-control" id="newuseremail" name="newuseremail" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="newuserpassword">Password</label>
                                    <input type="password" class="form-control" id="newuserpassword" name="newuserpassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="newuserconfirm">Confirm</label>
                                    <input type="password" class="form-control" id="newuserconfirm" name="newuserconfirm" placeholder="Confirm">
                                </div>
                                <p id="r-alerts"></p>
                                <button type="submit" class="btn btn-md btn-success btn-block">Get Started!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Already a user?</h3>
                        </div>
                        <div class="panel-body">
                            <form id="login" class="form-signin" role="form">
                                <div class="form-group">
                                    <label for="useremail">Email Address</label>
                                    <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Password">
                                </div>
                                <p id="l-alerts"></p>
                                <button type="submit" class="btn btn-md btn-primary btn-block">Submit</button>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Fun functions for us -->
    <script src="js/functions.js"></script>
</body>
</html>
