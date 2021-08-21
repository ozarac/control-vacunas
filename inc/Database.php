<?php
class Database
{
    private static $dbName = 'control_vacunacion' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'vacunacion';
    private static $dbUserPassword = 'rvAF6dCBH38sU6tp';
    private static $cont  = null;
    public function __construct() {
        die('No esta permitido inicializar función.');
    }
    public static function connect()
    {
        //Unica conexión
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "sqlsrv:Server=".self::$dbHost.";"."Database=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }
    public static function disconnect()
    {
        self::$cont = null;
    }
}