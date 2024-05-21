<head>
    <title>registrazione</title>
    <link rel="icon" href="LogoBiblioteca.png" type="image/x-icon">
    <style>        
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    
    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    label {
        display: block;
        margin-bottom: 8px;
    }
    
    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
    
    button {
        background-color: #fa0000;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }</style>
</head>
<body>
    <form method="post" action="abilita_utente.php">
            <label for="username">nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cf">cognome:</label>
            <input type="text" id="cognome" name="cognome" required> 

            <label for="cf">codice fiscale:</label>
            <input type="text" id="cf" name="cf" required>

            <label for="indirizzo">indirizzo:</label>
            <input type="text" id="indirizzo" name="indirizzo" required>

            <label for="telefono">telefono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>

            <button type="submit">sign up</button>
    </form>
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "Ruozzi1234";
        $dbname = "bibliotrack";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Non c'è il controllo tramite isset() in quanto non sono consentiti valori nulli nel form HTML
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $teefono = $_POST["telefono"];
            $indirizzo = $_POST['indirizzo'];
            $cf = $_POST['cf'];
            $username = $_POST['username'];
            $stmt = $conn->prepare("INSERT INTO utenti (Nome, Cognome, Telefono, indirizzo, codice_fiscale, fk_user ) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $nome, $cognome, $telefono, $indirizzo, $cf, $username);
            if ($stmt->execute()) {
                header("Location: zona_prestiti.php");
            } else {
                echo 'Errore durante la registrazione';
            }
            $stmt->close();
        }
        $conn->close()
    ?>
</body>