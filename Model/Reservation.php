<?php

class Reservation {
  private ?int $idReservation = null;
  private ?int $idUser = null;
  private ?int $idVoy = null;
  private ?string $dateReserv = null;
  private ?int $nbParticipation = null;
  private ?float $prixTot = null;
  private ?string $status = null;
  private ?string $payMethode = null;

  public function __construct(
    $idReservation,
    $idUser,
    $idVoy,
    $dateReserv,
    $nbParticipation,
    $prixTot,
    $status,
    $payMethode
  ) {
    $this->idReservation = $idReservation;
    $this->idUser = $idUser;
    $this->idVoy = $idVoy;
    $this->dateReserv = $dateReserv;
    $this->nbParticipation = $nbParticipation;
    $this->prixTot = $prixTot;
    $this->status = $status;
    $this->payMethode = $payMethode;
  }

  public function getIdReservation() {
    return $this->idReservation;
  }

  public function getIdUser() {
    return $this->idUser;
  }

  public function getIdVoy() {
    return $this->idVoy;
  }

  public function getDateReserv() {
    return $this->dateReserv;
  }

  public function getNbParticipation() {
    return $this->nbParticipation;
  }

  public function getPrixTot() {
    return $this->prixTot;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getPayMethode() {
    return $this->payMethode;
  }

  public function setIdReservation($idReservation) {
    $this->idReservation = $idReservation;
  }

  public function setIdUser($idUser) {
    $this->idUser = $idUser;
  }

  public function setIdVoy($idVoy) {
    $this->idVoy = $idVoy;
  }

  public function setDateReserv($dateReserv) {
    $this->dateReserv = $dateReserv;
  }

  public function setNbParticipation($nbParticipation) {
    $this->nbParticipation = $nbParticipation;
  }

  public function setPrixTot($prixTot) {
    $this->prixTot = $prixTot;
  }

  public function setStatus($status) {
    $this->status = $status;
  }

  public function setPayMethode($payMethode) {
    $this->payMethode = $payMethode;
  }
}