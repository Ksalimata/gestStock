<?php
namespace App\Models;

use CodeIgniter\Model;

class SortieStockModel extends Model
{
    protected $table = 'sortie_stock';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_produit','id_utilisateur', 'quantite', 'date_sortie'];
}

?>