<?php
if ($_GET["fechaEliminar"] !== null && $_GET["horario-eliminar"] !== null) {
    //2024-01-04

    $fechaEliminar = $_GET["fechaEliminar"];
    $horarioEliminar = $_GET["horario-eliminar"];

    /* ****************se separa el dia ,el mes y el año************************ */
    $diaBorrar = $_GET["fechaEliminar"][8] . $_GET["fechaEliminar"][9];
    $diaEliminar = "";
    if (intval($diaBorrar < 10)) {
        $diaEliminar = $_GET["fechaEliminar"][9];
    } else {
        $diaEliminar = $_GET["fechaEliminar"][8] . $_GET["fechaEliminar"][9];
    }
    ;
    $mesBorrar = $_GET["fechaEliminar"][5] . $_GET["fechaEliminar"][6];
    $anioBorrar = $_GET["fechaEliminar"][0] . $_GET["fechaEliminar"][1] . $_GET["fechaEliminar"][2] . $_GET["fechaEliminar"][3];

    $anioEliminar = "";

    if ($anioBorrar == "2024" || $anioBorrar === 2024) {
        $anioEliminar = 0;
    } else {
        $anioEliminar = 1;
    }
    //Se crea al nombre del mes a borrar a partir de los valores de la fecha a eliminar.

    $mesEliminar = "";
    switch ($mesBorrar) {
        case '01':
            $mesEliminar = "enero";

            break;
        case '02':
            $mesEliminars = "febrero";

            break;
        case '03':
            $mesEliminar = "marzo";

            break;
        case '04':
            $mesEliminar = "abril";

            break;
        case '05':
            $mesEliminar = "mayo";

            break;
        case '06':
            $mesEliminar = "junio";

            break;
        case '07':
            $mesEliminar = "julio";

            break;
        case '08':
            $mesEliminar = "agosto";

            break;
        case '09':
            $mesEliminar = "septiembre";

            break;
        case '10':
            $mesEliminar = "octubre";

            break;
        case '11':
            $mesEliminar = "noviembre";

            break;
        case "12":
            $mesEliminar = "diciembre";

            break;
    }
    echo $mesEliminar;
    echo $anioEliminar;
    echo $diaEliminar;
    echo $horarioEliminar;
    /* ****************consulto base de datos************************ */

    $datosArray = file_get_contents('../src/script/citas.json', true);
    $datosJson = json_decode($datosArray, true);
    $varEliminar = $datosJson[$anioEliminar][$mesEliminar][$diaEliminar][$horarioEliminar];

    unset($datosJson[$anioEliminar][$mesEliminar][$diaEliminar][$horarioEliminar]); //elimino el registro


    file_put_contents('../src/script/citas.json', json_encode($datosJson));

    header("./registros.php");
    echo '<p class="error-crear-paciente eliminado-paciente">✔️La cita/turno fue eliminada con exito.</p>';

}
;

?>