<?php

namespace App\Models;

class UniversModel extends Model
{
    protected $id;
    protected $nom;
    protected $img;
    protected $description;

    public function __construct()
    {
        $this->table = "Habitat";
    }

    //Ajout d'univers
    public function addUnivers($nom, $img, $description)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (nom, img, description)
            VALUES (:nom, :img, :description)",
            [
                'nom' => $nom,
                'img' => $img,
                'description' => $description,
            ]
        );
    }

    //obtentention univers par id
    public function getUniversById($id)
    {
        return $this->req("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch();
    }

    public function getDetails($id)
{
    $sql = "SELECT r.race, v.*, a.nom as nom_animal, a.age, a.img as img_animal, u.nom as nom_Habitat, u.img as img_Habitat
            FROM {$this->table} u
            LEFT JOIN Animal a ON u.id = a.id_habitat
            LEFT JOIN Veterinaire v ON a.id = v.id_animal
            LEFT JOIN Race r ON r.id = a.id_race
            WHERE u.id = ?";
    return $this->req($sql, [$id])->fetchAll();
}

    //suppresions de l'univers par l'id
    public function deleteById($id)
    {
        return $this->delete($id);
    }


    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    //mise a jour univers
    public function updateUnivers($id)
    {
        return $this->update($id);
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
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}