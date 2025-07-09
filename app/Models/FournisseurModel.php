<?php 
namespace App\Models;

use CodeIgniter\Model;

class FournisseurModel extends Model
{
    protected $table = 'fournisseur';
    protected $primaryKey = 'id_fournisseur';
    protected $allowedFields = ['nom','contact','adresse'];
    
}