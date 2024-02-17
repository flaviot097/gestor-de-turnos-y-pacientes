<?php
if ($_GET) {
    $ficherocita = file_get_contents('../src/script/citas.json', true);
    $citasDB = json_decode($ficherocita, true);

    if ($_GET["seleccionAnio"] == "2024") {
        $respuesta = $datosDB[0]["2024"];
    } elseif ($_GET["seleccionAnio"] == "2025") {
        $respuesta = $datosDB[0]["2025"];
    }
    ;
    $mesResp;
    $respuestaMesForm;

    //mes
    $meses = "";
    $lugar = "";

    if ($_GET["mes"] == "enero") {
        $meses = "enero";
        $lugar = 0;
    }
    if ($_GET["mes"] == "febrero") {
        global $meses;
        $meses = "febrero";
        $lugar = 1;
    }
    if ($_GET["mes"] == "marzo") {
        $meses = "marzo";
        $lugar = 2;
    }
    if ($_GET["mes"] == "mayo") {
        $meses = "mayo";
        $lugar = 3;
    }
    if ($_GET["mes"] == "abril") {
        $meses = "abril";
        $lugar = 4;
    }
    if ($_GET["mes"] == "junio") {
        $meses = "junio";
        $lugar = 5;
    }
    if ($_GET["mes"] == "julio") {
        $meses = "julio";
        $lugar = 6;
    }
    if ($_GET["mes"] == "agosto") {
        $meses = "agosto";
        $lugar = 7;
    }
    if ($_GET["mes"] == "septiembre") {
        $meses = "septiembre";
        $lugar = 8;
    }
    if ($_GET["mes"] == "octubre") {
        $meses = "octubre";
        $lugar = 9;
    }
    if ($_GET["mes"] == "noviembre") {
        $meses = "noviembre";
        $lugar = 10;
    }
    if ($_GET["mes"] == "diciembre") {
        $meses = "diciembre";
        $lugar = 11;
    }
    ;
    error_reporting(0);
    //
    if ($_GET["mes"]) {
        $mesResp = $_GET["mes"];
        $filtroTable = $respuesta[$mesResp];
    }
    ; ?>
<tr class="letra-mes">
    <th class="tabla-vacia"></th>
    <th class="tabla-vacia"></th>
    <th class="tabla-vacia"></th>
    <th class="mes">
        <?php echo strtoupper($mesResp); ?>
    </th>
    <th class="tabla-vacia"></th>
    <th class="tabla-vacia"></th>
    <th class="tabla-vacia"></th>

</tr>
<tr>
    <th class="nombre-dia"><?php echo $filtroTable[0]; ?></th>
    <th class="nombre-dia"><?php echo $filtroTable[1]; ?></th>
    <th class="nombre-dia"><?php echo $filtroTable[2]; ?></th>
    <th class="nombre-dia"><?php echo $filtroTable[3]; ?></th>
    <th class="nombre-dia"><?php echo $filtroTable[4]; ?></th>
    <th class="nombre-dia"><?php echo $filtroTable[5]; ?></th>
    <th class="nombre-dia"><?php echo $filtroTable[6]; ?></th>

</tr>
<tr id="semana"><?php for ($u = 1; $u < 8; $u++) { ?>
    <td>
        <div class="dia-fecha"><?php echo $u;
                ?></div><br><?php for ($i = 0; $i < 24; $i++) {
                    $nuevoi = "0" . $i; ?>
        <div class="contenedor-consulta">
            <div class="hora-turno"><?php echo $i . ":00 hs";
                        ; ?></div><?php if ($citasDB[$lugar][$mesResp][$u][$nuevoi][1] == null) { ?>
            <div class="contenedor-libre"> <?php echo "libre"; ?><div class="contenedor-btn">
                    <button class="btn-agendar">
                        <nav>
                            <a id="nav-btn-agregar" href="#agendar">agendar</a>
                        </nav>
                    </button>
                </div>
            </div><?php
                         } else { ?>

            <div class="contenedor-ocupado"><?php echo $citasDB[$lugar][$mesResp][$u][$nuevoi][1];
                            ; ?> <div class="numero-contacto">Contacto: <?php echo $citasDB[$lugar][$mesResp][$u][$nuevoi][4];
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
    <?php ;
    }
    ; ?>
</tr>
<tr id="semana">
    <?php for ($u = 8; $u < 15; $u++) { ?>
    <td>
        <div class="dia-fecha"><?php echo $u; ?></div><br><?php for ($i = 0; $i < 24; $i++) { ?>
        <div class="contenedor-consulta">
            <div class="hora-turno"><?php echo $i . ":00 hs";
                        ; ?></div><?php if ($citasDB[$lugar][$mesResp][$u][$i][1] == null) { ?>
            <div class="contenedor-libre"> <?php echo "libre"; ?><div class="contenedor-btn">
                    <button class="btn-agendar">
                        <nav>
                            <a id="nav-btn-agregar" href="#agendar">agendar</a>
                        </nav>
                    </button>
                </div>
            </div><?php
                         } else { ?>

            <div class="contenedor-ocupado"><?php echo $citasDB[$lugar][$mesResp][$u][$i][1];
                            ; ?> <div class="numero-contacto">Contacto: <?php echo $citasDB[$lugar][$mesResp][$u][$i][4];
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
                            <a id="nav-btn-agregar" href="#agendar">agendar</a>
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
    <?php for ($u = 22; $u < 29; $u++) { ?>
    <td>
        <div class="dia-fecha"><?php echo $u; ?></div><br><?php for ($i = 0; $i < 24; $i++) { ?>
        <div class="contenedor-consulta">
            <div class="hora-turno"><?php echo $i . ":00 hs";
                        ; ?></div><?php if ($citasDB[$lugar][$meses][$u][$i][1] == null) { ?>
            <div class="contenedor-libre"> <?php echo "libre"; ?><div class="contenedor-btn">
                    <button class="btn-agendar">
                        <nav>
                            <a id="nav-btn-agregar" href="#agendar">agendar</a>
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
    <?php for ($u = 29; $u < 32; $u++) { ?>
    <td>
        <div class="dia-fecha"><?php echo $u; ?></div><br><?php for ($i = 0; $i < 24; $i++) { ?>
        <div class="contenedor-consulta">
            <div class="hora-turno"><?php echo $i . ":00 hs";
                        ; ?></div><?php if ($citasDB[$lugar][$meses][$u][$i][1] == null) { ?>
            <div class="contenedor-libre"> <?php echo "libre"; ?><div class="contenedor-btn">
                    <button class="btn-agendar">
                        <nav>
                            <a id="nav-btn-agregar" href="#agendar">agendar</a>
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
</tr><?php }
; ?>