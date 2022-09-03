<style>
/* body{
   font-family:'arial';
   } */

.lavkush img {
  border-radius: 8px;
  border: 2px solid blue;
}
span{

    font-family: 'Orbitron', sans-serif;
    font-size:16px;
}
hr.new2 {
  border-top: 1px dashed black;
  width:350px;
  text-align:left;
  align-items:left;
}
 /* second id card  */
 .txt-value{
     font-size: 13px;
     margin-top: -8px;
 }
 .container {
    width: 80vh;
    height: 45vh;
    margin: auto;
    background-color: white;
    background-image: url('<?= base_url('assets/img/card_bck.jpg') ?>');
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
    box-shadow: 0 1px 10px rgb(146 161 176 / 50%);
    overflow: hidden;
    border-radius: 10px;
}

.header {
    /* border: 2px solid black; */
    width: 73vh;
    height: 15vh;
    margin: 20px auto;
    /* background-color: white; */
    /* box-shadow: 0 1px 10px rgb(146 161 176 / 50%); */
    /* border-radius: 10px; */
   
    /* background-image: url('<?= base_url('assets/img/card_header.png') ?>'); */
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}

.header h1 {
    color: rgb(27, 27, 49);
    text-align: right;
    margin-right: 20px;
    margin-top: 15px;
}

.header p {
    color: rgb(157, 51, 0);
    text-align: right;
    margin-right: 22px;
    margin-top: -10px;
}

.container-2 {
    /* border: 2px solid red; */
    width: 73vh;
    height: 10vh;
    margin: 0px auto;
    margin-top: -20px;
    display: flex;
}

.box-1 {
    border: 4px solid black;
    width: 90px;
    height: 95px;
    margin: -40px 25px;
    border-radius: 3px;
}

.box-1 img {
    width: 82px;
    height: 87px;
}

.box-2 {
    /* border: 2px solid purple; */
    width: 33vh;
    height: 8vh;
    margin: 7px 0px;
    padding: 5px 7px 0px 0px;
    text-align: left;
    font-family: 'Poppins', sans-serif;
}

.box-2 h2 {
    font-size: 1.3rem;
    margin-top: -5px;
    color: rgb(27, 27, 49);
    ;
}

.box-2 p {
    font-size: 0.7rem;
    margin-top: -5px;
    color: rgb(179, 116, 0);
}

.box-3 {
    /* border: 2px solid rgb(21, 255, 0); */
    width: 8vh;
    height: 8vh;
    margin: 8px 0px 8px 30px;
}

.box-3 img {
    width: 8vh;
}

.container-3 {
    /* border: 2px solid rgb(111, 2, 161); */
    width: 73vh;
    height: 12vh;
    margin: 0px auto;
    margin-top: 10px;
    display: flex;
    font-family: 'Shippori Antique B1', sans-serif;
    font-size: 0.7rem;
}

.info-1 {
    /* border: 1px solid rgb(255, 38, 0); */
    width: 17vh;
    height: 12vh;
}

.id {
    /* border: 1px solid rgb(2, 92, 17); */
    width: 17vh;
    height: 5vh;
}

.id h4 {
    color: rgb(179, 116, 0);
    font-size:15px;
}

.dob {
    /* border: 1px solid rgb(0, 46, 105); */
    width: 17vh;
    height: 5vh;
    margin: 8px 0px 0px 0px;
}

.dob h4 {
    color: rgb(179, 116, 0);
    font-size:15px;
}

.info-2 {
    /* border: 1px solid rgb(4, 0, 59); */
    width: 17vh;
    height: 12vh;
}

.join-date {
    /* border: 1px solid rgb(2, 92, 17); */
    width: 17vh;
    height: 5vh;
}

.join-date h4 {
    color: rgb(179, 116, 0);
    font-size:15px;
}

.expire-date {
    /* border: 1px solid rgb(0, 46, 105); */
    width: 17vh;
    height: 5vh;
    margin: 8px 0px 0px 0px;
}

.expire-date h4 {
    color: rgb(179, 116, 0);
    font-size:15px;
}

.info-3 {
    /* border: 1px solid rgb(255, 38, 0); */
    width: 17vh;
    height: 12vh;
}

.email {
    /* border: 1px solid rgb(2, 92, 17); */
    width: 22vh;
    height: 5vh;
}

.email h4 {
    color: rgb(179, 116, 0);
    font-size:15px;
}

.phone {
    /* border: 1px solid rgb(0, 46, 105); */
    width: 17vh;
    height: 5vh;
    margin: 8px 0px 0px 0px;
}

.info-4 {
    /* border: 2px solid rgb(255, 38, 0); */
    width: 22vh;
    height: 12vh;
    margin: 0px 0px 0px 0px;
    font-size:15px;
}

.phone h4 {
    color: rgb(179, 116, 0);
    font-size:15px;
}

.sign {
    /* border: 1px solid rgb(0, 46, 105); */
    width: 17vh;
    height: 5vh;
    margin: 41px 0px 0px 20px;
    text-align: center;
}
    </style>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6"><span><a href="<?= base_url('admin/customers/view/'.$customerDetails['c_id']) ?>" class="btn btn-outline-info btn-s"><i class="fas fa-long-arrow-alt-left mr-1"></i>Back</a></span>
            </div>
          <div class="col-sm-6 text-right">
          <button id="demo" class="downloadtable btn btn-primary" onclick="downloadtable()"> Download Id Card</button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    

      <!-- Default box -->
      <div class="card card-primary card-outline">    
        <div class="card-body login-page" id="mycard">
        <div class='card' style='width:350px; padding:0;' >
        <div class='container' style='text-align:left; border:2px dotted black;'>                                              
        <div class='header'></div>                                  
            <div class='container-2'>
                <div class='box-1'>              
                <?php echo empty($customerDetails['image'])? '<img width= "100"  src="'.base_url('public/Assets/img/default_img.jpg').'" alt="image"  />' : '<img width= "100"  src="'.base_url('assets/img/customers').'/'.$customerDetails['image'].'" alt="image" id="uploaded_image"  /> ' ?>
                </div>
                <div class='box-2'>
                    <h2><strong><?= $customerDetails['name']; ?></strong></h2>
                    <p style='font-size: 14px;'>ID: <?= $customerDetails['customer_id']; ?></p>
                </div>
                <div class='box-3'>
                    <!-- <img src='<?= base_url('assets/img/logo.jpg') ?>' alt=''> -->
                </div>
            </div>

            <div class='container-3'>
                <div class='info-1'>
                    <div class='id'>
                        <h4>Father's Name</h4>
                        <p class="txt-value"><?= $customerDetails['father_name']; ?></p>
                    </div>
                    <div class='dob'>
                        <h4>Phone</h4>
                        <p class="txt-value"><?= $customerDetails['res_contact']; ?></p>
                    </div>

                </div>
                <div class='info-2'>
                    <div class='join-date'>
                        <h4>DOB</h4>
                        <p class="txt-value"><?= $customerDetails['dob']; ?></p>
                    </div>
                    <div class='expire-date'>
                        <h4>Expiry Date</h4>
                        <p class="txt-value"><?= $customerDetails['valid_upto']; ?></p>
                    </div>
                </div>
                <div class='info-3'>
                    <div class='email'>
                        <h4>Gender</h4>
                        <p class="txt-value"><?= strtoupper($customerDetails['gender']); ?></p>
                    </div>                    
                           
                </div>
                <div class='info-4'>
                    <div class='sign'>
                        <br>
                        <p class="txt-value" style='font-size:12px;'>Your Signature</p>
                    </div>
                </div>
                
            </div>
        
        </div>


         
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
      
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>
$(document).ready(function() {

    $("#customerTree").addClass('menu-open');
    $("#customerMenu").addClass('active');
    $("#customerSubMenuManage").addClass('active');


});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script>

function downloadtable() {

    var node = document.getElementById('mycard');

    domtoimage.toPng(node)
        .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            downloadURI(dataUrl, "<?=$customerDetails['customer_id']; ?>")
        })
        .catch(function (error) {
            console.error('oops, something went wrong', error);
        });

}

function downloadURI(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    delete link;
}

</script>