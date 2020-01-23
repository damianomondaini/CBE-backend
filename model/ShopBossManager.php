<?php
require_once('Manager.php');

class ShopBossManager extends Manager
{
    public function showOrders()
    {
        $db = $this->dbConnect();
        $unassignedOrders = $db->prepare("SELECT carte_visite.id_carte_visite, carte_visite.nom, carte_visite.prenom, carte_visite.titre, carte_visite.nombre, carte_visite.rdv, carte_visite.etat FROM carte_visite INNER JOIN utilisateurs ON carte_visite.idx_enseignant = utilisateurs.id_utilisateurs WHERE carte_visite.idx_eleve IS NULL ORDER BY carte_visite.id_carte_visite DESC");
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
}