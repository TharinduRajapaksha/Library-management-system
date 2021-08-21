<!DOCTYPE html>
<html>
<head>

    <?php
        session_start();

        include('connection.php');//we can use recuard it's better

        //code for login

        if (isset($_REQUEST['loginsubmit']))//checking wether the submit button have pressed
        {
          $username = $_REQUEST['username'];
          $password = $_REQUEST['password'];

          $encryptedpassword = sha1($password);
          //echo $username;
          //echo $password;

          $sqlq = "select * from user where user_name = '$username' && user_password = '$encryptedpassword'";
        
          $result = mysqli_query($connection,$sqlq);

          $num = mysqli_num_rows($result);

          //echo "<br>" . $num;

          if ($num == 1) 
          {
            $_SESSION['username'] = $username;
            $_SESSION['sattus'] = true;
            header('location:Home.php');
          }
        
          else
          {
            echo "<br>username or password incorect";
            //header('location:Login.php');
            session_destroy();

          }
        }

        //code for sign up

        if (isset($_REQUEST['signupsubmit']))//checking wether the submit button have pressed) 
        {
                /*
                INSERT INTO table_name {column1,column2, etc )
                VALUES (value1,value2,etc)

                
                */

                $email = $_REQUEST['email'];
                $confermationcode = $_REQUEST['confermationcode'];
                $password = $_REQUEST['password'];
                $confermpassword = $_REQUEST['confermpassword'];

                
                if ($password == $confermpassword)
                {
                    $sqlq1 = "select member_reg_num from member where email = '$email' && confermationcode = '$confermationcode';";

                    $result1 = mysqli_query($connection,$sqlq1);


                    $num = mysqli_num_rows($result1);

                    echo $num;

                    if ($num == 1)
                    {
                        while ($row = mysqli_fetch_assoc($result1)) 
                        {
                            $member_reg_num = $row['member_reg_num'];
                        }

                        echo $member_reg_num;

                        // Encrypet the password
                        $hashed_password =sha1($password);

                        $sqlq2 = "insert into user(user_name,user_password) values('$member_reg_num','$hashed_password');";

                        if(mysqli_query($connection,$sqlq2))
                        {
                          echo "sign up sucssesful";
                        }
                        else
                        {
                          echo "sign up faild";
                        }

                    }
                    else
                    {
                      echo "incorect confermation code ";
                    }

                }
                else
                {
                    echo "Password didn't match";
                }
                  
                // Encrypet the password
                

                /*
                $hashed_password =sha1($password);

                // Example below display encrypted password

                //echo "Hashed Password is : {$hashed_password} ";


                $query = "INSERT INTO user(first_name, last_name, email,password,is_deleted) VALUES ('{$first_name}','{$last_name}','{$email}','{$password}',{$is_deleted})";

                // Execute the Query

                $result=mysqli_query($connection , $query);

                if($result)
                  {
                    echo "1 Record Added";
                  }
                else
                  {
                    echo " Database Query failed";
                  }
                */

              
        }
        
        

        

    ?>


  <!--<meta charset="UTF-8">-->
  <title>  Library Management System</title>
  <link rel="icon" type="image/icon" href="images/titlebarlogo01.jpg" sizes="2083">


  <style type="text/css">
      body
      {
          margin:0;
          color:#6a6f8c;
          background: url(../images/login2.jpg);
          background-size: cover;
          font-family: sans-serif;
      }

      a{color:inherit;text-decoration:none}

      .login-wrap
      {
          position:absolute;
          top: 10%;
          left: 30%;
          margin:auto;
          width:550px;
          height:450px;
          padding:90px 70px 50px 70px;
          background: rgb(0,0,0,.8);
          /*background:url(http://codinginfinite.com/demo/images/bg.jpg) no-repeat center;*/
          box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
          border-radius:10px;
      }
        

      /* Hiding the sign-in-htm/sign-up-ftm */

      .login-wrap .sign-in-htm,
      .login-wrap .sign-up-htm
      {
          top:0;
          left:0;
          right:0;
          bottom:0;
          position:absolute;
          -webkit-transform:rotateY(180deg);
                  transform:rotateY(180deg);
          -webkit-backface-visibility:hidden;
                  backface-visibility:hidden;
          transition:all .4s linear;
      }
          
      
      /* need for decorate */
      .login-wrap .sign-in,
      .login-wrap .sign-up
      /*.login-form .group .check*/
      {
        display:none;
      }
        
        /* decoration of sign up/sign in tab */
        .login-wrap .tab
        {
          font-size:22px;
          margin-right:15px;
          padding-bottom:5px;
          margin:0 20px 25px 0;/*t,r,b,l*/
          display:inline-block;
          border-bottom:2px solid transparent;
          cursor: pointer;
        }
                  
                /* decoration of sign up/sign in tab on selection */
                .login-wrap .sign-in:checked + .tab,
                .login-wrap .sign-up:checked + .tab
                {
                  color:#fff;
                  border-color:#1161ee;
                }
        
        .login-form
        {
          min-height:345px;
          position:relative;
          -webkit-perspective:1000px;
                  perspective:1000px;
          -webkit-transform-style:preserve-3d;
                  transform-style:preserve-3d;
        }
        

        .login-form .group
        {
          /*
          margin-top: 15px;
          margin-bottom:15px;*/
          position:relative;
        }

            .login-form .group input
            {
              width: 200px;
              padding: 10px 0;
              font-size: 16px;
              color: #fff;
              margin-bottom:30px;
              border: none;
              border-bottom: 1px solid #fff;
              outline: none;
              background: transparent;
              letter-spacing:1px;
            }

            
            .login-form .group label
            {
              position: absolute;
              top: 0;
              left: 0;
              padding: 10px 0;
              font-size: 16px;
              color: #fff;
              pointer-events: none;
              transition: .5s;

            }



              .login-form .sign-in-htm .logo
              {
                position:absolute;
                left: 60%;
                top: 1%;
              }

                  .login-form .sign-in-htm .logo img
                  {
                      width: 130px;
                      height: 130px;
                      margin-bottom: 20px;
                  }
            
              
              .login-form .sign-in-htm .group input:focus ~ label,
              .login-form .sign-in-htm .group input:valid ~ label
              {
                
                top: -18px;
                left: 0;
                color: #03a9f4;
                font-size: 12px;
                
              }

              .login-form .sign-up-htm .group input:focus ~ label,
              .login-form .sign-up-htm .group input:valid ~ label
              {
                
                top: -18px;
                left: 0;
                color: #03a9f4;
                font-size: 12px;
                
              }


              .login-form .sign-in-htm input[type="submit"]
              {
              background: transparent;
              border: none;
              outline: none;
              color: #fff;
              background: #03a9f4;
              padding: 10px 20px;
              cursor: pointer;
              border-radius: 5px;
              
                  
              /*font-size: 25px;
              
              border-radius: 5px;
              width: 150px;
              height: 50px;*/
              margin-top: 5%;
              margin-left:10%;
            }
            
            .login-form .sign-up-htm input[type="submit"]
              {
              background: transparent;
              border: none;
              outline: none;
              color: #fff;
              background: #03a9f4;
              padding: 10px 20px;
              cursor: pointer;
              border-radius: 5px;
              
                  
              /*font-size: 25px;
              
              border-radius: 5px;
              width: 150px;
              height: 50px;*/
              margin-top: 5%;
              margin-left:40%;
            }
           
        .login-form .group label .icon:before,
        .login-form .group label .icon:after
        {
          content:'';
          width:10px;
          height:2px;
          background:#fff;
          position:absolute;
          transition:all .2s ease-in-out 0s;
        }
        

        .login-form .group label .icon:before
        {
          left:3px;
          width:5px;
          bottom:6px;
          -webkit-transform:scale(0) rotate(0);
                  transform:scale(0) rotate(0);
        }
        
        .login-form .group label .icon:after
        {
          top:6px;
          right:0;
          -webkit-transform:scale(0) rotate(0);
                  transform:scale(0) rotate(0);
        }
        
        
        
        
        .login-form .group .check:checked + label .icon:before
        {
          -webkit-transform:scale(1) rotate(45deg);
                  transform:scale(1) rotate(45deg);
        }
        
        .login-form .group .check:checked + label .icon:after
        {
          -webkit-transform:scale(1) rotate(-45deg);
                  transform:scale(1) rotate(-45deg);
        }
    

        /* rotating part of the sign in / sign up */

        .login-wrap .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm
        {
          -webkit-transform:rotate(0);
                  transform:rotate(0);
        }
        
        .login-wrap .sign-up:checked + .tab + .login-form .sign-up-htm
        {
          -webkit-transform:rotate(0);
                  transform:rotate(0);
        }

        .hr
        {
          height:3px;
          margin:30px 0 25px 0;
          background:rgba(255,255,255,.2);
        }

        .foot-lnk
        {
          text-align:center;
        }
        
  </style>
  
</head>

<body>
  <div class="login-wrap">
        

              <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>

              <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

              <div class="login-form">

                    <form class="sign-in-htm" action="index.php" method="post">

                        <div class="logo">

                            <img src="images/LoginPageIMG.png">

                        </div>
                        

                        <div class="group">

                            <input name="username" type="text" required="">
                            <label  >Username</label>

                        </div>
                        
                        <div class="group">

                            
                            <input name="password" type="password" required="">
                            <label >Password</label>

                        </div>


                        

                        <input type="checkbox" >
                        <label ><span ></span> Keep me Signed in</label>

                        <input type="submit"  id = "loginsubmit" name = "loginsubmit" value="Login">

                        


                        <div class="hr"></div>


                        <div class="foot-lnk">

                          <a href="#forgot">Forgot Password?</a>

                        </div>
                        

                  </form>

                  <form class="sign-up-htm" action="index.php" method="POST">

                        <div class="group">

                          <input name="email" type="text" >
                          <label>Email</label>

                        </div>

                        <div class="group">
 
                          <input name="confermationcode" type="password">
                          <label>Confermation code</label>

                        </div>  

                        <div class="group">

                          <input name = "password" type="password">
                          <label> Password</label>

                        </div>

                        <div class="group">

                          <input name = "confermpassword" type="password">
                          <label> Conferm Password</label>

                        </div>

                        <input type="submit"  id = "signupsubmit" name = "signupsubmit" value="Sign Up">


                        <div class="hr"></div>


                        <div class="foot-lnk">

                          <label for="tab-1">Already Member?</a>

                        </div>

                  </form>

            </div>

      

  </div>
  
  
</body>
</html>