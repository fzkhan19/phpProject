<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Products Uploaded by You</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Uploaded on</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        //include "Database/Database_api.php";
                        $db = new Database_api();
                        $result = $db->getProducts();
                        $i=1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><a href='#' class='text-primary'>".$row['name']."</a></td>";
                            echo "<td>".date_format(date_create(strtok($row['date'], " ")),"d-m-Y")."</td>";
                            
                            if($row['status']=="Pending" || $row['status']=="pending")
                              echo "<td><span class='badge bg-warning'>".$row['status']."</span></td>";
                            else if($row['status']=="Verified" || $row['status']=="verified")
                              echo "<td><span class='badge bg-success'>".$row['status']."</span></td>";
                            else if($row['status']=="Rejected" || $row['status']=="rejected")
                              echo "<td><span class='badge bg-danger'>".$row['status']."</span></td>";
                            else if($row['status']=="Recycled" || $row['status']=="Recycled")
                              echo "<td><span class='badge bg-success'><i class='bi bi-check-circle me-1'></i>".$row['status']."</span></td>";  
                            else if($row['status']=="Out for Pickup")
                              echo "<td><span class='badge bg-secondary'>".$row['status']."</span></td>";
                            else if($row['status']=="Collected and Recycling")
                              echo "<td><span class='badge bg-primary'>".$row['status']."</span></td>";
                            else 
                              echo "<td><span class='badge bg-info'>Missing</span></td>";
                            
                          echo "</tr>";
                          $i++;
                        }

                      ?> 
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->



          </div>

          

        </div><!-- End Left side columns -->
        
        <!-- Right Column -->
        <div class="col-lg-4">
          <!-- Reports -->
            <div class="col-12">
              <div class="card">



                <div class="card-body">
                  <h5 class="card-title">Upload New Product for management to collect.</h5>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="php/uploadProduct.php" enctype="multipart/form-data">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Name of the Product</label>
                      <div class="input-group has-validation">
                        <input type="text" name="productName" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a name.</div>
                      </div>
                    </div>
                    
                    <div class="col-4">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Upload</button>
                    </div>
                  </form>

                </div>

              </div>
            </div><!-- End Reports -->   
        </div><!-- End right side column -->
      </div>
    </section>