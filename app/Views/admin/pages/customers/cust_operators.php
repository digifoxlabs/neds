<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Customers</a></li>
              <li class="breadcrumb-item active">Manage</li>
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


    <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Showing Customers of xxxx</h3>
                            <!-- <div class="card-tools">
                                                                    
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                              <i class="fas fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">                                                          
                               <button type="button" class="dropdown-item btn btn-success m-b-5 m-r-2 btn-sm" data-toggle="modal" data-target="#modal-export" data-toggle="tooltip" data-placement="top" title="Export"> Export</button>                             
                              
                              <a href="#" class="dropdown-item">Closed Orders</a>
                              <a class="dropdown-divider"></a>
                              <a href="#" class="dropdown-item">Separated link</a>

                            </div>
                          </div>       
                        </div> -->

                        </div>
                        <div class="card-body">
                            
                        <!-- Custom Filter -->
                           <table class="float-right">
                             <tr >                  
                               <td>
                                 <select class="form-control form-control-sm" id='searchByStatus'>
                                   <option value=''>-- Order Status--</option>
                                   <option value='2'>Pending</option>
                                   <option value='1'>Active</option>
                                 </select>
                               </td>
                             </tr>
                           </table>                     
                                                                              

                            <table id="customerTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Community</th>
                                        <th>DOB</th>                                    
                                        <th>STATUS</th>                                    
                                        <th>ACTION</th>                                    
                                      
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>

var site_url = "<?php echo site_url(); ?>";

$(document).ready(function() {

    $("#customerTree").addClass('menu-open');
    $("#customerMenu").addClass('active');
    $("#customerSubMenuManage").addClass('active');


    var dataTable = $('#customerTable').DataTable({
          lengthMenu: [[ 10, 30, -1], [ 10, 30, "All"]], // page length options
          bProcessing: true,
          serverSide: true,
          scrollY: "400px",
          scrollCollapse: true,
          ajax: {
            url: site_url + "/admin/ajaxLoadAllCustomers", // json datasource
            type: "post",
            data: function(data){
              // key1: value1 - in case if we want send data with request       

              var type = $('#searchByStatus').val();
       
              // Append to data
              data.status = type;          

            
            }
          },
          columns: [
            { data: "c_id" },
            { data: "customer_id" },
            { data: "name" },
            { data: "gender" },
            { data: "community" },
            { data: "dob" },
            {
                 mRender: function(data, type, row) {
                    if(row.status == 1){
                        
                        return '<span class="badge bg-success">ACTIVE</span>';
                    }
                     
                     else {
                         
                          return '<span class="badge bg-warning">PENDING</span>';
                     }
                }     
            },
            {
                mRender: function(data, type, row) {
                    return '<a href="<?= base_url('admin/customers/id_card') ?>' +'/' + row.c_id +
                        '" class="btn btn-info btn-xs" >ID CARD</a> <a href="<?= base_url('admin/customers/view') ?>' +'/' + row.c_id +
                        '" class="btn btn-info btn-xs" >VIEW</a> <a href="<?= base_url('admin/customers/print') ?>' +'/' + row.c_id +
                        '" class="btn btn-info btn-xs" target="_blank" >Print</a>'
                }
            },
          ],
          columnDefs: [

            { orderable: false, targets: [0, 1, 2, 3] },
            { className: 'text-center', targets: [3,4,5,6,7] },    
            {"targets":[1,2,3,4],"render": function(data) {
                    return data.toUpperCase();
                },  
              },

          ],
          bFilter: true, // to display datatable search
        });


        $('#searchByStatus').change(function(){
        dataTable.draw();
      });



});
</script>