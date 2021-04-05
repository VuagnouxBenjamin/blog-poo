<?php 
namespace App\Table; 

use App\App; 
use App\Table\Table; 

class Article extends Table{

    public static function getLast(){
        return self::query("
        SELECT article.id, titre, contenu, titre_cat AS categorie 
        FROM article 
        LEFT JOIN categories
            ON category_id = categories.id;
        ");    
    }

    public static function lastByCategory($cat_id){
        return self::query("
        SELECT article.id, titre, contenu, titre_cat AS categorie 
        FROM article 
        LEFT JOIN categories
            ON category_id = categories.id
        WHERE category_id = ?; 
        ", [$cat_id]);  
    }
    
    
    public function getURL(){
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtrait(){
        $html = '<p>' . strip_tags(substr($this->contenu, 0, 350)) . '...</p>'; 
        $html .= '<a href=" '.$this->getURL(). '">Lire l\'article complet.</a>'; 
        $this->url = $html; 
        return $html; 
    }
}