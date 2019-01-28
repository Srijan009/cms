<div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Current <?php echo ucfirst($type); ?></h2>
          </div>
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th>S.N</th>
                <th>url</th>
                <th>seotitle</th>
                <th>seo desc</th>
                <th>Status</th>
                <th width="110" class="ac">Content Control</th>
              </tr>
              <?php
              if($count > 0):
                $i = 1;
                foreach($pages as $page ):
              ?>
              <tr>
                <td><?php echo $i; $i++;?></td>
                <td><?php echo $page['title']; ?></td>
                <td><?php echo $page['url']; ?></td>
                <td><?php echo $page['seotitle']; ?></td>
                <td><?php echo $page['seodesc']; ?></td>
                <td><?php echo ($page['status'])? 'active':'Inactive'; ?></td>
                <td>
                    <a href="?del=<?php echo $page['id']; ?>" onclick = "return confirm('Are you sure want to delete')" class="ico del">Delete</a>
                    <a href="?edit=<?php echo $page['id']; ?>" class="ico edit">Edit</a>
                    </td>
              </tr>
              <?php 
                endforeach;
            else:
                
              ?>
              <tr><td>No record found</td></tr>
              <?php endif; ?>
            </table>
          </div>
          <!-- Table -->
        </div>