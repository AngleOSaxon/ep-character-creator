<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EPTrait
 *
 * @author reinhardt
 */
class EPTrait extends EPAtom{
    
    static $POSITIVE_TRAIT = 'POS';
    static $NEGATIVE_TRAIT = 'NEG';
    
    static $EGO_TRAIT = 'EGO';
    static $MORPH_TRAIT = 'MOR';
    
    //GUI use for filtering the listes
    static $CAN_USE_EVERYBODY = 'EVERY';
    static $CAN_USE_BIO = 'BIO';
    static $CAN_USE_SYNTH = 'SYNTH';
    static $CAN_USE_POD = 'POD';
    //-----
    public $canUse;
    public $mandatory;
    //-----
    
    public $traitPosNeg;
    public $traitEgoMorph;
    public $cpCost;
    
    public $level;
    
    //Array 
    public $bonusMalus;
    
    
    function getSavePack(){
        $savePack = parent::getSavePack();
        
        $savePack['canUse'] = $this->canUse;
        $savePack['mandatory'] = $this->mandatory;

        $savePack['traitPosNeg'] =  $this->traitPosNeg;
        $savePack['traitEgoMorph'] =  $this->traitEgoMorph;
        $savePack['cpCost'] =  $this->cpCost;

        $savePack['level'] =  $this->level;
        
        $bmSavePacks = array();
        foreach($this->bonusMalus as $m){
            array_push($bmSavePacks	, $m->getSavePack());
        }
        $savePack['bmSavePacks'] = $bmSavePacks;
        return $savePack;
    }
    function loadSavePack($savePack,$cc = null){
        parent::loadSavePack($savePack);
	    
	$this->canUse = $savePack['canUse'];
        $this->mandatory = $savePack['mandatory'];
        $this->traitPosNeg = $savePack['traitPosNeg'];
        $this->traitEgoMorph = $savePack['traitEgoMorph'];
        $this->cpCost = $savePack['cpCost'];	    
        $this->level = $savePack['level'];
        foreach($savePack['bmSavePacks'] as $m){
            $savedBm = new EPBonusMalus('','','');
            $savedBm->loadSavePack($m);
            array_push($this->bonusMalus, $savedBm);
        }	    
    }   
    function __construct($atName, $atDesc, $traitPosNeg, $traitEgoMorph, $cpCost , $bonusMalusArray = array(),$level = 1,$canUse='EVERY') {
        parent::__construct(EPAtom::$TRAIT, $atName, $atDesc);
        $this->traitPosNeg = $traitPosNeg;
        $this->traitEgoMorph = $traitEgoMorph;
        $this->cpCost = $cpCost;
        $this->bonusMalus = $bonusMalusArray;
        $this->level = $level;
        $this->canUse = $canUse;
    }
    
}

?>
