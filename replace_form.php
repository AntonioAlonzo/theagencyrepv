<?php
$folder = "."; // Carpeta donde están los archivos

// Patrón de búsqueda para encontrar el bloque de código completo de forma más flexible
$pattern = '/<script>\s*hbspt\.forms\.create\(\{.*?portalId:\s*"21772689".*?\}\);\s*<\/script>/s';

$replacement = '<script src="https://js.hsforms.net/forms/embed/49583827.js" defer></script>
<div class="hs-form-frame" data-region="na1" data-form-id="261240cb-9b52-4b07-b6b7-a32f08968798" data-portal-id="49583827"></div>';

// Buscar todos los archivos PHP y HTML en la carpeta
$files = glob("$folder/*.{php,html}", GLOB_BRACE);

foreach ($files as $file) {
    // Leemos el contenido del archivo
    $content = file_get_contents($file);

    // Intentamos hacer el reemplazo
    $newContent = preg_replace($pattern, $replacement, $content);

    // Si el contenido ha cambiado, lo guardamos
    if ($newContent !== $content) {
        file_put_contents($file, $newContent);
        echo "Reemplazado en: $file\n";
    } else {
        echo "No se encontró el bloque o no se realizó el reemplazo en: $file\n";
    }
}

echo "Proceso completado.";
?>