<?php
require "db.php";
require $_SERVER['DOCUMENT_ROOT'] . "/abm/model/equipo.php";

class equipos_repository extends Db
{

    function listar()
    {
        $this->conectar();
        $sql = "SELECT * FROM equipos ORDER BY id";
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

        return $lista;
    }
    function insertar(
        $nombre,
        $pais,
        $fecha
    ) {
        $this->conectar();
        $consulta = "INSERT INTO equipos (nombre, pais, fecha_creacion) 
        VALUES ('$nombre','$pais','$fecha')";
        mysqli_query($this->conn, $consulta);
    }
    function eliminar($id)
    {
        $this->conectar();
        $consulta = "DELETE FROM equipos WHERE id=$id";
        mysqli_query($this->conn, $consulta);
    }

    function modificar(
        $id,
        $nombre,
        $pais,
        $fecha
    ) {
        $this->conectar();
        $consulta = "UPDATE equipos SET 
        nombre = ('$nombre'),
        pais = ('$pais'),
        fecha_creacion = ('$fecha')
        WHERE id = $id";
        mysqli_query($this->conn, $consulta);
    }
    function recuperarEquipo($id)
    {
        $this->conectar();
        $consulta = "SELECT * from equipos WHERE id = $id";
        $resultado = mysqli_query($this->conn, $consulta);
        $equipo = mysqli_fetch_array($resultado);
        return $equipo;
    }
}
