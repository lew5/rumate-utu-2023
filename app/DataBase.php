<?php
class Database
{
  private $connection;
  private $statement;

  public function __construct($config)
  {
    $dsn = 'mysql:host=' . $config['database']['host'] . ';';
    $dsn .= 'port=' . $config['database']['port'] . ';';
    $dsn .= 'dbname=' . $config['database']['dbname'] . ';';
    $dsn .= 'charset=' . $config['database']['charset'];

    try {
      $this->connection = new PDO($dsn, "root", "");
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      print("ERROR en la conexión: " . $e->getMessage());
    }
  }

  public function query($query)
  {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute();
    return $this->statement;
  }
}

$db = new Database($config);
$res = $db->query("SELECT * FROM usuario")->fetchAll(PDO::FETCH_ASSOC);
vd($res);
?>