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
              <label class="small mb-1" for="usertype">Select User Type</label>
              <select class="form-control" id="inputPassword" name="user_type" required >
              	<option value="admin">Admin</option>
              	<option value="guest">Guest</option>
              </select>
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- End of modal -->

<?php 
  $etab = ['FMA','FMA_CAM','FMDA', 'FPA', 'ISITS', 'FASIMH_IAR', 'FASIM_IP', 'FASHIM_IM', 'FASIMH_SIPOB', 'FASIMH_SIH', 'FASIMH_TC'];

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
        <p>Options:</p>
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




<div class="modal fade" id="Sig_<?php echo $etab[$i]?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title title">Print Signature PDF for <?php echo $etab[$i]?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p>Options:</p>
        <form method="POST" action="model/signature_pdf.php" target="_blank">
          <div class="form-group">
              <label class="small mb-1" for="salle">Enter Salle</label>
                <input class="form-control form-control-sm" id="salle" type="number" placeholder="Enter Salle" name="salle" required />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="module">Select Module</label>
              <select class="form-control form-control-sm" id="module" name="module" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($sig)){

                  foreach ($sig as $form) {?>
                    <option value="<?php echo $form['module']; ?>"><?php echo $form['module']; ?></option>
                <?php }
              }  
              ?>
              </select>
          </div>
          <div class="form-group">
              <label class="small mb-1" for="date_exam">Date Exam</label>
                <input class="form-control form-control-sm" id="date_exam" type="date" name="date_exam" required />
          </div>

          <div class="form-group">
              <label class="small mb-1" for="hrs_exam">Heure Examen</label>
                <input class="form-control form-control-sm" id="hrs_exam" type="text" name="hrs_exam" placeholder="Enter 1H30min" required />
          </div>

          <div class="form-group">
              <label class="small mb-1" for="exam_type">Select Exam Type</label>
              <select class="form-control form-control-sm" id="exam_type" name="exam_type" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($sig1)){

                  foreach ($sig1 as $form) {?>
                    <option value="<?php echo $form['exam_type'];?>"><?php echo $form['exam_type'];?></option>
                <?php } }  ?>
              </select>
          </div>
           <div class="form-group">
              <label class="small mb-1" for="semester">Select Semester</label>
              <select class="form-control form-control-sm" id="semester" name="semester" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($sig2)){

                  foreach ($sig2 as $form) {?>
                    <option value="<?php echo $form['semester'];?>"><?php echo $form['semester'];?></option>
                <?php } }  ?>
              </select>
          </div>

           <div class="form-group">
              <label class="small mb-1" for="session">Select Session</label>
              <select class="form-control form-control-sm" id="session" name="session" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($sig3)){

                  foreach ($sig3 as $form) {?>
                    <option value="<?php echo $form['session'];?>"><?php echo $form['session'];?></option>
                <?php } }  ?>
              </select>
          </div>

          <div class="form-group">
              <label class="small mb-1" for="uni">Select University</label>
              <select class="form-control form-control-sm" id="uni" name="uni" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($sig4)){

                  foreach ($sig4 as $form) {?>
                    <option value="<?php echo $form['university'];?>"><?php echo $form['university'];?></option>
                <?php } }  ?>
              </select>
          </div>

           <div class="form-group">
              <label class="small mb-1" for="year">Select Year</label>
              <select class="form-control form-control-sm" id="year" name="year" required >
                 <option disabled>Select...</option>
                <?php 
                if(!empty($sig5)){

                  foreach ($sig5 as $form) {?>
                    <option value="<?php echo $form['year'];?>"><?php echo $form['year'];?></option>
                <?php } }  ?>
              </select>
          </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="hidden" name="etab" value="<?php echo $etab[$i]?>">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="print_sig" >Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>

<?php } ?>