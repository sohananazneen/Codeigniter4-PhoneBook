<?php
namespace App\Models;
use CodeIgniter\Model;

class ContactModel extends Model{
    protected $table='contact';
    protected $allowedFields=['name','mobile'];
}

?>