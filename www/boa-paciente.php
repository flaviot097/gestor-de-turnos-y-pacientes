<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./index.css">

</head>

<body class="fondo"><a class="btn btn-primary atras" href="./actualizar_paciente.php" role="button">⬅</a>
    <div class="contenedor-fomulario form-crear-paciente">
        <div class="letras-form-boa-paciente">ACTUALIZAR DATOS DEL PACIENTE</div>

        <form class="formulario" method="POST">
            <div class="imputs">
                <label for="nombre y apelido" class="label-nombre form-crear-paciente">NOMBRE Y APELLIDO:</label>
                <input type="text" id="nombre-apellido" placeholder="Juan perez" name="nombre">
                <label for="dni" class="label-nombre form-crear-paciente">DNI:</label>
                <input type="text" id="dni" placeholder="40123456" name="dni">
                <label for="fecha de nacimiento" class="label-nombre form-crear-paciente">FECHA DE NACIMIENTO:</label>
                <input type="date" id="fecha-nacimiento" placeholder="09/12/2018" name="fecha">
                <label for="nombre y apelido" class="label-nombre form-crear-paciente">DESCRIPCION:</label>
                <textarea name="descripcion" id="descripcion" cols="40" rows="16"></textarea>
            </div>
            <div class="contenedor-btn-filtrar">
                <button type="submit" class="btn-crear">CREAR</button>
            </div>
        </form>
    </div>
    <?php
    if ($_POST) {



        $dni = $_POST['dni'];
        $nombreyApellido = $_POST["nombre"];
        $fechanacimiento = $_POST['fecha'];
        $descripcion = $_POST['descripcion'];
        if ($dni === "" || $nombreyApellido === "" || $fechanacimiento === "" || $descripcion === "") {
            echo '<p class="error-crear-paciente">⚠️ Todos los campos son obligatorios.</p>';
        } else {

            $datosForm = array(
                "dni" => $dni,
                "nombre_y_apellido" => $nombreyApellido,
                "fecha_nacimiento" => $fechanacimiento,
                "descripcion" => $descripcion
            );

            $datosArray = file_get_contents('../src/script/db.json', true);
            $datosJson = json_decode($datosArray, true);
            $i = 0;
            echo '<div class="letras-form-boa-paciente">ACTUALIZAR DATOS DEL PACIENTE</div>';
            foreach ($datosJson as $value) {
                $i + 1;
                if ($value["dni"] == $dni || $value["nombre_y_apellido"] == $nombreyApellido || $value["fecha_nacimiento"] == $fechanacimiento) {
                    var_dump($value);
                    if ($value['dni'] !== $dni || $value["nombre_y_apellido"] !== $nombreyApellido || $value["fecha_nacimiento"] !== $fechanacimiento || $value["descripcion"] !== $descripcion) {
                        unset($datosJson[$i]);
                    }
                    ;



                }
                ;


                ;
            }
            ;
            array_push($datosJson, $datosForm);
            file_put_contents('../src/script/db.json', json_encode($datosJson));
        }
    }
    ;

    ?>
</body>

</html>