<?php
/*
  0. Get started
  0.1 Create a DB called myapp
  0.2 Create a table in myapp called users with 3 fields.
    id        INT     Primary key
    username  TEXT
    password  TEXT
  0.3 Add your username and password to the getConnection()
  0.4 Check that you can connect to your DB
  0.5 For this exercise you can user named or unnamed placeholders. I personally use named
 */
function getConnection() {
    $dbhost='localhost'; // IP
    $dbuser='temporal';   // nombre usuario
    $dbpass='Clave9670'; // contraseña
    $dbname='newsletter';    //nombre de la base de datos
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);  //crea el objeto
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // prueba la conexion
    return $dbh;
}

 $sql = "SELECT * FROM users";
  try {
      $db = getConnection();
      $stmt = $db->query($sql);
      $users = $stmt->fetchAll(PDO::FETCH_OBJ);

      print_r($users);

      $db = null;
  } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
  }

  ?>