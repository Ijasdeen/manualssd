<script src="<?php echo base_url()?>assets/customerbase.js"></script>
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
									<th class="text text-center">Action</th>
								</tr>
							</thead>
							<tbody id="showoffCustomerbase">

							</tbody>
						</table>
					</div>
			</div> 
			 <div class="col-md-8"> 
			 <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text text-danger font-weight-bold">Save customer</h4>
                     <form class="forms-sample" id="frmsaveCustomer">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Customer name</label>
                        <input type="text" class="form-control" id="customerName" placeholder="Customer name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Customer Mobile number</label>
                        <input type="tel" class="form-control" id="customerMobileNumber" placeholder="mobile">
                      </div>
                      <div class="form-group">
                         <button class="btn btn-success btn-block form-control" type="submit">SAVE</button>
                      </div>
                        
                    </form>
                  </div>
                </div>
			 </div>

			 
		</div>

	</div>
 