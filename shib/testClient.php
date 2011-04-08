<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('soap.wsdl_cache_enabled', 0);

require_once 'Zend/Soap/Client.php';

$client = new Zend_Soap_Client('http://oracle.urz.uni-halle.de/webservices/shib/shibServer.php?wsdl');
var_dump($client->isMitarbeiter('Hans'));

?>

