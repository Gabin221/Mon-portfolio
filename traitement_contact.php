<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Vérifier les champs
    if (empty($nom) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Un des champs est vide ou l'email n'est pas valide
        http_response_code(400);
        echo "Veuillez remplir tous les champs correctement.";
        echo '<meta http-equiv="refresh" content="3;url=' . $_SERVER["HTTP_REFERER"] . '">';
        exit;
    }

    // Configurer les paramètres de l'email
    $recipient = "serrurot19@gmail.com"; // Remplace par ton adresse email
    $subject = "Nouveau message de $nom";
    $email_content = "Nom: $nom\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";
    $email_headers = "From: $nom <$email>";

    // Envoyer l'email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Réussite de l'envoi
        http_response_code(200);
        echo "Merci pour votre message ! Je vous répondrai dans les plus brefs délais.";
    } else {
        // Échec de l'envoi
        http_response_code(500);
        echo "Oups ! Quelque chose s'est mal passé, veuillez réessayer plus tard.";
    }

    // Redirection après 5 secondes
    echo '<meta http-equiv="refresh" content="5;url=' . $_SERVER["HTTP_REFERER"] . '">';
} else {
    // Si ce n'est pas une requête POST
    http_response_code(403);
    echo "Il y a un problème avec votre soumission, veuillez réessayer.";
    echo '<meta http-equiv="refresh" content="3;url=' . $_SERVER["HTTP_REFERER"] . '">';
}
?>
