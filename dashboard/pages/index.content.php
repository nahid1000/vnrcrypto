<div class="row">

    <div class="col-12 col-md-4">
    
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="fa fa-arrow-circle-down"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text">
                                <span>
                                <?php if(!$profitperday) {echo 0;} else { echo $profitperday->profit; } ?>
                                </span> <?php echo $setting->currency; ?></div>
                            <div class="stat-heading">Revenue per day</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    <div class="col-12 col-md-4">
    
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-3">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span><?php echo $user->balance; ?></span> <?php echo $setting->currency; ?></div>
                            <div class="stat-heading">Balance</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="col-12 col-md-4">
    
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                        <i class="fa fa-bolt"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count"><?php echo $countminers; ?></span></div>
                            <div class="stat-heading">Active Miners</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<div class="row">

    <div class="col-12 col-md-4">
    
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                        <i class="fa fa-hand-o-down"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span><?php echo $userTotalDeposits; ?></span> <?php echo $setting->currency; ?></div>
                            <div class="stat-heading">Total Deposits</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    <div class="col-12 col-md-4">
    
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-link text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Referrals Earnings</div>
                        <div class="stat-digit"><span><?php echo $user->earnings; ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    <div class="col-12 col-md-4">
    
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

    <div class="col-12 col-md-12">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">My Miners</strong>
            </div>
        <div class="table-stats order-table ov-h">
            <table class="table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Profit</th>
                        <th>Expires</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $place = "";

                    if(empty($myplans)) {
                    
                    } else {
                        foreach($myplans as $myplan) {
                              $place = ++$place;
                    ?>

                    <tr>
                        <td><?php echo $myplan->name; ?></td>
                        <td><?php echo $myplan->profit; ?></td>
                        <td>
                         <?php 

                             $adate = $myplan->end;

                             $current_date = new DateTime(date('Y-m-d'), new DateTimeZone('Asia/Dhaka'));
                             $end_date = new DateTime("$adate", new DateTimeZone('Asia/Dhaka'));
                             $interval = $current_date->diff($end_date);

                          ?> 

                          <?php 

                                if($myplan->status == 'expired') {											 
                                    echo "expired";
                                } else {
                                    echo $interval->format('%a') . " day(s) left";
                                }

                          ?>


                         </td> 
                         <td>

                         <?php if($myplan->status == 'active') : ?>

                         <button type="button" class="btn btn-success">Active</button>

                         <?php else: ?>

                         <button type="button" class="btn btn-danger">Expired</button>

                         <?php endif; ?>


                         </td>
                    </tr>

                    <?php } ?>
                    <?php } ?>

                </tbody>
            </table>
            </div> 
        </div>
    
    </div>

</div>

<div class="row">

    <div class="col-12 col-md-12">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">My latest 10 deposits</strong>
            </div>
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>TxID</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $place = "";
						
						if(empty($payments)) {
							
						} else {
							
							foreach($payments as $payment) {
                        $place = ++$place;
                      ?>
                        
                        <tr>
							<td><?php echo $payment->value; ?> </td>
							<td><?php echo $payment->txid; ?></td>
							<td><?php echo $payment->deposit_date; ?></td>
							<td>
							<?php if($payment->status == 0) : ?>
							<button type="button" class="btn btn-warning btn-sm">Pending</button>
							<?php else: ?>
							
								<?php if($payment->status == 100) : ?>
								
									<button type="button" class="btn btn-success btn-sm">Complete</button>
								
								<?php else: ?>
								
									<button class="btn btn-small btn-pink"><span class="gradient">Active</span></button>
								<?php endif; ?>

							<?php endif; ?>
							</td>
						</tr>
                        
                      <?php } ?> 
							
						<?php } ?>
                </tbody>
            </table>
            </div> 
        </div>
    
    </div>

</div>

<div class="row">

    <div class="col-12 col-md-12">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">My latest 10 payouts</strong>
            </div>
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Req. date</th>
                        <th>Address</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        $place = "";
						
						if(empty($withdrawals)) {
							
						} else {
							
							foreach($withdrawals as $withdrawal) {
                        $place = ++$place;
                      ?>
                        
                        <tr>
							<td><?php echo $withdrawal->date; ?></td>
							<td><?php echo $withdrawal->address; ?> </td>
							<td><?php echo $withdrawal->amount; ?> Doge </td>
							<td>
							<?php if($withdrawal->status == 'pending') : ?>
							<button type="button" class="btn btn-warning btn-sm">Pending</button>
							<?php else: ?>

									<button type="button" class="btn btn-success btn-sm">Complete</button>

							<?php endif; ?>
							</td>
						</tr>
                        
                      <?php } ?> 
							
						<?php } ?>  
                </tbody>
            </table>
            </div> 
        </div>
    
    </div>

</div>

<div class="row">

    <div class="col-12 col-md-12">
    
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