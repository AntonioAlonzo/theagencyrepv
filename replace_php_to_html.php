<?php
$folder = "."; // Carpeta donde están los archivos PHP
$pattern = '/\.php(["\'])/m'; // Busca ".php" en los enlaces y rutas
$replacement = '.html$1'; // Lo cambia por ".php"

// Buscar todos los archivos PHP en la carpeta
$files = glob("$folder/*.php");

foreach ($files as $file) {
    // 1. Modificar contenido del archivo
    $content = file_get_contents($file);
    $newContent = preg_replace($pattern, $replacement, $content);

    if ($newContent !== null) {
        file_put_contents($file, $newContent);
        echo "Reemplazado en contenido: $file\n";
    } else {
        echo "Error al procesar contenido en: $file\n";
    }

    // 2. Renombrar archivo de .php a .html
    $newFileName = preg_replace('/\.php$/', '.php', $file);
    if (rename($file, $newFileName)) {
        echo "Archivo renombrado: $file → $newFileName\n";
    } else {
        echo "Error al renombrar: $file\n";
    }
}

echo "Proceso completado.";
?>
