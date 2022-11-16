<?php

//Include our HTML Page Class
require_once("oo_page.inc.php");

class MasterPage
{
    //-------FIELD MEMBERS----------------------------------------
    private $_htmlpage;     //Holds our Custom Instance of an HTML Page
    private $_dynamic_1;    //Field Representing our Dynamic Content #1
    private $_dynamic_2;    //Field Representing our Dynamic Content #2
    private $_dynamic_3;    //Field Representing our Dynamic Content #3
    
    //-------CONSTRUCTORS-----------------------------------------
    function __construct($ptitle)
    {
        $this->_htmlpage = new HTMLPage($ptitle);
        $this->setPageDefaults();
        $this->setDynamicDefaults(); 
    }
    
    //-------GETTER/SETTER FUNCTIONS------------------------------
    public function getDynamic1() { return $this->_dynamic_1; }
    public function getDynamic2() { return $this->_dynamic_2; } 
    public function getDynamic3() { return $this->_dynamic_3; }
    public function setDynamic1($phtml) { $this->_dynamic_1 = $phtml; }
    public function setDynamic2($phtml) { $this->_dynamic_2 = $phtml; } 
    public function setDynamic3($phtml) { $this->_dynamic_3 = $phtml; }
    public function getPage(): HTMLPage { return $this->_htmlpage; } 
    
    //-------PUBLIC FUNCTIONS-------------------------------------
                   
    public function createPage()
    {
       //Create our Dynamic Injected Master Page
       $this->setMasterContent();
       //Return the HTML Page..
       return $this->_htmlpage->createPage();
    }
    
    public function renderPage()
    {
       //Create our Dynamic Injected Master Page
       $this->setMasterContent();
       //Echo the page immediately.
       $this->_htmlpage->renderPage();
    }
    
    public function addCSSFile($pcssfile)
    {
        $this->_htmlpage->addCSSFile($pcssfile);
    }
    
    public function addScriptFile($pjsfile)
    {
        $this->_htmlpage->addScriptFile($pjsfile);
    }
    
    //-------PRIVATE FUNCTIONS-----------------------------------    
    private function setPageDefaults()
    {

    }
    
    private function setDynamicDefaults()
    {        
        $tcurryear = date("Y");
        //Set the Three Dynamic Points to Empty By Default.
        $this->_dynamic_1 = <<<JUMBO
<h1>Footy around the World</h1>
<p class="lead">Football on a global level.</p>
JUMBO;
        $this->_dynamic_2 = "";
        $this->_dynamic_3 = <<<FOOTER
<p>Dr Tom Hughes-Roberts - LJMU &copy; {$tcurryear}</p>
FOOTER;
    }
    
    private function setMasterContent()
    {
        $tauth = "";
        $tmasterpage = <<<MASTER
<div class="container">
	<div class="header clearfix">
		<nav>
		    {$tauth}
			<ul class="nav nav-pills pull-right">
				<li role="presentation" class="active"><a href="index.php">Home</a></li>
				<li role="presentation"><a href="clubinfo.php">Featured Club</a></li>
				<li role="presentation"><a href="squad.php">1st Team Squad</a></li>
				<li role="presentation"><a href="news.php">Latest News</a></li>
			</ul>			
			<h3 class="text-muted">FATW</h3>

		</nav>
	</div>
	<div class="jumbotron">
		{$this->_dynamic_1}
    </div>
	<div class="row details">
		{$this->_dynamic_2}
    </div>
    <footer class="footer">
		{$this->_dynamic_3}
	</footer>
</div>        
MASTER;
        $this->_htmlpage->setBodyContent($tmasterpage); 
    }
}

?>