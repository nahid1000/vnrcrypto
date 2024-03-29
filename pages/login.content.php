<br> 
<main class="main">
      <section class="py-xl bg-cover bg-size--cover">
        <span class="mask bg-primary alpha-6"></span>
        <div class="container d-flex align-items-center no-padding">
          <div class="col">
            <div class="row justify-content-center">
              <div class="col-lg-4">
                <div class="card loginreg bg-info text-white">
                  <div class="card-body">
                    <span class="clearfix"></span>
                    <img src="icon/<?php echo $currency->coin_icon; ?>" style="width: 50px;">
                    <h4 class="heading h3 text-white pt-3 pb-5">Welcome back,<br>
                      login to your account.</h4>
                    <div class="text-center">
                        <?php echo $session->message; ?>
                    </div>  
                    <form class="form-primary" action="" method="post">
                      <div class="form-group">
                        <input type="email" name="email" class="form-control" id="input_email" placeholder="Your email">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control" id="input_password" placeholder="Password">
                      </div>
                      <div class="text-center">
                          <div class="g-recaptcha" data-sitekey="<?php echo $setting->recaptcha_public; ?>"></div>
                      </div>    
                      <div class="text-right mt-4"><a href="reset.php" class="text-white">Forgot password?</a></div>
                      <button type="submit" name="login" class="btn btn-block btn-lg bg-white mt-4">Sign in</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
<br>
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