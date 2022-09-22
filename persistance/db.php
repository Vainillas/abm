<?php

class Db
{

  public $servername = "localhost";
  public $username = "root";
  public $password = "";
  public $dbname = "practicaproyecto";
  public $conn;

  // Create connection
  function conectar()
  {

    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    // Check connection
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }


  public function desconectar()
  {
    $this->conn->close();
  }
}
