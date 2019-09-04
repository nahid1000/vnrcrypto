<div class="row">

    <div class="col-md-3">
    <a href="users.php">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                    <i class="fa fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                        <div class="stat-text">
                            <span class="count">
                            
                                <?php 
                                
                                foreach($users as $user) {
                                    echo $user->id;
                                }
                                
                                ?>
                            
                            </span>
                        </div>
                        <div class="stat-heading">Total Users</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    </div>
    
    <div class="col-md-3">
    <a href="miners.php">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-2">
                    <i class="fa fa-circle"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?php echo $activeMiners; ?></span></div>
                        <div class="stat-heading">Active Miners</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>    
    </div>
    
    <div class="col-md-3">
    <a href="deposit.php">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-3">
                    <i class="fa fa-arrow-circle-down"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?php echo $userTotalDeposits; ?></span></div>
                        <div class="stat-heading">Total Deposits</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>    
    </div>
    
    <div class="col-md-3">
    <a href="payout.php">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                    <i class="fa fa-arrow-circle-up"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?php echo $userTotalWithdrawals; ?></span></div>
                        <div class="stat-heading">Total Withdrawals</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>    
    </div>

</div>

<div class="row">

    <div class="col-md-3">
        <a href="payout.php">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body">
                <div class="card-left pt-1 float-left">
                    <h3 class="mb-0 fw-r">
                    <span class="count"><?php echo $pending_withdrawals; ?></span>
                    </h3>
                    <p class="text-light mt-1 m-0">Pending Withdraw</p>
                </div>
                <div class="card-right float-right text-right">
                    <i class="icon fade-5 icon-lg fa fa-arrow-circle-up"></i>
                </div>
            </div>
        </div>
        </a>
    </div>
    
    <div class="col-md-3">
        <a href="tickets.php">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body">
                <div class="card-left pt-1 float-left">
                    <h3 class="mb-0 fw-r">
                    <span class="count"><?php echo $pending_tickets; ?></span>
                    </h3>
                    <p class="text-light mt-1 m-0">Pending Tickets</p>
                </div>
                <div class="card-right float-right text-right">
                    <i class="icon fade-5 icon-lg fa fa-ticket"></i>
                </div>
            </div>
        </div>
        </a>
    </div>
    
    <div class="col-md-3">
    
        <div class="card text-white bg-flat-color-2">
            <div class="card-body">
                <div class="card-left pt-1 float-left">
                    <h3 class="mb-0 fw-r">
                    <span class="count"><?php echo $totalUsersBalances; ?></span>
                    </h3>
                    <p class="text-light mt-1 m-0">User Balances</p>
                </div>
                <div class="card-right float-right text-right">
                    <i class="icon fade-5 icon-lg fa fa-money"></i>
                </div>
            </div>
        </div>
    
    </div>
    
    <div class="col-md-3">
    
        <div class="card text-white bg-flat-color-1">
            <div class="card-body">
                <div class="card-left pt-1 float-left">
                    <h3 class="mb-0 fw-r">
                    <span class="count"><?php echo $profitday; ?></span>
                    </h3>
                    <p class="text-light mt-1 m-0">User Profit/day</p>
                </div>
                <div class="card-right float-right text-right">
                    <i class="icon fade-5 icon-lg fa fa-money"></i>
                </div>
            </div>
        </div>
    
    </div>

</div>

<div class="row">

    <div class="col-md-12">
    
        <div class="card-group text-center">
            
            <?php 
            $color = "";
            foreach($plans as $plan) {
            $color = ++$color;
            $active = Plan::getActiveStats($plan->plan_name);
            $expired = Plan::getExpiredStats($plan->plan_name);
            ?>
            
            <div class="card col-md-2 no-padding ">
                <div class="card-body">
                    <div class="h4 mb-0">
                        <p>Active: <span class="count"><?php echo $active; ?></span></p>
                        <p>Expired: <span class="count"><?php echo $expired ?></span></p>
                    </div>
                        <small class="text-muted text-uppercase font-weight-bold"><?php echo $plan->plan_name; ?></small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-<?php echo $color; ?>" style="width: 100%; height: 5px;"></div>
                </div>
            </div>
            <?php } ?>
            
            <div class="card col-md-2 no-padding ">
                <div class="card-body">
                    <div class="h4 mb-0">
                        <p>Active: <span class="count"><?php echo $activeBonus; ?></span></p>
                        <p>Expired: <span class="count"><?php echo $expiredBonus ?></span></p>
                    </div>
                        <small class="text-muted text-uppercase font-weight-bold">Bonus Miner</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-6" style="width: 100%; height: 5px;"></div>
                </div>
            </div>
            
        </div>
    </div>

</div>
<br>
<div class="row">

    <div class="col-md-12">
    
                <div class="card">
				  <div class="card-body">
					<h4 class="card-title">Latest registered users</h4>
					<p class="card-text">
					  
						<div class="table-responsive" style="overflow-y: scroll;height: 400px;">
							<table class="table align-items-center table-white">
							
							<thead class="thead-dark">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Username</th>
									<th scope="col">Email</th>
									<th scope="col">Balance</th>
									<th scope="col">Total Deposits</th>
									<th scope="col">Register Date</th>
									<th scope="col">More Info</th>
								</tr>
							</thead>
							<tbody>
							
							
							        <?php 
									
									$per_page = 100;


									if(isset($_GET['page'])) {


									if(is_numeric($_GET['page'])){
										$page = $_GET['page'];
										
										
										
									} else {
										redirect('/');
									}
									

									} else {


										$page = "";
									}


									if($page == "" || $page == 1) {

										$page_1 = 0;

									} else {

										$page_1 = ($page * $per_page) - $per_page;

									}
									
									
									$count = Users::count_users();
									
									$count  = ceil($count /$per_page);
									
									$users = Users::get_users_page($page_1, $per_page); 
									
									if(empty($users)) {
										redirect('/');
									}
									
									foreach($users as $user) {
									
									?>
							
							
								<tr>
									<td><?php echo $user->id; ?></td>
									<td><?php echo $user->username; ?></td>
									<td><?php echo $user->email; ?></td>
									<td><?php echo $user->balance; ?></td>
									<td><?php echo $user->total_deposit; ?></td>
									<td><?php echo $user->register_date; ?></td>
									<td><a href="user.php?username=<?php echo $user->username ?>"><button type="button" class="btn btn-outline-primary"><i class="fa fa-eye"></i>&nbsp; View</button></a></td>

								</tr>	

								<?php } ?>
								
							</tbody>
						</table>

						</div> 
						<br>
						
						<nav aria-label="Page navigation example">
						  <ul class="pagination justify-content-center">
								<?php 

									$number_list = array();
									for($i =1; $i <= $count; $i++) {
									if($i == $page) {
										 echo "<li class='page-item active'><a class='page-link' href='dashboard.php?page={$i}'>{$i}</a></li>";
									}  else {
										echo "<li class='page-item'><a class='page-link' href='dashboard.php?page={$i}'>{$i}</a></li>";
										echo "<br>";
									}    
									}
								?>
						  </ul>
						</nav>
					  
					</p>
					
				  </div>
				</div>
    
    </div>

</div>