<?php
namespace App\Controllers;

use App\Models\UsersModel;

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
        $this->checkSession(); // Vérification de la session
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
        $this->checkSession(); // Vérification de la session
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
        $this->checkSession(); // Vérification de la session
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
        $this->checkSession(); // Vérification de la session
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
}