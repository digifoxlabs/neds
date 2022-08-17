<style>
    .image_area {
        position: relative;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 140px;
        height: 140px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 1000px !important;
    }

    .overlay {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }

    .image_area:hover .overlay {
        height: 50%;
        cursor: pointer;
    }

    .text {
        color: #333;
        font-size: 12px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personal Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">



    <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">

                    <div class="row">

                        <div class="col-md-4 col-sm-6">
                            <strong> CUSTOMER ID</strong>
                            <p class="text-muted">
                            <?= strtoupper($customerDetails['customer_id']); ?>
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <strong> Customer Name</strong>
                            <p class="text-muted">
                            <?= strtoupper($customerDetails['name']); ?>
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-6">

                            <form method="post"> 
                            <input type="hidden" name="row_id" id="row_id" value="<?= $customerDetails['c_id']; ?>">
                            <div class="text-center">
                                <div class="image_area">
                                    <label for="upload_image">
                                        <?php echo empty($customerDetails['image'])? '<img width= "100"  src="'.base_url('public/assets/img/default_img.jpg').'" alt="image" id="uploaded_image" class="img-circle" />' : '<img width= "100"  src="'.base_url('assets/img/customers').'/'.$customerDetails['image'].'" alt="image" id="uploaded_image" class="img-circle" /> ' ?>
                                        <div class="overlay">
                                            <div class="text">Click to Change Profile Image</div>
                                        </div>
                                        <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                                    </label>
                                </div>
                            </div>
                        </form>

                        </div>

                    </div>
                    <hr>

                    <div class="row">
                            <div class="col-sm-4"> 
                            <strong> Father's Name</strong>
                                <p class="text-muted">
                                <?= strtoupper($customerDetails['father_name']); ?>
                                </p>                            
                            </div>
                            <div class="col-sm-4">
                                <strong> Gender</strong>
                                <p class="text-muted">
                                <?= strtoupper($customerDetails['gender']); ?>
                                </p>
                            </div>
               
                            <div class="col-sm-4">
                                 <strong> DOB</strong>
                                <p class="text-muted">
                                <?= $customerDetails['dob'] ?>
                                </p>

                            </div>

                    </div>

                    <hr>
                    <div class="row">
                     
                            <div class="col-sm-4">
                                 <strong> Maritial Status</strong>
                                <p class="text-muted">
                                <?= strtoupper($customerDetails['maritial_status']); ?>
                                </p>

                            </div>
                            <div class="col-sm-4">
                                 <strong> Category</strong>
                                <p class="text-muted">
                                <?= strtoupper($customerDetails['community']); ?>
                                </p>

                            </div>
                            <div class="col-sm-4">
                                <strong> DOJ Service</strong>
                                <p class="text-muted">
                                <?= $customerDetails['doj_service'] ?>
                                </p>
                            </div>
                            
                    </div>

                    <hr>
                    <div class="row">
                            <div class="col-sm-4">
                                <strong> Whether disable ? (Y/N)</strong>
                                <p class="text-muted">
                                <?= strtoupper($customerDetails['is_disable']); ?>
                                </p>
                            </div>
                            <div class="col-sm-4">
                                 <strong> Disability</strong>
                                <p class="text-muted">
                                <?= strtoupper($customerDetails['disability']); ?>
                                </p>

                            </div>
                            <div class="col-sm-4"> 
                            <strong> Disability percentage</strong>
                                <p class="text-muted">
                                <?= strtoupper($customerDetails['disability_pcn']); ?>
                                </p>
                            </div>
                    </div>

                    <hr>
                    <h4>RESIDENTIAL ADDRESS</h4>

                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Hno: <?= $customerDetails['res_hno'] ?>, Street: <?= $customerDetails['res_street'] ?>, District: <?= $customerDetails['res_district'] ?>, City: <?= $customerDetails['res_city'] ?>, <?= $customerDetails['res_adminunit'] ?>: <?= $customerDetails['res_unit_name'] ?> </li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $customerDetails['res_contact'] ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email #: <?= $customerDetails['res_email'] ?></li>
                      </ul>

                    <hr>
                    <h4>OFFICIAL ADDRESS</h4>

                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Hno: <?= $customerDetails['ofc_hno'] ?>, Street: <?= $customerDetails['ofc_street'] ?>, District: <?= $customerDetails['ofc_district'] ?>, City: <?= $customerDetails['ofc_city'] ?>, <?= $customerDetails['ofc_adminunit'] ?>: <?= $customerDetails['ofc_unit_name'] ?> </li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $customerDetails['ofc_contact'] ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email #: <?= $customerDetails['ofc_email'] ?></li>
                      </ul>



                    <hr>
                    <h4>IDENTIFICATION</h4>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><strong>Ration Card No:</strong> <?= $customerDetails['ration_card']; ?></li>
                        <li class="small"><strong>Identification No. 1:</strong> <?= $customerDetails['iden_1']; ?></li>
                        <li class="small"><strong>Identification No. 2:</strong> <?= $customerDetails['iden_2']; ?></li>
                      </ul>


                    </div>
                    <!-- /.card-body -->

                  <div class="card-footer">
                    
                        <div class="text-right">
                        <button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-delete" data-todo='{"id":"<?php echo $customerDetails['c_id']; ?>","name":"<?php echo $customerDetails['name']; ?>"}' data-toggle="tooltip" data-placement="top" title="Delete"   ><i class="fa fa-trash"></i></button>   

                            <a href="<?= base_url('admin/customers/update/'.$customerDetails['c_id']) ?>"  class="btn btn-sm btn-primary"><i class="fa fa-edit"> EDIT</i> </a>
                        </div>
                  </div>
                </div>
                <!-- /.card -->
            </div>


            <!-- Right Column -->
           <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">                   

                     <h4 class="mb-2">MEMBERS:</h4> 

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
         

                            <div class="card-footer">
                                <div class="text-left">                  
                                <a href="<?= base_url('admin/customers/members/'.$customerDetails['c_id']) ?>">Manage</a>
                                </div>
                            </div>

                </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

           </div>

        </div>
    </div>




        <!--Delete Modal-->        
        <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content bg-light">
            <div class="modal-header">
              <h4 class="modal-title">Delete Entry</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">                
                <p>Are You sure to <strong>Delete</strong> the customer <strong><span id = "delName"></span></strong>   ?</p>                            
                <form action="<?php echo base_url('admin/customers/delete') ?>" method="post">                    
                <input type="hidden" name="row_id" id="del_id">  
                                        
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-outline-success">Confirm</button>
                </div>
                    
              </form>               
                                
            </div>
        
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal end -->   


      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>
$(document).ready(function() {

  $("#customerTree").addClass('menu-open');
    $("#customerMenu").addClass('active');
    $("#customerSubMenuManage").addClass('active');

    $('#modal-delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var todo_id = button.data('todo').id  
      var todo_name = button.data('todo').name  
  
      var modal = $(this)  
      modal.find('.modal-body #del_id').val(todo_id)
      modal.find('.modal-body #delName').text(todo_name)  

    });  



    var $modal = $('#cropImagePop');
    var image = document.getElementById('sample_image');    
    var row = $("#row_id").val();

    var cropper;
    $('#upload_image').change(function(event) {
        var files = event.target.files;

        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function(event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });
    
    
    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });
    
    
    $('#crop').click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400
        });
        
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {            
              var base64data = reader.result;       
              
              var formdata = {
                   row_id: row,
                   image: reader.result
              };

                $.ajax({
                    url: '<?= base_url('admin/customers/customerimage') ?>',
                    method: "post", 
                    data: formdata,
                    success: function(data) {                 

                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data);
                        toastr.success('Profile Image Updated');
                        location.reload();

                    }
                });
            };
        }); 
    
        
    }); 



});
</script>