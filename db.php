<?php 
class databaza {
    private $host = "localhost";
    private $databaza = "webstranka";
    private $uzivatel = "root";
    private $heslo = "";
    public $pdo ;

    public function pripojit_k_databaze(){
        $this->pdo = null;
        try{
            $this->pdo = new PDO(
                "mysql:host=". $this->host .
                ";dbname=". $this->databaza .  
                ";charset=utf8",
                $this->uzivatel,
                $this->heslo
                );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $chyba){
            die("nefukuje dorrko :(" . $chyba->getMessage());
        }
        return $this->pdo;
    }
}


?>