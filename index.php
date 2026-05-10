<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferreteria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-200 min-h-screen flex flex-col">
    <header class="bg-green-700 flex justify-between items-center p-4 text-white">
        <h1 class="text-2xl">Ferreteria</h1>
        <nav>
            <ul class="flex items-center">
                <li><button onclick="" class="cursor-pointer"><img src="assets/image/search-outline.svg" alt="icono de buscador"></button></li>
                <li><a class="text-xl" href="index.php">Inicio</a></li>
            </ul>
        </nav>

        <nav class="mt-3 flex justify-center items-center">
            <div class="items-center">
                <input type="search" name="search" id=""> <button class="bg-green-600 hover:bg-green-700 cursor-pointer text-white">Enviar</button>
            </div>
        </nav>
    </header>

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