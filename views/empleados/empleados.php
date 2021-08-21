<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Control de Vacunación COVID-19">
    <meta name="author" content="Stuart Carazo">
    <title>Control Vacunación COVID-19</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="assets/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<div class="col-lg-8 mx-auto p-3 py-md-5">
    <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
        <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
            <span style="font-size: 2.5em; margin-right: 10px;">
              <i class="fas fa-syringe"></i>
            </span>&nbsp;
            <h1>CONTROL DE VACUNACIÓN COVID-19</h1>
        </a>
    </header>
    <main>
        <div class="mb-5">
            <a href="index.php?c=empleados&a=new" class="btn btn-primary btn-lg px-4">
                <span style="margin-right: 10px;">
                  <i class="fas fa-plus"></i>
                </span>
                Registrar empleado
            </a>
        </div>
        <hr class="col-3 col-md-2 mb-5">
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-hover">
                    <caption>Lista de empleados</caption>
                    <thead class="table-light">
                    <th>Nombre</th>
                    <th>Puesto Laboral</th>
                    <th class="text-center">Nombre de vacuna</th>
                    <th class="text-center">Fecha primera dosis</th>
                    <th class="text-center">Fecha segunda dosis</th>
                    <th class="text-center">Estado de vacunación</th>
                    <th class="text-center">Acción</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Stuart Carazo</td>
                        <td>Programador de Sistemas</td>
                        <td class="text-center">Sputnik V</td>
                        <td class="text-center">08/07/2021</td>
                        <td class="text-center">08/10/2021</td>
                        <td class="text-center"><span class="badge bg-warning">En progreso</span></td>
                        <td class="text-center" style="white-space: nowrap;">
                            <div class="btn-group">
                                <span data-toggle="tooltip" title="Editar">
                                    <a class="btn btn-default" title="Editar"
                                       href="">
                                        <i class="fas fa-pencil-alt text-warning"></i>
                                    </a>
                                </span>
                                <span data-toggle="tooltip" title="Eliminar">
                                    <a class="btn btn-default" title="Eliminar"
                                       href="">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
                                </span>
                            </div>
                        </td>
                    </tr>
                        <?php
                            foreach($data["empleados"] as $item){
                                $estado = '';

                                if($item["segunda_dosis"] != NULL and strtotime($item["segunda_dosis"]) <= strtotime('today'))
                                    $estado = '<span class="badge bg-success">Protegido</span></td>';
                                else if ($item["primera_dosis"] != NULL and strtotime($item["primera_dosis"]) <= strtotime('today')){
                                    if ($item["segunda_dosis"] === NULL)
                                        $estado = '<span class="badge bg-success">Protegido</span></td>';
                                    else
                                        $estado = '<span class="badge bg-warning">En Progreso</span></td>';
                                }
                                else
                                    $estado = '<span class="badge bg-danger">En riesgo</span></td>';

                                if ($item["primera_dosis"] === NULL)
                                    $primera_dosis = 'N/A';
                                else
                                    $primera_dosis = date ('d/m/Y',strtotime($item["primera_dosis"]));
                                if ($item["segunda_dosis"] === NULL)
                                    $segunda_dosis = 'N/A';
                                else
                                    $segunda_dosis = date ('d/m/Y',strtotime($item["segunda_dosis"]));

                                echo "<tr>";
                                echo "<td>".$item["nombre"]."</td>";
                                echo "<td>".$item["puesto_laboral"]."</td>";
                                echo "<td class='text-center'>".$item["vacuna"]."</td>";
                                echo "<td class='text-center'>".$primera_dosis."</td>";
                                echo "<td class='text-center'>".$segunda_dosis."</td>";
                                echo "<td class='text-center'>".$estado."</td>";
                                echo "<td>"."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="pt-5 my-5 text-muted border-top">
        Stuart Carazo &middot; &copy; 2021
    </footer>
</div>


<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>