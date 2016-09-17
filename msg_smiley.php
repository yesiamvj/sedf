  <?php session_start();

if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
        $cnt=$_REQUEST['cnt'];
        $my_id=$_REQUEST['cu_id'];
                                echo '     <div class="smileyHold" id="smileyWindow'.$cnt.'"   >
                                            <div class="smileyArr"></div>
                                            <div class="smileyContOut">
                                                <div class="smileyContIn">
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Smile Face.png\',\'Cute\')" >
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Smile Face.png"  alt="Cute" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Cute
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Smile.png\',\'Smile\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Smile.png" alt="Smile" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Smile
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Happy.png\',\'Happy\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Happy.png" alt="Happy" />
                                                        </div>
                                                        <div class="smileyNme">
                                                           Happy
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Laughing.png\',\'Laughing\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Laughing.png" alt="Laughing" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Laughing
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Cool.png\',\'Cool\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/cutey/Cool.png" alt="Cool" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Cool
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Nerd.png\',\'Nerd\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Nerd.png" alt="Nerd" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Nerd
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Winking.png\',\'Winking\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Winking.png" alt="Winking" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Winking
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Blushing.png\',\'Blushing\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Blushing.png" alt="Blushing" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Blushing
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Surprised.png\',\'Surprised\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Surprised.png" alt="Surprised" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Surprised
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Angry.png\',\'Angry\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Angry.png" alt="Angry" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Angry
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/tongue.png\',\'Tongue\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/tongue.png" alt="Tongue" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Tongue
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Sick.png\',\'Sick\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/cutey/Sick.png" alt="Sick" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Sick
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Sad.png\',\'Sad\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Sad.png" alt="Sad" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Sad
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Crying.png\',\'Crying\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Crying.png" alt="Cry" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Crying
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="$(\'#smile_blacks\').slideToggle()" >
                                                        <div class="moreSmiley">
                                                            +
                                                        </div>
                                                        <div class="smileyNme">
                                                            More
                                                        </div>
                                                    </div>
                                                    <div class="blackSmiley"  id="smile_blacks" style="display: none;" >
                                                         <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/amazing.png\',\'amazing\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/amazing.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Amazing
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/anger.png\',\'anger\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/anger.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Anger
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/bad_egg.png\',\'bad_egg\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/bad_egg.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Bad Egg
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/bad_smile.png\',\'bad_smile\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/bad_smile.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Bad Smile
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/beaten.png\',\'beaten\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/beaten.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Beaten
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/big_smile.png\',\'big_smile\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/big_smile.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                             Smile
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/black_heart.png\',\'black heart\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/black_heart.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                             Heart
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/electric_shock.png\',\'electric shock\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/electric_shock.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                             Shock
                                                        </div>
                                                    </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div> ';
                                        }