<?php
  $baseref = "http://localhost/Ewaste/";
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
          <span>Waste</span>
        </a>
      </li><!-- End Dashboard Nav -->
  </aside><!-- End Sidebar-->