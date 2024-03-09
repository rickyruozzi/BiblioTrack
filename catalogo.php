<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioTrack</title>
    <link rel="icon" href="LogoBiblioteca.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #710c0c;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 36px;
        }
        header h3 {
            margin-top: 5px;
            font-size: 18px;
        }
        nav {
            background-color: #f90505;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #500606;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .catalog-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .catalog-section h2 {
            margin-top: 0;
            color: #004d40;
        }
        table {
            width: 100%;
            border-collapse: collapse;
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
    <header>
        <h1>BiblioTrack</h1>
        <h3>Il luogo ideale per esplorare nuovi mondi attraverso la lettura</h3>
    </header>
    <nav>
        <a href="index.html">Home</a>
        <a href="catalogo.html">Catalogo</a>
        <a href="prestiti.html">Prestiti</a>
        <a href="tendenze.html">tendenze</a>
    </nav>
    <div class="container">
        <div class="catalog-section">
            <h2>Prestiti</h2>
            <table>
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Autore</th>
                        <th>casa editrice</th>
                        <th>anno pubblicazione</th>
                        <th>collana</th>
                        <th>genere</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connessione al database (sostituisci con le tue credenziali)
                    $servername = "localhost";
                    $username = "root";
                    $password = "Ruozzi1234";
                    $dbname = "bibliotrack";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verifica della connessione
                    if ($conn->connect_error) {
                        die("Connessione fallita: " . $conn->connect_error);
                    }

                    // Query per selezionare i prestiti
                    $sql = "SELECT * FROM libri order by Titolo";
                    $result = $conn->query($sql);

                    // Stampa dei risultati nella tabella
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["Titolo"]."</td><td>".$row["Autore"]."</td><td>".$row["Casa_editrice"]."</td><td>".$row["Anno_pubblicazione"]."</td><td>".$row["Collana"]."</td><td>".$row["Genere"]."</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nessun prestito trovato</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
