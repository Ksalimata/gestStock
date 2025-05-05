<?php
namespace App\Models;

use CodeIgniter\Model;

class EntreeStockModel extends Model
{
    protected $table = 'entree_stock';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_produit', 'quantite', 'date_entree'];
}