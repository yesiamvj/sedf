<?php session_start();

if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
    $post_id=$_REQUEST['post_id'];
    $cnt=$_REQUEST['cnt'];
   echo' <link rel="stylesheet" href="smiley.css"/>  <div class="smileyHold" id="smileyWindow1"   >
                                            <div class="smileyArr"></div>
                                            <div class="smileyContOut">
                                                <div class="smileyContIn">
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Smile Face.png\',\'Cute\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Smile Face.png" alt="Cute" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Cute
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Smile.png\',\'Smile\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Smile.png" alt="Smile" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Smile
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Happy.png\',\'Happy\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Happy.png" alt="Happy" />
                                                        </div>
                                                        <div class="smileyNme">
                                                           Happy
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Laughing.png\',\'Laughing\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Laughing.png" alt="Laughing" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Laughing
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Cool.png\',\'Cool\','.$cnt.')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/cutey/Cool.png" alt="Cool" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Cool
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Nerd.png\',\'Nerd\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Nerd.png" alt="Nerd" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Nerd
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Winking.png\',\'Winking\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Winking.png" alt="Winking" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Winking
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Blushing.png\',\'Blushing\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Blushing.png" alt="Blushing" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Blushing
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Surprised.png\',\'Surprised\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Surprised.png" alt="Surprised" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Surprised
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Angry.png\',\'Angry\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Angry.png" alt="Angry" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Angry
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/tongue.png\',\'Tongue\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/tongue.png" alt="Tongue" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Tongue
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Sick.png\',\'Sick\','.$cnt.')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/cutey/Sick.png" alt="Sick" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Sick
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Sad.png\',\'Sad\','.$cnt.')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Sad.png" alt="Sad" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Sad
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/cutey/Crying.png\',\'Crying\','.$cnt.')">
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
                                                         <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/blacks/amazing.png\',\'amazing\','.$cnt.')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/amazing.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Amazing
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/blacks/anger.png\',\'anger\','.$cnt.')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/anger.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Anger
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/blacks/bad_egg.png\',\'bad_egg\','.$cnt.')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/bad_egg.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Bad Egg
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/blacks/bad_smile.png\',\'bad_smile\','.$cnt.')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/bad_smile.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Bad Smile
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/blacks/beaten.png\',\'beaten\','.$cnt.')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/beaten.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Beaten
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/blacks/big_smile.png\',\'big_smile\','.$cnt.')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/big_smile.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                             Smile
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/blacks/black_heart.png\',\'black heart\','.$cnt.')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/black_heart.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                             Heart
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="uploadcomment(\''.$post_id.'\',\'icons/smileys/blacks/electric_shock.png\',\'electric shock\','.$cnt.')">
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
                                        </div>';
    }