<?php

class Animal
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    //Obtenir tout animaux
    public function getAnimals()
    {
        $this->db->query('SELECT *
                            FROM animals
                            ORDER BY dateAjout DESC');
        $result = $this->db->resultSet();

        return $result;
    }

    //Obtenir les 10 animaux les plus récemment ajoutés
    public function getLast10Animals()
    {
        $this->db->query('SELECT *
                            FROM animals
                            ORDER BY dateAjout DESC
                            LIMIT 10');
        $result = $this->db->resultSet();

        return $result;
    }

    //Obtenir un animal grâce à son id
    public function getAnimalById($id)
    {
        $this->db->query('SELECT * FROM animals WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    //Ajouter un animal
    public function addAnimal($data)
    {
        $this->db->query('INSERT INTO animals(nom, description, age) VALUES (:nom, :description, :age)');
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':age', $data['age']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Obtenir toutes les reservations, ce qui les affiches dans le backOffice/Animaux
    public function getAnimalReservation()
    {
        $this->db->query('SELECT *
                            FROM demandeClient
                            ORDER BY dateAjout DESC');
        $result = $this->db->resultSet();

        return $result;
    }

    //Mettre un jour un animal
    public function updateAnimal($data)
    {
        $this->db->query('UPDATE animals SET nom = :nom, description = :description, age = :age WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':age', $data['age']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Supprimer un animal
    public function deleteAnimal($id)
    {
        $this->db->query('DELETE FROM animals WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Créer une reservation pour un animal, ce qui envoie un message à l'admin dans le backOffice/Animaux
    public function addReservation($data)
    {
        $this->db->query('INSERT INTO demandeClient(id_animal, contact, text) VALUES (:id_animal, :contact, :text)');
        $this->db->bind(':id_animal', $data['id_animal']);
        $this->db->bind(':contact', $_SESSION['email']);
        $this->db->bind(':text', $data['text']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
