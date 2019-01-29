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
            <h2><?php echo ucfirst($act); ?> Contents</h2>
          </div>
          <!-- End Box Head -->
          <form action="" method="post" enctype="multipart/form-data">
            <!-- Form -->
            <div class="form">
              <p class="inline-field">
              <label>pages</label>
              <?php
                $sql = "SELECT * FROM pages";
                $query = $conn->query($sql);
                if($query){
                  if($query->num_rows > 0 ){
                    $pages = array();
                    while($row = $query->fetch_assoc()){
                      $pages[] = $row;
                    }
                  }
                } 
              ?>
                <select name = "page_id" class="field size3">
                <?php 
                  foreach($pages as $page ):                    
                if(isset($editData)){
                  $selected = '';
                  if($editData['page_id'] == $page['id']){
                    $selected = 'selected = "selected"';
                  }
                }
                ?>
                  <option value="<?php echo $page['id']; ?>" <?php echo $selected; ?>><?php echo $page['title']; ?></option>
                  <?php endforeach; ?>
                </select>
              </p>
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
              <p> <span class="req">Image</span>
                <label>image<span>(Required Field)</span></label>
                <input type="file" name = "image"  value = "<?php echo (isset($editData))? $editData['image']: ''; ?>" class="field size1" />
              </p>
              <p> <span class="req">max 100 symbols</span>
                <label>summary<span>(Required Field)</span></label>
                <textarea name = "summary" class="field size1" rows="10" cols="30"><?php echo (isset($editData))? $editData['summary']: ''; ?></textarea>
              </p>
              <p> 
                <label>detail <span>(Required Field)</span></label>
                <textarea name = "detail" id = "detail" class="field size1" rows="10" cols="30"><?php echo (isset($editData))? $editData['detail']: ''; ?></textarea>
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <?php 
            if(isset($editData)):
            ?>
            <div class="buttons">
              <input type="submit" name = "save" class="button" value="save" />
              <input type="hidden" name = "content_id" class="button" value="<?php echo $editData['id']; ?>" />
            </div>
            <?php else: ?>
            <div class="buttons">
              <input type="submit" name = "create" class="button" value="create" />
            </div>
            <?php endif; ?>
            <!-- End Form Buttons -->
          </form>
        </div>