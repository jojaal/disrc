<?php
namespace DAO;
use Entity\User;

// Stockage de l'utilisateur dans un cookie
class DAOUserCookie implements iDAOUser
{
  private $user;
  private $expire;

  // On défini la date d'expiration du cookie dans le constructeur
  function __construct() {
    $this->expire = time() + 3600;
  }

  /*
    getUser() va récupérer l'utilisateur dans le cookie
    ou en créer un vide si il n'existe pas, puis le retourner.
    */
  public function getUser()
  {
    if(!$this->user) {
      if(isset($_COOKIE['user'])) {
        $this->user = unserialize($_COOKIE['user']);
      } else {
        $this->user = new User('Sans nom', 'Sans prenom', 0);
      }
    }
    return $this->user;
  }

  /*
    On enregistre l'utilisateur dans le cookie et on met notre objet
    $this->user à jour.
    */
  public function register($nom, $prenom, $age)
  {
    $this->getUser()->setNom($nom);
    $this->getUser()->setPrenom($prenom);
    $this->getUser()->setAge($age);
    setcookie('user', serialize($this->getUser()), $this->expire);
    return $this;
  }

  public function get($key)
  {
    $getKey = 'get' . ucfirst($key);
    return $this->getUser()->$getKey();
  }

  public function set($key, $value)
  {
    $setKey = 'set' . ucfirst($key);
    $value = (is_int($value)) ? intval($value) : $value;
    $this->getUser()->$setKey($value);
    setcookie('user', serialize($this->getUser()), $this->expire);
    return $this;
  }
}
