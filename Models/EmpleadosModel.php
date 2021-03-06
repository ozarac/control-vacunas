<?php

class Empleados_model{

    private $db;
    private $empleados;
    private $vacunas;

    public function __construct(){
        $this->db = Database::connect();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->empleados = [];
        $this->vacunas = [];
    }

    public function get_empleados(){
        $sql = "SELECT 
                    empleado.id , 
                    CONCAT(primer_nombre,' ', segundo_nombre,' ', primer_apellido,' ', segundo_apellido) AS nombre, 
                    vacuna_id,
                    vacuna.nombre as vacuna,
                    primera_dosis, 
                    segunda_dosis, 
                    puesto_laboral 
                FROM empleado
                LEFT JOIN vacuna on empleado.vacuna_id = vacuna.id";
        $r = $this->db->prepare($sql);
        $r->execute();
        $resultado = $r->fetchAll();
        foreach($resultado as $row){
            $this->empleados[] = $row;
        }
        return $this->empleados;
    }

    public function get_empleado($id){
        $sql = "SELECT TOP(1)
                    empleado.id , 
                    primer_nombre,
                    segundo_nombre,
                    primer_apellido,
                    segundo_apellido,
                    vacuna_id,
                    vacuna.nombre as vacuna,
                    primera_dosis, 
                    segunda_dosis, 
                    puesto_laboral 
                FROM empleado
                LEFT JOIN vacuna on empleado.vacuna_id = vacuna.id
                WHERE empleado.id = ?";
        $r = $this->db->prepare($sql);
        $r->execute(array($id));
        $empleado = $r->fetch(PDO::FETCH_ASSOC);
        return $empleado;
    }

    public function get_vacunas(){
        $sql = "SELECT 
                    id,
                    nombre,
                    dosis_cantidad,
                    dosis_intervalo_dias
                FROM vacuna";
        $r = $this->db->prepare($sql);
        $r->execute();
        $resultado = $r->fetchAll();
        foreach($resultado as $row){
            $this->vacunas[] = $row;
        }
        return $this->empleados;
    }

    public function insert($primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$vacuna_id,$primera_dosis,$segunda_dosis,$puesto_laboral){
        $sql = "INSERT INTO empleado(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, vacuna_id, primera_dosis, segunda_dosis,puesto_laboral) VALUES (?,?,?,?,?,?,?,?)";
        try {
            $this->db->beginTransaction();
            $i = $this->db->prepare($sql);
            $i->execute(array($primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$vacuna_id,$primera_dosis,$segunda_dosis,$puesto_laboral));
            $empleado_id = $this->db->lastInsertId();
            $this->db->commit();
            return $empleado_id;
        }catch (Exception $ex){
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }
            echo $ex;
        }
    }

    public function update($primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$vacuna_id,$primera_dosis,$segunda_dosis,$puesto_laboral,$id){
        $sql = "UPDATE empleado SET primer_nombre = ?, segundo_nombre = ?, primer_apellido = ?, segundo_apellido = ?, vacuna_id = ?, primera_dosis = ?, segunda_dosis = ?,puesto_laboral = ? WHERE id = ?";
        try {
            $this->db->beginTransaction();
            $i = $this->db->prepare($sql);
            $i->execute(array($primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$vacuna_id,$primera_dosis,$segunda_dosis,$puesto_laboral,$id));
            $this->db->commit();
        }catch (Exception $ex){
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }
            echo $ex;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM empleado  WHERE id = ?";
        try {
            $this->db->beginTransaction();
            $i = $this->db->prepare($sql);
            $i->execute(array($id));
            $this->db->commit();
        }catch (Exception $ex){
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }
            echo $ex;
        }
    }

}