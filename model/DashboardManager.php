<?php
require_once('Manager.php');

class DashboardManager extends Manager
{
    public function showAdminOrders()
    {
        $db = $this->dbConnect();
        $unassignedOrders = $db->prepare("SELECT orders.id_order, orders.value, orders.amount, order_status.name AS status, products.name AS product_name FROM orders INNER JOIN users ON orders.idx_customer = users.id_user INNER JOIN order_status ON orders.idx_status = order_status.id_order_status INNER JOIN products ON orders.idx_product = products.id_product WHERE idx_cbe_student IS NULL ORDER BY orders.id_order");
        $unassignedOrders->execute();

        return $unassignedOrders;
    }

    public function getStudents()
    {
        $db = $this->dbConnect();
        $students = $db->prepare("SELECT users.id_user, users.name, users.surname FROM users WHERE users.idx_role = 1 ORDER BY users.name ASC");
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
        $orders = $db->prepare("SELECT orders.id_order, orders.amount, orders.value, orders.idx_status, users.name AS customer_name, users.surname AS customer_surname, products.name AS product_name, order_status.name AS status FROM orders INNER JOIN users ON orders.idx_customer = users.id_user INNER JOIN products ON orders.idx_product = products.id_product INNER JOIN order_status ON orders.idx_status = order_status.id_order_status WHERE orders.idx_cbe_student = 1 ORDER BY orders.id_order ASC");
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
        $orders = $db->prepare("SELECT id_order, amount, value, users.name AS student_name, users.surname AS student_surname, products.name AS product_name, order_status.name AS status, orders.idx_status FROM orders LEFT JOIN users ON orders.idx_cbe_student = users.id_user INNER JOIN products ON orders.idx_product = products.id_product INNER JOIN order_status ON orders.idx_status = order_status.id_order_status WHERE orders.idx_customer = 3 ORDER BY orders.id_order ASC");
        $orders->execute();

        return $orders;
    }
}