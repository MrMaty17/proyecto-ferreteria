<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferreteria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-200 min-h-screen flex flex-col">
    <header class="bg-green-700 flex flex-col p-4 px-6 text-white">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl">Ferreteria</h1>
            <nav>
                <ul class="flex items-center justify-center gap-4">
                    <li><a class="text-xl" href="index.php">Inicio</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <nav id="search-bar" class="mt-10 flex justify-center items-center">
        <div class="flex flex-col items-center border border-gray-400 p-6 rounded-lg bg-white shadow-sm">
            <div class="w-full">
                <label for="Nombre">Ingrese su nombre:</label>
                <p class="mb-3"><input type="search" class="rounded border border-gray-300 w-full" name="name" id=""></p>
                <label for="Contraseña">Ingrese su contraseña:</label>
                <p class="mb-4"><input type="search" class="rounded border border-gray-300 w-full" name="password" id=""></p>
            </div>
            <button class="bg-green-600 hover:bg-green-700 cursor-pointer text-white px-4 py-1 rounded w-max">Iniciar sesión</button>
        </div>
    </nav>

    <main class="flex grow justify-center items-center m-5">
        <p>Hola xd</p>
    </main>

    <footer class="flex flex-row md:flex-col justify-between items-center border-t border-gray-300">
        <p class="text-xs text-gray-500">Todos los derechos reservados &copy; Matias Arce</p>
        <div class="flex items-center gap-4">
            <a class="hover:text-green-700" href="#">Linkedin</a>
            <a class="hover:text-green-700" href="#">GitHub</a>
        </div>
    </footer>
</body>
</html>