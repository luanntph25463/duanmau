<body> 
    <main>
        <div class="wrapper">
        <div class="danhsach1">
            <div class="grid-9">
            <div>
        </div>
        <?php
    $con = mysqli_connect("localhost","root","","luanntph25463");
            $result =mysqli_query($con,"SELECT id
            FROM giohang
            WHERE id > 0;");
            $rows = mysqli_num_rows($result);
            echo "<h1>Tổng Số Sản Phẩm : ".$rows;
            ?>
        </div>
        <div class="danhsach">
            <table border="1">
                <tr>
                    <th style="width:70px;">STT</th>
                    <th style="width:320px;">Mã Hàng Hóa</th> 
                    <th style="width:400px;">Số Lượng</th> 
                    <th style="width:250px;">Thời gian</th> 
                    <th style="width:250px;">Số Điện Thoại</th> 
                    <th style="width:200px;">Địa Chỉ</th>
                    <th style="width:100px;">Xóa</th>
                </tr>
                <?php
    $product = $list_user->show_productsz();
    if($product){
        while($row = $product->fetch_assoc()){
        
    ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['id_products'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['time'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['place'];?></td>
                    <td style="background-color:red;"> <a onclick="return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?')" href="indexcart.php?delid=<?php echo $row['id'];?>">Xóa</a><i class="fa-solid fa-trash-can"></i><td>
                </tr>
                <?php
            }
        }
    ?>
            </table>
        </div>
    </main>
    </div>

            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>