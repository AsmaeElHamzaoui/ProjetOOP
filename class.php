<?php

// Classe Utilisateur (classe parente)
class Utilisateur {
    // Propriétés privées (ou protégées)
    protected $nom;
    protected $prenom;
    protected $type_utilisateur;

    // Constructeur
    public function __construct($nom, $prenom, $type_utilisateur) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->type_utilisateur = $type_utilisateur;
    }

    // **Accesseurs** (Getters)

    // Méthode pour obtenir le nom
    public function getNom() {
        return $this->nom;
    }

    // Méthode pour obtenir le prénom
    public function getPrenom() {
        return $this->prenom;
    }

    // Méthode pour obtenir le type d'utilisateur
    public function getTypeUtilisateur() {
        return $this->type_utilisateur;
    }

    // **Modificateurs** (Setters)

    // Méthode pour modifier le nom
    public function setNom($nouveauNom) {
        $this->nom = $nouveauNom;
    }

    // Méthode pour modifier le prénom
    public function setPrenom($nouveauPrenom) {
        $this->prenom = $nouveauPrenom;
    }

    // Méthode pour modifier le type d'utilisateur
    public function setTypeUtilisateur($nouveauType) {
        $this->type_utilisateur = $nouveauType;
    }

    // Méthode pour afficher le nom complet
    public function afficherNomComplet() {
        return $this->prenom . " " . $this->nom;
    }
}

// Classe Patient (hérite de Utilisateur)
class Patient extends Utilisateur {
    private $rendez_vous;

    public function __construct($nom, $prenom, $type_utilisateur, $rendez_vous = null) {
        parent::__construct($nom, $prenom, $type_utilisateur);
        $this->rendez_vous = $rendez_vous;
    }

    public function prendreRendezVous($date) {
        $this->rendez_vous = $date;
        echo "Rendez-vous pris pour le " . $this->rendez_vous . ".\n";
    }

    public function afficherRendezVous() {
        if ($this->rendez_vous) {
            echo "Le prochain rendez-vous est prévu pour le " . $this->rendez_vous . ".\n";
        } else {
            echo "Aucun rendez-vous prévu.\n";
        }
    }

    // Accesseur pour obtenir le rendez-vous
    public function getRendezVous() {
        return $this->rendez_vous;
    }

    // Modificateur pour changer le rendez-vous
    public function setRendezVous($nouveauRendezVous) {
        $this->rendez_vous = $nouveauRendezVous;
    }
}

// Classe Medecin (hérite de Utilisateur)
class Medecin extends Utilisateur {
    private $specialite;

    public function __construct($nom, $prenom, $type_utilisateur, $specialite) {
        parent::__construct($nom, $prenom, $type_utilisateur);
        $this->specialite = $specialite;
    }

    public function consulterPatient(Patient $patient) {
        echo "Consultation du patient " . $patient->afficherNomComplet() . " spécialisée en " . $this->specialite . ".\n";
    }

    // Accesseur pour obtenir la spécialité
    public function getSpecialite() {
        return $this->specialite;
    }

    // Modificateur pour changer la spécialité
    public function setSpecialite($nouvelleSpecialite) {
        $this->specialite = $nouvelleSpecialite;
    }
}



// Création d'un utilisateur de type patient
$patient = new Patient("xxx", "yyy", "patient", null);
echo $patient->afficherNomComplet() . "\n";  // Affiche "Pierre Dupont"

// Utilisation des accesseurs pour obtenir les valeurs
echo "Nom : " . $patient->getNom() . "\n";  // Affiche "Dupont"
echo "Prénom : " . $patient->getPrenom() . "\n";  // Affiche "Pierre"

// Changer le nom du patient avec le modificateur
$patient->setNom("xxx");
echo $patient->afficherNomComplet() . "\n";  // Affiche "Pierre Durand"

// Prendre un rendez-vous pour le patient
$patient->prendreRendezVous("2024-12-30");
$patient->afficherRendezVous();  // Affiche "Le prochain rendez-vous est prévu pour le 2024-12-30."

// Création d'un médecin
$medecin = new Medecin("qqq", "zzz", "medecin", "Cardiologue");
echo $medecin->afficherNomComplet() . "\n";  // Affiche "Sophie Martin"

// Utilisation des accesseurs
echo "Spécialité du médecin : " . $medecin->getSpecialite() . "\n";  // Affiche "Cardiologue"

// Le médecin consulte un patient
$medecin->consulterPatient($patient);  // Affiche "Consultation du patient Pierre Durand spécialisée en Cardiologue."

?>
