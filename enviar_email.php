<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Conexão com o banco (PDO)
$pdo = new PDO("mysql:host=wdbanconovo.mysql.dbaas.com.br;dbname=wdbanconovo", "wdbanconovo", "Teste@3030");


// Dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$assunto = $_POST['assunto'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';


// PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurações do PHPMailer
    $mail->isSMTP();
    $mail->Host = 'email-ssl.com.br';
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@macedoff.com.br';
    $mail->Password = 'Teste@30303030';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Remetente e destinatário
    $mail->setFrom('admin@macedoff.com.br', 'Remetente');
    $mail->addAddress('suportelocaweb09@gmail.com', 'Destinatário');

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Teste PHP Mailer';
    $mail->Body    = $mensagem;
    $mail->AltBody = 'Mensagem em texto simples';

    // Envia o e-mail
    $mail->send();

    // Salva no banco de dados após o envio
    $stmt = $pdo->prepare("INSERT INTO emails_enviados (destinatario, assunto, mensagem, data_envio) VALUES (?, ?, ?, NOW())");
    $stmt->execute([
	    $email, $assunto, $mensagem
    ]);

    echo 'E-mail enviado e salvo com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
?>

