<?php session_start();
if(empty($_REQUEST['viewerid']))
{
	header("location:index.php");
}else
{
	$m=0;
	if(isset($_SESSION['user_id']))
	{
		if(($_SESSION['user_id'])==($_REQUEST['viewerid']))
		{
			$m=$m+1;
		}else
		{
			$m=0;
		}
	}else
	{
		$m=0;
	}
	if($m==1)
	{
		 echo "<div id=\"foldname\"><div id=\"foldname\"><img height=\"25\" width=\"25\" src=\"icons/sf-storage-folder.png\" alt=\"Public Folder\"/>  Public Folder</div></div>";
    
	}else
	{
		 echo "<div id=\"foldname\"><div id=\"foldname\"><img height=\"25\" width=\"25\" src=\"../../web/icons/sf-storage-folder.png\" alt=\"Public Folder\"/>  Public Folder</div></div>";
    
	}
	echo'<input type="file" id="pffile" onchange="$(\'.upldfls\').show();" multiple="multiple" style="display: none;" >
	<div class="pfmenubar" ><div id="menuitem" onclick="$(\'#pffile\').click();">Add Files</div><div id="menuitem" class="upldfls" style="display:none;" onclick="upldpubfold()">Upload to Folder<img src="" class="Ldricn" style="position:absolute;display:none;"  width="25" height="25" /></div><div id="menuitem" onclick="copyfrompf()" title="You can paste these files later from your Folders">Copy to your folder</div><div id="menuitem" onclick="openpublicfoleder()">Refresh</div></div>';

require 'mysqli_connect.php';
$q="select pf_content as pfc,pf_id  as pid ,size as sz,dwn_count as dcnt,time as tm from public_folder order by pf_id desc";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$n=0;
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
			$n=$n+1;
			$file=$row['pfc'];
			$d_cnt=$row['dcnt'];
			$origfile=$row['pfc'];
			$pf_id=$row['pid'];
			$size=$row['sz'];
			$time=$row['tm'];
			$size=$size/1024;
			
			$size=substr($size,0,4);
			$size="$size KB";
			if($size>1000)
			{
				$size=$size/1000;
				$size="$size MB";
			}
			$file=substr($file,25,strlen($file));
			if(strlen($file)>50)
			{
				$file=substr($file, 0,50);
				$file="$file ...";
			}
			echo'<div id="pf_totcont"><input class="checbox" id="med'.$n.'" style="display:inline-block;" type="checkbox" value="'.$pf_id.'" /><a href="'.$origfile.'"" id="dwn'.$n.'" onclick="dwncnt('.$pf_id.')" download="SedFed/publicfolder/'.$file.'"><div id="pf_contents" title="Click to Download" style="display:inline-block;">'.$file.' &nbsp;&nbsp <font id="pf_filesize">'.$size.'</font></div></a>'.$time.'<img src="icons/post-media-download.png" onclick="$(\'#dwn'.$n.'\').click();" width="25" height="25" >('.$d_cnt.')</div>';
		}
		echo'<input type="hidden" id="totckval" value="'.$n.'" />';
	}else
	{
		echo 'Public Folder id empty';
	}
}

}
