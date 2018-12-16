<?php
include'connect.php';
session_start();
//add new data
if(isset($_POST["addCour"])){
 	if(isset($_POST["titre"])  && isset($_POST["kitab"]) && isset($_POST["type_sujet"])
		&& isset($_POST["type"])&& isset($_POST["type_support"]) 
		    && isset($_POST["description"])  ){
		$titre		 =$_POST["titre"];
		if(isset($_POST["daoura"])){
		$daoura		 =$_POST["daoura"];
	}
		else{
			$daoura	=0;
		
		}
	
		$kitab		 =$_POST["kitab"];
		$type_sujet  =$_POST["type_sujet"];
		$type        =$_POST["type"];
		$description =$_POST["description"];
		$type_support=$_POST["type_support"];
		//$src		 =$_POST["src"];
 		if(isset($_POST["date"]))
			{
				$date=$_POST["date"];
			}
		else{
			$date=date("Y/m/d");
			}
		//video	
 		if($type_support==1){
 			if(isset($_POST["src"])){
				$src=$_POST["src"];
				$src=str_replace("/watch?v=","/v/",$_POST['src']);
			}
		}
		//son
		//copy sound file to audio folder
		else {
			
			if(isset($_FILES["src"])){
				
				$temp=$_FILES['src']['tmp_name']; 
				$name=$_FILES['src']['name']; 
				$dest="../../../audio/".addslashes($name);
				echo $dest;
				print_r($_FILES['src']);
				move_uploaded_file($temp,$dest);

			// $dest="../../../audio/";
			 $file_name= $_FILES["src"]["name"];
			// $temp_file=$_FILES["src"]["tmp_name"];
			// move_uploaded_file($temp_file,$dest.$file_name);
				$src=$file_name;
			// echo $src;
			}
			
		}
		$sql="INSERT INTO `cour`( `titre`, `id_d`, `id_kitab`, `date_cour`, `type`, `type_sujet`, `desc_cour`, `type_support`, `src`) VALUES
		('$titre',$daoura,$kitab,'$date',$type,$type_sujet,'$description','$type_support','$src')";
		echo $sql;
			echo $daoura;
		echo "lo";
		 if($connect->query($sql)){
			 $_session['success']="données inserés avec succés..!!";	
			 header("location:../index.php");

		 }
		 else{
			echo "pblm";
		 }
	}
}
//update data

if(isset($_POST["editCour"])){
	if(isset($_POST["titre"])){
		$titre=$_POST["titre"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `cour` SET `titre`='$titre' where id_cour=".$id_cour;
		$res=$connect->query($sql);
				

	}
	if(isset($_POST["daoura"])){
		$daoura=$_POST["daoura"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `cour` SET `id_d`=$daoura where id_cour=".$id_cour;
		$res=$connect->query($sql);	
	

	}
	if(isset($_POST["kitab"])){
		$kitab=$_POST["kitab"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `cour` SET `id_kitab`=$kitab where id_cour=".$id_cour;
		$res=$connect->query($sql);

	}
	if(isset($_POST["type_sujet"])){
		$type_sujet=$_POST["type_sujet"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `cour` SET `type_sujet`=$type_sujet where id_cour=".$id_cour;
		$res=$connect->query($sql);
		

		}
	if(isset($_POST["type"])){
		$type=$_POST["type"];
		$type_sujet=$_POST["type_sujet"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `cour` SET `type`=$type where id_cour=".$id_cour;
		$res=$connect->query($sql);
				

	}
	if(isset($_POST["type_support"])){
		//video	
		$type_support=$_POST["type_support"];
 		if($type_support==1){
 			if(isset($_POST["src"])){
				$src=$_POST["src"];
				$src=str_replace("/watch?v=","/v/",$_POST['src']);
				$id_cour=$_POST["idM"];
				$sql="UPDATE `cour` SET `src`='$src' where id_cour=".$id_cour;
				$res=$connect->query($sql);
			}
		}
		//son
		//copy sound file to audio folder
		else{
			if(!empty($_FILES["src"])){
				
			// $dest="../../../audio/";
			// $file_name= $_FILES["src"]["name"];
			// $temp_file=$_FILES["src"]["tmp_name"];
			$temp=$_FILES['src']['tmp_name']; 
				$name=$_FILES['src']['name']; 
				$dest="../../../audio/".addslashes($name);
  				move_uploaded_file($temp,$dest);

			// move_uploaded_file($temp_file,$dest.$file_name);
			$src=$name;
			$id_cour=$_POST["idM"];
			$sql="UPDATE `cour` SET `src`='$src' where id_cour=".$id_cour;
			$res=$connect->query($sql);
			}
			
			$id_cour=$_POST["idM"];
			$sql="UPDATE `cour` SET `type_support`=$type_support where id_cour=".$id_cour;
			$res=$connect->query($sql);
		
		}
	}
	if(isset($_POST["description"])){
		$description=$_POST["description"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `cour` SET `desc_cour`='$description' where id_cour=".$id_cour;
		$res=$connect->query($sql);
		
	}
	
	$_SESSION['success']="Données modifiées avec succés..!!";	
	 header("location:../index.php");

}


//get data to update
if(isset($_POST["updateid"])){
	$sql="select * from cour where id_cour=".$_POST["updateid"];
	$res=$connect->query($sql);
	$cour=$res->fetchObject();
		echo json_encode($cour);
}
//delete
if(isset($_POST["deleteid"])){
	$sql="delete from cour where id_cour=".$_POST["deleteid"];
	$connect->query($sql);
}
?>