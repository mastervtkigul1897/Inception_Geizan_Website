<div class="modal fade show" id="ChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <form method="POST">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Old Password</label>
                        <input class="form-control" type="password" required="" name="oldpassword" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">New Password</label>
                        <input class="form-control" required="" type="password" name="newpassword" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Confirm New Password</label>
                        <input class="form-control" required="" type="password" name="confirmnewpassword" >
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="changepassword">Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="modal fade show" id="ChangeName" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <form method="POST">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Change Character Name</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <p><div class="alert alert-warning alert-dismissable col col-lg-12"><p class="block"><i class="fa fa-warning"></i>No Special Characters <br>
                    <i class="fa fa-warning"></i> Avoid using Admin | Administrator | ADMIN | ADMINISTRATOR | GAMEMASTER | GameMaster<br>
                    <i class="fa fa-warning"></i>Similar to the name of the Admins. <br>
                    <i class="fa fa-warning"></i>If you get caught, your character name will change randomly.</p></div></p>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Select Character:</label>
                        <select class="form-control" name="oldcharname">
                            <?php 
                                if($found){
                                echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
                                }
                                else{
                                    $getchars = sqlsrv_query($connection, $getmychars);
                                } 
                                while($rows = sqlsrv_fetch_array($getchars)){
                            ?>
                            <option value="<?php echo $rows['id'] ;?>"><?php echo $rows['name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">New Character Name</label>
                        <input class="form-control" required="" type="text" maxlength="20" name="newcharname" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="changename"><i class="fa fa-rub"></i> RPS (2,000.00)</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade show" id="ChangeGender" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <form method="POST">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Change Character Gender</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Select Character:</label>
                        <select class="form-control" name="char_id">
                            <?php 
                                if($found){
                                echo '<div class="alert alert-danger alert-dismissable col col-lg-12"><p class="block">SQL Injection Detected!</p></div>';
                                }
                                else{
                                    $getchars = sqlsrv_query($connection, $getmychars);
                                } 
                                while($rows = sqlsrv_fetch_array($getchars)){
                            ?>
                            <option value="<?php echo $rows['id'] ;?>"><?php echo $rows['name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="changegender"><i class="fa fa-rub"></i> RPS (2,500.00)</button>
                </div>
            </div>
        </div>
    </form>
</div>