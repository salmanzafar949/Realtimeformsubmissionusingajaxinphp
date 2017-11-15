<?php
/**
 * Created by Salman zafar.
 * User: Salman
 * Date: 11/15/2017
 * Time: 12:57 PM
 */

include "db.php";

class Register{


    public function regitser_user()
    {

        $db = new DbConn();
        $conn = $db->conn;

        if(isset($_POST['email']) && isset($_POST['pass']))
        {
            $email = $_POST['email'];
            $pass  = $_POST['pass'];

            if(!empty($email) && !empty($pass))
            {



                    $sql = "SELECT * FROM `regs` WHERE email='$email'";
                    $res = $conn->query($sql);

                    if($res->num_rows> 0)
                    {
                        return "Email already exist";
                    }
                    else
                    {
                        $e_pass = $this->encrypt_pass($pass);
                        $insert = "INSERT INTO `regs`(email,pass) VALUES('$email','$e_pass')";
                        if($conn->query($insert) === TRUE)
                        {
                            $_SESSION['logged_in'] = $email;
                            return header('location:dashboard.php');
                            //return "thanks for registering";
                        }
                        else
                        {
                            return "Unable to register you".$conn->error_no;
                        }
                    }



            }
        }

    }


    public function encrypt_pass($pass)
    {
        return password_hash($pass,PASSWORD_DEFAULT);
    }
}

$register = new Register();
$resp = $register->regitser_user();
echo $resp;