<?php

class Hebergement {
  private ?int $idHebergement = null;
  private ?string $nom = null;
  private ?string $type = null;
  private ?string $description = null;
  private ?string $localisation = null;
  private ?string $categorie = null;
  private ?string $serviceDispo = null;

  public function __construct(
    $idHebergement,
    $nom,
    $type,
    $description,
    $localisation,
    $categorie,
    $serviceDispo
  ) {
    $this->idHebergement = $idHebergement;
    $this->nom = $nom;
    $this->type = $type;
    $this->description = $description;
    $this->localisation = $localisation;
    $this->categorie = $categorie;
    $this->serviceDispo = $serviceDispo;
  }

  public function getIdHebergement() {
    return $this->idHebergement;
  }

  public function getNom() {
    return $this->nom;
  }

  public function getType() {
    return $this->type;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getLocalisation() {
    return $this->localisation;
  }

  public function getCategorie() {
    return $this->categorie;
  }

  public function getServiceDispo() {
    return $this->serviceDispo;
  }

  public function setIdHebergement($idHebergement) {
    $this->idHebergement = $idHebergement;
  }

  public function setNom($nom) {
    $this->nom = $nom;
  }

  public function setType($type) {
    $this->type = $type;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function setLocalisation($localisation) {
    $this->localisation = $localisation;
  }

  public function setCategorie($categorie) {
    $this->categorie = $categorie;
  }

  public function setServiceDispo($serviceDispo) {
    $this->serviceDispo = $serviceDispo;
  }
}