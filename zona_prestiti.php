<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona prestiti</title>
    <link rel="icon" href="LogoBiblioteca.png" type="image/x-icon">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.5em;
            margin: 0;
        }

        .header h7 {
            font-size: 1em;
            color: #555;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        button {
            font-size: 16px;
            padding: 12px 24px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .prenotation-button {
            background-color: #28a745;
            color: white;
        }

        .miei-prestiti {
            background-color: #ffc107;
            color: white;
        }

        .valutation-button {
            background-color: #ff016c;
            color: white;
        }

        .cancellation-button {
            background-color: #dc3545;
            color: white;
        }

        .show-button {
            background-color: #007bff;
            color: white;
        }

        .abilitation-button {
            background-color: #17a2b8;
            color: white;
        }

        button:hover {
            transform: translateY(-3px);
            background-color: #555;
        }

        @media (max-width: 600px) {
            button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>    
<body>
    <div class="header">
        <h1>
            <?php
            session_start();

            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "Benvenuto $username!";
            } else {
                die("Devi loggarti");
            }
            ?>
        </h1>
        <h7>Ricorda di abilitare l'utente per prendere in prestito i libri!</h7>
    </div>
    <div class="container">
        <button id="mieiPrestiti" class="miei-prestiti">Mostra prestiti</button>
        <button id="Prenota" class="prenotation-button">Prenota</button>
        <button id="cancella" class="cancellation-button">Cancella</button>
        <button id="mostra" class="show-button">Mostra libri</button>
        <button id="valuta" class="valutation-button">Valuta libro</button>
        <button id="abilita" class="abilitation-button">Abilita utente</button>
    </div>
    <script>
        document.getElementById('Prenota').onclick = function() {
            window.location.href = 'gestore.php?action=prenota';
        };
        document.getElementById('mostra').onclick = function() {
            window.location.href = 'gestore.php?action=mostra';
        };
        document.getElementById('valuta').onclick = function() {
            window.location.href = 'valuta_libro.php';
        };
        document.getElementById('cancella').onclick = function() {
            window.location.href = 'gestore.php?action=cancella';
        };
        document.getElementById('mieiPrestiti').onclick = function() {
            window.location.href = 'gestore.php?action=visualizza';
        };
        document.getElementById('abilita').onclick = function() {
            window.location.href = 'abilita_utente.php';
        };
    </script>
</body>
</html>
