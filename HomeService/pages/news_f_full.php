<div class="card-body">
   <a href="news.php" class="col-2"><button class="btn btn-primary">Back</button></a>
</div>
         
<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
           
           <?php

              $db = new Database_api();
              $result = $db->getNews($_GET['news']);
              $noOfRows = mysqli_num_rows($result);
              while($row = mysqli_fetch_assoc($result)){
                echo '<!-- News -->';
                echo '<div class="col-12">';
                  echo '<div class="card">';
                      echo "<img src=\"Data/imgs/news/".$row['img']."\" class=\"card-img-top\" alt=\"...\">";
                      echo '<div class="card-body">';
                        echo "<h5 class=\"card-title\">".$row['title']."</h5>";
                        echo "<p class=\"card-text\">".$row['news']."</p>";
                      echo '</div>';
                  echo '</div>';
                echo '</div><!-- End News -->';
              }
            ?>
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>


       