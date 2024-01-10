  <!--espace commentaire-->
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $message = $_POST["message"];

    $servername = "localhost";
    $username = "id21501192_wallet_allinone";
    $password = "W4llet-W4llet";
    $dbname = "id21501192_w4llet_admin";
    //$bdd = new PDO("mysql:host=localhost;dbname=id21501192_w4llet_admin;charset=utf8", "id21501192_wallet_allinone", "W4llet-W4llet");
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " . $conn->connect_error);
    }

    // Préparer et exécuter la requête SQL pour insérer le commentaire
    $sql = "INSERT INTO berrucv (email, message) VALUES ('$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>showMessage();</script>';
    } else {
        echo "Erreur lors de l'insertion du commentaire: " . $conn->error;
    }

    $conn->close();
}
?>

<!-- Formulaire -->
<div id="commentaire">
<form action="" method="post">
    <label for="email">Votre email :</label>
    <input type="email" name="email" placeholder="Pour recevoir mes tips gratuitement" required><br>

    <label for="message">Votre commentaire :</label>
    <textarea name="message" rows="4" placeholder="Doit contenir au moins une bonne nouvelle" required></textarea><br>

    <input type="submit" value="Envoyer le commentaire">
</form>
</div>
<!--fin espace commentaire-->