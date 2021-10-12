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

  public function index()
  {
    if (isLoggedIn()) {
      redirect('animals');
    }
    $data = [
      'title' => 'SharePosts',
      'description' => 'Simple social network built on the Emmizy MVC framework',
      'info' => 'You can contact me with the following details below if you like my program and willing to offer me a contract and work on your project',
      'name' => 'Omonzebaguan Emmanuel',
      'location' => 'Nigeria, Edo State',
      'contact' => '+2348147534847',
      'mail' => 'emmizy2015@gmail.com'
    ];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About Us',
      'description' => 'App to share posts with other users'
    ];

    $this->view('pages/about', $data);
  }

  public function contact()
  {
    $data = [
      'title' => 'Contact Us',
      'description' => 'You can contact us through this medium',
      'info' => 'You can contact me with the following details below if you like my program and willing to offer me a contract and work on your project',
      'name' => 'Omonzebaguan Emmanuel',
      'location' => 'Nigeria, Edo State',
      'contact' => '+2348147534847',
      'mail' => 'emmizy2015@gmail.com'
    ];

    $this->view('pages/contact', $data);
  }

  public function backOfficeAnimaux()
  {

    $demandeClient = $this->animalModel->getAnimalReservation();
    $data = [
      'demandeClient' => $demandeClient
    ];
    $this->view('pages/backOfficeAnimaux', $data);
  }

  public function backOfficeUsers()
  {

    $users = $this->userModel->getUsers();
    $data = [
      'users' => $users
    ];
    $this->view('pages/backOfficeUsers', $data);
  }

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
    //redirect('pages/backOfficeUsers');
  }
}
