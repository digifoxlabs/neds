<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Customer: <?= $customerDetails['customer_id'] ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">New Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <?php
    $session = session(); ?>
    
    <script type="text/javascript">
        <?php if($session->getFlashdata('success')): ?>
        toastr.success('<?php echo $session->getFlashdata('success'); ?>')
        <?php elseif($session->getFlashdata('error')): ?>
        toastr.warning('<?php echo $session->getFlashdata('error'); ?>');
        <?php endif; ?>
      </script>  


    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

        <form action="<?= base_url('admin/customers/update/'.$customerDetails['c_id']); ?>" method="post">


            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Personal Details</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>
               

                    <div class="row">
                        <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?= $customerDetails['name'] ?>">
                        </div>
                        </div>

                        <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Father's Name</label>
                            <input type="text" class="form-control" name="father_name" placeholder="Full Name" value="<?= $customerDetails['father_name'] ?>">
                        </div>
                        </div>

                        <div class="col-sm-3">

                            <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                            <option value="" selected>Select</option>
                            <option value="male" <?= $customerDetails['gender']=='male'?'selected':'' ?> >MALE</option>
                            <option value="female" <?= $customerDetails['gender']=='female'?'selected':'' ?>>FEMALE</option>
                            <option value="others" <?= $customerDetails['gender']=='others'?'selected':'' ?>>OTHERS</option>
                            
                            </select>
                            </div>

                        </div>
 

                    </div>

                    <div class="row">

                    <div class="col-sm-3">

                        <div class="form-group">
                            <label>Community</label>
                                <select class="form-control" name="category">
                                <option value="" selected>Select</option>
                                <option value="ur" <?= $customerDetails['community']=='ur'?'selected':'' ?> >UR</option>
                                <option value="sc" <?= $customerDetails['community']=='sc'?'selected':'' ?>>SC</option>
                                <option value="st" <?= $customerDetails['community']=='st'?'selected':'' ?>>ST</option>
                                <option value="obc" <?= $customerDetails['community']=='obc'?'selected':'' ?>>OBC</option>
                                <option value="others" <?= $customerDetails['community']=='others'?'selected':'' ?>>OTHERS</option>
                                
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">

                            <div class="form-group">
                            <label>Maritial Status</label>
                                <select class="form-control" name="maritial">
                                <option value="" selected>Select</option>
                                <option value="single" <?= $customerDetails['maritial_status']=='single'?'selected':'' ?> >SINGLE</option>
                                <option value="married" <?= $customerDetails['maritial_status']=='married'?'selected':'' ?> >MARRIED</option>
                                <option value="divorced" <?= $customerDetails['maritial_status']=='divorced'?'selected':'' ?> >DIVORCED</option>
                                <option value="wdowed" <?= $customerDetails['maritial_status']=='wdowed'?'selected':'' ?> >WIDOWED</option>
                                                         
                                </select>
                            </div>


                        </div>


                        <div class="col-sm-3">
                    
                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="dob" value="<?= $customerDetails['dob'] ?>">
                                </div>
                                <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Date of Joining Service:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="doj" value="<?= $customerDetails['doj_service'] ?>">
                                </div>
                                <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                        </div>      


                    </div>
                    

                <div class="row">

                    <div class="col-3">
                            <div class="form-group">
                                <label>Disability:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="isdisable" value="yes" <?php echo ($customerDetails['is_disable']=='yes')?'checked':'' ?> >
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="isdisable" value="no" <?php echo ($customerDetails['is_disable']=='no')?'checked':'' ?>>
                                    <label class="form-check-label">No</label>
                                </div>                  
                            </div>
                        </div>
                    
                    <div class="col-3 disability-option">

                        <div class="form-group">
                        <label>Select Disability</label>
                            <select class="form-control" name="disability" id="disability" >
                            <option value="" selected>Select</option>
                            <option value="orthopedic" <?= $customerDetails['disability']=='orthopedic'?'selected':'' ?>  >ORTHOPEDIC</option>
                            <option value="hearing" <?= $customerDetails['disability']=='hearing'?'selected':'' ?> >HEARING</option>
                            <option value="visual" <?= $customerDetails['disability']=='visual'?'selected':'' ?> >VISUAL</option>
                            <option value="mental" <?= $customerDetails['disability']=='mental'?'selected':'' ?> >MENTAL</option>
                            <option value="others" <?= $customerDetails['disability']=='others'?'selected':'' ?> >OTHERS</option>                                    
                            </select>
                        </div>
                    </div>

                    <div class="col-3 disability-option">

                        <div class="form-group">
                            <label>Disability Percentage</label>
                            <input type="number" min="0" max="100" class="form-control" name="disabilitypcn" id="disabilitypcn" value="<?= $customerDetails['disability_pcn'] ?>" placeholder="% of disability">
                        </div>
                    </div>
                </div>   

               
                <hr> 

                <h3>RESIDENTIAL ADDRESS</h3>

                <div class="row">

                    <div class="col-sm-2">
                        <!-- text input -->
                        <div class="form-group">
                            <label>House No</label>
                            <input type="text" class="form-control" name="res_hno" placeholder="Hno" value="<?= $customerDetails['res_hno'] ?>"  >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Street Name</label>
                        <input type="text" class="form-control" name="res_street" placeholder="Street" value="<?= $customerDetails['res_street'] ?>"  >
                        </div>

                    </div>
                    <div class="col-sm-3">

                        <!-- text input -->
                        <div class="form-group">
                        <label>District</label>
                        <input type="text" class="form-control" name="res_district" placeholder="District" value="<?= $customerDetails['res_district'] ?>"    >
                        </div>


                    </div>
                    <div class="col-sm-3">

                          <!-- text input -->
                          <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="res_city" placeholder="City" value="<?= $customerDetails['res_city'] ?>" >
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" min=0 class="form-control" name="res_contact" placeholder="Conact No" value="<?= $customerDetails['res_contact'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" min=0 class="form-control" name="res_email" placeholder="Email ID" value="<?= $customerDetails['res_email'] ?>"  >
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        
                             <label>Mandal/Municipalty:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="res_adminunit" value="mandal" <?php echo ($customerDetails['res_adminunit']=='mandal')?'checked':'' ?>  >
                                    <label class="form-check-label">Mandal</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="res_adminunit" value="municipalty" <?php echo ($customerDetails['res_adminunit']=='municipalty')?'checked':'' ?>  >
                                    <label class="form-check-label">Municipalty</label>
                                </div>  
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Name of Mandal/Municipalty</label>
                        <input type="text" class="form-control" name="res_unit_name" placeholder="Name of Mandal/Municipalty" value="<?= $customerDetails['res_unit_name'] ?>">
                        </div>
                    </div>
                </div>

                <hr> 

                <h3>OFFICIAL ADDRESS</h3>

                <div class="row">

                    <div class="col-sm-2">
                        <!-- text input -->
                        <div class="form-group">
                            <label>House No</label>
                            <input type="text" class="form-control" name="ofc_hno" placeholder="Hno" value="<?= $customerDetails['ofc_hno'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Street Name</label>
                        <input type="text" class="form-control" name="ofc_street" placeholder="Street" value="<?= $customerDetails['ofc_street'] ?>">
                        </div>

                    </div>
                    <div class="col-sm-3">

                        <!-- text input -->
                        <div class="form-group">
                        <label>District</label>
                        <input type="text" class="form-control" name="ofc_district" placeholder="District" value="<?= $customerDetails['ofc_district'] ?>">
                        </div>


                    </div>
                    <div class="col-sm-3">

                        <!-- text input -->
                        <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="ofc_city" placeholder="City" value="<?= $customerDetails['ofc_city'] ?>">
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" min=0 class="form-control" name="ofc_contact" placeholder="Conact No" value="<?= $customerDetails['ofc_contact'] ?>" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" min=0 class="form-control" name="ofc_email" placeholder="Email ID" value="<?= $customerDetails['ofc_email'] ?>">
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        
                            <label>Mandal/Municipalty:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ofc_adminunit" value="mandal" <?php echo ($customerDetails['ofc_adminunit']=='mandal')?'checked':'' ?>  >
                                    <label class="form-check-label">Mandal</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ofc_adminunit" value="municipalty" <?php echo ($customerDetails['ofc_adminunit']=='municipalty')?'checked':'' ?>>
                                    <label class="form-check-label">Municipalty</label>
                                </div>  
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Name of Mandal/Municipalty</label>
                        <input type="text" class="form-control" name="ofc_unit_name" placeholder="Name of Mandal/Municipalty" value="<?= $customerDetails['ofc_unit_name'] ?>">
                        </div>
                    </div>
                </div>  
                
                

                <hr> 

                <h3>IDENTIFICATION DETAILS</h3>
                <div class="row">

                    <div class="col-sm-3">
                    <div class="form-group">
                        <label>Ration Card No</label>
                        <input type="text" min=0 class="form-control" name="ration_card" placeholder="Ration Card No" value="<?= $customerDetails['ration_card'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                        <label>Identification 1</label>
                        <input type="text" min=0 class="form-control" name="iden_1" placeholder="Identification No 1" value="<?= $customerDetails['iden_1'] ?>">
                        </div>                  
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                        <label>Identification 2</label>
                        <input type="text" min=0 class="form-control" name="iden_2" placeholder="Identification No 2" value="<?= $customerDetails['iden_2'] ?>">
                        </div>
                   
                    </div>

                </div>

                <hr> 

                <h3>STATUS</h3>

                <div class="row">
                        <div class="col-md-4">

                        <div class="form-group">
            
                            <select class="form-control" name="status">
                            <option value="" selected>Select</option>
                            <option value="1" <?= $customerDetails['status']=='1'?'selected':'' ?> >ACTIVE</option>
                            <option value="2" <?= $customerDetails['status']=='2'?'selected':'' ?>>DISABLE</option>
                            
                            </select>
                            </div>

                        </div>

                </div>
                
                   
                </div>
                <!-- /.card-body -->        
                
                <div class="card-footer">
                  
                   <a href="<?= base_url('admin/customers/view/'.$customerDetails['c_id']) ?>" class="btn btn-outline-info btn-s"><i class="fas fa-long-arrow-alt-left mr-1"></i>Back</a>
                  <button type="submit" class="btn btn-info float-right">SAVE</button>
                </div>

            </div>
            <!-- /.card --> 






        </form>      

        </div>
        <!-- /.container-fluid -->











      

    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->


  <script>
$(document).ready(function() {

    $("#customerTree").addClass('menu-open');
    $("#customerMenu").addClass('active');
    $("#customerSubMenuManage").addClass('active');

    //$(".disability-option").hide();
    $('input[name="isdisable"]').change(function(e) { // Select the radio input group

        // This returns the value of the checked radio button
        // which triggered the event.
        console.log( $(this).val() ); 

        if($(this).val()== 'yes'){
             $(".disability-option").show();
        }else{
            $(".disability-option").hide();
            $("#disability").val('');
            $("#disabilitypcn").val('');
        }      


    });




   


});
</script>