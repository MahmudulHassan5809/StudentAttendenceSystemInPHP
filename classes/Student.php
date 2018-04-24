<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php 
 class Student
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db=new Database();
 		$this->fm=new Format();
 	}

 	public function getAllStudentt()
 	{
          $query="SELECT * FROM tbl_student order by sId desc";
          $result=$this->db->select($query);
          return $result;

 	}
 	public function insertData($sName,$sRoll)
 	{
 		$sName=mysqli_real_escape_string($this->db->link,$sName);
 		$sRoll=mysqli_real_escape_string($this->db->link,$sRoll);

 		if ($sName=='' or $sRoll=='') {
 			$msg="<div class='alert alert-danger' style='color:red';font-size:25px;>Field Must Not Be Empty</div>";
 			return $msg;
 		}else
 		{
 			$query="INSERT INTO tbl_student(sName,sRoll)
 			        VALUES('$sName','$sRoll')";
 			        $result=$this->db->insert($query);


 	         $aquery="INSERT INTO tbl_attn(sRoll)
 			        VALUES('$sRoll')";
 			        $aresult=$this->db->insert($aquery);
 			 if ($result) {
 			        	$msg="<div class='alert alert-success' style='color:red';font-size:25px;>Success</div>";
 			return $msg;
 			        }else{
 			        	$msg="<div class='alert alert-success' style='color:red';font-size:25px;>Not Success</div>";
 			        return $msg;
 			        }       
 		}
 	}

 	public function insertAttn($cur_date,$attn=array())
 	{
 	   
       $query="SELECT DISTINCT att_time FROM tbl_attn";
       $getdata=$this->db->select($query);
       if($getdata){
       while ($result=$getdata->fetch_assoc()) {
         	$db_date=$result['att_time'];
         	if($cur_date==$db_date)
         	{
              $msg="<div class='alert alert-success' style='color:red';font-size:25px;>Already Taken</div>";
 			        return $msg;
         	}
         }
}
         foreach ($attn as $key => $attn_value) {
              if ($attn_value=="present") {
               	$stu_query="INSERT INTO tbl_attn(sRoll,attened,att_time)
               	    Values('$key','present',now())";
               	    $data_insert=$this->db->insert($stu_query);
               }elseif ($attn_value=="absent") {
               	$stu_query="INSERT INTO tbl_attn(sRoll,attened,att_time)
               	    Values('$key','absent',now())";
               	    $data_insert=$this->db->insert($stu_query);
               } 


           }

           if ($data_insert) {
 			        	$msg="<div class='alert alert-success' style='color:red';font-size:25px;>Success</div>";
 			return $msg;
 			        }else{
 			        	$msg="<div class='alert alert-success' style='color:red';font-size:25px;>Not Success</div>";
 			        return $msg;
 			        }     

 	}

 	public function getdate()
 	{
        $query="SELECT DISTINCT att_time FROM tbl_attn";
        $result=$this->db->select($query);
        return $result;
 	}


} 	