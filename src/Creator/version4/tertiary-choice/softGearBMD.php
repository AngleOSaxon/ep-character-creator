<?php
require_once '../../../php/EPCharacterCreator.php'; //BMD stand for : Bonus Malus Description
include('../other/bonusMalusLayer.php');
include('../other/armorDegatsLayer.php');
include('../other/bookPageLayer.php');
include('../other/occurencesLayer.php');
session_start();
?>
<ul class="mainlist" id="bmdList">
	<?php
		  $currentGear = $_SESSION['cc']->getGearByName($_SESSION['currentSoftName']);
		  
		  getBPHtml($currentGear->name);
		  
		  getOccurenceHtml($currentGear,"SOFT");	
		  
		  getBMHtml($currentGear->bonusMalus,$currentGear->name,'soft');
		  getADHtml($currentGear);
		  echo "<li>";
          echo "		<label class='listSection'>Description</label>";
          echo "</li>"; 
          echo "<li>";
          echo "		<label class='bmDesc'>".$currentGear->description."</label>";
          echo "</li>";
	?>
</ul>