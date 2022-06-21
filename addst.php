<?php
  include('header.php');
  auth();
  admin_auth();
  $msg1 ="";
  $name ="";
  $roll_no ="";
  $sap_id ="";
  $email ="";
  $password ="";
  $total_qr ="";
  $total_hit ="";
  $id =0;
  $password_req="required";
  if(isset($_GET['id']) && $_GET['id']>0)
{
  $id =get_safe_value($_GET['id']);
  $res =mysqli_query($con,"select * from user where id ='$id' ");
  if(mysqli_num_rows($res)>0)
  {
    $row =mysqli_fetch_assoc($res);
    $name =$row['name'];
    $roll_no =$row['roll_no'];
    $sap_id =$row['sap_id'];
    $email =$row['email'];
    $password =$row['password'];
    $total_qr =$row['total_qr'];
    $total_hit =$row['total_hit'];
    $password_req ="";
  }
  else
  {
    redirect('user.php');
  }

}


  if(isset($_POST['submit']))
  {
    $name =get_safe_value($_POST['name']);
	$roll_no =get_safe_value($_POST['roll_no']);
  $sap_id =get_safe_value($_POST['sap_id']);
	$email =get_safe_value($_POST['email']);
	$password =password_hash(get_safe_value($_POST['password']),PASSWORD_DEFAULT);
  $total_qr =get_safe_value($_POST['total_qr']);
	$total_hit =get_safe_value($_POST['total_hit']);
  $role =1;
	$status =1;
  date_default_timezone_set('Asia/Kolkata');
  $added_on =date('Y-m-d H:i:s');


  $email_sql ="";
  if($id>0)
  {
      $email_sql =" and id!='$id' ";
  }

if(mysqli_num_rows(mysqli_query($con,"select * from user where email='$email' $email_sql"))>0)
{
  $msg1 ="Email already registered";
}
else
{

  if($id>0)
  {
    $ing ="";
    if($password!='')
    {
       $ing =",password='$password'";
    }
    mysqli_query($con,"update user set name='$name',roll_no='$roll_no',sap_id='$sap_id',email='$email',
    total_qr='$total_qr',total_hit='$total_hit',added_on='$added_on',role='$role',status='$status' $ing where id='$id' ");
  }
  else
  {
    mysqli_query($con,"insert into user(name,roll_no,sap_id,email,password,
    total_qr,total_hit,added_on,role,status) values('$name','$roll_no','$sap_id','$email',
    '$password','$total_qr','$total_hit','$added_on','$role','$status')");
  }
  redirect('user.php' );
  }
}
?>


<!-- yahan pe mene internal styling ki hai sigma id ke liye,agar user same email daalega to .TEAM CHROMO -->
<style>
  #sigma
  {
    color: red;
  }
  </style>

<div class="page-wrapper">
       
       <div class="page-breadcrumb">
         <div class="row align-items-center">
           <div class="col-md-6 col-8 align-self-center">
             <h3 class="page-title mb-0 p-0">Users</h3>
             <div class="d-flex align-items-center">
               <nav aria-label="breadcrumb">
                
               </nav>
             </div>
           </div>
          
         </div>
       </div>
 <div class="container-fluid">
         
          <form class="form-horizontal form-material"action="" method="post">
          
              <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Name</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="name" required value="<?php echo $name ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="example-email-input" class="col-2 col-form-label">Roll No.</label>
                <div class="col-10">
                  <input class="form-control" type="text" name="roll_no" required value="<?php echo $roll_no ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="example-url-input" class="col-2 col-form-label">Sap ID</label>
                <div class="col-10">
                  <input class="form-control" type="text"   name ="sap_id" required value="<?php echo $sap_id ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                  <input class="form-control" type="email"  name ="email" required value="<?php echo $email ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                  <input class="form-control" type="password"  name ="password" <?php $password_req ?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Total QR</label>
                <div class="col-10">
                  <input class="form-control" type="text"   name ="total_qr" >
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Total Hit</label>
                <div class="col-10">
                  <input class="form-control" type="text"  name ="total_hit" >
                </div>
              </div>
              
              <input type="submit" name="submit">
                     
        </div>
          </form>
        
        <div id="sigma">
          <?php
          echo $msg1;
          ?>
        </div>
        

<?php
  include('footer.php')
?>
