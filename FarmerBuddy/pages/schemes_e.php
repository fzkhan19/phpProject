<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

           <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Pending Scheme Data</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Farmer Name</th>
                        <th scope="col">Scheme Name</th>
                        <th scope="col">Applied on</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        //include "Database/Database_api.php";
                        $db = new Database_api("farmerbuddy");
                        $result = $db->getAppliedScheme_filter("Pending");
                        $i=1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><a href='#' class='text-primary'>$row[2]</a></td>";
                            echo "<td><a href='#' class='text-primary'>$row[4]</a></td>";
                            echo "<td>$row[5]</td>";
                            echo "<td><span class='badge bg-warning'>$row[6]</span></td>";
                            echo "<td><a href='php/verifyAppliedScheme.php?id=$row[0]&status=Verified'><span class='badge bg-success'>Verify</span></a><a href='php/verifyAppliedScheme.php?id=$row[0]&status=Rejected'><span class='badge bg-danger'>Reject</span></a></td>";
                            
                          echo "</tr>";
                          $i++;
                        }

                      ?> 
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Rejected Production Data</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Farmer Name</th>
                        <th scope="col">Scheme Name</th>
                        <th scope="col">Applied on</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        //include "Database/Database_api.php";
                        $db = new Database_api("farmerbuddy");
                        $result = $db->getAppliedScheme_filter("Rejected");
                        $i=1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><a href='#' class='text-primary'>$row[2]</a></td>";
                            echo "<td><a href='#' class='text-primary'>$row[4]</a></td>";
                            echo "<td>$row[5]</td>";
                            echo "<td><span class='badge bg-danger'>$row[6]</span></td>";
                            echo "<td><a href='php/verifyAppliedScheme.php?id=$row[0]&status=Verified'><span class='badge bg-success'>Verify</span></a></td>";
                            
                          echo "</tr>";
                          $i++;
                        }

                      ?> 
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Verified Production Data</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Farmer Name</th>
                        <th scope="col">Scheme Name</th>
                        <th scope="col">Applied on</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        //include "Database/Database_api.php";
                        $db = new Database_api("farmerbuddy");
                        $result = $db->getAppliedScheme_filter("Verified");
                        $i=1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><a href='#' class='text-primary'>$row[2]</a></td>";
                            echo "<td><a href='#' class='text-primary'>$row[4]</a></td>";
                            echo "<td>$row[5]</td>";
                            echo "<td><span class='badge bg-success'>$row[6]</span></td>";
                            echo "<td><a href='php/verifyAppliedScheme.php?id=$row[0]&status=Rejected'><span class='badge bg-danger'>Reject</span></a></td>";
                            
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
                  <h5 class="card-title">Upload New Scheme</h5>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="php/uploadScheme.php" enctype="multipart/form-data">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Last Date</label>
                      <input type="date" name="lastDate" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your Date!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Upload img</label>
                      <input type="file" name="img" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your Date!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Name of the Scheme</label>
                      <div class="input-group has-validation">
                        <input type="text" name="schemeName" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a name.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Vision</label>
                      <div class="input-group has-validation">
                        <textarea name="vision" class="form-control" id="yourUsername" required></textarea>
                        <div class="invalid-feedback">Please choose a Vision.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Benefits</label>
                      <div class="input-group has-validation">
                        <input type="text" name="schemeBenefits" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a benefits.</div>
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