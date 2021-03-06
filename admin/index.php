  <?php 
    $type = "index";
  ?>
  <?php include 'inc/session.php'; ?>
  <?php include 'inc/header.php'; ?>
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current Articles </div>
    <!-- End Small Nav -->
    <?php include 'inc/message.php'; ?>
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
            <h2 class="left">Current Articles</h2>
            <div class="right">
              <label>search articles</label>
              <input type="text" class="field small-field" />
              <input type="submit" class="button" value="search" />
            </div>
          </div>
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="13"><input type="checkbox" class="checkbox" /></th>
                <th>Title</th>
                <th>Date</th>
                <th>Added by</th>
                <th width="110" class="ac">Content Control</th>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkbox" /></td>
                <td><h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3></td>
                <td>12.05.09</td>
                <td><a href="#">Administrator</a></td>
                <td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
              </tr>
              <tr class="odd">
                <td><input type="checkbox" class="checkbox" /></td>
                <td><h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3></td>
                <td>12.05.09</td>
                <td><a href="#">Administrator</a></td>
                <td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkbox" /></td>
                <td><h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3></td>
                <td>12.05.09</td>
                <td><a href="#">Administrator</a></td>
                <td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
              </tr>
              <tr class="odd">
                <td><input type="checkbox" class="checkbox" /></td>
                <td><h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3></td>
                <td>12.05.09</td>
                <td><a href="#">Administrator</a></td>
                <td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkbox" /></td>
                <td><h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3></td>
                <td>12.05.09</td>
                <td><a href="#">Administrator</a></td>
                <td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
              </tr>
              <tr class="odd">
                <td><input type="checkbox" class="checkbox" /></td>
                <td><h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3></td>
                <td>12.05.09</td>
                <td><a href="#">Administrator</a></td>
                <td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkbox" /></td>
                <td><h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3></td>
                <td>12.05.09</td>
                <td><a href="#">Administrator</a></td>
                <td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
              </tr>
              <tr class="odd">
                <td><input type="checkbox" class="checkbox" /></td>
                <td><h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3></td>
                <td>12.05.09</td>
                <td><a href="#">Administrator</a></td>
                <td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
              </tr>
            </table>
            <!-- Pagging -->
            <div class="pagging">
              <div class="left">Showing 1-12 of 44</div>
              <div class="right"> <a href="#">Previous</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">245</a> <span>...</span> <a href="#">Next</a> <a href="#">View all</a> </div>
            </div>
            <!-- End Pagging -->
          </div>
          <!-- Table -->
        </div>
        <!-- End Box -->
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Article</h2>
          </div>
          <!-- End Box Head -->
          <form action="#" method="post">
            <!-- Form -->
            <div class="form">
              <p> <span class="req">max 100 symbols</span>
                <label>Article Title <span>(Required Field)</span></label>
                <input type="text" class="field size1" />
              </p>
              <p class="inline-field">
                <label>Date</label>
                <select class="field size2">
                  <option value="">23</option>
                </select>
                <select class="field size3">
                  <option value="">July</option>
                </select>
                <select class="field size3">
                  <option value="">2009</option>
                </select>
              </p>
              <p> <span class="req">max 100 symbols</span>
                <label>Content <span>(Required Field)</span></label>
                <textarea class="field size1" rows="10" cols="30"></textarea>
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="button" class="button" value="preview" />
              <input type="submit" class="button" value="submit" />
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <!-- Sidebar -->
      <div id="sidebar">
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Management</h2>
          </div>
          <!-- End Box Head-->
          <div class="box-content"> <a href="#" class="add-button"><span>Add new Article</span></a>
            <div class="cl">&nbsp;</div>
            <p class="select-all">
              <input type="checkbox" class="checkbox" />
              <label>select all</label>
            </p>
            <p><a href="#">Delete Selected</a></p>
            <!-- Sort -->
            <div class="sort">
              <label>Sort by</label>
              <select class="field">
                <option value="">Title</option>
              </select>
              <select class="field">
                <option value="">Date</option>
              </select>
              <select class="field">
                <option value="">Author</option>
              </select>
            </div>
            <!-- End Sort -->
          </div>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
    </div>
    <!-- Main -->
  </div>
  <?php include 'inc/footer.php'; ?>