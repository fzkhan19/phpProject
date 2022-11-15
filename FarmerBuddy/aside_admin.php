<?php
  
  $link = explode('/',$_SERVER['REQUEST_URI']);
  $currentFile = end($link);
  //print_r($link);
  //echo "\t$currentFile";
?>
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php if($currentFile!="index.php"){echo "collapsed";}?>" href="index.php">
          <i class="bi bi-grid" ></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     
      <li class="nav-item">
        <a class="nav-link <?php if($currentFile!="schemes.php"){echo "collapsed";}?>" href="schemes.php">
          <i class="bi bi-grid" ></i>
          <span>Schemes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($currentFile!="news.php"){echo "collapsed";}?>" href="news.php">
          <i class="bi bi-grid" ></i>
          <span>News</span>
        </a>
      </li>
     

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->