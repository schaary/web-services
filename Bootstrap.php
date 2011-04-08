<?php

class Bootstrap 
{
  /**
   * Initialisierung aller wichtigen Elemente
   *
   *   - Zend_Registry einrichten
   *   - Konfigurations-Datei einlesen und in die Zend_Registry schreiben
   *   - Log-Datei oeffnen und in Registry ablegen
   *   - bei Bedarf Datenbank-Verbindung zum Nutzerprojekt oeffnen und in die 
   *     Zend_Registry ablegen
   *   - bei Bedarf Datenbank-Verbindung zur PostgreSQL-DB (HIS-SVA, HIS-SOS)  
   *     oeffnen und in der Zend_Registry ablegen
   */
  public function __construct($configSection = 'general') // {{{
  {

    // richten den include-Pfad ein
    $rootDir = dirname(__FILE__).'/';
    
    define('ROOT_DIR', $rootDir);
    set_include_path(get_include_path()
      . PATH_SEPARATOR . ROOT_DIR . '/library/');

    include('Zend/Loader/Autoloader.php');
    Zend_Loader_Autoloader::getInstance();

    // Registry anlegen
    $config = new Zend_Config_Ini(
      ROOT_DIR.'config/config.ini', 
      $configSection);
    
    $registry = Zend_Registry::getInstance();
    $registry['config'] = $config;

    $registry['ROOT_DIR'] = ROOT_DIR;

    //Zend_Debug::dump($registry->config->date_default_timezone);
    date_default_timezone_set($registry->config->date_default_timezone);

  } // }}}
}
