<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Cálculo</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Resultado del Cálculo</h1>
    <?php
    // Verificar si se ha enviado un NIT
    if (isset($_POST['nit'])) {
        $nit = $_POST['nit'];
        
        // Función para calcular el dígito de verificación
        function calcularDigitoVerificacion($nit) {
            $factor = 1;
            $suma = 0;
            $nit = strrev(preg_replace('/[^\d]/', '', $nit)); // Eliminar caracteres no numéricos y revertir el string
            
            for ($i = 0; $i < strlen($nit); $i++) {
                $factor = ($factor == 8) ? 2 : $factor; // Reiniciar el factor a 2 después de 7
                $suma += $nit[$i] * $factor; // Multiplicar cada dígito del NIT por el factor y sumar
                $factor++;
            }
            
            $verificacion = ($suma % 11) > 1 ? 11 - ($suma % 11) : 0; // Calcular el dígito de verificación
            
            return $verificacion;
        }
        
        // Calcular el dígito de verificación
        $digito_verificacion = calcularDigitoVerificacion($nit);
        
        // Mostrar el resultado
        echo "El dígito de verificación para el NIT $nit es: <b>$digito_verificacion</b>";
    } else {
        echo "Por favor, ingresa un NIT.";
    }
    ?>
</body>
</html>
