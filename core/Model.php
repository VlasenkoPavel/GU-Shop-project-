<?php
namespace core;

class Model
{
    private $configFile = SITE_ROOT.'ConfigDB.php';
    private $settings = [];
    private $pdo;
    private $sth;

    public function __construct()
    {
        $this->settings = $this->getPDOSettings();
        $this->pdo = new \PDO ($this->settings['dsn'], $this->settings['user'], $this->settings['pass'], null);
    }

    private function getPDOSettings()
    {
        $config = include $this->configFile;
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }

    public function queryNewProducts()
    {
        $this->sth = $this->pdo->prepare('SELECT * FROM products LIMIT 4');
        $this->sth->execute();
        return $this->sth->fetchAll();
    }

    public function queryProduct($productId)
    {

        $this->sth = $this->pdo->prepare('SELECT * FROM products WHERE product_id = ?');
        $this->sth->execute([$productId]);
        $product = $this->sth->fetchAll();
        return $product[0];
    }

    public function queryUser($login, $password)
    {

        $this->sth = $this->pdo->prepare('SELECT * FROM users WHERE login = ?');
        $this->sth->execute([$login]);
        $user = $this->sth->fetchAll();
        return $user[0]['password'] == $password;
    }

}

//class Db
//{
//    public $pdo;
//    public function __construct()
//    {
//        $settings = $this->getPDOSettings();
//        $this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], null);
//    }
//    protected function getPDOSettings()
//    {
//        $config = include ROOTPATH.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Db.php';
//        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
//        $result['user'] = $config['user'];
//        $result['pass'] = $config['pass'];
//        return $result;
//    }
//    public function execute($query, array $params=null)
//    {
//        if(is_null($params)){
//            $stmt = $this->pdo->query($query);
//            return $stmt->fetchAll();
//        }
//        $stmt = $this->pdo->prepare($query);
//        $stmt->execute($params);
//        return $stmt->fetchAll();
//    }
//}