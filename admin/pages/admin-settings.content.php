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
        <strong>Edit Admin</strong> 
        </div>
        <div class="card-body card-block">
            
            <div class="text-center">
            
                <?php echo $session->message; ?>
            
            </div>
            
            <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="username-input" class=" form-control-label">Username</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="username" placeholder="Username" value="<?php echo $user->username ?>" class="form-control">
                    </div>
                </div>
				 <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9">
                        <input type="email" name="email" placeholder="Email" value="<?php echo $user->email ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">Current Password</label></div>
                    <div class="col-12 col-md-9">
                        <input type="password" name="password" placeholder="Current Password" class="form-control">
                        <small class="help-block form-text">Only if you want to change your password</small>
                        <div class="text-center">
                            <?php echo $passMessage; ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">New Password Confirmation</label></div>
                    <div class="col-12 col-md-9">
                        <input type="password" name="newpassword" placeholder="New Password" class="form-control">
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