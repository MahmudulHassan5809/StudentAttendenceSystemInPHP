<?php include 'inc/header.php'; ?>



     <div class="panel panel-default">
       	    <div class="panel-heading">
       	    	<h2>
       	    		<a href="add.php" class="btn btn-success">Add Student</a>
       	    		<a href="index.php" class="btn btn-info pull-right">take  attn</a>
       	    	</h2>
       	    </div>
       	    <div class="panel-body">
       	      <div class="well text-center">
       	      	
       	      </div>
       	    	<form action="" method="POST">
       	    		<table class="table table-striped">
       	    			<tr>
       	    				<th width="30%">Serial</th>
       	    				<th width="50%">Attendence Date</th>
       	    				
       	    				<th width="20%">Action</th>
       	    			</tr>
                                   <?php 
                                      $getdate=$stu->getdate();
                                       if ($getdate) {
                                             $i=0;
                                             while ($result=$getdate->fetch_assoc()) {
                                                    $i++; 
                                             
                                       

                                   ?>
       	    			<tr>
       	    				<td><?php echo $i;;  ?></td>
       	    				<td><?php echo $result['att_time']; ?></td>
       	    			
       	    				<td>
       	    				 <a class="btn btn-info" href="studentview.php?dt=<?php echo $result['att_time']; ?>">View</a>
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