<?php

/*Create User Code*/
$fullname="";
$designation="";
$username = "";
$user_query="";
$errors = array();

//If User Create button Clicked 
if(isset($_POST['create_user']))
{
	$fullname = $_POST['fullname'];
	$designation = $_POST['designation'];
	$username = $_POST['username'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];
	
//user image
		/*$user_img = $_FILES['$user_img']['name'];
		$user_img_tmp = $_FILES['$user_img_tmp']['tmp_name'];
		
		move_uploaded_file($user_img_tmp,"images/$user_img"); */
		
	$location="images/users/";
    $name=$_FILES['user_img']['name'];
    $temp_name=$_FILES['user_img']['tmp_name'];
    if(isset($name)){
        move_uploaded_file($temp_name,$location.$name);
    }
		
if(empty($fullname))
{
	array_push($errors,"Full Name is required");
}

if(empty($designation))
{
	array_push($errors,"Designation is required");
}

if(empty($username))
{
	array_push($errors,"UserName is required");
}


if(empty($password_1))
{
	array_push($errors,"Password is required");
}

if($password_1 != $password_2)
{
	array_push($errors,"The two passwords do not match");
}


//Save user
if(count($errors) == 0)
{
$password = $password_1;

$query = "insert into user(FullName,Designation,User_Pic,UserName,PassWord) VALUES ('$fullname', '$designation', '$name','$username','$password')";

$user_query = mysqli_query($con, $query); 

}

if($user_query) 
{
	array_push($errors,"User Created Successfully");
	
}

}

/*End Create User Code*/

/*Create Login Code*/
if(isset($_POST['login']))
				{
					$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
					$user_pass = mysqli_real_escape_string($con,$_POST['user_pass']);
					
					if (empty($user_name)) {
					array_push($errors, "Username is required");
					}
					
					if (empty($user_pass)) {
					array_push($errors, "Password is required");
					}
					
					if(count($errors) == 0)
					{
					$user_pass = $user_pass;
					$query = "select * from user where UserName = '$user_name' AND PassWord = '$user_pass'";
					$results = mysqli_query($con, $query);
					
									
					if(mysqli_num_rows($results)>0)
						{
							$_SESSION['user_name']=$user_name;
							while($row=mysqli_fetch_array($results))
							{
								$_SESSION['Designation'] = $row['Designation'];
								//$_SESSION['x']='1';
								//$_SESSION['Soid']='';
								
							}
							echo"<script>window.open('index.php','_self')</script>";
						}
						else
						{
							echo"<script>alert('User name or Password is Incorrect')</script>";
						}
					}
				}
/*End Create User Code*/
?>