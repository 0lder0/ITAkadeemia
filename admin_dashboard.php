<?php
session_set_cookie_params([
    'secure' => true, 
    'httponly' => true 
]);

session_start();
session_regenerate_id(true);

// Check if the user is not logged in
if (!isset($_SESSION['loggedin'])) {
    // Redirect to admin login page
    header("Location: admin_login.html");
    exit;
}

// Logout functionality
if (isset($_GET['logout'])) {
    // Destroy the session data
    session_destroy();

    // Redirect to the login page after logout
    header("Location: admin_login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <title>Tartu Rakenduslik Kolledž - IT Akadeemia</title>
</head>

<body id="admin-body">
<div class="admin-navbar">
    <h1>Admin Dashboard</h1>
    <a href="?logout=true">Logout</a>
</div>

<div class="admin-container">
    <div class="admin-content">
        <div class="admin-content-left">
            <div class="admin-events">
                <h2>Sündmused</h2>
                <p class="admin-desc">Siin saad vaadata ja lisada sündmuseid kalendrisse</p>
                <div class="admin-buttons">
                    <button class="lisainfo_button">Vaata ja kustuta sündmuseid</button>
                    <button id="new-event" class="lisainfo_button">Lisa uusi sündmuseid</button>
                </div>
            </div>
            <div class="admin-competitions">
                <h2>Kutsemeistrivõistlused</h2>
                <p class="admin-desc">Siin saad vaadata ja lisada infot kutsemeistrivõistluste kohta</p>
                <div class="admin-buttons">
                    <button class="lisainfo_button">Vaata ja kustuta võistluste infot</button>
                    <button class="lisainfo_button">Lisa võistluseid</button>
                </div>
            </div>
            <div class="admin-acknowledgements">
                <h2>Tunnustused</h2>
                <p class="admin-desc">Siin saad vaadata ja lisada IT Akadeemia õpetajate ja õpilaste tunnustusi</p>
                <div class="admin-buttons">
                    <button class="lisainfo_button">Vaata ja kustuta tunnustusi</button>
                    <button class="lisainfo_button">Lisa uusi tunnustusi</button>
                </div>
            </div>

        </div>
        <div class="admin-content-right">
            <h2>IT Akadeemia veebilehe administraator</h2>
            <p>Siin veebilehel saab administraator hallata Tartu Rakendusliku Kolledži IT Akadeemia veebilehel olevat infot. Näiteks saab administraator lisada sündmuste kalendrisse uusi sündmuseid.</p>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="addEventModal">
    <div class="modal-content">
        <span class="close-modal-btn">&times;</span>
        <h2>Lisa uus sündmus</h2>
        <form action="postEvents.php" class="modalForm" id="eventForm" method="post">
            <label for="eventName">Sündmuse nimi:</label>
            <input type="text" id="eventName" name="eventName" required>

            <label for="eventDescription">Sündmuse kirjeldus:</label>
            <textarea id="eventDescription" name="eventDescription" rows="4" required></textarea>

            <label for="eventDate">Sündmuse kuupäev:</label>
            <input type="date" id="eventDate" name="eventDate" required>

            <button type="submit">Lisa sündmus</button>
        </form>
    </div>
</div>
<script>

    document.getElementById("new-event").addEventListener("click", function() {
        document.getElementById("addEventModal").style.display = "block";
    });

    document.getElementsByClassName("close-modal-btn")[0].addEventListener("click", function() {
        document.getElementById("addEventModal").style.display = "none";
    });

</script>
</body>

</html>