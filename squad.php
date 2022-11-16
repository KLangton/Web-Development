<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function renderBreadCrumb()
{
    $tbread = <<<BREAD
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Squad</li>
    </ul>
BREAD;
    return $tbread;
}

function createPage($pimgdir,$pcurrpage)
{  
    //Get the Data we need for this page
    $tci    = dalfactoryCreateSquadCarousel();
    $tsquad = dalfactoryCreateSquad();
    $tstats = dalfactoryCreateStats();
    $tkeylist = dalfactoryCreateKeyPlayers();

    $tsquadtable = renderSquadTable($tsquad);
   
    //Use the Presentation Layer to build the UI Elements
    $tcarousel   = renderCarousel($tci,$pimgdir);
    $tbc         = renderBreadCrumb();
    $tstats      = renderStatistics($tstats);
    $tkeyplayers = renderKeyPlayersList($tkeylist);
    
    
$tcontent = <<<PAGE
        {$tcarousel}
        {$tbc}
		<div class="row">
			{$tstats}
		</div>
		<div class="row">
			<div class="panel panel-primary">
				<h2>Current Squad</h2>
				<p>List of Key First-Team Players</p>
			    {$tsquadtable}
			</div>
		</div>
		<div class="row">
            {$tkeyplayers}
		</div>
PAGE;

return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

$tpagetitle = "Squad Information";
$tpage = new MasterPage($tpagetitle);
$timgdir = $tpage->getPage()->getDirImages();

//Build up our Dynamic Content Items. 
$tpagelead  = "";
$tcurrpage = "";
$tpagecontent = createPage($timgdir,$tcurrpage);
$tpagefooter = "";

//----BUILD OUR HTML PAGE----------------------------
//Set the Three Dynamic Areas (1 and 3 have defaults)
if(!empty($tpagelead))
    $tpage->setDynamic1($tpagelead);
$tpage->setDynamic2($tpagecontent);
if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);
//Return the Dynamic Page to the user.    
$tpage->renderPage();
?>