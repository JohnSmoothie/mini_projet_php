<?php

require_once PATH_VUE . "/VueAuthentification.php";

class ControleurAuthentification
{
    private $vue_authentification;
    private $modele;

    public function __construct()
    {
        $this->vue_authentification = new VueAuthentification();
        $this->modele = new ModeleBase();
    }

    public function afficherVue()
    {
        $this->vue_authentification->afficherVue();
    }

    // Vérifie que l'authentification est correcte
    // Retourne true si l'authentification est correcte et false sinon
    public function verifieConnexion($pseudo, $input)
    {
        try {
            if ($this->modele->exists($pseudo)) {
                $password = $this->modele->getPassword($pseudo);
                if (crypt($input, $password) == $password) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (TableAccesException $exception) {
            echo $exception->afficher();
        } catch (ConnexionException $exception) {
            echo $exception->afficher();
        }
    }
}

?>
