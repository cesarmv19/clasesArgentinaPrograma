<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h1>Formulario de Registro</h1>
    
    <form action="api.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <input type="submit" value="Registrar">
    </form> -->

    
    <!-- <form action="api.php" method="POST">
    <legend>Formulario de envío</legend>
    <input type="text" name="nombre" placeholder="Ingrese nombre">
    <input type="email" name="email" placeholder="Ingrese un mail">
    <button>Enviar</button>
    </form> -->
    <h1>Formulario de Registro</h1>
    
    <form id="registroForm">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="button" id="registrarButton">Registrar</button
    </form>

    <div id="resultado"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formulario = document.getElementById('registroForm');
            const resultado = document.getElementById('resultado');
            const registrarButton = document.getElementById('registrarButton');

            registrarButton.addEventListener('click', function () {
                const nombre = document.getElementById('nombre').value;
                const email = document.getElementById('email').value;

                const data = {
                    nombre: nombre,
                    email: email
                };

                fetch('api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(responseData => {
                    resultado.textContent = responseData.message;
                })
                .catch(error => {
                    console.error('Error al enviar los datos:', error);
                });
            });
        });
    </script>

</body>
</html>