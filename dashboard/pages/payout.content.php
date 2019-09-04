<div class="row">

    <div class="col-md-12 text-center">
    
        <h1>Withdraw Funds</h1>
        <br>
        
    </div>
    <br>
    <div class="col-md-8 offset-md-2">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Withdraw Funds</strong>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Request a payout</h3>
                        </div>
                        <br>
                        <div class="text-center">
                        
                            <?php echo $session->message; ?>
                        
                        </div>
                        <hr>
                        <form action="" method="post">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="disabled-input" class=" form-control-label">Payment Address</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $user->payment_address; ?>" disabled="" class="form-control">
                                    <small class="help-block form-text">You can change it on profile page</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Amount to withdraw</label>
                                <input name="amount" type="text" class="form-control" aria-required="true" aria-invalid="false" value="0.5">
                            </div>

                            <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="request">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Request</span>
                            </button>
                            </div>
                        </form>
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
                <strong class="card-title">My latest 10 payouts</strong>
            </div>
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th>Request date</th>
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
							<td><?php echo $place; ?></td>
							<td><?php echo $withdrawal->date; ?></td>
							<td><?php echo $withdrawal->address; ?> </td>
							<td><?php echo $withdrawal->amount; ?> BTC </td>
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