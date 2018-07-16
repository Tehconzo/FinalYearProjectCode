    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="champinfo.css">
<div id = "db test">
<?php session_start();
$con=mysqli_connect("localhost","root","","fypdb");

//This is the long file name and path
 $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
//This is just the file name 
 $smallpath =  basename($id,".jpg"); 

?>

<div class="champion">
<h1> Champion Details</h1>

<?php
if (mysqli_connect_errno()) 
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$resultchamp = mysqli_query($con, "SELECT name, title, lore FROM champions WHERE id = ".$smallpath);
 while ($row = $resultchamp->fetch_assoc()) {
 	echo $row['name']."<br>";
	$name = $row['name'] ;
   echo "Title:";
	echo $row['title']."<br>";
	echo $row['lore']."<br>";
}

?>
</div>
<div class ='tips'>
<h1> Champion Tips</h1>
<?php
//using smallpath to retrieve data from database
$result = mysqli_query($con, "SELECT * FROM champion_tips WHERE champion = ".$smallpath);

while ($row = $result->fetch_assoc()) {
   	echo $row['tip']."<br>";
}
?>
</div>
<div class="abilities">
<h1> Champion Abilities</h1>
<?php

$resultabil = mysqli_query($con,"SELECT name,description,cost,effect FROM champion_abilities WHERE champion =".$smallpath);
while ($row = $resultabil->fetch_assoc()) {
	
    echo $row['name']."<br>";
	echo $row['description']."<br>";
	echo $row['effect']."<br>";
	echo $row['cost']."<br>";
}
?>
</div>
<div class="stats">
<h1> Champion Stats</h1>
<?php
$resultstat = mysqli_query($con, "SELECT name,value,modifier_per_level FROM champion_stats WHERE champion =".$smallpath);
while ($row = $resultstat->fetch_assoc()) {
   
	echo $row['name']."<br>";
	echo $row['value']."<br>";
	echo $row['modifier_per_level']."<br>";
}
mysqli_close($con);

?>
</div>
</div> 
<div class="MostPopItem">
<h1> Most Popular Item Set</h1>
<?php

//Most Popular starting item set
$MostPopItem = file_get_contents("http://api.champion.gg/champion/$name/items/finished/mostPopular?api_key=07391c29537f31a1112dff71d33065d0");
$str1 = substr ( $MostPopItem, 2, -2 ); // Removing 2 outer brackets from string
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
$str3 = explode (",",$str2);
?>
<?php
for ($i = 0; $i < 6; $i++){
	echo '<img src="http://ddragon.leagueoflegends.com/cdn/7.8.1/img/item/'.$str3[$i].'.png">'
								;}
?> 
<div class="MostWin Item">
<h1> Highest Win % Item Set</h1>
<?php

//Most Popular starting item set
$MostWinItem = file_get_contents("http://api.champion.gg/champion/$name/items/finished/mostWins?api_key=07391c29537f31a1112dff71d33065d0");

$str1 = substr ( $MostWinItem, 2, -2 ); // Removing 2 outer brackets from string
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
$str3 = explode (",",$str2);
?>
<?php
for ($i = 0; $i < 6; $i++){
	echo '<img src="http://ddragon.leagueoflegends.com/cdn/7.8.1/img/item/'.$str3[$i].'.png">'
								;}
?> 


