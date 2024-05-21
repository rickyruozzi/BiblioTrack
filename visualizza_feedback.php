<!DOCTYPE html>
<html>
<head>
    <title>Visualizza Feedback del Libro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #ff3333; /* Rosso più acceso */
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px auto;
        }

        label {
            color: #ff3333; 
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"],
        input[type="submit"] {
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
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #cc0000; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Visualizza Feedback del Libro</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="id_libro">ID del Libro:</label>
    <input type="number" id="id_libro" name="id_libro" required>
    <input type="submit" value="Mostra Feedback">
</form>

<?php
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "Ruozzi1234";
$dbname = "bibliotrack";

$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Controlla se è stato inviato un ID libro tramite il modulo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_libro = $_POST["id_libro"];

    // Query per selezionare i feedback del libro specificato
    $sql = "SELECT * FROM feedback_libri WHERE id_libro = $id_libro";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Feedback del Libro (ID: $id_libro)</h3>";
        echo "<table>";
        echo "<tr><th>ID Feedback</th><th>Username</th><th>Voto</th><th>Feedback</th><th>Titolo Libro</th></tr>";

        // Stampa dei risultati nella tabella
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["ID_feedback"]."</td><td>".$row["username"]."</td><td>".$row["voto"]."</td><td>".$row["feedback"]."</td><td>".$row["titolo"]."</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nessun feedback trovato per il libro con ID: $id_libro</p>";
    }
}

$conn->close();
?>

</body>
</html>
