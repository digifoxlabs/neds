<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Customer</h1>
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

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

        <form action="<?= base_url('admin/customers/new'); ?>" method="post">


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
                            <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
                        </div>
                        </div>

                        <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Father's Name</label>
                            <input type="text" class="form-control" name="father_name" placeholder="Full Name" value="<?= set_value('father_name') ?>">
                        </div>
                        </div>

                        <div class="col-sm-3">

                            <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                            <option value="" selected>Select</option>
                            <option value="male" <?= set_value('gender')=='male'?'selected':'' ?> >MALE</option>
                            <option value="female" <?= set_value('gender')=='male'?'selected':'' ?>>FEMALE</option>
                            <option value="others" <?= set_value('gender')=='others'?'selected':'' ?>>OTHERS</option>
                            
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
                                <option value="ur" <?= set_value('category')=='ur'?'selected':'' ?> >UR</option>
                                <option value="sc" <?= set_value('category')=='sc'?'selected':'' ?>>SC</option>
                                <option value="st" <?= set_value('category')=='st'?'selected':'' ?>>ST</option>
                                <option value="obc" <?= set_value('category')=='obc'?'selected':'' ?>>OBC</option>
                                <option value="others" <?= set_value('category')=='others'?'selected':'' ?>>OTHERS</option>
                                
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">

                            <div class="form-group">
                            <label>Maritial Status</label>
                                <select class="form-control" name="maritial">
                                <option value="" selected>Select</option>
                                <option value="single" <?= set_value('maritial')=='single'?'selected':'' ?> >SINGLE</option>
                                <option value="married" <?= set_value('maritial')=='married'?'selected':'' ?> >MARRIED</option>
                                <option value="divorced" <?= set_value('maritial')=='divorced'?'selected':'' ?> >DIVORCED</option>
                                <option value="wdowed" <?= set_value('maritial')=='wdowed'?'selected':'' ?> >WIDOWED</option>
                                                         
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
                                    <input type="date" class="form-control" name="dob" value="<?= set_value('dob') ?>">
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
                                    <input type="date" class="form-control" name="doj" value="<?= set_value('doj') ?>">
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
                                    <input class="form-check-input" type="radio" name="isdisable" value="yes" <?= set_radio('isdisable','yes') ?>>
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="isdisable" value="no" <?= set_radio('isdisable','no', true) ?>>
                                    <label class="form-check-label">No</label>
                                </div>                  
                            </div>
                        </div>
                    
                    <div class="col-3 disability-option">

                        <div class="form-group">
                        <label>Select Disability</label>
                            <select class="form-control" name="disability" id="disability">
                            <option value="" selected>Select</option>
                            <option value="orthopedic">ORTHOPEDIC</option>
                            <option value="hearing">HEARING</option>
                            <option value="visual">VISUAL</option>
                            <option value="mental">MENTAL</option>
                            <option value="others">OTHERS</option>                                    
                            </select>
                        </div>
                    </div>

                    <div class="col-3 disability-option">

                        <div class="form-group">
                            <label>Disability Percentage</label>
                            <input type="number" min="0" max="100" class="form-control" name="disabilitypcn" id="disabilitypcn" placeholder="% of disability">
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
                            <input type="text" class="form-control" name="res_hno" placeholder="Hno" value="<?= set_value('res_hno') ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Street Name</label>
                        <input type="text" class="form-control" name="res_street" placeholder="Street" value="<?= set_value('res_street') ?>">
                        </div>

                    </div>
                    <div class="col-sm-3">

                        <!-- text input -->
                        <div class="form-group">
                        <label>District</label>
                        <input type="text" class="form-control" name="res_district" placeholder="District" value="<?= set_value('res_district') ?>">
                        </div>


                    </div>
                    <div class="col-sm-3">

                          <!-- text input -->
                          <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="res_city" placeholder="City" value="<?= set_value('res_city') ?>">
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" min=0 class="form-control" name="res_contact" placeholder="Conact No" value="<?= set_value('res_contact') ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" min=0 class="form-control" name="res_email" placeholder="Email ID" value="<?= set_value('res_email') ?>">
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        
                             <label>Mandal/Municipalty:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="res_adminunit" value="mandal" <?= set_radio('res_adminunit','mandal') ?>>
                                    <label class="form-check-label">Mandal</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="res_adminunit" value="municipalty" <?= set_radio('res_adminunit','municipalty', true) ?>>
                                    <label class="form-check-label">Municipalty</label>
                                </div>  
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Name of Mandal/Municipalty</label>
                        <input type="text" class="form-control" name="res_unit_name" placeholder="Name of Mandal/Municipalty" value="<?= set_value('res_unit_name') ?>">
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
                            <input type="text" class="form-control" name="ofc_hno" placeholder="Hno" value="<?= set_value('ofc_hno') ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Street Name</label>
                        <input type="text" class="form-control" name="ofc_street" placeholder="Street" value="<?= set_value('ofc_street') ?>">
                        </div>

                    </div>
                    <div class="col-sm-3">

                        <!-- text input -->
                        <div class="form-group">
                        <label>District</label>
                        <input type="text" class="form-control" name="ofc_district" placeholder="District" value="<?= set_value('ofc_district') ?>">
                        </div>


                    </div>
                    <div class="col-sm-3">

                        <!-- text input -->
                        <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="ofc_city" placeholder="City" value="<?= set_value('ofc_city') ?>">
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" min=0 class="form-control" name="ofc_contact" placeholder="Conact No" value="<?= set_value('ofc_contact') ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" min=0 class="form-control" name="ofc_email" placeholder="Email ID" value="<?= set_value('ofc_email') ?>">
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        
                            <label>Mandal/Municipalty:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ofc_adminunit" value="mandal" <?= set_radio('ofc_adminunit','mandal') ?>>
                                    <label class="form-check-label">Mandal</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ofc_adminunit" value="municipalty" <?= set_radio('ofc_adminunit','municipalty',true) ?>>
                                    <label class="form-check-label">Municipalty</label>
                                </div>  
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Name of Mandal/Municipalty</label>
                        <input type="text" class="form-control" name="ofc_unit_name" placeholder="Name of Mandal/Municipalty" value="<?= set_value('ofc_unit_name') ?>">
                        </div>
                    </div>
                </div>  
                
                

                <hr> 

                <h3>IDENTIFICATION DETAILS</h3>
                <div class="row">

                    <div class="col-sm-3">
                    <div class="form-group">
                        <label>Ration Card No</label>
                        <input type="text" min=0 class="form-control" name="ration_card" placeholder="Ration Card No" value="<?= set_value('ration_card') ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                        <label>Identification 1</label>
                        <input type="text" min=0 class="form-control" name="iden_1" placeholder="Identification No 1" value="<?= set_value('iden_1') ?>">
                        </div>                  
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                        <label>Identification 2</label>
                        <input type="text" min=0 class="form-control" name="iden_2" placeholder="Identification No 2" value="<?= set_value('iden_2') ?>">
                        </div>
                   
                    </div>

                </div>






                
                   
                </div>
                <!-- /.card-body -->        
                
                <div class="card-footer">
                   <a href="<?= base_url('admin/customers'); ?>" class="btn btn-warning">Cancel</a>        
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
    $("#customerSubMenuAdd").addClass('active');

    $(".disability-option").hide();
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