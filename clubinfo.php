<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
    //Get the Data we need for this page
    $tcitems = dalfactoryCreateClubCarousel();
    $ttabs   = dalfactoryCreateClubTabs();
    $tquotes = dalfactoryCreateQuotes();
    $tmanager = dalfactoryCreateManager();
    $tcoaches = dalfactoryCreateCoaching();
    $tboard = dalfactoryCreateManagement();
    $tstadium = dalfactoryCreateStadium();
    $tkits = dalfactoryCreateKits();
    
    //Build the UI Components
    $tcarouselhtml = renderCarousel($tcitems,"img");
    $ttabhtml = renderTabs($ttabs,"myTabContent");
    $tfixturehtml = renderLastFixture();
    $tmanagerhtml = renderManagerOverview($tmanager);
    $tboardhtml = renderManagementTable($tboard);
    $tstadiumhtml = renderStadiumOverview($tstadium);
    $tcoachhtml = renderCoachingTable($tcoaches);
    $tkitshtml = renderKitOverview($tkits[0]);
    $tquotehtml = "";
    foreach($tquotes as $tq)
    {
        $tquotehtml .=renderQuote($tq);
    }
    
    //Construct the Page
$tcontent = <<<PAGE
    {$tcarouselhtml}
    {$tquotehtml}
    <section class="row details" id="club-overview">
    {$tmanagerhtml}
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Coaching Staff</h3>
        </div>
        <div class="panel-body">
        {$tcoachhtml}
        </div>
    </div>
    {$tstadiumhtml}
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Club Management</h3>
        </div>
        <div class="panel-body">
        {$tboardhtml}
        </div>
    </div>
    {$tkitshtml}
    </section>
    <section class="row details" id="club-info">
    {$ttabhtml}
    </section>
    {$tfixturehtml}
PAGE;

return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Club Information";
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