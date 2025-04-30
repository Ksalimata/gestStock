<?php
namespace App\Controllers;

class Mouvement extends BaseController
{
    public function index(): string
    {
        return view('mouvement');
    }

    public function add_mouvement(): string
    {
        return view('add_mouvement');
    }

    public function create_mouvement()
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
        $model = new \App\Models\MouvementModel();
        $model->save([
            'produit' => $produit,
            'prix' => $prix,
            'quantite' => $quantite,
            'categorie' => $categorie,
        ]);

        return redirect()->to('/mouvement')->with('success', 'Mouvement ajouté avec succès.');
    }
    public function delete_mouvement($id)
    {
        $model = new \App\Models\MouvementModel();
        $model->delete($id);

        return redirect()->to('/mouvement')->with('success', 'Mouvement supprimé avec succès.');
    }

    public function edit_mouvement($id)
    {
        $model = new \App\Models\MouvementModel();
        $mouvement = $model->find($id);

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

            return redirect()->to('/mouvement')->with('success', 'Mouvement modifié avec succès.');
        }

        return view('edit_mouvement', ['mouvement' => $mouvement]);
    }
    public function get_mouvement()
    {
        $model = new \App\Models\MouvementModel();
        $mouvements = $model->findAll();

        return view('mouvement', ['mouvements' => $mouvements]);
    }
    public function get_all_mouvements()
    {
        $model = new \App\Models\MouvementModel();
        $mouvements = $model->findAll();

        return view('mouvement', ['mouvements' => $mouvements]);
    }
    
    public function get_mouvement_by_id($id)
    {
        $model = new \App\Models\MouvementModel();
        $mouvement = $model->find($id);

        return view('mouvement', ['mouvement' => $mouvement]);
    }
}