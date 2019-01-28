    <!-- Message OK -->
    <?php
       if(isset($_SESSION['success'])):
        $success = $_SESSION['success'];
       ?>
    
    <div class="msg msg-ok">
      <p><strong><?php echo $success; ?></strong></p>
      <a href="<?php echo  $type; ?>.php" class="close">close</a> </div>
    <?php endif; 
    unset($_SESSION['success']);
    ?>
    <!-- End Message OK -->
        <!-- Message Error -->
   <?php if(isset($_SESSION['error'])): 
        $error = $_SESSION['error'];
    ?>
    
    <div class="msg msg-error">
      <p><strong><?php echo $error; ?>!</strong></p>
      <a href="<?php echo  $type; ?>.php" class="close">close</a> </div>
      <?php 
      endif;
      unset($_SESSION['error']);
      ?>
    <!-- End Message Error -->