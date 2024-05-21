<?php
$servername = "localhost";
$username = "root";
$password = "Ruozzi1234";
$dbname = "bibliotrack";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connessione fallita: " . $conn->connect_error);
// }

// $sql = "SELECT FK_Id_libro, COUNT(*) AS num_prestiti FROM prestiti GROUP BY FK_Id_libro ORDER BY num_prestiti DESC";
// $result = $conn->query($sql);

// $libri_popolari = [];

// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         array_push($libri_popolari, $row["FK_Id_libro"]);
//     }
// } else {
//     echo "Nessun risultato trovato";
// }

// $conn->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tendenze - BiblioTrack</title>
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
    cursor: pointer;
}

header h1 {
    margin: 0;
    font-size: 36px;
    cursor:pointer;
}

header h3 {
    margin-top: 5px;
    font-size: 18px;
    cursor:pointer;
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

table th, table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

table tbody tr:hover {
    background-color: #f9f9f9;
}

    </style>
</head>
<body>
    <header id='header'>
        <h1>BiblioTrack</h1>
        <h3>Il luogo ideale per esplorare nuovi mondi attraverso la lettura</h3>
    </header>
    <nav>
        <a href="index.html">Home</a>
        <a href="catalogo.php">Catalogo</a>
        <a href="prestiti.html">Prestiti</a>
        <a href="tendenze.php">Tendenze</a>
        <a href="eventi.html">eventi</a>
    </nav>
    <div class="container">
        <section class="catalog-section">
            <h2>Tendenze</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Libro</th>
                        <th>Nome Libro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connessione fallita: " . $conn->connect_error);
                    }

                    $sql = $sql = "SELECT l.PK_Id_libro, l.Titolo 
                    FROM libri l 
                    JOIN (
                        SELECT FK_Id_libro 
                        FROM prestiti 
                        GROUP BY FK_Id_libro 
                        ORDER BY COUNT(*) DESC 
                        LIMIT 5
                    ) p ON l.PK_Id_libro = p.FK_Id_libro";
                                
                    $result = $conn->query($sql); 

                    if ($result!==false && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["PK_Id_libro"] . "</td><td>" . $row["Titolo"] . "</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>Nessun risultato trovato</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
    </div>
    <script>
        let header= document.getElementById('header');
        header.onclick=function() {
            window.location.href = "index.html";
        }
    </script>
</body>
</html>
<!-- S -->