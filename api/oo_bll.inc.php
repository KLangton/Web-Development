<?php

class BLLClub
{
    //-------CLASS FIELDS------------------
    public $fullname;
    public $shortname;
    public $nickname;
    public $country;
    public $league;
    public $competitions;
    public $founded;
    public $majorhonours;
    
    //-------CONSTRUCTOR--------------------
    public function __construct($pfullname,$pshortname,$pnickname,$pcountry,$pleague)
    {
        $this->fullname = $pfullname;
        $this->shortname = $pshortname;
        $this->nickname = $pnickname;
        $this->country = $pcountry;
        $this->league = $pleague;
        $this->competitions = [];
        $this->founded = 1900;
        $this->majorhonours = "";
    }
}

class BLLPlayer
{
    //-------CLASS FIELDS------------------
    public $squadno;
    public $position;
    public $firstname;
    public $lastname;
    public $nationality;
    public $role;

    //-------CONSTRUCTOR--------------------
    public function __construct($psno,$ppos,$pfn,$pln,$pnat = "Spanish",$prole = "")
    {
        $this->squadno = $psno;
        $this->position = $ppos;
        $this->firstname = $pfn;
        $this->lastname = $pln;
        $this->nationality = $pnat;
        $this->role = $prole;
    }
}

class BLLSquad
{
    //-------CLASS FIELDS------------------
    public $squadlist;
    public $squadname; 
    public $captainindex;
    
    //-------CONSTRUCTOR--------------------
    public function __construct()
    {
        $this->squadlist = array();
        $this->squadname = "";
        $this->captainindex = -1;
    }
}

class BLLManagement
{
    //-------CLASS FIELDS------------------
    public $name;
    public $role;
    
    //-------CONSTRUCTOR--------------------
    public function __construct($pname,$prole)
    {
        $this->name = $pname;
        $this->role = $prole;
    }
}

class BLLManager
{
    //-------CLASS FIELDS------------------
    public $fname;
    public $lname;
    public $age;
    public $nationality;
    public $bio;
    public $games_managed;
    public $games_lost;
    public $games_won;
    public $games_drawn;
    public $honours;

    //-------CONSTRUCTOR--------------------
    public function __construct($pfn,$pln,$page,$pnat)
    {
        $this->fname    = $pfn;
        $this->lname    = $pln;
        $this->age      = $page;
        $this->nationality = $pnat;
        $this->games_managed = 0;
        $this->games_lost = 0;
        $this->games_won = 0;
        $this->games_drawn = 0;
        $this->honours = "";
    }
}

class BLLCoaching
{
    //-------CLASS FIELDS------------------
    public $fname;
    public $lname;
    public $role;
    public $bio;
    
    //-------CONSTRUCTOR--------------------
    public function __construct($pfname,$plname,$prole)
    {
        $this->fname = $pfname;
        $this->lname = $plname;
        $this->role  = $prole;
        $this->bio   = "";
    }
}

class BLLFixture
{
    //-------CLASS FIELDS------------------
    public $date;
    public $kickoff = "";
    public $ishome;
    public $opponent;
    public $venue = "";
    public $attendance = 0;
    public $goalsfor = [];
    public $goalsagainst = [];
    public $competition = "";
    
    //-------CONSTRUCTOR--------------------
    public function __construct($popp,$pathome,$pdate)
    {
        $this->opponent = $popp;
        $this->ishome   = $pathome;
        $this->date     = $pdate;
    }
}

class BLLKit
{
    //-------CLASS FIELDS------------------
    public $kittype;
    public $kityear;
    public $kitimageref;
    public $shirtdesc;
    public $shortsdesc;
    public $socksdesc;
    public $manufacturer;
    public $sponsor;
    
    //-------CONSTRUCTOR--------------------
    public function __construct($pkittype,$pkityear)
    {
        $this->kittype = $pkittype;
        $this->kityear = $pkityear;
        $this->kitimageref = "";
        $this->shirtdesc = "";
        $this->shortsdesc = "";
        $this->socksdesc = "";
        $this->manufacturer = "";
        $this->sponsor = "";
    }
}

class BLLStadium
{
    //-------CLASS FIELDS------------------
    public $name;
    public $addr;
    public $capacity;
    public $desc;
    public $lat;
    public $long;    
    public $imgdir;
    
    //-------CONSTRUCTOR--------------------
    public function __construct($pname,$pcapacity)
    {
        $this->name = $pname;
        $this->capacity = $pcapacity;
        $this->addr;
        $this->desc = "";
        $this->lat = "";
        $this->long = "";
        $this->imgdir = "";        
    } 
}

?>