<?php
    header("Content-Type: text/html;charset=UTF-8");
    include('conexionBd.php');
    include("class.phpmailer.php");
    mysql_query("SET NAMES 'utf8'");
    $Nombre = $_POST["nombre"];
    $Apellido = $_POST["apellido"];
    $Cedula = $_POST["cedula"];
    $Celular = $_POST["celular"];
    $FechaNacimiento = $_POST["fechaNacimiento"];
    $Especialidad = $_POST["especialidad"];
    $LugarTrabajo = $_POST["lugarTrabajo"];
    $Direccion= $_POST["direccion"];
    $Departamento = $_POST["departamento"];
    $Ciudad = $_POST["ciudad"];
    $Correo = strtolower($_POST["correo"]);
    $Fecha = new DateTime();
    $FechaMensaje = date_format($Fecha, 'Y-m-d');
    $strSQL = "INSERT INTO formulario (nombre,apellido,cedula,celular,fechaNacimiento,especialidad,lugarTrabajo,departamento,ciudad,direccion,correo,fechaMensaje) VALUES ('".$Nombre."','".$Apellido."','".$Cedula."','".$Celular."','".$FechaNacimiento."','".$Especialidad."','".$LugarTrabajo."','".$Departamento."','".$Ciudad."','".$Direccion."','".$Correo."','".$FechaMensaje."')";
    $objQuery = mysql_query($strSQL);
    if($objQuery){
        $Mensaje   = " <!DOCTYPE html>" . "\r\n";
        $Mensaje  .= " <html lang='en'>" . "\r\n";
        $Mensaje  .= " <head>" . "\r\n";
        $Mensaje  .= "     <meta charset='utf-8'>" . "\r\n";
        $Mensaje  .= "     <meta name='viewport' content='width=device-width, initial-scale=1.0'>" . "\r\n";
        $Mensaje  .= "     <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>" . "\r\n";
        $Mensaje  .= "     <link href='http://ortopedistasaldia.com/formulario/css/materialize.css' type='text/css' rel='stylesheet' media='screen,projection'/>" . "\r\n";
        $Mensaje  .= "     <link href='http://ortopedistasaldia.com/formulario/css/style.css' type='text/css' rel='stylesheet' media='screen,projection'/>" . "\r\n";
        $Mensaje  .= "     <title>Ortopedistas</title>" . "\r\n";
        $Mensaje  .= " </head>" . "\r\n";
        $Mensaje  .= " <body>" . "\r\n";
        $Mensaje  .= "      <div style='width: 600px'> " . "\r\n";
        $Mensaje  .= "          <img src='http://ortopedistasaldia.com/formulario/img/cabezera01.jpg' alt='' class=''> " . "\r\n";
        $Mensaje  .= "          <div style='width:400px;margin-left: auto;margin-right: auto;text-align: center;font-size:20px;padding-top: 30px;padding-bottom: 30px'> " . "\r\n";
        $Mensaje  .= "              Su registro ha sido exitoso " . "\r\n";
        $Mensaje  .= "          </div> " . "\r\n";
        $Mensaje  .= "          <div style='width:400px;margin-left: auto;margin-right: auto;text-align: center;font-size:16px;padding-top: 30px;padding-bottom: 30px'> " . "\r\n";
        $Mensaje  .= "              DATOS DE REGISTRO <br>" . "\r\n";
        $Mensaje  .= "              Nombre: ".$Nombre."<br>" . "\r\n";
        $Mensaje  .= "              Apellido: ".$Apellido."<br>" . "\r\n";
        $Mensaje  .= "              No. C&eacute;dula: ".$Cedula."<br>" . "\r\n";
        $Mensaje  .= "              Fecha de nacimiento: ".$FechaNacimiento."<br>" . "\r\n";
        $Mensaje  .= "              Especialidad: ".$Especialidad."<br>" . "\r\n";
        $Mensaje  .= "              Lugar de trabajo: ".$LugarTrabajo."<br>" . "\r\n";
        $Mensaje  .= "              Direccion: ".$Direccion."<br>" . "\r\n";
        $Mensaje  .= "              Departamento: ".$Departamento."<br>" . "\r\n";
        $Mensaje  .= "              Ciudad: ".$Ciudad."<br>" . "\r\n";
        $Mensaje  .= "              Correo: ".$Correo."<br>" . "\r\n";
        $Mensaje  .= "          </div> " . "\r\n";
        $Mensaje  .= "          <div style='margin-left: 15px;padding-bottom: 15px;font-size:14px'> " . "\r\n";
        $Mensaje  .= "              Si tiene alguna duda o comentario, no dude en contactarnos.<br>" . "\r\n";
        $Mensaje  .= "              Yesenia Perez<br> " . "\r\n";
        $Mensaje  .= "              Coordinadora de mercadeo corporativo<br> " . "\r\n";
        $Mensaje  .= "              Fundaci&oacute;n Campbell<br> " . "\r\n";
        $Mensaje  .= "              yperez@grupocampbell.com | +57 316 7449767 " . "\r\n";
        $Mensaje  .= "          </div> " . "\r\n";
        $Mensaje  .= "          <div class='row-footer'> " . "\r\n";
        $Mensaje  .= "              <div class='col m12'> " . "\r\n";
        $Mensaje  .= "                  <img src='http://ortopedistasaldia.com/formulario/img/linkcampbell.jpg' alt='' class='imagenf'> " . "\r\n";
        $Mensaje  .= "              </div> " . "\r\n";
        $Mensaje  .= "          </div> " . "\r\n";
        $Mensaje  .= "          <div class='row-footer'> " . "\r\n";
        $Mensaje  .= "              <div class='col m12'> " . "\r\n";
        $Mensaje  .= "                  <img src='http://ortopedistasaldia.com/formulario/img/linkortopedistas.jpg' alt='' class='imagenf'> " . "\r\n";
        $Mensaje  .= "              </div> " . "\r\n";
        $Mensaje  .= "          </div> " . "\r\n";
        $Mensaje  .= "      </div> " . "\r\n";
        $Mensaje  .= " </body>" . "\r\n";
        $Mensaje  .= " </html>" . "\r\n";
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "mail.ortopedistasaldia.com";
        $mail->Username = "club@ortopedistasaldia.com";
        $mail->Password = "123456789*";
        $mail->From = "club@ortopedistasaldia.com";
        $mail->FromName = "club@ortopedistasaldia.com";
        $mail->AddAddress($Correo,$Nombre." ".$Apellido);
        $mail->Subject = "Registro exitoso";
        $mail->Body = $Mensaje;
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        if(!$mail->Send()) {
            echo "Mailer Error: ".$mail->ErrorInfo;
            echo "<br><br> * Please double check the user name and password to confirm that both of them are correct. <br><br>";
            echo "* If you are the first time to use gmail smtp to send email, please refer to this link :http://www.smarterasp.net/support/kb/a1546/send-email-from-gmail-with-smtp-authentication-but-got-5_5_1-authentication-required-error.aspx?KBSearchID=137388";
        }else {
        }
        $mail1 = new PHPMailer();
        $mail1->IsSMTP();
        $mail1->SMTPAuth = true;
        $mail1->Host = "mail.ortopedistasaldia.com";
        $mail1->Username = "club@ortopedistasaldia.com";
        $mail1->Password = "123456789*";
        $mail1->From = "club@ortopedistasaldia.com";
        $mail1->FromName = "club@ortopedistasaldia.com";
        $mail1->AddAddress("yperez@ortopedistasaldia.com","Registro");
        $mail1->Subject = "Registro de ".$Nombre." ".$Apellido;
        $mail1->Body = $Mensaje;
        $mail1->WordWrap = 50;
        $mail1->IsHTML(true);
        $mail1->CharSet = 'UTF-8';
        if(!$mail1->Send()) {
            echo "Mailer Error: ".$mail1->ErrorInfo;
            echo "<br><br> * Please double check the user name and password to confirm that both of them are correct. <br><br>";
            echo "* If you are the first time to use gmail smtp to send email, please refer to this link :http://www.smarterasp.net/support/kb/a1546/send-email-from-gmail-with-smtp-authentication-but-got-5_5_1-authentication-required-error.aspx?KBSearchID=137388";
        }else {
        }
        echo 1;
    }
    mysql_close($objConnect);

?>
