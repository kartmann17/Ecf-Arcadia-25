<?php
namespace App\Controllers;

use App\Models\AvisModel;

class AvisController extends MainController
{
    public function afficheAvis()
    {
        $AvisModel = new AvisModel();
        $Avis = $AvisModel->findAll(); // Récupérer tous les avis 
        $this->render("acceuil/index", ['Avis' => $Avis]); // Passer les avis à la vue
    }

    // Méthode pour soumettre un avis
    public function ajoutAvis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $etoiles = $_POST['etoiles'] ?? '';
            $nom = $_POST['nom'] ?? '';
            $commentaire = $_POST['commentaire'] ?? '';

            if (!empty($etoiles) && !empty($nom) && !empty($commentaire)) {
                $AvisModel = new AvisModel();
                $result = $AvisModel->saveAvis($etoiles, $nom, $commentaire);

            }
            header("Location: /");
            exit;
        }
    }
}