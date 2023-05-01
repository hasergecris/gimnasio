<?php
  class ControladorFormularios {

    // REGISTRO
  static public function ctrRegistroUsuarios(){
      
      if(isset($_POST["registroNombre"])) {
          return "ok";
      }
    }  

  }