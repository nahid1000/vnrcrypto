<?php $plans = Plan::get_plans(); ?>

<?php

if(isset($_POST['buy'])) {
    
    $miner = $_POST['type'];

	if(!is_numeric($miner)) {
		$session->message = "<div class='alert alert-danger' role='alert'><strong>Warning!</strong> Something went wrong, if the problem persist, please contact the administrator!</div>";
	} else {
        
        $reqPlan = Plan::find_plan($miner);
        
        if($reqPlan == false) {
            $session->message = "<div class='alert alert-danger' role='alert'><strong>Warning!</strong> Something went wrong, if the problem persist, please contact the administrator!</div>";
        } else {
            
            $miner = $reqPlan->plan_name;
            $minerProfit = $reqPlan->plan_profit;
            $minerValue = $reqPlan->plan_price;
            $end = date("Y-m-d", strtotime("+{$reqPlan->plan_duration} days"));
					
            if($user->balance < $minerValue) {
				$session->message = "<div class='alert alert-danger' role='alert'><strong>Warning!</strong> Balance to low, top up to buy a new miner!</div>";
						
            } else {
						
				$add = Miner::add_miner_to_plans($miner, $minerValue, $minerProfit, $end, $user->id);
				
				if($add) {
							
				    $user->balance = $user->balance - $minerValue;
				    $user->update();
							
				    $checkMiner = Miner::checkMiner($user->id);
							
				    if($checkMiner == false) {
								
				        $credited = date("Y-m-d", strtotime("-1 days"));
								
				        $addMiner = Miner::add_miner($user->id, $minerProfit, $credited);
								
				        if($addMiner) {
								$session->message = "<div class='alert alert-success' role='alert'><strong>Success!</strong> You purchase a new miner, earnings will be claimed the next day!</div>";
				            }
								
								
				        } else {
								
				            $updateMiner = Miner::update_miner($user->id, $minerProfit);
								
				            if($updateMiner) {
									$session->message = "<div class='alert alert-success' role='alert'><strong>Success!</strong> You purchase a new miner, earnings will be claimed the next day!</div>";
								}
								
							}
							
							
						} else {
							$session->message = "<div class='alert alert-danger' role='alert'><strong>Warning!</strong> Something went wrong, please try again!</div>";
						}
						
						
					}
            
        }
		
	}

}

?>