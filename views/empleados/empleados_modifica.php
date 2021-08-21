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

    <link href="assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

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
            <h1><strong>CONTROL DE VACUNACIÓN COVID-19</strong></h1>
        </a>
    </header>
    <main>
        <div class="mb-5">
            <h2>Actualizar empleado</h2>
        </div>
        <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
            <span style="margin-right: 10px; color:#0a53be;">
              <i class="fas fa-arrow-left"></i>
            </span>&nbsp;
            <h5 style="color: #0a53be;">Regresar</h5>
        </a>
        <hr class="col-3 col-md-2 mb-5">
        <div class="container-fluid">
            <form class="row g-3 js-validate-empleado needs-validation" id="update" name="update" method="POST" action="index.php?c=empleados&a=update" autocomplete="off" novalidate>
                <input type="hidden" id="id" name="id" value="<?php echo $data['id'] ?>">
                <div class="col-md-6">
                    <label for="primer_nombre" class="form-label" >Primer nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="<?php echo $data['empleados']['primer_nombre'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="segundo_nombre" class="form-label">Segundo nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="<?php echo $data['empleados']['segundo_nombre'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="primer_apellido" class="form-label">Primer apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?php echo $data['empleados']['primer_apellido'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="primer_apellido" class="form-label">Primer apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="segundo_apellido" value="<?php echo $data['empleados']['segundo_apellido'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="puesto_laboral" class="form-label">Puesto laboral</label>
                    <input type="text" class="form-control" id="puesto_laboral" name="puesto_laboral" value="<?php echo $data['empleados']['puesto_laboral'] ?>" required>
                </div>
                <div class="col-md-12">
                    <label for="vacuna_id" class="form-label">Vacuna</label>
                    <select id="vacuna_id" name="vacuna_id" class="form-select" aria-label="Seleccionar vacuna" required>
                        <option value="" selected>Seleccionar vacuna</option>
                        <option value="1" <?php if ($data['empleados']['vacuna_id'] == 1) echo 'selected'?>>Sinopharm</option>
                        <option value="2" <?php if ($data['empleados']['vacuna_id'] == 2) echo 'selected'?>>AstraZeneca</option>
                        <option value="3" <?php if ($data['empleados']['vacuna_id'] == 3) echo 'selected'?>>Sputnik V</option>
                        <option value="4" <?php if ($data['empleados']['vacuna_id'] == 4) echo 'selected'?>>Pfizer</option>
                        <option value="5" <?php if ($data['empleados']['vacuna_id'] == 5) echo 'selected'?>>Moderna</option>
                        <option value="6" <?php if ($data['empleados']['vacuna_id'] == 6) echo 'selected'?>>Janssen</option>
                        <option value="0" <?php if ($data['empleados']['vacuna_id'] == NULL) echo 'selected'?>>Ninguna</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="primera_dosis" class="form-label">Fecha primera dosis</label>
                    <input type="text" class="form-control datepicker" id="primera_dosis" name="primera_dosis" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="<?php if($data['empleados']['primera_dosis'] != NULL or $data['empleados']['primera_dosis'] != '') echo date('d/m/Y',strtotime($data['empleados']['primera_dosis'])) ?>" data-date-start-date="01/01/2020" data-date-end-date="0d">
                </div>
                <div class="col-md-6">
                    <label for="segunda_dosis" class="form-label">Fecha segunda dosis</label>
                    <input type="text" class="form-control datepicker" id="segunda_dosis" name="segunda_dosis" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="<?php if($data['empleados']['segunda_dosis'] != NULL or $data['empleados']['segunda_dosis'] != '') echo  date('d/m/Y',strtotime($data['empleados']['segunda_dosis'])) ?>" data-date-start-date="01/01/2020">
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-md  btn-warning" type="submit" name="update" id="update" >
                        Actualizar empleado
                    </button>
                </div>
            </form>
        </div>
    </main>
    <footer class="pt-5 my-5 text-muted border-top">
        Stuart Carazo &middot; &copy; 2021
    </footer>
</div>



<script src="assets/jquery/jquery-3.6.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script src="assets/jquery-validator/jquery.validate.min.js"></script>
<script src="assets/jquery-validator/localization/messages_es.min.js" charset="UTF-8"></script>

<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'es'
    });
</script>
<script>
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<script>
    $.validator.addMethod("minDate", function(e) {
        var maxDate = $('#primera_dosis').datepicker("getDate");
        var minDate = $('#segunda_dosis').datepicker("getDate");
        console.log(minDate);
        console.log(maxDate);
        if (minDate != null  ) {
            if (minDate <= maxDate){
                console.log('falso');
                return false;
            }
            return true;
        }
        return true;
    });

    $("#update").validate({
        highlight: function(element, errorClass) {
            $(element).fadeOut(function() {
                $(element).fadeIn();
            });
        },
        submitHandler: function(form){
            form.submit();
            $("button").attr('disabled','disabled');
        },
        rules: {
            'segunda_dosis': {
                required: false,
                minDate: true
            }
        },
        messages: {
            'segunda_dosis': {
                minDate: 'Por favor ingrese una fecha mayor a primera dosis.'
            }
        }
    });
</script>


</body>
</html>