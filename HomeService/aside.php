<?php
  $baseref = "http://localhost/HomeService/";
  $link = explode('/',$_SERVER['REQUEST_URI']);
  $currentFile = end($link);
  //print_r($link);
  //echo "\t$currentFile";
?>
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php if($currentFile!="index.php"){echo "collapsed";}?>" href="<?php echo $baseref; ?>index.php">
          <i class="bi bi-grid" ></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($currentFile!="index.php"){echo "collapsed";}?>" href="<?php echo $baseref; ?>index.php">
          <i class="bi bi-grid" ></i>
          <span>Application</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($currentFile!="index.php"){echo "collapsed";}?>" href="<?php echo $baseref; ?>index.php">
          <i class="bi bi-grid" ></i>
          <span>Schemes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($currentFile!="index.php"){echo "collapsed";}?>" href="<?php echo $baseref; ?>index.php">
          <i class="bi bi-grid" ></i>
          <span>News</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($currentFile!="index.php"){echo "collapsed";}?>" href="<?php echo $baseref; ?>index.php">
          <i class="bi bi-grid" ></i>
          <span>Report</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="<?php echo $baseref; ?>#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo $baseref; ?>components-alerts.php">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-accordion.php">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-badges.php">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-breadcrumbs.php">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-buttons.php">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-cards.php">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-carousel.php">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-list-group.php">
              <i class="bi bi-circle"></i><span>List group</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-modal.php">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-tabs.php">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-pagination.php">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-progress.php">
              <i class="bi bi-circle"></i><span>Progress</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-spinners.php">
              <i class="bi bi-circle"></i><span>Spinners</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>components-tooltips.php">
              <i class="bi bi-circle"></i><span>Tooltips</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($link[2]!="getdata"){echo "collapsed";}?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="<?php echo $baseref; ?>#">
          <i class="bi bi-journal-text"></i><span>Insert Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse <?php if($link[2]=="getdata"){echo "show";}?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo $baseref; ?>getdata/getStd10.php" <?php if($currentFile=="getStd10.php"){echo "class=\"active\"";}?>>
              <i class="bi bi-circle"></i><span>Std 10</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>getdata/getMcq.php" <?php if($currentFile=="getMcq.php"){echo "class=\"active\"";}?>>
              <i class="bi bi-circle"></i><span>Mcq</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>getdata/getDiploma.php" <?php if($currentFile=="getDiploma.php"){echo "class=\"active\"";}?>>
              <i class="bi bi-circle"></i><span>Diploma</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>getdata/getMath.php" <?php if($currentFile=="getMath.php"){echo "class=\"active\"";}?>>
              <i class="bi bi-circle"></i><span>Maths</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>getdata/getMap.php" <?php if($currentFile=="getMap.php"){echo "class=\"active\"";}?>>
              <i class="bi bi-circle"></i><span>Map</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>forms-validation.php">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="<?php echo $baseref; ?>#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Board Style</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo $baseref; ?>design/boardScience.php">
              <i class="bi bi-circle"></i><span>Science</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>design/boardSs.php">
              <i class="bi bi-circle"></i><span>SS</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>design/boardMaths.php">
              <i class="bi bi-circle"></i><span>Maths</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="<?php echo $baseref; ?>#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo $baseref; ?>charts-chartjs.php">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>charts-apexcharts.php">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>charts-echarts.php">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($link[2]!="design"){echo "collapsed";}?>" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Design Paper</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse <?php if($link[2]=="design"){echo "show";}?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo $baseref; ?>design/weeklyassessment.php" <?php if($currentFile=="weeklyassessment.php"){echo "class=\"active\"";}?>>
              <i class="bi bi-circle"></i><span>Weekly Assessment</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>design/diplomaTest.php" <?php if($currentFile=="diplomaTest.php"){echo "class=\"active\"";}?>>
              <i class="bi bi-circle"></i><span>Diploma Test Paper</span>
            </a>
          </li>
          <li>
            <a href="<?php echo $baseref; ?>design/math.php" <?php if($currentFile=="math.php"){echo "class=\"active\"";}?>>
              <i class="bi bi-circle"></i><span>Maths</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo $baseref; ?>users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo $baseref; ?>pages-faq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $baseref."uploadProduction.php"; ?>">
          <i class="bi bi-envelope"></i>
          <span>Upload Seasonal Production</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo $baseref; ?>pages-register.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo $baseref; ?>pages-login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo $baseref; ?>pages-error-404.php">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo $baseref; ?>pages-blank.php">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->