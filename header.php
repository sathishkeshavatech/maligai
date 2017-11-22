<link href="css/backendstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script src="js/jquery1.js" type="text/javascript"></script>
<script src="js/settings.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.date_input.js"></script>
<link rel="stylesheet" href="css/date_input.css" type="text/css">
<!--<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>-->
<title>Raga Designers Shoppingcart</title>

<body>
<div class="wrapper">
<div class="header">
<div class="inner-header">
<div class="inner-header-top">
<div class="logo"><a href="dashboard.php" class="alogo"></a></div>
    <div class="topmenu">
<?php if (isset($_SESSION['user_id'])) { ?>
  <span class="table0 wel">Welcome</span><a href="dashboard.php" class="table0"> <?php echo $_SESSION['user_name'];?></a><span class="table0"> | </span><a href="logout.php" class="table0"> Logout</a> | 
  <?php } else { ?>
  <a href="myaccount.php" class="table0">Login</a> | 
  <?php } ?>
 <a href="index.php" class="table0">View Store</a> | 
<a href="feedback.php" class="table0">FeedBack</a> | 
<a href="sitemap.php" class="table0">Sitemap</a>
</div>
</div>
<div class="inner-header-bottom">
<?php include 'menu.php'; ?>
</div>
</div>
</div>