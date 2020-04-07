<?php

class Usuario {
    private $id_usuario;
    private $deslogin;
    private $dessenha;
    private $dt_cadastro;

    public function __get($attr){
        return $this -> $attr;
    }

    public function __set($attr, $value){
        $this -> $attr = $value;
    }

    public function loadById($id){

        $sql = New Sql();
        $results = $sql -> select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(
            ":ID" => $id
        ));

        if(count($results) > 0){

            $row = $results[0];

            $this->__set("id_usuario", $row["id_usuario"]);
            $this->__set("deslogin", $row["deslogin"]);
            $this->__set("dessenha", $row["dessenha"]);
            $this->__set("dt_cadastro", new DateTime($row["dt_cadastro"]));

        }
    }

    public static function getList(){

        $sql = new Sql();

        return $sql -> select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public function __toString(){
        return json_encode(array(
            "idusario" => $this->__get("id_usuario"),
            "deslogin" => $this->__get("deslogin"),
            "dessenha" => $this->__get("dessenha"),
            "dt_cadastro" => $this->__get("dt_cadastro")->format("d/m/Y H:i:s")
        ));
    }
}

?>