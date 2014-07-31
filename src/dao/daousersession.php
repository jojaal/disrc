<?php
namespace DAO;
use Entity\User;

// Stockage de l'utilisateur dans la $_SESSION
class DAOUserSession implements iDAOUser
{
  private $user;

  /*
    getUser() va récupérer l'utilisateur dans la session 
    ou en créer un vide si il n'existe pas, puis le retourner.
    */
  public function getUser()
  {
    if (!$this->user) {
      if (isset($_SESSION['user'])) {
        $this->user = unserialize($_SESSION['user']);
      } else {
        $this->user = new User('Sans nom', 'Sans prenom', 0);
      }
    }
    return $this->user;
  }

  /*
    On enregistre l'utilisateur dans la session et on met notre objet
    $this->user à jour.
    */
  public function register($nom, $prenom, $age)
  {
    $this->getUser()->setNom($nom);
    $this->getUser()->setPrenom($prenom);
    $this->getUser()->setAge($age);
    $_SESSION['user'] = serialize($this->getUser());
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
    $_SESSION['user'] = serialize($this->getUser());
    return $this;
  }
}
