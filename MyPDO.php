<?php
// ref: https://phpdelusions.net/pdo/pdo_wrapper

class MyPDO extends PDO
{
    protected static $instance;

    public function __construct() {
        $conf = include('./config.php');
        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );
        $dsn = $conf["dburl"];
        parent::__construct($dsn, $conf["username"], $conf["password"], $opt);
    }


    // a classical static method to make it universally available
    public static function instance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // a proxy to native PDO methods
    public function __call($method, $args)
    {
        return call_user_func_array(array($this, $method), $args);
    }


    public function run($sql, $args = NULL)
    {
        if (!$args)
        {
            return $this->query($sql);
        }
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
