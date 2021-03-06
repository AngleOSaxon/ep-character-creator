<?php
require_once '../../../php/EPCharacterCreator.php';
session_start();

function printStat($abbreviation){
    $stat = $_SESSION['cc']->getStatByAbbreviation($abbreviation);
    echo "<li id='".$abbreviation."' class='statMorph'>";
    echo "  ".$stat->name;
    echo "  <span class='btnhelp slowTransition' data-icon='&#x2a;' title='".$stat->description."'></span>";
    echo "  <span class='score'>[".$stat->getValue()."]</span>";
    echo "</li>";

}
?>
<ul class="mainlist" id="statWithMorph">
    <?php
        $morph = $_SESSION['cc']->getCurrentMorphsByName($_SESSION['currentMorph']);
        $_SESSION['cc']->activateMorph($morph);
        echo "<li class='listSection'>";
		echo $morph->name;
		echo "</li>";
		printStat("TT");
		printStat("LUC");
		printStat("IR");
		printStat("WT");
		printStat("DUR");
		printStat("DR");
		printStat("INI");
		printStat("SPD");
		printStat("DB");
	?>
</ul>
