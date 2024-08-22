<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [

            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    
    public static function nosotros(Router $router) {

        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            
            'propiedades' => $propiedades

        ]);
    }

    public static function propiedad(Router $router) {

        $id = validarORedireccionar('/propiedades');

        // Buscar la propiedad por id
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $router->render('paginas/blog');
        
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router) {

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // COnfigurar SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV['EMAIL_PORT'];
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            

            // COnfigurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p></html>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' </p></html>';

            // Enviar de forma condicional los campos de email o telefono
            if($respuestas['contacto'] === 'telefono') {
                $contenido .+ '<p>Eligio ser contactado por teléfono:</p>';
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . ' </p></html>';
                $contenido .= '<p>Fecha contacto: ' . $respuestas['fecha'] . ' </p></html>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . ' </p></html>';
            } else {
                // Es email, entonces agregamos el campo email
                $contenido .+ '<p>Eligio ser contactado por email:</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . ' </p></html>';
            }

            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . ' </p></html>';
            $contenido .= '<p>VEnde o Compra: ' . $respuestas['tipo'] . ' </p></html>';
            $contenido .= '<p>Precio o Presuspuesto: $' . $respuestas['precio'] . ' </p></html>';
            $contenido .= '<p>Prefieres ser contactado por: ' . $respuestas['contacto'] . ' </p></html>';


            $contenido = '</html>';


            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            // Enviar el email
            if($mail->send()) {
                $mensaje =  "Mensaje enviado correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar..." . $mail->ErrorInfo;
            }

        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}