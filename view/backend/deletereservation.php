<?php
// Assuming you have a database connection established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $reservationId = $_POST['reservationId'];

  // Delete the reservation from the database
  $sql = "DELETE FROM reservations WHERE reservationId = :reservationId";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':reservationId', $reservationId);

  if ($stmt->execute()) {
    // Successful deletion
    echo "Reservation deleted successfully!";
  } else {
    // Failed to delete
    echo "Failed to delete reservation.";
  }
}
?>