<?php
namespace App\Controllers;

use App\Models\ProduitsModel;
use App\Models\CategorieModel;
use App\Models\EntreeStockModel;
use App\Models\SortieStockModel;

class Produits extends BaseController
{
    private function validateProduit($data)
    {
        if (empty($data['nomProduit']) || empty($data['description']) || empty($data['quantite']) || empty($data['seuil_alerte']) || empty($data['categorie'])) {
            return 'Tous les champs sont obligatoires.';
        }
        return null;
    }

    public function index(): string
    {
        

        //var_dump($this->checkSession());exit();
        return $this->get_all_produits();
    }

    public function add_produit(): string
    {
       
        // Récupérer toutes les catégories pour les afficher dans la vue
        $categorieModel = new CategorieModel();
        $categories = $categorieModel->findAll();

        return view('add_produit', ['categories' => $categories]);
    }

    public function create_produit()
    {
        
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
        
        $produitModel = new ProduitsModel();
        $categorieModel = new CategorieModel();

        // Récupérer le produit à modifier
        $produit = $produitModel->find($id);
        if (!$produit) {
            return redirect()->to('/produit')->with('error', 'Produit introuvable.');
        }
        // Récupérer toutes les catégories pour les afficher dans la vue
        $categories = $categorieModel->findAll();

        if ($this->request->getMethod() === 'POST') {
            $produits= $this->request->getPost('nomProduit');
            $description = $this->request->getPost('description');
            $quantite = $this->request->getPost('quantite');
            $seuil_alerte = $this->request->getPost('seuil_alerte');
            $categorie = $this->request->getPost('categorie');
           // var_dump($produit, $description, $quantite, $seuil_alerte, $categorie);die();

            // Validation
            if (empty($produits) || empty($description) || empty($quantite) || empty($seuil_alerte) || empty($categorie)) {
                return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
            }

            // Mise à jour dans la base de données
            $produitModel->update($id, [
                'nom_produit' => $produits,
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
        
        //$this->checkSession(); // Vérification de la session
        $produitsModel = new \App\Models\ProduitsModel();
        $produits = $produitsModel
            ->select('produit.*, categorie.nom_categorie')
            ->join('categorie', 'categorie.id_categorie = produit.id_categorie', 'left') // Utilisation d'une jointure LEFT
            ->findAll();

        return view('produits', ['produits' => $produits]);
    }

    public function add_sortie_stock(): string
    {
        // Récupérer tous les produits pour les afficher dans le formulaire
        $produitsModel = new ProduitsModel();
        $produits = $produitsModel->findAll();

        return view('add_sortie_stock', ['produits' => $produits]);
    }

    public function create_sortie_stock()
    {
        
        $id_produit = $this->request->getPost('id_produit');
        $quantite = $this->request->getPost('quantite');
        $id_utilisateur = session()->get('id'); // Récupérer l'utilisateur connecté
    
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
        $sortieStockData = [
            'id_produit' => $id_produit,
            'quantite' => $quantite,
            'id_utilisateur' => $id_utilisateur, // Ajouter l'utilisateur connecté
        ];
    
        if (!$sortieStockModel->save($sortieStockData)) {
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de la sortie de stock.');
        }
    
        // Mettre à jour la quantité dans la table produits
        $produitsModel->update($id_produit, [
            'quantite_stock' => $produit['quantite_stock'] - $quantite,
        ]);
    
        return redirect()->to('/produit')->with('success', 'Sortie de stock enregistrée avec succès.');
    }

    public function add_entree_stock(): string
    {
        // Récupérer tous les produits pour les afficher dans le formulaire
        $produitsModel = new ProduitsModel();
        $produits = $produitsModel->findAll();

        return view('add_entree_stock', ['produits' => $produits]);
    }

    public function create_entree_stock()
    {
       
        $id_produit = $this->request->getPost('id_produit');
        $quantite = $this->request->getPost('quantite');
        $id_utilisateur = session()->get('id');

        if (empty($id_produit) || !is_numeric($quantite) || $quantite <= 0) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires et la quantité doit être un entier positif.');
        }

        $produitsModel = new ProduitsModel();
        $entreeStockModel = new EntreeStockModel();

        $produit = $produitsModel->find($id_produit);
        if (!$produit) {
            return redirect()->back()->with('error', 'Produit introuvable.');
        }

        $entreeStockData = [
            'id_produit' => $id_produit,
            'quantite' => $quantite,
            'id_utilisateur' => $id_utilisateur,
        ];

        if (!$entreeStockModel->save($entreeStockData)) {
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de l\'entrée de stock.');
        }

        $produitsModel->update($id_produit, [
            'quantite_stock' => $produit['quantite_stock'] + $quantite,
        ]);

        return redirect()->to('/produit')->with('success', 'Entrée de stock enregistrée avec succès.');
    }

    public function rapport_stock(): string
    {
        // Récupérer tous les produits pour les afficher dans le formulaire
        $produitsModel = new ProduitsModel();
        $produits = $produitsModel->findAll();

        return view('rapport_stock', ['produits' => $produits]);
    }

    public function generate_rapport_stock()
    {
        
        $id_produit = $this->request->getGet('id_produit');
        $date_debut = $this->request->getGet('date_debut');
        $date_fin = $this->request->getGet('date_fin');

        if (!empty($date_debut) && !strtotime($date_debut)) {
            return redirect()->back()->with('error', 'Date de début invalide.');
        }

        if (!empty($date_fin) && !strtotime($date_fin)) {
            return redirect()->back()->with('error', 'Date de fin invalide.');
        }

        $produitsModel = new ProduitsModel();
        $produits = $produitsModel
            ->select('produit.id_produit, produit.nom_produit, produit.quantite_stock')
            ->join('entree_stock', 'entree_stock.id_produit = produit.id_produit', 'left')
            ->join('sortie_stock', 'sortie_stock.id_produit = produit.id_produit', 'left')
            ->groupBy('produit.id_produit');

        if (!empty($id_produit)) {
            $produits->where('produit.id_produit', $id_produit);
        }

        if (!empty($date_debut)) {
            $produits->where('entree_stock.date_entree >=', $date_debut);
            $produits->where('sortie_stock.date_sortie >=', $date_debut);
        }

        if (!empty($date_fin)) {
            $produits->where('entree_stock.date_entree <=', $date_fin);
            $produits->where('sortie_stock.date_sortie <=', $date_fin);
        }

        $rapport = $produits
            ->select('
                produit.nom_produit,
                SUM(entree_stock.quantite) as total_entree,
                SUM(sortie_stock.quantite) as total_sortie,
                produit.quantite_stock
            ')
            ->findAll();

        return view('rapport_stock', ['rapport' => $rapport]);
    }
}