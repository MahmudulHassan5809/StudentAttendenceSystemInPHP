<?php include 'inc/header.php'; ?>
<script type="text/javascript">
       $(document).ready(function(){
        $("form").submit(function(){
           var roll=true;
           $(":radio").each(function(){
               name=$(this).attr('name');
               if(roll && !$(':radio[name=["'+name+'"]:checked').length)
               {
                     alert(name+Roll Missing);
                     roll=false;
               }

           });
           return roll;

        }) ;


       });
</script>
<?php 
  //error_reporting(0);
  $cur_date=date('Y-m-d');
  if ($_SERVER['REQUEST_METHOD']=='POST') {
        $attn=$_POST['attn'];
          
        $insertattn=$stu->insertAttn($cur_date,$attn);
  }


?>
<?php 
  if (isset($insertattn)) {
        echo $insertattn;
  }


?>

     <div class="panel panel-default">
       	    <div class="panel-heading">
       	    	<h2>
       	    		<a href="add.php" class="btn btn-success">Add Student</a>
       	    		<a href="dateview.php" class="btn btn-info pull-right">View All</a>
       	    	</h2>
       	    </div>
       	    <div class="panel-body">
       	      <div class="well text-center">
       	      	 <strong>Date: </strong> <?php echo $cur_date; ?>
       	      </div>
       	    	<form action="" method="POST">
       	    		<table class="table table-striped">
       	    			<tr>
       	    				<th width="25%">Serial</th>
       	    				<th width="25%">Student Name</th>
       	    				<th width="25%">Student Roll</th>
       	    				<th width="25%">Attendence</th>
       	    			</tr>
                                   <?php 
                                      $getstudent=$stu->getAllStudentt();
                                       if ($getstudent) {
                                             $i=0;
                                             while ($result=$getstudent->fetch_assoc()) {
                                                    $i++; 
                                             
                                       

                                   ?>
       	    			<tr>
       	    				<td><?php echo $i;;  ?></td>
       	    				<td><?php echo $result['sName']; ?></td>
       	    				<td><?php echo $result['sRoll']; ?></td>
       	    				<td>
       	    				<input type="radio" name="attn[<?php echo $result['sRoll']; ?>]" value="present">P
       	    				<input type="radio" name="attn[<?php echo $result['sRoll']; ?>]" value="absent">A
       	    				</td>
       	    			</tr>
                                  
                                   
       	    			
                                    <?php } } else { ?>
                                    <tr>
                                        <td colspan="3">No data Found</td>  
                                   </tr>
                                   <?php } ?>
                                   <tr>
                                   
                                          <td>
                                            <input type="submit" name="submit" value="Save">
                                          </td>
                                   </tr>
       	    		</table>
       	    	</form>
       	    </div>
       </div>






<?php include 'inc/footer.php'; ?>