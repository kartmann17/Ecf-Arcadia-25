<?php
namespace App\Models;

class UserModel extends Model
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $mot_de_passe;
    protected $id_role;

    public function __construct()
    {
    $this->table = "User";
    }

    public function selectionRole($role)
    {
        return $this->req("SELECT id FROM Role WHERE role = :role", ['role' => $role])->fetch();
    }
   
    public function getRoles()
    {
        return $this->req('SELECT * FROM Role')->fetchAll(); 
    }

    public function selectAllRole()
    {
        $sql = "
        SELECT 
            u.id, 
            u.nom, 
            u.prenom, 
            u.email, 
            u.mot_de_passe, 
            r.role AS role
        FROM 
            {$this->table} u 
         JOIN 
            Role r ON u.id_role = r.id";
        return $this->req($sql)->fetchAll();
    }

    public function createUser($nom, $prenom, $email, $mot_de_passe, $id_role)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (nom, prenom, email, mot_de_passe, id_role)
            VALUES (:nom, :prenom, :email, mot_de_passe, :id_role)",
            [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'mot_de_passe' => $mot_de_passe,
                'id_role'=> $id_role
            ]
            );
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
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mot_de_passe
     */ 
    public function getMot_de_passe()
    {
        return $this->mot_de_passe;
    }

    /**
     * Set the value of mot_de_passe
     *
     * @return  self
     */ 
    public function setMot_de_passe($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    /**
     * Get the value of id_role
     */ 
    public function getId_role():array
    {
        return $this->id_role;
        
    }

    /**
     * Set the value of id_role
     *
     * @return  self
     */ 
    public function setId_role($id_role)
    {
        $this->id_role = $id_role;

        return $this;
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
}