<?php
require_once '../../../php/EPCharacterCreator.php'; //BMD stand for : Bonus Malus Description
require_once '../../../php/EPAtom.php';
include('../other/bonusMalusLayer.php');
require_once('../other/panelHelper.php');

session_start();

$currentTraitsList = $_SESSION['cc']->getCurrentTraits();
$currentTrait = getAtomByName($currentTraitsList,$_SESSION['currentTraitName']);
if($currentTrait == null){
    $currentTrait = $_SESSION['cc']->getTraitByName($_SESSION['currentTraitName']);
}

$myPanel = new Panel();
$myPanel->startDescriptivePanel($currentTrait->name);
$myPanel->addDescription($currentTrait->description);
$myPanel->addRawHtml( getBMHtml($currentTrait->bonusMalus,$currentTrait->name,'trait') );
echo $myPanel->getHtml();
echo endPanel();
?>
