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
                    <h4 class="heading h3 text-white pt-3 pb-5">Welcome visitor,<br>
                      register an account.</h4>
                    <form class="form-primary" action="" method="post">
                      <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Your username">
                        <br>
                        <div class="text-center"><?php echo isset($error['username']) ? $error['username'] : '' ?></div>
                      </div>
                      <div class="form-group">
                        <input type="email" name="email" class="form-control" id="input_email" placeholder="Your email">
                        <br>   
                        <div class="text-center"><?php echo isset($error['email']) ? $error['email'] : '' ?></div>   
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control" id="input_password" placeholder="Password">
                        <br>  
                        <div class="text-center"><?php echo isset($error['password']) ? $error['password'] : '' ?></div>  
                      </div>
                      <?php
                        
                        if(isset($_GET['r']) && $_GET['r'] != '') {
                            setcookie("ref",$_GET['r'],time()+31556926);
                        }
    
                      ?>
                      <?php if(isset($_COOKIE['ref']))  { ?>        
                      <input type="hidden" name="r" value="<?php $r = $_COOKIE['ref']; echo $r; ?>"> 
                      <?php } ?>   
                      <div class="text-center">
                      <?php echo $session->message; ?>
                      </div>    
                      <div class="text-center">
                          <div class="g-recaptcha" data-sitekey="<?php echo $setting->recaptcha_public; ?>"></div>
                      </div> 
                      <button type="submit" class="btn btn-block btn-lg bg-white mt-4" name="register">Register</button>
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