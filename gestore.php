<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="LogoBiblioteca.png" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Library Management System</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    div {
        text-align: center;
    }
    form {
    margin-top: 20px;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 8px;
}

input[type="text"] {
    padding: 8px;
    width: 200px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

button[type="submit"] {
    padding: 8px 16px;
    margin-top: 8px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

button[type="submit"]:last-of-type {
    background-color: #f44336;
}

button[type="submit"]:last-of-type:hover {
    background-color: #d32f2f;
}

</style>
</head>
<body>

<?php
function calcola_termine(){
    $dataOdierna = date("Y-m-d");
    echo "La data odierna è: " . $dataOdierna;
}

session_start();
$user = $_SESSION['username'];
$servername = "localhost";
$username = "root";
$password = "Ruozzi1234";
$dbname = "bibliotrack";

$id_utente = null;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
$sql = "SELECT PK_Id_utente FROM utenti WHERE username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_utente = $row['PK_Id_utente'];
} else {
    echo "Nessun ID utente trovato per l'utente $username.";
}

if (isset($_SESSION['username'])) {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'cancella':
                if (isset($_POST['book_id'])) {
                    $book_id = $_POST['book_id'];
                    
                    // Effettua la query per cancellare la prenotazione
                    $stmt = $conn->prepare('DELETE FROM prestiti WHERE FK_Id_utente = ? AND FK_Id_libro = ?');
                    $stmt->bind_param('ii', $id_utente, $book_id);
                    $stmt->execute();
                    $stmt->close();
            
                    // Aggiorna lo stato del libro a 0 (disponibile)
                    $stmt = $conn->prepare('UPDATE libri SET stato = 0 WHERE PK_Id_libro = ?');
                    $stmt->bind_param('i', $book_id);
                    $stmt->execute();
                    $stmt->close();
            
                    echo 'Prenotazione cancellata e libro reso disponibile.';
                } else {
                    echo 'Non hai selezionato un ID libro valido.';
                }
                break;
            
            case 'prenota':
                if (isset($_POST['book_id'])) {
                    $book_id = $_POST['book_id'];

                    // Verifica se l'utente ha già preso in prestito 3 libri
                    $stmt = $conn->prepare('SELECT COUNT(*) FROM prestiti WHERE FK_Id_utente = ? AND Scadenza_prestito >= CURDATE()');
                    $stmt->bind_param('i', $id_utente);
                    $stmt->execute();
                    $stmt->bind_result($count);
                    $stmt->fetch();
                    $stmt->close();

                    if ($count >= 3) {
                        echo 'Hai già preso in prestito 3 libri. Non puoi prendere altri libri in prestito.';
                        break;
                    }
                    
                    // Effettua la query per ottenere lo stato del libro
                    $stmt = $conn->prepare('SELECT stato FROM libri WHERE PK_Id_libro = ?');
                    $stmt->bind_param('i', $book_id);
                    $stmt->execute();
                    $stmt->bind_result($stato);
                    $stmt->fetch();
                    $stmt->close();
            
                    // Verifica se lo stato è 1
                    if ($stato === 1) {
                        echo 'Il libro non è disponibile per la prenotazione.';
                    } else {
                        // Procedi con la prenotazione
                        $oggi = new DateTime();
                        // Aggiungere tre mesi alla data di oggi
                        $tre_mesi_dopo = clone $oggi;
                        $tre_mesi_dopo->add(new DateInterval('P2M'));
            
                        // Formattare le date
                        $oggi_formattato = $oggi->format('Y-m-d');
                        $tre_mesi_dopo_formattato = $tre_mesi_dopo->format('Y-m-d');
            
                        // Inserisci la prenotazione nel database
                        $stmt = $conn->prepare('INSERT INTO prestiti(FK_id_utente, FK_id_libro, inizio_prestito, scadenza_prestito) VALUES (?, ?, ?, ?)');
                        $stmt->bind_param('iiss', $id_utente, $book_id, $oggi_formattato, $tre_mesi_dopo_formattato);
                        $stmt->execute();
                        $stmt->close();
            
                        // Aggiorna lo stato del libro a 1 (non disponibile)
                        $stmt = $conn->prepare('UPDATE libri SET stato = 1 WHERE PK_Id_libro = ?');
                        $stmt->bind_param('i', $book_id);
                        $stmt->execute();
                        $stmt->close();
            
                        echo 'Prenotazione effettuata.';
                    }
                } else {
                    echo 'Non hai selezionato un ID libro valido.';
                }
                break;
            
            case 'mostra':
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM libri where stato!=1 ORDER BY Titolo ASC";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<div><h1>Catalogo:</h1></div>";
                    echo "<table border='1'>";
                    echo "<tr><th>ID libro</th><th>titolo</th><th>autore</th><th>casa editrice</th><th>anno pubblicazione</th><th>collana</th><th>genere</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["PK_Id_libro"] . "</td>";
                        echo "<td>" . $row["Titolo"] . "</td>";
                        echo "<td>" . $row["Autore"] . "</td>";
                        echo "<td>" . $row["Casa_editrice"] . "</td>";
                        echo "<td>" . $row["Anno_pubblicazione"] . "</td>";
                        echo "<td>" . $row["Collana"] . "</td>";
                        echo "<td>" . $row["Genere"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>Non hai prestiti attivi al momento.</p>";
                }
                $conn->close();
                break;
            case 'visualizza':
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

                $sql = "SELECT PK_Id_prestito, FK_Id_utente, FK_Id_libro, inizio_prestito, Scadenza_prestito FROM prestiti WHERE FK_id_utente = '$id_utente'";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<div><h1>I tuoi prestiti:</h1></div>";
                    echo "<table border='1'>";
                    echo "<tr><th>ID Prestito</th><th>ID Utente</th><th>ID Libro</th><th>Data Inizio</th><th>Data Fine</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["PK_Id_prestito"] . "</td>";
                        echo "<td>" . $row["FK_Id_utente"] . "</td>";
                        echo "<td>" . $row["FK_Id_libro"] . "</td>";
                        echo "<td>" . $row["inizio_prestito"] . "</td>";
                        echo "<td>" . $row["Scadenza_prestito"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>Non hai prestiti attivi al momento.</p>";
                }
                $conn->close();
                break;
            default:
                echo "Azione non valida.";
                break;
        }
    } else {
        echo "Nessuna azione specificata.";
    }
} else {
    echo "Devi loggarti";
}

if (isset($_GET['action']) && $_GET['action'] == 'prenota') {
    echo "
    <div>
        <form method='post' action=''>
            <label for='book_id'>Seleziona ID Libro:</label>
            <input type='text' id='book_id' name='book_id'>
            <button type='submit' name='action' style='background-color:green' value='prenota'>Prenota</button>
        </form>
    </div>";
}
if (isset($_GET['action']) && $_GET['action'] == 'cancella') {
    echo "
    <div>
        <form method='post' action=''>
            <label for='book_id'>Seleziona ID Libro:</label>
            <input type='text' id='book_id' name='book_id'>
            <button type='submit' name='action' value='cancella'>Cancella</button>
        </form>
    </div>";
}
?>

</body>
</html>