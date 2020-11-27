<?php
    include "../controller/product.php";  
     
?>
<?php
    $product = new product();
		$list_category = $product->list_category("");
    
    if(isset($_POST["data"])&&isset($_FILES["fileupload"]))
	  {
      include "../controller/upload_img.php";
        $data = $_POST['data'];
        $insertProduct = $product->insert_product($data,$_FILES["fileupload"]);
        
    }
    $idCatGet="";
    if(isset($_GET['id'])) 
    {
        $idCatGet = $_GET['id'];
    }
?>
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Sản Phẩm</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="add_product.php" method="POST"  enctype="multipart/form-data">

        <div class="modal-body">
            <div class="form-group">
                <label>Mã Sản Phẩm</label>
                <input type="text" id ="productCode" name="data[productCode]" class="form-control" placeholder="Vui lòng nhập mã sp...">
            </div>

            <div class="form-group">
                <label>Tên Sản Phẩm</label>
                <input type="text" id ="productName" name="data[productName]" class="form-control" placeholder="Vui lòng nhập tên sản phẩm...">
            </div>
            <div class="form-group">
                <label>Hình ảnh </label>
                <input type="file" name="fileupload" id="fileupload">
            </div>
            <div class="form-group">
                <label>Số lượng </label>
                <input type="text" id ="productQuantity" name="data[productQuantity]" class="form-control" placeholder="Vui lòng nhập số lượng...">
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="text" id ="price" name="data[price]" class="form-control" placeholder="Vui lòng nhập giá...">
            </div>
            <div class="form-group">
                <label>Size</label>
                <input type="text" id ="size" name="data[size]" class="form-control" placeholder="Vui lòng nhập size...">
            </div>
            <div class="form-group">
                <label>Loại Sản phẩm</label>
                
                <select name="data[catId]" id="catId">
                <?php 
                  if($list_category != "") 
                  {
                    foreach($list_category as $cats)
                    {
                      $catId = $cats['catId'];
                      $catName = $cats['catName'];
                      echo "<option value='$catId'>$catName</option>";
                    }
                  }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <input type="text" id ="productDesc" name="data[productDesc]" class="form-control" placeholder="Vui lòng nhập mô tả...">
            </div>
            <div class="form-group">
                <input type="hidden" id ="productId" name="data[productId]" value="<?php echo $idCatGet?>" class="form-control">
            </div>      
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
