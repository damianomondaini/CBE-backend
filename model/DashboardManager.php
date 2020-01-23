<?php
require_once('Manager.php');

class DashboardManager extends Manager
{
    public function showAdminOrders()
    {
        $db = $this->dbConnect();
        $unassignedOrders = $db->prepare("SELECT carte_visite.id_carte_visite, carte_visite.nom, carte_visite.prenom, carte_visite.titre, carte_visite.nombre, carte_visite.rdv, carte_visite.etat FROM carte_visite INNER JOIN utilisateurs ON carte_visite.idx_enseignant = utilisateurs.id_utilisateurs WHERE carte_visite.idx_eleve IS NULL AND carte_visite.etat != 3 ORDER BY carte_visite.id_carte_visite DESC");
        $unassignedOrders->execute();

        return $unassignedOrders;
    }

    public function getStudents()
    {
        $db = $this->dbConnect();
        $students = $db->prepare("SELECT utilisateurs.id_utilisateurs, utilisateurs.prenom, utilisateurs.nom FROM utilisateurs WHERE utilisateurs.role = 0 ORDER BY utilisateurs.prenom ASC");
        $students->execute();

        return $students;
    }

    public function assignUserDb($idOrder, $idUser)
    {
        $db = $this->dbConnect();
        $user = $db->prepare("UPDATE carte_visite  SET idx_eleve = ? WHERE carte_visite.id_carte_visite = ?");
        $user->execute(array($idUser, $idOrder));

        return $user;
    }
    public function showStudentOrders()
    {
        $db = $this->dbConnect();
        $orders = $db->prepare("SELECT carte_visite.id_carte_visite, carte_visite.nom, carte_visite.prenom, carte_visite.titre, carte_visite.nombre, carte_visite.rdv, carte_visite.etat, utilisateurs.nom AS nom_enseignant, utilisateurs.prenom AS prenom_enseignant FROM carte_visite INNER JOIN utilisateurs ON carte_visite.idx_enseignant = utilisateurs.id_utilisateurs WHERE carte_visite.idx_eleve = 1 ORDER BY carte_visite.id_carte_visite DESC");
        $orders->execute();

        return $orders;
    }
    public function addOrderDb($firstName, $lastName, $title, $amount, $design, $appointment)
    {
        if ($appointment != 1) {
            $appointment = 0;
        }
        $db = $this->dbConnect();
        $order = $db->prepare("INSERT INTO `carte_visite` (`id_carte_visite`, `nom`, `prenom`, `titre`, `nombre`, `rdv`, `etat`, `idx_enseignant`, `idx_eleve`, `idx_design`) VALUES (NULL, ?, ?, ?, ?, ?, '0', '2', NULL, ?)");
        $affectedLines = $order->execute(array($lastName, $firstName, $title, $amount, $appointment, $design));
        return $affectedLines;
    }

    public function showCustomerOrders()
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
    public function validateOrderDb($orderId)
    {
        $db = $this->dbConnect();
        $order = $db->prepare("UPDATE carte_visite SET etat='1' WHERE id_carte_visite=?");
        $affectedLines = $order->execute(array($orderId));

        return $affectedLines;
    }
}