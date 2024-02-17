<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./registro.css">


</head>
<scroll-container>
    <scroll-page id="agendar"></scroll-page>
</scroll-container>

<body class="fondo"><a class="btn btn-primary atras" href="./index.php" role="button">⬅</a>
    <div class="contenedor-inicio">

        <div class="filtro-fechas">
            <P class="contenedor-letras-calendario">CONSULTAR CALENDARIO</P>
            <form class="formulario" method="GET">
                <div class="imputs">
                    <label class="label-anio">AÑO:</label>
                    <select name="seleccionAnio">
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                    <label class="label-mes">Mes:</label>
                    <select name="mes">
                        <option value="enero">enero</option>
                        <option value="febrero">febrero</option>
                        <option value="marzo">marzo</option>
                        <option value="mayo">mayo</option>
                        <option value="abril">abril</option>
                        <option value="junio">junio</option>
                        <option value="julio">julio</option>
                        <option value="agosto">agosto</option>
                        <option value="septiembre">septiembre</option>
                        <option value="octubre">octubre</option>
                        <option value="noviembre">noviembre</option>
                        <option value="diciembre">diciembre</option>
                    </select>
                </div>
                <div class="contenedor-btn-filtrar">
                    <button type="submit" class="btn-crear">FILTRAR</button>
                </div>
            </form>
        </div>


        <form class="fomulario-citas" method="POST" id="form-filter">
            <P class="contenedor-letras-agendar-turno">AGENDAR TURNO</P>
            <div class="form">
                <label for="">FECHA</label>
                <input type="date" id="fecha" name="fecha" class="imputs-formulario-citas">
                <label for="">NOMBRE Y APELLIDO</label>
                <input type="text" id="nombre-y-apellido" name="nombre_y_apellido" class="imputs-formulario-citas">
                <label for="">HORARIO</label>
                <select name="horario">
                    <option value="00">00:00</option>
                    <option value="01">01:00</option>
                    <option value="02">02:00</option>
                    <option value="03">03:00</option>
                    <option value="04">04:00</option>
                    <option value="05">05:00</option>
                    <option value="06">06:00</option>
                    <option value="07">07:00</option>
                    <option value="08">08:00</option>
                    <option value="09">09:00</option>
                    <option value="10">10:00</option>
                    <option value="11">11:00</option>
                    <option value="12">12:00</option>
                    <option value="13">13:00</option>
                    <option value="14">14:00</option>
                    <option value="15">15:00</option>
                    <option value="16">16:00</option>
                    <option value="17">17:00</option>
                    <option value="18">18:00</option>
                    <option value="19">19:00</option>
                    <option value="20">20:00</option>
                    <option value="21">21:00</option>
                    <option value="22">22:00</option>
                    <option value="23">23:00</option>
                    <option value="24">24:00</option>
                </select>
                <label for="">CONTACTO</label>
                <input type="text" id="horario" name="contacto" class="imputs-contacto-citas">
                <label for="">MOTIVO</label>
                <textarea name="motivo" id="motivo" cols="19" rows="1" class="imputs-formulario-citas"></textarea>
            </div>
            <div class="contenedor-btn-filtrar">
                <button type="submit" class="btn-crear">CREAR</button>
            </div>
        </form>
        <scroll-container>
            <scroll-page id="borrar-turno"></scroll-page>
        </scroll-container>
        <form method="GET" class="fomulario-citas form-borrar">
            <P class="contenedor-letras-agendar-turno">ELIMINAR TURNO</P>
            <label>NOMBRE Y APELLIDO: </label>
            <input type="text" id="nombre-borrar" placeholder="Juan Perez">
            <label>FECHA DE TURNO: </label>
            <input name="fechaEliminar" type="date">
            <label>HORARIO: </label>
            <select name="horario-eliminar">
                <option value="00">00:00</option>
                <option value="01">01:00</option>
                <option value="02">02:00</option>
                <option value="03">03:00</option>
                <option value="04">04:00</option>
                <option value="05">05:00</option>
                <option value="06">06:00</option>
                <option value="07">07:00</option>
                <option value="08">08:00</option>
                <option value="09">09:00</option>
                <option value="10">10:00</option>
                <option value="11">11:00</option>
                <option value="12">12:00</option>
                <option value="13">13:00</option>
                <option value="14">14:00</option>
                <option value="15">15:00</option>
                <option value="16">16:00</option>
                <option value="17">17:00</option>
                <option value="18">18:00</option>
                <option value="19">19:00</option>
                <option value="20">20:00</option>
                <option value="21">21:00</option>
                <option value="22">22:00</option>
                <option value="23">23:00</option>
                <option value="24">24:00</option>
            </select>
            <div class="contenedor-btn-filtrar">
                <button type="submit" class="btn-borrar-cita">ELIMINAR CITA</button>
            </div>

        </form>
        <?php
        error_reporting(0);
        require_once("./eliminar.php"); ?>
        <!-- Formulario para eliminar citas -->

        <table class="tabla-citas">
            <?php

            if ($_POST) {
                error_reporting(0);
                $dfecha = $_POST['fecha'];
                $nYa = $_POST["nombre_y_apellido"];
                $motivo = $_POST['motivo'];
                $hs = $_POST['horario'];
                $contacto = $_POST['contacto'];
                $dateForm = "";
                $mesesNumero = "";
                if (intval($dfecha) > 10) {
                    $dateForm = $dfecha[5] . $dfecha[6];
                } else {
                    $dateForm = $dfecha[5] . $dfecha[6];
                }
                ;
                $nombreMeses = "";
                switch ($dateForm) {
                    case '01':
                        $nombreMeses = "enero";
                        $mesesNumero = 0;
                        break;
                    case '02':
                        $nombreMeses = "febrero";
                        $mesesNumero = 1;
                        break;
                    case '03':
                        $nombreMeses = "marzo";
                        $mesesNumero = 2;
                        break;
                    case '04':
                        $nombreMeses = "abril";
                        $mesesNumero = 3;
                        break;
                    case '05':
                        $nombreMeses = "mayo";
                        $mesesNumero = 4;
                        break;
                    case '06':
                        $nombreMeses = "junio";
                        $mesesNumero = 5;
                        break;
                    case '07':
                        $nombreMeses = "julio";
                        $mesesNumero = 6;
                        break;
                    case '08':
                        $nombreMeses = "agosto";
                        $mesesNumero = 7;
                        break;
                    case '09':
                        $nombreMeses = "septiembre";
                        $mesesNumero = 8;
                        break;
                    case '10':
                        $nombreMeses = "octubre";
                        $mesesNumero = 9;
                        break;
                    case '11':
                        $nombreMeses = "noviembre";
                        $mesesNumero = 10;
                        break;
                    case "12":
                        $nombreMeses = "diciembre";
                        $mesesNumero = 11;
                        break;
                }

                if ($dfecha === "" || $nYa === "" || $hs === "" || $dfecha === null || $nYa === null || $hs === null) {
                    echo '<p class="error-crear-paciente">⚠️ Los campos "FECHA" ,"NOMBRE Y APELLIDO" y "HORAIO" son obligatorios.</p>';
                } else {
                    $datosForm = array(
                        $nombreMeses => array(
                            $dateForm => array(
                                $hs => array(
                                    $dfecha,
                                    $nYa,
                                    $motivo,
                                    $hs,
                                    $contacto
                                )
                            )
                        )
                    );

                    $datosArray = file_get_contents('../src/script/citas.json', true);
                    $datosJson = json_decode($datosArray, true);

                    if ($datosJson[intval($mesesNumero)][$nombreMeses]) {
                        if ($datosJson[intval($mesesNumero)][$nombreMeses][$dateForm]) {
                            array_push($datosJson[intval($mesesNumero)][$nombreMeses][$dateForm], $datosForm[$nombreMeses][$dateForm][$hs]);
                        } else {
                            array_push($datosJson[intval($mesesNumero)][$nombreMeses], $datosForm[$nombreMeses][$dateForm]);
                        }
                    } else {
                        array_push($datosJson, $datosForm);
                    }

                    // Guardar en el archivo JSON las citas agregadas
                    file_put_contents('../src/script/citas.json', json_encode($datosJson));
                }



            }


            $fichero = file_get_contents('../src/script/calendario.json', true);
            $datosDB = json_decode($fichero, true);
            $respuesta = $datosDB[0]["2024"];
            error_reporting(0);


            //print_r($respuesta);
            foreach ($respuesta as $anios) {

                //print_r($anios);
                $meses = "";
                $lugar = "";

                if ($anios[8] == "Enero") {
                    $meses = "enero";
                    $lugar = 0;
                }
                if ($anios[8] == "Febrero") {
                    global $meses;
                    $meses = "febrero";
                    $lugar = 1;
                }
                if ($anios[8] == "Marzo") {
                    $meses = "marzo";
                    $lugar = 2;
                }
                if ($anios[8] == "Mayo") {
                    $meses = "mayo";
                    $lugar = 3;
                }
                if ($anios[8] == "Abril") {
                    $meses = "abril";
                    $lugar = 4;
                }
                if ($anios[8] == "Junio") {
                    $meses = "junio";
                    $lugar = 5;
                }
                if ($anios[8] == "Julio") {
                    $meses = "julio";
                    $lugar = 6;
                }
                if ($anios[8] == "Agosto") {
                    $meses = "agosto";
                    $lugar = 7;
                }
                if ($anios[8] == "Septiembre") {
                    $meses = "septiembre";
                    $lugar = 8;
                }
                if ($anios[8] == "Octubre") {
                    $meses = "octubre";
                    $lugar = 9;
                }
                if ($anios[8] == "Noviembre") {
                    $meses = "noviembre";
                    $lugar = 10;
                }
                if ($anios[8] == "Diciembre") {
                    $meses = "diciembre";
                    $lugar = 11;
                }
                ;

                //echo (implode(",", $meses));
                $ficherocita = file_get_contents('../src/script/citas.json', true);
                $citasDB = json_decode($ficherocita, true);
                $cita = $citasDB[0]["enero"]["1"]["9"][0];

                if ($_GET) {
                    require_once("./filtrar.php");
                } else {
                    ?>

            <tr class="letra-mes">
                <th class="tabla-vacia"></th>
                <th class="tabla-vacia"></th>
                <th class="tabla-vacia"></th>
                <th class="mes">
                    <?php echo $anios[8]; ?>
                </th>
                <th class="tabla-vacia"></th>
                <th class="tabla-vacia"></th>
                <th class="tabla-vacia"></th>

            </tr>
            <tr>
                <th class="nombre-dia"><?php echo $anios[0]; ?></th>
                <th class="nombre-dia"><?php echo $anios[1]; ?></th>
                <th class="nombre-dia"><?php echo $anios[2]; ?></th>
                <th class="nombre-dia"><?php echo $anios[3]; ?></th>
                <th class="nombre-dia"><?php echo $anios[4]; ?></th>
                <th class="nombre-dia"><?php echo $anios[5]; ?></th>
                <th class="nombre-dia"><?php echo $anios[6]; ?></th>

            </tr>

            <tr id="semana"><?php for ($u = 1; $u < 8; $u++) { ?>
                <td>
                    <div class="dia-fecha"><?php echo $u; ?></div><br><?php for ($i = 0; $i < 24; $i++) {
                                       $nuevoi = "0" . $i; ?>
                    <div class="contenedor-consulta">
                        <div class="hora-turno"><?php echo $i . ":00 hs";
                                        ?></div><?php if ($citasDB[$lugar][$meses][$u][$nuevoi][1] == null) { ?>


                        <div class="contenedor-libre"> <?php echo "libre"; ?><div class="contenedor-btn">
                                <button class="btn-agendar">
                                    <nav>
                                        <a id="nav-btn-agregar" href="#agendar"> agendar </a>
                                    </nav>
                                </button>
                            </div>
                        </div><?php
                                            ;
                                        } else { ?>

                        <div class="contenedor-ocupado">
                            <div class="numero-contacto"><?php echo $citasDB[$lugar][$meses][$u][$nuevoi][1]; ?>
                                <br>Contacto: <?php echo $citasDB[$lugar][$meses][$u][$nuevoi][4];
                                                    ; ?><br>Motivo: <?php echo $citasDB[$lugar][$meses][$u][$nuevoi][2];
                                                     ; ?>
                            </div>

                            <div class="contenedor-btn"><button class="btn-borrar">
                                    <a href="#borrar-turno">borrar</a></button>
                            </div>
                        </div>
                        <?php }
                                        ; ?>
                    </div>
    </div><?php }
                                   ; ?>
    </td>
    <?php }
                    ; ?>
    </tr>
    <tr id="semana">
        <?php for ($u = 8; $u < 15; $u++) { ?>
        <td>
            <div class="dia-fecha"><?php echo $u; ?></div><br><?php for ($i = 0; $i < 24; $i++) { ?>
            <div class="contenedor-consulta">
                <div class="hora-turno"><?php echo $i . ":00 hs";
                                ?></div><?php if ($citasDB[$lugar][$meses][$u][$i][1] == null) { ?>
                <div class="contenedor-libre"> <?php echo "libre"; ?>
                    <div class="contenedor-btn">
                        <button class="btn-agendar">
                            <nav>
                                <a id="nav-btn-agregar" href="#agendar"> agendar </a>
                            </nav>
                        </button>
                    </div>
                </div><?php
                                } else { ?>

                <div class="contenedor-ocupado"><?php echo $citasDB[$lugar][$meses][$u][$i][1];
                                    ; ?> <div class="numero-contacto">Contacto: <?php echo $citasDB[$lugar][$meses][$u][$i][4];
                                      ; ?><br>Motivo: <?php echo $citasDB[$lugar][$meses][$u][$nuevoi][2];
                                       ; ?></div>

                    <div class="contenedor-btn">
                        <button class="btn-borrar">
                            <a href="#borrar-turno">borrar</a></button>
                    </div>
                </div><?php }
                                ; ?>
            </div><?php }
                           ; ?>
        </td>
        <?php }
                ; ?>
    </tr>
    <tr id="semana" class="semana">
        <?php for ($u = 15; $u < 22; $u++) { ?>
        <td>
            <div class="dia-fecha"><?php echo $u; ?></div><br><?php for ($i = 0; $i < 24; $i++) { ?>
            <div class="contenedor-consulta">
                <div class="hora-turno"><?php echo $i . ":00 hs";
                                ; ?></div><?php if ($citasDB[$lugar][$meses][$u][$i][1] == null) { ?>
                <div class="contenedor-libre"> <?php echo "libre"; ?><div class="contenedor-btn">
                        <button class="btn-agendar">
                            <nav>
                                <a id="nav-btn-agregar" href="#agendar"> agendar </a>
                            </nav>
                        </button>
                    </div>
                </div><?php
                                 } else { ?>

                <div class="contenedor-ocupado"><?php echo $citasDB[$lugar][$meses][$u][$i][1];
                                    ; ?> <div class="numero-contacto">Contacto: <?php echo $citasDB[$lugar][$meses][$u][$i][4];
                                      ; ?><br>Motivo:<?php echo $citasDB[$lugar][$meses][$u][$nuevoi][2];
                                       ; ?></div>

                    <div class="contenedor-btn">
                        <button class="btn-borrar">
                            <a href="#borrar-turno">borrar</a></button>
                    </div>
                </div><?php }
                                 ; ?>
            </div><?php }
                           ; ?>
        </td>
        <?php }
                ; ?>
    </tr>
    <tr id="semana" class="semana">
        <?php for ($u = 22; $u < 29; $u++) { ?>
        <td>
            <div class="dia-fecha"><?php echo $u; ?></div><br><?php for ($i = 0; $i < 24; $i++) { ?>
            <div class="contenedor-consulta">
                <div class="hora-turno"><?php echo $i . ":00 hs";
                                ; ?></div><?php if ($citasDB[$lugar][$meses][$u][$i][1] == null) { ?>
                <div class="contenedor-libre"> <?php echo "libre"; ?><div class="contenedor-btn">
                        <button class="btn-agendar">
                            <nav>
                                <a id="nav-btn-agregar" href="#agendar"> agendar </a>
                            </nav>
                        </button>
                    </div>
                </div><?php
                                 } else { ?>

                <div class="contenedor-ocupado"><?php echo $citasDB[$lugar][$meses][$u][$i][1];
                                    ; ?> <div class="numero-contacto">Contacto: <?php echo $citasDB[$lugar][$meses][$u][$i][4];
                                      ; ?><br>Motivo: <?php echo $citasDB[$lugar][$meses][$u][$nuevoi][2];
                                       ; ?></div>

                    <div class="contenedor-btn">
                        <button class="btn-borrar">
                            <nav>
                                <button class="btn-borrar">
                                    <a href="#borrar-turno">borrar</a></button>
                            </nav>
                        </button>
                    </div>
                </div><?php }
                                 ; ?>
            </div><?php }
                           ; ?>
        </td>
        <?php }
                ; ?>
    </tr>
    <tr id="semana" class="semana">
        <?php for ($u = 29; $u < 32; $u++) { ?>
        <td>
            <div class="dia-fecha"><?php echo $u; ?></div><br><?php for ($i = 0; $i < 24; $i++) { ?>
            <div class="contenedor-consulta">
                <div class="hora-turno"><?php echo $i . ":00 hs";
                                ; ?></div><?php if ($citasDB[$lugar][$meses][$u][$i][1] == null) { ?>
                <div class="contenedor-libre"> <?php echo "libre"; ?><div class="contenedor-btn">
                        <button class="btn-agendar">
                            <nav>
                                <a id="nav-btn-agregar" href="#agendar"> agendar </a>
                            </nav>
                        </button>
                    </div>
                </div><?php
                                 } else { ?>

                <div class="contenedor-ocupado"><?php echo $citasDB[$lugar][$meses][$u][$i][1];
                                    ; ?> <div class="numero-contacto">Contacto: <?php echo $citasDB[$lugar][$meses][$u][$i][4];
                                      ; ?><br>Motivo: <?php echo $citasDB[$lugar][$meses][$u][$nuevoi][2];
                                       ; ?></div>

                    <div class="contenedor-btn">
                        <<button class="btn-borrar">
                            <a href="#borrar-turno">borrar</a></button>
                    </div>
                </div><?php }
                                 ; ?>
            </div><?php }
                           ; ?>
        </td>
        <?php }
                ; ?>
    </tr><?php
                }
                ;
            }
            ; ?>
    </table>
    </div>
</body>

</html>