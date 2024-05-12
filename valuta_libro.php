<!DOCTYPE html>
<html>
<head>
    <title>Valutazione Libro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #ff3333; /* Rosso più acceso */
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        label {
            color: #ff3333; 
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #cc0000; 
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ff3333; 
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #cc0000; 
        }
    </style>
</head>
<body style="text-align: center;">
    <h2>Valutazione Libro</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>ID del Libro:</label><br>
        <input type="number" name="id_libro" required><br>
        
        <label>Titolo del Libro:</label><br>
        <input type="text" name="titolo" required><br>
        
        <label>Voto (da 1 a 10):</label><br>
        <input type="number" name="voto" min="1" max="10" required><br>
        
        <label>Feedback (massimo 100 caratteri):</label><br>
        <textarea name="feedback" maxlength="100" required></textarea><br>
        
        <input type="submit" value="Invia Valutazione">
    </form>
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "Ruozzi1234";
    $dbname = "bibliotrack";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Controlla la connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_libro = $_POST["id_libro"];
        $titolo = $_POST["titolo"];
        $voto = $_POST["voto"];
        $feedback = $_POST["feedback"];
        $user=$_SESSION['username'];

        $stmt=$conn->prepare("INSERT INTO feedback_libri (id_libro, username, voto, feedback, titolo) VALUES (?,?,?,?,?)");
        $stmt->bind_param('isiss',$id_libro, $user, $voto, $feedback, $titolo);
        if ($stmt->execute()) {
            echo "<p>Valutazione salvata con successo nel database!</p>";
        } else {
            echo "<p>Errore durante il salvataggio della valutazione nel database: " . $conn->error . "</p>";
        }
        $stmt->close();
    }
    $conn->close();
    ?>
</body>
</html>
