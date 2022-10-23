<body>
    <main>
        <div class="wrapper">
            <div class="danhsach1">
                <div class="grid-9">
                <form action="indexcate.php" method="post">
            <label for="">Danh Sách Sản Phẩm</label>
            <select name="ds[]" id="">
            <?php
    $users = $list_user->show_cate();
    if($users){
        while($row = $users->fetch_assoc()){
        
    ?>
               <option value="<?=$row['id'];?>"><?=$row['id'];?></option>
                <?php
            }
        }
    ?>
            </select>
            <button type="submit"  class="form-control" name="okk">Hiển Thị</button>
            </form>
            <table class="">
            <?php
            if (isset($_REQUEST['okk'])) 
            {
                $ht = $_POST['ds'];
                $flag = 0;
                foreach($ht as $value){
                $flag = $value;
                }
                $flag = $value;
                for ($i= $flag; $i >0; $i--){ 
                   
                // Gán hàm addslashes để chống sql injection
       
                // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                    // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                    $query = "select * from categories where id like '%$i%'";
       
                    // Kết nối sql
                    $con = mysqli_connect("localhost","root","","luanntph25463");
                    mysqli_set_charset($con,'UTF8');
       
                    // Thực thi câu truy vấn
                    $sql = mysqli_query($con,$query);
       
                    // Đếm số đong trả về trong sql.
                    $num = mysqli_num_rows($sql);
       
                    // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                        // Dùng $num để đếm số dòng trả về.       
                        // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '<tr>';
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['catName']}</td>";
                            echo "<td style='background-color:blue; '><a class='btn btn-primary'  style='color: wheat;' href='indexadmincateedit.php?idEdit=<?php echo {$row['id']}; ?>'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                            echo "<td style='background-color:red;'> <a class='btn btn-danger'  onclick='return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?')' href='indexcate.php?delid=<?php echo {$row['id']};?>'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
                        echo '</tr>';
                        }
                }
                    } 
    ?>
            </table>
                    <?php
                $con = mysqli_connect("localhost","root","","luanntph25463");
                    $result = mysqli_query($con, "SELECT id FROM categories
                    WHERE id > 0;");
                    $rows = mysqli_num_rows($result);
                    echo "<h1>Tổng Số Danh Mục :$rows </h1>";
                    ?>
                </div>
            </div>
            <div class="search">
            <form action="indexcate.php" method="post">
                Search: <input type="text"  class="form-control" placeholder="nhập mục cần tìm kiếm" name="search" />
                <input type="submit" name="ok"  class="form-control" value="search" />
                </form>
            </div>
            <table class="table table-bordered">
        <?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_POST['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from categories where catName like '%$search%'";
                
                // Kết nối sql
                $con = mysqli_connect("localhost","root","","luanntph25463");
mysqli_set_charset($con,'UTF8');
                
                // Thực thi câu truy vấn
                $sql = mysqli_query($con,$query);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<tr>';
                            echo "<th style='width:70px;'>ID</th>";
                            echo "<th style='width:600px;'>Tên Danh Mục</th>";
                            echo "<th style='width:100px;'>Sửa</th>";
                            echo "<th style='width:100px;'>Xóa</th>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['catName']}</td>";
                        echo "<td style='background-color:blue; '><a class='btn btn-primary'  style='color: wheat;' href='indexadmincateedit.php?idEdit=<?php echo {$row['id']}; ?>'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                        echo "<td style='background-color:red;'> <a class='btn btn-danger'  onclick='return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?')' href='indexcate.php?delid=<?php echo {$row['id']};?>'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
                    echo '</tr>';
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }
        ?>  
   </table>
            <div class="danhsach">
                <a style="color:red;" href="indexadmincateadd.php">Thêm Danh Mục</a>
                <table class="table table-bordered">
                    <tr>
                        <th style="width:70px;">ID</th>
                        <th style="width:600px;">Tên Danh Mục</th>
                        <th style="width:300px;">Sửa</th>
                        <th style="width:300px;">xóa</th>
                    </tr>
                    <?php
                    $cate = $list_user->show_cate();
                    if ($cate) {
                        while ($row = $cate->fetch_assoc()) {

                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['catName']; ?></td>
                                <td style="background-color:blue; "><a class='btn btn-primary'  style="color: wheat;" href="indexadmincateedit.php?idEdit=<?php echo $row['id']; ?>">Sửa</a><i class="fa-solid fa-screwdriver-wrench"></i></td>
                                <td style="background-color:red;"> <a class='btn btn-danger'  onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không?')" href="indexcate.php?delid=<?php echo $row['id']; ?>">Xóa</a><i class="fa-solid fa-trash-can"></i>
                                <td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </main>
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