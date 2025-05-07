<?php
namespace App\Models;

use CodeIgniter\Model;

class EntreeStockModel extends Model
{
    protected $table = 'entree_stock';
    protected $primaryKey = 'id_entree';
    protected $allowedFields = ['date_entree', 'quantite', 'id_produit', 'id_utilisateur'];

}