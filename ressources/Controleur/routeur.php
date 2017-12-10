<?php

require_once PATH_VUE . "VueErreurMouvement.php";
require_once PATH_VUE . "VueErreurAuthentification.php";
require_once PATH_MODELE . 'ModelePartie.php';
require_once PATH_MODELE . 'ModeleBase.php';
require_once PATH_CONTROLEUR . 'ControleurPartie.php';
require_once PATH_CONTROLEUR . 'ControleurAuthentification.php';

class Routeur
{
    private $controleur_authentification;
    private $controleur_partie;
    private $vue_selection_blanc_premier;
    private $vue_erreur_authentification;

    public function __construct()
    {
        $this->controleur_authentification = new ControleurAuthentification();
        if (isset($_SESSION['partie'])) $this->controleur_partie = new ControleurPartie($_SESSION['partie']);
        else $this->controleur_partie = new ControleurPartie(new Partie());
    }

    public function routerRequete()
    {
        // Si la session a été authentifiée
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
            // Si une demande de réinitialisation de partie a été faite
            // on réinitialise le controleur et les variables de session de position et de réinitialisation
            if (isset($_POST['reinitialiser'])) {
                $this->controleur_partie->nouvellePartie();
                $_SESSION['depart_x'] = $_SESSION['depart_y'] = $_SESSION['arrivee_x'] = $_SESSION['arrivee_y'] = null;
                $this->controleur_partie->afficherVue();
            } // Sinon (jeu normal)
            else {
                // On vérifie que l'utilisateur n'a pas cliqué sur une case blanche en premier
                // Si oui, une vue d'erreur est affichée et on réinitialise les variables de session de position
                if (empty($_SESSION['depart_x']) && empty($_SESSION['depart_y']) && isset($_POST['arrivee_x']) && isset($_POST['arrivee_y'])) {
                    $_SESSION['depart_x'] = $_SESSION['depart_y'] = $_SESSION['arrivee_x'] = $_SESSION['arrivee_y'] = null;
                    $this->vue_selection_blanc_premier = new VueSelectionBlancPremier();
                    $this->vue_selection_blanc_premier->afficherVue();
                } // Sinon si seules les coordonées de départ sont définies
                elseif (isset($_POST['depart_x']) && isset($_POST['depart_y']) && empty($_SESSION['arrivee_x']) && empty($_SESSION['arrivee_y'])) {
                    $_SESSION['depart_x'] = $_POST['depart_x'];
                    $_SESSION['depart_y'] = $_POST['depart_y'];
                    $this->controleur_partie->afficherVue();
                } // Sinon si les coordonnées de départ et d'arrivée sont définies
                elseif (isset($_SESSION['depart_x']) && isset($_SESSION['depart_y']) && isset($_POST['arrivee_x']) && isset($_POST['arrivee_y'])) {
                    $_SESSION['arrivee_x'] = $_POST['arrivee_x'];
                    $_SESSION['arrivee_y'] = $_POST['arrivee_y'];
                    $this->controleur_partie->jouer();
                    $_SESSION['depart_x'] = $_SESSION['depart_y'] = $_SESSION['arrivee_x'] = $_SESSION['arrivee_y'] = null;
                    $this->controleur_partie->afficherVue();
                }
            }
        } // Si la session n'est pas authentifiée
        else {
            // On vérifie la connexion
            // Si les infos de connexion sont correctes on les attribue en variables de session et on affiche le jeu
            if (isset($_POST['login']) && isset($_POST['password'])) {
                if ($this->controleur_authentification->verifieConnexion($_POST['login'], $_POST['password'])) {
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['password'] = $_POST['password'];
                    $this->controleur_partie->afficherVue();
                } // Sinon un message d'erreur est affiché
                else {
                    $this->vue_erreur_authentification = new VueErreurAuthentification();
                    $this->vue_erreur_authentification->afficherVue();
                }
            } else
                $this->controleur_authentification->afficherVue();
        }
    }

}

?>
