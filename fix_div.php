<?php
$folder = "."; // Carpeta donde están los archivos PHP
$pattern = '/<\?php include \'includes\/menu\.php\'; \?>\s*<\/div>/m'; // Busca solo un </div> después del include
$replacement = "<?php include 'includes/menu.php'; ?>"; // Deja solo el include sin el </div>

// Buscar todos los archivos PHP en la carpeta
$files = glob("$folder/*.php");

foreach ($files as $file) {
    $content = file_get_contents($file);
    $newContent = preg_replace($pattern, $replacement, $content, 1); // Solo reemplaza el primer match

    if ($newContent !== null) {
        file_put_contents($file, $newContent);
        echo "Corregido en: $file\n";
    } else {
        echo "Error al procesar: $file\n";
    }
}

echo "Proceso completado.";
?>
