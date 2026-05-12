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
    <nav id="search-bar" class="mt-3 flex justify-center items-center">
        <div class="items-center">
            <input type="search" class="rounded" name="search" id="">
            <button class="bg-green-600 hover:bg-green-700 cursor-pointer text-white px-2 rounded">Buscar</button>
        </div>
    </nav>