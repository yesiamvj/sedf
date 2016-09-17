  
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
echo '
                          <div class="ThWin_CreateFlashIn">
                              <div class="ThWin_flashTtl">Create Flash Message <div class="ThFlshClose" onclick="$(\'#CreateNewFlash\').fadeToggle();" >X</div> </div>
                              <div class="Th_Win_Flsh_Cont">
                                  <div class="ThWinFlsh_QueItm">
                                      <input class="ThWinFlashInp" type="text" placeholder=" Say something..." />
                                  </div>
                                  <div class="ThWinFlsh_QueItm">
                                      <input class="ThWinFlshChks" type="radio" id="allppl" name="flsh_pb" checked/> Public <input name="flsh_pb" class="ThWinFlshChks" type="radio"/> Relations Only <span class="ThFlahTip">Public Messages will be scanned before flashing</span>
                                  </div>
                                  <div class="ThWinFlsh_QueItm">
                                      <div class="ThWinFlshSubmit" onclick="flash_my_news()">
                                          Flash
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>';
}
?>