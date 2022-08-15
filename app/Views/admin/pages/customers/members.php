<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6"><span><a href="<?= base_url('admin/customers/view/'.$customerDetails['c_id']) ?>" class="btn btn-outline-info btn-s"><i class="fas fa-long-arrow-alt-left mr-1"></i>Back</a></span>
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

        <div class="row m-2">
              <div class="col-sm-6">           
                <h5>Add Familiy Members for: <span>  <?php echo $customerDetails['name']; ?></span></h5>    
              </div>
              <div class="col-sm-6">
               
                <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i> Add Member</button>
              </div>
         </div>



    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">

            <?php if(!empty($familyDetails)){
                
                foreach($familyDetails as $family){ ?>

         
        <div class="col-12 col-sm-6 col-md-4">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <?= $family['relationship']; ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
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
                    <div class="col-5 text-center">
                      <!-- <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid"> -->
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  
                    <button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-delete" data-todo='{"id":"<?php echo $family['f_id']; ?>","name":"<?php echo $family['member_name']; ?>","c_id":"<?php echo $family['c_id']; ?>"}' data-toggle="tooltip" data-placement="top" title="Delete"   ><i class="fa fa-trash"></i></button>   

                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-update" data-todo='{"id":"<?php echo $family['f_id']; ?>","relation":"<?php echo $family['relationship']; ?>","name":"<?php echo $family['member_name']; ?>","gender":"<?php echo $family['gender']; ?>","dob":"<?php echo $family['dob']; ?>","aadhar":"<?php echo $family['aadhar']; ?>","isdisable":"<?php echo $family['is_disable']; ?>","disability":"<?php echo $family['disability']; ?>","disabilitypcn":"<?php echo $family['disabilitypcn']; ?>","c_id":"<?php echo $family['c_id']; ?>" }' data-toggle="tooltip" data-placement="top" title="Edit"   ><i class="fa fa-edit"> EDIT</i> </button> 


                  </div>
                </div>
              </div>
            </div>


         <?php   }   ?>       


       <?php }  else { 
        
        
                echo 'No Members. Pl add members';
        
        } ?>

            </div>
          </div>
        </div>
    
     


   <!-- Add Modal-->          
   <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Family Member</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">          
            <!-- form start -->
              <form action="<?= base_url('admin/customers/savemembers') ?>" method="post">

              <input type="hidden" name="c_id" value="<?= $cust_id; ?>">
                <div class="card-body">                    
                    
                  <div class="form-group input-group-sm">
                    <label for="cat_name">Relationship *</label>
                    <input type="text" class="form-control" name="relationship" placeholder="Relationship with customer"  autocomplete="off" required>
                  </div>  
                  
                <div class="row">
                    
                    <div class="col-6">
                    <div class="form-group input-group-sm">
                    <label for="attr_1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Member Name" autocomplete="off">
                      </div> 
                    </div>
                    <div class="col-6">
                        
                    <div class="form-group input-group-sm">
                    <label for="attr_2">Gender</label>
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
                    
                    <div class="col-6">
                      <div class="form-group input-group-sm">
                         <label for="attr_3">DOB</label>
                             <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="dob" value="<?= set_value('dob') ?>">
                                </div>
                      </div>                 
                        
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group input-group-sm">
                         <label for="attr_3">AADHAR</label>
                         <input type="text" class="form-control" name="aadhar" placeholder="Attribute Name" autocomplete="off">

                      </div>                 
                        
                    </div>
                                
                </div> 
                
                
                <div class="row">

                        <div class="col-sm-12">
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

                        <div class="col-sm-6 disability-option">

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

                        <div class="col-sm-6 disability-option">

                            <div class="form-group">
                                <label>Disability Percentage</label>
                                <input type="number" min="0" max="100" class="form-control" name="disabilitypcn" id="disabilitypcn" placeholder="% of disability">
                            </div>
                        </div>
                    </div>   
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm swalDefaultSuccess">SAVE</button>
                </div>
              </form>                            
            </div>             
              
          </div>
          <!-- /.modal-content -->
        </div>
 
      </div> <!-- /.modal-dialog -->    




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
                <p>Are You sure to <strong>Delete</strong> the Member <strong><span id = "delName"></span></strong>   ?</p>                            
                <form action="<?php echo base_url('admin/customers/deletemember') ?>" method="post">                    
                <input type="hidden" name="row_id" id="del_id">  
                <input type="hidden" name="ret_id" id="c_id">  
                         
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



     <!--  Edit Modal  -->
     <div class="modal fade" id="modal-update">
        <div class="modal-dialog">
        <form action="<?= base_url('admin/customers/updatemember') ?>" method="post">   
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Member</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">            
                
                  <input type="hidden" name="row_id" id="e_id" >     

                  <input type="hidden" name="c_id" value="<?= $cust_id; ?>">


                <div class="card-body">                    
                    
                  <div class="form-group input-group-sm">
                    <label for="cat_name">Relationship *</label>
                    <input type="text" class="form-control" name="relationship" placeholder="Relationship with customer"  autocomplete="off" id="id_rel">
                  </div>  
                  
                <div class="row">
                    
                    <div class="col-6">
                    <div class="form-group input-group-sm">
                    <label for="attr_1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Member Name" id="id_name">
                      </div> 
                    </div>
                    <div class="col-6">
                        
                    <div class="form-group input-group-sm">
                    <label for="attr_2">Gender</label>
                    <select class="form-control" name="gender" id="id_gender">
                            <option value="" selected>Select</option>
                            <option value="male" <?= set_value('gender')=='male'?'selected':'' ?> >MALE</option>
                            <option value="female" <?= set_value('gender')=='male'?'selected':'' ?>>FEMALE</option>
                            <option value="others" <?= set_value('gender')=='others'?'selected':'' ?>>OTHERS</option>
                            
                            </select>
                  </div>                          
                        
                    </div>
                  
                </div>       
                <div class="row">
                    
                    <div class="col-6">
                      <div class="form-group input-group-sm">
                         <label for="attr_3">DOB</label>
                             <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="dob" id="id_dob" value="<?= set_value('dob') ?>">
                                </div>
                      </div>                 
                        
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group input-group-sm">
                         <label for="attr_3">AADHAR</label>
                         <input type="text" class="form-control" name="aadhar" id="id_aadhar" placeholder="Attribute Name" autocomplete="off">

                      </div>                 
                        
                    </div>
                                
                </div> 
                
                
                <div class="row">

                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Disability:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="isdisable" value="yes" >
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="isdisable" value="no" >
                                        <label class="form-check-label">No</label>
                                    </div>                  
                                </div>
                            </div>

                        <div class="col-sm-6 ">

                            <div class="form-group">
                            <label>Select Disability</label>
                                <select class="form-control" name="disability" id="id_disability">
                                <option value="" selected>Select</option>
                                <option value="orthopedic">ORTHOPEDIC</option>
                                <option value="hearing">HEARING</option>
                                <option value="visual">VISUAL</option>
                                <option value="mental">MENTAL</option>
                                <option value="others">OTHERS</option>                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 ">

                            <div class="form-group">
                                <label>Disability Percentage</label>
                                <input type="number" min="0" max="100" class="form-control" name="disabilitypcn" id="id_disabilitypcn" placeholder="% of disability">
                            </div>
                        </div>
                    </div>                  
      

              
            </div>
            <div class="modal-footer justify-content-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" name="updateProduct" class="btn btn-primary">Save changes</button>
            </div>             
          </div>
          <!-- /.modal-content -->
              </form>    
        </div> 
      </div> <!-- /.modal-dialog -->   
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script>
$(document).ready(function() {

   

    $("#customerTree").addClass('menu-open');
    $("#customerMenu").addClass('active');
    $("#customerSubMenuManage").addClass('active');


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



    $('#modal-update').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    
    var todo_id = button.data('todo').id  
    var todo_name = button.data('todo').name 
    var todo_relation = button.data('todo').relation 
    var todo_gender = button.data('todo').gender  
    var todo_dob = button.data('todo').dob  
    var todo_aadhar = button.data('todo').aadhar 
    var todo_isdisable = button.data('todo').isdisable 
    var todo_disability = button.data('todo').disability
    var todo_disabilitypcn = button.data('todo').disabilitypcn


    var modal = $(this)
  
    modal.find('.modal-body #e_id').val(todo_id)
    modal.find('.modal-body #id_name').val(todo_name)
    modal.find('.modal-body #id_rel').val(todo_relation)
    modal.find('.modal-body #id_gender').val(todo_gender)
    modal.find('.modal-body #id_dob').val(todo_dob)
    modal.find('.modal-body #id_aadhar').val(todo_aadhar)
    modal.find('.modal-body #id_disability').val(todo_disability)
    modal.find('.modal-body #id_disabilitypcn').val(todo_disabilitypcn)    
    $('input:radio[name=isdisable]').val([todo_isdisable]);

    });    




      $('#modal-delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var todo_id = button.data('todo').id  
      var todo_retid = button.data('todo').c_id  
      var todo_name = button.data('todo').name  
  
      var modal = $(this)  
      modal.find('.modal-body #del_id').val(todo_id)
      modal.find('.modal-body #c_id').val(todo_retid)
      modal.find('.modal-body #delName').text(todo_name)
  

    });  





});




</script>