<?php

namespace AMS;

error_reporting(0);

// ** This file will login (only) the user to the admin_dashboard if the details
// entered by the user are valid. 


class Member
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }

   
    //Note: We are referring admin_id as username
    // This function gets the login details corresponding to the admin_id entered by the user

    public function getMember($admin_id)
    {
        $query = 'SELECT * FROM admin_info where admin_id = ?';
        $paramType = 's';
        $paramValue = array(
            $admin_id
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

    // This function will login the existing admin to the admin_dashboard
    // Note that there is only one admin for our database

    public function loginMember()
    {
        $memberRecord = $this->getMember($_POST["admin_id"]);
        $loginPassword = 0;
        if (! empty($memberRecord)) {
            if (! empty($_POST["login-password"])) {
                $password = $_POST["login-password"];
            }
            $hashedPassword = $memberRecord[0]["password"];
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
        } else {
            $loginPassword = 0;
        }
        if ($loginPassword == 1) {
            // means login sucess so store the admin's id in session variable
            session_start();
            $_SESSION["admin_id"] = $memberRecord[0]["admin_id"];

            // here we can add more session variables to be used by admin dashboard
            // sign out option in admin dashboard will be taken care by admin_logout.php in this folder

            session_write_close();
            $url = "../admin_dashboard/admin_dashboard.php";
            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "Invalid Admin ID or password.";
            return $loginStatus;
        }
    }
}
