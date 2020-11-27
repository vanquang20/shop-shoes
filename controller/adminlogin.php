<?php 
include '../lib/session.php';
Session::checkLogin();
include '../lib/database.php';
include '../helpers/format.php';
?>
<?php 

    class adminlogin
    {
        private $db;
        private $fm;

        function __construct() 
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin($adminUser,$adminPass)
        {
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);

            if(empty($adminUser) || empty($adminPass))
            {
                $alert = "user và pass không được để trống";
                return $alert;
            }
            else
            {
                $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser'AND adminPass = '$adminPass' LIMIT 1";
                $result = $this->db->select($query);

                if($result != false)
                {
                    $value = $result->fetch_assoc();
                    Session::set('login',true);
                    Session::set('adminId',$value['adminId']);
                    Session::set('adminUser',$value['adminUser']);
                    Session::set('adminName',$value['adminName']);
                    header('Location:index.php');
                    
                }
                else
                {
                    $alert = "vui lòng nhập lại user và pass";
                    return $alert; 
                }

            }
        }     
    }
    

?>