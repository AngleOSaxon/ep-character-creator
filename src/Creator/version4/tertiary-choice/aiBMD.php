<?php
require_once '../../../php/EPCharacterCreator.php'; //BMD stand for : Bonus Malus Description
include('../other/bonusMalusLayer.php');
include('../other/aILayer.php');
require_once('../other/panelHelper.php');

session_start();
$currentAi = $_SESSION['cc']->getAisByName($_SESSION['currentAiName']);

$myPanel = new Panel();
$myPanel->startDescriptivePanel($currentAi->name);
$myPanel->addBuySell($currentAi,"AI");
$myPanel->addDescription($currentAi->description);
$myPanel->addAi($currentAi);
echo $myPanel->getHtml();
echo endPanel();
?>
