<?php 
namespace App; 

// class App {

//     private static $_instance; 
//     public  $title = "titre de test";

//     /**
//      * @return Singleton
//      */
//     public static function getInstance() {
//         if (is_null(self::$_instance)) {
//             self::$_instance = new App(); 
//         }
//         return self::$_instance; 
//     }

// }

class App {

    const DB_NAME = 'blog';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';
     
    private static $database; 
    private static $title = 'Jarditou'; 

    public static function getDb(){
        if (self::$database === null) {
            self::$database =  new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);  
        }
        return self::$database; 
    }

    public static function notFound() {
        header("HTTP/1.0 404 Not Found"); 
        header("Location:index.php?p=404"); 
    }

    public static function getTitle() {
        return self::$title; 
    }

    public static function setTitle($title) {
        self::$title = $title; 
    }


}