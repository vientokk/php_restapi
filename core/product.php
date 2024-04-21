<?php

class Product{
  private $conn;
  private $table = 'products';

  public $id;
  public $name;
  public $price;
  public $stock;
  public $created_at;

  public function __construct($db) {
    $this->conn = $db;
  }

  // 전체
  public function get_all() {
    $sql = "SELECT * FROM ". $this->table;
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt;
  }

  // 개별
  public function get_one(){
    $sql = "Select * From " . $this->table ." Where id=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":id", $this->id);
    $stmt->execute();
    return $stmt;

    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // $this->name = $row['name'];
    // $this->price = $row['price'];
    // $this->stock = $row['stock'];
    // $this->created_at = $row['created_at'];    
  }

  public function create() {
    $sql = "INSERT INTO ". $this->table ." SET name=:name, price=:price, stock=:stock";
    $stmt = $this->conn->prepare($sql);

    $this->name  = htmlspecialchars(strip_tags($this->name));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->stock = htmlspecialchars(strip_tags($this->stock));
    
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':stock', $this->stock);
    if ($stmt->execute()) {
      return true;
    }

    echo "Error ". $stmt->error .".". PHP_EOL;
    return false;
  } 

  
  public function update() {
    $sql = "UPDATE ". $this->table ." SET name=:name, price=:price, stock=:stock
     WHERE id=:id";
    $stmt = $this->conn->prepare($sql);

    $this->name  = htmlspecialchars(strip_tags($this->name ));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->stock = htmlspecialchars(strip_tags($this->stock));
    $this->id    = htmlspecialchars(strip_tags($this->id   ));
    
    $stmt->bindParam(':name' , $this->name );
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':stock', $this->stock);
    $stmt->bindParam(':id'   , $this->id   );

    if ($stmt->execute()) {
      return true;
    }

    echo "Error ". $stmt->error .".". PHP_EOL;
    return false;
    
  }

  public function delete(){
    $sql = "Delete From " . $this->table . " Where id=:id";
    $stmt = $this->conn->prepare($sql);
    $this->id    = htmlspecialchars(strip_tags($this->id   ));
    $stmt->bindParam(':id'   , $this->id   );

    if ($stmt->execute()) {
      return true;
    }

    echo "Error ". $stmt->error .".". PHP_EOL;
    return false;
    
  }

 
}