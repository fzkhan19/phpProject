<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

  

                <div class="card-body">
                  <h5 class="card-title">Total Employees</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php $db=new Database_api("farmerbuddy");
                            $row = mysqli_fetch_array($db->execute("SELECT COUNT(*) from user where type='Employee'"));
                            echo $row[0];
                       ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Farmers</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php $db=new Database_api("farmerbuddy");
                            $row = mysqli_fetch_array($db->execute("SELECT COUNT(*) from user where type='Farmer'"));
                            echo $row[0];
                       ?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

           
             <!-- Customers Card -->
             <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Schemes</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-tree"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php $db=new Database_api("farmerbuddy");
                            $row = mysqli_fetch_array($db->execute("SELECT COUNT(*) from schemes"));
                            echo $row[0];
                      ?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Farmer Name List</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Farmer Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Avg production</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $db = new Database_api("farmerbuddy");
                        $result = $db->execute("SELECT * from user where type='Farmer'");
                        $i=1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$row[0]</a></th>";
                            echo "<td> <a href='#' class='text-primary'>$row[1]</td>";
                            echo "<td>$row[2]</a></td>";
                            $r = $db->execute("SELECT avg(amount) from production WHERE cid=$row[0]");
                            $d =  mysqli_fetch_array($r);
                            echo "<td>$d[0]</td>";
                            echo "<td><a href='php/deleteUser.php?id=$row[0]'><span class='badge bg-danger'>Delete</span></a>";
                            
                          echo "</tr>";
                          $i++;
                        }

                      ?> 
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Tables</h5>

              <div class="activity">

                
                <?php 
                 echo '<table class="table table-borderless ">';
                 echo '<thead>';
                   echo '<tr>';
                     echo '<th scope="col">#</th>';
                     echo '<th scope="col">Table Name</th>';
                     echo '<th scope="col">Records</th>';
                   echo '</tr>';
                 echo '</thead>';
                 echo '<tbody>';
                     
                     $i=1;
                     $result = $db->execute("SHOW tables");
                     while($row = mysqli_fetch_array($result)){
                       echo "<tr>";
                       echo "<th scope='row'><a href='#'>$i</a></th>";
                       echo "<td>$row[0]</td>";
                       
                       $no_of_records = mysqli_fetch_array($db->execute("SELECT count(*) from ".$row[0].""));
                       echo "<td>$no_of_records[0]</td>";
                       
                       echo "</tr>";
                       $i++;
                     }

                 echo '</tbody>';
               echo '</table>';
                ?>

                

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->