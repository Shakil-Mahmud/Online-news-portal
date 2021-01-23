<div class="col-sm-2 sideCard">
  
  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <?php
             $query=mysqli_query($conn,"select * from category");
            while($row=mysqli_fetch_array($query))
            {
              ?>

              <li>
                <a href=""><?php echo htmlentities($row['name']);?></a>
              </li>
            <?php } ?>
          </ul>
        </div>
        
      </div>
    </div>
  </div>

</div>