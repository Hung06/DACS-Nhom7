<?php
include "header.php";
include "slider.php";
include "class/product_class.php"
?>
<?php
$product=new product;
if($_SERVER['REQUEST_METHOD']==='POST'){
    // var_dump($_POST,$_FILES);
    // echo '<pre>';
    // echo print_r($_POST);
    // echo '</pre>';
    $insert_product =$product->insert_product($_POST,$_FILES);
}
?>
<div class="admin-content-right">
<div class="admin-content-right-product_add product-add-content">
                <h1>Thêm Sản phẩm </h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;" >*</span></label>
                    <input name="product_name" required type="text">
                    <label for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="product_code"> <br>
                    <label for="">Chọn danh mục <span style="color: red;" >*</span></label>
                    <select name="cartegory_id" id="cartegory_id">
                        <option value="#">Chọn</option>
                        <?php
                        $show_cartegory=$product->show_cartegory();
                        if($show_cartegory){
                            while($result=$show_cartegory->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['cartegory_id'] ?>" ><?php echo $result['cartegory_name'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>                   
                    <label for="">Chọn loại sản phẩm<span style="color: red;" >*</span></label>
                    <select name="brand_id" id="brand_id">
                        <option value="#">Chọn</option>
                        
                    </select>
                    <label for="color_id">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                    <div class="sanpham-color">
                        <input type="checkbox" name="color_id" value="001.png" id="color-001"> 
                        <label for="color-001" class="selected"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/001.png" alt="Màu 001"></label>
                        <input type="checkbox" name="color_id" value="009.png" id="color-009"> 
                        <label for="color-009"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/009.png" alt="Màu 009"></label>
                        <input type="checkbox" name="color_id" value="006.png" id="color-006"> 
                        <label for="color-006"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/006.png" alt="Màu 006"></label>
                        <input type="checkbox" name="color_id" value="013.png" id="color-013"> 
                        <label for="color-013"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/013.png" alt="Màu 013"></label>
                        <input type="checkbox" name="color_id" value="012.png" id="color-012"> 
                        <label for="color-012"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/012.png" alt="Màu 012"></label>
                        <input type="checkbox" name="color_id" value="020.png" id="color-020"> 
                        <label for="color-020"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/020.png" alt="Màu 020"></label>
                        <input type="checkbox" name="color_id" value="007.png" id="color-007"> 
                        <label for="color-007"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/007.png" alt="Màu 007"></label>
                        <input type="checkbox" name="color_id" value="044.png" id="color-044"> 
                        <label for="color-044"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/044.png" alt="Màu 044"></label>
                        <input type="checkbox" name="color_id" value="047.png" id="color-047"> 
                        <label for="color-047"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/047.png" alt="Màu 047"></label>
                        <input type="checkbox" name="color_id" value="010.png" id="color-010"> 
                        <label for="color-010"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/010.png" alt="Màu 010"></label>
                        <input type="checkbox" name="color_id" value="014.png" id="color-014"> 
                        <label for="color-014"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/014.png" alt="Màu 014"></label>
                        <input type="checkbox" name="color_id" value="000.png" id="color-000"> 
                        <label for="color-000"><img src="https://pubcdn.ivymoda.com/ivy2/images/color/000.png" alt="Màu 000"></label>
                    </div>
                    <label for="">Chọn Size sản phẩm<span style="color: red;">*</span></label> <br>
                    <div class="sanpham-size">
                    <p>S</p>    <input type="checkbox" name="sanpham-size[]" value="S"> 
                    <p>M</p>    <input type="checkbox" name="sanpham-size[]" value="M"> 
                    <p>L</p>    <input type="checkbox" name="sanpham-size[]" value="L">
                    <p>XL</p>   <input type="checkbox" name="sanpham-size[]" value="XL">  
                    <p>XXL</p>  <input type="checkbox" name="sanpham-size[]" value="XXL">  
                    </div>
                    <label for="">Giá sản phẩm<span style="color: red;" >*</span></label>
                    <input name="product_price" required type="text">
                    <label for="">Giá Sale<span style="color: red;" >*</span></label>
                    <input name="product_sale" required type="text" >
                    <label for="">Mô tả sản phẩm<span style="color: red;" >*</span></label>
                    <textarea name="product_desc" id="editor" cols="30" rows="10"></textarea>
                    <label for="">Chi tiết<span style="color: red;">*</span></label> <br>
                    <textarea id="editor2"  required name="product_dedetail" cols="60" rows="5"></textarea><br>  
                    <label  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                    <textarea id="editor3" required name="product_preserve" cols="60" rows="5"></textarea><br> 
                    <label for="">Ảnh sản phẩm chính<span style="color: red;" >*</span></label>
                    <span style="color: red;">
                        <?php
                            if(isset($insert_product)){
                                echo ($insert_product);
                            }
                        ?>
                    </span>
                    <input name="product_img" required multiple type="file">
                    <label for="">Ảnh sản phẩm thêm<span style="color: red;" >*</span></label>
                    <input name="product_imgdesc[]" required multiple type="file">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editor2'), {
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editor3'), {
        })
        .catch(error => {
            console.error(error);
        });
</script>
    <script>
        $(document).ready(function(){
            $("#cartegory_id").change(function(){
                var x = $(this).val()
                $.get("productadd_ajax.php",{cartegory_id:x},function(data){
                    $("#brand_id").html(data)
                })
            })
        })
    </script>

</html>