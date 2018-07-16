<!DOCTYPE>
<html>
 <link rel="stylesheet" href="Champion.css">
<div id = "champs">
<?php 
//session_start();
//$imageid = 101;
//$_SESSION['imageid'] = $imageid;
$folder = 'champs/';
$filetype = '*.jpg';
$files = glob($folder.$filetype);
$count = count($files);
for ($i = 0; $i < $count; $i++){

echo "<div class='champs'>  
<ul>
<li><div class='itemType'><a href='ChampInfo.php?id=$files[$i]'><input type='image' src='".$files[$i]."'> <gt_name>".substr($files[$i],strlen($folder),strpos($files[$i], '.')-strlen($folder))."</gt_name></div></li> 
</ul>	
</div>"     
;} 

?>  


</div>
