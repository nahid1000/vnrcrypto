<!-- About section -->
<center><!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
  {
  "width": "1000",
  "height": "490",
  "defaultColumn": "moving_averages",
  "screener_type": "crypto_mkt",
  "displayCurrency": "USD",
  "colorTheme": "light",
  "locale": "in"
}
  </script>
</div>
<!-- TradingView Widget END --></center>
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h2>About .</h2>
					<p><?php echo $setting->home_about_short ?></p>
				</div>
			</div>
			<div class="about-img">
				<img src="assets/img/about-img.png" alt="">
			</div>
		</div>
	</section>
	<!-- About section end -->

<!-- Features section -->
	<section class="features-section spad gradient-bg">
		<div class="container text-white">
			<div class="section-title text-center">
				<h2>Our Features</h2>
                <h4><?php echo $setting->home_plans_description ?></h4>
			</div>
			<div class="row">
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-mobile"></i>
					<div class="feature-content">
						<h4>Mobile Responsive</h4>
						<p>vnrcrypto is fully mobile friendly and 
						responsive and easy to mine in every device. </p>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-shield"></i>
					<div class="feature-content">
						<h4>Safe & Secure</h4>
						<p>Vnrcrypto is Safe and Secured and its protected
						by COMODO SSL and Coinpayments Block Technology. </p>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-wallet"></i>
					<div class="feature-content">
						<h4>Wallet</h4>
						<p>Vnrcrypto have Integrated Coinpayments Wallets
						and blocks for mining and deposit. </p>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-headphone-alt"></i>
					<div class="feature-content">
						<h4>Experts Support</h4>
						<p>Vnrcrypto have a Responsible and 
						experianced Support Team. </p>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-reload"></i>
					<div class="feature-content">
						<h4>Instant Deposit</h4>
						<p>Vnrcrypto Supports instant Deposits Using Coinpayments. </p>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-panel"></i>
					<div class="feature-content">
						<h4>Easy To Use</h4>
						<p>Our Website is very Easy to use and also instant mining program. </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->

	<!-- Process section -->
	<section class="process-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h2>Get Started With <?php echo $setting->title; ?></h2>
			</div>
			<div class="row">
				<div class="col-md-4 process">
					<div class="process-step">
						<figure class="process-icon">
							<img src="icon/<?php echo $currency->coin_icon ?>" alt="#" width="50">
						</figure>
						<h4>Create Your Account</h4>
						<p>use your email to register your account in just few clicks!. </p>
					</div>
				</div>
				<div class="col-md-4 process">
					<div class="process-step">
						<figure class="process-icon">
							<img src="icon/<?php echo $currency->coin_icon ?>" alt="#" width="50">
						</figure>
						<h4>Deposit in Your Wallet</h4>
						<p>Deposits Bitcoin in your account to start mining. </p>
					</div>
				</div>
				<div class="col-md-4 process">
					<div class="process-step">
						<figure class="process-icon">
							<img src="icon/<?php echo $currency->coin_icon ?>" alt="#" width="50">
						</figure>
						<h4>Purchase a Miner</h4>
						<p>Purchase mining packages which u like and start mining. </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Process section end -->

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