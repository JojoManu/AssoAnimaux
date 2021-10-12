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

        $animals = $this->animalModel->getLast10Animals();
        $data = [
            'animals' => $animals
        ];

        $this->view('animals/index', $data);
    }

    public function allAnimals()
    {

        $animals = $this->animalModel->getAnimals();
        $data = [
            'animals' => $animals
        ];

        $this->view('animals/allAnimals', $data);
    }

    //Ajouter un animal
    public function add()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nom' => trim($_POST['nom']),
                'description' => trim($_POST['description']),
                'age' => trim($_POST['age']),
                'nom_err' => '',
                'description_err' => '',
                'age_err' => '',
            ];

            if (empty($data['nom'])) {
                $data['nom_err'] = 'Please enter animal nom';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter a description';
            }
            if (empty($data['age'])) {
                $data['age_err'] = 'Please enter animal age';
            }

            //validate error free
            if (empty($data['nom_err']) && empty($data['description_err'])) {
                if ($this->animalModel->addAnimal($data)) {
                    flash('animal_message', 'Your animal have been added');
                    redirect('animals');
                } else {
                    die('something went wrong');
                }

                //laod view with error
            } else {
                $this->view('animals/add', $data);
            }
        } else {
            $data = [
                'nom' => (isset($_POST['nom']) ? trim($_POST['nom']) : ''),
                'description' => (isset($_POST['description']) ? trim($_POST['description']) : ''),
                'age' => (isset($_POST['age']) ? trim($_POST['age']) : '')
            ];

            $this->view('animals/add', $data);
        }
    }

    //Obtenir un animal grâce à son id et montrer ses informations
    public function show($id)
    {
        $animal = $this->animalModel->getAnimalById($id);

        $data = [
            'animal' => $animal,
        ];

        $this->view('animals/show', $data);
    }

    //Mise à jour d'un animal
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'nom' => trim($_POST['nom']),
                'description' => trim($_POST['description']),
                'age' => trim($_POST['age']),
                'title_err' => '',
                'description_err' => '',
                'age_err' => '',
            ];
            //validate the nom
            if (empty($data['nom'])) {
                $data['nom_err'] = 'Please enter animal nom';
            }
            //validate the description
            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter the animals description';
            }

            //validate error free
            if (empty($data['title_err']) && empty($data['description_err'])) {
                if ($this->animalModel->updateAnimal($data)) {
                    flash('animals_message', 'Your animals have been updated');
                    redirect('animals');
                } else {
                    die('something went wrong');
                }

                //laod view with error
            } else {
                $this->view('animals/edit', $data);
            }
        } else {
            $animal = $this->animalModel->getAnimalById($id);
            $data = [
                'id' => $id,
                'nom' => $animal->nom,
                'description' => $animal->description,
                'age' => $animal->age
            ];

            $this->view('animals/edit', $data);
        }
    }

    //supprimer un animal
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check for role
            $animal = $this->postModel->getAnimalById($id);
            if ($_SESSION['role'] !== "1") {
                redirect('animals');
            }
            if ($this->postModel->deletePost($id)) {
                flash('animal_message', 'Animal Removed');
                redirect('animals');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('animals');
        }
    }

    //Créations d'une demande ou autre requete que l'admin peut voir dans le backOffice
    public function addReservation($id)
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_animal' => $id,
                'text' => trim($_POST['text']),
            ];
            //validate error free
            if ($this->animalModel->addReservation($data)) {
                flash('animal_message', 'Your animal have been added');
                redirect('animals');
            } else {
                die('something went wrong');
            }
        } else {
            $data = [
                'id' => $id,
            ];
            $this->view('animals/contact', $data);
        }
    }
}
