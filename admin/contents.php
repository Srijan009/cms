<?php include 'inc/session.php'; ?>
<?php include 'inc/dbconfig.php'; ?>
<?php include 'inc/functions.php'; ?>
<?php 
  $type = "contents";
  $tablename = $type;
 ?>
  <?php include 'inc/header.php'; ?>
  <?php
  //create users part
  if(isset($_POST['create'])){
    //debugger($_POST,true);
    $page_id = $_POST['page_id'];    
    $title = $_POST['title'];
    $url = $_POST['url'];
    $seotitle = $_POST['seotitle'];
    $seodesc = $_POST['seodesc'];
    $image = $_FILES['image'];
    $summary = $_POST['summary'];
    $detail = $_POST['detail'];
      //debugger($image,true);
      // image path
    $image_path = "../images/contents/";
    if(!empty($image['name'])){
      $move = move_uploaded_file($image['tmp_name'],$image_path.$image['name']);
    }
    if($move){
      $image_name = $image['name'];
    }
    
   // debugger($_FILES,true);
    // echo "<pre>";
    // print_r($user['fullname']);
    // echo "</pre>";
    // exit;
    if(!empty($title)){
      $sql = "INSERT INTO $tablename(page_id,title,url,seotitle,seodesc,image,summary,detail) VALUES('$page_id','$title','$url','$seotitle','$seodesc','$image_name','$summary','$detail')";
      $query = $conn->query($sql);
      if($query){
        $_SESSION['success'] = "data inserted successfully";
        header("location:contents.php");
        exit;
      }else{
        $_SESSION['error'] = "input all the data";
        header("location:contents.php");
        exit;
      }

    }else{
      $_SESSION['error'] = "title can't be empty";
      header("location:contents.php");
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
      header("location:pages.php");
      exit;
    }else{
      $_SESSION['error'] = "error deleting data";
      header("location:pages.php");
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
  $title = $_POST['title'];
  $seotitle = $_POST['seotitle'];
  $seodesc = $_POST['seodesc'];
  $url = $_POST['url'];
  $status = $_POST['status'];
  $page_id = $_POST['page_id'];
  $sql = "UPDATE  $tablename SET  title = '$title' , seotitle = '$seotitle' , url = '$url', seodesc = '$seodesc' , status = '$status' WHERE id = $page_id";
  //print_r($_POST);
  //  print_r($sql);
  //    exit;
  $query = $conn->query($sql);
  if($query){
    $_SESSION['success'] = "data edited successfully";
    header("location:pages.php");
    exit;
  }else{
    $_SESSION['error'] = "error editing data";
    header("location:pages.php");
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
          $pages = array();
          while($row = $query->fetch_assoc()){
            $pages[] = $row;
          }
        }else{
          $pages = "No record found";
        }
      }
    }else{
      $sql = "SELECT * FROM $tablename";
      $query = $conn->query($sql);
      if($query){
        if($query->num_rows > 0 ){
          $count = $query->num_rows;
          $pages = array();
          while($row = $query->fetch_assoc()){
            $pages[] = $row;
          }
        }else{
          $pages = "No record found";
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