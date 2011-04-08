<?php

defined('APPLICATION_PATH') || define('APPLICATION_PATH', dirname(dirname(__FILE__)));
include('../Bootstrap.php');
include(APPLICATION_PATH.'/lib/Db.php');
include(APPLICATION_PATH.'/shib/shibInterface.php');

require_once(APPLICATION_PATH."/lib/Zend/Soap/Server.php");
require_once(APPLICATION_PATH."/lib/Zend/Soap/AutoDiscover.php");

if (isset($_SERVER['QUERY_STRING']) && strtolower($_SERVER['QUERY_STRING']) == 'wsdl') {
  $auto = new Zend_Soap_AutoDiscover();
  $auto->setClass('shibInterface');
  $auto->handle();
} else {
  $soap = new Zend_Soap_Server('http://oracle.urz.uni-halle.de/webservices/shib/shibServer.php?WSDL');
  $soap->setClass('shibInterface');
  $soap->handle();
}

