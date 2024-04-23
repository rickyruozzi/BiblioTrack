<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona prestiti</title>
    <link rel="icon" href="car-vehicles-transport-cartoon-png.webp" type="image/x-icon">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px; /* Aggiunto margine inferiore per separare dagli altri contenuti */
        }

        .container {
            text-align: center;
        }
        
        button {
            font-size: 16px;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .prenotation-button {
            background-color: #0ce8ca;
            color: white;
        }
        
        .miei-prestiti {
            background-color: #d9ff01;
            color: white;
        }
        
        .cancel-button {
            background-color: #ff5252;
            color: white;
        }

        .abilitation-button {
            background-color: rgb(100,100,100);
            color: white;
        }
        
        button:hover {
            background-color: #555;
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
        <button id='mieiPrestiti' class="miei-prestiti">Mostra prestiti</button>
        <button id="Prenota" class="prenotation-button">Prenota/cancella un libro</button>
        <button id='mostra' class="cancel-button">mostra libri</button>
        <button id='abilita' class="abilitation-button">abilita utente</button>
    </div>
</body>
<script>
    let miei=document.getElementById('mieiPrestiti');
    let prenota=document.getElementById('Prenota');
    let mostra=document.getElementById('mostra');
    let abilita=document.getElementById('abilita');
    prenota.onclick=function(){
        window.location.href='gestore.php?action=prenota'
    }
    mostra.onclick=function(){
        window.location.href='gestore.php?action=mostra'
    }
    miei.onclick=function(){
        window.location.href='gestore.php?action=visualizza'
    }
    abilita.onclick=function(){
        window.location.href='abilita_utente.php'
    }
</script>
</html>
