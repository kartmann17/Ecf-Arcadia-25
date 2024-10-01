<?php

namespace App\Models;

class AnimauxModel extends Model
{
    protected $id;
    protected $nom;
    protected $age;
    protected $img;
    protected $visite;
    protected $id_race;
    protected $id_habitat;

    
    public function __construct() 
    {
        $this->table = "Animal";
    }

    //Ajout d'animaux en base 
    public function addAnimaux($nom, $age, $img, $id_habitat)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (nom, age, img, id_habitat) 
             VALUES (:nom, :age, :img, :id_habitat)", 
            [
                'nom' => $nom,
                'age' => $age,
                'img' => $img,
                'id_habitat' => $id_habitat
            ]
        );  
    }

    //mise a jour animaux 
    public function updateAnimaux($id)
    {
        return $this->update($id);
    }

    //obtentention animaux par id
    public function getAnimauxByUnivers($id_habitat)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id_habitat = ?";
        return $this->req($sql, [$id_habitat])->fetchAll();
    }

    

    //supression des animaux
    public function deleteById($id)
    {
        return $this->delete($id);
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Set the value of visite
     *
     * @return  self
     */ 
    public function setVisite($visite)
    {
        $this->visite = $visite;

        return $this;
    }

    /**
     * Get the value of id_race
     */ 
    public function getId_race()
    {
        return $this->id_race;
    }

    /**
     * Set the value of id_race
     *
     * @return  self
     */ 
    public function setId_race($id_race)
    {
        $this->id_race = $id_race;

        return $this;
    }

    /**
     * Get the value of id_habitat
     */ 
    public function getId_habitat()
    {
        return $this->id_habitat;
    }

    /**
     * Set the value of id_habitat
     *
     * @return  self
     */ 
    public function setId_habitat($id_habitat)
    {
        $this->id_habitat = $id_habitat;

        return $this;
    }
}

