<?php
namespace App\Controllers;

use App\Models\ProduitsModel;
use App\Models\CategorieModel;
use App\Models\EntreeStockModel;
use App\Models\SortieStockModel;

class Mouvement extends BaseController
{
    public function index(): string
    {
        $this->checkSession(); // Vérification de la session

        $produitsModel = new ProduitsModel();
        $entreeStockModel = new EntreeStockModel();
        $sortieStockModel = new SortieStockModel();

        // Récupérer les entrées de stock
        $entrees = $entreeStockModel
            ->select('entree_stock.quantite, entree_stock.date_entree as date, produit.nom_produit')
            ->join('produit', 'produit.id_produit = entree_stock.id_produit')
            ->findAll();

        // Récupérer les sorties de stock
        $sorties = $sortieStockModel
            ->select('sortie_stock.quantite, sortie_stock.date_sortie as date, produit.nom_produit')
            ->join('produit', 'produit.id_produit = sortie_stock.id_produit')
            ->findAll();

        // Fusionner les entrées et sorties
        $mouvements = [];
        foreach ($entrees as $entree) {
            $mouvements[] = [
                'type' => 'Entrée',
                'nom_produit' => $entree['nom_produit'],
                'quantite' => $entree['quantite'],
                'date' => $entree['date'],
            ];
        }
        foreach ($sorties as $sortie) {
            $mouvements[] = [
                'type' => 'Sortie',
                'nom_produit' => $sortie['nom_produit'],
                'quantite' => $sortie['quantite'],
                'date' => $sortie['date'],
            ];
        }

        // Trier les mouvements par date (optionnel)
        usort($mouvements, function ($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        return view('mouvement', ['mouvements' => $mouvements]);
    }

    public function add_mouvement(): string
    {
        $this->checkSession(); // Vérification de la session
        return view('add_mouvement');
    }

    public function create_mouvement()
    {
        $this->checkSession(); // Vérification de la session
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
        $this->checkSession(); // Vérification de la session
        $model = new \App\Models\MouvementModel();
        $model->delete($id);

        return redirect()->to('/mouvement')->with('success', 'Mouvement supprimé avec succès.');
    }

    public function edit_mouvement($id)
    {
        $this->checkSession(); // Vérification de la session
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
        $this->checkSession(); // Vérification de la session
        $model = new \App\Models\MouvementModel();
        $mouvements = $model->findAll();

        return view('mouvement', ['mouvements' => $mouvements]);
    }
    public function get_all_mouvements()
    {
        $this->checkSession(); // Vérification de la session
        $model = new \App\Models\MouvementModel();
        $mouvements = $model->findAll();

        return view('mouvement', ['mouvements' => $mouvements]);
    }
    
    public function get_mouvement_by_id($id)
    {
        $this->checkSession(); // Vérification de la session
        $model = new \App\Models\MouvementModel();
        $mouvement = $model->find($id);

        return view('mouvement', ['mouvement' => $mouvement]);
    }
}