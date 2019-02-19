<?php
function initGlobalDbConnection($config = []) {
    global $global_db_connection;
    if (!$global_db_connection) {
        $global_db_connection = new mysqli($config['host'], $config['user'], $config['password'], $config['db']);
        if ($global_db_connection->connect_errno)
        {
            printf($global_db_connection->connect_error);
            exit();
        }
    }
    return $global_db_connection;
}
function db($config = []) {
    static $connection;
    if (!$connection) {
        $connection = new mysqli($config['host'], $config['user'], $config['password'], $config['db']);
        if ($connection->connect_errno)
        {
            printf($connection->connect_error);
            exit();
        }
    }
    return $connection;
}
class Database {
    public $connection;
    private static $_instance;
    public static function getInstance($config = []) {
        if(!self::$_instance) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }
    private function __construct($config) {
        $this->connection = new mysqli($config['host'], $config['user'], $config['password'], $config['db']);
        
        if ($this->connection->connect_errno)
        {
            printf($this->connection->connect_error);
            exit();
        }
        $this->connection->set_charset("utf8");
    }
}

/**
 * 
 */
class DB
{
    public static $connection;

    public static function init($config = []) 
    {
        if (!self::$connection) 
        {
            self::$connection = new mysqli($config['host'], $config['user'], $config['password'], $config['db']);
            if (self::$connection->connect_errno) 
            {
                print(self::$connection->connection->connect_error);
                exit();
            }
        }
        return self::$connection;
    }


    public static function connection()
    {
        self::$connection->set_charset("utf8");
        return self::$connection;
    }
}

class DB_PDO
{
    public      static $connection;
    protected   static $dsn;

    public static function init($config_PDO = []) 
    {
        if (!self::$connection) 
        {   
            try {
                self::$dsn = 'mysql:host='.$config_PDO['host'].';dbname='.$config_PDO['db'].';charset='.$config_PDO['charset'];
                self::$connection = new PDO(self::$dsn, $config_PDO['user'], $config_PDO['password']);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }
        return self::$connection;
    }


    public static function connection()
    {
        return self::$connection;
    }
}