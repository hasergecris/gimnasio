 <?php

  // class Conexion {

  //   static public function conectar() {
  //       $link = new PDO("mysql:host=localhost;dbname=gimnasio","root", "");

  //       $link->exec("set names utf8");


  //       return $link;
  //   }
  // }


  class Conexion
  {

    static public function conectar()
    {
      try {
        $link = new PDO("mysql:host=localhost;dbname=gimnasio;charset=utf8", "root", "");
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Conexión exitosa a la base de datos";
        return $link;
      } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        exit();
      }
    }
  }

  ?>




 
