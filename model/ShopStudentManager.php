<?php
require_once('Manager.php');

class ShopStudentManager extends Manager
{
    public function showOrders()
    {
        $db = $this->dbConnect();
        $orders = $db->prepare("SELECT carte_visite.id_carte_visite, carte_visite.nom, carte_visite.prenom, carte_visite.titre, carte_visite.nombre, carte_visite.rdv, carte_visite.etat, utilisateurs.nom AS nom_enseignant, utilisateurs.prenom AS prenom_enseignant FROM carte_visite INNER JOIN utilisateurs ON carte_visite.idx_enseignant = utilisateurs.id_utilisateurs WHERE carte_visite.idx_eleve = 1 ORDER BY carte_visite.id_carte_visite DESC");
        $orders->execute();

        return $orders;
    }
}