<ul class="mainlist" id="postraits">
	<?php
		require_once '../../../php/EPCharacterCreator.php';
		include('../other/bookPageLayer.php');
		
		 session_start();
		 $currentTraits = $_SESSION['cc']->getCurrentTraits();
		 $defaultTrait = $_SESSION['cc']->getCurrentDefaultEgoTraits();
         foreach($_SESSION['cc']->getTraits() as $m){
            if($m->traitPosNeg == EPTrait::$POSITIVE_TRAIT &&
               $m->traitEgoMorph == EPTrait::$EGO_TRAIT  && $m->cpCost > 0){
            	echo "<li>";
            	if(isTraitOnlist($defaultTrait,$m)){
	            	echo "		<label class='posTrait selPosTrait' id='".$m->name."'>".$m->name."</label><label class='costInfo'>(Granted)</label><span class='selectedicone selPosTrait' data-icon='&#x2b;'></span>";
            	}
            	else if(isTraitOnlist($currentTraits,$m)){
            		echo "		<label class='posTrait selPosTrait' id='".$m->name."'>".$m->name."</label><label class='costInfo'>(".$m->cpCost." cp)</label><span class='selectedicone selPosTrait' data-icon='&#x2b;'></span>";
            	}
            	else{
            		echo "		<label class='posTrait' id='".$m->name."'>".$m->name.getListStampHtml($m->name)."</label><label class='costInfo'>(".$m->cpCost." cp)</label>";
            	}
            	
            	echo "</li>";
            }
         }
         
          function isTraitOnlist($list,$trait){
	         foreach($list as $m){
	         	if($m->name == $trait->name) return true;
	         	
	         }
	         return false;
         }

	?>
</ul>









