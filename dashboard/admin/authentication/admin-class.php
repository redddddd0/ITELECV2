<?php
require_once __DIR__.'/../../../database/dbconnection.php';
include_once __DIR__.'/../../../config/settings-configuration.php';

class ADMIN
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->dbConnection();
    }

    public function addAdmin($csrf_token,$username, $email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE email = $email");
        $stmt->execute(array(":email" =>$email));

        if($stmt->rowCount() > 0){
            echo "<script>alert(Email already exists.); window.location.href = '../../../';</script>";
            exit;
        }

        $hash_password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function adminSignin($email, $password, $csrf_token){

    }

    public function adminSignout()
    {

    }

    public function logs($activity, $user_id)
    {

    }
    
    public function runQuery($sql)
    {
        $stmt = $tihs->conn->prepare($sql);
        return $stmt;
    }
}

if(isset($_POST['btn-signup'])){
    $csrf_token = trim($_POST['csrf_token']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $addAdmin = new ADMIN();
    $addAdmin->addAdmin($csrf_token,$username, $email, $password)
}
?>