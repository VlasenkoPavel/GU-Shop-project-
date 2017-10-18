<?php

namespace core;
use \PDO;

//class Db implements \components\ComponentInterface
class Db
{
    public static $db;
    private $configFile = SITE_ROOT.'ConfigDB.php';
    private $settings = [];
    private $connection;
    private $sql;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Вывод исключений на экран
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //Чтобы получать только ассоциативный массив данных
    ];
//    private $sth;
    private function __construct(){}
    private function __clone () {}
    private function __wakeup () {}

    public static function init()
    {
        if(empty(self::$db)){
            self::$db = new self();
            self::$db->settings = self::$db->getPDOSettings();
            try {
                self::$db->connection = new PDO (self::$db->settings['dsn'], self::$db->settings['user'], self::$db->settings['pass'], self::$db->options);
            } catch (PDOException $e) {
                echo "Error db connect!<br>";
                exit();
            }
        }
        return self::$db;
    }

    private function getPDOSettings()
    {
        $config = include self::$db->configFile;
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }

    public function trySql ($sql) {
        try {
            $result = self::$db->connection->query($sql);
        } catch (PDOException $e) {
            return [];
        };
        $result->execute();
        return $result->fetchAll();
    }

    public function tryLimitSql($sql, $limit)
    {
        $sth = $this->connection->prepare($sql);
        $sth->bindParam(':limit', $limit, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }


    public function getLimitedDataByCategoryAndType($sql, $typeName, $categoryName, $min, $limit)
    {
        $sth = $this->connection->prepare($sql);
        $sth->bindParam(':minNum', $min, PDO::PARAM_INT);
        $sth->bindParam(':limit', $limit, PDO::PARAM_INT);
        $sth->bindParam(':typeName', $typeName, PDO::PARAM_STR, 24);
        $sth->bindParam(':categoryName', $categoryName, PDO::PARAM_STR, 12);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function getCountDataByCategoryAndType($typeName, $categoryName)
    {
        $sth = $this->connection->prepare(" SELECT COUNT(*) FROM products
            INNER JOIN types on products.type_id = types.id
            INNER JOIN categoryes on products.category_id = categoryes.id
            WHERE types.type = :typeName AND categoryes.category = :categoryName");
        $sth->bindParam(':typeName', $typeName, PDO::PARAM_STR, 24);
        $sth->bindParam(':categoryName', $categoryName, PDO::PARAM_STR, 12);
        $sth->execute();
        $resultArr = $sth->fetchAll();
        $result = ($resultArr[0]['COUNT(*)']);
        return $result;
    }

//    public function queryNewProducts()
//    {
//        $num = 4;
//        $this->sth = $this->connection->prepare('SELECT * FROM products LIMIT 4');
////        $this->sth->bindParam(':num', $num);
////        db2_bind_param(1,)
//        $this->sth->execute([$num]);
//        return $this->sth->fetchAll();
//    }

//    public function trySql ($sql) {
//        try {
//            $result = $this->connection->query($sql);
//        } catch (PDOException $e) {
//            return false;
//        };
//        return true;
//    }

}