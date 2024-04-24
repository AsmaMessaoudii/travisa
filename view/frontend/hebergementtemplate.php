<?php

include include 'C:/wamp/www/travisa/Controller/HebergementC.php';

session_start();

// Check if the session variables are already set
if (isset($_SESSION['hebergementId'], $_SESSION['nom'], $_SESSION['type'], $_SESSION['description'], $_SESSION['localisation'], $_SESSION['categorie'], $_SESSION['services'])) {
    // Retrieve the selected hébergement ID from the session
    $hebergementId = $_SESSION['hebergementId'];

    // Include the necessary files
    require_once 'C:/wamp/www/travisa/Model/Hebergement.php';
    require_once 'C:/wamp/www/travisa/Controller/HebergementC.php';

    // Instantiate the HebergementC class
    $hebergementC = new HebergementC();
    // Fetch the hébergement based on the ID
    $hebergement = $hebergementC->showHebergement($hebergementId);

    // Check if the fetched hébergement matches the one stored in the session
    if ($hebergement && $hebergement['nom_Héberge'] === $_SESSION['nom']) {
        // Assign hébergement data to variables
        $nom = $_SESSION['nom'];
        $type = $_SESSION['type'];
        $description = $_SESSION['description'];
        $localisation = $_SESSION['localisation'];
        $categorie = $_SESSION['categorie'];
        $services = $_SESSION['services'];
    } else {
        // Clear session variables and redirect to an error page or display an error message
        session_unset();
        session_destroy();
        header('Location: error.php');
        exit;
    }
} else {
    // Redirect to an error page or display an error message
    header('Location: error.php');
    exit;
}
?>

<!DOCTYPE html>
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