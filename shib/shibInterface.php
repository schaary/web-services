<?php

defined('APPLICATION_PATH') || define('APPLICATION_PATH', dirname(dirname(__FILE__)));
include(APPLICATION_PATH.'/Bootstrap.php');
include(APPLICATION_PATH.'/lib/Db.php');

class shibInterface
{
  private $bootstrap;
  private $db;

  public function __construct() // {{{
  {
    $this->bootstrap = new Bootstrap();
    $this->db        = new Db();
    $this->db->connectOracle();
//    $this->numOfStudents();
  } // }}}

  /**
   * isMitarbeiter
   *
   * @param string $BiboNr
   * @return integer
   */
  public function isMitarbeiter($biboNr) // {{{
  {
    $vConnOracle = Zend_Registry::get('conn_oracle');
    $vStrQuery   = 'BEGIN :retval := '
      . 'bibo_pkg.isMitarbeiter(:biboNr); '
      . 'END;';
    $vObjStatement = oci_parse($vConnOracle, $vStrQuery);
    oci_bind_by_name($vObjStatement, 'retval', $vIntReturnValue, 38);
    oci_bind_by_name($vObjStatement, 'biboNr', $biboNr, 255);
    oci_execute($vObjStatement);

    if( $vIntReturnValue == 1 ) {
      return 1;
    } else {
      return 0;
    }
  } // }}}

}

