<body>
<?php
   
    ?>
    <main>
        <div class="wrapper">
        <div class="danhsach1">
            <div class="grid-9">
            <div>
            <form action="indexproduct.php" method="post">
            <label for="">Danh Sách Sản Phẩm</label>
            <select name="ds[]" id="">
            <?php
    $users = $list_user->show_product();
    if($users){
        while($row = $users->fetch_assoc()){
        
    ?>
               <option value="<?=$row['id'];?>"><?=$row['id'];?></option>
                <?php
            }
        }
    ?>
            </select>
            <button type="submit" name="okk">Hiển Thị</button>
            </form>
            <table class="table table-bordered">
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
                    $query = "select * from products where id like '%$i%'";
       
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
                            echo "<th style='width:70px;'>ID</th>";
                            echo "<th style='width:320px;'>Tên Sản Phẩm</th>";
                            echo "<th style='width:400px;'>Mô Tả Sản Phẩm</th>";
                            echo "<th style='width:250px;'>Giá</th>";
                            echo "<th style='width:250px;'>Số Lượng</th>";
                            echo "<th style='width:200px;'>Ảnh</th>";
                            echo "<th style='width:200px;'>Trạng Thái</th>";
                            echo "<th style='width:200px;'>số Lượt xem</th>";
                            echo "<th style='width:200px;'>Danh Mục</th>";
                            echo "<th style='width:100px;'>Sửa</th>";
                            echo "<th style='width:100px;'>Xóa</th>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['productName']}</td>";
                        echo "<td>{$row['product_desc']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td>{$row['quantity']}</td>";
                        echo "<td> <img width='100px' src='../public/layout/upload/{$row['image']}' alt=''></td>";
                        echo "<td>{$row['status']}</td>";
                        echo "<td>{$row['soluotxem']}</td>";
                        echo "<td>{$row['id_cate']}</td>";
                        echo "<td style='background-color:blue; '><a class='btn btn-primary'  style='color: wheat;' href='adminproductedit.php?idEdit={$row['id']}'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                        echo "<td style='background-color:red;'> <a class='btn btn-danger' onclick='return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?')' href='indexproduct.php?delid={$row['id']}'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
                    echo '</tr>';
                        }
                }
                    } 
    ?>
            </table>
        </div>
        <?php
            $con = mysqli_connect("localhost","root","","luanntph25463");
            $result =mysqli_query($con,"SELECT id
            FROM products
            WHERE id > 0;");
            $rows = mysqli_num_rows($result);
            echo "<h1>Tổng Số Sản Phẩm : $rows</h1> ";
            ?>
        </div>
        </div>
        <div >
            <form class="searchs"  style="width: 550px;float: right;" action="indexproduct.php" method="post">
                <input type="text" class="form-control" placeholder="nhập mục cần tìm kiếm" name="search" />
                <input type="submit"  class="form-control" style="padding-right: 15px;" name="ok" value="search" />
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
                $query = "select * from products where productName like '%$search%'";
 
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
                        echo "<th style='width:320px;'>Tên Sản Phẩm</th>";
                        echo "<th style='width:400px;'>Mô Tả Sản Phẩm</th>";
                        echo "<th style='width:250px;'>Giá</th>";
                        echo "<th style='width:250px;'>Số Lượng</th>";
                        echo "<th style='width:200px;'>Ảnh</th>";
                        echo "<th style='width:200px;'>Trạng Thái</th>";
                        echo "<th style='width:200px;'>số Lượt xem</th>";
                        echo "<th style='width:200px;'>Danh Mục</th>";
                        echo "<th style='width:100px;'>Sửa</th>";
                        echo "<th style='width:100px;'>Xóa</th>";
                    echo '</tr>';
                    echo '<tr>';
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['productName']}</td>";
                    echo "<td>{$row['product_desc']}</td>";
                    echo "<td>{$row['price']}</td>";
                    echo "<td>{$row['quantity']}</td>";
                    echo "<td> <img width='100px' src='../public/layout/upload/{$row['image']}' alt=''></td>";                    echo "<td>{$row['status']}</td>";
                    echo "<td>{$row['soluotxem']}</td>";
                    echo "<td>{$row['id_cate']}</td>";
                    echo "<td style='background-color:blue; '><a class='btn btn-primary'  style='color: wheat;' href='adminproductedit.php?idEdit={$row['id']}'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                    echo "<td style='background-color:red;'> <a class='btn btn-danger' onclick='return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?')' href='indexproduct.php?delid={$row['id']}'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
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
            <div class="searchs" style="width: 550px;float: left;">
            <form action="indexproduct.php" method="post">
                <input type="text"  class="form-control" placeholder="nhập mục cần tìm kiếm" name="searchs" />
                <input type="submit"  class="form-control" name="okks" value="searchs" />
            </form>
            </div>
        </div>
        </div>
        <table class="table table-bordered">
        <?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['okks'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $searchs = addslashes($_POST['searchs']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($searchs)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from products where id_cate = '$searchs'";
 
                // Kết nối sql
                $con = mysqli_connect("localhost","root","","luanntph25463");
 
                // Thực thi câu truy vấn
                $sql = mysqli_query($con,$query);
                mysqli_set_charset($con,'UTF8');

 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $searchs != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <b>$searchs</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<tr>';
                            echo "<th style='width:70px;'>ID</th>";
                            echo "<th style='width:320px;'>Tên Sản Phẩm</th>";
                            echo "<th style='width:400px;'>Mô Tả Sản Phẩm</th>";
                            echo "<th style='width:250px;'>Giá</th>";
                            echo "<th style='width:250px;'>Số Lượng</th>";
                            echo "<th style='width:200px;'>Ảnh</th>";
                            echo "<th style='width:200px;'>Trạng Thái</th>";
                            echo "<th style='width:200px;'>số Lượt xem</th>";
                            echo "<th style='width:200px;'>Danh Mục</th>";
                            echo "<th style='width:100px;'>Sửa</th>";
                            echo "<th style='width:100px;'>Xóa</th>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['productName']}</td>";
                        echo "<td>{$row['product_desc']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td>{$row['quantity']}</td>";
                        echo "<td> <img width='100px' src='../public/layout/upload/{$row['image']}' alt=''></td>";                        echo "<td>{$row['status']}</td>";
                        echo "<td>{$row['soluotxem']}</td>";
                        echo "<td>{$row['id_cate']}</td>";
                        echo "<td style='background-color:blue; '><a class='btn btn-primary'  style='color: wheat;' href='adminproductedit.php?idEdit={$row['id']}'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                        echo "<td style='background-color:red;'> <a class='btn btn-danger' onclick='return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?')' href='indexproduct.php?delid={$row['id']}'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
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
            <form action="" method="post">
        <a style="color:red; background-color: aquamarine;padding: 5px 20px 5px 20px;margin-bottom: 50px;" href="adminproductadd.php">Thêm Sản Phẩm</a>
            <table border="1" class="table table-bordered table-striped table-condensed table-responsive table-hover">
                <tr>
                    <th></th>
                    <th style="width:70px;">ID</th>
                    <th style="width:320px;">Tên Sản Phẩm</th> 
                    <th style="width:400px;">Mô Tả Sản Phẩm</th> 
                    <th style="width:250px;">Giá</th> 
                    <th style="width:250px;">Số Lượng</th> 
                    <th style="width:200px;">Ảnh</th>
                    <th style="width:200px;">Trạng Thái</th>
                    <th style="width:200px;">Số Lượt Xem</th>
                    <th style="width:200px;">Danh Mục</th>
                    <th style="width:200px;">Loại Hàng</th>
                    <th style="width:100px;">Sửa</th>
                    <th style="width:100px;">Xóa</th>
       
                </tr>
                <?php

//database connection

$conn = mysqli_connect('localhost', 'root', "",'luanntph25463');

if (! $conn) {

die("Connection failed" . mysqli_connect_error());

}

else {

mysqli_select_db($conn,'luanntph25463');

}

//define total number of results you want per page

$results_per_page = 2;

//find the total number of results stored in the database

$query = "select * from products ";

$result = mysqli_query($conn, $query);
mysqli_set_charset($conn,'UTF8');

$number_of_result = mysqli_num_rows($result);

//determine the total number of pages available

$number_of_page = ceil ($number_of_result / $results_per_page);

//determine which page number visitor is currently on

if (!isset ($_GET['page']) ) {

$page = 1;

} else {

$page = $_GET['page'];

}

//determine the sql LIMIT starting number for the results on the displaying page

$page_first_result = ($page-1) * $results_per_page;

//retrieve the selected results from database

$query = "SELECT * FROM products LIMIT " . $page_first_result . ',' . $results_per_page;

$result = mysqli_query($conn, $query);

//display the retrieved result on the webpage

while ($row = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo "<td><input type='checkbox' name='checkbox[]' value='{$row['id']}'></td>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['productName']}</td>";
                        echo "<td>{$row['product_desc']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td>{$row['quantity']}</td>";
                        echo "<td> <img width='100px' src='../public/layout/upload/{$row['image']}' alt=''></td>";                        echo "<td>{$row['status']}</td>";
                        echo "<td>{$row['soluotxem']}</td>";
                        echo "<td>{$row['id_cate']}</td>";
                        if($row['loaihangdb'] == 1){
                            echo "<td>Hàng Đặc biệt</td>";
                        } else{
                            echo "<td>Hàng Bình Thường</td>";

                        }
                        echo "<td style='background-color:blue; '><a class='btn btn-primary'  style='color: wheat;' href='adminproductedit.php?idEdit={$row['id']}'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                        echo "<td style='background-color:red;'> <a class='btn btn-danger' onclick='return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?')' href='indexproduct.php?delid={$row['id']}'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
                    echo '</tr>';

}
echo " <input class='btn btn-danger'  type='submit' name='dell_all' value='Xóa Các  Mục Đã Chọn'></input>";
echo "</form>";

//display the link of the pages in URL
 echo "</br>";
 echo "</br>";
 echo "Trang Sản Phẩm";
 echo "<ul class ='pagination'>";
 echo "<li>
    <a href='#' class='nutg'>
<i class='fa-solid fa-arrow-left-long'></i>
    </a>
 </li>";
for($page = 1; $page<= $number_of_page; $page++) {

echo "<li><a class='nutg' href=indexproduct.php?page=$page>$page</a></li> </br> ";

}
echo "<li>
<a href='#' class='nutg'>
<i class='fa-solid fa-arrow-right-long'></i>

</a>
</li>
</ul>";

?>
            </table>
        </div>
    </div>
    </main>
            </div>
        </div>

    </div>
</body>