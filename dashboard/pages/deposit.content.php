<?php $payments = Payment::get_payments($user->username); ?>
<div class="row">

    <div class="col-xs-12 col-md-12 text-center">
    
        <h1>Top up your account</h1>
        <br>
        
    </div>
    <br>
    <div class="col-xs-12 col-md-12 col-12">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Top up account</strong>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Deposit funds</h3>
                        </div>
                        <hr>
                        <form action="https://www.coinpayments.net/index.php" name="coin_payment_form" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_pay_simple">
                            <input type="hidden" name="reset" value="1">
                            <input type="hidden" name="merchant" value="<?php echo $setting->cp_merchant ?>">
                            <input type="hidden" name="item_name" value="<?php echo $user->username; ?>">
                            <input type="hidden" name="item_desc" value="Top up">
                            <input type="hidden" name="currency" value="<?php echo $currency->coin_short ?>">
                            <input type="hidden" name="amountf" id="amountf" value="">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Payment amount</label>
                                <input id="amount" name="amountf" type="text" class="form-control" aria-required="true" aria-invalid="false" value="0.03">
                            </div>

                            <div>
                            <button id="payment-button" type="submit" class="btn btn-info btn-block" name="pay">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Top up with CoinPayments</span>
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

    <div class="col-xs-12 col-md-12 col-12">
    
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