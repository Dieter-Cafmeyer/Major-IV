<?php
require_once WWW_ROOT . 'dao' . DS . 'DAO.php';
class UsersDAO extends DAO {

	public function selectAll() {
		$sql = "SELECT * FROM `book_users`";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function selectById($id) {
		$sql = "SELECT * FROM `book_users` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function loginCheck($data) {
		$sql = "SELECT * FROM `book_users` WHERE `email` = :email AND `password` = :password";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':email', $data['email']);
		$stmt->bindValue(':password', $data['wachtwoord']);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insert($data) {
		$sql = "INSERT INTO `book_users` (`firstname`, `lastname`, `email`, `password`, `school`, `klas`, `is_admin`) VALUES (:firstname, :lastname, :email, :password, :school, :klas, :is_admin)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':firstname', $data['voornaam']);
		$stmt->bindValue(':lastname', $data['achternaam']);
		$stmt->bindValue(':email', $data['email']);
		$stmt->bindValue(':password', $data['wachtwoord']);
		$stmt->bindValue(':school', $data['school']);
		$stmt->bindValue(':klas', $data['klas']);
		$stmt->bindValue(':is_admin', 0);
		if($stmt->execute()) {
			$insertedId = $this->pdo->lastInsertId();
			return $this->selectById($insertedId);
		}
	}
}
