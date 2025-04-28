<?php
namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        return view('users');
    }

    public function add_user()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');

        // Validation
        if (empty($username) || empty($password) || empty($email)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
        }

        // Enregistrement dans la base de données
        $model = new \App\Models\UsersModel();
        $model->save([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'email' => $email,
        ]);

        return redirect()->to('/users')->with('success', 'Utilisateur ajouté avec succès.');
    }
    public function delete_user($id)
    {
        $model = new \App\Models\UsersModel();
        $model->delete($id);

        return redirect()->to('/users')->with('success', 'Utilisateur supprimé avec succès.');
    }
    public function edit_user($id)
    {
        $model = new \App\Models\UsersModel();
        $user = $model->find($id);

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $email = $this->request->getPost('email');

            // Validation
            if (empty($username) || empty($password) || empty($email)) {
                return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
            }

            // Enregistrement dans la base de données
            $model->update($id, [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'email' => $email,
            ]);

            return redirect()->to('/users')->with('success', 'Utilisateur mis à jour avec succès.');
        }

        return view('edit_user', ['user' => $user]);
    }

    public function view_user($id)
    {
        $model = new \App\Models\UsersModel();
        $user = $model->find($id);

        return view('view_user', ['user' => $user]);
    }
    public function list_users()
    {
        $model = new \App\Models\UsersModel();
        $users = $model->findAll();

        return view('list_users', ['users' => $users]);
    }
}