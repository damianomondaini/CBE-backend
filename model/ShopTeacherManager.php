<?php
require_once('Manager.php');

class ShopTeacherManager extends Manager
{
    public function addOrderDb($firstName, $lastName, $title, $amount, $design, $appointment)
    {
        if ($appointment != 1) {
            $appointment = 0;
        }
        $db = $this->dbConnect();
        $order = $db->prepare("INSERT INTO `carte_visite` (`id_carte_visite`, `nom`, `prenom`, `titre`, `nombre`, `rdv`, `etat`, `idx_enseignant`, `idx_eleve`, `idx_design`) VALUES (NULL, ?, ?, ?, ?, ?, '0', '2', '1', ?)");
        $affectedLines = $order->execute(array($lastName, $firstName, $title, $amount, $appointment, $design));
        return $affectedLines;
    }

    public function showOrders()
    {
        $db = $this->dbConnect();
        $orders = $db->prepare("SELECT carte_visite.id_carte_visite, carte_visite.nom, carte_visite.prenom, carte_visite.titre, carte_visite.nombre, carte_visite.rdv, carte_visite.etat, utilisateurs.nom AS nom_eleve, utilisateurs.prenom AS prenom_eleve FROM carte_visite INNER JOIN utilisateurs ON carte_visite.idx_eleve = utilisateurs.id_utilisateurs WHERE carte_visite.idx_enseignant = 2 ORDER BY carte_visite.id_carte_visite DESC");
        $orders->execute();

        return $orders;
    }
    public function declineOrderDb($orderId)
    {
        $db = $this->dbConnect();
        $order = $db->prepare("UPDATE carte_visite SET etat='3' WHERE id_carte_visite=?");
        $affectedLines = $order->execute(array($orderId));

        return $affectedLines;
    }
}