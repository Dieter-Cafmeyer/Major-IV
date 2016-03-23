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

  /*public function insert($data) {
    $errors = $this->getValidationErrors($data);
    if(empty($errors)) {
      $sql = "INSERT INTO `book_orders` (`created`, `author`, `text`) VALUES (:created, :author, :text)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':created', $data['created']);
      $stmt->bindValue(':author', $data['author']);
      $stmt->bindValue(':text', $data['text']);
      if($stmt->execute()) {
        $insertedId = $this->pdo->lastInsertId();
        return $this->selectById($insertedId);
      }
    }
    return false;
  }*/

  public function getValidationErrors($data) {
    $errors = array();
    if(empty($data['created'])) {
      $errors['created'] = 'Please enter a created date';
    }
    if(empty($data['author'])) {
      $errors['author'] = 'Please enter an author';
    }
    if(empty($data['text'])) {
      $errors['text'] = 'Please enter a text';
    }
    return $errors;
  }
}
