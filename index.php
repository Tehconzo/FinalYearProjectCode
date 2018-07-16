<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Riot Games</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


</head>

<body>

   
    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <form action="search/" method="post" onsubmit="validate_form()">
                       <?php
                        if (isset($_GET['not_found'])) {
                            echo $_GET['not_found'];
                        }
                        ?>
                     <div class="input-group">
                        


                     	<input type="text" id="user_name" name="user_name" class="form-control" placeholder="Please enter summoner name.." style="height: 40px" required>
                        <input type="hidden" id="region_val" name="region_val">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" style="height: 40px" >Go!</button>
                      </span>
                    </div><!-- /input-group -->
                

                      </div>

                      <div class="col-md-3"></div>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>

                                <a href="#" class="btn btn-default btn-lg" onclick="set_na()"> 
                                	<span id="na" class="network-name" >North American</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg" onclick="set_ew()"> 
                                	<span id="ew" class="network-name" >Europe West</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg" onclick="set_kr()">
                                	<span id="kr" class="network-name" >Korea</span></a>
                            </li>
                        </ul>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Riot Games 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<script type="text/javascript">
	function set_na () {
		var val = document.getElementById('na').innerHTML;
		document.getElementById('region_val').value = val;
	}
	function set_ew () {
		var val = document.getElementById('ew').innerHTML;
		document.getElementById('region_val').value = val;
	}
	function set_kr () {
		var val = document.getElementById('kr').innerHTML;
		document.getElementById('region_val').value = val;
	}

	function validate_form(){
		var  is_set_region = document.getElementById('region_val').value;
		if(is_set_region == ''){
			alert("Please select region");
			location.reload();
		}
	}
</script>
