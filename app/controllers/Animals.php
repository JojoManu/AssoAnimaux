<?php
class Animals extends Controller
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

        $animals = $this->animalModel->getAnimals();
        $data = [
            'animals' => $animals
        ];

        $this->view('animals/index', $data);
    }
}
