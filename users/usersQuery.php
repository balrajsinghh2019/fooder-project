<?php

include '../commons/Connection.php';

class UsersQuery extends Connection {
  private $conn;

  function __construct()
  {
    $instance = Connection::getInstance();
    $this->conn = $instance->getConnection();
  }

  /**
   * Function used to get all records from user entity.
   *
   * @return array of user details
   */
  public function getAllUserDetails()
  {
    $details = [];
    $stmt = $this->conn->prepare("SELECT id, name, favorite_food, email, budget, locked FROM users where role_id != 2");
    $stmt->execute();
    $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $details;
  }

  /**
   * Function used to get all records from user entity.
   */
  public function getAllRecipes()
  {
    $details = [];
    $stmt = $this->conn->prepare("SELECT id, title, image_link, price_range_start, price_range_ends, locked FROM recipes");
    $stmt->execute();
    $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $details;
  }

  /**
   * Function use to lock unlock array of users.
   *
   * @return array of user ids.
   */
  public function lockUnclockUsers($uids)
  {
    // Get locked ids
    $stmt = $this->conn->prepare("SELECT id FROM users");
    $stmt->execute();
    $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $unlockUsers = [];
    $lockUsers = [];
    $lockUsers = array_keys($uids);
    foreach ($details as $key => $value) {
      // $allUsers[] = $value['id'];
      if (empty($lockUsers)) {
        $unlockUsers[] = $value['id'];
      }
      else if (!in_array($value['id'], $lockUsers)) {
        $unlockUsers[] = $value['id'];
      }
    }
    foreach ($lockUsers as $key => $value) {
      $stmt = $this->conn->prepare("UPDATE users SET `locked` = 1 where `id` = :id");
      $stmt->bindParam(':id', $value, PDO::PARAM_INT);
      $stmt->execute();
    }

    // unlocking users.
    foreach ($unlockUsers as $key => $value) {
      $stmt = $this->conn->prepare("UPDATE users SET `locked` = 0 where `id` = :id");
      $stmt->bindParam(':id', $value, PDO::PARAM_INT);
      $stmt->execute();
    }
  }

  /**
   * Function use to lock unlock array of recipe.
   */
  public function lockUnclockRecipe($uids)
  {
    // Get locked ids
    $stmt = $this->conn->prepare("SELECT id FROM recipes");
    $stmt->execute();
    $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $unlockUsers = [];
    $lockUsers = [];
    $lockUsers = array_keys($uids);

    foreach ($details as $key => $value) {
      // $allUsers[] = $value['id'];
      if (empty($lockUsers)) {
        $unlockUsers[] = $value['id'];
      }
      else if (!in_array($value['id'], $lockUsers)) {
        $unlockUsers[] = $value['id'];
      }
    }

    // locking users.
    foreach ($lockUsers as $key => $value) {
      $stmt = $this->conn->prepare("UPDATE recipes SET `locked` = 1 where `id` = :id");
      $stmt->bindParam(':id', $value, PDO::PARAM_INT);
      $stmt->execute();
    }

    // unlocking users.
    foreach ($unlockUsers as $key => $value) {
      $stmt = $this->conn->prepare("UPDATE recipes SET `locked` = 0 where `id` = :id");
      $stmt->bindParam(':id', $value, PDO::PARAM_INT);
      $stmt->execute();
    }

  }
}
