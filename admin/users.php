<?php include 'inc/session.php'; ?>
<?php include 'inc/dbconfig.php'; ?>
<?php 
  $type = "users";
  $tablename = $type;
 ?>
  <?php include 'inc/header.php'; ?>
  <?php
  //create users part
  if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    // echo "<pre>";
    // print_r($user['fullname']);
    // echo "</pre>";
    // exit;
    if(!empty($fullname)){
      $sql = "INSERT INTO $tablename(fullname,username,email,status,password) VALUES('$fullname','$username','$password','$email','$status')";
      $query = $conn->query($sql);
      if($query){
        $_SESSION['success'] = "data inserted successfully";
        header("location:users.php");
        exit;
      }else{
        $_SESSION['error'] = "input all the data";
        header("location:users.php?new");
        exit;
      }

    }else{
      $_SESSION['error'] = "fullname can't be blank";
      header("location:users.php?new");
      exit;

    }

  }
  // code for deleting data
  if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql = "DELETE FROM $tablename WHERE id = $id";
    // echo $sql;
    // exit;
    $query = $conn->query($sql);
    if($query){
      $_SESSION['success'] = "data deleted successfully";
      header("location:users.php");
      exit;
    }else{
      $_SESSION['error'] = "error deleting data";
      header("location:users.php");
      exit;
    }
    
  }
   // code for editing data
  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM $tablename WHERE  id = $id";
    $query = $conn->query($sql);
    $editData = $query->fetch_assoc();
    // print_r($editData);
    // exit;
  }
if(isset($_POST['save'])){
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $status = $_POST['status'];
  $edit_id = $_POST['edit_id'];
  $sql = "UPDATE  $tablename SET  fullname = '$fullname' , username = '$username' , password = sha1('$password'), email = '$email' , status = '$status' WHERE id = $edit_id";
  //print_r($_POST);
  //  print_r($sql);
  //    exit;
  $query = $conn->query($sql);
  if($query){
    $_SESSION['success'] = "data edited successfully";
    header("location:users.php");
    exit;
  }else{
    $_SESSION['error'] = "error updating  the data";
    header("location:users.php");
    exit;
  }
  
}
  //search and datalist 
    if(isset($_POST['search'])){
      $searchBy = $_POST['searchBy'];
      $searchKey = $_POST['searchKey'];
     //print_r($_POST);
      $sql = "SELECT * FROM $tablename WHERE $searchBy like '%$searchKey%'";
      $query = $conn->query($sql);
      if($query){
        if($query->num_rows > 0 ){
          $count = $query->num_rows;
          $users = array();
          while($row = $query->fetch_assoc()){
            $users[] = $row;
          }
        }else{
          $users = "No record found";
        }
      }
    }else{
      $sql = "SELECT * FROM $tablename";
      $query = $conn->query($sql);
      if($query){
        if($query->num_rows > 0 ){
          $count = $query->num_rows;
          $users = array();
          while($row = $query->fetch_assoc()){
            $users[] = $row;
          }
        }else{
          $users = "No record found";
        }
      }
    }
    //print_r($data);
  ?>
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="index.php">Dashboard</a> <span>&gt;</span> Current <?php echo $type; ?> </div>
    <!-- End Small Nav -->
    <?php include 'inc/message.php'; ?>
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content">
        <!-- Box -->
        <a href="?new" class="add-button"><span>Add New <?php echo ucfirst($type); ?></span></a>
        <br>
        <br>
        <br>
      <?php
        if(isset($_GET['new']) || isset($_GET['edit'])){
          include "manager/$type/form.php";
        }else{
          include "manager/$type/search.php";
          include "manager/$type/datalist.php";
        }
      ?>
        <!-- End Box -->
        <!-- Box -->
      
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <!-- Sidebar -->
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
    </div>
    <!-- Main -->
  </div>
  <?php include 'inc/footer.php'; ?>