<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
    $tarticles = dalfactoryCreateHomeArticles();
    $tnilist = dalfactoryCreateNewsItems();
    
    $tnews = "";
    foreach($tnilist as $tni)
    {
        $tnews.=renderNewsSummary($tni);
    }    
    $tarticles[1]->content = $tnews;
        
    //Build the Articles
    $tarticlehtml = "";
    foreach($tarticles as $ta)
    {
        $tarticlehtml .= renderHomeArticle($ta);
    }
$tcontent = <<<PAGE
        <div class="row details">
            {$tarticlehtml}
		</div>
		<div class="row">
			<div class="alert alert-dismissible alert-warning">
				<button class="close" type="button" data-dismiss="alert">&times;</button>
				<h4>Welcome!</h4>
				<p>This site is updated on a weekly basis. Make sure you check back
					regularly.</p>
			</div>
		</div>
PAGE;
return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Home Page";
$tpagelead  = "";
$tpagecontent = createPage();
$tpagefooter = "";

//----BUILD OUR HTML PAGE----------------------------
//Create an instance of our Page class
$tpage = new MasterPage($tpagetitle);
//Set the Three Dynamic Areas (1 and 3 have defaults)
if(!empty($tpagelead))
    $tpage->setDynamic1($tpagelead);
$tpage->setDynamic2($tpagecontent);
if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);
//Return the Dynamic Page to the user.    
$tpage->renderPage();
?>