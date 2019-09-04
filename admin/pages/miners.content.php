<div class="row">

    <div class="col-md-12 text-center">
                    
                    <?php echo $session->message; ?>
                    
    </div>  
    
    <div class="col-md-4">
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Add Miner</strong>
            </div>
            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-percent" class=" form-control-label">Percent/Day</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="percent" class="form-control">
                    </div>
                </div>
                    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-profit" class=" form-control-label">Profit/Day</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="profit" class="form-control">
                    </div>
                </div> 
                    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-duration" class=" form-control-label">Duration</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" name="duration" value="30" min="1" class="form-control"> days
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-price" class=" form-control-label">Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="price" class="form-control">
                    </div>
                </div>
                    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-image" class=" form-control-label">Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" name="miner_image">
                    </div>
                </div>  
                
                <button type="submit" class="btn btn-info btn-block" name="add">Add Miner</button>    
                    
                </form>
            </div>
        </div>
    
    </div>

    <div class="col-md-8">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">All Miners</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Percent</th>
                            <th scope="col">Profit</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        
                        foreach($plans as $plan) {
                        
                        ?>
                        
                        <tr>
                        <th><?php echo $plan->plan_name; ?></th>
                        <td><?php echo $plan->plan_percent; ?>%</td>
                        <td><?php echo $plan->plan_profit; ?>/day</td>
                        <td><?php echo $plan->plan_duration; ?> days</td>
                        <td><?php echo $plan->plan_price; ?></td>
                        <td><img src="images/<?php echo $plan->plan_image; ?>" width="50"></td>
                        <td>
                        
                            <form action="" method="post">
                            
                                <input type="hidden" name="minerid" value="<?php echo $plan->id; ?>">
                                <button type="submit" class="btn btn-warning" name="delete">Delete</button>
                                
                            </form>
                            
                        </td>    
                        </tr>
                        
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

</div>

<div class="row">

    <div class="col-md-12">
    
        <div class="card" style="width: 100&;">
								  <div class="card-body">
									<h3 class="card-title">Latest 100 Purchased Miners</h3>
									<p class="card-text">
									  
										<div class="table-responsive">
											<table class="table align-items-center table-dark">
											
											<thead class="thead-dark">
												<tr>
													<th scope="col">#</th>
													<th scope="col">Type</th>
													<th scope="col">Value</th>
													<th scope="col">User</th>
												</tr>
											</thead>
											<tbody>
										<?php if(!$lastMiners) : ?>
																		  
													  <?php else: ?>

														<?php 
														$place = "";
														foreach($lastMiners as $lastMiner) {
														$place = ++$place;
														?>
														
														<tr>
														<td><?php echo $place; ?></td>
														<td><?php echo $lastMiner->name; ?></td>
														<td><?php echo $lastMiner->value; ?></td>
														<td>
 
                                                            <?php 
                                                            
                                                            $lmn = Users::find_user_by_id($lastMiner->author);
                                                            
                                                            echo $lmn->username;
                                                            
                                                            ?>
                                                            
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