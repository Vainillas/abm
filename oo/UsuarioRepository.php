<?php
require "db.php";
require "equipo.php";

class UsuarioRepository extends Db
{

    function listar()
    {
        $this->conectar();
        $sql = "SELECT * FROM equipos";
        $result = $this->conn->query($sql);

        $lista = array();

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $e = new Equipo();
                $e->id = $row["id"];
                $e->nombre = $row["nombre"];
                $e->pais = $row["pais"];
                $e->fecha_creacion = $row["fecha_creacion"];
                $e->cantidad_partidos = rand(1, 10);

                array_push($lista, $e);
            }
        }


        $this->desconectar();

        return $lista;
    }
}
