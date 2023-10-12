<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {

        $mail = new PHPMailer();
        $mail->isSMTP();


        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];

        $mail->setFrom('siemprejuntoscrematorio@gmail.com', 'Siempre Juntos');
        $mail->addAddress($this->email, 'Luis Soto');
        $mail->Subject = 'Confirma tu cuenta';

        // set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<body>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . ',</strong></p>';
        $contenido .= '<p>Has creado tu cuenta en Siempre Juntos. Para confirmarla, por favor haz clic en el siguiente enlace:</p>';
        $contenido .= '<p><a href="' . $_ENV['CREMATORIO_URL'] . '/confirmar-cuenta?token=' . $this->token . '">Confirmar cuenta</a></p>';
        $contenido .= '<p>Si no solicitaste esta cuenta, puedes ignorar este mensaje.</p>';
        $contenido .= '</body>';
        $contenido .= '</html>';
        $mail->Body = $contenido;

        // enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();


        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];

        $mail->setFrom('siemprejuntoscrematorio@gmail.com', 'Siempre Juntos');
        $mail->addAddress($this->email, 'Luis Soto');
        $mail->Subject = 'Reestablecer contraseña';

        // set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<body>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . '</strong> Has solicitado reestablecer tu contraseña, presiona el siguiente enlace para realizarlo.</p>';
        $contenido .= '<p>Presiona aquí: <a href="'. $_ENV['CREMATORIO_URL'] .'/recuperar?token=' . $this->token . '">Reestablecer contraseña</a> </p>';
        $contenido .= '<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>';
        $contenido .= '</body>';
        $contenido .= '</html>';
        $mail->Body = $contenido;

        
        $mail->send();
    }
}
