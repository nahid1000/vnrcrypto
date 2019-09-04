<div class="row">
    
    <div class="col-md-12 text-center">
    
        <?php echo $session->message; ?>
    
    </div>
    
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <strong>Manage</strong> Contact & About
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-location" class=" form-control-label">Location</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-location" name="street" value="<?php echo $setting->street; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-email" class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" id="hf-location" name="email" value="<?php echo $setting->email; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-phone" class=" form-control-label">Telephone</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-phone" name="telephone" value="<?php echo $setting->telephone; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">About Text</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="about_text" id="textarea-input" rows="9" class="form-control"><?php echo $setting->about_text; ?></textarea>
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary" name="update">Update</button>

                </form>
            </div>
        </div>
    
    </div>

</div>