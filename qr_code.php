<?php
  include('header.php');
  auth();

  $condition ="";
  if($_SESSION['QR_USER_ROLE']==1)
  {
    $condition =" and added_by='".$_SESSION['QR_USER_ID']."'";
  }

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
    mysqli_query($con,"update qr_code set status='$status' where id='$id' $condition");
    redirect("qr_code.php");
}

//where 1 ka matlab hamesa true.TEAM CHROMO
$res =mysqli_query($con,"select qr_code.*,user.email from qr_code inner join user where 1 
and qr_code.added_by=user.id $condition order by user.added_on desc");

?>


<div class="page-wrapper">
       
       <div class="page-breadcrumb">
         <div class="row align-items-center">
           <div class="col-md-6 col-8 align-self-center">
             <h2 class="page-title mb-0 p-0">QR Codes</h3>
             <h5  class="mb-0 p-0">
              <a href="addqr.php">Add QR Codes</a>
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
                         <th class="border-top-0">Name</th>
                         <th class="border-top-0">Qr Code</th>
                         <th class="border-top-0">Link</th>
                         <th class="border-top-0">Color</th>
                         <th class="border-top-0">Size</th>
                         <th class="border-top-0">Added On</th>
                         <?php if($_SESSION['QR_USER_ROLE']==0) {?>
                         <th class="border-top-0">Added By</th>
                         <?php } ?>
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
                         <td><?php echo $row['name'] ?>
                            <br/>
                            <a href="report.php">Report</a>
                         </td>

                         <td>
     <a target="_blank" href="https://chart.googleapis.com/chart?cht=qr&chs=<?php echo $row['size'] ?>&chl=<?php echo $row['link'] ?>&chco=<?php echo $row['color'] ?>">
                         <img src="https://chart.googleapis.com/chart?cht=qr&chs=<?php echo $row['size'] ?>&chl=<?php echo $row['link'] ?>&chco=<?php echo $row['color'] ?>" width="100px" />
                         </a>
                        </td> 

                         <td><?php echo $row['link'] ?></td>
                         <td>
                        <span style="background-color: #<?php echo $row['color'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </td>
                         <td><?php echo $row['size'] ?></td>
                         <td><?php echo $row['added_on'] ?></td>

                         <?php if($_SESSION['QR_USER_ROLE']==0) {?>
                         <td><?php echo $row['email'] ?></td>
                         <?php } ?>
                         
                         
                         <td>
                          <a href="addqr.php?id=<?php echo $row['id']?>">Edit</a>
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
