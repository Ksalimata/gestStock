<?php
namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\FournisseurModel;

class Users extends BaseController
{
    public function index(): string
    {
        $model = new UsersModel();

        // Récupérer tous les utilisateurs
        $users = $model->findAll();

        // Passer les utilisateurs à la vue
        return view('users', ['users' => $users]);
    }

    public function add_user(): string
    {
        return view('add_users');
    }

    public function create_user()
    {
        
            $nom = $this->request->getPost('nom');
            $prenom = $this->request->getPost('prenom');
            $email = $this->request->getPost('email');
            $telephone = $this->request->getPost('telephone');
            $role = $this->request->getPost('role');
            $password = $this->request->getPost('password');

            // Validation
            if (empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($role) || empty($password)) {
                return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
            }

            // Enregistrement dans la base de données
            $model = new UsersModel();
            $model->save([
                'nom' => $nom,
                'prenoms' => $prenom,
                'email' => $email,
                'telephone' => $telephone,
                'role' => $role,
                'password' => password_hash($password, PASSWORD_BCRYPT), // Utilisation de password_hash
            ]);

            return redirect()->to('/users')->with('success', 'Utilisateur "' . $nom . '" ajouté avec succès.');

    }

    public function delete_user($id)
    {
       
        $model = new UsersModel();

        // Vérifier si l'utilisateur existe
        $user = $model->find($id);
        if (!$user) {
            log_message('error', 'Tentative de suppression d\'un utilisateur inexistant : ID ' . $id);
            return redirect()->to('/users')->with('error', 'Utilisateur introuvable.');
        }

        // Supprimer l'utilisateur
        $model->delete($id);

        return redirect()->to('/users')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function edit_user($id): string
    {
        
        $model = new UsersModel();
        $user = $model->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'Utilisateur introuvable.');
        }

        // Passer les données de l'utilisateur à la vue
        return view('edit_user', ['user' => $user]);
    }

    public function update_user($id)
    {
        
        $model = new UsersModel();
        $user = $model->find($id);
    
        if (!$user) {
            return redirect()->to('/users')->with('error', 'Utilisateur introuvable.');
        }
    
        if ($this->request->getMethod() === 'POST') {
            $nom = $this->request->getPost('nom');
            $prenom = $this->request->getPost('prenom');
            $email = $this->request->getPost('email');
            $telephone = $this->request->getPost('telephone');
            $role = $this->request->getPost('role');
            $password = $this->request->getPost('password');

            // Validation
            if (empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($role)) {
                return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
            }
    
            // Préparer les données pour la mise à jour
            $data = [
                'nom' => $nom,
                'prenoms' => $prenom,
                'email' => $email,
                'telephone' => $telephone,
                'role' => $role,
            ];
    
            // Si un nouveau mot de passe est fourni, le hacher
            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_BCRYPT); // Utilisation de password_hash
            }
    
            // Mise à jour dans la base de données
            $model->update($id, $data);
    
            return redirect()->to('/users')->with('success', 'Utilisateur mis à jour avec succès.');
        }
    
        return view('edit_user', ['user' => $user]);
    
    }

    public function view_user($id)
    {

        $model = new UsersModel();
        $user = $model->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'Utilisateur introuvable.');
        }
    }

    public function listeFournisseur(): string
    {
        $model = new FournisseurModel();

        // Récupérer tous les fournisseurs
        $fournisseurs = $model->findAll();

        // Passer les fournisseurs à la vue
        return view('fournisseur', ['fournisseurs' => $fournisseurs]);
    }

    public function add_fournisseur(): string
    {
        return view('add_fournisseur');
    }
    public function create_fournisseur()
    {
        $nomFournisseur = $this->request->getPost('nomFournisseur');
        $contact = $this->request->getPost('contact');
        $adresse = $this->request->getPost('adresse');

        // Validation
        if (empty($nomFournisseur) || empty($contact) || empty($adresse)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
        }

        // Enregistrement dans la base de données
        $model = new FournisseurModel();
        $model->save([
            'nom' => $nomFournisseur,
            'contact' => $contact,
            'adresse' => $adresse,
        ]);

        return redirect()->to('/fournisseur')->with('success', 'Fournisseur "' . $nomFournisseur . '" ajouté avec succès.');
    }
    public function edit_fournisseur($id): string
    {
        $model = new FournisseurModel();
        $fournisseur = $model->find($id);

        if (!$fournisseur) {
            return redirect()->to('/fournisseur')->with('error', 'Fournisseur introuvable.');
        }

        // Passer les données du fournisseur à la vue
        return view('edit_fournisseur', ['fournisseur' => $fournisseur]);
    }
    public function update_fournisseur($id)
    {
        $model = new FournisseurModel();
        $fournisseur = $model->find($id);    
        if (!$fournisseur) {
            return redirect()->to('/fournisseur')->with('error', 'Fournisseur introuvable.');
        }
        if ($this->request->getMethod() === 'POST') {
            $nomFournisseur = $this->request->getPost('nomFournisseur');
            $contact = $this->request->getPost('contact');
            $adresse = $this->request->getPost('adresse');

            // Validation
            if (empty($nomFournisseur) || empty($contact) || empty($adresse)) {
                return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
            }

            // Préparer les données pour la mise à jour
            $data = [
                'nom' => $nomFournisseur,
                'contact' => $contact,
                'adresse' => $adresse,
            ];

            // Mise à jour dans la base de données
            $model->update($id, $data);

            return redirect()->to('/fournisseur')->with('success', 'Fournisseur mis à jour avec succès.');
        }
        return view('edit_fournisseur', ['fournisseur' => $fournisseur]);
    }
    public function delete_fournisseur($id)
    {
        $model = new FournisseurModel();
        // Vérifier si le fournisseur existe
        $fournisseur = $model->find($id);
        if (!$fournisseur) {
            log_message('error', 'Tentative de suppression d\'un fournisseur inexistant : ID ' . $id);
            return redirect()->to('/fournisseur')->with('error', 'Fournisseur introuvable.');
        }   
        // Supprimer le fournisseur
        $model->delete($id); 
        return redirect()->to('/fournisseur')->with('success', 'Fournisseur supprimé avec succès.');

    }
}