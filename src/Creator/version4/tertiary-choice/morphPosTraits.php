<?php
require_once '../../../php/EPCharacterCreator.php';
include('../other/bookPageLayer.php');
session_start();
$currentMorph = $_SESSION['cc']->getCurrentMorphsByName($_SESSION['currentMorph']);
?>
<label class="descriptionTitle"><?php echo $currentMorph->name; ?></label>
<ul class="mainlist" id="morphPostraits">
    <li><label class='foldingListSection'>Morph Pos. Traits</label></li>
	<?php
		 $currentTraits = $_SESSION['cc']->getCurrentMorphTraits($_SESSION['currentMorph']);
		 $defaultTrait = $_SESSION['cc']->getCurrentDefaultMorphTraits($currentMorph);
         foreach($_SESSION['cc']->getTraits() as $m){
            if($m->traitPosNeg == EPTrait::$POSITIVE_TRAIT &&
               $m->traitEgoMorph == EPTrait::$MORPH_TRAIT  &&
               isTraitLegal($currentMorph,$m) &&
               $m->cpCost > 0){
            	echo "<li>";
            	if($defaultTrait != null && $m->isInArray($defaultTrait)){
	            	echo "		<label class='morphPosTrait selPosTrait' id='".$m->name."'>".$m->name.getListStampHtml($m->name)."</label><label class='costInfo'>(Granted)</label><span class='selectedicone selPosTrait selMorphPosTraitIcon' id='".$m->name."' data-icon='&#x2b;'></span>";

            	}
            	else if($currentTraits != null && $m->isInArray($currentTraits)){
            		echo "		<label class='morphPosTrait selPosTrait' id='".$m->name."'>".$m->name.getListStampHtml($m->name)."</label><label class='costInfo'>(".$m->cpCost." cp)</label><span class='selectedicone selPosTrait selMorphPosTraitIcon' id='".$m->name."' data-icon='&#x2b;'></span>";
            	}
            	else{
            		echo "		<label class='morphPosTrait' id='".$m->name."'>".$m->name.getListStampHtml($m->name)."</label><label class='costInfo'>(".$m->cpCost." cp)</label><span class='addIcon addMorphPosTraitIcon' id='".$m->name."' data-icon='&#x3a;'></span>";
            	}
            	
            	echo "</li>";
            }
         }
         
         function isTraitLegal($morph,$trait){
         	if($morph->morphType == EPMorph::$INFOMORPH) return false;
         
	         if($trait->canUse == EPTrait::$CAN_USE_EVERYBODY) return true;
	         else if($trait->canUse == EPTrait::$CAN_USE_BIO){
		         if($morph->morphType == EPMorph::$BIOMORPH) return true;
	         }
	         else if($trait->canUse == EPTrait::$CAN_USE_SYNTH){
		         if($morph->morphType == EPMorph::$SYNTHMORPH) return true;
	         }
	         else if($trait->canUse == EPTrait::$CAN_USE_POD){
		         if($morph->morphType == EPMorph::$PODMORPH) return true;
	         }
	         return false;
         }
	?>
</ul>
