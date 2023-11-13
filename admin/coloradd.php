<?php
include "header.php";
include "slider.php";
include "class/brand_class.php"
?>
<?php
$brand=new brand;
if($_SERVER['REQUEST_METHOD']==='POST'){
    $cartegory_id=$_POST['cartegory_id'];
    $brand_name =$_POST['brand_name'];
    $insert_brand =$brand->insert_brand($cartegory_id,$brand_name);
}
?>
<style>
    select{
        height: 30px;
        width: 200px;
    }
</style>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Thêm Loại sản phẩm</h1>
                <br>
                <form action="" method="POST">
                    <input type="text" require name="color_name" placeholder="Nhập màu">
                    <input name="product_img" required multiple type="file">
                    <label for="">Ảnh sản phẩm thêm<span style="color: red;" >*</span></label>
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>