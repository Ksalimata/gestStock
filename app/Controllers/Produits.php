<?php
namespace App\Controllers;

use App\Models\ProduitsModel;
use App\Models\CategorieModel;

class Produits extends BaseController
{
    public function index(): string
    {
        $this->checkSession(); // Vérification de la session
        return $this->get_all_produits();
    }

    public function add_produit(): string
    {
        $this->checkSession(); // Vérification de la session
        // Récupérer toutes les catégories pour les afficher dans la vue
        $categorieModel = new CategorieModel();
        $categories = $categorieModel->findAll();

        return view('add_produit', ['categories' => $categories]);
    }

    public function create_produit()
    {
        $this->checkSession(); // Vérification de la session
        $produit = $this->request->getPost('nomProduit');
        $description = $this->request->getPost('description');
        $quantite = $this->request->getPost('quantite');
        $seuil_alerte = $this->request->getPost('seuil_alerte');
        $categorie = $this->request->getPost('categorie');

        // Validation
        if (empty($produit) || empty($description) || empty($quantite) || empty($seuil_alerte) || empty($categorie)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
        }

        // Enregistrement dans la base de données
        $model = new ProduitsModel();
        $data = [
            'nom_produit' => $produit,
            'description' => $description,
            'quantite_stock' => $quantite,
            'seuil_alerte' => $seuil_alerte,
            'id_categorie' => $categorie
        ];

        if ($model->save($data)) {
            // Succès
            return redirect()->to('/add_produit')->with('success', 'Produit ajouté avec succès.');
        } else {
            // Échec
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement du produit.');
        }
    }

    public function edit_produit($id): string
    {
        $this->checkSession(); // Vérification de la session
        $produitModel = new ProduitsModel();
        $categorieModel = new CategorieModel();

        // Récupérer le produit à modifier
        $produit = $produitModel->find($id);

        if (!$produit) {
            return redirect()->to('/produit')->with('error', 'Produit introuvable.');
        }

        // Récupérer toutes les catégories pour les afficher dans la vue
        $categories = $categorieModel->findAll();

        return view('edit_produit', ['produit' => $produit, 'categories' => $categories]);
    }

    public function update_produit($id)
    {
        $this->checkSession(); // Vérification de la session
        $produitModel = new ProduitsModel();
        $categorieModel = new CategorieModel();

        // Récupérer le produit à modifier
        $produit = $produitModel->find($id);

        // Récupérer toutes les catégories pour les afficher dans la vue
        $categories = $categorieModel->findAll();

        if ($this->request->getMethod() === 'POST') {
            $produit = $this->request->getPost('nomProduit');
            $description = $this->request->getPost('description');
            $quantite = $this->request->getPost('quantite');
            $seuil_alerte = $this->request->getPost('seuil_alerte');
            $categorie = $this->request->getPost('categorie');
           // var_dump($produit, $description, $quantite, $seuil_alerte, $categorie);die();

            // Validation
            if (empty($produit) || empty($description) || empty($quantite) || empty($seuil_alerte) || empty($categorie)) {
                return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
            }

            // Mise à jour dans la base de données
            $produitModel->update($id, [
                'nom_produit' => $produit,
                'description' => $description,
                'quantite_stock' => $quantite,
                'seuil_alerte' => $seuil_alerte,
                'id_categorie' => $categorie
            ]);

            return redirect()->to('/produit')->with('success', 'Produit modifié avec succès.');
        }

        return view('edit_produit', ['produit' => $produit, 'categories' => $categories]);
    }

    public function delete_produit($id)
    {
        $this->checkSession(); // Vérification de la session
        $model = new ProduitsModel();

        // Vérifier si le produit existe
        $produit = $model->find($id);
        if (!$produit) {
            return redirect()->to('/produit')->with('error', 'Produit introuvable.');
        }
        $model->delete($id);

        return redirect()->to('/produit')->with('success', 'Produit supprimé avec succès.');
    }

    public function get_all_produits()
    {
        
        $this->checkSession(); // Vérification de la session
        $produitsModel = new \App\Models\ProduitsModel();
        $produits = $produitsModel
            ->select('produit.*, categorie.nom_categorie')
            ->join('categorie', 'categorie.id_categorie = produit.id_categorie', 'left') // Utilisation d'une jointure LEFT
            ->findAll();

        return view('produits', ['produits' => $produits]);
    }

    public function add_sortie_stock(): string
    {
        $this->checkSession(); // Vérification de la session

        // Récupérer tous les produits pour les afficher dans le formulaire
        $produitsModel = new ProduitsModel();
        $produits = $produitsModel->findAll();

        return view('add_sortie_stock', ['produits' => $produits]);
    }

    public function create_sortie_stock()
    {
            $this->checkSession(); // Vérification de la session

            $id_produit = $this->request->getPost('id_produit');
            $quantite = $this->request->getPost('quantite');

            // Validation
            if (empty($id_produit) || empty($quantite) || $quantite <= 0) {
                return redirect()->back()->with('error', 'Tous les champs sont obligatoires et la quantité doit être supérieure à 0.');
            }

            $produitsModel = new ProduitsModel();
            $sortieStockModel = new SortieStockModel();

            // Vérifier si le produit existe
            $produit = $produitsModel->find($id_produit);
            if (!$produit) {
                return redirect()->back()->with('error', 'Produit introuvable.');
            }

            // Vérifier si la quantité en stock est suffisante
            if ($produit['quantite_stock'] < $quantite) {
                return redirect()->back()->with('error', 'Stock insuffisant pour effectuer cette sortie.');
            }

            // Enregistrer la sortie de stock
            $sortieStockModel->save([
                'id_produit' => $id_produit,
                'quantite' => $quantite,
            ]);

            // Mettre à jour la quantité dans la table produits
            $produitsModel->update($id_produit, [
                'quantite_stock' => $produit['quantite_stock'] - $quantite,
            ]);

            return redirect()->to('/produit')->with('success', 'Sortie de stock enregistrée avec succès.');
    }

    public function add_entree_stock(): string
    {
        $this->checkSession(); // Vérification de la session

        // Récupérer tous les produits pour les afficher dans le formulaire
        $produitsModel = new ProduitsModel();
        $produits = $produitsModel->findAll();

        return view('add_entree_stock', ['produits' => $produits]);
    }

    public function create_entree_stock()
    {
        $this->checkSession(); // Vérification de la session

        $id_produit = $this->request->getPost('id_produit');
        $quantite = $this->request->getPost('quantite');

        // Validation
        if (empty($id_produit) || empty($quantite) || $quantite <= 0) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires et la quantité doit être supérieure à 0.');
        }

        $produitsModel = new ProduitsModel();
        $entreeStockModel = new EntreeStockModel();

        // Vérifier si le produit existe
        $produit = $produitsModel->find($id_produit);
        if (!$produit) {
            return redirect()->back()->with('error', 'Produit introuvable.');
        }

        // Enregistrer l'entrée de stock
        $entreeStockModel->save([
            'id_produit' => $id_produit,
            'quantite' => $quantite,
        ]);

        // Mettre à jour la quantité dans la table produits
        $produitsModel->update($id_produit, [
            'quantite_stock' => $produit['quantite_stock'] + $quantite,
        ]);

        return redirect()->to('/produit')->with('success', 'Entrée de stock enregistrée avec succès.');
    }
}