<?php 

$url = getBaseUrl();
      
?> 
<div class="row">

    <div class="col-md-12 text-center">
    
        <h1>Referrals</h1>
        <br>

    </div>
    <br>
    <div class="col-md-6">
    
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-link text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Referrals Earnings</div>
                        <div class="stat-digit"><span class="count"><?php echo $user->earnings; ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    <div class="col-md-6">
    
        <div class="card text-white bg-flat-color-3">
            <div class="card-body">
                <div class="card-left pt-1 float-left">
                    <h3 class="mb-0 fw-r">
                        <span class="count"><?php echo $countrefs; ?></span>
                    </h3>
                    <p class="text-light mt-1 m-0">Referrals</p>
                </div>
                <div class="card-right float-right text-right">
                    <i class="icon fade-5 icon-lg pe-7f-users"></i>
                </div>
            </div>
        </div>
    
    </div>

</div>

<div class="row">

        <div class="col-md-8 offset-md-2">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Referral link</strong>
                <p>Share your referral url and earn more!</p>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
						
                        <input type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $url ?>register.php?r=<?php echo $user->referral_id; ?>">
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>

<div class="row">

    <div class="col-md-12">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">My latest 10 referrals</strong>
            </div>
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th>Username</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $place = "";
						
						if(empty($referrals)) {
							
						} else {
							
							foreach($referrals as $referral) {
                        $place = ++$place;
                      ?>
                        
                        <tr>
							<td><?php echo $place; ?></td>
							<td><?php echo $referral->username; ?></td>
							<td><?php echo $referral->created_date; ?> </td>
						</tr>
                        
                      <?php } ?> 
							
						<?php } ?>  
                </tbody>
            </table>
            </div> 
        </div>
    
    </div>

</div>