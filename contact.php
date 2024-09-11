<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validação do email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "O email fornecido é inválido.";
        exit;
    }

    $to = "yanmachadolkd@gmail.com";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Sua mensagem foi enviada. Obrigado!";
    } else {
        echo "Ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente.";
    }
} else {
    echo "Método de solicitação não suportado.";
}
?>
