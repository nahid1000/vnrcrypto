<div class="row">

    <div class="col-md-12 text-center">
    
        <h1>Website Settings</h1>
    <br>
    </div>
    
    <div class="col-md-12">
    
        <div class="card">
            <div class="card-header">
                <strong class="card-title">**All settings are required!</strong>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="text-center">
                        
                            <?php echo $session->message; ?>
                        
                        </div>
                       
                        <form action="" method="post">
                            
                            <div class="text-center">
                            
                                <h3>Basic Settings</h3>
                                <br>
                                <hr>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>Website Title</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="title" placeholder="Website title" value="<?php echo $setting->title; ?>" class="form-control">
                                    <small class="form-text text-muted">Change your website title</small>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label"><strong>Website Description</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" id="textarea-input" rows="5" class="form-control"><?php echo $setting->description; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label"><strong>Select Website Currency</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="currency" id="select" class="form-control">
                                    <option value="<?php echo $setting->currency ?>"><?php echo $setting->currency ?> - Current</option>
                                     
                                    <?php
                                    
                                        foreach($coins as $coin) {
                                        
                                    ?>
                                    <option value="<?php echo $coin->coin_full; ?>"><?php echo $coin->coin_full; ?></option>    
                                    <?php } ?>    
                                    </select>
                                    
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>Recaptcha Public Key</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="recaptcha_public" value="<?php echo $setting->recaptcha_public; ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>Recaptcha Secret Key</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="recaptcha_secret" value="<?php echo $setting->recaptcha_secret; ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>CoinPayments Merchant</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="cp_merchant" value="<?php echo $setting->cp_merchant; ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>CoinPayments Secret</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="cp_secret" value="<?php echo $setting->cp_secret; ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>CoinPayments Debug Email</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="cp_debug_email" value="<?php echo $setting->cp_debug_email; ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="text-center">
                            
                                <h3>Global Settings</h3>
                                <br>
                                <hr>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label"><strong>Free Miner</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="free_miner" id="select" class="form-control">
                                    <option value="<?php echo $setting->free_miner; ?>"><?php if($setting->free_miner == 1) {echo "On";} else {echo "Off";} ?> - Current </option>
                                    <option value="1">On</option>
                                    <option value="0">Off</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>Free Miner Profit/Day</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="text-input" name="free_miner_profit" value="<?php echo $setting->free_miner_profit; ?>" class="form-control">
                                    <small class="form-text text-muted">Change free miner daily profit</small>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>Free Miner Duration</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="text-input" name="free_miner_end" value="<?php echo $setting->free_miner_end; ?>" class="form-control">
                                    <small class="form-text text-muted">Change free miner running days</small>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>Referral Commission</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="text-input" name="referral_com" value="<?php echo $setting->referral_com; ?>" class="form-control">
                                    <small class="form-text text-muted">Change Referral commission</small>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>Minimum Payout</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="min_payout" value="<?php echo $setting->min_payout; ?>" class="form-control">
                                    <small class="form-text text-muted">Change Minimum to Withdraw</small>
                                </div>
                            </div>
                            
                             <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label"><strong>Home Subtitle</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="home_subtitle" id="textarea-input" rows="5" class="form-control"><?php echo $setting->home_subtitle; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label"><strong>Home Join Text</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="home_join" id="textarea-input" rows="5" class="form-control"><?php echo $setting->home_join; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label"><strong>Home Footer Text</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="home_invest" id="textarea-input" rows="5" class="form-control"><?php echo $setting->home_invest; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label"><strong>Home About Short Text</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="home_about_short" id="textarea-input" rows="5" class="form-control"><?php echo $setting->home_about_short; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label"><strong>Home Our Features Text</strong></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="home_plans_description" id="textarea-input" rows="5" class="form-control"><?php echo $setting->home_plans_description; ?></textarea>
                                </div>
                            </div>
                            

                            <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="update">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Update</span>
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>