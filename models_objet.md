explication de l'objet : exemple :

<?php
    Nous déclarons une classe Voiture qui représente une voiture. À l'intérieur de cette classe, nous définissons trois propriétés privées ($marque, $modele, $annee) qui stockent les informations relatives à la voiture. 

class Voiture {
    private $marque;
    private $modele;
    private $annee;

        <!-- Le constructeur __construct() est appelé lorsque nous créons un nouvel objet Voiture. Il prend en paramètre la marque, le modèle et l'année de la voiture, puis initialise les propriétés correspondantes. -->

    public function __construct($marque, $modele, $annee) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
    }

    <!-- La méthode afficherDetails() est définie pour afficher les détails de la voiture. Elle utilise les propriétés de l'objet pour obtenir les informations spécifiques à cette voiture et les affiche à l'écran. -->

    public function afficherDetails() {
        echo "Marque : " . $this->marque . "<br>";
        echo "Modèle : " . $this->modele . "<br>";
        echo "Année : " . $this->annee . "<br>";
    }
}
<!-- En dehors de la classe, nous créons un nouvel objet $voiture en utilisant le constructeur de la classe Voiture et en lui passant les valeurs spécifiques (marque, modèle, année). -->

// Création d'un objet voiture
$voiture = new Voiture("BMW", "M3", 2022);

Enfin, nous appelons la méthode afficherDetails() sur l'objet $voiture pour afficher les détails de la voiture.
    
// Appel de la méthode pour afficher les détails de la voiture
$voiture->afficherDetails();
