<?php include 'inc/header.php'; ?>

<?php 
  if ($_SERVER['REQUEST_METHOD']=='POST') {
        $sName=$_POST['sName'];
        $sRoll=$_POST['sRoll'];  
        $insertdata=$stu->insertData($sName,$sRoll);
  }


?>
<?php 
  if (isset($insertdata)) {
        echo $insertdata;
  }


?>

     <div class="panel panel-default">
       	    <div class="panel-heading">
       	    	<h2>
       	    		<a href="add.php" class="btn btn-success">Add Student</a>
       	    		<a href="index.php" class="btn btn-info pull-right">Back</a>
       	    	</h2>
       	    </div>
       	    <div class="panel-body">
       	      
       	    	<form action="" method="POST">
       	    		<div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" class="form-control" name="sName" id="sName">   
                            </div>
                            <div class="form-group">
                                <label for="roll">Student Roll</label>
                                <input type="text" class="form-control" name="sRoll" id="sRoll">   
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Add Student">   
                            </div>
       	    	</form>
       	    </div>
       </div>






<?php include 'inc/footer.php'; ?>