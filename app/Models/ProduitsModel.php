<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProduitsModel extends Model
{
    protected $table = 'produit';
    protected $primaryKey = 'id_produit';
    protected $allowedFields = ['nom_produit', 'description', 'quantite_stock', 'seuil_alerte', 'id_categorie'];

   	
    
}