<?php

//needs the following parameters in the URL
//survey.php?ticket=3&domain=support.groupon.com&rating=+

require 'vendor/autoload.php';

$pheanstalk = new Pheanstalk_Pheanstalk('127.0.0.1');

if (isset($_GET["t"]) && isset($_GET["domain"]) && isset($_GET["rating"])) {
    $job = '{"id":'.$_GET["t"].',"account":"'.$_GET["domain"].'","rating":"'.$_GET["rating"].'"}';

    $key = 'SuperSecretKey';

    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $job, MCRYPT_MODE_CFB, $iv);
    $pheanstalk->putInTube('survey',$encrypted,500) ;

}

switch ($_GET["domain"]) {

    //US
case "groupon.zendesk.com":
    header( 'Location: http://www.surveymonkey.com/s/groupon-us-cs?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;
case "support.groupon.com":
    header( 'Location: http://www.surveymonkey.com/s/groupon-us-cs?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
    break;


    //New International
case "darberry.zendesk.com":

    switch ($_GET["country"]) {
    case "RU":
//        header( 'Location: RU-URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
echo "OK";
        break;
    case "UA":
        header( 'Location: UA-URLHERE?ticketid='.$_GET["t"].'&assigneeid='.$_GET["a"] ) ;
        break;
    }


}
