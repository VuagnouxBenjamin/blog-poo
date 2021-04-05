<?php 
namespace App; 
use \PDO;


/**
 * [Description Database]
 */
class Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo; 

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;   
    }

    private function getPDO(){
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset=utf8', $this->db_user, $this->db_pass); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo; 
        }
        return $this->pdo;
    }

    public function query($statement, $class_name, $one = false){
        $request = $this->getPDO()->query($statement); 
        $request->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one) {
            $datas = $datas = $request->fetch();
        } else $datas = $request->fetchAll();

        return $datas; 
    }

    public function prepare($statement, $arguments, $class_name, $one = false){
        $request = $this->getPDO()->prepare($statement); 
        $request->execute($arguments);
        $request->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if($one) {
            $datas = $request->fetch();  
        } else $datas = $request->fetchAll();

        return $datas; 
    }
}
