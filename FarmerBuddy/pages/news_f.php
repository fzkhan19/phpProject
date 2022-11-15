<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

           
           <?php

              $db = new Database_api("farmerbuddy");
              $result = $db->getNews("Verified");
              $noOfRows = mysqli_num_rows($result);
              if($noOfRows == 0){
                echo "<div class=\"card mb-3\">";
                  echo "<div class=\"row g-0\">";
                    echo "<div class=\"col-md-7\">";
                      echo "<div class=\"card-body\">";
                        echo "<h5 class=\"card-title\">No New News Avaliable</h5>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</div><!-- End Card with an image on left -->";
              }
              while($row = mysqli_fetch_assoc($result)){
                echo '<!-- News -->';
                echo '<div class="col-6">';
                  echo '<div class="card">';
                      echo "<img src=\"Data/imgs/news/".$row['img']."\" class=\"card-img-top\" alt=\"...\">";
                      echo '<div class="card-body">';
                        echo "<h5 class=\"card-title\">".$row['title']."</h5>";
                        echo "<p class=\"card-text\">".$row['news']."</p>";
                        echo "<p class=\"card-text\"><a href=\"?news=".$row['id']."\">Read More</a></p>";
                      echo '</div>';
                  echo '</div>';
                echo '</div><!-- End News -->';
              }
            ?>
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>


       