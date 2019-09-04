<div class="row">
    
    <div class="col-md-12">
        
        <div class="text-center">
    
        <?php echo $session->message; ?>
    
        </div>
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">My latest 10 tickets</strong>
            </div>
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $place = "";
						
						if(empty($tickets)) {
							
                            
						} else {
							
							foreach($tickets as $ticket) {
                        $place = ++$place;
                      ?>
                        
                        <tr>
							<td><?php echo $place; ?></td>
							<td><?php echo $ticket->type; ?></td>
							<td><?php echo $ticket->title; ?> </td>
                            <td><?php echo substr($ticket->message, 0, 25)?>... </td>
                            <td><?php echo $ticket->created; ?> </td>
                            <td><button type="button" class="btn btn-outline-secondary"><?php echo $ticket->status; ?></button></td>
                            <td><a href="ticket.php?id=<?php echo $ticket->id; ?>" type="button" class="btn btn-warning">View</a></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="ticketID" value="<?php echo $ticket->id; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger">Remove</button>
                                </form>
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