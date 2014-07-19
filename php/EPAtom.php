 <?php
/**
 * Description of EPAtom
 *
 * @author reinhardt
 */
class EPAtom {
    
    static $APTITUDE = 'aptitude';
    static $BACKGROUND = 'background';
    static $FACTION = 'faction';
    static $GEAR = 'gear';
    static $WEAPON ='weapon';
    static $ARMOR = 'armor';
    static $MOTIVATION = 'motivation';
    static $REPUTATION = 'reputation';
    static $SKILL = 'skill';
    static $STAT = 'stat';
    static $TRAIT = 'trait';
    static $BONUSMALUS = 'bonusmalus';
    static $MORPH = 'morph';
    static $AI = 'ai';
    static $PSY = 'psy';
    
    public $atomUid;
    public $type;
    
    public $occurence;
    public $unique;
    public $name;
    public $description;  
    public $groups;
    
    public $cost;
    public $ratioCost;
    public $ratioCostMorphMod;
    public $ratioCostTraitMod;
    public $ratioCostBackgroundMod;
    public $ratioCostFactionMod;
    public $ratioCostSoftgearMod;
    public $ratioCostPsyMod;
    
    
    function __construct($atType, $atName, $atDesc) {
       $this->atomUid = uniqid('Atom_'.$this->name);
       $this->type = $atType;  
       $this->name = $atName;
       $this->description = $atDesc;
       $this->groups = array();
       $this->cost = 0;
       $this->ratioCost = 1;
       $this->ratioCostMorphMod = 1;
       $this->ratioCostTraitMod = 1;
       $this->ratioCostBackgroundMod = 1;
       $this->ratioCostFactionMod = 1;
       $this->ratioCostSoftgearMod = 1;
       $this->ratioCostPsyMod = 1;
       $this->occurence = 1;
       $this->unique = true;
    }
     function getSavePack(){  
	    $savePack = array();

        $savePack['atomUid'] = $this->atomUid;
	    $savePack['type'] = $this->type; 
	    $savePack['name'] = $this->name;
	    $savePack['description'] = $this->description;
	    $savePack['groups'] = $this->groups;    
	    $savePack['cost'] = $this->cost;
        $savePack['ratioCost'] = $this->ratioCost;
	    $savePack['ratioCostMorphMod'] = $this->ratioCostMorphMod;
	    $savePack['ratioCostTraitMod'] = $this->ratioCostTraitMod;
	    $savePack['ratioCostBackgroundMod'] = $this->ratioCostBackgroundMod;
	    $savePack['ratioCostFactionMod'] = $this->ratioCostFactionMod;
	    $savePack['ratioCostSoftgearMod'] = $this->ratioCostSoftgearMod;
	    $savePack['ratioCostPsyMod'] = $this->ratioCostPsyMod;
        $savePack['occurence'] = $this->occurence;
        $savePack['unique'] = $this->unique;
        
	    return $savePack;
    }
    
    function loadSavePack($savePack,$cc = null){
        $this->atomUid = $savePack['atomUid'];
	    $this->type = $savePack['type'];    
	    $this->name = $savePack['name'];
	    $this->description = $savePack['description'];
	    $this->groups = $savePack['groups'];
	    $this->cost = $savePack['cost'];
        $this->ratioCost = $savePack['ratioCost'];
	    $this->ratioCostMorphMod = $savePack['ratioCostMorphMod'];
	    $this->ratioCostTraitMod = $savePack['ratioCostTraitMod'];
	    $this->ratioCostBackgroundMod = $savePack['ratioCostBackgroundMod'];
	    $this->ratioCostFactionMod = $savePack['ratioCostFactionMod'];
	    $this->ratioCostSoftgearMod = $savePack['ratioCostSoftgearMod'];
	    $this->ratioCostPsyMod = $savePack['ratioCostPsyMod'];	
        $this->occurence = $savePack['occurence'];	
        $this->unique = $savePack['unique'];	
    }   
    function __clone()
    {
        // Ensure a clone object have a different atomUid from original 
        $this->atomUid = uniqid('Atom_'.$this->name);
    }
    public function getCost(){
        if (is_int($this->cost)){
            return round($this->cost * $this->ratioCost * $this->ratioCostMorphMod * $this->ratioCostTraitMod * $this->ratioCostBackgroundMod * $this->ratioCostFactionMod * $this->ratioCostSoftgearMod * $this->ratioCostPsyMod);
        }
        return 0;
    }
}

?>
