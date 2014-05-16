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
  case "groupon.zendesk.com":
    header( 'Location: http://www.surveymonkey.com/s/groupon-us-cs?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
  case "support.groupon.com":
    header( 'Location: http://www.surveymonkey.com/s/groupon-us-cs?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
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
}

