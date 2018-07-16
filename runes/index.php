<?php
session_start();
$region = $_SESSION['region'];
$reg = $_SESSION['reg'];
$summoner_id = $_SESSION['summoner_id'];
$summoner_name = $_SESSION['summoner_name'];
$summoner_level = $_SESSION['summoner_level'];
$summoner_icon = $_SESSION['summoner_icon'];
$icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$summoner_icon.'.png';

if(isset($_GET['runes'])){
	$split_runes = preg_split('/,/',$_GET['runes']);
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

    <title>Riot Games</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


</head>

<body>

     <div class="container">

           <img src="../img/banner.png" class="img-responsive">

        </div>

  <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" 
integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">


<!--search box-->








<div class="col-lg-12 col-sm-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <a href="<?php echo '../search/?region_val='.$region.'&name='.$summoner_name; ?>"><img alt="" src="<?php echo $icon_url; ?>"></a>
        </div>
        <div class="card-info">
        <span class="card-title"><a href="<?php echo '../search/?region_val='.$region.'&name='.$summoner_name; ?>"> <?php echo $summoner_name; ?></a></span>
        <span class="card-titles">(<?php echo $summoner_level; ?>)</span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="">Runes</div>
            </button>
        </div>
      
         <div class="btn-group" role="group">
            <a href="<?php echo '../search/?region_val='.$region.'&name='.$summoner_name; ?>" id="following" class="btn btn-default" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="">Home</div>
            </a>
        </div> 
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <div class="row">
                <div class="col-sm-12"> 

                    <!-- Begin Listing: 609 W GRAVERS LN-->
                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-10  property-listing" >
                        <div class="media" >
                            <div class="clearfix visible-sm"></div>
                            <div class=" media-body">

                            	<table class="table table-striped custab">
    <thead>
  
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <?php

                                	foreach ($split_runes as $key => $value) {

										$runes_url = 'https://'.$reg.'.api.pvp.net/api/lol/static-data/'.$region.'/v1.2/rune/'.$value.'?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
										if(@file_get_contents($runes_url)){
											  $json = file_get_contents($runes_url);
											$array = json_decode($json, true);
											if(isset($array['status'])){
											  echo "Rune not found!";
											}else{
												?>
            <tr>
                <td><?php echo $array['name']; ?></td>
                <td><?php echo $array['description']; ?></td>
                
            </tr>

            <?php
                                   }
                               }else{
                               	echo "";
                               }
                           }

                           ?>
            
            
    </table>

                            	
                            </div>
                           





                      </div>
                    </div><!-- End Listing-->

        </div>

        
      
      </div>
    </div>
    
    </div>
            
    


     

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
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
    </script>
</body>

</html>
