<?php
namespace App\Controllers;

use App\Models\ProduitsModel;
use App\Models\CategorieModel;

class Categorie extends BaseController
{
    public function index(): string
    {
        
        return $this->get_all_categories();
    }

    public function add_categorie(): string
    {
        
        return view('add_categorie');
    }

    public function create_categorie()
    {
        $this->checkSession(); // Vérification de la session
        $categorie = $this->request->getPost('nom_categorie');

        // Validation
        if (empty($categorie)) {
            return redirect()->back()->with('error', 'Le nom de la catégorie est obligatoire.');
        }

        // Vérification si la catégorie existe déjà
        $model = new CategorieModel();
        $existingCategorie = $model->where('nom_categorie', $categorie)->first();

        if ($existingCategorie) {
            return redirect()->back()->with('error', 'Cette catégorie existe déjà.');
        }

        // Enregistrement dans la base de données
        $data = [
            'nom_categorie' => $categorie,
        ];

        if ($model->save($data)) {
            return redirect()->to('/add_categorie')->with('success', 'Catégorie ajoutée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement de la catégorie.');
        }
    }
    
    public function delete_categorie($id)
    {
        $this->checkSession(); // Vérification de la session
        $model = new CategorieModel();
        $model->delete($id);

        return redirect()->to('/categorie')->with('success', 'Catégorie supprimée avec succès.');
    }

    public function edit_categorie($id): string
    {
        $this->checkSession(); // Vérification de la session
        $model = new CategorieModel();

        // Récupérer la catégorie à modifier
        $categorie = $model->find($id);
    
        if (!$categorie) {
            return redirect()->to('/categorie')->with('error', 'Catégorie introuvable.');
        }
    
        // Passer les données de la catégorie à la vue
        return view('edit_categorie', ['categorie' => $categorie]);
    }

    public function update_categorie($id)
    {
        
        $model = new CategorieModel();
        $categorie = $model->find($id);

        if (!$categorie) {
            return redirect()->to('/categorie')->with('error', 'Catégorie introuvable.');
        }

        if ($this->request->getMethod() === 'POST') {
            $categorie = $this->request->getPost('nom_categorie');

            // Validation
            if (empty($categorie)) {
                return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
            }

            // Enregistrement dans la base de données
            $model->update($id, [
                'nom_categorie' => $categorie,
            ]);

            return redirect()->to('/categorie')->with('success', 'Catégorie modifiée avec succès.');
        }

        return view('edit_categorie', ['categorie' => $categorie]);
    }


    public function get_all_categories()
    {
        
        $model = new CategorieModel();
        $categories = $model->findAll();

        return view('categorie', ['categories' => $categories]);
    }
}