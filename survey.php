<?php

//needs the following parameters in the URL
//survey.php?ticket=3&domain=support.groupon.com&rating=+

require 'vendor/autoload.php';

$pheanstalk = new Pheanstalk_Pheanstalk('127.0.0.1');

if (isset($_GET["t"]) && isset($_GET["domain"]) && isset($_GET["rating"])) {
    $job = '{"id":'.$_GET["t"].',"account":"'.$_GET["domain"].'","rating":"'.$_GET["rating"].'"}';

    $key = 'SuperSecretKey';

    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CFC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $job, MCRYPT_MODE_CFB, $iv);
    $pheanstalk->putInTube('survey',$encrypted,500) ;

}

switch ($_GET["domain"]) {

    //US
    $suffix = $_GET["t"].'&assigneeid='.$_GET["a"];
    case "groupon.zendesk.com":
    header( 'Location: http://www.surveymonkey.com/s/groupon-us-cs?ticketid='.$suffix ) ;
    break;
    case "support.groupon.com":
    header( 'Location: http://www.surveymonkey.com/s/groupon-us-cs?ticketid='.$suffix ) ;
    break;


    //New International
    $suffix = ;

    case "darberry.zendesk.com":

    switch ($_GET["country"]) {
        case "RU":
        header( 'Location: https://ru.research.net/s/RU_CS?ticketid='.$suffix ) ;
        break;
        case "UA":
        header( 'Location: https://ru.research.net/s/UKR_CS?ticketid='.$suffix ) ;
        break;
    }
    break;

    case "grouponae.zendesk.com":

    switch ($_GET["language"]) {
        case "EN":
        header( 'Location: https://www.research.net/s/AE_CS?ticketid='.$suffix ) ;
        break;
        case "AR":
        header( 'Location: https://www.research.net/s/AEAR_CS?ticketid='.$suffix ) ;
        break;
    }
    break;

    case "grouponaustralia.zendesk.com":

    header( 'Location: https://www.research.net/s/AU_CS?ticketid='.$suffix ) ;
    break;

    case "grouponbel.zendesk.com":

    switch ($_GET["language"]) {
        case "FR":
        header( 'Location: https://fr.research.net/s/BEFR_CS?ticketid='.$suffix ) ;
        break;
        case "NL":
        header( 'Location: https://www.research.net/s/BENL_CS?ticketid='.$suffix ) ;
        break;
    }
    break;

    case "grouponbrasil.zendesk.com":
    header( 'Location: https://pt.research.net/s/BR_CS?ticketid='.$suffix ) ;
    break;

    case "grouponfrance.zendesk.com":

    switch ($_GET["country"]) {
        case "FR":
        header( 'Location: https://fr.research.net/s/FR_CS?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"].'&'.$_GET["country"] ) ;
        break;
        case "CH":
        header( 'Location: https://fr.research.net/s/CHF_CS?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"].'&'.$_GET["country"] ) ;
        break;
        case "CA":
        switch($_GET["language"]) {
            case "FR":
            header( 'Location: https://fr.research.net/s/CA_CS?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"].'&'.$_GET["country"] ) ;
            break;
            case "EN":
            header( 'Location: https://www.research.net/s/CAEN_CS?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"].'&'.$_GET["country"] ) ;
            break;
        }
        break;
    }
    break;

    case "groupongermany.zendesk.com":

    switch ($_GET["country"]) {
        case "AT":
        header( 'Location: https://de.research.net/s/AT_CS?ticketid='.$suffix ) ;
        break;
        case "DE":
        header( 'Location: https://de.research.net/s/DE_CS?ticketid='.$suffix ) ;
        break;
        case "CH":
        header( 'Location: https://de.research.net/s/CH_CS?ticketid='.$suffix ) ;
        break;
    }
    break;

    case "groupongreece.zendesk.com":
    header( 'Location: https://www.research.net/s/GR_CS?ticketid='.$suffix ) ;
    break;

    case "grouponhk.zendesk.com":
    header( 'Location: https://www.research.net/s/HK_CS?ticketid='.$suffix ) ;
    break;

    case "grouponindia.zendesk.com":
    header( 'Location: https://www.research.net/s/IN_CS?ticketid='.$suffix ) ;
    break;

    case "grouponireland.zendesk.com":
    header( 'Location: https://www.research.net/s/IE_CS?ticketid='.$suffix ) ;
    break;

    case "grouponitaly.zendesk.com":
    header( 'Location: https://www.research.net/s/IT_CS?ticketid='.$suffix ) ;
    break;

    case "grouponjp.zendesk.com":
    header( 'Location: https://jp.research.net/s/JP_CS?ticketid='.$suffix ) ;
    break;

    case "grouponlatam.zendesk.com":

    switch ($_GET["country"]) {
        case "AR":
        header( 'Location: https://es.research.net/s/AR_CS?ticketid='.$suffix ) ;
        break;
        case "CL":
        header( 'Location: https://es.research.net/s/CL_CS?ticketid='.$suffix ) ;
        break;
        case "CO":
        header( 'Location: https://es.research.net/s/CO_CS?ticketid='.$suffix ) ;
        break;
        case "MX":
        header( 'Location: https://es.research.net/s/MX_CS?ticketid='.$suffix ) ;
        break;
        case "PE":
        header( 'Location: https://es.research.net/s/PE_CSticketid='.$suffix ) ;
        break;
        case "PR":
        header( 'Location: https://es.research.net/s/PR_CS?ticketid='.$suffix ) ;
        break;
    }
    break;

    case "grouponmy.zendesk.com":
    header( 'Location: https://www.research.net/s/MY_CS?ticketid='.$suffix ) ;
    break;


}