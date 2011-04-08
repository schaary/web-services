<?php

ini_set('soap.wsdl.cache_enabled', 0);

define('APPLICATION_PATH', dirname(dirname(__FILE__)));
//include(APPLICATION_PATH.'/Bootstrap.php');
//include(APPLICATION_PATH.'/lib/Db.php');
require_once("/usr/local/zend/share/ZendFramework/library/Zend/Soap/Client.php");

$soap = new Zend_Soap_Client(
    null
  , array('location' => 'http://oracle.urz.uni-halle.de/webservices/shib/shibServer.php'
  , 'uri' => 'http://oracle.urz.uni-halle.de'));


//var_dump($soap);

$ergebnis = $soap->isMitarbeiter('0003169642');
echo var_dump($ergebnis)."\n";
exit(0);

