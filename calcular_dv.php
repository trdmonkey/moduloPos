<!-- // <?php
// function calcularDV($nit) {
//     if (! is_numeric($nit)) {
//         return false;
//     }
 
//     $arr = array(1 => 3, 4 => 17, 7 => 29, 10 => 43, 13 => 59, 2 => 7, 5 => 19, 
//     8 => 37, 11 => 47, 14 => 67, 3 => 13, 6 => 23, 9 => 41, 12 => 53, 15 => 71);
//     $x = 0;
//     $y = 0;
//     $z = strlen($nit);
//     $dv = '';
    
//     for ($i=0; $i<$z; $i++) {
//         $y = substr($nit, $i, 1);
//         $x += ($y*$arr[$z-$i]);
//     }
    
//     $y = $x%11;
    
//     if ($y > 1) {
//         $dv = 11-$y;
//         return $dv;
//     } else {
//         $dv = $y;
//         return $dv;
//     }
    
// }
// //Se debe ingresar el NIT sin comas puntos etc...
// echo 'El digito de verificación es: ' . calcularDV(1085253456);
?> -->



<?php
// Obtener el valor del NIT desde la solicitud POST
$nit = isset($_POST['nit']) ? $_POST['nit'] : '';

// Función para calcular el dígito de verificación
function calcularDV($nit) {
    if (! is_numeric($nit)) {
        return false;
    }
 
    $arr = array(1 => 3, 4 => 17, 7 => 29, 10 => 43, 13 => 59, 2 => 7, 5 => 19, 
    8 => 37, 11 => 47, 14 => 67, 3 => 13, 6 => 23, 9 => 41, 12 => 53, 15 => 71);
    $x = 0;
    $y = 0;
    $z = strlen($nit);
    $dv = '';
    
    for ($i=0; $i<$z; $i++) {
        $y = substr($nit, $i, 1);
        $x += ($y*$arr[$z-$i]);
    }
    
    $y = $x%11;
    
    if ($y > 1) {
        $dv = 11-$y;
        return $dv;
    } else {
        $dv = $y;
        return $dv;
    }
}

// Calcular el dígito de verificación
$dv = calcularDV($nit);

// Mostrar el resultado
echo '<div class="alert alert-success" role="alert">El dígito de verificación para el NIT ' . $nit . ' es: ' . $dv . '</div>';
?>

