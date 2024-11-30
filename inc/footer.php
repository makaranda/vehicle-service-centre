<script>
  $(document).ready(function(){
    $('#p_use').click(function(){
      uni_modal("Privacy Policy","policy.php","mid-large")
    })
     window.viewer_modal = function($src = ''){
      start_loader()
      var t = $src.split('.')
      t = t[1]
      if(t =='mp4'){
        var view = $("<video src='"+$src+"' controls autoplay></video>")
      }else{
        var view = $("<img src='"+$src+"' />")
      }
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
      $('#viewer_modal .modal-content').append(view)
      $('#viewer_modal').modal({
              show:true,
              backdrop:'static',
              keyboard:false,
              focus:true
            })
            end_loader()  

  }
    window.uni_modal = function($title = '' , $url='',$size=""){
        start_loader()
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_loader()
                }
            }
        })
    }
    window._conf = function($msg='',$func='',$params = []){
       $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
       $('#confirm_modal .modal-body').html($msg)
       $('#confirm_modal').modal('show')
    }
  })
</script>
<!-- Footer-->
     <!-- Footer ==== -->
     <footer class="footer">
		<div class="footer-info bg-primary">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-3 col-md-6 col-sm-6 mb-30">
						<div class="footer-logo">
							<img src="<?php echo base_url ?>template/images/logo2.png" alt=""/> 
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 mb-30">
						<div class="feature-container left footer-info-bx">
							<div class="icon-lg">
								<span class="icon-cell"><img src="<?php echo base_url ?>template/images/icon/contact/icon3.png" alt=""/></span> 
							</div>
							<div class="icon-content">
								<p>2005 Stokes Isle Apt. 896, Venaville 10010, USA</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 mb-30">
						<div class="feature-container left footer-info-bx">
							<div class="icon-lg">
								<span class="icon-cell"><img src="<?php echo base_url ?>template/images/icon/contact/icon1.png" alt=""/></span> 
							</div>
							<div class="icon-content">
								<p>+001 123 456 790 <br/>(02) 3424 44 00</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 mb-30">
						<div class="feature-container left footer-info-bx">
							<div class="icon-lg">
								<span class="icon-cell"><img src="<?php echo base_url ?>template/images/icon/contact/icon2.png" alt=""/></span> 
							</div>
							<div class="icon-content">
								<p>info@yourdomain.com <br/>example@support.com</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-top bt0">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-6">
						<div class="widget footer_widget">
							<h5 class="footer-title">Company</h5>
							<p class="mb-20">Need a special repair service? we are happy to fulfil every request in order to exceed your expectations</p>
							<div class="ft-content">
								<i class="fa fa-phone"></i>
								<span>Talk To Our Support</span>
								<h4>+22 123 456 7890 </h4>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
						<div class="widget widget-link-2">
							<h5 class="footer-title">Our Solutions</h5>
							<ul>
								<li><a href="about-1.html">About Us</a></li>
								<li><a href="service-engine-diagnostics.html">Engine Services</a></li>
								<li><a href="booking.html">Booking</a></li>
								<li><a href="service-lube-oil-and-filters.html">Oil And Filters</a></li>
								<li><a href="service-1.html">Our Services</a></li>
								<li><a href="service-belts-and-hoses.html">Belts And Hoses</a></li>
								<li><a href="job-career.html">Job Career</a></li>
								<li><a href="service-brake-repair.html">Brake Repair</a></li>
								<li><a href="team.html">Out Team</a></li>
								<li><a href="service-air-conditioning.html">Air Conditioning</a></li>
								<li><a href="contact-1.html">Contact Us</a></li>
								<li><a href="service-tire-and-wheel-services.html">Tire And Wheel</a></li>
							</ul>							
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
						<div class="widget recent-posts-entry">
							<h5 class="footer-title">Latest news</h5>
							<div class="widget-post-bx">
								<div class="widget-post clearfix">
									<div class="ttr-post-media"> 
										<img src="<?php echo base_url ?>template/images/blog/recent-blog/pic1.jpg" alt=""> 
									</div>
									<div class="ttr-post-info">
										<h6 class="post-title"><a href="blog-details.html">Precious Tips To Help You Get Better.</a></h6>
										<ul class="post-meta">
											<li class="date"><a href="blog-details.html"><i class="fa fa-calendar"></i> 15 Aug 2021</a></li>
										</ul>
									</div>
								</div>
								<div class="widget-post clearfix">
									<div class="ttr-post-media"> 
										<img src="<?php echo base_url ?>template/images/blog/recent-blog/pic2.jpg" alt=""> 
									</div>
									<div class="ttr-post-info">
										<h6 class="post-title"><a href="blog-details.html">Ten Doubts You Should Clarify About.</a></h6>
										<ul class="post-meta">
											<li class="date"><a href="blog-details.html"><i class="fa fa-calendar"></i> 15 Aug 2021</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
                        <div class="widget widget_info">
                            <h5 class="footer-title">Subscribe Now</h5>
							<p class="mb-20">Weekly Breaking News Analysis And Cutting Edge Advices On Job Searching.</p>
							<form class="subscribe-form subscription-form mb-30" action="https://serfix.themetrades.com/html/demo/script/mailchamp.php" method="post">
								<div class="ajax-message"></div>
								<div class="input-group">
									<input name="email" required="required" class="form-control" placeholder="Email Address" type="email">
									<div class="input-group-append">
										<button name="submit" value="Submit" type="submit" class="btn w-100 btn-primary radius-sm">Send</button>	
									</div>
								</div>
							</form>
							<ul class="list-inline ft-social-bx">
								<li><a href="javascript:void(0);" class="btn button-sm"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:void(0);" class="btn button-sm"><i class="fa fa-twitter"></i></a></li>
								<li><a href="javascript:void(0);" class="btn button-sm"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="javascript:void(0);" class="btn button-sm"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
						<p class="mb-0">© Copyright  <?php echo $_settings->info('short_name') ?> <?php echo date('Y');?>. All right reserved.</p>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-end">
						<ul class="widget-link">
							<li><a href="index-2.html">Home</a></li>
							<li><a href="about-1.html">About</a></li>
							<li><a href="faq-1.html">FAQs</a></li>
							<li><a href="service-1.html">Services</a></li>
							<li><a href="contact-1.html">Contact</a></li>
						</ul>
					</div>
                </div>
            </div>
		</div>
    </footer>
    <!-- Footer END ==== -->
	<button class="back-to-top fa fa-chevron-up"></button>


   
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url ?>plugins/sparklines/sparkline.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url ?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url ?>plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- overlayScrollbars -->
    <!-- <script src="<?php echo base_url ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url ?>dist/js/adminlte.js"></script>
    <div class="daterangepicker ltr show-ranges opensright">
      <div class="ranges">
        <ul>
          <li data-range-key="Today">Today</li>
          <li data-range-key="Yesterday">Yesterday</li>
          <li data-range-key="Last 7 Days">Last 7 Days</li>
          <li data-range-key="Last 30 Days">Last 30 Days</li>
          <li data-range-key="This Month">This Month</li>
          <li data-range-key="Last Month">Last Month</li>
          <li data-range-key="Custom Range">Custom Range</li>
        </ul>
      </div>
      <div class="drp-calendar left">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-calendar right">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
    <div class="jqvmap-label" style="display: none; left: 1093.83px; top: 394.361px;">Idaho</div>

    <!-- <script src="<?php echo base_url ?>template/js/jquery.min.js"></script> -->
    <!-- <script src="<?php echo base_url ?>template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="<?php echo base_url ?>template/vendor/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url ?>template/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="<?php echo base_url ?>template/vendor/imagesloaded/imagesloaded.js"></script>
    <script src="<?php echo base_url ?>template/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="<?php echo base_url ?>template/vendor/progress-bar/jquery.appear.js"></script>
    <script src="<?php echo base_url ?>template/vendor/progress-bar/jquery.skillbar.js"></script> -->
    <script src="<?php echo base_url ?>template/vendor/swiper/swiper.min.js"></script>
    <script src="<?php echo base_url ?>template/js/functions.js"></script>
    <script src="<?php echo base_url ?>template/js/contact.js"></script>