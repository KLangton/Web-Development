<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{    
$tcontent = <<<PAGE
<div row="details>
<h2>Latest News</h2>

</div>
PAGE;
return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

$tid = $_REQUEST["storyid"] ?? -1;
//Handle our Requests and find a specific news story and display it
if (is_numeric($tid) && $tid > 0)
{

}
//In this case, we want to display a summary of all news stories
else
{
        
}

//Build up our Dynamic Content Items. 
$tpagetitle = "News";
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