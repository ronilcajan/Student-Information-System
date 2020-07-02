<!-- Change Password Modal -->
<div class="modal fade" id="change_password" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Change Password?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="model/change_password.php">
          <div class="form-group">
              <label class="small mb-1" for="Username">Username</label>
                <input class="form-control py-4" id="Username" type="text" placeholder="Enter username" name="username" readonly value="<?php echo $_SESSION['username'];?>" />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="inputPassword">Enter New Password</label>
              <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="new_pass" required />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="inputPassword1">Confirm Password</label>
              <input class="form-control py-4" id="inputPassword1" type="password" placeholder="Enter password" name="conf_pass" required />
          </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="changepass">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- End of modal -->

<!-- Add user Modal -->
<div class="modal fade" id="new_user" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Add New User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="model/add_new_user.php">
          <div class="form-group">
              <label class="small mb-1" for="Username">Username</label>
                <input class="form-control py-4" id="Username" type="text" placeholder="Enter username" name="username" required />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="inputPassword">Enter New Password</label>
              <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="new_pass" required />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="inputPassword">Enter New Password</label>
              <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="new_pass" required />
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_user">Print</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- End of modal -->

<?php 
  $etab = ['FMA','FMA_CAM','FMDA', 'FPA', 'ISITS', 'FASIMH_IAR', 'FASIM_IP', 'FASHIM_IM', 'FASIMH_SIPOB', 'FASIMH_SIH', 'FASHIMH_TC'];

  for($i=0;$i<count($etab);$i++) {

?>
<!-- Prin Affichage FMA Modal -->
<div class="modal fade" id="<?php echo $etab[$i];?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title title">Print Affichage PDF for <?php echo $etab[$i]?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="model/affichage_pdf.php" target="_
        blank">
          <div class="form-group">
              <label class="small mb-1" for="salle">Enter Salle</label>
                <input class="form-control py-4" id="salle" type="number" placeholder="Enter Salle" name="salle" required />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="usertype">Select Formation</label>
              <select class="form-control" id="usertype" name="form" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($data)){

                  foreach ($data as $form) {?>
                    <option value="<?php echo $form['formation']; ?>"><?php echo $form['formation']; ?></option>
                <?php }
              }  
              ?>
              </select>
          </div>

          <div class="form-group">
              <label class="small mb-1" for="usertype">Select Promotion</label>
              <select class="form-control" id="usertype" name="promo" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($data1)){

                  foreach ($data1 as $promo) {?>
                    <option value="<?php echo $promo['promotion'];?>"><?php echo $promo['promotion'];?></option>
                <?php } }  ?>
              </select>
          </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="hidden" name="etab" value="<?php echo $etab[$i]?>">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="print_aff" >Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- End of modal -->
<?php } ?>

<!-- Prin Affichage FMA_CAM Modal -->
<!-- <div class="modal fade" id="FMA_CAM" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content"> -->

      <!-- Modal Header -->
<!--       <div class="modal-header">
        <h5 class="modal-title title">Print Affichage PDF for FMA_CAM</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> -->

      <!-- Modal body -->
  <!--     <div class="modal-body">
        <form method="POST" action="model/affichage_pdf.php">
          <div class="form-group">
              <label class="small mb-1" for="salle">Enter Salle</label>
                <input class="form-control py-4" id="salle" type="number" placeholder="Enter Salle" name="salle" required />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="usertype">Select Formation</label>
              <select class="form-control" id="usertype" name="form" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($data)){

                  foreach ($data as $form) {?>
                    <option value="<?php echo $form['formation']; ?>"><?php echo $form['formation']; ?></option>
                <?php }
              }  
              ?>
              </select>
          </div>

          <div class="form-group">
              <label class="small mb-1" for="usertype">Select Promotion</label>
              <select class="form-control" id="usertype" name="promo" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($data1)){

                  foreach ($data1 as $promo) {?>
                    <option value="<?php echo $promo['promotion'];?>"><?php echo $promo['promotion'];?></option>
                <?php } }  ?>
              </select>
          </div>

      </div> -->

      <!-- Modal footer -->
<!--       <div class="modal-footer">
        <input type="hidden" name="etab" value="FMA_CAM">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="print_aff">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div> -->
<!-- End of modal -->
