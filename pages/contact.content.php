<!-- Contact section -->
	<section class="contact-page spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
				
				<div class="text-center">
					<?php echo $session->message; ?>
				</div>
				
					<form action="" method="post" class="contact-form">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input class="check-form" type="text" placeholder="Name:" name="name">
									<span><i class="ti-check"></i></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="check-form" type="text" placeholder="Email Adress*:" name="email">
									<span><i class="ti-check"></i></span>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<textarea placeholder="Tell us about your question!" name="message"></textarea>
								</div>
                                <div class="text-center">
                                      <div class="g-recaptcha" data-sitekey="<?php echo $setting->recaptcha_public; ?>"></div>
                                  </div>  
								<button type="submit" name="send" class="site-btn sb-gradients mt-4">Send message</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-5 mt-5 mt-lg-0">
					<h3 class="heading heading-3 strong-300 text-black">
					<?php echo $setting->street; ?>
				  </h3>
				  <p class="lead mt-4 mb-4 text-black">
					E: <a href="#"><?php echo $setting->email; ?></a>
					<br>
					T: <?php echo $setting->telephone; ?>
				  </p>
				  <p class="text-black" >
					<?php echo $setting->about_text; ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact section end -->

<!-- Newsletter section -->
	<section class="newsletter-section gradient-bg">
		<div class="container text-white">
			<div class="row">
				<div class="col-lg-7 newsletter-text">
					<h2>Join <?php echo $setting->title ?></h2>
					<p><?php echo $setting->home_join ?></p>
				</div>
			</div>
		</div>
	</section>
	<!-- Newsletter section end -->