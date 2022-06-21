<?php
  include('header.php');
  auth();
  $msg1 ="";
  $name ="";
  $link ="";
  $color ="";
  $size ="";
  $id =0;
  $password_req="required";

  $condition ="";
  if($_SESSION['QR_USER_ROLE']==1)
  {
    $condition =" and added_by='".$_SESSION['QR_USER_ID']."'";
  }
  
  if(isset($_GET['id']) && $_GET['id']>0)
{
  $id =get_safe_value($_GET['id']);
  $res =mysqli_query($con,"select * from qr_code where id ='$id' $condition");
  if(mysqli_num_rows($res)>0)
  {
    $row =mysqli_fetch_assoc($res);
    $name =$row['name'];
    $link =$row['link'];
    $color =$row['color'];
    $size =$row['size'];
  }
  else
  {
    redirect('qr_code.php');
  }

}


  if(isset($_POST['submit']))
  {
    $name =get_safe_value($_POST['name']);
	$link =get_safe_value($_POST['link']);
  $color =get_safe_value($_POST['color']);
	$size =get_safe_value($_POST['size']);
	$status =1;
  date_default_timezone_set('Asia/Kolkata');
  $added_on =date('Y-m-d H:i:s');
  $added_by =	$_SESSION['QR_USER_ID'];
  if($id>0)
  {
   
    mysqli_query($con,"update qr_code set name='$name',link='$link',color='$color',size='$size'
     where id='$id' $condition");
  }
  else
  {
    mysqli_query($con,"insert into qr_code(name,link,color,size,added_by,
    status,added_on) values('$name','$link','$color','$size',
    '$added_by','$status','$added_on')");
  }
  redirect('qr_code.php' );
}
?>

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
         <form action="" method="post">
         <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">*Name</label>
                <div class="col-10">
                  <input class="form-control" type="text" name="name" required value="<?php echo $name ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">*Link</label>
                <div class="col-10">
                  <input class="form-control" type="text" name="link" required value="<?php echo $link ?>">
                </div>
              </div>


              <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">*Color</label>
                <div class="col-10">
                <select name="color" class="form-control">
                  <option value="">Select Color</option>
                  <?php
                  $color_sql =mysqli_query($con,"select * from colors where status=1");
                  while($color_row =mysqli_fetch_assoc($color_sql))
                  {
                    $is_selected ="";
                    if($color_row['color']==$color)
                    {
                      $is_selected ="selected";
                    }
                    echo '<option value="'.$color_row['color'].'" '.$is_selected.'>'.$color_row['color'].'</option>';
                  }
                   ?>
  
              </select>
                </div>
              </div>

              
          
               <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">*Size</label>
                <div class="col-10">
                <select name="size" class="form-control">
                  <option value="">Select Size</option>
                  <?php
                  $size_sql =mysqli_query($con,"select * from size where status=1 order by size asc");
                  while($size_row =mysqli_fetch_assoc($size_sql))
                  {
                    $is_selected ="";
                    if($size_row['size']==$size)
                    {
                      $is_selected ="selected";
                    }
                    echo '<option value="'.$size_row['size'].'" '.$is_selected.'>'.$size_row['size'].'</option>';
                  }
                   ?>
  
              </select>
                </div>
              </div>

             <input type="submit" name="submit"  >
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
