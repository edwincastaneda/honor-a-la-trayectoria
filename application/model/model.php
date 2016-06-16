<?php

class Model {

    /**
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getInvitados() {

        $sql = "SELECT * FROM invitados";
        $query = $this->db->prepare($sql);
        $query->execute();

        /* if(!$count){
          return json_encode($query->fetchAll());
          }else{
          return $query->rowCount();
          }
         */

        return json_encode($query->fetchAll());
    }

    public function agregarInvitado($codigo, $nombresyapellidos, $barras) {
        $sql = "INSERT INTO invitados (codigo, nombresApellidos, codigoBarras) VALUES (:codigo, :nombresApellidos, :codigoBarras)";
        $query = $this->db->prepare($sql);
        $parameters = array(':codigo' => $codigo, ':nombresApellidos' => $nombresyapellidos, ':codigoBarras' => $barras);
        $query->execute($parameters);
    }

    public function borrarInvitado($codigo) {
        $sql = "DELETE FROM invitados WHERE codigo = :codigo";
        $query = $this->db->prepare($sql);
        $parameters = array(':codigo' => $codigo);

        $query->execute($parameters);
    }

    // UBICACIONES

    public function getUbicaciones() {

        $sql = "SELECT * FROM localidades";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function agregarUbicacion($descripcion, $columnas, $filas, $padre_descripcion, $padre_columna, $padre_fila, $mesas) {

        $sql = "INSERT INTO localidades (descripcion, columnas, filas, padre_descripcion, padre_columna, padre_fila, mesas) VALUES (:descripcion, :columnas, :filas, :padre_descripcion, :padre_columna, :padre_fila, :mesas)";
        $query = $this->db->prepare($sql);
        $parameters = array(':descripcion' => $descripcion, ':columnas' => $columnas, ':filas' => $filas, ':padre_descripcion' => $padre_descripcion, ':padre_columna' => $padre_columna, ':padre_fila' => $padre_fila, ':mesas' => $mesas);
        $query->execute($parameters);
    }

    public function borrarUbicaciones() {
        $sql = "DELETE FROM localidades";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    // MESAS


    public function getMesas() {

        $sql = "SELECT * FROM mesas";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getMesa($columna, $fila, $contenedor) {

        $sql = "SELECT *, 1 as estado FROM mesas 
                WHERE columna=:columna
                AND fila=:fila
                AND contenedor=:contenedor";

        $query = $this->db->prepare($sql);
        $parameters = array(':columna' => $columna, ':fila' => $fila, ':contenedor' => $contenedor);
        $query->execute($parameters);

        if ($query->rowCount() > 0) {
            return json_encode($query->fetch());
        } else {
            return json_encode(array("estado" => "0"));
        }
    }

    public function agregarMesas($no_mesa, $no_sillas, $tipo, $contenedor, $columna, $fila) {

        $sql = "INSERT INTO mesas (no_mesa, no_sillas, tipo, contenedor, columna, fila) VALUES (:no_mesa, :no_sillas, :tipo, :contenedor, :columna, :fila)";
        $query = $this->db->prepare($sql);
        $parameters = array(':no_mesa' => $no_mesa, ':no_sillas' => $no_sillas, ':tipo' => $tipo, ':contenedor' => $contenedor, ':columna' => $columna, ':fila' => $fila);
        $query->execute($parameters);
    }

    public function borrarMesas() {
        $sql = "DELETE FROM mesas";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function getInvitadoMesa($no_mesa, $no_silla) {
        $sql = "SELECT am.no_mesa, am.no_silla, am.codigo_barras, i.nombres, i.apellidos, i.empresa, i.departamento, i.puesto, i.anios, i.no_personas, 1 as estado 
                        FROM asignacion_mesas am
                        INNER JOIN invitados i ON i.codigo_barras=am.codigo_barras
                        WHERE am.no_mesa=:no_mesa
                        AND am.no_silla=:no_silla";

        $query = $this->db->prepare($sql);
        $parameters = array(':no_mesa' => $no_mesa, ':no_silla' => $no_silla);
        $query->execute($parameters);

        if ($query->rowCount() > 0) {
            return json_encode($query->fetch());
        } else {
            return json_encode(array("estado" => "0"));
        }
    }

    public function getInvitadosMesas() {
        $sql = "SELECT am.no_mesa, am.no_silla, am.codigo_barras, i.nombres, i.apellidos, i.empresa, i.departamento, i.puesto, i.anios, i.no_personas, 1 as estado 
                        FROM asignacion_mesas am
                        INNER JOIN invitados i ON i.codigo_barras=am.codigo_barras";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    
    public function borrarAsignacionMesa() {
        $sql = "DELETE FROM asignacion_mesas";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    
    
    public function asignarMesaInvitado($no_mesa, $no_silla, $codigo_barras) {

        $sql = "INSERT INTO asignacion_mesas (no_mesa, no_silla, codigo_barras) VALUES (:no_mesa, :no_silla, :codigo_barras)";
        $query = $this->db->prepare($sql);
        $parameters = array(':no_mesa' => $no_mesa, ':no_silla' => $no_silla, ':codigo_barras' => $codigo_barras);
        $query->execute($parameters);
    }
    
    
    public function getInvitadosNoAsignados(){
        $sql = "SELECT * FROM  invitados 
                WHERE codigo_barras 
                NOT IN (SELECT codigo_barras FROM  asignacion_mesas)";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    
    
    
    
    
    
    
    
    /**
     * Get a song from database
     */
    public function getSong($song_id) {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateSong($artist, $track, $link, $song_id) {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfSongs() {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }

}
