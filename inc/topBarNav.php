<!-- Header -->
 <?php
  //var_dump($_SESSION);
 ?>
<header class="header header-transparent rs-nav">
		<!-- Menu Header -->
		<div class="sticky-header navbar-expand-lg">
			<div class="menu-bar clearfix ">
				<div class="container clearfix">
					<!-- Website Logo -->
					<div class="menu-logo">
            
						<a href="./" class="main-logo">
              <img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30" class="d-inline-block align-top" alt="<?php echo $_settings->info('short_name') ?>" loading="lazy" style="width:80px"/>
            </a> 
						 <a href="./" class="sticky-logo">
              <img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30" class="d-inline-block align-top" alt="<?php echo $_settings->info('short_name') ?>" loading="lazy" style="width:80px"/>
            </a>
					</div>
					<!-- Nav Toggle -->
					<button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
					<!-- Secondary Menu -->
					<div class="secondary-menu">
						<button type="button" class="btn btn-outline-light" id="registerModalBtn">Sign in</button>
						<button type="button" class="btn btn-warning ml-3" id="loginModalBtn">Login</button>
						<a href="#" class="btn btn-primary ms-3" id="send_request" type="button">Booking</a>
					</div>
					<!-- Menu Links -->
					<div class="menu-links navbar-collapse collapse justify-content-center" id="menuDropdown">
						<div class="menu-logo">
							<a href="./"><img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"><?php echo $_settings->info('short_name') ?></a>
						</div>
						<ul class="nav navbar-nav">	
							<li class="active"><a aria-current="page" href="./">Home<i class="fa fa-chevron-down"></i></a></li>
							<li><a href="./?p=about">About Us <i class="fa fa-chevron-down"></i></a></li>
							<li><a href="#">Contact Us <i class="fa fa-chevron-down"></i></a></li>
						</ul>
						<ul class="social-media">
							<li><a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-facebook"></i></a></li>
							<li><a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-twitter"></i></a></li>
						</ul>
						<div class="menu-close">
							<i class="ti-close"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Main Header End -->
	</header>
  <div class="page-content bg-white">
	<!-- Header End -->
<!-- 
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="topNavBar">
            <div class="container px-4 px-lg-5 ">
                <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" href="./">
                <img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                <?php echo $_settings->info('short_name') ?>
                </a> -->

                <!-- <form class="form-inline" id="search-form">
                  <div class="input-group">
                    <input class="form-control form-control-sm form " type="search" placeholder="Search" aria-label="Search" name="search"  value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>"  aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success btn-sm m-0" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form> -->
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="./">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="./?p=about">About Us</a></li>
                    </ul>
                    <div class="d-flex align-items-center">
                    </div>
                </div>
            </div>
        </nav> -->
<script>
  $(function(){
    $('#login-btn').click(function(){
      uni_modal("","login.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })

  $('#search-form').submit(function(e){
    e.preventDefault()
     var sTxt = $('[name="search"]').val()
     if(sTxt != '')
      location.href = './?p=products&search='+sTxt;
  })
</script>