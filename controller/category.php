<?php 
include '../lib/database.php';
include '../helpers/format.php';
include_once '../lib/session.php';
?>
<?php 
    class category
    {
        private $db;
        private $fm;

        function __construct() 
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        public function insert_category($catName,$idCat)
        {
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);

            if(empty($catName))
            {
                $alert = "loại sản phẩm không được trống";
                Session::set('notification',$alert);
                //header('Location:list_category.php');
                //return $alert;
            }
            else
            {
                $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
                if($idCat != "") $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId=".$idCat;
                
                $result = $this->db->insert($query);  
                
                if($result)
                {
                    
                    $alert = "<span>Thêm danh mục thành công</span>";
                    Session::set('notification',$alert);
                    
                    header('Location:list_category.php');
                    //return $alert;
                }
                else
                {
                    $alert = "<span>Thêm danh mục thất bại</span>";
                    Session::set('notification',$alert);
                   header('Location:list_category.php');
                    // return $alert;
                }
            }
        }   
        
        public function list_category($name)
        {
            $query = "SELECT * FROM tbl_category";
            if($name !="") $query .= " where catName like '%$name%'";
            
            $result = $this->db->select($query);  
            return $result;
        }

        public function delete($idCat)
        {
            $query = "DELETE FROM tbl_category WHERE catId=$idCat";
            $result = $this->db->delete($query);  
            header('Location:list_category.php');
            return $result;
        }
    }
    

?>