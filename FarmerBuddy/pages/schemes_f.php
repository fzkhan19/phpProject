<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          
          
        </div>
      </div>
    </section>

<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
           <div class="row"> 
            <form action="php/applyForSchemes.php" method="post">
            <?php

              $db = new Database_api("farmerbuddy");
              $result = $db->getSchemes(0);
              $noOfRows = mysqli_num_rows($result);
              if($noOfRows == 0){
                echo "<div class=\"card mb-3\">";
                  echo "<div class=\"row g-0\">";
                    echo "<div class=\"col-md-7\">";
                      echo "<div class=\"card-body\">";
                        echo "<h5 class=\"card-title\">No New Schemes Avaliable</h5>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</div><!-- End Card with an image on left -->";
              }
              while($row = mysqli_fetch_assoc($result)){
                echo "<div class=\"card mb-3\">";
                  echo "<div class=\"row g-0\">";
                    echo "<div class=\"col-md-5\">";
                      echo "<img src=\"Data/imgs/".$row['img']."\" class=\"img-fluid rounded-start\" alt=\"...\">";
                    echo "</div>";
                    echo "<div class=\"col-md-7\">";
                      echo "<div class=\"card-body\">";
                        echo "<h5 class=\"card-title\">".$row['name']."</h5>";
                        echo "<p class=\"card-text\"><span style='color:green;font-size:0.8rem;'>Vision</span><br>".nl2br($row['vision'])."</p>";
                        echo "<p class=\"card-text\"><span style='color:green;font-size:0.8rem;'>Benefits</span><br>".$row['benefits']."</p>";
                        echo "<button class=\"btn btn-primary w-100\" type=\"submit\" name=\"schemeId\" value=\"".$row['id']."\">Apply Now</button>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</div><!-- End Card with an image on left -->";

              }
            ?>
            </form>
           </div> 
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

              <?php
              $result = $db->getAppliedScheme_filter("Pending");
              $noOfRows = mysqli_num_rows($result);
              if($noOfRows != 0){
          echo '<!-- Recent Activity -->';
          echo '<div class="card">';
            echo '<div class="card-body">';
              echo '<h5 class="card-title">Pending.</h5>';

              echo '<div class="activity">';

                
                echo '<table class="table table-borderless ">';
                    echo '<thead>';
                      echo '<tr>';
                        echo '<th scope="col">#</th>';
                        echo '<th scope="col">Name</th>';
                        echo '<th scope="col">Date</th>';
                        echo '<th scope="col">Status</th>';
                      echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                        
                        $i=1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<th scope='row'><a href='#'>$i</a></th>";
                            echo "<td>$row[0]</td>";
                            echo "<td>".date_format(date_create(strtok($row[1], " ")),"d-m-Y")."</td>";
                            //echo "<td>".date_format($row[1],"Y/m/d")."</td>";
                            if($row[2]=="Pending" || $row[2]=="pending")
                              echo "<td><span class='badge bg-warning'>$row[2]</span></td>";
                            else if($row[2]=="Verified" || $row[2]=="verified")
                              echo "<td><span class='badge bg-success'>$row[2]</span></td>";
                            else if($row[2]=="Rejected" || $row[2]=="rejected")
                              echo "<td><span class='badge bg-danger'>$row[2]</span></td>";
                            else 
                              echo "<td><span class='badge bg-info'>Missing</span></td>";
                          echo "</tr>";
                          $i++;
                        }

                    echo '</tbody>';
                  echo '</table>';
              echo "</div>";

            echo "</div>";
          echo "</div><!-- End Recent Activity -->";
              }
              ?> 

                


          <!-- Budget Report -->

               <?php
                $result = $db->getAppliedScheme_filter("Verified");
                $noOfRows = mysqli_num_rows($result);
                if($noOfRows != 0){
          echo '<div class="card">';
            echo '<div class="card-body pb-0">';
              echo '<h5 class="card-title">Verified.</span></h5>';
                  echo '<table class="table table-borderless ">';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th scope="col">#</th>';
                          echo '<th scope="col">Name</th>';
                          echo '<th scope="col">Date</th>';
                          echo '<th scope="col">Status</th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                          
                          $i=1;
                          while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                              echo "<th scope='row'><a href='#'>$i</a></th>";
                              echo "<td>$row[0]</td>";
                              echo "<td>".date_format(date_create(strtok($row[1], " ")),"d-m-Y")."</td>";
                              if($row[2]=="Pending" || $row[2]=="pending")
                                echo "<td><span class='badge bg-warning'>$row[2]</span></td>";
                              else if($row[2]=="Verified" || $row[2]=="verified")
                                echo "<td><span class='badge bg-success'>$row[2]</span></td>";
                              else if($row[2]=="Rejected" || $row[2]=="rejected")
                                echo "<td><span class='badge bg-danger'>$row[2]</span></td>";
                              else 
                                echo "<td><span class='badge bg-info'>Missing</span></td>";
                            echo "</tr>";
                            $i++;
                          }

                      echo '</tbody>';
                    echo '</table>';

            echo '</div>';
          echo '</div><!-- End Budget Report -->';
                }
                ?>

                <!-- Budget Report -->

               <?php
                $result = $db->getAppliedScheme_filter("Rejected");
                $noOfRows = mysqli_num_rows($result);
                if($noOfRows != 0){
          echo '<div class="card">';
            echo '<div class="card-body pb-0">';
              echo '<h5 class="card-title">Rejected.</span></h5>';
                  echo '<table class="table table-borderless ">';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th scope="col">#</th>';
                          echo '<th scope="col">Name</th>';
                          echo '<th scope="col">Date</th>';
                          echo '<th scope="col">Status</th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                          
                          $i=1;
                          while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                              echo "<th scope='row'><a href='#'>$i</a></th>";
                              echo "<td>$row[0]</td>";
                              echo "<td>".date_format(date_create(strtok($row[1], " ")),"d-m-Y")."</td>";
                              if($row[2]=="Pending" || $row[2]=="pending")
                                echo "<td><span class='badge bg-warning'>$row[2]</span></td>";
                              else if($row[2]=="Verified" || $row[2]=="verified")
                                echo "<td><span class='badge bg-success'>$row[2]</span></td>";
                              else if($row[2]=="Rejected" || $row[2]=="rejected")
                                echo "<td><span class='badge bg-danger'>$row[2]</span></td>";
                              else 
                                echo "<td><span class='badge bg-info'>Missing</span></td>";
                            echo "</tr>";
                            $i++;
                          }

                      echo '</tbody>';
                    echo '</table>';

            echo '</div>';
          echo '</div><!-- End Budget Report -->';
                }
                ?>

          

        </div><!-- End Right side columns -->

      </div>
    </section>

      
