

<div class="row">

    <div class="col-md-12 text-center">
    
        <h1>Edit your profile</h1>
        <br>
        
    </div>

</div>
<br>
<div class="row">

    <div class="col-md-12">
    
        <div class="card">
        <div class="card-header">
        <strong>Edit profile</strong> 
        </div>
        <div class="card-body card-block">
            
            <div class="text-center">
            
                <?php echo $session->message; ?>
            
            </div>
            
            <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Username</label></div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static"><?php echo $user->username; ?></p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static"><?php echo $user->email; ?></p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label"><?php echo $setting->currency; ?> Address</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="payment_address" value="<?php echo $user->payment_address ?>" id="text-input" placeholder="Receiving address" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">Current Password</label></div>
                    <div class="col-12 col-md-9">
                        <input type="password" name="password" id="password-input" placeholder="Password" class="form-control">
                        <small class="help-block form-text">Only if you want to change your password</small>
                        <div class="text-center">
                            <?php echo $passMessage; ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">New Confirmation</label></div>
                    <div class="col-12 col-md-9">
                        <input type="password" name="newpassword" id="password-input" placeholder="Password" class="form-control">
                        <small class="help-block form-text">Only if you want to change your password</small>
                    </div>
                </div>
                <div class="row form-group">
                
                    <button type="submit" name="update" class="btn btn-primary btn-block">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                
                </div>
            </form>
        </div>
        </div>
    
    </div>

</div>