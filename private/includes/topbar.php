<?php

$ti = $_SESSION['total_inc'];
?>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a> -->
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.php">EREMOTE DASHBOARD</a>
        </div>
      <div class="l_btn">
      <div class="log_out pull-right" style="margin-top: 20px;">
        <a class="btn btn-warning" href="logout.php" role="button">Log Out</a>
        </div>
        <div class="log_out pull-right" style="margin-top: 20px; margin-right: 10px;">
            <a class="btn btn-primary"  role="button">Total Income :- <?php echo number_format($ti, 2); ?> INR </a>
        </div>
      </div>
    </div>
</nav>