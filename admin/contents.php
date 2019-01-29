<?php include 'inc/session.php'; ?>
<?php include 'inc/dbconfig.php'; ?>
<?php include 'inc/functions.php'; ?>
<?php 
  $type = "contents";
  $tablename = $type;
 ?>
  <?php include 'inc/header.php'; ?>
  <?php
  //create contents part
  if(isset($_POST['create'])){
    //debugger($_POST,true);
    $page_id = $_POST['page_id'];    
    $title = $_POST['title'];
    $url = $_POST['url'];
    $seotitle = $_POST['seotitle'];
    $seodesc = $_POST['seodesc'];
    $image = $_FILES['image'];
    $summary = mysqli_real_escape_string($conn,$_POST['summary']);
    $detail = mysqli_real_escape_string($conn,$_POST['detail']);
     // debugger($image,true);
      // image path
    $image_path = "../images/contents/";
    if(!empty($image['name'])){
      $move = move_uploaded_file($image['tmp_name'],$image_path.$image['name']);
    }
    if($move){
       $image_name = $image['name'];
      //exit;
    }
    
   // debugger($_FILES,true);
    // echo "<pre>";
    // print_r($user['fullname']);
    // echo "</pre>";
    // exit;
    if(!empty($title)){
      $sql = "INSERT INTO $tablename(page_id,title,url,seotitle,seodesc,image,summary,detail) VALUES('$page_id','$title','$url','$seotitle','$seodesc','$image_name','$summary','$detail')";
      //die($sql);
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
      header("location:contents.php");
      exit;
    }else{
      $_SESSION['error'] = "error deleting data";
      header("location:contents.php");
      exit;
    }
    
  }
   // code for editing data
  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM $tablename WHERE  id = $id";
    $query = $conn->query($sql);
    $editData = $query->fetch_assoc();
    //debugger($editData,true);
  }
if(isset($_POST['save'])){
  $content_id = $_POST['content_id'];
  $page_id = $_POST['page_id'];    
  $title = $_POST['title'];
  $url = $_POST['url'];
  $seotitle = $_POST['seotitle'];
  $seodesc = $_POST['seodesc'];
  $image = $_FILES['image'];
  $summary = $_POST['summary'];
  $detail = $_POST['detail'];
  $image_path = "../images/contents/";
  if(!empty($image['name'])){
    $move = move_uploaded_file($image['tmp_name'],$image_path.$image['name']);
  }
  if($move){
     $image_name = $image['name'];
    //exit;
  }
  $sql = "UPDATE  $tablename SET page_id = '$page_id', title = '$title' , seotitle = '$seotitle' , url = '$url', seodesc = '$seodesc' , image = '$image_name' WHERE id = $content_id";
  //print_r($_POST);
  //  print_r($sql);
  //    exit;
  $query = $conn->query($sql);
  if($query){
    $_SESSION['success'] = "data edited successfully";
    header("location:contents.php");
    exit;
  }else{
    $_SESSION['error'] = "error editing data";
    header("location:contents .php");
    exit;
  }
  
}
  //search and datalist 
    if(isset($_POST['search'])){
      $searchBy = $_POST['searchBy'];
      $searchKey = $_POST['searchKey'];
      //debugger($_POST,true);
     //print_r($_POST);
      $sql = "SELECT * FROM $tablename WHERE $searchBy like '%$searchKey%'";
      //die($sql);
      $query = $conn->query($sql);
      if($query){
        if($query->num_rows > 0 ){
          $count = $query->num_rows;
          // echo $count;
          // exit;
          $contents = array();
          while($row = $query->fetch_assoc()){
            $contents[] = $row;
          }
        }else{
          $contents = "No record found";
        }
      }
    }else{
      $sql = "SELECT * FROM $tablename";
      $query = $conn->query($sql);
      if($query){
        if($query->num_rows > 0 ){
          $count = $query->num_rows;
          $contents = array();
          while($row = $query->fetch_assoc()){
            $contents[] = $row;
          }
        }else{
          $contents = "No record found";
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