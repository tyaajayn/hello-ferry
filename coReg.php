<?php include('company.php')?>
<!DOCTYPE html>
<html class="desktop mbr-site-loaded"><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/image-processing20200410-18222-tl5tm1-128x53.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>HelloFerry</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<body>
  
  <section class="menu menu3 cid-sn21qrccRj" once="menu" id="menu3-1e">
    
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white text-primary display-7" href="home.html">HelloFerry</a></span>
            </div>
        </div>
    </nav>
</section>

<section class="form5 cid-sn1Q6oEwoi" id="form5-17">
	<section class="form5 cid-sn1Q6oEwoi" id="form5-17">
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Company Register</strong></h3>
            
        </div>

<center>
<form name="frmReg" method="post" action="coReg.php">
    <?php include ('errors.php');?>
<br><br><table cellpadding="5" cellspacing="5">
<tbody><tr><td>
</td></tr>
<tr>
<td>
</td><td> Company Name : </td>
<td><input name="coName" class="form-control" required="" value="<?php echo $coName?>"></td>
</tr>
<tr>
<td>
</td><td> Username : </td>
<td><input name="coUsername" class="form-control" required=""value="<?php echo $coUsername?>"></td>
</tr>
<tr>
<td>
</td><td> Phone Number : </td>
<td><input name="coTelNo" class="form-control" value="<?php echo $coTelNo?>"></td>
</tr>
<tr>
<td>
</td><td> Headquaters : </td>
<td>
<input name="coHq" class="form-control" required="" value="<?php echo $coHq?>"></td>
</tr>
<tr>
<td>
</td><td> Email : </td>
<td><input type="email" name="coEmail" class="form-control" value="<?php echo $coEmail?>"></td>
</tr>
<tr>
<td>
</td><td> Password : </td>
<td><input type="password" name="coPass" class="form-control"  required="">
</td>
</tr>
<tr>
<td>
</td><td> Confirm Password : </td>
<td><input type="password" name="password2" class="form-control" required="">
</td>
</tr>
</tbody>
</table><br><br>
<input name="co_reg" value="Register" type="submit" class="btn btn-success">
<br><br><br>
<p>Have an account? Log in now!</p>
<p><a href="coLog.php">Company</a> || <a href="adLog.php">Admin</a> || <a href="custLog.php">Customer</a></p>
</form>
</center>
</div></section>
<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/r" style="flex: 1 1; height: 3rem; padding-left: 1rem;" class=""></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script> 
</body></html>