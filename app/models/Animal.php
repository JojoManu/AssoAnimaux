<?php

class Animal
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAnimals()
    {
        $this->db->query('SELECT *
                            FROM animals
                            ORDER BY dateAjout DESC');
        $result = $this->db->resultSet();

        return $result;
    }

    // public function addAnimal($data){
    //     $this->db->query('INSERT INTO posts(user_id, title, body) VALUES (:user_id, :title, :body)');
    //     $this->db->bind(':user_id', $data['user_id']);
    //     $this->db->bind(':title', $data['title']);
    //     $this->db->bind(':body', $data['body']);

    //     //execute 
    //     if($this->db->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // public function getAnimalById($id){
    //     $this->db->query('SELECT * FROM posts WHERE id = :id');
    //     $this->db->bind(':id', $id);
    //     $row = $this->db->single();

    //     return $row;
    // }

    // public function updateAnimal($data){
    //     $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
    //     $this->db->bind(':id', $data['id']);
    //     $this->db->bind(':title', $data['title']);
    //     $this->db->bind(':body', $data['body']);

    //     //execute 
    //     if($this->db->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // //delete a post
    // public function deleteAnimal($id){
    //     $this->db->query('DELETE FROM posts WHERE id = :id');
    //     $this->db->bind(':id', $id);

    //     if($this->db->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}
