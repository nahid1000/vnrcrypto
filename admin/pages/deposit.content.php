<div class="row">

    <div class="col-md-12">
    
        <div class="card" style="width: 100&;">
								  <div class="card-body">
									<h4 class="card-title">Latest 20 Completed Deposits</h4>
									<p class="card-text">
									  
										<div class="table-responsive">
											<table class="table align-items-center table-white">
											
											<thead class="thead-dark">
												<tr>
													<th scope="col">#</th>
													<th scope="col">User</th>
													<th scope="col">Amount</th>
													<th scope="col">Date </th>
													<th scope="col">Status</th>
												</tr>
											</thead>
											<tbody>
										 <?php if(!$payments) : ?>
													  
													  <?php else: ?>

														<?php 
														$place = "";
														foreach($payments as $payment) {
														$place = ++$place;
														?>
														
														<tr>
														<td><?php echo $place; ?></td>
														<td><?php echo $payment->username; ?></td>
														<td><?php echo $payment->value; ?></td>
														<td><?php echo $payment->deposit_date; ?></td>
														<td>
														<?php if($payment->status == 0) : ?>
														<button class="btn btn-small btn-pink"><span class="gradient">Pending</span></button>
														<?php else: ?>
														
															<?php if($payment->status == 100) : ?>
															
																<button class="btn btn-success"><span class="gradient">Complete</span></button>
															
															<?php else: ?>
															
																<button class="btn btn-small btn-pink"><span class="gradient">Active</span></button>
															<?php endif; ?>

														<?php endif; ?>
														</td>
													  </tr>
														
													  <?php } ?>  
															
													  <?php endif; ?>	
														   
						</tbody>
					</table>

					</div> 
                  
                </p>
                
              </div>
            </div>
    
    </div>

</div>