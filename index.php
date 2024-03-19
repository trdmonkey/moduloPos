

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center mb-4">Digito de Verificación</h3>
        <form id="dvForm">
            <div class="form-group">
                <!-- <label for="nitInput">Ingrese su NIT:</label> -->
                <input type="text" class="form-control" id="nitInput" placeholder="Ingrese su NIT" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Calcular Dígito de Verificación</button>
        </form>
        <div id="resultado" class="mt-4"></div>
    </div>

    <script>
        document.getElementById("dvForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Evita que el formulario se envíe y la página se recargue

            var nit = document.getElementById("nitInput").value.trim(); // Obtiene el valor del NIT ingresado
            var resultadoDiv = document.getElementById("resultado");

            if (!nit) {
                resultadoDiv.innerHTML = '<div class="alert alert-danger" role="alert">Por favor ingrese un NIT válido.</div>';
                return;
            }

            if (!/^\d+$/.test(nit)) {
                resultadoDiv.innerHTML = '<div class="alert alert-danger" role="alert">El NIT debe contener solo números.</div>';
                return;
            }

            // Realiza la petición AJAX para calcular el dígito de verificación
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "calcular_dv.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        resultadoDiv.innerHTML = xhr.responseText; // Muestra la respuesta del servidor
                    } else {
                        resultadoDiv.innerHTML = '<div class="alert alert-danger" role="alert">Error al calcular el dígito de verificación.</div>';
                    }
                }
            };
            xhr.send("nit=" + nit);
        });
    </script>
</body>
</html>


