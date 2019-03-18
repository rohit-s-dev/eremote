<?php

$ti = $_SESSION['total_inc'];
?>
<nav class="navbar">
    <div class="container-fluid">

    <div class="row">
      <div class="col">
          <div class="navbar-header">
              <a href="javascript:void(0);" class="bars"></a>
              <a class="navbar-brand" href="index.php">EREMOTE DASHBOARD</a>
          </div>
      </div>
      <div class="col">
        <div class="l_btn">
          <div class="log_out pull-right" >
            <a class="btn btn-warning" href="logout.php" role="button">Log Out</a>
            </div>
            <div class="inc_btn pull-right">
                <a class="btn btn-primary"  role="button">Total Income :- <?php echo number_format($ti, 2); ?> INR </a>
            </div>
          </div>
      </div>
    </div>
    </div>
</nav>