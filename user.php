<?php
  include('header.php');
  auth();
admin_auth();

if(isset($_GET['status']) && $_GET['status']!='' && isset($_GET['id']) && $_GET['id']>0)
{
    $status =get_safe_value($_GET['status']);
    $id =get_safe_value($_GET['id']);

    if($status=="active")
    {
      $status =1;
    }
    else
    {
      $status =0;
    }
    mysqli_query($con,"update user set status='$status' where id='$id'");
    redirect("user.php");
}

$res =mysqli_query($con,"select * from user where role='1' order by added_on desc");

?>

<div class="page-wrapper">
       
       <div class="page-breadcrumb">
         <div class="row align-items-center">
           <div class="col-md-6 col-8 align-self-center">
             <h2 class="page-title mb-0 p-0">Students</h3>
             <h5  class="mb-0 p-0">
              <a href="addst.php">Add Student</a>
             </h5>
           </div>
          
         </div>
       </div>
       
       <div class="container-fluid">
        
         <div class="row">
           <div class="col-sm-12">
             <div class="card">
               <div class="card-body">
                <?php
                if(mysqli_num_rows($res)>0) {
                ?>
                 <h4 class="card-title">Basic Table</h4>
                 <div class="table-responsive">
                   <table class="table user-table">
                     <thead>
                       <tr>
                         <th class="border-top-0">#</th>
                         <th class="border-top-0">ID</th>
                         <th class="border-top-0">Name</th>
                         <th class="border-top-0">Roll No.</th>
                         <th class="border-top-0">Sap ID</th>
                         <th class="border-top-0">Email</th>
                         <!-- <th class="border-top-0">Password</th> -->
                         <th class="border-top-0">Total QR</th>
                         <th class="border-top-0">Total Hit</th>
                         <th class="border-top-0">Added On</th>
                         <th class="border-top-0">Action</th>
                       </tr>

                      
                     </thead>
                     <tbody>

                      <?php
                      $i =1;
                      while($row =mysqli_fetch_assoc($res))
                      {
                      ?>
                       <tr>
                         <td><?php echo $i++ ?></td>
                         <td><?php echo $row['id'] ?></td>
                         <td><?php echo $row['name'] ?></td>
                         <td><?php echo $row['roll_no'] ?></td>
                         <td><?php echo $row['sap_id'] ?></td>
                         <td><?php echo $row['email'] ?></td>
                         <!-- <td><?php echo $row['password'] ?></td> -->
                         <td><?php echo $row['total_qr'] ?></td>
                         <td><?php echo $row['total_hit'] ?></td>
                         <td><?php echo $row['added_on'] ?></td>
                         <td>
                          <a href="addst.php?id=<?php echo $row['id']?>">Edit</a>
                          <?php
                         $status ="active";
                          $strStatus ="Deactive";
                          if($row['status']==1)
                          {
                            $status ="deactive";
                            $strStatus ="Active";
                          }
                          ?>
                          <br>
                         <a href="?id=<?php echo $row['id']?>&status=<?php echo $status ?>"><?php echo $strStatus ?></a> 
                        
                         
                        </td>
                       </tr>
                      <?php
                      }
                      ?>

                     </tbody>
                   </table>
                 </div>
                 <?php } 
                 else
                 {
                  echo "No data found";
                 }
                 ?>
               </div>
             </div>
           </div>
         </div>
        
       </div>
       
       
       <?php
  include('footer.php')
?>
