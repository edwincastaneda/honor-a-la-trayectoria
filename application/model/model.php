<?php

class Model {

    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    // INVITADOS

    public function getInvitados() {

        $sql = "SELECT a.codigo, a.nombresApellidos, a.codigoBarras, a.empresa, a.departamento, a.puesto, a.asistencia, 
                        a.fechaIngreso, a.anios, a.numPersonas, a.confirmacion, a.entregaPin, 
                        a.entregadorPin, pe.idperfilEntregador, pe.nombre as nombreEntregador, 
                        pe.puesto as puestoEntregador, pe.empresa as empresaEntregador FROM asistencia a
                LEFT JOIN perfilentregador pe ON pe.idperfilEntregador=a.entregadorPin";

        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetchAll());
    }

    public function agregarInvitado($nombresApellidos, $codigoBarras, $empresa, $departamento, $puesto, $asistencia, $fechaIngreso, $anios, $numPersonas, $confirmacion, $entregaPin, $entregadorPin) {
        $sql = "INSERT INTO asistencia (nombresApellidos, codigoBarras, empresa, departamento, puesto, asistencia, fechaIngreso, anios, numPersonas, confirmacion, entregaPin, entregadorPin) VALUES (:nombresApellidos, :codigoBarras, :empresa, :departamento, :puesto, :asistencia, :fechaIngreso, :anios, :numPersonas, :confirmacion, :entregaPin, :entregadorPin)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nombresApellidos' => $nombresApellidos, ':codigoBarras' => $codigoBarras, ':empresa' => $empresa, ':departamento' => $departamento, ':puesto' => $puesto, ':asistencia' => $asistencia, ':fechaIngreso' => $fechaIngreso, ':anios' => $anios, ':numPersonas' => $numPersonas, ':confirmacion' => $confirmacion, ':entregaPin' => $entregaPin, ':entregadorPin' => $entregadorPin);
        $query->execute($parameters);
    }

    public function getEntregador($id) {
        $sql = "SELECT * FROM perfilEntregador WHERE idperfilEntregador = :idperfilEntregador";
        $query = $this->db->prepare($sql);
        $parameters = array(':idperfilEntregador' => $id);

        $query->execute($parameters);
        return json_encode($query->fetch());
    }

    public function getEntregadores() {
        $sql = "SELECT * FROM perfilEntregador";
        $query = $this->db->prepare($sql);
        $query->execute();
        return json_encode($query->fetchAll());
    }

    public function setEntregador($codigoBarras, $idEntregador) {
        $sql = "UPDATE asistencia SET entregadorPin = :entregadorPin WHERE codigoBarras=:codigoBarras";
        $parameters = array(':codigoBarras' => $codigoBarras, ':entregadorPin' => $idEntregador);
        $query = $this->db->prepare($sql);
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

    public function getMesasJson() {

        $sql = "SELECT * FROM mesas";
        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetchAll());
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

    public function getInvitadoMesa($mesa, $silla) {
        $sql = "SELECT am.mesa, am.silla, am.codigoBarras, i.nombresApellidos, i.empresa, i.departamento, i.puesto, i.anios, i.numPersonas, 1 as estado 
                        FROM asignacionmesa am
                        INNER JOIN asistencia i ON i.codigoBarras=am.codigoBarras
                        WHERE am.mesa=:mesa
                        AND am.silla=:silla";

        $query = $this->db->prepare($sql);
        $parameters = array(':mesa' => $mesa, ':silla' => $silla);
        $query->execute($parameters);

        if ($query->rowCount() > 0) {
            return json_encode($query->fetch());
        } else {
            return json_encode(array("estado" => "0"));
        }
    }

    public function getInvitadosMesas() {
        $sql = "SELECT am.mesa, am.silla, am.codigoBarras, i.nombresApellidos, i.empresa, i.departamento, i.puesto, i.anios, i.numPersonas, 1 as estado 
                        FROM asignacionmesa am
                        INNER JOIN asistencia i ON i.codigoBarras=am.codigoBarras";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function borrarAsignacionMesa() {
        $sql = "DELETE FROM asignacionmesa";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function asignarMesaInvitado($mesa, $silla, $codigoBarras) {

        $sql = "INSERT INTO asignacionmesa (mesa, silla, codigoBarras) VALUES (:mesa, :silla, :codigoBarras)";
        $query = $this->db->prepare($sql);
        $parameters = array(':mesa' => $mesa, ':silla' => $silla, ':codigoBarras' => $codigoBarras);
        $query->execute($parameters);
    }

    public function getInvitadosNoAsignados() {
        $sql = "SELECT * FROM  asistencia 
                WHERE codigoBarras 
                NOT IN (SELECT codigoBarras FROM  asignacionmesa)";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function exeSQL($query) {
        $sql = $query;
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function getCategorias() {

        $sql = "SELECT anios FROM asistencia GROUP BY anios";
        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetchAll());
    }

    public function getCategoriasData() {

        $sql = "SELECT a.anios, o.titulo FROM asistencia a
                LEFT JOIN opcionesCategorias o ON o.categoria=a.anios
                GROUP BY a.anios";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getNumeroSillas($no_mesa) {
        $sql = "SELECT no_sillas FROM mesas WHERE no_mesa=" . $no_mesa;
        $query = $this->db->prepare($sql);
        $query->execute();
        $sillas = $query->fetch();
        $individuales = explode(".", $sillas->no_sillas);

        $sillas_final=0;
        foreach ($individuales as &$valor) {
            $sillas_final+= $valor;
        }

        return $sillas_final;
    }

    public function getSillasUtilizadas($no_mesa) {
        $sql = "SELECT silla FROM asignacionmesa WHERE mesa=" . $no_mesa;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_COLUMN, 0);
        ;
    }

    public function getInvitadosSinAsignar($categorias) {
        /* $sql = "SELECT codigoBarras, RAND() as random FROM asistencia WHERE codigoBarras 
          NOT IN (SELECT codigoBarras FROM asignacionmesa)
          AND anios IN (" . $categorias . ") ORDER BY random LIMIT 1 ";
         */

        $sql = "SELECT codigoBarras, nombresApellidos FROM asistencia WHERE codigoBarras 
                NOT IN (SELECT codigoBarras FROM asignacionmesa)
                AND anios IN (" . $categorias . ") ORDER BY nombresApellidos ASC LIMIT 1 ";


        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

// CHECKIN

    public function getAsignacionPorCodigo($codigoBarras) {
        $sql = "SELECT  am.mesa, am.silla, i.codigoBarras, i.nombresApellidos, i.empresa, i.departamento, i.puesto, i.anios, i.numPersonas, 1 as estado 
                        FROM asistencia i
                        LEFT JOIN asignacionmesa am ON am.codigoBarras=i.codigoBarras
                        WHERE i.codigoBarras='" . $codigoBarras . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

    public function getInvitadosNoConfirmados($tabla) {

        $sql = "SELECT * FROM " . $tabla . " WHERE asistencia=0";
        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetchAll());
    }

    public function registrarInvitado($codigoBarras) {
        $sql = "UPDATE asistencia SET asistencia=1 WHERE codigoBarras=:codigoBarras";
        $query = $this->db->prepare($sql);
        $parameters = array(':codigoBarras' => $codigoBarras);
        $query->execute($parameters);
    }

    // GRAFICAS

    public function getBarras($anios) {
        $sql = "SELECT 
                (SELECT count(*) FROM asistencia WHERE anios=" . $anios . " AND asistencia=1) AS registrados,
                (SELECT count(*) FROM asistencia WHERE anios=" . $anios . " AND asistencia=0) AS no_registrados";

        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetch());
    }

    public function getBarrasTodos() {
        $sql = "SELECT 
                (SELECT count(*) FROM asistencia WHERE asistencia=1) AS registrados,
                (SELECT count(*) FROM asistencia WHERE asistencia=0) AS no_registrados,
                (SELECT count(*) FROM asistencia WHERE confirmacion=0) AS no_confirmados,
                (SELECT count(*) FROM asistencia WHERE confirmacion=1) AS confirmados,
                (SELECT count(*) FROM asistencia WHERE confirmacion=1 AND asistencia=1) AS confirmados_asistidos,
                (SELECT count(*) FROM asistencia WHERE confirmacion=1 AND asistencia=0) AS confirmados_no_asistidos,
                (SELECT count(*) FROM asistencia WHERE confirmacion=1 AND anios >=5 AND  anios <=40) AS homenajeados_confirmados,
                (SELECT count(*) FROM asistencia WHERE confirmacion=1 AND asistencia=1 AND anios >=5 AND  anios <=40) AS homenajeados_confirmados_asistidos,
                (SELECT count(*) FROM asistencia WHERE confirmacion=1 AND asistencia=0 AND anios >=5 AND  anios <=40) AS homenajeados_confirmados_no_asistidos,
                (SELECT count(*) FROM asistencia WHERE confirmacion=0 AND asistencia=1 AND anios >=5 AND  anios <=40) AS homenajeados_no_confirmados_asistidos,
                (SELECT count(*) FROM asistencia WHERE asistencia=1 AND anios >=200) AS columnistas,
                (SELECT count(*) FROM asistencia WHERE asistencia=1 AND anios =100) AS vip
                ";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
    
    public function getBarrasConfirmados($anios) {
        $sql = "SELECT 
                (SELECT count(*) FROM asistencia WHERE asistencia=1) AS registrados,
                (SELECT count(*) FROM asistencia WHERE asistencia=0) AS no_registrados";

        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetch());
    }
    
    // PROGRAMA

    public function getHomenajeados($anios, $entregadorPin) {
        $sql = "SELECT * FROM asistencia
                WHERE anios=" . $anios . "
                AND asistencia=1 
                AND entregadorPin=" . $entregadorPin;

        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetchAll());
    }

    public function getGruposPorAnio($anio) {
        $sql = "SELECT  a.entregadorPin as grupo, pe.nombre, pe.puesto FROM asistencia a
                INNER JOIN perfilEntregador pe ON pe.idperfilEntregador=a.entregadorPin
                WHERE a.anios=" . $anio . "
                AND a.entregadorPin<>''
                GROUP BY a.entregadorPin  
                ORDER BY IF(CAST(grupo AS SIGNED) = 0, 99999, CAST(grupo AS SIGNED))";
        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetchAll());
    }

    public function getCategoriasConColores() {

        $sql = "SELECT a.anios, o.color, o.color2, o.texto, o.titulo, o.nombrePiedra, o.texto_extra, o.imagen FROM asistencia a
                LEFT JOIN opcionesCategorias o ON o.categoria=a.anios
                GROUP BY a.anios";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function registrarPin($codigoBarras, $estado) {
        $sql = "UPDATE asistencia SET entregaPin = :entregaPin WHERE codigoBarras=:codigoBarras";
        $query = $this->db->prepare($sql);
        $parameters = array(':entregaPin' => (int) $estado, ':codigoBarras' => $codigoBarras);
        $query->execute($parameters);
    }

    public function confirmarAsistencia($codigoBarras, $estado) {
        $sql = "UPDATE asistencia SET confirmacion = :confirmacion WHERE codigoBarras=:codigoBarras";
        $query = $this->db->prepare($sql);
        $parameters = array(':confirmacion' => (int) $estado, ':codigoBarras' => $codigoBarras);
        $query->execute($parameters);
    }

    public function registrarPersonas($codigoBarras, $personas) {
        $sql = "UPDATE asistencia SET numPersonas = :numPersonas WHERE codigoBarras=:codigoBarras";
        $query = $this->db->prepare($sql);
        $parameters = array(':numPersonas' => (int) $personas, ':codigoBarras' => $codigoBarras);
        $query->execute($parameters);
    }

    public function setAutoRefresh($estado) {
        $sql = "UPDATE opciones SET valor = " . $estado . " WHERE nombre='refresh'";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function getAutoRefresh() {
        $sql = "SELECT valor FROM opciones WHERE nombre='refresh'";
        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetch());
    }

    public function getHomenajeadosEmpresa($empresa) {
        $sql = "SELECT * FROM asistencia  WHERE empresa=:empresa ORDER BY nombresApellidos ASC";
        $query = $this->db->prepare($sql);
        $parameters = array(':empresa' => $empresa);
        $query->execute($parameters);

        return json_encode($query->fetchAll());
    }

    public function getHomenajeadosCategoria($categoria) {
        $sql = "SELECT * FROM asistencia  WHERE confirmacion=1 AND anios=:categoria AND empresa IN (:empresa) ORDER BY  nombresApellidos ASC";
        $query = $this->db->prepare($sql);
        $parameters = array(':empresa' => $empresa, ':categoria' => $categoria);
        $query->execute($parameters);

        return json_encode($query->fetchAll());
    }

    public function getEmpresas() {
        $sql = "SELECT * FROM asistencia WHERE asistencia = 1 GROUP BY empresa";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getCategoriaMayor() {

        $sql = "SELECT MAX(anios) as mayor FROM asistencia";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

}
