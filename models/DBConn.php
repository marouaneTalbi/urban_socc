<?php

abstract class DBConn{
    private static $bdd;
    private static function getBdd()
    {
        if(self::$bdd === null){
            try{
                self::$bdd = new PDO('mysql:host=localhost; dbname=urban_soccer','root','');
                self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        return self::$bdd;
    }
    protected function getRequest($sql, $params = null){
        $result = self::getBdd()->prepare($sql);
        $result->execute($params);

        return $result;
    }
}
