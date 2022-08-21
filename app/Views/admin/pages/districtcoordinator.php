<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>District Coordinator</h1>
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

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Showing All</h3>

          <div class="card-tools">     
              <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-add">Add Coordinator</button>    
          </div>
        </div>
        <div class="card-body">       


        <table id="example1"  class="table table-striped">
                  <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 15%">District</th>                                     
                        <th style="width: 20%">user ID</th>
                        <th style="width: 10%">Mobile</th>
                        <th style="width: 20%">Address</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>    
                      
                      <?php  
                      
                      $count = 0;
                      foreach($districtData as $list): ?>
                      
                      <tr>                      
                            <td><?php echo ++$count;  ?></td>
                            <td><?php echo $list['name'];  ?></td>
                            <td><?php echo $list['district'];  ?></td>
                            <td><?php echo $list['email'];  ?></td>
                            <td><?php echo $list['mobile'];  ?></td>
                            <td><?php echo $list['address'];  ?></td>
                            <td><?php echo ($list['status'] ==1)? '<span class="badge bg-success">Active</span>':'<span class="badge bg-warning">Disabled</span>' ?></td>
                            <td>

                            <button type="button" class="btn btn-outline-primary btn-xs" data-toggle="modal" data-target="#modal-password" data-todo='{"id":<?php echo $list['u_id']; ?>,"name":"<?php echo $list['name']; ?>"}'><i class="fas fa-key"></i></button> 
                          
                            <button type="button" class="btn btn-outline-warning btn-xs" data-toggle="modal" data-target="#modal-update" data-todo='{"id":<?php echo $list['u_id']; ?>,"name":"<?php echo $list['name']; ?>","email":"<?php echo $list['email']; ?>","gender":"<?php echo $list['gender']; ?>","dob":"<?php echo $list['dob']; ?>","mobile":"<?php echo $list['mobile']; ?>","district":"<?php echo $list['district']; ?>","address":"<?php echo $list['address']; ?>","status":"<?php echo $list['status']; ?>"}'><i class="fa fa-edit"></i></button> 

                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete" data-todo='{"id":"<?php echo $list['u_id']; ?>","name":"<?php echo $list['name']; ?>"}'><i class="fa fa-trash"></i></button>  

                            </td>
                     
                                         
                        
                      </tr>              
                                            
                      <?php endforeach; ?>
                
                  </tbody>
                </table>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->


<!-- Add Modal-->          
<div class="modal fade" id="modal-add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add District Coordinator</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">                
                
              <!-- form start -->
              <form role="form" action="<?= base_url('admin/district/create') ?>" method="post">
                <div class="card-body">
                    
                <div class="row">
                  <div class="col-sm-8">

                    <div class="form-group input-group-sm">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" autocomplete="off" required>
                    </div>

                  </div>

                  <div class="col-sm-4">
                  <div class="form-group input-group-sm">
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
                    <div class="col-sm-6">                    
                        <div class="form-group input-group-sm">
                        <label for="exampleInputPassword1">Email ID *</label>
                        <input type="email" class="form-control"  name="email_id" placeholder="Email ID" required autocomplete="off">
                        </div>                     
                    </div>
                    <div class="col-sm-6">
                    
                    <div class="form-group input-group-sm">
                            
                            <label for="password">Contact No *</label>
                            <input type="text" class="form-control"  name="contact" placeholder="Contact no" required autocomplete="off">
                            
                        </div>    
                 
                    </div>
                </div>                          
                    
                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group input-group-sm">
                        <label for="password">DOB</label>
                            <input type="date" class="form-control"  name="dob" autocomplete="off">
                            
                            </div>    
                      

                    </div>
                    <div class="col-sm-6">                        
                        <div class="form-group input-group-sm">
                            
                            <label for="password">Distrcit *</label>
                            <input type="text" class="form-control"  name="district" placeholder="District" required autocomplete="off">
                            
                        </div>                                        
                   </div>                  
                        

                    </div>
   

                <div class="row">

                        <div class="col-sm-12">

                          <div class="form-group input-group-sm">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" name="address" placeholder="Enter Address"></textarea>
                      </div>

                        </div>
                </div>                       
                        
                        
              
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary swalDefaultSuccess">CREATE</button>
                </div>
              </form>          
                                
            </div>             
              
          </div>
          <!-- /.modal-content -->
        </div>
 
      </div> <!-- /.modal-dialog -->   


<!-- Update Modal-->          
<div class="modal fade" id="modal-update">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Coordinator</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">                
                
              <!-- form start -->
              <form role="form" action="<?= base_url('admin/district/update') ?>" method="post">

              <input type="hidden" name="row_id" id="e_id" >    
                <div class="card-body">
                    
                <div class="row">
                  <div class="col-sm-8">

                    <div class="form-group input-group-sm">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" autocomplete="off" required>
                    </div>

                  </div>

                  <div class="col-sm-4">
                  <div class="form-group input-group-sm">
                            <label>Gender</label>
                            <select class="form-control" name="gender" id="gender">
                            <option value="" selected>Select</option>
                            <option value="male" <?= set_value('gender')=='male'?'selected':'' ?> >MALE</option>
                            <option value="female" <?= set_value('gender')=='male'?'selected':'' ?>>FEMALE</option>
                            <option value="others" <?= set_value('gender')=='others'?'selected':'' ?>>OTHERS</option>
                            
                            </select>
                            </div>
                  </div>

                </div>               
                        
                <div class="row">
                    <div class="col-sm-6">                    
                        <div class="form-group input-group-sm">
                        <label for="exampleInputPassword1">Email ID *</label>
                        <input type="email" class="form-control" id="email" name="email_id" placeholder="Email ID" required autocomplete="off">
                        </div>                     
                    </div>
                    <div class="col-sm-6">
                    
                    <div class="form-group input-group-sm">
                            
                            <label for="password">Contact No *</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact no" required autocomplete="off">
                            
                        </div>    
                 
                    </div>
                </div>                          
                    
                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group input-group-sm">
                        <label for="password">DOB</label>
                            <input type="date" class="form-control" id="dob" name="dob" autocomplete="off">
                            
                            </div>    
                      

                    </div>
                    <div class="col-sm-6">                        
                        <div class="form-group input-group-sm">
                            
                            <label for="password">Distrcit *</label>
                            <input type="text" class="form-control" id="district" name="district" placeholder="District" required autocomplete="off">
                            
                        </div>                                        
                   </div>                  
                        

                    </div>
   

                <div class="row">

                        <div class="col-sm-6">

                          <div class="form-group input-group-sm">
                            <label>Address</label>
                              <textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter Address"></textarea>
                          </div>

                        </div>

                        <div class="col-sm-6">

                          <div class="form-group input-group-sm">
                          <label for="status">Status</label>
                          <select class="form-control" name="status" id="status" required>
                          <option value="">Select</option>
                          <option value="1" selected>Active</option>
                          <option value="2">Disabled</option>

                          </select>
                        </div>

                        </div>
                </div>                       
                        
                        
              
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary swalDefaultSuccess">UPDTAE</button>
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
                <p>Are You sure to <strong>Delete</strong> the Coordinator <strong><span id = "delName"></span></strong>   ?</p>                            
                <form action="<?php echo base_url('admin/district/delete') ?>" method="post">                    
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


      <!-- Password Modal -->

      <div class="modal fade" id="modal-password">
        <div class="modal-dialog">
          <div class="modal-content bg-light">
            <div class="modal-header">
              <h4 class="modal-title">Update Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">                
                <p>Reset <strong>Password</strong> for <strong><span id = "passName"></span></strong>   ?</p>                            
                <form action="<?php echo base_url('admin/district/password') ?>" method="post">                    
                <input type="hidden" name="row_id" id="p_id" >    
                <div class="row">
                  <div class="col-sm-8">

                    <div class="form-group input-group-sm">
                    <label for="name">New password *</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="New Password" autocomplete="off" required>
                    </div>

                  </div>

                </div>
                                        
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
        "aaSorting": [],
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> 


  <script>
$(document).ready(function() {

    //$("#utilityTree").addClass('menu-open');
    $("#districtMenu").addClass('active');
    //$("#utilitySubMenuCommission").addClass('active');



    $('#modal-delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var todo_id = button.data('todo').id  
      var todo_name = button.data('todo').name  
  
      var modal = $(this)  
      modal.find('.modal-body #del_id').val(todo_id)
      modal.find('.modal-body #delName').text(todo_name)  

    }); 


    $('#modal-password').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var todo_id = button.data('todo').id  
      var todo_name = button.data('todo').name  
  
      var modal = $(this)  
      modal.find('.modal-body #p_id').val(todo_id)
      modal.find('.modal-body #passName').text(todo_name)  

    }); 



    $('#modal-update').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    
    var todo_id = button.data('todo').id  
    var todo_name = button.data('todo').name 
    var todo_email = button.data('todo').email 
    var todo_gender = button.data('todo').gender  
    var todo_dob = button.data('todo').dob  
    var todo_district = button.data('todo').district 
    var todo_address = button.data('todo').address 
    var todo_status = button.data('todo').status
    var todo_contact = button.data('todo').mobile


    var modal = $(this)
  
    modal.find('.modal-body #e_id').val(todo_id)
    modal.find('.modal-body #name').val(todo_name)
    modal.find('.modal-body #email').val(todo_email)
    modal.find('.modal-body #gender').val(todo_gender)
    modal.find('.modal-body #dob').val(todo_dob)
    modal.find('.modal-body #district').val(todo_district)
    modal.find('.modal-body #address').val(todo_address)
    modal.find('.modal-body #status').val(todo_status)    
    modal.find('.modal-body #contact').val(todo_contact)    

    }); 


});
</script>