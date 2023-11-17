<?php
    header('Content-Type: aplication/json');


   require_once("../config/conexion.php");
   require_once("../models/Productos.php");
   $productos = new productos();

   $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetAll":
            $datos=$productos->get_productos();
            echo json_encode($datos);
        break;

        case "GetId":
            $datos=$productos->get_productos_x_Idd($body["codigo"]);
            echo json_encode($datos);
            break;

            case "Insert":
                
            $datos=$productos->insert_productos($body["nombre"],$body["precio"], $body["cantidad"],$body["fecha_vencimiento"]);
            echo json_encode("Insert Correcto");
            break;

           case "Update":
                    $datos=$productos->update_productos($body["codigo"], $body["nombre"],$body["precio"], $body["cantidad"],$body["fecha_vencimiento"]);
                    echo json_encode("Correcto");
                    break;
                   
     
            case "Delete":
                     $datos=$productos->delete_producto($body["codigo"]);
                     echo json_encode("Correcto");
                    break;
    }
?>