<?php
    if(isset($_POST['catName'])) echo "abc";
    include "../controller/category.php";
    
?>
<?php
    $cat = new category();
    echo Session::get('notification');
    if(isset($_POST["catName"]))
	{
        $catName = $_POST['catName'];
		$insertCat = $cat->insert_category($catName,$_POST["catId"]);
    }
    $idCatGet="";
    if(isset($_GET['id'])) 
    {
        $idCatGet = $_GET['id'];
    }
?>
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Loại SP</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="add_category.php" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label> Loại SP </label>
                <input type="text" id ="catName" name="catName" class="form-control" placeholder="Vui lòng nhập loại SP...">
            </div>
            <div class="form-group">
                <input type="hidden" id ="id" name="catId" value="<?php echo $idCatGet?>" class="form-control">
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
