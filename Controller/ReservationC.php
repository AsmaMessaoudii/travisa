include 'C:/wamp/www/travisa/config.php';
include 'C:/wamp/www/travisa/Model/Reservation.php';
include 'C:/wamp/www/travisa/Controller/HebergementC.php';


class ReservationC {
  public function listReservations() {
    $sql = "SELECT * FROM réservation";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $reservations = $query->fetchAll();
      
      return $reservations;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
  }

  function showReservation($id) {
    $sql = "SELECT * FROM réservation WHERE `id_réserv` = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
          ':id' => $id,
        ]);

        $reservation = $query->fetch();
        return $reservation;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
  }

  function addReservation($reservation) {
    $sql = "INSERT INTO réservation 
            VALUES (:id, :idUser, :idVoy, :dateReserv, :nbParticipation, :prixTot, :status, :payMethode)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        ':id' => $reservation->getId(),
        ':idUser' => $reservation->getUserId(),
        ':idVoy' => $reservation->getVoyId(),
        ':dateReserv' => $reservation->getDateReserv(),
        ':nbParticipation' => $reservation->getNbParticipation(),
        ':prixTot' => $reservation->getPrixTot(),
        ':status' => $reservation->getStatus(),
        ':payMethode' => $reservation->getPayMethode(),
      ]);
    } catch (Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
    
  function updateReservation($reservation, $id) {
    $db = config::getConnexion();
    try {
      $query = $db->prepare(
        "UPDATE réservation SET
            `id_user` = :idUser, 
            `id_voy` = :idVoy,
            `date_Réserv` = :dateReserv,
            `nb_Participation` = :nbParticipation,
            `prixTot` = :prixTot,
            `status` = :status,
            `pay_methode` = :payMethode
        WHERE `id_réserv` = :id"
      );

      $query->execute([
        ':id' => $id,
        ':idUser' => $reservation->getUserId(),
        ':idVoy' => $reservation->getVoyId(),
        ':dateReserv' => $reservation->getDateReserv(),
        ':nbParticipation' => $reservation->getNbParticipation(),
        ':prixTot' => $reservation->getPrixTot(),
        ':status' => $reservation->getStatus(),
        ':payMethode' => $reservation->getPayMethode(),
      ]);
      $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  function deleteReservation($id) {
    $sql = "DELETE FROM réservation WHERE `id_réserv` = :id";
    $db = config::getConnexion();

    try {
      $req = $db->prepare($sql);
      $req->bindValue(':id', $id);
      $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
  }
}