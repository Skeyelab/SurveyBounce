<?php

//needs the following parameters in the URL
//survey.php?ticket=3&domain=support.groupon.com&rating=+

require 'vendor/autoload.php';

$pheanstalk = new Pheanstalk_Pheanstalk('127.0.0.1');

if (isset($_GET["t"]) && isset($_GET["domain"]) && isset($_GET["rating"])) {
	$job = '{"id":'.$_GET["t"].',"account":"'.$_GET["domain"].'","rating":"'.$_GET["rating"].'"}';

	$key = 'SuperSecretKey';

	$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $job, MCRYPT_MODE_CFB);
	$pheanstalk->putInTube('survey',$encrypted,500) ;

}

switch ($_GET["domain"]){

//US
  case "groupon.zendesk.com":
    header( 'Location: http://www.surveymonkey.com/s/groupon-us-cs?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "support.groupon.com":
    header( 'Location: http://www.surveymonkey.com/s/groupon-us-cs?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;

//Existing International
  case "grouponza.zendesk.com":
    header( 'Location: https://www.research.net/s/ZA_CS?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"].'&ZA' ) ;
    break;
  case "grouponireland.zendesk.com":
    header( 'Location: https://www.research.net/s/IE_CS?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"].'&IE' ) ;
    break;
  case "grouponaustralia.zendesk.com":
    header( 'Location: https://www.research.net/s/AU_CS?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"].'&AU' ) ;
    break;
  case "grouponuk.zendesk.com":
    header( 'Location: https://www.research.net/s/UK_CS?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"].'&UK' ) ;
    break;
  case "grouponfrance.zendesk.com":
    header( 'Location: https://fr.research.net/s/CHF_CS?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"].'&FR' ) ;
    break;


//New International
  case "darberry.zendesk.com":
  
    switch ($_GET["country"]){
      case "RU":
        header( 'Location: RU-URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
        break;
      case "UA":
        header( 'Location: UA-URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
        break;
    break;
  case "grouponae.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponaustralia.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponbel.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponbrasil.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponfrance.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "groupongermany.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "groupongreece.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponhk.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponid.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponindia.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponireland.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponitaly.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponjp.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponlatam.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponmy.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponner.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponnewzealand.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponnl.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponphilippines.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponpoland.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponportugal.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponromania.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponsingapore.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponspain.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponthailand.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponturkey.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponuk.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "grouponza.zendesk.com":
    header( 'Location: URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;

}

