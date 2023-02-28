<?php include "../../include/server.php"; ?>
<!-- Edit -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="edit_<?php echo $row['id']; ?>" >
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Artisan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">

			<form method="POST" action="edit_delete_art_modal.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-12">
						<label class="control-label modal-label">Name:</label>
					</div>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
					</div>
				</div>


				<div class="row form-group">
					<div class="col-sm-12">
						<label class="control-label modal-label">GSM:</label>
					</div>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="gsm" value="<?php echo $row['gsm']; ?>" required>
					</div>
				</div>


				<div class="row form-group">
					<div class="col-sm-12">
						<label class="control-label modal-label">Address:</label>
					</div>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required>
					</div>
				</div>


				<div class="row form-group">
					<div class="col-sm-12">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
					</div>
				</div>




				
			
			
			 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #000;border: none;"><span class="bi bi-x-circle"></span> Close</button>
               		 <button name="edit_art" class="btn btn-success" style="background-color: #00c514;border: none;"><span class="bi bi-arrow-right"></span> Submit</button>
</div>
       </form>
		</div>


            </div> 
			</div>

</div>
<!-- Delete -->

<!-- Edit -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="delete_<?php echo $row['id']; ?>" >
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Artisan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
            	<center><h5>Are you sure you want to delete <br><span style="font-family: Bold;"><?php echo $row['name']; ?></span>?</h5></center>
			<form method="POST" action="edit_delete_art_modal.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
			
			 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #000;border: none;"><span class="bi bi-x-circle"></span> Close</button>
               		 <button name="del_ctg" class="btn btn-success" style="background-color: #00c514;border: none;"><span class="bi bi-arrow-right"></span> Proceed</button>
</div>
       </form>
		</div>


            </div> 
			</div>


<!-- Delete -->
