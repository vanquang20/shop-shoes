<?php 
include '../lib/database.php';
include '../helpers/format.php';
include_once '../lib/session.php';
?>
<?php 
    class product
    {
        private $db;
        private $fm;

        function __construct() 
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function list_category($id)
        {
            $query = "SELECT * FROM tbl_category";
            if($id != "") $query .= " where catId = $id";
            $result = $this->db->select($query);  
            return $result;
        }

        public function insert_product($data,$img)
        {
         
                $query = "INSERT INTO tbl_product(productCode,productName,productQuantity,productDesc,price,`image`,size,catId) VALUES('$data[productCode]','$data[productName]','$data[productQuantity]','$data[productDesc]','$data[price]','$img[name]','$data[size]','$data[catId]')";
                if($data["productId"] != "") $query = "UPDATE tbl_product SET catName = '$catName' WHERE productId=".$data['productId'];                              
                $result = $this->db->insert($query);                  
                if($result)
                {
                    
                    $alert = "<span>Thêm danh mục thành công</span>";
                    Session::set('notification',$alert);
                    header('Location:list_product.php');                  
                    //return $alert;
                }
                else
                {
                    $alert = "<span>Thêm danh mục thất bại</span>";
                    Session::set('notification',$alert);
                    header('Location:list_product.php');
                    // return $alert;
                }
            
        }
           
    
        public function list_product($name)
        {
            $query = "SELECT * FROM tbl_product";
            if($name !="") $query .= " where productName like '%$name%'";
            
            $result = $this->db->select($query);  
            return $result;
        }

        public function delete($idCat)
        {
            $query = "DELETE FROM tbl_category WHERE catId=$idCat";
            $result = $this->db->delete($query);  
            header('Location:list_product.php');
            return $result;
        }
    }
    
    

?>