<?php
class Database
{
  private $connection;
  private $statement;

  public function __construct($config, $username, $password)
  {

    $dsn = "mysql:" . http_build_query($config, "", ";");

    try {
      $this->connection = new PDO($dsn, $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      print("ERROR en la conexión: " . $e->getMessage());
    }
  }

  public function query($query, $params = [])
  {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);
    return $this;
  }

  public function get()
  {
    return $this->statement->fetchAll();
  }

  public function find()
  {
    return $this->statement->fetch();
  }
  public function findOrFail()
  {
    $result = $this->find();
    if (!$result) {
      abort();
    } else {
      return $result;
    }
  }
}
?>