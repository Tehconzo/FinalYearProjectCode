<?php
$current_game_url = 'https://na.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/NA1/55470027?api_key=RGAPI-5ca97456-2013-4eeb-9ce9-d4ecc87ae71e';
if(@file_get_contents($current_game_url)){
            $current_game_json = file_get_contents($current_game_url);
            $array_cg = json_decode($current_game_json, true);
            if(isset($array_cg ['status'])){
               echo "data nai lab aaa";
            }else{

                $gameId = $array_cg['gameId'];
                $mapId = $array_cg['mapId'];
                $region = "NA";
                $reg = "na";
                $game_mode = $array_cg['gameMode']; 
                $participants1_team_id =  $array_cg['participants'][1]['teamId'];
                $participants3_team_id =  $array_cg['participants'][2]['teamId'];
                $participants4_team_id =  $array_cg['participants'][3]['teamId'];
                $participants5_team_id =  $array_cg['participants'][4]['teamId'];
                $participants6_team_id =  $array_cg['participants'][5]['teamId'];
                $participants7_team_id =  $array_cg['participants'][6]['teamId'];
                $participants8_team_id =  $array_cg['participants'][8]['teamId'];
                $participants10_team_id =  $array_cg['participants'][9]['teamId'];



                echo $participants1_icon_url =  "http://ddragon.leagueoflegends.com/cdn/7.5.1/img/profileicon/".$array_cg['participants'][0]['profileIconId'].".png";
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
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants1_summoner_name; ?>'><img src="<?=$participants1_icon_url?>"  class="summoner"><?php echo $participants1_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants2_summoner_name; ?>'><img src="<?=$participants2_icon_url?>" class="summoner"><?php echo $participants2_summoner_name; ?></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants3_summoner_name; ?>'><img src="<?=$participants3_icon_url?>" class="summoner"><?php echo $participants3_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants4_summoner_name; ?>'><img src="<?=$participants4_icon_url?>"  class="summoner"><?php echo $participants4_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants5_summoner_name; ?>'><img src="<?=$participants5_icon_url?>" class="summoner"><?php echo $participants5_summoner_name; ?>/li>
                                </ul>

                                 <ul class=" mrg-0 btm-mrg-10 col-md-2 clr-535353" style="list-style: none">
                                    <li style="margin-bottom: 3px;"><a   href="<?php echo 'runes/?runes='.$participants1_rune_id; ?>" > Runes</a></li>
                                         <li style="margin-bottom: 3px;"><a   href="<?php echo 'runes/?runes='.$participants2_rune_id; ?>" > Runes</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo 'runes/?runes='.$participants3_rune_id; ?>" >Runes</a></li>
                                        <li style="margin-bottom: 3px;"><a   href="<?php echo 'runes/?runes='.$participants4_rune_id; ?>" > Runes</a></li>
                                         <li style="margin-bottom: 3px;"><a   href="<?php echo 'runes/?runes='.$participants5_rune_id; ?>" >Runes</a></li>
                                </ul>

                                 <ul class=" mrg-0 btm-mrg-10 col-md-3 clr-535353" style="list-style: none">
                                        <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants1_mastery_id; ?>" > Masteries</a></li>
                                       <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants2_mastery_id; ?>" > Masteries</a></li>
                                      <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants3_mastery_id; ?>"  > Masteries</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants4_mastery_id; ?>"  > Masteries</a></li>
                                         <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants5_mastery_id; ?>" > Masteries</a></li>
                                </ul>

                                

                            </div>
                        </div>
                    </div><!-- End Listing-->
                    

                   


                     <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 loss property-listing" >
                        <div class="media" >
                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller row">
                                 
                                <ul class=" mrg-0 btm-mrg-10 col-md-3 clr-535353" style="list-style: none">
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants6_summoner_name; ?>'><img src="<?=$participants6_icon_url?>"  class="summoner"><?php echo $participants6_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants7_summoner_name; ?>'><img src="<?=$participants7_icon_url?>" class="summoner"><?php echo $participants7_summoner_name; ?></li>
                                    <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants8_summoner_name; ?>'><img src="<?=$participants8_icon_url?>" class="summoner"><?php echo $participants8_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants9_summoner_name; ?>'><img src="<?=$participants9_icon_url?>"  class="summoner"><?php echo $participants9_summoner_name; ?></li>
                                     <li><a href='<?php echo "index.php?region_val=".$region."&name=".$participants10_summoner_name; ?>'><img src="<?=$participants10_icon_url?>" class="summoner"><?php echo $participants10_summoner_name; ?></li>
                                </ul>

                                     <ul class=" mrg-0 btm-mrg-10 col-md-2 clr-535353" style="list-style: none">
                                    <li style="margin-bottom: 3px;"><a href="<?php echo 'runes/?runes='.$participants6_rune_id; ?>" > Runes</a></li>
                                         <li style="margin-bottom: 3px;"><a href="<?php echo 'runes/?runes='.$participants7_rune_id; ?>" > Runes</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo 'runes/?runes='.$participants8_rune_id; ?>" > Runes</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo 'runes/?runes='.$participants9_rune_id; ?>" > Runes</a></li>
                                         <li style="margin-bottom: 3px;"><a href="<?php echo 'runes/?runes='.$participants10_rune_id; ?>" >Runes</a></li>
                                </ul>

                                 <ul class=" mrg-0 btm-mrg-10 col-md-3 clr-535353" style="list-style: none">
                                        <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants6_mastery_id; ?>" > Masteries</a></li>
                                       <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants7_mastery_id; ?>" > Masteries</a></li>
                                      <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants8_mastery_id; ?>" > Masteries</a></li>
                                        <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants9_mastery_id; ?>" > Masteries</a></li>
                                         <li style="margin-bottom: 3px;"><a href="<?php echo 'mastery/?mastery='.$participants10_mastery_id; ?>"  > Masteries</a></li>
                                </ul>



                                
                            </div>
                        </div>
                    </div><!-- End Listing-->

                    


                      </div>
                    </div><!-- End Listing-->

                <?php
                }

            }else{
            	echo "url not read";
            }

?>


