<?php

include 'Connection.php';

class Queries extends Connection {
  private $conn;

  function __construct()
  {
    $instance = Connection::getInstance();
    $this->conn = $instance->getConnection();
  }

  /**
   * Function used to get all records from a table.
   *
   * @param $table is the table name.
   *
   */
  public function getRecords($table)
  {
    $stmt = $this->conn->prepare("SELECT * FROM " . $table);
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $arr;
  }

  /**
   * Function used to validate user.
   *
   * @param $email user email.
   * @param $pass user password.
   *
   * @return boolean
   */
  public function validateUser($email, $pass)
  {
    if (!empty($email) && !empty($pass)) {
      $stmt = $this->conn->prepare("SELECT id, role_id FROM users WHERE locked != 1 AND email=:email AND password=:password");
      $stmt->execute([
        'email' => $email,
        'password' => $pass
      ]); 
      $stmt->execute();
      $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (!empty($arr[0]['id'])) {

        // setting cookie and session as same for verification for further calls inside dashboard.
        setcookie("_user", $arr[0]['id'], time() + 2 * 24 * 60 * 60, "/");

        session_start();
        // header('Location: {$baseURL}/dashboard/index.php');
        $_SESSION["_user"] = $arr[0]['id'];
        $_SESSION["_role_id"] = $arr[0]['role_id'];
        return [$arr[0]['id'], $arr[0]['role_id']];
      }
      else {
        return false;  
      }
    }
    else {
      return false;
    }
  }

  /**
   * Function used to get all records from user entity.
   *
   * @param $user_id user id.
   *
   * @return array of user details
   */
  public function getUserDetails($user_id)
  {
    $details = [];
    if (!empty($user_id)) {
      $stmt = $this->conn->prepare("SELECT * FROM users WHERE id=:id");
      $stmt->bindValue(":id", $user_id);
      $stmt->execute();
      $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $details;
  }

  /**
   * Function used to set a info for a user entity.
   *
   * @param contain user id and new detail
   *
   * @return boolean
   */
  public function updateUserEmail($param)
  {
    $stmt = $this->conn->prepare("UPDATE users SET email = :email WHERE id = :id");
    $stmt->bindParam(':id', $param['id'], PDO::PARAM_INT);
    $stmt->bindParam(':email', $param['email']);
    if ($stmt->execute()) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Function used to set a info for a user entity.
   *
   * @param contain user id and new detail
   *
   * @return boolean
   */
  public function updateUserPassword($param)
  {
    $stmt = $this->conn->prepare("UPDATE users SET password = :password WHERE id = :id");
    $stmt->bindParam(':id', $param['id'], PDO::PARAM_INT);
    $stmt->bindParam(':password', $param['password']);
    if ($stmt->execute()) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Function used to set a info for a user entity.
   *
   * @param contain user id and new detail
   *
   * @return boolean
   */
  public function updateUserName($param)
  {
    $stmt = $this->conn->prepare("UPDATE users SET name = :name WHERE id = :id");
    $stmt->bindParam(':id', $param['id'], PDO::PARAM_INT);
    $stmt->bindParam(':name', $param['name']);
    if ($stmt->execute()) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Function used to set a info for a user entity.
   *
   * @param contain user id and new detail
   *
   * @return boolean
   */
  public function updateUserBudget($param)
  {
    $stmt = $this->conn->prepare("UPDATE users SET budget = :budget WHERE id = :id");
    $stmt->bindParam(':id', $param['id'], PDO::PARAM_INT);
    $stmt->bindParam(':budget', $param['budget']);
    if ($stmt->execute()) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Function used to set a info for a user entity.
   *
   * @param contain user id and new detail
   *
   * @return boolean
   */
  public function updateUserDescription($param)
  {
    $stmt = $this->conn->prepare("UPDATE users SET favorite_food = :favorite_food WHERE id = :id");
    $stmt->bindParam(':id', $param['id'], PDO::PARAM_INT);
    $stmt->bindParam(':favorite_food', $param['favorite_food']);
    if ($stmt->execute()) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Function used to delte a user field.
   *
   * @param $field user table field name
   * @param $userId user id
   *
   * @return boolean
   */
  public function deleteAUserField($field, $userId)
  {
    $e = '';
    $stmt = $this->conn->prepare("UPDATE users SET " . $field . " = :field WHERE id = :id");
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':field', $e);
    if ($stmt->execute()) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Function used to create a user.
   *
   * @param $name user name
   * @param $email user email
   * @param $password user password
   *
   * @return boolean
   */
  public function createUser($name, $email, $password)
  {
    $e = '';
    $stmt = $this->conn->prepare("INSERT INTO users (name, email, password, role_id, active, locked) VALUES (?,?,?,?,?,?)");
    if ($stmt->execute([$name, $email, $password, 1, 1, 0])) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Function used to insert records into a table.
   *
   * $sql required statement as '$sql = 'INSERT INTO students (student_name, student_description, student_city, student_qualification,student_gender) 
   *  VALUES (:name, :description, :city, :qualification, :gender)';.
   *
   * $post required array as  array(
   *         ':name' => $post['name'],
   *         ':description' => $post['description'],
   *         ':city' => $post['city'],
   *         ':qualification' => json_encode($post['qualification'], TRUE),
   *         ':gender' => $post['gender']
   *         )
   */
  public function insertRecords($sql, $post) {
    // $sql = 'INSERT INTO students (student_name, student_description, student_city, student_qualification, student_gender) 
    //   VALUES (:name, :description, :city, :qualification, :gender)';
    if(!empty($post) && !empty($sql)) {
    
    // Prepare query
      $query = $this->conn->prepare($sql);
      try {
        // Execute query
        $query->execute($post);
        $submitStatus = true;
      }
      catch (PDOException $e) {
        echo "Information not submitted.";
      }
    } 
  }

  // // function to change JSON string into an <ol> ordered list
  // public function build_list($array) {
  //   $new_array = json_decode($array, TRUE);
  //   if (is_array($new_array)) {
  //     $list = '<ul>';
  //     foreach($new_array as $key => $value) {
  //         if (is_array($value)) {
  //             $list .= "<strong>$key</strong>: " . build_list($value);
  //         } else {
  //             $list .= "<li><strong>$key</strong>: $value</li>";
  //         }
  //     }
  //     $list .= '</ul>';
  //     return $list;
  //   }
  //   else {
  //     return $array;
  //   }
  // } 


  // function to retrieve all the recipes that match the keyword
  public function getSearchResults($keyword){
    // bind wildcards to keyword
    $keyword = '%' . $keyword . '%';
    $stmt = $this->conn->prepare("SELECT * FROM recipes WHERE title LIKE :keyword AND locked != 1");
    $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $stmt->execute();
    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
    
    return $recipes;
  }



  // function to retrieve all the recipes below certain budget (price_range_ends)
  public function getRecipes($userID){

    // fetch the user from the userID
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id AND locked != 1");
    $stmt->bindParam(':id', $userID, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // get the budget from the user object
    $this->budget = $user['budget'];
    

    $stmt = $this->conn->prepare("SELECT * FROM recipes WHERE price_range_ends <= :budget AND locked != 1");
    $stmt->bindParam(':budget', $this->budget, PDO::PARAM_INT);
    $stmt->execute();
    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $recipes;
  }

  public function addPost($arr) {
    $stmt = $this->conn->prepare("INSERT INTO recipes (title, image_link, body, price_range_start, price_range_ends, time_to_cook, posted_by) VALUES (?,?,?,?,?,?,?)");
    if ($stmt->execute([
      $arr['title'], 
      $arr['image'], 
      $arr['description'], 
      $arr['price_range_starts'], 
      $arr['price_range_ends'], 
      $arr['minutes_to_prepare'],
      $arr['uid']
    ])) {
      return true;
    }
    else {
      return false;
    }
  }

}