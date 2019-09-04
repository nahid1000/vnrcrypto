<div class="row">
    
    <div class="col-md-12 text-center">
    
        <?php echo $session->message; ?>
    
    </div>
    
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <strong>Manage</strong> SMTP EMAIL
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-host" class=" form-control-label">SMTP Host</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-location" name="host" value="<?php echo $setting->smtp_host; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-user" class=" form-control-label">SMTP User</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="user" id="hf-location" name="user" value="<?php echo $setting->smtp_user; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-password" class=" form-control-label">SMTP Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="hf-phone" name="password" value="<?php echo $setting->smtp_password; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-port" class=" form-control-label">SMTP Port</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-phone" name="port" value="<?php echo $setting->smtp_port; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-password" class=" form-control-label">SMTP Secure</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-phone" name="secure" value="<?php echo $setting->smtp_secure; ?>" class="form-control">
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary" name="update">Update</button>

                </form>
            </div>
        </div>
    
    </div>

</div>