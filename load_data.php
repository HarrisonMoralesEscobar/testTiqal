<?php

require("conection.php"); 

$archivo = fopen("data.csv", "r");
//Campos obligatorios: PrimerNombre, PrimerApellido y Edad
//Campos opcionales: SegundoNombre, SegundoApellido y Celular
$cont = 0; 
$contErr = 0; 

while (($datos = fgetcsv($archivo, ",")) == true) {

    $error = '';     

    echo "* Primer Nombre: ".$datos[0]."\n";
    echo "* Segundo Nombre: ".$datos[1]."\n";
    echo "* Primer Apellido: ".$datos[2]."\n";
    echo "* Segundo Apellido: ".$datos[3]."\n";
    echo "* Edad: ".$datos[4]."\n";
    echo "* Celular: ".$datos[5]."\n\n"; 
    
    $querySql = "INSERT INTO $tableName VALUES('', '$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]',$datos[4],$datos[5])";
    
    if(empty($datos[0]) || empty($datos[3]) || empty($datos[4])){
        $error = "- El campo es obligatorio, no puede ir nulo."."\n";
    }

    if(empty($error)){
        if ($mysqli->query($querySql) === TRUE) {
            print_r("* Se creo con exito el registro.\n\n\n");
            $cont++; 
        }else{
            print_r("error de depuración: " . mysqli_connect_error() . PHP_EOL);
        }
    }else{
        print_r("* Se presentaron los siguientes errores:\n\n");
        print_r($error."\n\n");
        $contErr++;
    }
    echo "***********************************\n\n";
}
print_r("* Registros con exito: ".$cont."\n\n");
print_r("* Registros con error: ".$contErr."\n\n");

mysqli_close($mysqli);
?>