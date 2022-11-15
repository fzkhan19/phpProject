<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card recent-sales">

                <div class="card-body horizontal-scrollable">
                  <h5 class="card-title">Pending Schemes</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Uploaded on</th>
                        <th scope="col">Scheme Name</th>
                        <th scope="col">Vision</th>
                        <th scope="col">Benefits</th>
                        <th scope="col">Last date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getSchemes_filter("Pending");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><img src='Data/imgs/".$row['img']."' style='width:10rem;height:5rem;'></td>";
                            echo "<td>".$row['emp_name']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['upload_date'], " ")),"d-m-Y")."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['vision']."</td>";
                            echo "<td>".$row['benefits']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['last_date'], " ")),"d-m-Y")."</td>";
                            echo "<td><a href='php/verifyScheme.php?id=".$row['id']."&status=Verified'><span class='badge bg-success'>Verify</span></a><a href='php/verifyScheme.php?id=".$row['id']."&status=Rejected'><span class='badge bg-danger'>Reject</span></a></td>";
                            
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
                  <h5 class="card-title">Rejected Schemes</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Uploaded on</th>
                        <th scope="col">Scheme Name</th>
                        <th scope="col">Vision</th>
                        <th scope="col">Benefits</th>
                        <th scope="col">Last date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getSchemes_filter("Rejected");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><img src='Data/imgs/".$row['img']."' style='width:10rem;height:5rem;'></td>";
                            echo "<td>".$row['emp_name']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['upload_date'], " ")),"d-m-Y")."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['vision']."</td>";
                            echo "<td>".$row['benefits']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['last_date'], " ")),"d-m-Y")."</td>";
                            echo "<td><a href='php/verifyScheme.php?id=".$row['id']."&status=Verified'><span class='badge bg-success'>Verify</span></a></td>";
                            
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
                  <h5 class="card-title">Verified Schemes</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Uploaded on</th>
                        <th scope="col">Scheme Name</th>
                        <th scope="col">Vision</th>
                        <th scope="col">Benefits</th>
                        <th scope="col">Last date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getSchemes_filter("Verified");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><img src='Data/imgs/".$row['img']."' style='width:10rem;height:5rem;'></td>";
                            echo "<td>".$row['emp_name']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['upload_date'], " ")),"d-m-Y")."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['vision']."</td>";
                            echo "<td>".$row['benefits']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['last_date'], " ")),"d-m-Y")."</td>";
                            echo "<td><a href='php/verifyScheme.php?id=".$row['id']."&status=Rejected'><span class='badge bg-danger'>Reject</span></a></td>";
                            
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


       