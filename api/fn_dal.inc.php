<?php

// Include the Class Include
require_once ("oo_bll.inc.php");
require_once ("oo_pl.inc.php");

function dalfactoryCreateManager(): BLLManager
{
    $tmanager = new BLLManager("Luis", "Enrique", "46", "Spanish");
    $tmanager->bio = "Former Spanish International and Attacking Midfielder for Barcelona between 1996-2004, he became manager in 2014";
    $tmanager->games_managed = 168;
    $tmanager->games_won = 128;
    $tmanager->games_drawn = 21;
    $tmanager->games_lost = 19;
    $tmanager->honours = "La Liga (2014-15,2015-16),Copa Del Rey (2014-15,2015-16),Champions League (2014-15),UEFA Super Cup (2015),FIFA Club World Cup (2015)";
    return $tmanager;
}

function dalfactoryCreateSquad(): BLLSquad
{
    $tsquadmembers = [];
    $tsquadmembers["1"] = new BLLPlayer(1, "GK", "Marc-Andre", "ter Stegen", "Belgian");
    $tsquadmembers["3"] = new BLLPlayer(3, "DF", "Gerard", "Pique");
    $tsquadmembers["4"] = new BLLPlayer(4, "MF", "Ivan", "Rakitic", "Croatian");
    $tsquadmembers["5"] = new BLLPlayer(5, "DF", "Sergio", "Busquets");
    $tsquadmembers["7"] = new BLLPlayer(7, "MF", "Arda", "Turan", "Turkish");
    $tsquadmembers["8"] = new BLLPlayer(8, "MF", "Andres", "Iniesta", "Spanish", "Captain");
    $tsquadmembers["9"] = new BLLPlayer(9, "FW", "Luis", "Suarez", "Uruguayan", "Star Striker");
    $tsquadmembers["10"] = new BLLPlayer(10, "FW", "Lionel", "Messi", "Argentinean", "Legend");
    $tsquadmembers["11"] = new BLLPlayer(11, "FW", "Neymar", "", "Brazilian");
    $tsquadmembers["14"] = new BLLPlayer(14, "DF", "Javier", "Mascherano", "Argentinean");
    $tsquadmembers["18"] = new BLLPlayer(18, "DF", "Jordi", "Alba");
    $tsquadmembers["19"] = new BLLPlayer(19, "DF", "Lucas", "Digne", "French");
    $tsquadmembers["23"] = new BLLPlayer(23, "DF", "Samuel", "Umtiti", "French");
    $tsquadmembers["24"] = new BLLPlayer(24, "MF", "Jeremy", "Mathieu", "French");

    $tsquad = new BLLSquad();
    $tsquad->squadname = "Barcelona First Team";
    $tsquad->captainindex = "8";
    $tsquad->squadlist = $tsquadmembers;
    return $tsquad;
}

function dalfactoryCreateStadium(): BLLStadium
{
    $tstadium = new BLLStadium("Camp Nou", 99354);
    $tstadium->desc = "Camp Nou was built between 1954 and 1957 and has been Barcelona's home ever since.  It is being upgraded at the end of 2017";
    $tstadium->addr = "Calle de Aristides Maillol 12, Barcelona";
    $tstadium->long = 41.3809;
    $tstadium->lat = 2.1228;
    return $tstadium;
}

function dalfactoryCreateManagement(): array
{
    $tsm = [];
    $tsm[] = new BLLManagement("Josep Maria Bartomeu", "President");
    $tsm[] = new BLLManagement("Jordi Cardoner", "First Vice President");
    $tsm[] = new BLLManagement("Carles Villarubi", "Second Vice President");
    $tsm[] = new BLLManagement("Jordi Calsamiglia", "Club Secretary");
    $tsm[] = new BLLManagement("Dr. Jordi MonÃ©s ", "Commissioner");
    $tsm[] = new BLLManagement("Oscar Grau", "CEO");
    $tsm[] = new BLLManagement("Albert Soler", "Sports and Knowledge Executive");
    $tsm[] = new BLLManagement("Ramon Canal", "Chief Scout");
    return $tsm;
}

function dalfactoryCreateCoaching(): array
{
    $tclist = [];
    $tc = new BLLCoaching("Juan Carlos", "Unzue", "Assistant Coach");
    $tc->bio = "";
    $tclist[] = $tc;
    $tc = new BLLCoaching("Roberto", "Moreno", "Assistant Coach");
    $tc->bio = "";
    $tclist[] = $tc;
    $tc = new BLLCoaching("Joan ", "Barbara", "Technical Assistant");
    $tc->bio = "";
    $tclist[] = $tc;
    $tc = new BLLCoaching("Rafel", "Pol", "Fitness Coach");
    $tc->bio = "";
    $tclist[] = $tc;
    $tc = new BLLCoaching("Joaquin", "Valdes", "Psychologist");
    $tc->bio = "";
    $tclist[] = $tc;
    $tc = new BLLCoaching("Jose Ramon", "de la Fuente", "GK Coach");
    $tc->bio = "";
    $tclist[] = $tc;
    return $tclist;
}

function dalfactoryCreateKits(): array
{
    $tkits = [];
    $thome = new BLLKit("Home Kit", "2016/17");
    $thome->manufacturer = "Nike";
    $thome->sponsor = "Qatar Airways";
    $thome->shirtdesc = "Dark Blue/ Red Stripes";
    $thome->shortsdesc = "Dark Blue / Red Trim";
    $thome->socksdesc = "Dark Blue";
    $tkits[] = $thome;

    return $tkits;
}

function dalfactoryCreateSquadCarousel(): array
{
    $tcarouselitems = [];
    $tcarouselitems[] = new PLCarouselImage("plybg1.jpg", "Game Ranking", "Your favourite games, ranked efficiently");
    $tcarouselitems[] = new PLCarouselImage("plybg2.jpg", "Game Ranking", "Your favourite games, ranked efficiently");
    return $tcarouselitems;
}

function dalfactoryCreateClubCarousel(): array
{
    $tcarouselitems = [];
    $tcarouselitems[] = new PLCarouselImage("clubbg1.jpg", "FC Barcelona", "European Legends");
    return $tcarouselitems;
}

function dalfactoryCreateKeyPlayers(): array
{
    $tkeys = [];
    $tkeys[] = new PLKeyPlayerItem("Lionel Messi", "messi", "Argentinean Maestro, widely
								considered one of the greatest players ever to grace a pitch.");
    $tkeys[] = new PLKeyPlayerItem("Andres Iniesta", "iniesta", "One of the most talented passers, blessed with a fantastic first touch - captain fantastic.");
    $tkeys[] = new PLKeyPlayerItem("Luis Suarez", "suarez", "Majestic, yet volatile Striker,
								who has risen to become one of the deadliest marksmen in world
								football.");
    $tkeys[] = new PLKeyPlayerItem("Neymar", "neymar", "With silky skills making way to
								excellent team play, great understanding and pace to burn,
								Neymar is fast becoming a Barca legend.");
    return $tkeys;
}

function dalfactoryCreateQuotes(): array
{
    $tquotes = [];
    $tquote = new PLQuote("Lionel Messi", "Marca", "Source Title");
    $tquote->quote = <<<QUOTE
        The truth is my idea has been to always stay at Barcelona and see out
        the rest of my career here. Like I always say, one doesn't know what
    			can happen in the future, but if it were up to me to decide, I would
    			stay at Barcelona for the rest of my career. 
    QUOTE;
    $tquotes[] = $tquote;
    return $tquotes;
}

function dalfactoryCreateClubTabs(): array
{
    $ttabs = [];

    // Tab 1
    $ttab = new PLTab("history", "Club History");
    $ttab->content = <<<TAB
        <p>
    						The slogan â€œmore than a Clubâ€� expresses the commitment that <strong>Futbol
    							Club Barcelona</strong> has maintained and still maintains beyond
    						what belongs in the realm of sport. For many years, this
    						commitment specifically referred to Catalan society, which for
    						many decades of the 20th century lived under dictatorships that
    						persecuted its language and culture. Under these circumstances,
    						BarÃ§a always supported Catalan sentiments, and the defence of its
    						own language and culture.
    					</p>
    
    					<p>It was because of this,even though Catalan was not an official
    						language, that in 1921 the club drafted its statutes in the
    						language of Catalonia. It was also in this era that in 1918 the
    						club adhered to a petition for a statute of autonomy for
    						Catalonia, which was being demanded from all sectors of the
    						catalanista movement.</p>
    
    					<p>
    						The clubâ€™s position&nbsp;led to reprisals from the Spanish
    						authorities and it was closed down for six months under the <strong>Primo
    							de Rivera</strong> dictatorship. During the Second Spanish
    						Republic, the club intensified its message of implication with
    						Cataloniaâ€™s own culture and institutions. President <strong>Josep
    							SuÃ±ol</strong> led this process using the slogan â€œsport and
    						citizenshipâ€�, the purpose being to imply sports in the countryâ€™s
    						social and cultural affairs.<br> <br> SuÃ±ol, who was also a member
    						of parliament, was shot dead early in the Spanish Civil War in
    						1936; and from then on, the Club came to be an icon of the defence
    						of the Republic, as shown by the tour of Mexico and the United
    						States in 1937. When the Civil War ended, General Francoâ€™s
    						dictatorship sought to destroy the clubâ€™s social significance.
    					</p>
    
    					<p>
    						It enforced the Spanish version of its name and the removal of the
    						four Catalan stripes from the badge. Despite the dictatorshipâ€™s
    						persistence, in the late 1960s the Club started&nbsp;recovering
    						its former spirit,&nbsp;evident in&nbsp;the speeches of President
    						NarcÃ­s de Carreras, the man who coined the famous phrase&nbsp;<strong>â€œmore
    							than a Clubâ€�</strong> in 1968. Outside of Catalonia, in many
    						parts of Spain, BarÃ§a also became a symbol&nbsp;of democracy and
    						anti-centralism. When democracy returned after the death of
    						Franco, the Club maintained its social commitment and new ways of
    						supporting good&nbsp;causes emerged, which would later be
    						encompassed by the creation of the Clubâ€™s Foundation.<br> <br> Now
    						in the age of globalisation, BarÃ§a has extended its social
    						commitment to the rest of the planet, with a specially significant
    						event being the signing of an agreement with <strong>Unicef</strong>
    						in 2006, which was a way of saying that a sports club should not
    						be marginal to problems going on in society, in this case, the
    						plight of children around the world. Because of this, BarÃ§a
    						continues to be â€œmore than a Clubâ€� both in Catalonia and elsewhere
    						in the world, and is implied in numerous cultural, social and
    						charity initiatives.
    					</p>
    
    					<p>
    						Below we take a look at the four of the defining traits of Futbol
    						Club Barcelona.<br> <br> <strong>CATALANISM</strong>: Since its
    						very foundation, FC Barcelona has been intrinsically linked to its
    						country, Catalonia, a commitment that comes from society as a
    						whole and one that is understood by BarÃ§a fans in the rest of
    						Spain and in the rest of the world. The Club firmly and strongly
    						promotes Catalonia around the world. BarÃ§a supports an integrated,
    						multicultural, fair and caring Catalonia.<br> <br> <strong>UNIVERSALITY:</strong>
    						When the Club anthem says â€˜it does not matter where you come
    						fromâ€™, it expresses the spirit of an institution open to everyone,
    						that brings together fans from around the five continents and
    						links them to a history in which half of the Clubâ€™s founders were
    						from outside Catalonia. FC Barcelona has members and supportersâ€™
    						clubs in more than 50 countries, from Cameroon to China, millions
    						of fans come together to make BarÃ§a great.<br> <br> <strong>SOCIAL
    							COMMITMENT:</strong> BarÃ§a is an open club, one that brings
    						people together and promotes positive values on a daily basis
    						whether it be via its own Foundation, via agreements with
    						international institutions such as UNICEF, or via collaborations
    						with local organisations such as â€˜Banc dels Alimentsâ€™. These
    						projects are usually developed in areas such as educations, the
    						arts and culture as well as in community support and developmental
    						aid.&nbsp;<br> <br> <strong>DEMOCRACY</strong>: The Club members
    						are also its owners and they decide democratically who it is that
    						ought to run FC Barcelona. The democratic principle is a
    						fundamental pillar of the Club and it has only been neglected when
    						dictatorships have intervened. Today BarÃ§a is one of the few big
    						European clubs that is run democratically, another factor in its
    						unique appeal.
    					</p>
    
    					<p>
    						<a href="http://www.catalunya.com/">DISCOVER CATALONIA</a>
    					</p>
    TAB;
    $ttabs[] = $ttab;

    // Tab 2
    $ttab = new PLTab("season", "2016-17 Season");
    $ttab->content = <<<TAB
        <section class="well">
    						<h4>June</h4>
    						On 1 June, the club announced that Sandro RamÃ­rez's contract would
    						be rescinded.[1] On 2 June, Barcelona announced that Dani Alves
    						would be departing the club after eight seasons.[2] On 3 June,
    						Barcelona announced that German club Borussia Dortmund have
    						informed them of their desire to activate the buy-out clause for
    						Marc Bartra.[3] On 5 June, the club announced that Denis SuÃ¡rez
    						will be forming part of the first team for this season.[4]
    					</section>
    					<section class="well">
    						<h4>July</h4>
    						On 1 July, Barcelona and Neymar negotiated a five-year contract
    						extension lasting until 30 June 2021.[5] On 4 July, the club
    						completed the transfer of Denis SuÃ¡rez.[6] On 12 July, the club
    						announced the transfers of 22-year-old French international
    						defender Samuel Umtiti from Lyon[7] and Lucas Digne from Paris
    						Saint-Germain for the next five seasons, respectively.[8] On 14
    						July, the two transfers were completed.[9][10] On 19 July,
    						Barcelona and Sergi Samper negotiated a three-year contract
    						extension lasting until 30 June 2019, including promotion to the
    						first team.[11] On 19 July, Barcelona and Munir El Haddadi also
    						negotiated a three-year contract extension lasting until 30 June
    						2019.[12] On 19 July, Barcelona and Qatar Airways extended
    						sponsorship agreement for one year more.[13] On 21 July, Barcelona
    						and Valencia reached an agreement for the transfer of Portuguese
    						international midfielder AndrÃ© Gomes.[14] On 26 July, the transfer
    						was completed.[15] During the press conference of Gomes'
    						presentation, the club announced midfielder Javier Mascherano's
    						contract was extended until 30 June 2019.[16] On 30 July,
    						Barcelona won their first pre-season match against Scottish
    						champions Celtic with a 1â€“3 score in Dublin as part of the 2016
    						International Champions Cup.[17]
    					</section>
    					<section class="well">
    						<h4>August</h4>
    						On 1 August, the club cancelled the contracts of Alex Song and
    						MartÃ­n Montoya.[18][19] On 3 August, Barcelona defeated English
    						Premier League champions Leicester City 4â€“2 in Stockholm with
    						goals from Munir (2), Luis SuÃ¡rez and Barcelona B player Rafa
    						MÃºjica.[20] On 6 August, Barcelona were soundly defeated by
    						Liverpool 4â€“0 at Wembley Stadium in London.[21] On 8 August, the
    						club loaned Thomas Vermaelen to Italian club Roma with an option
    						to buy.[22] On 10 August, the 2016 Joan Gamper Trophy was played
    						against Italian club Sampdoria, finishing 3â€“2 with a goal from
    						Luis SuÃ¡rez and two from Lionel Messi.[23] On 14 August 2016,
    						Barcelona won the first official match in the 2016 Supercopa de
    						EspaÃ±a against Sevilla with a 0â€“2 away score.[24] On 18 August
    						2016, Barcelona beat Sevilla with 3â€“0 (5â€“0 aggregate) and won
    						their 12th Supercopa de EspaÃ±a.[25] On 20 August, Barcelona
    						defeated Real Betis 6â€“2 in their first Liga match, with a
    						hat-trick from Luis SuÃ¡rez, two goals from Messi and one from Arda
    						Turan.[26] On 25 August, the club completed the transfer of
    						27-year-old goalkeeper Jasper Cillessen from Ajax on a five-year
    						contract,[27] with goalkeeper Claudio Bravo then joining
    						Manchester City after a two-year spell with BarÃ§a.[28] Several
    						hours later, both teams were drawn into Group C of the Champions
    						League draw, alongside Borussia MÃ¶nchengladbach and Celtic.[29] On
    						28 August, Barcelona defeated Athletic Bilbao 0â€“1 with a goal from
    						Rakitic and Luis Enrique wins his 100th match as BarÃ§a
    						manager,[30] Ter Stegen made most goalkeeper passes in one single
    						match in LaLiga.[31] On 30 August, the club completed the last
    						transfer of Paco AlcÃ¡cer from Valencia.[32]
    					</section>
    					<section class="well">
    						<h4>September</h4>
    						On 10 September, in the match against Deportivo Alaves, Barcelona
    						suffered a 1-2 defeat.[33] On 13 September, Barcelona defeated
    						Celtic 7â€“0 in the opening match of Group C in the Champions
    						League. Messi notched his first hat-trick of the season, while
    						Neymar provided four assists and a free-kick goal.[34] On 17
    						September, Barcelona faced for the first time recently promoted
    						LeganÃ©s at the Estadio Municipal de Butarque. Barcelona won 1â€“5
    						with two goals from Messi and one each from Luis SuÃ¡rez, Neymar
    						and Rafinha.[35] On 21 September, Barcelona drew against AtlÃ©tico
    						Madrid 1â€“1; Ivan RakitiÄ‡ gave BarÃ§a the lead before half-time, but
    						AtlÃ©tico battled back to draw level in the second half after Messi
    						was substituted out due to injury.[36] On 24 September, Barcelona
    						won 0â€“5 over Sporting de GijÃ³n through two goals from Neymar and
    						one each from SuÃ¡rez, Turan and Rafinha.[37] On 28 September,
    						Barcelona defeated Borussia MÃ¶nchengladbach 1â€“2 with goals from
    						Turan and Gerard PiquÃ©, turning around a 1â€“0 first-half deficit to
    						BarÃ§a top of Group C.[38] October On 2 October, Barcelona lost to
    						Celta de Vigo 4â€“3; a second-half resurgence not enough for Luis
    						Enrique's side as they finished on the wrong end of a seven-goal
    						thriller away in Vigo.[39] On 15 October, Barcelona defeated
    						Deportivo de La CoruÃ±a 4â€“0 with two goals from Rafinha and one
    						each from Luis SuÃ¡rez and Messi, the latter who returned from
    						injury in the match.[40] On 19 October, Barcelona defeated
    						Manchester City â€“ led by former BarÃ§a manager Pep Guardiola â€“ 4â€“0
    						at home on the strength of a Messi hat-trick.[41] On 22 October,
    						Barcelona defeated Valencia 2â€“3 at Mestalla, Messi spot-kick in
    						injury time secured three points out of an electrifying
    						encounter.[42] On 29 October, Barcelona won Granada 1â€“0 in the
    						1,500th game at Camp Nou, BarÃ§a found it tough to breakdown the
    						stubborn visitors but Rafinha's strike was enough to claim the
    						win.[43]
    					</section>
    TAB;
    $ttabs[] = $ttab;

    return $ttabs;
}

?>