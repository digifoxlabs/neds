<?= $this->extend("admin/template/print") ?>

<?= $this->section("page-title") ?>
    <?= $pageTitle; ?>
<?= $this->endSection() ?>

<?= $this->section("content") ?>


<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> NE DIGITAL HEALTH CARD
          <small class="float-right">Date: <?= $customerDetails['created_at'] ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">

	<div class="col-sm-8 invoice-col">

			<!-- ROW 1 -->
			<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
						<strong> CUSTOMER ID</strong>
						<p class="text-muted">
						<?= strtoupper($customerDetails['customer_id']); ?>
						</p>
				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">
						<strong> Customer Name</strong>
						<p class="text-muted">
						<?= strtoupper($customerDetails['name']); ?>
						</p>

				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">

						<form method="post"> 
						<input type="hidden" name="row_id" id="row_id" value="<?= $customerDetails['c_id']; ?>">
						<div class="text-center">
						<div class="image_area">
						<label for="upload_image">
						<?php echo empty($customerDetails['image'])? '<img width= "100"  src="'.base_url('public/Assets/img/default_img.jpg').'" alt="image" id="uploaded_image" class="img-circle" />' : '<img width= "100"  src="'.base_url('assets/img/customers').'/'.$customerDetails['image'].'" alt="image" id="uploaded_image" class="img-circle" /> ' ?>
						<div class="overlay">
						</div>
						<input type="file" name="image" class="image" id="upload_image" style="display:none" />
						</label>
						</div>
						</div>
						</form>
			
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<hr>


			<!-- ROW 2 -->
			<div class="row invoice-info">

					<div class="col-sm-4 invoice-col">
							<strong> Father's Name</strong>
							<p class="text-muted">
							<?= strtoupper($customerDetails['father_name']); ?>
							</p> 
					</div>
					<div class="col-sm-4 invoice-col">
						<strong> Gender</strong>
						<p class="text-muted">
						<?= strtoupper($customerDetails['gender']); ?>
						</p>
					</div>
					<!-- /.col -->

					<!-- /.col -->
					<div class="col-sm-4 invoice-col">

						<strong> DOB</strong>
						<p class="text-muted">
						<?= $customerDetails['dob'] ?>
						</p>
				
					</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<hr>


			<!-- ROW 3 -->
			<div class="row invoice-info">

					<div class="col-sm-4 invoice-col">
						<strong> Maritial Status</strong>
						<p class="text-muted">
						<?= strtoupper($customerDetails['maritial_status']); ?>
						</p>

					</div>

					<div class="col-sm-4 invoice-col">
						<strong> Category</strong>
						<p class="text-muted">
						<?= strtoupper($customerDetails['community']); ?>
						</p>

					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
					<strong> DOJ Service</strong>
                                <p class="text-muted">
                                <?= $customerDetails['doj_service'] ?>
                                </p>
					</div>
					<!-- /.col -->
					
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<hr>


			<!-- row 4 -->
			<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
	
						<strong> Whether disable ? (Y/N)</strong>
						<p class="text-muted">
						<?= strtoupper($customerDetails['is_disable']); ?>
						</p>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
	
						<strong> Disability</strong>
						<p class="text-muted">
						<?= strtoupper($customerDetails['disability']); ?>
						</p>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">

						<strong> Disability percentage</strong>
						<p class="text-muted">
						<?= strtoupper($customerDetails['disability_pcn']); ?>
						</p>

					</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<hr>

			<!-- ROW 5 -->
			<div class="row invoice-info">
					<div class="col-sm-8 invoice-col">

					<h4>RESIDENTIAL ADDRESS</h4>

						<ul class="ml-4 mb-0 fa-ul text-muted">
						<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Hno: <?= $customerDetails['res_hno'] ?>, Street: <?= $customerDetails['res_street'] ?>, District: <?= $customerDetails['res_district'] ?>, City: <?= $customerDetails['res_city'] ?>, <?= $customerDetails['res_adminunit'] ?>: <?= $customerDetails['res_unit_name'] ?> </li>
						<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $customerDetails['res_contact'] ?></li>
						<li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email #: <?= $customerDetails['res_email'] ?></li>
						</ul>

					</div>
			</div>
			<hr>

			<!-- Row 6 -->
			<div class="row invoice-info">
					<div class="col-sm-8 invoice-col">
                    <h4>OFFICIAL ADDRESS</h4>

                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Hno: <?= $customerDetails['ofc_hno'] ?>, Street: <?= $customerDetails['ofc_street'] ?>, District: <?= $customerDetails['ofc_district'] ?>, City: <?= $customerDetails['ofc_city'] ?>, <?= $customerDetails['ofc_adminunit'] ?>: <?= $customerDetails['ofc_unit_name'] ?> </li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $customerDetails['ofc_contact'] ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email #: <?= $customerDetails['ofc_email'] ?></li>
                      </ul>

					</div>
			</div>
			<hr>

			Row 7
			<div class="row invoice-info">
					<div class="col-sm-8 invoice-col">
					<h4>IDENTIFICATION</h4>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><strong>Ration Card No:</strong> <?= $customerDetails['ration_card']; ?></li>
                        <li class="small"><strong>Identification No. 1:</strong> <?= $customerDetails['iden_1']; ?></li>
                        <li class="small"><strong>Identification No. 2:</strong> <?= $customerDetails['iden_2']; ?></li>
                      </ul>

					</div>
			</div>
		

	</div>


	<!-- SECOND COLUMN -->
	<div class="col-sm-4 invoice-col">

		<div class="row invoice-info">

			<h4 class="mb-2" >MEMBERS:</h4> 

				<?php  foreach($familyDetails as $family){ ?>

				<div class="col-12">
				<div class="card bg-light">
				<div class="card-header text-muted border-bottom-0">
						<?= $family['relationship']; ?>
				</div>
				<div class="card-body pt-0">
				<div class="row">
						<div class="col-9">
							<h2 class="lead"><b><?= strtoupper($family['member_name']); ?></b></h2>
							<p class="text-muted text-sm mb-0"><b>Gender: </b> <?= $family['gender']; ?> </p>
							<p class="text-muted text-sm mb-0"><b>DOB: </b> <?= $family['dob']; ?> </p>
							<p class="text-muted text-sm mb-0"><b>AADHAR: </b> <?= $family['aadhar']; ?> </p>
							<p class="text-muted text-sm"><b>DISBILITY: </b> <?= $family['is_disable']; ?> </p>
							<ul class="ml-4 mb-0 fa-ul text-muted">
								<li class="small"><span>Disability  :</span> <?= $family['disability']; ?> </li>
								<li class="small"><span>Disability %  :</span> <?= $family['disabilitypcn']; ?> </li>
							</ul>
						</div>
						<div class="col-3 text-center">
						<!-- <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid"> -->
						</div>
					</div>
				</div>
				</div>
				</div>


				<?php    } ?>     

			</div>
			
		</div>


	</div>


	<hr>

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
	  <p class="lead">Authorised Signature:</p>
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">   
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


	
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->








<?= $this->endSection() ?>