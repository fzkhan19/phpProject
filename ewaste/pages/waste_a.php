<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card recent-sales">

                <div class="card-body horizontal-scrollable">
                  <h5 class="card-title">Pending Products to authentication</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Uploaded on</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getProducts_filter("Pending");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['productname']."</td>";
                            echo "<td>".$row['address']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['date'], " ")),"d-m-Y")."</td>";
                            //echo "<td>".$row['benefits']."</td>";
                            
                            echo "<td><a href='php/changeProductStatus.php?id=".$row['pid']."&status=Verified'><span class='badge bg-success'>Verify</span></a><a href='php/changeProductStatus.php?id=".$row['pid']."&status=Rejected'><span class='badge bg-danger'>Reject</span></a></td>";
                            
                          echo "</tr>";
                          $i++;
                        }

                      ?> 
                    </tbody>
                  </table>

                </div>

          </div>
          <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Verified Products for collection</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Uploaded on</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getProducts_2filter("Verified","Out for Pickup");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['productname']."</td>";
                            echo "<td>".$row['address']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['date'], " ")),"d-m-Y")."</td>";
                            if($row['status'] == "Out for Pickup"){
                              echo "<td><span class='badge bg-secondary'>".$row['status']."</span></td>";
                              echo "<td><a href='php/changeProductStatus.php?id=".$row['pid']."&status=Collected and Recycling'><span class='badge bg-primary'>Collected and Recycling</span></a></td>";
                            }
                            else{
                              echo "<td><span class='badge bg-success'>".$row['status']."</span></td>";
                              echo "<td><a href='php/changeProductStatus.php?id=".$row['pid']."&status=Out for Pickup'><span class='badge bg-secondary'>Out for Pickup</span></a></td>";
                            }
                            
                          echo "</tr>";
                          $i++;
                        }

                      ?> 
                    </tbody>
                  </table>

                </div>

          </div>

          <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Collected and Recycling</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Uploaded on</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getProducts_filter("Collected and Recycling");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['productname']."</td>";
                            echo "<td>".$row['address']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['date'], " ")),"d-m-Y")."</td>";
                            echo "<td><span class='badge bg-primary'>".$row['status']."</span></td>";
                            
                            echo "<td><a href='php/changeProductStatus.php?id=".$row['pid']."&status=Recycled'><span class='badge bg-success'>Recycled</span>";
                            
                          echo "</tr>";
                          $i++;
                        }

                      ?> 
                    </tbody>
                  </table>

                </div>

          </div>

          <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Producted Recycled</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Uploaded on</th>
                        <th scope="col">status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getProducts_filter("Recycled");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['productname']."</td>";
                            echo "<td>".$row['address']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['date'], " ")),"d-m-Y")."</td>";
                            //echo "<td>".$row['benefits']."</td>";
                            
                            echo "<td><span class='badge bg-success'><i class='bi bi-check-circle me-1'></i>".$row['status']."</span></td>";
                            
                          echo "</tr>";
                          $i++;
                        }

                      ?> 
                    </tbody>
                  </table>

                </div>

          </div>

          <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Rejected Producted</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Uploaded on</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getProducts_filter("Rejected");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['productname']."</td>";
                            echo "<td>".$row['address']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['date'], " ")),"d-m-Y")."</td>";
                            echo "<td><span class='badge bg-danger'>".$row['status']."</span></td>";
                            
                            echo "<td><a href='php/deleteProduct.php?id=".$row['pid']."'><span class='badge bg-danger'><i class='bi bi-exclamation-octagon me-1'></i>Delete</span></a><a href='php/changeProductStatus.php?id=".$row['pid']."&status=Verified'><span class='badge bg-success'>Verify</span></a></td>";
                            
                          echo "</tr>";
                          $i++;
                        }

                      ?> 
                    </tbody>
                  </table>

                </div>

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>


       