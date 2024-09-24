<?php
namespace App\Controllers;

use App\Models\ContactsModel;

class ContactsController extends Controller
{
    public function index()
    {
        $this->render('contacts/index');
    }
    public function afficheMessage()
    {
        $ContactsModel = new ContactsModel();
        $Contacts = $ContactsModel->findAll();  //récupération de tous les messages pour les envoyé sur le dashboard
        $this->render("contacts/index", ['Contacts'=>$Contacts]);
    }

    //soumission du message 
    public function ajoutMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            if (!empty($nom) && !empty($email) && !empty($message)) {
                $ContactsModel = new ContactsModel();
                $result = $ContactsModel->saveMessage($nom, $email, $message);

            }
            header("Location: /contacts");
            exit;
        }
    }
}