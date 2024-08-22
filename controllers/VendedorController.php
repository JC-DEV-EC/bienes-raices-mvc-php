<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{
    public static function crear(Router $router)
    {

        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor;

        // Ejecutar el codigo despues de que el usuarop envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar campos vacios
            $errores = $vendedor->validar();

            // No hay errores
            if (empty($errores)) {

                // Guarda en la base de datos
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar(Router $router)
    {
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        // Obtener datos del vendedor a acutalizar
        $vendedor = Vendedor::find($id);

        // Ejecutar el codigo despues de que el usuarop envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            if (empty($errores)) {

                // Asignar los valores
                $args = $_POST['vendedor'];

                // Sincronizar con el objeto en memoria
                $vendedor->sincronizar($args);

                // Validación
                $errore = $vendedor->validar();

                if (empty($errores)) {
                    // Guarda en la base de datos
                    $vendedor->guardar();
                }
            }
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validadr el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {

                // Valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
