<?php
require_once WWW_ROOT . 'dao' . DS . 'DAO.php';
class OrderDAO extends DAO {

	public function selectAll() {
		$sql = "SELECT * FROM `book_orders`";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function selectById($id) {
		$sql = "SELECT * FROM `book_orders` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insert($data) {
		$sql = "INSERT INTO `book_orders` (`userID`) VALUES (:userID)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':userID', $data['id']);
		if($stmt->execute()) {
			$insertedId = $this->pdo->lastInsertId();
			return $this->selectById($insertedId);
		}
	}
}
