<div class="row">
    
    <div class="col-md-12 text-center">
    
        <?php echo $session->message; ?>
    
    </div>
    
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <strong>Manage</strong> Logo
            </div>
            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-image" class=" form-control-label">Logo</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" name="logo">
                        </div>
                    </div> 
                    
                    <img src="../assets/img/<?php echo $setting->logo; ?>" width="100">
                    
                    <button type="submit" class="btn btn-primary" name="update">Update</button>

                </form>
            </div>
        </div>
    
    </div>

</div>