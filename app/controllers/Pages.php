<?php
class Pages extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }
    //new model instance
    $this->animalModel = $this->model('Animal');
    $this->userModel = $this->model('User');
  }

  //Cette partie du backOffice Permet de voir toutes les demandes de reservation
  //on peut voir dans cette partie du backOffice le mail de l'utilisateur util afin de vouloir le contacté pour poursuivre le processus d'adoption
  public function backOfficeAnimaux()
  {

    $demandeClient = $this->animalModel->getAnimalReservation();
    $data = [
      'demandeClient' => $demandeClient
    ];
    $this->view('pages/backOfficeAnimaux', $data);
  }

  //Cette partie du backOffice permet de voir tout les utilisateurs inscrit ainsi que leur status
  //Un bouton permet de changer le rôle d'un utlisateur: soit utilisaur normal soit admin
  public function backOfficeUsers()
  {

    $users = $this->userModel->getUsers();
    $data = [
      'users' => $users
    ];
    $this->view('pages/backOfficeUsers', $data);
  }

  //Permet de changer le rôle d'un utilisateurs
  public function update($id, $role)
  {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if ($role === "0") {
      $data = [
        'id' => $id,
        'role' => "1",
      ];
    } else if ($role === "1") {
      $data = [
        'id' => $id,
        'role' => "0",
      ];
    }

    $this->userModel->updateUserRole($data);
    redirect('pages/backOfficeUsers');
  }
}
