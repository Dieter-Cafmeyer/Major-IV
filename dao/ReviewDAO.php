<?php
require_once WWW_ROOT . 'dao' . DS . 'DAO.php';
class ReviewDAO extends DAO {

  public function selectAll() {
    $sql = "SELECT * FROM `book_reviews`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllReviewsAndUsers() {
    $sql = "SELECT book_reviews.*, book_users.* FROM book_reviews LEFT JOIN book_users ON book_reviews.userID = book_users.id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id) {
    $sql = "SELECT * FROM `book_reviews` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectAllByStatus($status) {
    $sql = "SELECT * FROM `book_reviews` WHERE `status` = :status";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':status', $status);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insert($userid, $review, $image) {
    $sql = "INSERT INTO `book_reviews` (`userID`, `image`, `review`, `status`) VALUES (:userid, :image, :review, :status)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':userid', $userid);
    $stmt->bindValue(':review', $review);
    $stmt->bindValue(':image', $image);
    $stmt->bindValue(':status', 0);
    if($stmt->execute()) {
      $insertedId = $this->pdo->lastInsertId();
      return $this->selectById($insertedId);
    }
  }
}
