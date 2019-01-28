<div class="box">
          <!-- Box Head -->
          <div class="box-head">
          <?php 
            $act = "Add";
            if($editData)
            {
                $act = "Edit";
            }
          ?>
            <h2><?php echo ucfirst($act); ?> <?php echo (isset($editData))? $editData['fullname']: ''; ?></h2>
          </div>
          <!-- End Box Head -->
          <form action="" method="post">
            <!-- Form -->
            <div class="form">
              <p> <span class="req">fullname</span>
                <label>fullname <span>(Required Field)</span></label>
                <input type="text" name = "fullname" value = "<?php echo (isset($editData))? $editData['fullname']: ''; ?>"  class="field size1" />
              </p>
              <p> <span class="req">username</span>
                <label>username <span>(Required Field)</span></label>
                <input type="text" name = "username"  value = "<?php echo (isset($editData))? $editData['username']: ''; ?>" class="field size1" />
              </p>
              <p> <span class="req">password</span>
                <label>password <span>(Required Field)</span></label>
                <input type="password" name = "password"  value = "<?php echo (isset($editData))? $editData['password']: ''; ?>" class="field size1" />
              </p>
              <p> <span class="req">email</span>
                <label>email <span>(Required Field)</span></label>
                <input type="email" name = "email"  value = "<?php echo (isset($editData))? $editData['email']: ''; ?>" class="field size1" />
              </p>
              <p class="inline-field">
              <?php 
              $active = 'selected = "selected"';;
              $inactive = '';
                if(isset($editData)){
                    if(!$editData['status']){
                        $inactive = 'selected = "selected"';;
                        $active = '';
                    }
                }
              ?>
                <label>status</label>
                <select name = "status" class="field size3">
                  <option value="1" <?php echo $active; ?>>active</option>
                  <option value="0" <?php echo $inactive; ?>>Inactive</option>
                </select>
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <?php 
            if(isset($editData)):
            ?>
            <div class="buttons">
              <input type="submit" name = "save" class="button" value="save" />
              <input type="hidden" name = "edit_id" class="button" value="<?php echo $editData['id']; ?>" />
            </div>
            <?php else: ?>
            <div class="buttons">
              <input type="submit" name = "submit" class="button" value="submit" />
            </div>
            <?php endif; ?>
            <!-- End Form Buttons -->
          </form>
        </div>