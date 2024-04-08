<?php 

session_start();
$usuario_admin = $_SESSION["usuario_esAdmin"];
$usuario_id = $_SESSION["usuario_id"];
require "../config.php";

?>

<table>
    <tr>
        <th>Nombre</th>
        <th>Descripcción</th>
        <th>Tamaño de Archivo</th>
        <th>Enlace</th>
        
        <?php if($usuario_admin){ ?>
        <th>Visible</th>
        <th>Borrar</th>
        <?php } ?>
    </tr>

    <?php 

        include("../conection.php");

        $stmt = $conn->query("SELECT * FROM archivos");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $valores){
            $visible = ($valores['es_publico']) ? "Publico" : "No visible";
            
            if(($valores['es_publico'] || $_SESSION['usuario_esAdmin']) && $valores['usuario_borro_id'] == null){
                echo "<tr>";

                echo "<td>". $valores['nombre_archivo'] ."</td>";
                echo "<td>". $valores['descripcion'] ."</td>";
                echo "<td>". $valores['tamaño'] ." KB</td>";
                echo "<td><a href='". "./archivos/".$valores['nombre_archivo_guardado'] ."'>Ver</a></td>";

                if($usuario_admin){
                    echo "<td><button onclick=Ver('". $valores['hash_sha256'] ."')>". $visible ."</button></td>";
                    echo "<td><button onclick=eliminar_archivo('".$valores['nombre_archivo_guardado']."','".$_SESSION['usuario_id']."','".$valores['hash_sha256']."');>Eliminar</button></td>";
                }

                echo "</tr>";
            }

        }
    ?>

</table>