<?php

require_once("oo_bll.inc.php");
require_once("oo_pl.inc.php");

function renderManagerOverview(BLLManager $pm)
{
    $tmanhtml = <<<OVERVIEW
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Manager Overview: {$pm->fname} {$pm->lname}</h3>
        </div>
        <div class="panel-body">
            <div class="well">
            {$pm->bio}
            </div>
            <div class="well">
            <strong>Club Honours:</strong> {$pm->honours}
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    Nationality: <strong>{$pm->nationality}</strong>
                </li>
                <li class="list-group-item">
                    <span class="badge">{$pm->games_managed}</span>
                    Games Managed
                </li>
                <li class="list-group-item">
                    <span class="badge">{$pm->games_won}</span>
                    Games Won
                </li>
                <li class="list-group-item">
                <span class="badge">{$pm->games_drawn}</span>
                    Games Drawn
                </li>
                <li class="list-group-item">
                <span class="badge">{$pm->games_lost}</span>
                    Games Lost
                </li>
            </ul>
        </div>
     </div>
OVERVIEW;
    return $tmanhtml;
}

function renderPlayerOverview(BLLPlayer $pp)
{
    $toverview = <<<OVERVIEW
    <article class="row marketing">
        <h2>Player Details</h2>
        <div class="well">
            <h1>{$pp->firstname} {$pp->lastname}</h1>
        </div>
        <div class="col-xs-6 text-center">
            <h3>Squad Number</h3>
            <h1 class="text-center">{$pp->squadno}</h1>
        </div>
        <div class="col-xs-6">
            <h3>Position: {$pp->position}</h3>
            <h3>Nationality: {$pp->nationality}</h3>
        </div>
    </article>
OVERVIEW;
    return $toverview;
}

function renderStadiumOverview(BLLStadium $ps)
{
    $tmanhtml = <<<OVERVIEW
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Stadium Overview: {$ps->name}</h3>
        </div>
        <div class="panel-body">
            <div class="well">
            {$ps->desc}
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    Capacity: <strong>{$ps->capacity}</strong>
                </li>
                <li class="list-group-item">
                    Location: <strong>{$ps->addr}</strong>
                </li>
            </ul>
        </div>
    </div>
OVERVIEW;
                return $tmanhtml;
}

function renderPlayerRow(BLLPlayer $pp)
{
    $trow = <<<PROW
    		<tr>
    		    <td>{$pp->squadno}</td>
    		    <td>{$pp->position}</td>
				<td>{$pp->firstname} {$pp->lastname}</td>
				<td>{$pp->nationality}</td>
			</tr>
PROW;
    return $trow;
}

function renderSquadTable(BLLSquad $psquad)
{
    $trowdata = "";
    foreach($psquad->squadlist as $tp)
    {
        $trowdata .= renderPlayerRow($tp);
    }    
    $ttable = <<<TABLE
<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Position</th>
							<th>Name</th>
							<th>Nationality</th>
						</tr>
					</thead>
					<tbody>
					{$trowdata}
					</tbody>
</table>
TABLE;
return $ttable;
}

function renderKitOverview(BLLKit $pkit)
{
    $tkithtml = <<<KIT
    
KIT;
    return $tkithtml;
}

function renderManagementTable(array $pmanlist)
{
    $trowdata = "";
    foreach($pmanlist as $tman)
    {
        $trowdata .= <<<ROW
            <tr>
    		    <td>{$tman->name}</td>
    		    <td>{$tman->role}</td>
    		    <td></td>
			</tr>
ROW;
    }
    $ttable = <<<TABLE
<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Role</th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
					{$trowdata}
					</tbody>
</table>
TABLE;
					return $ttable;
}

function renderCoachingTable(array $pcoachlist)
{
    $trowdata = "<tr><td></td><td></td><td></td></tr>";

    $ttable = <<<TABLE
<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Role</th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
					{$trowdata}
					</tbody>
</table>
TABLE;
    return $ttable;
}

function renderStatistics(array $pstats)
{
    $tstats = "";
    foreach($pstats as $tstat)
    {
        $tstats .= <<<STAT
        <li class="list-group-item">
            <span class="badge">{$tstat->value}</span>
            <strong>{$tstat->stat}: </strong>
            {$tstat->holder}
        </li>
STAT;
    }
    
    $tpanel = <<<PANEL
    <div class="well well-lg">
        <ul class="list-group">
            {$tstats}
        </ul>
    </div>
        
PANEL;
    return $tpanel;
}

function renderCarousel(array $pimgs,$pimgdir)
{
    $tci = "";
    $count = 0;
    
    //-------Build the Images---------------------------------------------------------
    foreach($pimgs as $titem)
    {
        $tactive = $count === 0 ? " active": "";
        $thtml = <<<ITEM
        <div class="item{$tactive}">
            <img class="img-responsive" src="{$pimgdir}/carousel/{$titem->imgref}">
            <div class="container">
                <div class="carousel-caption">
                    <h1>{$titem->title}</h1>
                    <p class="lead">{$titem->lead}</p>
		        </div>
			</div>
	    </div>            
ITEM;
        $tci .=$thtml;
        $count++;
    }
    
    //--Build Navigation-------------------------
    $tdot = "";  $tdotset = ""; $tarrows = "";
  
    if($count > 1)
    {
        for($i=0; $i < count($pimgs);$i++)
        {
            if($i === 0)
               $tdot .= "<li data-target=\"#myCarousel\" data-slide-to=\"$i\" class=\"active\"></li>";
            else
               $tdot .= "<li data-target=\"#myCarousel\" data-slide-to=\"$i\"></li>";
        }       
        $tdotset = <<<INDICATOR
        <ol class="carousel-indicators">
        {$tdot}
        </ol>
INDICATOR;
     }
     if($count > 1)
     {
        $tarrows = <<<ARROWS
		<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
ARROWS;
     }    
        
    $tcarousel = <<<CAROUSEL
    <div class="carousel slide" id="myCarousel">
            {$tdotset}
			<div class="carousel-inner">
				{$tci}
			</div>	
		    {$tarrows}
    </div>
CAROUSEL;
    return $tcarousel;
}

function renderTabs(array $ptabs,$ptabid)
{
    $count = 0;
    $ttabnav     = "";
    $ttabcontent = "";
    
    foreach($ptabs as $ttab)
    {
        $tnavactive = ""; $ttabactive = "";
        if($count === 0)
        {
            $tnavactive = " class=\"active\"";
            $ttabactive = " active in";
        }       
        $ttabnav .= "<li{$tnavactive}><a href=\"#{$ttab->tabid}\" data-toggle=\"tab\">{$ttab->tabname}</a></li>";
        $ttabcontent .= "<article class=\"tab-pane fade{$ttabactive}\" id=\"{$ttab->tabid}\">{$ttab->content}</article>";
        $count++;
    }
    
    $ttabhtml = <<<HTML
        <ul class="nav nav-tabs">
        {$ttabnav}
        </ul>
    	<div class="tab-content" id="{$ptabid}">
			  {$ttabcontent}
		</div>
HTML;
    return $ttabhtml;
}

function renderQuote(PLQuote $pquote)
{
    $tquote = <<<QUOTE
    <blockquote>
    {$pquote->quote}
    <small>{$pquote->person} in <cite title="{$pquote->source}">{$pquote->pub}</cite></small>
	</blockquote>
QUOTE;
    return $tquote;
}

function renderHomeArticle(PLHomeArticle $phome,$pwidth=6)
{
    $thome = <<<HOME
    <article class="col-lg-{$pwidth}">
		<h2>{$phome->heading}</h2>
		<h4>
			<span class="label label-success">{$phome->tagline}</span>
		</h4>
		<div class="home-thumb">
			<img src="{$phome->storyimg}" />
		</div>
		<div class="text-primary">
			{$phome->summary}
		</div>
        <div class="text">
		    {$phome->content}
        <div>
        <div class="options">
			<a class="btn btn-info" href="{$phome->link}">{$phome->linktitle}</a>
        </div>
	</article>
HOME;
		    return $thome;
}

function renderNewsSummary(PLNewsItem $pitem)
{
    $tnewsitem = <<<NI
		    <section class="list-group-item">
				<h4 class="list-group-item-heading">{$pitem->heading}</h4>
				<p class="list-group-item-text">{$pitem->summary}</p>
				<a class="btn btn-xs btn-default" href="{$pitem->link}">{$pitem->linktext}</a>
			</section>
NI;
    return $tnewsitem;
}

function renderLastFixture()
{
    $tfixture = <<<HTML
     	<section class="panel panel-primary" id="club-results">
			<div class="panel-heading">
				<h3 class="panel-title">Latest Result</h3>
			</div>
			<div class="panel-body">
				<h2>
					<img width="24"
						src="http://e2.365dm.com/football/badges/192/823.png"> <a
						href="/paris-st-germain"> <abbr title="Paris Saint-Germain">PSG</abbr></a>
					<span class="info"> 4 </span>
				</h2>

				<p>
					<span>A di Maria (18, 55),</span><span>J Draxler (40),</span><span>E
						Cavani (71)</span>
				</p>
				<h2>
					<img width="24"
						src="http://e1.365dm.com/football/badges/192/549.png"> <a
						href="/barcelona"><abbr title="FC Barcelona">Barcelona</abbr></a>
					<span class="info"> 0</span>
				</h2>

				<p><strong>PSG vs Barcelona</strong></p>
				<p>Champions League 1st KO Rnd</p>
				<p class="text-success">7:45pm Tuesday 14th February</p>
				<p class="text-danger">Parc des Princes (Att: 46484)</p>
				<p>
					<strong>Angel Di Maria scored two stunning goals as Paris
						Saint-Germain thrashed Barcelona 4-0 on Tuesday to take control of
						their Champions League last-16 tie.</strong>
				</p>
				<p>In one of the most remarkable performances in the competition's
					history, the Ligue 1 champions completely dominated Barca at the
					Parc des Princes, taking the lead through Di Maria's free-kick
					after 18 minutes.</p>
				<p>Julian Draxler added a second in the 40th minute before Di Maria
					curled home their third from the edge of the box 10 minutes after
					half-time.</p>
			</div>
		</section>
HTML;
    return $tfixture;
}

function renderKeyPlayersList(array $pkeyplayers)
{
    $tkeylist = "";    
    foreach($pkeyplayers as $tkey)
    {
        $tli = <<<LI
        <section class="list-group-item">
            <h4 class="list-group-item-heading">
                {$tkey->name}
            </h4>
            <p class="list-group-item-text">{$tkey->desc}</p>
        </section>
            
LI;
        $tkeylist .= $tli;
    }  
        
    $tpanel = <<<PANEL
    <div class="panel panel-default">
        <div class="panel-heading">Key Players</div>
        <div class="panel-body">
        <div class="list-group">
        {$tkeylist}   
        </div>
        
PANEL;
    return $tpanel;   
}
?>