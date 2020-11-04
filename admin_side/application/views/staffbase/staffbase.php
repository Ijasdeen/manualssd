<script src="<?php echo base_url()?>assets/staffbase.js"></script>
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row purchace-popup">
			<div class="col-12 stretch-card grid-margin">
				 
			</div>
			<div class="col-md-4 my-4">
			<input type="text" class="form-control" placeholder="Search...">
					<div class="table table-responsive">
						<table class="table table-dark">
							<thead>
								<tr>
									<th class="text text-center">#NO</th>
									<th class="text text-center">Name</th>
									<th class="text text-center">Mobile</th>
									<th class="text text-center">Responsibility</th>
									<th class="text text-center">Joint date</th>
									<th class="text text-center">Action</th>
								</tr>
							</thead>
							<tbody id="showoffStaff">

							</tbody>
						</table>
					</div>
			</div> 
			 <div class="col-md-8"> 
			 <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text text-danger font-weight-bold">Save Staff</h4>
                     <form class="forms-sample" id="frmstaff">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="staffName" placeholder="Staff Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="tel" class="form-control" id="staffmob" placeholder="Staff Mobile" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Responsiblity</label>
                        <input type="text" class="form-control" id="responsibility" placeholder="responsibility">
                      </div>
                      <div class="form-group">
                      	<label>Joint date</label>
                      	<input type="date" class="form-control" id="joint_date">
                      </div>
                      
                       <div class="form-group">
                         <button class="btn btn-success btn-block form-control" type="submit" id="up_save">SAVE</button>
                      </div>
                        
                    </form>
                  </div>
                </div>
			 </div>

			 
		</div>

	</div>
 