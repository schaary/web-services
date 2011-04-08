<?php

class Db
{
  /**
   * Stellt die Verbindungen zur PostgreSQL-Datenbank her
   *
   * @return int 0, wenn alles in Ordnung, -1 sonst
   */ 
  public function connectOracle() // {{{
  {
    $registry = Zend_Registry::getInstance();

    $vConnOracle = oci_connect(
      $registry->config->db->oracle->connection->user
    , $registry->config->db->oracle->connection->password
    , $registry->config->db->oracle->connection->link);

    if (!$vConnOracle) {
      $vStrOciError = print_r(oci_error(), TRUE);
      echo "Fehler bei Oracle-Verbindung - ".$v_str_oci_error;
      return -1;
    }

    $registry['conn_oracle'] = $vConnOracle;
  } // }}}
}
