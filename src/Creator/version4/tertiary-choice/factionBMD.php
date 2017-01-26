<?php
require_once '../../../php/EPCharacterCreator.php'; //BMD stand for : Bonus Malus Description
include('../other/bonusMalusLayer.php');
require_once('../other/traitLayer.php');
require_once('../other/bookPageLayer.php');

session_start();

$currentFaction = $_SESSION['cc']->getCurrentFaction();
?>
<label class="descriptionTitle"><?php echo $currentFaction->name; ?></label>
<ul class="mainlist" id="bmdList">
	<?php
		  getBPHtml($currentFaction->name);
		  
		  echo "<li class='listSection'>";
          echo "Description";
          echo "</li>"; 
          echo "<li>";
          echo "		<label class='bmDesc'>".$currentFaction->description."</label>";
          echo "</li>";

		  getStaticTraitHtml($currentFaction->traits);
		  getBMHtml($currentFaction->bonusMalus,$currentFaction->name,'faction');
	?>
</ul>
