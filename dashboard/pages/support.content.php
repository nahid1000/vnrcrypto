<div class="row">

    <div class="col-md-12 text-center">
    
        <h1>Create and View Support Tickets</h1>
        <br>
    </div>

</div>

<div class="row">

    <div class="col-md-12">
    
        <div class="card">
            <div class="card-header">
                <strong>Create ticket</strong>
            </div>
            <br>
            <div class="col-md-6 offset-md-3 text-center">
            
                <?php echo $session->message; ?>
            
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Type</label></div>
                        <div class="col-12 col-md-9">
                            <select name="type" id="select" class="form-control">
                                <option value="0">Select Option</option>
                                <option value="1">Technical</option>
                                <option value="2">Financial</option>
                                <option value="3">Suggestion</option>
                                <option value="4">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"> 
                            <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="title" placeholder="Ticket title" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Message</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="message" id="textarea-input" rows="9" placeholder="Message..." class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                    
                        <button type="submit" class="btn btn-primary btn-block" name="create"><i class="fa fa-dot-circle-o"></i> Submit</button>
                    
                    </div>
                </form>
            </div>
        </div>
        
    </div>

</div>

<div class="row">

    <div class="col-md-12">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">My latest 10 tickets</strong>
            </div>
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Title</th>
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
							<td><?php echo $ticket->type; ?></td>
							<td><?php echo $ticket->title; ?> </td>
                            <td><?php echo $ticket->created; ?> </td>
                            <td>
                            <?php if($ticket->status == 'pending'):?>
                                <button class="btn btn-warning">Pending</button>
                            <?php else: ?>
                                <button class="btn btn-success">Replied</button>
                            <?php endif; ?>    
                            </td>
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