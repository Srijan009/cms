<div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Search <?php echo ucfirst($type); ?></h2>
          </div>
          <!-- End Box Head -->
          <form action="" method="post">
            <!-- Form -->
            <div class="form">
                <p class="inline-field">
                    <label>Search By</label>
                    <select name = "searchBy" class="field size3">
                    <option value="title" selected = "selected">title</option>
                    <option value="url">url</option>
                    <option value="seotitle">seo title</option>
                    <option value="seodesc">seo desc</option>
                    </select>
                </p>
              <p> <span class="req">Search Keyword</span>
                <label>Search Keyword <span>(Required Field)</span></label>
                <input type="text" name = "searchKey" class="field size1" />
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="submit" name = "search" class="button" value="search" />
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>