<?php
// CGG APP KEY: 07391c29537f31a1112dff71d33065d0
?>
<?php
//Most Popular starting item set
$MostPopItem = file_get_contents('http://api.champion.gg/champion/Zed/items/finished/mostPopular?api_key=07391c29537f31a1112dff71d33065d0');
//echo $MostPopItem. "<br>"; 

//Most Winning item set
$MostWinItem = file_get_contents('http://api.champion.gg/champion/Zed/items/finished/mostWins?api_key=07391c29537f31a1112dff71d33065d0');
//echo $MostWinItem. "<br>"; 
$str1 = substr ( $MostPopItem, 2, -2 ); // Removing 2 outer brackets from string
//echo $str1. "<br>";

$start_limiter = '[';
$end_limiter = ']';


$start_pos = strpos($str1,$start_limiter);
if ($start_pos === FALSE)
{
    die("Starting limiter ".$start_limiter." not found in ".$str1);
}



$end_pos = strpos($str1,$end_limiter,$start_pos);

if ($end_pos === FALSE)
{
    die("Ending limiter ".$end_limiter." not found in ".$str1);
}


$str2 = substr($str1, $start_pos+1, ($end_pos-1)-$start_pos);

//echo $str2. "<br>";
$str3 = explode (",",$str2);
//echo $str3[0]. "<br>";
//echo $str3[1]. "<br>";
//echo $str3[2]. "<br>";
//echo $str3[3]. "<br>";
//echo $str3[4]. "<br>";
//echo $str3[5]. "<br>";
?>
<?php
for ($i = 0; $i < 6; $i++){
	echo '<img src="http://ddragon.leagueoflegends.com/cdn/7.8.1/img/item/'.$str3[$i].'.png">'
								;}
?>

