<?php
/**
 * Contrôleur Administrateur (A1..A7).
 * Gère les utilisateurs, véhicules et villes.
 */
class AdminController extends Controller
{
    /** Toutes les actions admin exigent le rôle administrateur. */
    private function garde(): array
    {
        return $this->exigerRole(['administrateur']);
    }

    /** A1 : liste de tous les utilisateurs. */
    public function listeUtilisateurs(): void
    {
        $this->garde();
        $utilisateurs = (new Utilisateur())->tous();
        $this->render('admin/utilisateurs', [
            'utilisateurs' => $utilisateurs,
            'flash'        => $this->flash(),
        ], 'Liste des utilisateurs');
    }

    /** A2 : formulaire de création d'un conducteur. */
    public function formConducteur(): void
    {
        $this->garde();
        $this->render('admin/form_utilisateur', [
            'role'   => 'conducteur',
            'action' => 'admin_ajout_conducteur',
            'titre'  => "Formulaire de création d'un nouveau conducteur",
        ], 'Ajout conducteur');
    }

    /** A2 : traitement de l'ajout d'un conducteur. */
    public function ajouterConducteur(): void
    {
        $this->garde();
        $this->traiterAjoutUtilisateur('conducteur', 'admin_form_conducteur');
    }

    /** A3 : formulaire de création d'un passager. */
    public function formPassager(): void
    {
        $this->garde();
        $this->render('admin/form_utilisateur', [
            'role'   => 'passager',
            'action' => 'admin_ajout_passager',
            'titre'  => "Formulaire de création d'un nouveau passager",
        ], 'Ajout passager');
    }

    /** A3 : traitement de l'ajout d'un passager. */
    public function ajouterPassager(): void
    {
        $this->garde();
        $this->traiterAjoutUtilisateur('passager', 'admin_form_passager');
    }

    /** Logique commune A2/A3 : valide et insère un utilisateur. */
    private function traiterAjoutUtilisateur(string $role, string $retour): void
    {
        $nom    = trim($_POST['nom'] ?? '');
        $prenom = trim($_POST['prenom'] ?? '');
        $solde  = $_POST['solde'] ?? '';

        if ($nom === '' || $prenom === '' || !is_numeric($solde)) {
            $this->render('admin/resultat', [
                'succes'  => false,
                'message' => 'Échec : nom, prénom et solde initial (numérique) sont obligatoires.',
                'retour'  => $retour,
            ], 'Résultat');
            return;
        }

        $id = (new Utilisateur())->ajouter($nom, $prenom, $role, (float) $solde);
        $this->render('admin/resultat', [
            'succes'  => true,
            'message' => "Le $role « $prenom $nom » a été créé avec succès (id #$id, login généré automatiquement, mot de passe : secret).",
            'retour'  => 'admin_utilisateurs',
        ], 'Résultat');
    }

    /** A4 : liste des véhicules (propriétaire reconstruit, pas de clés primaires). */
    public function listeVehicules(): void
    {
        $this->garde();
        $vehicules = (new Vehicule())->tousAvecProprietaire();
        $this->render('admin/vehicules', [
            'vehicules' => $vehicules,
        ], 'Liste des véhicules');
    }

    /** A5 : formulaire de création d'un véhicule. */
    public function formVehicule(): void
    {
        $this->garde();
        // Le propriétaire est choisi parmi les conducteurs.
        $conducteurs = (new Utilisateur())->parRole('conducteur');
        $this->render('admin/form_vehicule', [
            'conducteurs' => $conducteurs,
        ], 'Ajout véhicule');
    }

    /** A5 : traitement de l'ajout d'un véhicule. */
    public function ajouterVehicule(): void
    {
        $this->garde();
        $marque          = trim($_POST['marque'] ?? '');
        $modele          = trim($_POST['modele'] ?? '');
        $annee           = $_POST['annee'] ?? '';
        $immatriculation = trim($_POST['immatriculation'] ?? '');
        $proprietaireId  = $_POST['proprietaire_id'] ?? '';

        if ($marque === '' || $modele === '' || !ctype_digit((string) $annee)
            || $immatriculation === '' || !ctype_digit((string) $proprietaireId)) {
            $this->render('admin/resultat', [
                'succes'  => false,
                'message' => 'Échec : tous les champs sont obligatoires (année et propriétaire valides).',
                'retour'  => 'admin_form_vehicule',
            ], 'Résultat');
            return;
        }

        $id = (new Vehicule())->ajouter($marque, $modele, (int) $annee, $immatriculation, (int) $proprietaireId);
        $this->render('admin/resultat', [
            'succes'  => true,
            'message' => "Le véhicule « $marque $modele » ($immatriculation) a été ajouté avec succès (id #$id).",
            'retour'  => 'admin_vehicules',
        ], 'Résultat');
    }

    /** A6 : liste des villes. */
    public function listeVilles(): void
    {
        $this->garde();
        $villes = (new Ville())->toutes();
        $this->render('admin/villes', [
            'villes' => $villes,
            'flash'  => $this->flash(),
        ], 'Liste des villes');
    }

    /** A7 : formulaire d'ajout d'une ville. */
    public function formVille(): void
    {
        $this->garde();
        $this->render('admin/form_ville', [], 'Ajout ville');
    }

    /** A7 : traitement de l'ajout d'une ville. */
    public function ajouterVille(): void
    {
        $this->garde();
        $nom = trim($_POST['nom'] ?? '');

        if ($nom === '') {
            $this->render('admin/resultat', [
                'succes'  => false,
                'message' => 'Échec : le nom de la ville est obligatoire.',
                'retour'  => 'admin_form_ville',
            ], 'Résultat');
            return;
        }

        $id = (new Ville())->ajouter($nom);
        if ($id === 0) {
            $this->render('admin/resultat', [
                'succes'  => false,
                'message' => "Échec : la ville « $nom » existe déjà.",
                'retour'  => 'admin_form_ville',
            ], 'Résultat');
            return;
        }

        $this->render('admin/resultat', [
            'succes'  => true,
            'message' => "La ville « $nom » a été ajoutée avec succès (id #$id).",
            'retour'  => 'admin_villes',
        ], 'Résultat');
    }
}
