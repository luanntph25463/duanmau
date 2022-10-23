<body>
 <main>
            <div class="wrapper">
            <div class="danhsach1">
                <div class="grid-9">
                <div>
                <form action="indexnhanvien.php" method="post">
                <label for="">Danh Sách Người Dùng</label>
                <select name="ds[]" id="">
                <?php
        $list_user = new users_class();
        $users = $list_user->show_userskh();
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
                <table class="table table-bordered finddm">
                <?php
                if (isset($_REQUEST['okk'])) 
                {
                    $ht = $_POST['ds'];
                    $flag = 0;
                    foreach($ht as $value){
                    $flag = $value;
                    }
                    $flag = $value;
                    for ($i= $flag; $i >0; $i--) { 
                    
                    // Gán hàm addslashes để chống sql injection
        
                    // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                        // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                        $query = "select * from khachhang where id like '%$i%'";
        
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
                                echo '<td></td>';
                                echo "<th style='width:70px;'>ID</th>";
                                echo "<th style='width:350px;'>Tên Người Dùng</th> ";
                                echo "<th style='width:350px;'>tài Khoản</th> ";
                                echo "<th style='width:350px;'>Mật Khẩu</th> ";
                                echo "<th style='width:350px;'>Ảnh Đại Diện</th> ";
                                echo "<th style='width:350px;'>Địa Chỉ</th> ";
                                echo "<th style='width:350px;'>Chi Tiết</th> ";
                                echo "					<th style='width:200px;'>Trạng Thái</th>
                                <th style='width:200px;'>Vai Trò</th>";
                                echo "<th style='width:350px;'>Ngày Tạo</th> ";
                                echo "<th style='width:100px;'>Sửa</th>";
                                echo "<th style='width:100px;'>Xóa</th>";
                            echo '</td>';
                            echo '<tr>';
                            echo "<td><input type='checkbox' name='ma_kh[]' value='<?php echo {$row['id']};?>'></td>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['hoten']}</td>";
                            echo "<td>{$row['taikhoan']}</td>";
                            echo "<td>{$row['matkhau']}</td>";
                            echo "<td><img width='100px' src='../public/layout/uploads/{$row['hinhanh']}' alt=''></td>";
                            echo "<td>{$row['detail']}</td>";
                            echo "					  <td><?php if( {$row['trangthai']} == 0){
                                echo 'Chưa Kích Hoat';
                            }else if( {$row['trangthai']} == 1){
                                echo 'Đã Kích Hoat';
                            };?></td>
                                        <td><?php if({$row['vaitro']} == 0){
                                echo 'Nhân Viên';
                            }else if( {$row['vaitro']} == 1){
                                echo 'Khách Hàng';
                            };?></td>";
                            echo "<td style='background-color:blue; '><a  class='btn btn-primary'  style='color: wheat;' href='indexnhanvienadd.php?idEdit=<?php echo {$row['id']}; ?>'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                            echo "<td style='background-color:red;'> <a  class='btn btn-danger'  onclick='return confirm('Bạn Có Muốn Xóa Người Dùng Này Không?')' href='indexnhanvien.php?delid=<?php echo {$row['id']};?>'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
                            echo '</tr>';
                            }
                    }
                        } 
        ?>
                </table>
            </div>

                <div class="search">
                    <form action="indexnhanvien.php" method="post">
                    Search: <input  class="form-control" type="text" placeholder="nhập mục cần tìm kiếm" name="search" />
                    <input type="submit"  class="form-control" name="ok" value="search" />
                    </form>
                </div> 
            </div>
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
                    $query = "select * from khachhang where id like '%$search%'";
    
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
                            echo "<td></td>";
                            echo "<th style='width:70px;'>ID</th>";
                            echo "<th style='width:350px;'>Tên Người Dùng</th> ";
                            echo "<th style='width:350px;'>tài Khoản</th> ";
                            echo "<th style='width:350px;'>Mật Khẩu</th> ";
                            echo "<th style='width:350px;'>Ảnh Đại Diện</th> ";
                            echo "<th style='width:350px;'>Địa Chỉ</th> ";
                            echo "<th style='width:350px;'>Chi Tiết</th> ";
                            echo "					<th style='width:200px;'>Trạng Thái</th>
                            <th style='width:200px;'>Vai Trò</th>";
                            echo "<th style='width:350px;'>Ngày Tạo</th> ";
                            echo "<th style='width:100px;'>Sửa</th>";
                            echo "<th style='width:100px;'>Xóa</th>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td><input type='checkbox' name='ma_kh[]' value='<?php echo $row{['id']};?>'></td>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['hoten']}</td>";
                        echo "<td>{$row['taikhoan']}</td>";
                        echo "<td>{$row['matkhau']}</td>";
                        echo "<td><img width='100px' src='../public/layout/uploads/{$row['hinhanh']}' alt=''></td>";
                        echo "<td>{$row['detail']}</td>";
                        echo "					  <td><?php if($row{['trangthai']} == 0){
                            echo 'Chưa Kích Hoat';
                        }else if($row{['trangthai']} == 1){
                            echo 'Đã Kích Hoat';
                        };?></td>
                                <td><?php if($row{['vaitro']} == 0){
                            echo 'Nhân Viên';
                        }else if($row{['vaitro'} == 1){
                            echo 'Khách Hàng';
                        };?></td>";
                        echo "<td>{$row['created_at']}</td>";
                        echo "<td style='background-color:blue; '><a  class='btn btn-primary'  style='color: wheat;' href='indexnhanvienadd.php?idEdit=<?php echo {$row['Id']}; ?>'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                        echo "<td style='background-color:red;'> <a  class='btn btn-danger'  onclick='return confirm('Bạn Có Muốn Xóa Người Dùng Này Không?')' href='indexnhanvien.php?delid=<?php echo {$row['Id']};?>'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
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
    <form action="" method="post">
            <div class="danhsach">
            <a style="color:red;" href="indexnhanvienadd.php">Thêm Người Dùng</a><i class="fa-solid fa-plus"></i>
                <table class="table table-bordered">
                    <tr>
                        <td></td>
                        <th style="width:70px;">ID</th>
                        <th style="width:350px;">Tên Người Dùng</th> 
                        <th style="width:350px;">Tài Khoản</th> 
                        <th style="width:200px;">Mật Khẩu</th>
                        <th style="width:200px;">Ảnh Đại Diện</th>
                        <th style="width:200px;">Chi Tiết</th>
                        <th style="width:200px;">Trạng Thái</th>
                        <th style="width:200px;">Vai Trò</th>
                        <th style="width:200px;">Thời Gian Tạo</th>
                        <th style="width:100px;">Sửa</th>
                        <th style="width:100px;">Xóa</th>
                    </tr>
                    <?php
        $users = $list_user->show_userskh();
        if($users){
            while($row = $users->fetch_assoc()){
            
        ?>
        
                    <tr>
                        <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['id'];?>"></td>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['hoten'];?></td>
                        <td><?php echo $row['taikhoan'];?></td>
                        <td><?php echo $row['matkhau'];?></td>
                        <td><img width="100px" src="../public/layout/uploads/<?php echo $row['hinhanh'];?>" alt=""></td>
                        <td><?php echo $row['detail']?></td>
                        <td><?php if($row['trangthai'] == 0){
                            echo "Chưa Kích Hoat";
                        }else if($row['trangthai'] == 1){
                            echo "Đã Kích Hoat";
                        };?></td>
                                <td><?php if($row['vaitro'] == 0){
                            echo "Nhân Viên";
                        }else if($row['vaitro'] == 1){
                            echo "Khách Hàng";
                        };?></td>
                        <td><?php echo $row['createuser_at'];?></td>
                        <td style="background-color:blue; "><a class='btn btn-primary' style="color: wheat;" href="indexnhanvienedit.php?idEdit=<?php echo $row['id']; ?>">Sửa</a><i class="fa-solid fa-screwdriver-wrench"></i></td>
                        <td style="background-color:red;"> <a class='btn btn-danger' onclick="return confirm('Bạn Có Muốn Xóa Người Dùng Này Không?')" href="indexnhanvien.php?delid=<?php echo $row['id'];?>">Xóa</a><i class="fa-solid fa-trash-can"></i><td>
                        
                    </tr>
                    <?php
                }
            }
        ?>
                            <input class='btn btn-danger'  type="submit" name="dell_all" value="Xóa Các  Mục Đã Chọn"></input>
                </table>
            </div>
            </form>

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