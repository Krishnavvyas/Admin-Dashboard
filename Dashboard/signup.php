 <?php  
 $message = '';  
 $error = '';  

 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["firstname"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }  
      else if(empty($_POST["lastname"]))  
      {  
           $error = "<label class='text-danger'>Enter lastname</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Enter Gender</label>";  
      }  
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter email</label>";  
      } 
      else if(empty($_POST["password"]))  
      {  
           $error = "<label class='text-danger'>Enter password</label>";  
      }
      else if(empty($_POST["psw-repeat"]))  
      {  
           $error = "<label class='text-danger'>Enter password</label>";  
      }
      if($_POST["psw-repeat"]!=$_POST["password"])
      {
          $error="<label class='text-danger'>Password not matched..</label>";  
      }  
        

      else  
      {  
           if(file_exists('day.json'))  
           {  

                $current_data = file_get_contents('day.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'firstname'               =>     $_POST['firstname'],
                     'lastname'               =>     $_POST['lastname'],  
                     'gender'          =>     $_POST["gender"],  
                     'email'               =>     $_POST['email'],
                     'password'               =>     $_POST['password']
                      
                );  
$a=$_POST['email'];

                foreach ($array_data as $key => $value) {
                  if($value['email']==$a){
                    echo"email id already exists"; 
                    break;                   
                   }
                  else{
                   $array_data[] = $extra;
                    $final_data = json_encode($array_data);
               
                    if(file_put_contents('day.json', $final_data))  
                    {  
                      $message = "<label class='text-success'>Signedup Successfully</p>"; 
                      break; 
                    }
                  }
               } 
           }  
           else  
           {  
            $error='Json file not exists';
      } 
      } 
 }  

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Sign up | Append Data to JSON File using PHP</title>  
           
           
           
           <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

input[type=submit] {
    width: 20em;  height: 4em;
    color: green;

}

/* Full-width input fields */
input[type=text], input[type=password] ,input[type=email] {
  width: 30%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus,input[type=email]:focus,input[type=radio]:focus {
  background-color: #ddd;
  outline: none;
}

h1{
  background-color:#D46549;
  color:white;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 12px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 15%;
}
button:hover {
  opacity:2;
  color: green;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
button.thick {
  font-weight: bold;
}

</style>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
  function chk() {
    debugger;

    var a=$('#email').val();
    $.getJSON('day.json', function(data) 
    {
      $.each(data,function(i,obj)
        {
          if(obj.email == a)
          {
            window.alert("email is taken");
          }

    // body...
  });
});
}

</script>
           
      </head>  
      <body>  
            
           <div class="container" style="width:1800px;">  
                <center><h1 style="font-family:verdana;" >Sign Up</h1></center><br />                 
                <center><form method="post" style="border:2px solid #ccc">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                    <br>
                    <br>

                    <label for="firstname"><b><font size="4">First Name -</font></b> </label>
                    <input type="text" placeholder="Enter Firstname" name="firstname" required>
                    <br> 
                    <br> 
                    <label for="lastname"><b><font size="4">Last Name -</font></b> </label>
                    <input type="text" placeholder="Enter Lastname" name="lastname" required> 
                    <br>
                    <br> 

                    <label><b><font size="4">Gender-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></b></label>  
                    <input type="radio" name="gender" value="Male" class="form-control" >Male</input> &nbsp;&nbsp;&nbsp; 
                    <input type="radio" name="gender" value="female" class="form-control">Female</input> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                    <br>
                    <br> 
                    <br>
                    <label for="email"><b><font size="4">Email -</font></b></label>
                    <input type="email" placeholder="Enter Email" name="email" id="email" onkeyup="chk()" required> 
                    <br>
                    <br> 
                    <label for="password"><b><font size="4">Password -</font></b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>
<br> 
                    <br>

                    <label for="psw-repeat"><b><font size="4">Repeat Password -</font></b></label>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                    <br>
                    <br>
                  <center> <button type="submit" name="submit" value="Sign Up"  class="btn btn-info"><br /><b><font size="4">SignUp</font></b></button>       </center>               
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                     <br>
                     <br>
                     <a href="login.html">Have an account ? Click here to Login !</a>
                     <br>
                     <br>
                     <br>
                </form> 
                </center> 
           </div>  
           <br />  
      </body>  
 </html> 