<?php
namespace App\Controllers;

class Categorie extends BaseController
{
    public function index(): string
    {
        return view('categorie');
    }

    public function add_categorie()
    {
        $categorie = $this->request->getPost('categorie');

        // Validation
        if (empty($categorie)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
        }

        // Enregistrement dans la base de données
        $model = new \App\Models\CategorieModel();
        $model->save([
            'categorie' => $categorie,
        ]);

        return redirect()->to('/categorie')->with('success', 'Catégorie ajoutée avec succès.');
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
                'categorie' => $categorie,
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