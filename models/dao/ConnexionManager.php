<?php
class ConnexionManager  
{
    private static $instance = null;
    private $connexion ;

    function __construct(){
        
        try{
            $this->connexion = new mysqli("localhost","root","passer","mglsi_news");

        }catch(Exception $e){
            die("Erreur lors de la connexion: " . $e->getMessage());
        }

    }

    /*
     make a unique connexion using a static method
    */

    public static function getInstance(){
        if(self::$instance == null)
            self::$instance = (new ConnexionManager())->connexion ;

        return self::$instance;
    }
    

}
?>