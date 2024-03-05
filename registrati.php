<?php
// Connessione al database 
$servername = "localhost";
$username = "root";
$password = "Ruozzi1234";
$dbname = "servicecar";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Non c'è il controllo tramite isset() in quanto non sono consentiti valori nulli nel form HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $email = $_POST['email'];
    if ($password != $password2) {
        die('Le password non coincidono');
    }
    // Utilizzo password_hash per generare l'hash della password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        die("Account già esistente");
    }
    // Utilizzo di prepared statement per prevenire SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashedPassword, $email);
    if ($stmt->execute()) {
        echo 'Registrazione effettuata';
    } else {
        echo 'Errore durante la registrazione';
    }
    $stmt->close();
}
$conn->close();
?>
