<?php
$mysqli = mysqli_connect("localhost", "test", "", "test");

if (!$mysqli) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuracion: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}

$tableName = "alumnos";

echo "Éxito conectando a la BD. \n\n";

//mysqli_close($mysqli);
?>