<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class="container">
        <div class="row">
            <div class="col-6 offset-md-3 ">
                <h1 class="mb-3">Register</h1>
                
                <?if(isset($success) && $success): ?>
                     <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success">
                                Registration completed successfully.<br>
                                <a href="">Home</a>
                            </div>
                        </div>
                     </div>   

                <?else: ?>
                <?=validation_errors()?>
                <?=form_open(base_url('usercreate/register'))?>
                <div class="form-group">
                    <input type="email" class="form-control"  required
                     name="email" value="<?=set_value('email')?>" placeholder="email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" 
                    name="first_name" value="<?=set_value('first_name')?>" placeholder="first_name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  
                    name="last_name" value="<?=set_value('last_name')?>" placeholder="last_name">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control"  required 
                    name="password" value="<?=set_value('password')?>" placeholder="password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control"  required
                     name="passconf" value="<?=set_value('passconf')?>" placeholder="password confirm" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  required
                     name="mobile" value="<?=set_value('mobile')?>" placeholder="Phone Number" >
                </div>
                <button type="submit" class="btn btn-success">Register</button>
                <?=form_close()?>
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-primary mt-4" href="<?=base_url('usercreate/login')?>">Back to Login</a>
                    </div>
                </div>

                <?endif;?>    
            </div>
        </div>
    </div>
    