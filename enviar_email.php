<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Conexão com o banco (PDO)
//Remova o "#" caso queira implementar a conexão com o banco de dados
#$pdo = new PDO("mysql:host=DIGITE SEU HOST DO BANCO DE DADOS;dbname= DIGITE O NOME DO BANCO", "DIGITE USUARIO DO BANCO", "SENHA DO BANCO"); 


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
    $mail->Host = 'DIGITE SERVIDOR SMTP';
    $mail->SMTPAuth = true;
    $mail->Username = 'DIGITE O EMAIL DE REMETENTE';
    $mail->Password = 'SENHA DO EMAIL';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Remetente e destinatário
    $mail->setFrom('DIGITE O EMAIL', 'Remetente');
    $mail->addAddress('DIGITE O DESTINATARIO', 'Destinatário');

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Teste PHP Mailer';
    $mail->Body    = $mensagem;
    $mail->AltBody = 'Mensagem em texto simples';

    // Envia o e-mail
    $mail->send();

    // Salva no banco de dados após o envio
    //Remova os "#" caso queira implementar a conexão com o banco de dados
    #$stmt = $pdo->prepare("INSERT INTO emails_enviados (destinatario, assunto, mensagem, data_envio) VALUES (?, ?, ?, NOW())");
    #$stmt->execute([
	#    $email, $assunto, $mensagem
    #]);

    echo 'E-mail enviado e salvo com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
?>

