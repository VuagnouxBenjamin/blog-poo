<?php 
namespace App\Table; 

use App\App; 

class Table {

    protected static $table; 

    private static function getTable(){
        if (static::$table === null) {
            $class_name = explode('\\', get_called_class()); 
            static::$table = strtolower(end($class_name)) . 's';  
        }
        return static::$table; 
    }

    public static function query($statement, $attributes = null, $one = false) {
        if ($attributes != null) {
            return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);  
        } else {
            return App::getDb()->query($statement, get_called_class(), $one); 
        }
    }

    public static function find($id) {
        return self::query("
        SELECT DISTINCT titre_cat AS titre 
        FROM article 
        LEFT JOIN categories
            ON category_id = categories.id
        WHERE category_id = ?
        ", [$id], get_called_class());
    }

    public static function all(){
        return App::getDb()->query("
        SELECT * 
        FROM  ". static::getTable() 
        , get_called_class());
    }

    public function __get($key){
        $method = 'get'. ucfirst($key);
        $this->$key = $this->$method(); // optionnel, permet de sauvegarder la key pour des usages multiples. 
        return $this->$key;
    }

}