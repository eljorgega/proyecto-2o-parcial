<?php
function getConnection() {
    $dbhost='localhost';
    $dbuser='root'; 
    $dbpass='Clave9670'; 
    $dbname='newsletter';
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);  
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    return $dbh;
}

function registerNewsletter($username, $mail) {
  $sql = 'INSERT INTO users (user, mail) VALUES (:user,:mail)';
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user', $username);
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();

    echo $stmt->rowCount();

    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
$usuario=$_GET["user"];
$correo=$_GET["mail"];
registerNewsletter($usuario,$correo);

?>
