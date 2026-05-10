<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferreteria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-200 min-h-screen flex flex-col">
    <header class="bg-green-700 flex flex-col p-4 text-white">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl">Ferreteria</h1>
            <nav>
                <ul class="flex items-center justify-center gap-4">
                    <li><button onclick="onClickSeachButton()" class="cursor-pointer"><img src="./assets/image/search-outline.svg" alt="icono de buscador" class="w-6 h-6 invert"></button></li>
                    <li><a class="text-xl" href="index.php">Inicio</a></li>
                </ul>
            </nav>
        </div>

        <nav id="search-bar" class="mt-3 hidden flex justify-center items-center">
            <div class="items-center">
                <input type="search" class="rounded" name="search" id=""> <button class="bg-green-600 hover:bg-green-700 cursor-pointer text-white px-2 py-1 rounded">Enviar</button>
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

    <script>
        const onClickSeachButton = () => {
            let searchBox = document.querySelector('#search-bar');
            searchBox.classList.toggle('hidden');
        }
    </script>
</body>
</html>