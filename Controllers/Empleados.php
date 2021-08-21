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
        if (isset($_POST['primera_dosis']))
            if(strtotime($_POST['primera_dosis']) > strtotime(date('2020-01-01')))
                $primera_dosis = $_POST['primera_dosis'];
        $segunda_dosis = $_POST['segunda_dosis'] ?? NULL;
        $puesto_laboral = $_POST['puesto_laboral'] ?? NULL;

        $empleados = new Empleados_model();
        $empleados->insert($primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$vacuna_id,$primera_dosis,$segunda_dosis,$puesto_laboral);
        $data["titulo"] = "Empleados";
        $this->index();
    }
}