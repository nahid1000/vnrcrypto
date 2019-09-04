<div class="row">

<div class="col-md-12">
<a href="tickets.php"><button type="button" class="btn btn-info">Back to tickets</button></a>
</div>

<div class="col-md-8 offset-md-2">
    
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Ticket Number <strong><span class="badge badge-danger float-right mt-1"><?php echo $ticketInfo->id ?></span></strong></strong>
        </div>
        <div class="card-body">
            <p class="card-text">View and answer to your ticket.</p>
            <p class="card-text">Ticket Type: <?php echo $ticketInfo->type; ?></p>
            <p class="card-text">Ticket Status: <?php echo $ticketInfo->status; ?></p>
            <p class="card-text">Ticket Created: <?php echo $ticketInfo->created; ?></p>
            <p>Ticket Message:</p>
            
               <?php echo $ticketInfo->message; ?>
        
            <br>
            <br>
            <hr>
            <?php
            
            foreach ($ticketAnswers as $ticketAnswer) {
            
            ?>
            <div class="media">
              <div class="media-body">
                <?php if($ticketAnswer->ticket_author == 'Support') : ?>
                  
                <h5 class="mt-0"><span><?php echo $ticketAnswer->ticket_created ?></span> - <span class="text-warning">Support:</span></h5>
                  
                <?php else: ?>
                  
                <h5 class="mt-0"><span><?php echo $ticketAnswer->ticket_created ?></span> - You:</h5> 
                  
                <?php endif; ?>  
                <?php echo $ticketAnswer->ticket_message; ?>
              </div>
            </div>
            <hr>
            <?php } ?>
        </div>
    </div>
    
</div>
    
</div>

<div class="row">

    <div class="col-md-12">
    
        <div class="card">
            <div class="card-header">
                <strong>Response to ticket</strong>
            </div>
            <br>
            <div class="col-md-6 offset-md-3 text-center">
            
                <?php echo $session->message; ?>
            
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Message</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="message" id="textarea-input" rows="9" placeholder="Message..." class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                    
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="response"><i class="fa fa-dot-circle-o"></i> Submit</button>
                    
                    </div>
                </form>
            </div>
        </div>
        
    </div>

</div>