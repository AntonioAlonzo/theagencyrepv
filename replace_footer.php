<?php
$folder = "."; // Carpeta donde están los archivos PHP
$pattern = '/<?php include 'includes/footer.php'; ?>/m'; // Captura todo el bloque del footer
$replacement = "<?php include 'includes/footer.php'; ?>"; // Nuevo código

// Buscar todos los archivos PHP en la carpeta
$files = glob("$folder/*.php");

foreach ($files as $file) {
    $content = file_get_contents($file);
    $newContent = preg_replace($pattern, $replacement, $content, 1); // Solo reemplaza la primera coincidencia

    if ($newContent !== null) {
        file_put_contents($file, $newContent);
        echo "Footer reemplazado en: $file\n";
    } else {
        echo "Error al procesar: $file\n";
    }
}

echo "Proceso completado.";
?>
