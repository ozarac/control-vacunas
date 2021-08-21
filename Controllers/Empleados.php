<?php


class EmpleadosController
{
    public function __construct(){
        require_once "models/EmpleadosModel.php";
    }

    public function index()
    {

        $empleados = new Empleados_model();
        $data["titulo"] = "Empleados";
        $data["empleados"] = $empleados->get_empleados();

        require_once "views/empleados/empleados.php";
    }

    public function new(){
        $data["titulo"] = "Empleados";
        require_once "views/empleados/empleados_nuevo.php";
    }

    public function save(){
        $primer_nombre = $_POST['primer_nombre'] ?? NULL;
        $segundo_nombre = $_POST['segundo_nombre'] ?? NULL;
        $primer_apellido = $_POST['primer_apellido'] ?? NULL;
        $segundo_apellido = $_POST['segundo_apellido'] ?? NULL;
        $vacuna_id = $_POST['vacuna_id'] ?? NULL;
        $primera_dosis = NULL;
        if (isset($_POST['primera_dosis']) and $_POST['primera_dosis'] != '') {
            $date = $_POST['primera_dosis'];
            $date = str_replace('/', '-', $date);
            if (date('Y-m-d', strtotime($date)) > strtotime(date('2020-01-01')))
                $primera_dosis = date('Y-m-d', strtotime($date));
        }
        $segunda_dosis = $_POST['segunda_dosis'] ?? NULL;
        $puesto_laboral = $_POST['puesto_laboral'] ?? NULL;

        $empleados = new Empleados_model();
        $empleados->insert($primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$vacuna_id,$primera_dosis,$segunda_dosis,$puesto_laboral);
        $data["titulo"] = "Empleados";
        $this->index();
    }

    public function change($id){
        $empleados = new Empleados_model();
        $data["id"] = $id;
        $data["empleados"] = $empleados->get_empleado($id);
        $data["titulo"] = "Empleados";
        require_once "views/empleados/empleados_modifica.php";
    }

    public function update(){
        $id = $_POST['id'] ?? NULL;
        $primer_nombre = $_POST['primer_nombre'] ?? NULL;
        $segundo_nombre = $_POST['segundo_nombre'] ?? NULL;
        $primer_apellido = $_POST['primer_apellido'] ?? NULL;
        $segundo_apellido = $_POST['segundo_apellido'] ?? NULL;
        $vacuna_id = NULL;
        $primera_dosis = NULL;
        $segunda_dosis = NULL;
        if (isset($_POST['vacuna_id'])){
            if($_POST['vacuna_id'] != '' && $_POST['vacuna_id'] != 0){
                $vacuna_id = $_POST['vacuna_id'];
                if (isset($_POST['primera_dosis']) and $_POST['primera_dosis'] != '') {
                    $date = $_POST['primera_dosis'];
                    $date = str_replace('/', '-', $date);
                    if (date('Y-m-d', strtotime($date)) > strtotime(date('2020-01-01')))
                        $primera_dosis = date('Y-m-d', strtotime($date));
                }
                if (isset($_POST['segunda_dosis']) and $_POST['segunda_dosis'] != ''){
                    $date = $_POST['segunda_dosis'];
                    $date = str_replace('/','-',$date);
                    if(date('Y-m-d',strtotime($date)) > strtotime(date('2020-01-01')))
                        $segunda_dosis = date('Y-m-d',strtotime($date));
                }
            }
        }
        $puesto_laboral = $_POST['puesto_laboral'];
        $empleados = new Empleados_model();
        if ($id != NULL && $primer_nombre != NULL && $primer_apellido != NULL && $puesto_laboral != NULL)
            $empleados->update($primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$vacuna_id,$primera_dosis,$segunda_dosis,$puesto_laboral,$id);
        $data["titulo"] = "Empleados";
        $this->index();
    }

    public function delete($id){
        $empleados = new Empleados_model();
        $empleados->delete($id);
        $data["titulo"] = "Empleados";
        $this->index();
    }
}