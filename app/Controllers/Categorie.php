<?php
namespace App\Controllers;

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
        $categorie = $this->request->getPost('nom_categorie');

        // Validation
        if (empty($categorie)) {
            return redirect()->back()->with('error', 'Le nom de la catégorie est obligatoire.');
        }

        // Vérification si la catégorie existe déjà
        $model = new \App\Models\CategorieModel();
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
        $model = new \App\Models\CategorieModel();
        $model->delete($id);

        return redirect()->to('/categorie')->with('success', 'Catégorie supprimée avec succès.');
    }

    public function edit_categorie($id)
    {
        $model = new \App\Models\CategorieModel();
        $categorie = $model->find($id);

        if ($this->request->getMethod() === 'post') {
            $categorie = $this->request->getPost('categorie');

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

    public function get_categorie($id)
    {
        $model = new \App\Models\CategorieModel();
        $categorie = $model->find($id);

        return view('edit_categorie', ['categorie' => $categorie]);
    }

    public function get_all_categories()
    {
        $model = new \App\Models\CategorieModel();
        $categories = $model->findAll();

        return view('categorie', ['categories' => $categories]);
    }
}