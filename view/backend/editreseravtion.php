<?php
// Assuming you have a database connection established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the submitted form data
  $reservationId = $_POST['reservationId'];
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
    // Update the reservation data in the database
    $sql = "UPDATE reservations SET userId = :userId, voyageId = :voyageId, date = :date, participants = :participants, price = :price, status = :status, paymentMethod = :paymentMethod WHERE reservationId = :reservationId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':voyageId', $voyageId);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':participants', $participants);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':paymentMethod', $paymentMethod);
    $stmt->bindParam(':reservationId', $reservationId);

    if ($stmt->execute()) {
      // Successful update
      echo "Reservation updated successfully!";
    } else {
      // Failed to update
      echo "Failed to update reservation.";
    }
  } else {
    // Display validation errors
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}
?>