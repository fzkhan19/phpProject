<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

           
            <!-- Reports -->
            <div class="col-12">
              <div class="card">



                <div class="card-body">
                  <h5 class="card-title">Upload News</h5>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="php/uploadNews.php" enctype="multipart/form-data">
                    <div class="col-12">
                      <label for="datePicker" class="form-label">Date</label>
                      <input type="date" name="date" class="form-control" id="datePicker" required>
                      <div class="invalid-feedback">Please, enter your Date!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Upload img</label>
                      <input type="file" name="img" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your Date!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Title</label>
                      <div class="input-group has-validation">
                        <input type="text" name="title" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a Title.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">News</label>
                      <div class="input-group has-validation">
                        <textarea name="news" class="form-control" id="yourUsername" required></textarea>
                        <div class="invalid-feedback">Please choose a News.</div>
                      </div>
                    </div>
                    
                    <div class="col-4">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Upload</button>
                    </div>
                  </form>

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Pending News</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Farmer Name</th>
                        <th scope="col">Scheme Name</th>
                        <th scope="col">Applied on</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include "Database/Database_api.php";
                        $db = new Database_api("farmerbuddy");
                        $result = $db->getProduction_filter("pending");
                        $i=1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td>$row[1]</td>";
                            echo "<td><a href='#' class='text-primary'>$row[2]</a></td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td><a href='php/verifyProduction.php?id=$row[0]&status=Verified'><span class='badge bg-success'>Verify</span></a><a href='php/verifyProduction.php?id=$row[0]&status=Rejected'><span class='badge bg-danger'>Reject</span></a></td>";
                            
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
                  <h5 class="card-title">Rejected News</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Crop Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $result = $db->getProduction_filter("Verified");
                        $i=1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td>$row[1]</td>";
                            echo "<td><a href='#' class='text-primary'>$row[2]</a></td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td><span class='badge bg-success'>$row[5]</span></td>";
                            echo "<td><a href='php/verifyProduction.php?id=$row[0]&status=Rejected'><span class='badge bg-danger'>Reject</span></a></td>";
                            
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
                  <h5 class="card-title">Verified News</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Crop Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $result = $db->getProduction_filter("Rejected");
                        $i=1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td>$row[1]</td>";
                            echo "<td><a href='#' class='text-primary'>$row[2]</a></td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td><span class='badge bg-danger'>$row[5]</span></td>";
                            echo "<td><a href='php/verifyProduction.php?id=$row[0]&status=Verified'><span class='badge bg-success'>Verify</span></a></td>";
                            
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

      </div>
    </section>

    <script type="text/javascript">
                    document.getElementById('datePicker').value = new Date().toDateInputValue();
                    alert("hasjg");
                  </script>
