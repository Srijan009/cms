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
            <h2><?php echo ucfirst($act); ?> Users</h2>
          </div>
          <!-- End Box Head -->
          <form action="" method="post">
            <!-- Form -->
            <div class="form">
              <p> <span class="req">title</span>
                <label>title <span>(Required Field)</span></label>
                <input type="text" name = "title" value = "<?php echo (isset($editData))? $editData['title']: ''; ?>"  class="field size1" />
              </p>
              <p> <span class="req">url</span>
                <label>url <span>(Required Field)</span></label>
                <input type="text" name = "url"  value = "<?php echo (isset($editData))? $editData['url']: ''; ?>" class="field size1" />
              </p>
              <p> <span class="req">seo title</span>
                <label>seo title <span>(Required Field)</span></label>
                <input type="text" name = "seotitle"  value = "<?php echo (isset($editData))? $editData['seotitle']: ''; ?>" class="field size1" />
              </p>
              <p> <span class="req">seo description</span>
                <label>seo description<span>(Required Field)</span></label>
                <input type="text" name = "seodesc"  value = "<?php echo (isset($editData))? $editData['seodesc']: ''; ?>" class="field size1" />
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
              <input type="hidden" name = "page_id" class="button" value="<?php echo $editData['id']; ?>" />
            </div>
            <?php else: ?>
            <div class="buttons">
              <input type="submit" name = "create" class="button" value="create" />
            </div>
            <?php endif; ?>
            <!-- End Form Buttons -->
          </form>
        </div>