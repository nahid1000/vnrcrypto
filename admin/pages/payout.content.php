<div class="row">

    <div class="col-md-12">
    
        <div class="text-center">
        
            <?php echo $session->message; ?>
        
        </div>
        
        <div class="card" style="width: 100%;">
								  <div class="card-body">
									<h3 class="card-title">Latest 100 Withdrawal Requests</h3>
									<p>Click on <strong>PENDING</strong> button to change payment request status to <strong>COMPLETED</strong>.</p>
											   <div class="table-responsive">
												<table class="table align-items-center table-white">
												
												<thead class="thead-dark">
													<tr>
														<th scope="col">#</th>
														<th scope="col">Date</th>
														<th scope="col">User</th>
														<th scope="col">Address</th>
														<th scope="col">Amount </th>
														<th scope="col">Status</th>
													</tr>
												</thead>
												<tbody>
											 <?php if(!$requests) : ?>
													  
													  <?php else: ?>

														<?php 
														$place = "";
														foreach($requests as $request) {
														$place = ++$place;
														?>
														
														<tr>
														<td><?php echo $place; ?></td>
														<td><?php echo $request->date; ?></td>
														<td><?php echo $request->name; ?></td>
														<td><?php echo $request->address; ?></td>
														<td><?php echo $request->amount; ?></td>
														
														<?php if($request->status == 'pending') : ?>
														
														<td>
															<form action="" method="post">
															<input type="hidden" name="id" value="<?php echo $request->id; ?>">
															<button class="btn btn-warning btn-sm" name="pay"><?php echo $request->status; ?></button>    
															</form>
														</td>
														
														<?php else: ?>
														<td>
															<button class="btn btn-success btn-sm" name="pay"><?php echo $request->status; ?></button>
														</td>	
														<?php endif; ?>
													  </tr>
														
													  <?php } ?>  
															
													  <?php endif; ?>	
														   
						</tbody>
					</table>

					</div> 
                  
              </div>
    
    </div>

</div>