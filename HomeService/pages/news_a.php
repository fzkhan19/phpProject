<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Pending News</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">News</th>
                        <th scope="col">Uploaded By</th>
                        <th scope="col">Uploaded On</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getNews("Pending");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><img src='Data/imgs/news/".$row['img']."' style='width:10rem;height:5rem;'></td>";
                            echo "<td><a href='#' class='text-primary'>".$row['title']."</a></td>";
                            echo "<td>".$row['news']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['date'], " ")),"d-m-Y")."</td>";
                            echo "<td><a href='php/verifyNews.php?id=".$row['id']."&status=Verified'><span class='badge bg-success'>Verify</span></a><a href='php/verifyNews.php?id=".$row['id']."&status=Rejected'><span class='badge bg-danger'>Reject</span></a></td>";
                            
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
                  <h5 class="card-title">Rejected News</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">News</th>
                        <th scope="col">Uploaded By</th>
                        <th scope="col">Uploaded On</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getNews("Rejected");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><img src='Data/imgs/news/".$row['img']."' style='width:10rem;height:5rem;'></td>";
                            echo "<td><a href='#' class='text-primary'>".$row['title']."</a></td>";
                            echo "<td>".$row['news']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['date'], " ")),"d-m-Y")."</td>";
                            echo "<td><a href='php/verifyNews.php?id=".$row['id']."&status=Verified'><span class='badge bg-success'>Verify</span></td>";
                            
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
                  <h5 class="card-title">Verified News</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">News</th>
                        <th scope="col">Uploaded By</th>
                        <th scope="col">Uploaded On</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new Database_api();
                        $result = $db->getNews("Verified");
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td><img src='Data/imgs/news/".$row['img']."' style='width:10rem;height:5rem;'></td>";
                            echo "<td><a href='#' class='text-primary'>".$row['title']."</a></td>";
                            echo "<td>".$row['news']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".date_format(date_create(strtok($row['date'], " ")),"d-m-Y")."</td>";
                            echo "<td><a href='php/verifyNews.php?id=".$row['id']."&status=Rejected'><span class='badge bg-danger'>Reject</span></a></td>";
                            
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


       