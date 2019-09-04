<div class="row">

    <div class="col-md-12">
    
                <div class="card">
                    
                    <div class="text-center">
                    
                        <?php echo $session->message; ?>
                    
                    </div>
                    
				  <div class="card-body">
					<h4 class="card-title">Users List</h4>
                      <form action="user.php" method="get">
                        <div class="row form-group">
                            
                            <div class="col col-md-5">
                                <h5>Search by Username</h5>
                                <div class="input-group">
                                    <input type="text" id="input2-group2" name="username" class="form-control">
                                    <div class="input-group-btn"><button type="submit" class="btn btn-primary">Search</button></div>
                                </div>
                            </div>
                        </div>
                      </form>
					<p class="card-text">
					  
						<div class="table-stats order-table ov-h" style="overflow-y: scroll;height: 500px;">
							<table class="table">
							
							<thead class="thead">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Username</th>
									<th scope="col">Email</th>
									<th scope="col">Balance</th>
									<th scope="col">Total Deposits</th>
									<th scope="col">Register Date</th>
									<th scope="col">More Info</th>
									<th scope="col">Edit</th>
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
									<td><a href="edituser.php?id=<?php echo $user->id ?>"><button type="button" class="btn btn-outline-primary"><i class="fa fa-edit"></i>&nbsp; Edit</button></a></td>
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