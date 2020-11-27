<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('./add_product.php');
include_once('../controller/product.php');
?>
<?php 
  $product = new product();
  
 
  if(isset($_GET['del'])) $del_product = $product->delete($_GET['del']);
  $name ="";
  if(isset($_GET['name'])) $name =$_GET['name'];
  $list_product = $product->list_product($name);

?>
<div class="container-fluid">
    <form method="get" action="list_product.php"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control border-0 small" placeholder="Search for..." name="name"
                aria-label="Search" value="<?php echo $name?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <button type="button" class="btn btn-primary" onclick="get_attribute1('','','','','','','','')" data-toggle="modal"
        data-target="#add_product">
        Thêm SP</button><br><br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã SP</th>
                            <th>Tên SP</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Size</th>
                            <th>Loại SP</th>
                            <th>Mô tả</th>
                            <th>EDIT </th>
                            <th>DELETE </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              $stt=0;
              if($list_product)
              {
                foreach($list_product as $products)
                {
                  $stt++;
                  $productId  = $products['productId'];
                  $productCode = $products['productCode'];
                  $productName = $products['productName'];
                  $productQuantity = $products['productQuantity'];
                  $productDesc = $products['productDesc'];
                  $price = $products['price'];
                  $image = $products['image'];
                  $size = $products['size'];
                  $catId = $products['catId'];
                 $cat = $product->list_category($catId);
                 
                 
                 foreach($cat as $cats)
                {
                   echo $catName =$cats["catName"];
                }
                ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $productCode; ?></td>
                            <td><?php echo $productName; ?></td>
                            <td><?php echo $productQuantity; ?></td>
                            <td><?php echo $productDesc; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><img src="uploads/<?php echo $image;?>" width="150px;" height="100px;"></td>
                            <td><?php echo $size; ?></td>
                            <td><?php echo $catName; ?></td>
                            <td>

                                <button type="button" class="btn btn-primary"
                                    onclick="get_attribute1(
                                    <?php echo $productId;?>,'<?php echo $productCode;?>',
                                    '<?php echo $productName;?>','<?php echo $productQuantity;?>',
                                    '<?php echo $productDesc;?>','<?php echo $price;?>',
                                    '<?php echo $size;?>','<?php echo $catId;?>')"
                                     data-toggle="modal"
                                    data-target="#add_product">
                                    EDIT </button>
                            </td>
                            <td>
                                <button type="submit" onclick="del(<?php echo $productId?>)" name="delete_btn"
                                    class="btn btn-danger"> DELETE</button>

                            </td>
                        </tr>
                        <?php
                }
              } 
          ?>


                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
  function get_attribute1(productId,productCode,productName,productQuantity,productDesc,price,size,catId)
  {
    
    document.getElementById("productId").value = productId;
    document.getElementById("productCode").value = productCode;
    document.getElementById("productName").value = productName;
    document.getElementById("productQuantity").value = productQuantity;
    document.getElementById("productDesc").value = productDesc;
    document.getElementById("price").value = price;
    document.getElementById("size").value = size;
   if(catId != "") document.getElementById("catId").value = catId;
  }
  function del(del)
  {
    
     window.location.href = window.location.href+"?del="+del;
  }
  
</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<script>
function get_attribute(product_id, product_name) {

    document.getElementById("id").value = product_id;
    document.getElementById("productName").value = product_name;
}
</script>