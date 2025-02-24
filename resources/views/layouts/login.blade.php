<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('img/almacenPB2.jpeg') }}');">

    <main class="w-full h-full flex items-center justify-center">
        <div class="w-full max-w-md bg-white bg-opacity-75 rounded-lg shadow-lg overflow-hidden"> <!-- CONTENDEDOR DEL LOGIN -->
            <div class="bg-blue-500 text-white p-6">
                <div class="text-center">
                    <h3 class="text-3xl font-semibold mb-2">Bienvenido al sistema Found It!</h3>
                    <p>EL Slogan</p>
                </div>
            </div>

            <div class="p-6 bg-white">
                <form action="/api/login" method="post" class="space-y-4" >
                    <h2 class="text-2xl font-semibold mb-4 text-center">Inicio de Sesión</h2>
                    <input type="text" name="correo" placeholder="Usuario" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <input type="password" name="pass" placeholder="Contraseña" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <button type="submit" value="Inciar_sesion" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Ingresar</button>
                </form>
            </div>

        </div><!-- cierre de caja del login -->
    </main>

</body>
</html>
