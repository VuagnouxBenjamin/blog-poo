<?php 
namespace App\Table; 

use App\App; 
use App\Table\Table; 

class Categorie extends Table{

    protected static $table = 'categories';

    public function getURL(){
        return 'index.php?p=categorie&id=' . $this->id;
    }

}


