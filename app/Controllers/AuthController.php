<?php
namespace App\Controllers;

use App\Models\UsersModel;


class AuthController extends BaseController
{
    public function login()
    {
        return view('login');
    }


    public function loginPost()
    {
        $session = session();
        $model = new UsersModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('mot_de_passe');

        //var_dump($email, $password);
        if (!$email) {
            return 'Adresse e-mail manquante';
        }

        $user = $model->where('email', $email)->first();
        

        if ($user) {
            $hashSaisi = hash('sha256', APP_SALT . $password);

            if ($hashSaisi === $user['mot_de_passe']) {
                // Connexion OK
                $session->set([
                    'id' => $user['id'],
                    'nom' => $user['nom'],
                    'prenoms' => $user['prenoms'],
                    'email' => $user['email'],
                    'telephone' => $user['telephone'],
                    'role' => $user['role'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/dashboard');
            } else 
            {
                return redirect()->back()->with('error', 'Mot de passe incorrect.');
            }
        } else 
        {
            return redirect()->back()->with('error', 'Utilisateur introuvable.');
        }
    }

    public function inscription()
    {
        return view('inscription');
    }
    
    public function enregistrer()
    {
        $validation = \Config\Services::validation();

       

        $rules = [
            'nom' => 'required',
            'prenoms' => 'required',
            'email' => 'required|valid_email|is_unique[utilisateurs.email]',
            'telephone' => 'required',
            'mot_de_passe' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return view('inscription_form', ['validation' => $this->validator]);
        }

        $mot_de_passe= $this->request->getPost('mot_de_passe');

        $utilisateurModel = new UsersModel();

        $utilisateurModel->save([
            'nom' => $this->request->getPost('nom'),
            'prenoms' => $this->request->getPost('prenoms'),
            'email' => $this->request->getPost('email'),
            'telephone' => $this->request->getPost('telephone'),
            'mot_de_passe' => hash('sha256', APP_SALT . $mot_de_passe)
        ]);


        return redirect()->to('/login')->with('message', 'Inscription réussie. Vous pouvez vous connecter.');
    }





    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}





