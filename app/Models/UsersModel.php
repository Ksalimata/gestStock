<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_utilisateur';
    protected $allowedFields = ['nom', 'prenoms', 'email', 'telephone', 'mot_de_passe', 'role'];
    
}