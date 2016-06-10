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

        $sql = "SELECT * FROM ubicaciones";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function agregarUbicacion($descripcion, $columnas, $filas, $padre_descripcion, $padre_columna, $padre_fila, $mesas) {

        $sql = "INSERT INTO ubicaciones (descripcion, columnas, filas, padre_descripcion, padre_columna, padre_fila, mesas) VALUES (:descripcion, :columnas, :filas, :padre_descripcion, :padre_columna, :padre_fila, :mesas)";
        $query = $this->db->prepare($sql);
        $parameters = array(':descripcion' => $descripcion, ':columnas' => $columnas, ':filas' => $filas, ':padre_descripcion' => $padre_descripcion, ':padre_columna' => $padre_columna, ':padre_fila' => $padre_fila, ':mesas' => $mesas);
        $query->execute($parameters);
    }

    public function borrarUbicaciones() {
        $sql = "DELETE FROM ubicaciones";
        $query = $this->db->prepare($sql);
        $query->execute();
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
