<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('./add_category.php');
include_once('../controller/category.php');
?>
<?php 
  $cat = new category();
  
 
  if(isset($_GET['del'])) $del_category = $cat->delete($_GET['del']);
  $name ="";
  if(isset($_GET['name'])) $name =$_GET['name'];
  $list_category = $cat->list_category($name);

?>
<div class="container-fluid">
<form method="get" action="list_category.php" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-2 my-md-0 mw-100 navbar-search">
                  <div class="input-group">
                      <input type="text" class="form-control border-0 small" placeholder="Search for..."
                    name ="name" aria-label="Search" value ="<?php echo $name?>"  aria-describedby="basic-addon2">
                      <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search fa-sm"></i>
                          </button>
                      </div>
                  </div>
</form>
<button type="button" style="float: right" class="btn btn-primary"onclick="get_attribute1('','')" data-toggle="modal" data-target="#add_category">
Thêm SP</button><br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Loại Sản Phẩm</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
          <?php
              $stt=0;
              if($list_category)
              {
                foreach($list_category as $cats)
                {
                  $stt++;
                  $id_cat = $cats['catId'];
          ?>
          <tr>
            <td><?php echo $stt;?></td>
            <td><?php echo $cats['catName'];?></td>
            <td>
            
              <button type="button" class="btn btn-primary" onclick="get_attribute(<?php echo $id_cat;?>,'<?php echo $cats['catName'];?>')" data-id="<?php echo $cats['catId']; ?>" data-toggle="modal" data-target="#add_category">
              EDIT </button>
            </td>
            <td>
                  <button type="submit" onclick="del(<?php echo $id_cat?>)" name="delete_btn" class="btn btn-danger"> DELETE</button>

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
  function get_attribute(cat_id,cat_name)
  {

    document.getElementById("id").value = cat_id;
    document.getElementById("catName").value = cat_name;
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

