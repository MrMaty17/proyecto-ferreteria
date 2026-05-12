<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferreteria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-200 min-h-screen flex flex-col">

    <main class="mt-10 flex justify-center items-center">
        <div class="flex flex-col items-center border border-gray-400 p-6 rounded-lg bg-white shadow-sm">
            <form action="/admin/login.php" method="POST">
                <div class="w-full">
                    <label for="Nombre">Ingrese su nombre:</label>
                    <p class="mb-3"><input type="text" class="rounded border border-gray-300 w-full" name="name" id=""></p>
                    <label for="Contraseña">Ingrese su contraseña:</label>
                    <p class="mb-4"><input type="text" class="rounded border border-gray-300 w-full" name="password" id=""></p>
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 cursor-pointer text-white px-4 py-1 rounded w-max">Iniciar sesión</button>
            </form>
        </div>
    </main>
</body>

</html>