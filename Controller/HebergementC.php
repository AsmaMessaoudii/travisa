include 'C:/wamp/www/travisa/config.php';
include 'C:/wamp/www/travisa/Controller/ReservationC.php';
include 'C:/wamp/www/travisa/Model/Hebergement.php';

class HebergementC {
  public function listHebergement() {
    $sql = "SELECT * FROM hébergement";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $hebergement = $query->fetchAll();
      
      return $hebergement;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
  }

  public function showHebergement($id) {
    $sql = "SELECT * FROM hébergement WHERE `id-héberge` = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
          ':id' => $id,
        ]);

        $hebergement = $query->fetch();
        return $hebergement;
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}

  function addHebergement($hebergement) {
    $sql = "INSERT INTO hébergement 
            VALUES (:id, :nom, :type, :description, :localisation, :categorie, :service)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        ':id' => $hebergement->getId(),
        ':nom' => $hebergement->getNom(),
        ':type' => $hebergement->getType(),
        ':description' => $hebergement->getDescription(),
        ':localisation' => $hebergement->getLocalisation(),
        ':categorie' => $hebergement->getCategorie(),
        ':service' => $hebergement->getServiceDispo(),
      ]);
    } catch (Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
    
  function updateHebergement($hebergement, $id) {
    $db = config::getConnexion();
    try {
      $query = $db->prepare(
        'UPDATE hébergement SET
            nom_Héberge = :nom, 
            type_héberge = :type,
            description-héberge = :description,
            localisation = :localisation,
            categorie = :categorie,
            serviceDispo = :service,
        WHERE id-héberge = :id'
      );

      $query->execute([
        ':id' => $id,
        ':nom' => $hebergement->getNom(),
        ':type' => $hebergement->getType(),
        ':description' => $hebergement->getDescription(),
        ':localisation' => $hebergement->getLocalisation(),
        ':categorie' => $hebergement->getCategorie(),
        ':service' => $hebergement->getServiceDispo(),
      ]);
      $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  function deleteHebergement($id) {
    $sql = "DELETE FROM hébergement WHERE `id-héberge` = :id";
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