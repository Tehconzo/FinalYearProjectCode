<?php
session_start();
// * Platform Id link https://developer.riotgames.com/spectating-games.html
//<input value="<?php echo (isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''); 
if(isset($_POST['region_val'])){
  if($_POST['region_val'] == 'North American'){
    $region = 'NA';
    $reg = 'na';
    $platformId = 'NA1';
    $domain = 'spectator.na.lol.riotgames.com';
    $port = '80';
  }elseif ($_POST['region_val'] == 'Europe West') {
    $region = 'EUW';
    $reg = 'euw';
    $platformId = 'EUW1';
    $domain = 'spectator.euw1.lol.riotgames.com';
    $port = '80';
  }elseif ($_POST['region_val'] == 'Korea') {
    $region = 'KR';
    $reg = 'kr';
    $platformId = 'KR';
    $domain = 'spectator.kr.lol.riotgames.com';
    $port = '80';
  }
  $summoner_name = $_POST['user_name'];
}elseif (isset($_GET['region_val']) && isset($_GET['name'])) {
  $region = $_GET['region_val'];
  $reg = strtolower($_GET['region_val']);
  if($_GET['region_val'] == 'North American' || $_GET['region_val'] == 'NA'){
    $region = 'NA';
    $reg = 'na';
    $platformId = 'NA1';
    $domain = 'spectator.na.lol.riotgames.com';
    $port = '80';
  }elseif ($_GET['region_val'] == 'Europe West' || $_GET['region_val'] == 'EUW') {
    $region = 'EUW';
    $reg = 'euw';
    $platformId = 'EUW1';
    $domain = 'spectator.euw1.lol.riotgames.com';
    $port = '80';
  }elseif ($_GET['region_val'] == 'Korea' || $_GET['region_val'] == 'KR') {
    $region = 'KR';
    $reg = 'kr';
    $platformId = 'KR';
    $domain = 'spectator.kr.lol.riotgames.com';
    $port = '80';
  }
  $summoner_name = $_GET['name'];
}

$_SESSION['region'] = $region;
$_SESSION['reg'] = $reg;


$url = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.4/summoner/by-name/'.$summoner_name.'?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
if(@file_get_contents($url)){
  $json = file_get_contents($url);
$array = json_decode($json, true);
$name = strtolower($summoner_name);
if(isset($array['status'])){
  echo "Url Not Found";
}else{
  $summoner_id = $array[$name]['id'];
  $summoner_name = $array[$name]['name'];
  $summoner_icon = $array[$name]['profileIconId'];
  $summoner_level = $array[$name]['summonerLevel'];
  $_SESSION['summoner_id'] = $summoner_id;
  $_SESSION['summoner_name'] = $summoner_name;
  $_SESSION['summoner_icon'] = $summoner_icon;
  $_SESSION['summoner_level'] = $summoner_level;
  $url1 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
  $icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$summoner_icon.'.png';
  if(@file_get_contents($url1)){
    $json1 = file_get_contents($url1);
    $array1 = json_decode($json1, true);
    // echo "10 Recent Games<br>";
    // echo "Name: ".$summoner_name."<br>";
    // echo "<img src='$icon_url'>";
    
    // echo count($array1['games']);
    // echo $array1['games'][0]['level'];
  }else{
    header("location: ../?not_found=Sorry, requested summoner not found!");
  }

}
}else{
  header("location: ../?not_found=Sorry, requested summoner not found!");
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
            <img alt="" src="<?=$icon_url?>">
        </div>
        <div class="card-info">
         <span class="card-title"><?php echo $summoner_name; ?></span>
        <span class="card-titles">(<?php echo "&nbsp;Level : ".$summoner_level; ?>)</span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="">Summary</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="">Live Game</div>
            </button>
        </div>
        
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <div class="row">
                <div class="col-sm-12"> 
                  <?php

                  foreach ($array1['games'] as $key => $value) {
                    $win = $array1['games'][$key]['stats']['win'];
                    $game_mode = $array1['games'][$key]['gameMode'];
                    $game_level = $array1['games'][$key]['stats']['level'];
                    if (array_key_exists('fellowPlayers', $array1['games'][$key])) {
                        $array_count = count($array1['games'][$key]['fellowPlayers']);
                        if( $array_count == 9){


                    $fellow1_champion_id = $array1['games'][$key]['fellowPlayers'][0]['championId'];
                    $fellow2_champion_id = $array1['games'][$key]['fellowPlayers'][1]['championId'];
                    $fellow3_champion_id = $array1['games'][$key]['fellowPlayers'][2]['championId'];
                    $fellow4_champion_id = $array1['games'][$key]['fellowPlayers'][3]['championId'];
                    $fellow5_champion_id = $array1['games'][$key]['fellowPlayers'][4]['championId'];
                    $fellow6_champion_id = $array1['games'][$key]['fellowPlayers'][5]['championId'];
                    $fellow7_champion_id = $array1['games'][$key]['fellowPlayers'][6]['championId'];
                    $fellow8_champion_id = $array1['games'][$key]['fellowPlayers'][7]['championId'];
                    $fellow9_champion_id = $array1['games'][$key]['fellowPlayers'][8]['championId'];

                    $fellow1_summoner_id = $array1['games'][$key]['fellowPlayers'][0]['summonerId'];
                    $fellow2_summoner_id = $array1['games'][$key]['fellowPlayers'][1]['summonerId'];
                    $fellow3_summoner_id = $array1['games'][$key]['fellowPlayers'][2]['summonerId'];
                    $fellow4_summoner_id = $array1['games'][$key]['fellowPlayers'][3]['summonerId'];
                    $fellow5_summoner_id = $array1['games'][$key]['fellowPlayers'][4]['summonerId'];
                    $fellow6_summoner_id = $array1['games'][$key]['fellowPlayers'][5]['summonerId'];
                    $fellow7_summoner_id = $array1['games'][$key]['fellowPlayers'][6]['summonerId'];
                    $fellow8_summoner_id = $array1['games'][$key]['fellowPlayers'][7]['summonerId'];
                    $fellow9_summoner_id = $array1['games'][$key]['fellowPlayers'][8]['summonerId'];

                    $fellow_summoners_ids = $fellow1_summoner_id.','.$fellow2_summoner_id.','.$fellow3_summoner_id.','.$fellow4_summoner_id.','.
                                        $fellow5_summoner_id.','.$fellow6_summoner_id.','.$fellow7_summoner_id.','.$fellow8_summoner_id.','.
                                        $fellow9_summoner_id;



                    // $fellow_url1 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$fellow1_summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
                    // $fellow_url2 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$fellow1_summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
                    // $fellow_url3 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$fellow1_summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
                    // $fellow_url4 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$fellow1_summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
                    // $fellow_url5 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$fellow1_summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
                    // $fellow_url6 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$fellow1_summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
                    // $fellow_url7 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$fellow1_summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
                    // $fellow_url8 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$fellow1_summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
                    // $fellow_url9 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$fellow1_summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';

                    $fellows_url = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.4/summoner/'.$fellow_summoners_ids.'?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
                    if(@file_get_contents($fellows_url)){
                        $fellows_json = file_get_contents($fellows_url);
                        $fellows_array = json_decode($fellows_json, true);

                        // foreach ($fellows_array as $key => $value) {
                        //   echo $value['name'];
                        // }
                        // if(isset($fellows_array['status'])){
                        //   echo "Url Not Found";
                        // }else{

                        $fellow1_name = $fellows_array[$fellow1_summoner_id]['name'];
                        $fellow1_profile_icon = $fellows_array[$fellow1_summoner_id]['profileIconId'];
                        $fellow1_icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$fellow1_profile_icon.'.png';

                        $fellow2_name = $fellows_array[$fellow2_summoner_id]['name'];
                        $fellow2_profile_icon = $fellows_array[$fellow2_summoner_id]['profileIconId'];
                        $fellow2_icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$fellow2_profile_icon.'.png';

                        $fellow3_name = $fellows_array[$fellow3_summoner_id]['name'];
                        $fellow3_profile_icon = $fellows_array[$fellow3_summoner_id]['profileIconId'];
                        $fellow3_icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$fellow3_profile_icon.'.png';

                        $fellow4_name = $fellows_array[$fellow4_summoner_id]['name'];
                        $fellow4_profile_icon = $fellows_array[$fellow4_summoner_id]['profileIconId'];
                        $fellow4_icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$fellow4_profile_icon.'.png';

                        $fellow5_name = $fellows_array[$fellow5_summoner_id]['name'];
                        $fellow5_profile_icon = $fellows_array[$fellow5_summoner_id]['profileIconId'];
                        $fellow5_icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$fellow5_profile_icon.'.png';

                        $fellow6_name = $fellows_array[$fellow6_summoner_id]['name'];
                        $fellow6_profile_icon = $fellows_array[$fellow6_summoner_id]['profileIconId'];
                        $fellow6_icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$fellow6_profile_icon.'.png';

                        $fellow7_name = $fellows_array[$fellow7_summoner_id]['name'];
                        $fellow7_profile_icon = $fellows_array[$fellow7_summoner_id]['profileIconId'];
                        $fellow7_icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$fellow7_profile_icon.'.png';

                        $fellow8_name = $fellows_array[$fellow8_summoner_id]['name'];
                        $fellow8_profile_icon = $fellows_array[$fellow8_summoner_id]['profileIconId'];
                        $fellow8_icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$fellow8_profile_icon.'.png';

                        $fellow9_name = $fellows_array[$fellow9_summoner_id]['name'];
                        $fellow9_profile_icon = $fellows_array[$fellow9_summoner_id]['profileIconId'];
                        $fellow9_icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$fellow9_profile_icon.'.png';
                    }

                    
                    
                    if($win){
                  ?>
                    <!-- Begin Listing: 609 W GRAVERS LN-->
                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-10 win property-listing" >
                        <div class="media" >
                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller row">
                                 <div class="col-md-3">
                                <h4 class="media-heading ">
                                  <a target="_parent"><?php echo $game_mode; ?><small class="pull-right">Victory</small></a></h4>
                                  

                                 </div>
                                <ul class=" mrg-0 btm-mrg-10 col-md-2 clr-535353" style="list-style: none">
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$summoner_name; ?>'><img src="<?=$icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $summoner_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow1_name; ?>'><img src="<?=$fellow1_icon_url?>" class="summoner">&nbsp;&nbsp;<?php echo $fellow1_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow2_name; ?>'><img src="<?=$fellow2_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow2_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow3_name; ?>'><img src="<?=$fellow3_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow3_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow4_name; ?>'><img src="<?=$fellow4_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow4_name; ?></a></li>
                                    
                                </ul>

                                 <ul class=" mrg-0 btm-mrg-10 col-md-2  clr-535353" style="list-style: none">
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow5_name; ?>'><img src="<?=$fellow5_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow5_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow6_name; ?>'><img src="<?=$fellow6_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow6_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow7_name; ?>'><img src="<?=$fellow7_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow7_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow8_name; ?>'><img src="<?=$fellow8_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow8_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow9_name; ?>'><img src="<?=$fellow9_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow9_name; ?></a></li>
                                </ul>

                            </div>
                        </div>
                    </div><!-- End Listing-->
                    <?php
                    }
                    else{
                    ?>
                    
      
                    



                     <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 loss property-listing" >
                        <div class="media" >
                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller row">
                                 <div class="col-md-3">
                                <h4 class="media-heading ">
                                  <a target="_parent"><?php echo $game_mode; ?><small class="pull-right">Defeat</small></a></h4>
                                  <p>Game level&nbsp; : &nbsp; <?php echo $game_level; ?></p>

                                 </div>
                                <ul class=" mrg-0 btm-mrg-10 col-md-2 clr-535353" style="list-style: none">
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$summoner_name; ?>'><img src="<?=$icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $summoner_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow1_name; ?>'><img src="<?=$fellow1_icon_url?>" class="summoner">&nbsp;&nbsp;<?php echo $fellow1_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow2_name; ?>'><img src="<?=$fellow2_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow2_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow3_name; ?>'><img src="<?=$fellow3_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow3_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow4_name; ?>'><img src="<?=$fellow4_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow4_name; ?></a></li>
                                    
                                </ul>

                                 <ul class=" mrg-0 btm-mrg-10 col-md-2  clr-535353" style="list-style: none">
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow5_name; ?>'><img src="<?=$fellow5_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow5_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow6_name; ?>'><img src="<?=$fellow6_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow6_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow7_name; ?>'><img src="<?=$fellow7_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow7_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow8_name; ?>'><img src="<?=$fellow8_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow8_name; ?></a></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$fellow9_name; ?>'><img src="<?=$fellow9_icon_url?>"  class="summoner">&nbsp;&nbsp;<?php echo $fellow9_name; ?></a></li>
                                </ul>

                            </div>
                        </div>
                    </div><!-- End Listing-->

                    <?php
                    }
                        echo "";
                    }else{
                        echo "";
                    }
                    }
                    }

                    ?>


                      </div>
                    </div><!-- End Listing-->

        </div>


        
        <div class="tab-pane fade in" id="tab2">
          <?php
$current_game_url = 'https://'.$reg.'.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/'.$platformId.'/'.$summoner_id.'?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
if(@file_get_contents($current_game_url)){
            $current_game_json = file_get_contents($current_game_url);
            $array_cg = json_decode($current_game_json, true);
            if(isset($array_cg ['status'])){
               echo "data nai lab aaa";
            }else{

                $gameId = $array_cg['gameId'];
                $mapId = $array_cg['mapId'];
                $game_mode = $array_cg['gameMode']; 
                $participants1_team_id =  $array_cg['participants'][1]['teamId'];
                $participants3_team_id =  $array_cg['participants'][2]['teamId'];
                $participants4_team_id =  $array_cg['participants'][3]['teamId'];
                $participants5_team_id =  $array_cg['participants'][4]['teamId'];
                $participants6_team_id =  $array_cg['participants'][5]['teamId'];
                $participants7_team_id =  $array_cg['participants'][6]['teamId'];
                $participants8_team_id =  $array_cg['participants'][8]['teamId'];
                $participants10_team_id =  $array_cg['participants'][9]['teamId'];



                $participants1_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][0]['profileIconId'].".png";
                $participants2_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][1]['profileIconId'].".png";
                $participants3_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][2]['profileIconId'].".png";
                $participants4_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][3]['profileIconId'].".png";
                $participants5_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][4]['profileIconId'].".png";
                $participants6_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][5]['profileIconId'].".png";
                $participants7_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][6]['profileIconId'].".png";
                $participants8_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][7]['profileIconId'].".png";
                $participants9_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][8]['profileIconId'].".png";
                $participants10_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][9]['profileIconId'].".png";


                $participants1_summoner_name =  $array_cg['participants'][0]['summonerName'];
                $participants2_summoner_name =  $array_cg['participants'][1]['summonerName'];
                $participants3_summoner_name =  $array_cg['participants'][2]['summonerName'];
                $participants4_summoner_name =  $array_cg['participants'][3]['summonerName'];
                $participants5_summoner_name =  $array_cg['participants'][4]['summonerName'];
                $participants6_summoner_name =  $array_cg['participants'][5]['summonerName'];
                $participants7_summoner_name =  $array_cg['participants'][6]['summonerName'];
                $participants8_summoner_name =  $array_cg['participants'][7]['summonerName'];
                $participants9_summoner_name=  $array_cg['participants'][8]['summonerName'];
                $participants10_summoner_name =  $array_cg['participants'][9]['summonerName'];


                $participants1_summoner_id =  $array_cg['participants'][0]['summonerId'];
                $participants2_summoner_id =  $array_cg['participants'][1]['summonerId'];
                $participants3_summoner_id =  $array_cg['participants'][2]['summonerId'];
                $participants4_summoner_id =  $array_cg['participants'][3]['summonerId'];
                $participants5_summoner_id =  $array_cg['participants'][4]['summonerId'];
                $participants6_summoner_id =  $array_cg['participants'][5]['summonerId'];
                $participants7_summoner_id =  $array_cg['participants'][6]['summonerId'];
                $participants8_summoner_id =  $array_cg['participants'][7]['summonerId'];
                $participants9_summoner_id=  $array_cg['participants'][8]['summonerId'];
                $participants10_summoner_id =  $array_cg['participants'][9]['summonerId'];

                $participants1_rune_id = 0;
                foreach ($array_cg['participants'][0]['runes'] as $key => $value) {
                    if($participants1_rune_id == 0){
                        $participants1_rune_id = $value['runeId'];
                    }else{
                        $participants1_rune_id = $participants1_rune_id.",".$value['runeId'];
                    }
                }


                $participants2_rune_id = 0;
                foreach ($array_cg['participants'][1]['runes'] as $key => $value) {
                    if($participants2_rune_id == 0){
                        $participants2_rune_id = $value['runeId'];
                    }else{
                        $participants2_rune_id = $participants2_rune_id.",".$value['runeId'];
                    }
                }

                $participants3_rune_id = 0;
                foreach ($array_cg['participants'][2]['runes'] as $key => $value) {
                    if($participants3_rune_id == 0){
                        $participants3_rune_id = $value['runeId'];
                    }else{
                        $participants3_rune_id = $participants3_rune_id.",".$value['runeId'];
                    }
                }

                $participants4_rune_id = 0;
                foreach ($array_cg['participants'][3]['runes'] as $key => $value) {
                    if($participants4_rune_id == 0){
                        $participants4_rune_id = $value['runeId'];
                    }else{
                        $participants4_rune_id = $participants4_rune_id.",".$value['runeId'];
                    }
                }


                $participants5_rune_id = 0;
                foreach ($array_cg['participants'][4]['runes'] as $key => $value) {
                    if($participants5_rune_id == 0){
                        $participants5_rune_id = $value['runeId'];
                    }else{
                        $participants5_rune_id = $participants5_rune_id.",".$value['runeId'];
                    }
                }

                $participants6_rune_id = 0;
                foreach ($array_cg['participants'][5]['runes'] as $key => $value) {
                    if($participants6_rune_id == 0){
                        $participants6_rune_id = $value['runeId'];
                    }else{
                        $participants6_rune_id = $participants6_rune_id.",".$value['runeId'];
                    }
                }

                $participants7_rune_id = 0;
                foreach ($array_cg['participants'][6]['runes'] as $key => $value) {
                    if($participants7_rune_id == 0){
                        $participants7_rune_id = $value['runeId'];
                    }else{
                        $participants7_rune_id = $participants7_rune_id.",".$value['runeId'];
                    }
                }


                $participants8_rune_id = 0;
                foreach ($array_cg['participants'][7]['runes'] as $key => $value) {
                    if($participants8_rune_id == 0){
                        $participants8_rune_id = $value['runeId'];
                    }else{
                        $participants8_rune_id = $participants8_rune_id.",".$value['runeId'];
                    }
                }

                $participants9_rune_id = 0;
                foreach ($array_cg['participants'][8]['runes'] as $key => $value) {
                    if($participants9_rune_id == 0){
                        $participants9_rune_id = $value['runeId'];
                    }else{
                        $participants9_rune_id = $participants9_rune_id.",".$value['runeId'];
                    }
                }

                $participants10_rune_id = 0;
                foreach ($array_cg['participants'][9]['runes'] as $key => $value) {
                    if($participants10_rune_id == 0){
                        $participants10_rune_id = $value['runeId'];
                    }else{
                        $participants10_rune_id = $participants10_rune_id.",".$value['runeId'];
                    }
                }


                

                $participants1_mastery_id = '';
                foreach ($array_cg['participants'][0]['masteries'] as $key => $value) {
                    if($participants1_mastery_id == ''){
                        $participants1_mastery_id = $value['masteryId'];
                    }else{
                        $participants1_mastery_id = $participants1_mastery_id.",".$value['masteryId'];
                    }
                }

                $participants2_mastery_id = '';
                foreach ($array_cg['participants'][1]['masteries'] as $key => $value) {
                    if($participants2_mastery_id == ''){
                        $participants2_mastery_id = $value['masteryId'];
                    }else{
                        $participants2_mastery_id = $participants2_mastery_id.",".$value['masteryId'];
                    }
                }
                $participants3_mastery_id = '';
                foreach ($array_cg['participants'][2]['masteries'] as $key => $value) {
                    if($participants3_mastery_id == ''){
                        $participants3_mastery_id = $value['masteryId'];
                    }else{
                        $participants3_mastery_id = $participants3_mastery_id.",".$value['masteryId'];
                    }
                }
                $participants4_mastery_id = '';
                foreach ($array_cg['participants'][3]['masteries'] as $key => $value) {
                    if($participants4_mastery_id == ''){
                        $participants4_mastery_id = $value['masteryId'];
                    }else{
                        $participants4_mastery_id = $participants4_mastery_id.",".$value['masteryId'];
                    }
                }
                $participants5_mastery_id = '';
                foreach ($array_cg['participants'][4]['masteries'] as $key => $value) {
                    if($participants5_mastery_id == ''){
                        $participants5_mastery_id = $value['masteryId'];
                    }else{
                        $participants5_mastery_id = $participants5_mastery_id.",".$value['masteryId'];
                    }
                }
                $participants6_mastery_id = '';
                foreach ($array_cg['participants'][5]['masteries'] as $key => $value) {
                    if($participants6_mastery_id == ''){
                        $participants6_mastery_id = $value['masteryId'];
                    }else{
                        $participants6_mastery_id = $participants6_mastery_id.",".$value['masteryId'];
                    }
                }
                $participants7_mastery_id = '';
                foreach ($array_cg['participants'][6]['masteries'] as $key => $value) {
                    if($participants7_mastery_id == ''){
                        $participants7_mastery_id = $value['masteryId'];
                    }else{
                        $participants7_mastery_id = $participants7_mastery_id.",".$value['masteryId'];
                    }
                }
                $participants8_mastery_id = '';
                foreach ($array_cg['participants'][7]['masteries'] as $key => $value) {
                    if($participants8_mastery_id == ''){
                        $participants8_mastery_id = $value['masteryId'];
                    }else{
                        $participants8_mastery_id = $participants8_mastery_id.",".$value['masteryId'];
                    }
                }
                $participants9_mastery_id = '';
                foreach ($array_cg['participants'][8]['masteries'] as $key => $value) {
                    if($participants9_mastery_id == ''){
                        $participants9_mastery_id = $value['masteryId'];
                    }else{
                        $participants9_mastery_id = $participants9_mastery_id.",".$value['masteryId'];
                    }
                }
                $participants10_mastery_id = '';
                foreach ($array_cg['participants'][9]['masteries'] as $key => $value) {
                    if($participants10_mastery_id == ''){
                        $participants10_mastery_id = $value['masteryId'];
                    }else{
                        $participants10_mastery_id = $participants10_mastery_id.",".$value['masteryId'];
                    }
                }

                ?>


                <div class="row">
                <div class="col-sm-12"> 
                  <h4 class="media-heading ">
                                  <a target="_parent">Game Mode</a></h4>
                </div>
                </div>
          <div class="row">
                <div class="col-sm-12"> 
                       
                    <!-- Begin Listing: 609 W GRAVERS LN-->
                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-10 win property-listing" >
                        <div class="media" >
                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller row">
                                <ul class=" mrg-0 btm-mrg-10 col-md-3 clr-535353" style="list-style: none">
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants1_summoner_name; ?>'><img src="<?=$participants1_icon_url?>"  class="summoner"> <?php echo $participants1_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants2_summoner_name; ?>'><img src="<?=$participants2_icon_url?>" class="summoner"> <?php echo $participants2_summoner_name; ?></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants3_summoner_name; ?>'><img src="<?=$participants3_icon_url?>" class="summoner"> <?php echo $participants3_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants4_summoner_name; ?>'><img src="<?=$participants4_icon_url?>"  class="summoner"> <?php echo $participants4_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants5_summoner_name; ?>'><img src="<?=$participants5_icon_url?>" class="summoner"> <?php echo $participants5_summoner_name; ?></li>
                                </ul>

                                 <ul class=" mrg-0 btm-mrg-10 col-md-2 clr-535353" style="list-style: none">
                                    <li style="margin-bottom: 3px;"><a   href="<?php echo '../runes/?runes='.$participants1_rune_id; ?>" > Runes</a></li>
                                         <li style="margin-bottom: 3px;"><a   href="<?php echo '../runes/?runes='.$participants2_rune_id; ?>" > Runes</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo '../runes/?runes='.$participants3_rune_id; ?>" >Runes</a></li>
                                        <li style="margin-bottom: 3px;"><a   href="<?php echo '../runes/?runes='.$participants4_rune_id; ?>" > Runes</a></li>
                                         <li style="margin-bottom: 3px;"><a   href="<?php echo '../runes/?runes='.$participants5_rune_id; ?>" >Runes</a></li>
                                </ul>

                                 <ul class=" mrg-0 btm-mrg-10 col-md-3 clr-535353" style="list-style: none">
                                        <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants1_mastery_id; ?>" > Masteries</a></li>
                                       <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants2_mastery_id; ?>" > Masteries</a></li>
                                      <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants3_mastery_id; ?>"  > Masteries</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants4_mastery_id; ?>"  > Masteries</a></li>
                                         <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants5_mastery_id; ?>" > Masteries</a></li>
                                </ul>

                                

                            </div>
                        </div>
                    </div><!-- End Listing-->
                    

                   


                     <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 loss property-listing" >
                        <div class="media" >
                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller row">
                                 
                                <ul class=" mrg-0 btm-mrg-10 col-md-3 clr-535353" style="list-style: none">
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants6_summoner_name; ?>'><img src="<?=$participants6_icon_url?>"  class="summoner"> <?php echo $participants6_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants7_summoner_name; ?>'><img src="<?=$participants7_icon_url?>" class="summoner"> <?php echo $participants7_summoner_name; ?></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants8_summoner_name; ?>'><img src="<?=$participants8_icon_url?>" class="summoner"> <?php echo $participants8_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants9_summoner_name; ?>'><img src="<?=$participants9_icon_url?>"  class="summoner"> <?php echo $participants9_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants10_summoner_name; ?>'><img src="<?=$participants10_icon_url?>" class="summoner"> <?php echo $participants10_summoner_name; ?></li>
                                </ul>

                                     <ul class=" mrg-0 btm-mrg-10 col-md-2 clr-535353" style="list-style: none">
                                    <li style="margin-bottom: 3px;"><a href="<?php echo '../runes/?runes='.$participants6_rune_id; ?>" > Runes</a></li>
                                         <li style="margin-bottom: 3px;"><a href="<?php echo '../runes/?runes='.$participants7_rune_id; ?>" > Runes</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo '../runes/?runes='.$participants8_rune_id; ?>" > Runes</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo '../runes/?runes='.$participants9_rune_id; ?>" > Runes</a></li>
                                         <li style="margin-bottom: 3px;"><a href="<?php echo '../runes/?runes='.$participants10_rune_id; ?>" >Runes</a></li>
                                </ul>

                                 <ul class=" mrg-0 btm-mrg-10 col-md-3 clr-535353" style="list-style: none">
                                        <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants6_mastery_id; ?>" > Masteries</a></li>
                                       <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants7_mastery_id; ?>" > Masteries</a></li>
                                      <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants8_mastery_id; ?>" > Masteries</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants9_mastery_id; ?>" > Masteries</a></li>
                                         <li style="margin-bottom: 3px;"><a href="<?php echo '../mastery/?mastery='.$participants10_mastery_id; ?>"  > Masteries</a></li>
                                </ul>



                                
                            </div>
                        </div>
                    </div><!-- End Listing-->

                    


                      </div>
                    </div><!-- End Listing-->

                <?php
                }

            }else{
                echo "* ".$summoner_name." is not in an active game. Please try again later if the summoner is currently in game";
            }

?>

            

        </div>
        <div class="tab-pane fade in" id="tab3">
          <h3>This is tab 3</h3>
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
