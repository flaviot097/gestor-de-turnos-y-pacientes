<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
</head>

<body class="fondo">
    <div class="registros">
        <a class="btn btn-primary atras" href="./index.php" role="button">⬅</a>
        <div class="separador-cuerpo">
            <form class="formulario-actualizar" method="POST">
                <div class="filtrar">
                    <label for="nombre y apelido" class="label-nombre">NOMBRE Y APELLIDO:</label>
                    <input type="text" id="nombre-y-apellido" placeholder="Juan perez" name="nombre">
                </div>
                <div class="contenedor-btn-filtrar-actualizar">
                    <button type="submit" class="btn-filtrar-actualizar">Buscar</button>
                </div>
            </form>
            <div class="container-table">
                <?php
                if ($_POST) {

                    if ($_POST['nombre'] === "") {
                        echo '<p class="error">⚠️ No ha ingresado un nada en campo "NOMBRE Y APRLLIDO".</p>';
                    } else {

                        $nombre = $_POST['nombre'];
                        $fichero = file_get_contents('../src/script/db.json', true);
                        $datosDB = json_decode($fichero, true);


                        foreach ($datosDB as $data) {
                            if ($nombre === $data['nombre_y_apellido']) { ?>
                                <table class="tabla-datos actualizar-paciente">
                                    <tr>
                                        <th>DNI</th>
                                        <th>NOMBRE Y APELLIDO</th>
                                        <th>FECHA DE NACIMIENTO</th>
                                        <th>DESCRIPCION</th>
                                        <th>actualizar</th>
                                    </tr>
                                    <tr id="<?php echo $data['dni']; ?>">
                                        <td><?php echo $data['dni']; ?></td>
                                        <td><?php echo $data['nombre_y_apellido']; ?></td>
                                        <td><?php echo $data['fecha_nacimiento']; ?></td>
                                        <td><?php echo $data['descripcion']; ?></td>
                                        <td><button class="btn-actualizar">actualiizar</button>
                                        </td>
                                    </tr>

                                </table>
                            <?php }
                            ;
                        }
                        ;
                    } ?>
                    <?php
                } else {
                    $fichero = file_get_contents('../src/script/db.json', true);
                    $datosDB = json_decode($fichero, true);
                    foreach ($datosDB as $dato) { ?>
                        <table class="tabla-datos actualizar-paciente">
                            <tr>
                                <th>DNI</th>
                                <th>NOMBRE Y APELLIDO</th>
                                <th>FECHA DE NACIMIENTO</th>
                                <th>DESCRIPCION</th>
                                <th>actualizar</th>
                            </tr>
                            <tr id="<?php echo $dato['dni']; ?>">
                                <td><?php echo $dato['dni']; ?></td>
                                <td><?php echo $dato['nombre_y_apellido']; ?></td>
                                <td><?php echo $dato['fecha_nacimiento']; ?></td>
                                <td><?php echo $dato['descripcion']; ?></td>
                                <td><button class="btn-actualizar"><a class="actualizar-paciente"
                                            href="./boa-paciente.php">actualiizar</a></button>
                                </td>
                            </tr>
                        </table>
                        <?php
                    }
                    ;
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>