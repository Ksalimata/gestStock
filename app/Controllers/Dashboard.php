<?php

namespace App\Controllers;

use App\Models\ProduitsModel;
use App\Models\CategorieModel;
use App\Models\EntreeStockModel;
use App\Models\SortieStockModel;

class Dashboard extends BaseController
{
    public function index()
    {
        
        $produitsModel = new ProduitsModel();
        $entreeStockModel = new EntreeStockModel();
        $sortieStockModel = new SortieStockModel();

        // Nombre total de produits
        $totalProduits = $produitsModel->countAll();

        // Produits en stock critique
        $produitsCritiques = $produitsModel->where('quantite_stock < seuil_alerte')->findAll();

        // Total des entrées et sorties
        $totalEntrees = $entreeStockModel->selectSum('quantite')->first()['quantite'];
        $totalSorties = $sortieStockModel->selectSum('quantite')->first()['quantite'];

        // Mouvements récents (entrées et sorties)
        $mouvementsRecents = array_merge(
            $entreeStockModel
                ->select('entree_stock.id_entree as id, "Entrée" as type, produit.nom_produit, entree_stock.quantite, entree_stock.date_entree as date, utilisateurs.nom as utilisateur')
                ->join('produit', 'produit.id_produit = entree_stock.id_produit', 'left')
                ->join('utilisateurs', 'utilisateurs.id_utilisateur = entree_stock.id_utilisateur', 'left')
                ->orderBy('entree_stock.date_entree', 'DESC')
                ->findAll(5), // Limite à 5 entrées récentes
            $sortieStockModel
                ->select('sortie_stock.id as id, "Sortie" as type, produit.nom_produit, sortie_stock.quantite, sortie_stock.date_sortie as date, utilisateurs.nom as utilisateur')
                ->join('produit', 'produit.id_produit = sortie_stock.id_produit', 'left')
                ->join('utilisateurs', 'utilisateurs.id_utilisateur = sortie_stock.id_utilisateur', 'left')
                ->orderBy('sortie_stock.date_sortie', 'DESC')
                ->findAll(5) // Limite à 5 sorties récentes
        );

        // Trier les mouvements récents par date (descendant)
        usort($mouvementsRecents, function ($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        return view('dashboard', [
            'totalProduits' => $totalProduits,
            'produitsCritiques' => $produitsCritiques,
            'totalEntrees' => $totalEntrees,
            'totalSorties' => $totalSorties,
            'mouvementsRecents' => $mouvementsRecents, // Passer les mouvements récents à la vue
        ]);
        
    }

    public function getGraphData()
    {
        $entreeStockModel = new EntreeStockModel();
        $sortieStockModel = new SortieStockModel();
        $categorieModel = new CategorieModel();

        // Évolution des entrées et sorties par mois
        $entreesParMois = $entreeStockModel
            ->select("DATE_FORMAT(date_entree, '%Y-%m') as mois, SUM(quantite) as total")
            ->groupBy("mois")
            ->findAll();

        $sortiesParMois = $sortieStockModel
            ->select("DATE_FORMAT(date_sortie, '%Y-%m') as mois, SUM(quantite) as total")
            ->groupBy("mois")
            ->findAll();

        // Répartition des stocks par catégorie
        $stocksParCategorie = $categorieModel
            ->select('categorie.nom_categorie, SUM(produit.quantite_stock) as total_stock')
            ->join('produit', 'produit.id_categorie = categorie.id_categorie', 'left')
            ->groupBy('categorie.id_categorie')
            ->findAll();

        return $this->response->setJSON([
            'entreesParMois' => $entreesParMois,
            'sortiesParMois' => $sortiesParMois,
            'stocksParCategorie' => $stocksParCategorie,
        ]);
    }
}
