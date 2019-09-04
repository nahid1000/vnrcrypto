<div class="row">

    <div class="col-md-12 text-center">
    
        <h1>Buy a new miner and maximize your profits</h1>
        <br>

    </div>

</div>
<br>
<div class="text-center">

    <?php echo $session->message; ?>

</div>
<br>
<div class="row">

    <?php foreach($plans as $plan) { ?>
    
    <div class="col-md-6">
    
        <aside class="profile-nav alt">
            
            <section class="card">
                <div class="card-header user-header alt bg-dark">
                    <div class="media">
                        <a href="#">
                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/<?php echo $plan->plan_image; ?>">
                        </a>
                        <div class="media-body">
                            <h2 class="text-light display-6" style="margin-top: 20px;"><?php echo $plan->plan_name; ?></h2>
                        </div>
                     </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    <a href="#"> <i class="fa fa-plus"></i> Percent per day <span class="badge badge-primary pull-right"><?php echo $plan->plan_percent; ?>%</span></a>
                    </li>
                    <li class="list-group-item">
                    <a href="#"> <i class="fa fa-plus-circle"></i> Profit per day <span class="badge badge-danger pull-right"><?php echo $plan->plan_profit; ?> <?php echo $setting->currency; ?></span></a>
                    </li>
                    <li class="list-group-item">
                    <a href="#"> <i class="fa fa-clock-o"></i> Duration <span class="badge badge-success pull-right"><?php echo $plan->plan_duration; ?> day(s)</span></a>
                    </li>
                    <li class="list-group-item">
                    <a href="#"> <i class="fa fa-money"></i> Price <span class="badge badge-warning pull-right r-activity"><?php echo $plan->plan_price; ?> <?php echo $setting->currency; ?> </span></a>
                    </li>
                </ul>
                <div class="card-footer text-center">
                    <form action="" method="post">
                        <input type="hidden" name="type" value="<?php echo $plan->id; ?>">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="buy"><b>CLICK HERE TO PURCHASE</b></button>
                    </form>   
                </div>
            </section>
            
        </aside>
        
    </div>
    <?php } ?>
</div>