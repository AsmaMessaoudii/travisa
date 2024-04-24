<?php
session_start(); // Start the session
include include 'C:/wamp/www/travisa/Controller/ReservationC.php';

// Function to sanitize user input
function sanitize($input) {
  return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Generate a new session ID and invalidate the old one
function regenerateSession() {
  // Copy the current session ID and close the session
  $newSessionId = session_create_id();
  session_write_close();

  // Set the new session ID and start the session with it
  session_id($newSessionId);
  session_start();
}

// Check if the session variables are already set
if (isset($_SESSION['reservationId'], $_SESSION['userId'], $_SESSION['voyageId'], $_SESSION['date'], $_SESSION['participants'], $_SESSION['price'], $_SESSION['status'], $_SESSION['paymentMethod'])) {
  // Retrieve the reservation data from the session and sanitize the values
  $reservationId = sanitize($_SESSION['reservationId']);
  $userId = sanitize($_SESSION['userId']);
  $voyageId = sanitize($_SESSION['voyageId']);
  $date = sanitize($_SESSION['date']);
  $participants = sanitize($_SESSION['participants']);
  $price = sanitize($_SESSION['price']);
  $status = sanitize($_SESSION['status']);
  $paymentMethod = sanitize($_SESSION['paymentMethod']);

  // Validate the session ID to prevent session hijacking
  if ($_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT'] || $_SESSION['remote_addr'] !== $_SERVER['REMOTE_ADDR']) {
    // Regenerate the session ID and invalidate the old one
    regenerateSession();

    // Redirect to an error page or display an error message
    header('Location: error.php');
    exit;
  }
} else {
  // Redirect to an error page or display an error message
  header('Location: error.php');
  exit;
}
?>

<<!DOCTYPE html>
<html>
<head>
  <title>My Website</title>
</head>
<body>
  <h1>Welcome to My Website!</h1>
  <p>This is the homepage of my website. Feel free to explore and navigate through the different sections.</p>

  <h2>Reservation Details</h2>
  <p>Reservation ID: <?php echo $reservationId; ?></p>
  <p>User ID: <?php echo $userId; ?></p>
  <p>Voyage ID: <?php echo $voyageId; ?></p>
  <p>Date: <?php echo $date; ?></p>
  <p>Number of Participants: <?php echo $participants; ?></p>
  <p>Total Price: <?php echo $price; ?></p>
  <p>Status: <?php echo $status; ?></p>
  <p>Payment Method: <?php echo $paymentMethod; ?></p>

  <h2>Hébergement Details</h2>
  <p>Hébergement ID: <?php echo $hebergementId; ?></p>
  <p>Nom: <?php echo $nom; ?></p>
  <p>Type: <?php echo $type; ?></p>
  <p>Description: <?php echo $description; ?></p>
  <p>Localisation: <?php echo $localisation; ?></p>
  <p>Categorie: <?php echo $categorie; ?></p>
  <p>Services: <?php echo $services; ?></p>

  <footer>
    <p>© 2024 My Website. All rights reserved.</p>
  </footer>
</body>
</html>