<?php 
    session_start();
    //include database
    include 'inc/dbconfig.php';
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        //from database
        $sql = "SELECT * FROM users WHERE username = '$username' AND status = '1'";
        //die($sql);
        $query =  $conn->query($sql);
        if($query->num_rows > 0 ){
            $_SESSION['adminKey'] = $username ;
            header("location: index.php");
            if( isset($_POST['chk']) ){
                $time = time() + 60*60;
                setcookie("adminName",$username,$time);
            }
        }else{
            $_SESSION['error'] = "Invalid username and password";
            header("location:".$_SERVER['PHP_SELF']);
           
            exit;
        }
    }

?>


<?php include 'inc/header.php'; ?>
  <div class="shell">
    <?php include 'inc/message.php';
    ?>
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content">
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Get login</h2>
          </div>
          <!-- End Box Head -->
          <form action="" method="post">
            <!-- Form -->
            <div class="form">
              <p> <span class="req">input the username</span>
                <label>username <span>(Required Field)</span></label>
                <input type="text" name="username" class="field size1" />
              </p>
              <p> <span class="req">input the Password</span>
                <label>password <span>(Required Field)</span></label>
                <input type="password" name = "password" class="field size1" />
              </p>
              <p> 
              <label for="remember me"><input type="checkbox" name="chk" value = "chk"> remember me</label>
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="submit" name = "login" class="button" value="login" />
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <div class="cl">&nbsp;</div>
    </div>
    <!-- Main -->
  </div>
</div>
<!-- End Container -->
<!-- Footer -->
<?php include 'inc/footer.php'; ?>