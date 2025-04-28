<?php
namespace App\Controllers;

class Produits extends BaseController
{
    public function index(): string
    {
        return view('produits');
    }

    public function add_produit()
    {
        $produit = $this->request->getPost('produit');
        $prix = $this->request->getPost('prix');
        $quantite = $this->request->getPost('quantite');
        $categorie = $this->request->getPost('categorie');

        // Validation
        if (empty($produit) || empty($prix) || empty($quantite) || empty($categorie)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
        }

        // Enregistrement dans la base de données
        $model = new \App\Models\ProduitsModel();
        $model->save([
            'produit' => $produit,
            'prix' => $prix,
            'quantite' => $quantite,
            'categorie' => $categorie,
        ]);

        return redirect()->to('/produit')->with('success', 'Produit ajouté avec succès.');
    }

    public function delete_produit($id)
    {
        $model = new \App\Models\ProduitsModel();
        $model->delete($id);

        return redirect()->to('/produit')->with('success', 'Produit supprimé avec succès.');
    }

    public function edit_produit($id)
    {
        $model = new \App\Models\ProduitsModel();
        $produit = $model->find($id);

        if ($this->request->getMethod() === 'post') {
            $produit = $this->request->getPost('produit');
            $prix = $this->request->getPost('prix');
            $quantite = $this->request->getPost('quantite');
            $categorie = $this->request->getPost('categorie');

            // Validation
            if (empty($produit) || empty($prix) || empty($quantite) || empty($categorie)) {
                return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
            }

            // Enregistrement dans la base de données
            $model->update($id, [
                'produit' => $produit,
                'prix' => $prix,
                'quantite' => $quantite,
                'categorie' => $categorie,
            ]);

            return redirect()->to('/produit')->with('success', 'Produit modifié avec succès.');
        }

        return view('edit_produit', ['produit' => $produit]);
    }

    public function get_produit($id)
    {
        $model = new \App\Models\ProduitsModel();
        $produit = $model->find($id);

        return view('produit', ['produit' => $produit]);
    }

    public function get_all_produits()
    {
        $model = new \App\Models\ProduitsModel();
        $produits = $model->findAll();

        return view('produits', ['produits' => $produits]);
    }
    
    public function get_produit_by_categorie($categorie)
    {
        $model = new \App\Models\ProduitsModel();
        $produits = $model->where('categorie', $categorie)->findAll();

        return view('produits', ['produits' => $produits]);
    }

}