<?php
// Assuming you have a database connection established

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the submitted form data
  $userId = $_POST['userId'];
  $voyageId = $_POST['voyageId'];
  $date = $_POST['date'];
  $participants = $_POST['participants'];
  $price = $_POST['price'];
  $status = $_POST['status'];
  $paymentMethod = $_POST['paymentMethod'];

  // Perform server-side validation
  $errors = [];

  if (empty($userId)) {
    $errors[] = "User ID is required.";
  }

  // Perform other validation checks...

  if (count($errors) === 0) {
    // Insert the reservation data into the database
    $sql = "INSERT INTO reservations (userId, voyageId, date, participants, price, status, paymentMethod) VALUES (:userId, :voyageId, :date, :participants, :price, :status, :paymentMethod)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':voyageId', $voyageId);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':participants', $participants);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':paymentMethod', $paymentMethod);

    if ($stmt->execute()) {
      // Successful insertion
      echo "Reservation added successfully!";
    } else {
      // Failed to insert
      echo "Failed to add reservation.";
    }
  } else {
    // Display validation errors
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}
?>