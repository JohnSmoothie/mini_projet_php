<?php

require_once PATH_VUE . "VueJeu.php";
require_once PATH_VUE . "VueErreurMouvement.php";
require_once PATH_VUE . "VueFin.php";
require_once PATH_MODELE . "ModelePartie.php";

class ControleurPartie
{
    private $vue_jeu;
    private $vue_mouvement_invalide;
    private $vue_fin;
    private $partie;

    public function __construct(Partie $partie)
    {
        $this->vue_jeu = new VueJeu();
        $this->vue_mouvement_invalide = new VueMouvementInvalide();
        $this->vue_fin = new VueFin();
        $this->partie = $partie;
    }

    // Vérifie que la case aux coordonnées $x et $y est jouable (pas une case noire)
    public function caseJouable($x, $y)
    {
        return ($this->partie->getPion($x, $y) == 0);
    }

    // Vérifie qu'un pion est présent sur le plateau aux coordonnées $x et $y
    public function pionPresent($x, $y)
    {
        return ($this->partie->getPion($x, $y) == 1);
    }

    // Vérifie qu'un mouvement est valide
    public function mouvementValide($depart_x, $depart_y, $arrivee_x, $arrivee_y)
    {
        if (!$this->pionPresent($depart_x, $depart_y)) return false;
        if ($this->pionPresent($arrivee_x, $arrivee_y)) return false;
        if (!(($arrivee_x - $depart_x == 2 || $arrivee_x - $depart_x == -2) && $arrivee_y - $depart_y == 0) || (($arrivee_y - $depart_y == 2 || $arrivee_y - $depart_y == -2) && $arrivee_x - $depart_x == 0)) {
            if ($this->partie->getPion(($arrivee_x + $depart_x) / 2, ($arrivee_y + $depart_y) / 2) == 0) return false;
        }
        return true;
    }

    // Joue le coup en modifiant le plateau
    public function jouerCoup($depart_x, $depart_y, $arrivee_x, $arrivee_y)
    {
        if ($this->mouvementValide($depart_x, $depart_y, $arrivee_x, $arrivee_y)) {
            $this->supprimerPion($depart_x, $depart_y);
            $this->partie->setPion($arrivee_x, $arrivee_y, 1);
            $this->supprimerPion(($arrivee_x + $depart_x) / 2, ($arrivee_y + $depart_y) / 2);
            return true;
        } else {
            return false;
        }
    }

    // Supprime le pion aux coordonnées $x et $y du plateau
    public function supprimerPion($x, $y)
    {
        $this->partie->setPion($x, $y, 0);
        $this->partie->decrementerNbPion();
    }

    // Vérifie qu'il y a victoire (si le nombre de pion est égal à 1)
    public function verificationVictoire()
    {
        if ($this->partie->getNbPion() == 1) return true;
        else return false;
    }

    // Vérifie qu'il y a défaite
    public function verificationDefaite()
    {
        $res = true;
        for ($x = 0; $x <= 6; $x++) {
            for ($y = 0; $y <= 6; $y++) {
                if ($this->partie->getPion($x, $y) == 1) {
                    if ($x == 0) {
                        if ($this->partie->getPion($x, $y + 1) == 1) $res = false;
                        if ($this->partie->getPion($x, $y - 1) == 1) $res = false;
                        if ($this->partie->getPion($x + 1, $y) == 1) $res = false;
                    } elseif ($x == 6) {
                        if ($this->partie->getPion($x, $y + 1) == 1) $res = false;
                        if ($this->partie->getPion($x, $y - 1) == 1) $res = false;
                        if ($this->partie->getPion($x - 1, $y) == 1) $res = false;
                    } elseif ($y == 0) {
                        if ($this->partie->getPion($x, $y + 1) == 1) $res = false;
                        if ($this->partie->getPion($x + 1, $y) == 1) $res = false;
                        if ($this->partie->getPion($x - 1, $y) == 1) $res = false;
                    } elseif ($y == 6) {
                        if ($this->partie->getPion($x, $y - 1) == 1) $res = false;
                        if ($this->partie->getPion($x + 1, $y) == 1) $res = false;
                        if ($this->partie->getPion($x - 1, $y) == 1) $res = false;
                    } else {
                        if ($this->partie->getPion($x, $y + 1) == 1) $res = false;
                        if ($this->partie->getPion($x, $y - 1) == 1) $res = false;
                        if ($this->partie->getPion($x - 1, $y) == 1) $res = false;
                        if ($this->partie->getPion($x + 1, $y) == 1) $res = false;
                    }
                }
            }
        }
        return $res;
    }

    // Retourne 0 si la partie n'est pas finie, -1 si elle est perdue, 1 si elle est gagnée
    public function verificationFin()
    {
        if ($this->verificationVictoire()) return 1;
        else if ($this->verificationDefaite()) return -1;
        else return 0;
    }

    // Recrée une nouvelle partie et réinitialise les variables de session correspondant aux coordonnées des pions
    public function nouvellePartie()
    {
        $this->partie = new Partie();
        $_SESSION['partie'] = $this->partie;
        $_SESSION['depart_x'] = $_SESSION['depart_y'] = $_SESSION['arrivee_x'] = $_SESSION['arrivee_y'] = null;
    }

    // Lance la fonction jouerCoup et réinitialise les variables de session
    public function jouer()
    {
        $this->jouerCoup($_SESSION['depart_x'], $_SESSION['depart_y'], $_SESSION['arrivee_x'], $_SESSION['arrivee_y']);
        $_SESSION['depart_x'] = $_SESSION['depart_y'] = $_SESSION['arrivee_x'] = $_SESSION['arrivee_y'] = null;
    }

    // Affiche la vue du jeu
    public function afficherVue()
    {
        $this->vue_jeu->afficherVue($this->partie);
    }
}

?>
