<?php
namespace App\Models;
use CodeIgniter\Model;

class ContactModel extends Model{
    protected $table='contact';
    protected $allowedFields=['name','mobile'];

# Fetching All Data
    public function getRecords(){
        return $this->orderBy('id','DESC')->findAll();
    }

      // show data in update page
    public function getRow($id){
        return $this->where('id', $id)->first();
    }
}

?>