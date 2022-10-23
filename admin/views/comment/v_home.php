<?php
$host = "localhost";
// tên cơ sở dữ liệu
$db_name = "luanntph25463";
// thông tin tài khoản
$username = "root";
$password = "";
try{
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "lỗi kết nối dữ liệu: " .$e->getMessage();
    throw $e;
}
    // sql select
    $sql = "SELECT * FROM products";
    // chuẩn bị 
    $stmt = $conn->prepare($sql);
    // Thực thi
    $stmt -> execute();
    // Lấy dữ liệu (lấy 1 bản ghi để sửa)
    $userss = $stmt->fetchAll(PDO::FETCH_ASSOC);

            

    ?>
    <main>
        <div class="wrapper">
            <div class="danhsach1">
                <div class="grid-9">
                    <?php
                $con = mysqli_connect("localhost","root","","luanntph25463");
                    $result = mysqli_query($con, "SELECT id FROM binhluan
                    WHERE id > 0;");
                    $rows = mysqli_num_rows($result);
                    echo "<h1>Tổng Số Bình Luận :$rows </h1>";
                    ?>
                </div>
            </div>
            <div class="search">
            <form action="indexcomment.php" method="post">
                Search: <input  class="form-control" type="text" placeholder="nhập mục cần tìm kiếm" name="search" />
                <input  class="form-control" type="submit" name="ok" value="search" />
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
                $query = "select * from binhluan bl join products pd where pd.productName like '%$search%'";
                
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
                            echo "<th style=''>Tên bình luận</th>";
                            echo "<th style='width:100px;'>sản phẩm được bình luận</th>";
                            echo "<th style='width:100px;'>Xóa</th>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['noidung']}</td>";
                        echo "<td>{$row['id_product']}</td>";
                        echo "<td style='background-color:red;'> <a class='btn btn-danger'  onclick='return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?')' href='indexcomment.php?delid=<?php echo {$row['id']};?>'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
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
                <table class="table table-bordered">
                    <tr>
                    <th style="width:70px;">Mã Sản Phẩm</th>
                        <th style="width:70px;">Tên Sản Phẩm</th>
                        <th style="width:600px;">Tổng Số Bình Luận</th>
                        <th style="width:600px;">ngày Bình Luận Cũ Nhất</th>
                        <th style="width:600px;">ngày Bình Luận MỚi Nhất</th>
                        <th style="width:300px;"></th>
                    </tr>
                    <?php
                    $list_user = new comment_class();
                    $cmt = $list_user->show_cmmt();
                    if ($cmt) {
                        while ($row = $cmt->fetch_assoc()) {

                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?>
                                <td><?php echo $row['productName']; ?>
                                <td><?php echo $row['quantity']; ?>
                                <td><?php echo $row['min(create_at)']; ?></td>
                                <td><?php echo $row['max(create_at)']; ?></td>
                                <td style="background-color:red;"> <a class='btn btn-danger'  href="indexcment.php?delsssid=<?php echo $row['id']; ?>">chi Tiết</a><i class="fa-solid fa-trash-can"></i>
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