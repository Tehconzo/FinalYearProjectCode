<?php
if(isset($_POST['region_val'])){
	if($_POST['region_val'] == 'North American'){
		$region = 'NA';
		$reg = 'na';
	}elseif ($_POST['region_val'] == 'Europe West') {
		$region = 'EW';
		$reg = 'eu';
	}elseif ($_POST['region_val'] == 'Korea') {
		$region = 'KR';
		$reg = 'kr';
	}
	$summoner_name = $_POST['user_name'];
}

$url = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.4/summoner/by-name/'.$summoner_name.'?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
if(@file_get_contents($url)){
	$json = file_get_contents($url);
$array = json_decode($json, true);
$name = strtolower($summoner_name);
$name = str_replace(" ", "", $_POST['user_name']);
if(isset($array['status'])){
	echo "";
}else{
	echo $summoner_id = $array[$name]['id'];
	$summoner_name = $array[$name]['name'];
	$summoner_icon = $array[$name]['profileIconId'];
	$summoner_level = $array[$name]['summonerLevel'];
	$url1 = 'https://'.$reg.'.api.pvp.net/api/lol/'.$region.'/v1.3/game/by-summoner/'.$summoner_id.'/recent?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
	echo "<br>";
	$icon_url = 'http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/'.$summoner_icon.'.png';
	if(@file_get_contents($url1)){
		$json1 = file_get_contents($url1);
		$array1 = json_decode($json1, true);
		echo "10 Recent Games<br>";
		echo "Name: ".$summoner_name."<br>";
		echo "<img src='$icon_url'>";
		echo count($array1['games']);
		echo $array1['games'][0]['level'];
	}else{
		echo "not foound";
	}

}
}else{
	echo "not foound";
}

// if(isset($array['status'])){
// 	if($array['status'] == 404){
// 		echo "Summoner Not Found!";
// 	}
// }else{
// 	echo "id---".$array[$name]['name'];
// }

// foreach ($array['riotschmick'] as $key => $value) {
// 	echo $value;
// }
?>