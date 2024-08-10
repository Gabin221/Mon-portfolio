<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);


    if (empty($nom) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Veuillez remplir tous les champs correctement.";
        echo '<meta http-equiv="refresh" content="3;url=' . $_SERVER["HTTP_REFERER"] . '">';
        exit;
    }

    $recipient = "***";
    $subject = "Nouveau message de $nom";
    $email_content = "Nom: $nom\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";
    $email_headers = "From: $nom <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Merci pour votre message ! Je vous répondrai dans les plus brefs délais.";
    } else {
        http_response_code(500);
        echo "Oups ! Quelque chose s'est mal passé, veuillez réessayer plus tard.";
    }

    echo '<meta http-equiv="refresh" content="3;url=' . $_SERVER["HTTP_REFERER"] . '">';
} else {
    http_response_code(403);
    echo "Il y a un problème avec votre soumission, veuillez réessayer.";
    echo '<meta http-equiv="refresh" content="3;url=' . $_SERVER["HTTP_REFERER"] . '">';
}
?>
