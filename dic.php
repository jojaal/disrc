<?php
// On inclue le fichier de configuration.
require_once 'config.php';

// Dependency Injection Container
class Dic
{
  // Le constructeur est private pour interdire l'instanciation de la classe.
  private function __construct()
  {
  }

  /*
    Si $dao n'est pas instancié, DIC::getDAO() instancie un DAO de la classe
    indiquée dans le fichier de configuration.
    DIC::getDAO() retourne le $dao.
    */
  protected static function getDAO()
  {
    static $dao;
    if (!isset($dao)) {
      $className = 'DAO\\'.conf()['service.user.dao.class'];
      $dao = new $className();
    }

    return $dao;
  }

  /*
    Si $srvc n'est pas instancié, DIC::service() instancie un service de la classe
    indiquée dans le fichier de configuration.
    DIC::service() retourne le $srvc.
    */
  public static function service()
  {
    static $srvc;
    if (!isset($srvc)) {
      $className = 'Service\\'.conf()['service.user.class'];
      $srvc = new $className(DIC::getDAO());
    }

    return $srvc;
  }
}
