<?php
include_once '../../database/database.php';
class Ordermodel
{
    public function fetchAll()
    {
        global $db;
        $query = "SELECT orders.order_id, orders.order_date, orders.status, orders.delivery_date, orders.user_id, users.Username, orders.discount
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id";

        try {
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function fetchOne($id)
    {
        global $db;
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }
        $query = "SELECT orders.order_id, orders.order_date, orders.status, orders.delivery_date, orders.user_id, users.Username, orders.discount
              FROM orders
              INNER JOIN users ON orders.user_id = users.user_id
              WHERE orders.order_id = :id";
        try {
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function updateOrder($values)
    {
        global $db;
        if (!is_array($values) || empty($values)) {
            return false;
        }
        $query = "UPDATE orders SET ";
        $setClauses = [];
        foreach ($values as $key => $value) {
            $allowedFields = ['Table_id', 'User_id', 'time'];
            if (in_array($key, $allowedFields)) {
                $setClauses[] = "$key = :$key";
            }
        }
        if (empty($setClauses)) {
            return false;
        }
        $query .= implode(', ', $setClauses);
        $query .= " WHERE Order_id = :Order_id";
        $values['Order_id'] = $values['Order_id'] ?? null;
        try {
            $stmt = $db->prepare($query);
            $stmt->execute($values);
            return true;
        } catch (PDOException $e) {
            echo "Lỗi cập nhật: " . $e->getMessage();
            return false;
        }
    }
    public function createOrder($values)
    {
        global $db;
        if (!is_array($values) || empty($values)) {
            return false;
        }
        $query = "INSERT INTO orders (Table_id, User_id, time) VALUES (:Table_id, :User_id, :time)";
        try {
            $stmt = $db->prepare($query);
            $stmt->execute($values);
            return true;
        } catch (PDOException $e) {
            echo "Lỗi thêm mới đơn hàng: " . $e->getMessage();
            return false;
        }
    }
    public function deleteOrder($id)
    {
        global $db;
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }
        $query = "DELETE FROM orders WHERE Order_id = :Order_id";
        try {
            $stmt = $db->prepare($query);
            $stmt->bindParam(':Order_id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi xóa đơn hàng: " . $e->getMessage();
            return false;
        }
    }
}
