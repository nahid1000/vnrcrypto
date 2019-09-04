<div class="row">
    
    <div class="col-md-12 text-center">
    
        <?php echo $session->message; ?>
    
    </div>
    
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <strong>Manage</strong> Social
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-facebook" class=" form-control-label">Facebook</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-facebook" name="facebook" value="<?php echo $setting->facebook; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-instagram" class=" form-control-label">Instagram</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-instagram" name="instagram" value="<?php echo $setting->instagram; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-twitter" class=" form-control-label">Twitter</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-twitter" name="twitter" value="<?php echo $setting->twitter; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="update">Update</button>

                </form>
            </div>
        </div>
    
    </div>

</div>