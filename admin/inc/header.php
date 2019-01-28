<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SpringTime</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo + Top Nav -->
   
    <div id="top">
    <?php if(isset($_SESSION['adminKey'])): ?>
      <h1><a href="#">SpringTime</a></h1>
      <div id="top-navigation"> Welcome <a href="#"><strong><?php echo $_SESSION['adminKey']; ?></strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="logout.php">Log out</a> </div>
      <?php endif; ?>
    </div>

    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    <div id="navigation">
      <ul>
        <?php if(isset($_SESSION['adminKey'])): ?>
        <li><a href="index.php" <?php echo $type == "index" ? 'class="active"':''; ?>><span>Dashboard</span></a></li>
        <li><a href="users.php" <?php echo $type == "users" ? 'class="active"': ''; ?>><span>Users</span></a></li>
        <li><a href="pages.php" <?php echo $type == "pages" ? 'class="active"': ''; ?>><span>Pages</span></a></li>
        <li><a href="contents.php" <?php echo $type == "contents" ? 'class = "active"':''; ?>><span>Contents</span></a></li>
        <li><a href="#"><span>Products</span></a></li>
        <li><a href="#"><span>Services Control</span></a></li>
        <?php endif; ?>
      </ul>
    </div>
    <!-- End Main Nav -->
  </div>
</div>
<!-- End Header -->
<!-- Container -->
<div id="container">