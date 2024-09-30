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
        $contacts = $ContactsModel->findAll();  
        $this->render("contacts/index", ['contacts'=>$contacts]);
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