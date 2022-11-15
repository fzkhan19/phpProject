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
                  <h5 class="card-title">Last Entered Production</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php $db=new Database_api("farmerbuddy");
                            $row = mysqli_fetch_assoc($db->execute("SELECT name,amount from production where cid=".$_SESSION['uid']." and status='Verified' ORDER BY id desc LIMIT 1"));
                            if($row['amount'] == ""){
                              echo "0";
                            }else{
                              echo $row['amount'];
                            }
                       ?></h6>
                      <span class="text-success small pt-1 fw-bold"><?php echo $row['name']; ?></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Last Year Avg.</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php $db=new Database_api("farmerbuddy");
                            $row = mysqli_fetch_assoc($db->execute("SELECT yyyy,avg(amount) from production where cid=".$_SESSION['uid']." and status='Verified' GROUP BY yyyy ORDER BY yyyy desc LIMIT 1"));
                            if($row['avg(amount)'] == ""){
                              echo "0";
                            }else{
                              echo $row['avg(amount)'];
                            }
                            ?></h6>
                      <span class="text-success small pt-1 fw-bold"><?php echo $row['yyyy']; ?></span>


                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Average</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php $db=new Database_api("farmerbuddy");
                            $row = mysqli_fetch_assoc($db->execute("SELECT avg(amount) from production where cid=".$_SESSION['uid']." and status='Verified' GROUP BY yyyy "));
                            if($row['avg(amount)'] == ""){
                              echo "0";
                            }else{
                              echo $row['avg(amount)'];
                            }
                       ?></h6>
                      <span class="text-success small pt-1 fw-bold">Overall avg</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <?php
              $db = new Database_api("farmerbuddy");
              $result = $db->getProduction_yyyy();
              $xaxis="";
              $yaxis="";
              if(mysqli_num_rows($result)>0){
              
                echo '<div class="col-12">';
                  echo '<div class="card">';

                    echo '<div class="filter">';
                      echo '<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>';
                      echo '<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">';
                        echo '<li class="dropdown-header text-start">';
                          echo '<h6>Filter</h6>';
                        echo '</li>';

                        echo '<li><a class="dropdown-item" href="#">Today</a></li>';
                        echo '<li><a class="dropdown-item" href="#">This Month</a></li>';
                        echo '<li><a class="dropdown-item" href="#">This Year</a></li>';
                      echo '</ul>';
                    echo '</div>';


                      echo "<div class=\"card-body\">";
                        echo "<h5 class=\"card-title\">Yearly Average.</h5>";

                        echo "<div id=\"lineChart\" style=\"min-height: 400px;\" class=\"echart\"></div>";

                          $m = mysqli_fetch_array($db->execute("SELECT min(yyyy),max(yyyy) from production where cid=".$_SESSION['uid'].""));
                          $arr = array();
                          
                          for ($i=$m[0]; $i<=$m[1] ; $i++) { 
                            $arr[$i] = 0;
                          }

                          while($row = mysqli_fetch_assoc($result)){
                            $arr[$row['yyyy']] = $row['AVG(amount)'];
                            //$yaxis .= $row['AVG(amount)'].",";
                          }

                          foreach ($arr as $key => $value) {
                            $xaxis .= "'".$key."',";
                            $yaxis .= $value.",";
                          }
                          //print_r($arr);
                          $xaxis = rtrim($xaxis,",");
                          $yaxis = rtrim($yaxis,",");

                          echo "<script>";
                          echo "document.addEventListener(\"DOMContentLoaded\", () => {";
                            echo "new ApexCharts(document.querySelector(\"#lineChart\"), {";
                              echo "series: [{";
                                echo "name: \"Avg Crop in tonns \",";
                                echo "data: [".$yaxis."]";
                              echo "}],";
                              echo "chart: {";
                                echo "height: 350,";
                                echo "type: 'line',";
                                echo "zoom: {";
                                  echo "enabled: false";
                                echo "}";
                              echo "},";
                              echo "dataLabels: {";
                                echo "enabled: false";
                              echo "},";
                              echo "stroke: {";
                                echo "curve: 'straight'";
                              echo "},";
                              echo "grid: {";
                                echo "row: {";
                                  echo "colors: ['#f3f3f3', 'transparent'],";
                                  echo "opacity: 0.5";
                                echo "},";
                              echo "},";
                              echo "xaxis: {";
                                echo "categories: [".$xaxis."],";
                              echo "}";
                            echo "}).render();";
                          echo "});";
                          echo "</script>";
                      echo "</div>";

                    echo "</div>";
                  echo "</div><!-- End Reports -->";
                }
                  ?>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">


          <?php
              //$db = new Database_api("farmerbuddy");
              $result = $db->execute("SELECT name,sum(amount) from production WHERE cid=".$_SESSION['uid']." GROUP BY name");
              $label="";
              $data="";
              if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                  $label .= "'".$row['name']."',";
                  $data .= $row['sum(amount)'].",";
                }
                $label = rtrim($label,",");
                $data = rtrim($data,",");
              
                echo "<div class=\"card\">";
                  echo "<div class=\"card-body\">";
                    echo "<h5 class=\"card-title\">Production</h5>";

                    echo "<!-- Bar Chart -->";
                    echo "<div id=\"barChart\"></div>";

                    echo "<script>";
                      echo "document.addEventListener(\"DOMContentLoaded\", () => {";
                        echo "new ApexCharts(document.querySelector(\"#barChart\"), {";
                          echo "series: [{";
                            echo "data: [".$data."]";
                          echo "}],";
                          echo "chart: {";
                            echo "type: 'bar',";
                            echo "height: 350";
                          echo "},";
                          echo "plotOptions: {";
                            echo "bar: {";
                              echo "borderRadius: 4,";
                              echo "horizontal: true,";
                            echo "}";
                          echo "},";
                          echo "dataLabels: {";
                            echo "enabled: false";
                          echo "},";
                          echo "xaxis: {";
                            echo "categories: [".$label."],";
                          echo "}";
                        echo "}).render();";
                      echo "});";
                    echo "</script>";
                    echo "<!-- End Bar Chart -->";

                  echo "</div>";
                echo "</div>";
              }

            ?>
          
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->