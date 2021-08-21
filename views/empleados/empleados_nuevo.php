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
            <h2>Registrar empleado</h2>
        </div>
        <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
            <span style="margin-right: 10px; color:#0a53be;">
              <i class="fas fa-arrow-left"></i>
            </span>&nbsp;
            <h5 style="color: #0a53be;">Regresar</h5>
        </a>
        <hr class="col-3 col-md-2 mb-5">
        <div class="container-fluid">
            <form class="row g-3" id="save" name="save" method="POST" action="index.php?c=empleados&a=save" autocomplete="off">
                <div class="col-md-6">
                    <label for="primer_nombre" class="form-label" >Primer nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
                </div>
                <div class="col-md-6">
                    <label for="segundo_nombre" class="form-label">Segundo nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
                </div>
                <div class="col-md-6">
                    <label for="primer_apellido" class="form-label">Primer apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
                </div>
                <div class="col-md-6">
                    <label for="primer_apellido" class="form-label">Primer apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="segundo_apellido">
                </div>
                <div class="col-md-12">
                    <label for="puesto_laboral" class="form-label">Puesto laboral</label>
                    <input type="text" class="form-control" id="puesto_laboral" name="puesto_laboral" required>
                </div>
                <div class="col-md-12">
                    <label for="vacuna_id" class="form-label">Vacuna</label>
                    <select id="vacuna_id" name="vacuna_id" class="form-select" aria-label="Seleccionar vacuna" required>
                        <option disabled selected>Seleccionar vacuna</option>
                        <option value="1">Sinopharm</option>
                        <option value="2">AstraZeneca</option>
                        <option value="3">Sputnik V</option>
                        <option value="4">Pfizer</option>
                        <option value="5">Moderna</option>
                        <option value="6">Janssen</option>
                        <option value="">Ninguna</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="primera_dosis" class="form-label">Fecha primera dosis</label>
                    <input type="date" class="form-control" id="primera_dosis" name="primera_dosis" min="<?php echo date('2020-01-01'); ?>" max="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-md  btn-success" type="submit" name="registrar" id="registrar" >
                        Registrar empleado
                    </button>
                </div>
            </form>
        </div>

    </main>
    <footer class="pt-5 my-5 text-muted border-top">
        Stuart Carazo &middot; &copy; 2021
    </footer>
</div>


<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>