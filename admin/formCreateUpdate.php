<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $titulo = "Editar producto N°$id";
    $action = "edit.php?id=$id";
} else {
    $titulo = "Crear producto";
    $action = "create.php";
}
include '../layouts/header.php';
?>
<main class="flex flex-1 items-center justify-center py-10 px-4">
    <section class="w-full max-w-2xl rounded-3xl border border-slate-200 bg-white/90 p-8 shadow-2xl shadow-slate-300/40 backdrop-blur-sm">
        <div class="mb-6 flex items-center justify-between gap-4">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-green-700">Formulario</p>
                <h1 class="mt-2 text-3xl font-semibold text-slate-900"><?= $titulo ?></h1>
            </div>
        </div>

        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data" class="space-y-5">
            <div class="grid gap-3">
                <label class="text-sm font-medium text-slate-700" for="name">Nombre</label>
                <input id="name" type="text" name="name" required class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-green-500 focus:bg-white" placeholder="Ingresa el nombre del producto">
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div class="grid gap-3">
                    <label class="text-sm font-medium text-slate-700" for="price">Precio</label>
                    <input id="price" type="number" name="price" required class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-green-500 focus:bg-white" placeholder="00.00">
                </div>
                <div class="grid gap-3">
                    <label class="text-sm font-medium text-slate-700" for="stock">Stock</label>
                    <input id="stock" type="number" name="stock" required class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-green-500 focus:bg-white" placeholder="Cantidad disponible">
                </div>
            </div>

            <div class="grid gap-3">
                <label class="text-sm font-medium text-slate-700" for="image">Imagen</label>
                <input id="image" type="file" name="image" class="rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition file:mr-4 file:rounded-full file:border-0 file:bg-green-600 file:px-4 file:py-2 file:text-white file:hover:bg-green-700" accept="image/*">
            </div>

            <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                <a href="index.php" class="inline-flex justify-center rounded-2xl border border-slate-300 bg-slate-100 px-6 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-200">Cancelar</a>
                <button type="submit" class="inline-flex justify-center rounded-2xl bg-gradient-to-r from-green-600 to-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-green-500/20 transition hover:from-green-700 hover:to-blue-700">Guardar producto</button>
            </div>
        </form>
    </section>
</main>
<?php include '../layouts/footer.php'; ?>