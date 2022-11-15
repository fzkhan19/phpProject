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
      </li>

    </ul>

  </aside><!-- End Sidebar-->