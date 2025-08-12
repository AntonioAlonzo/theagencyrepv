<?php
$folder = "."; // Carpeta donde están los archivos PHP
$pattern = '/<div class="rd-navbar-nav-wrap[\s\S]*?<\/div>/m'; // Expresión regular para encontrar el bloque

$replacement = "<?php include 'includes/menu.php'; ?>"; // Nuevo código

// Buscar todos los archivos PHP en la carpeta
$files = glob("$folder/*.php");

foreach ($files as $file) {
    $content = file_get_contents($file);
    $newContent = preg_replace($pattern, $replacement, $content);

    if ($newContent !== null) {
        file_put_contents($file, $newContent);
        echo "Reemplazado en: $file\n";
    } else {
        echo "Error al procesar: $file\n";
    }
}

echo "Proceso completado.";
?>
