<main>
        <div class="wrapper">
        <div class="danhsach1">
            <div class="grid-9">
            <div>
            <form action="indexadmin.php" method="post">
            <label for="">Danh Sách Người Dùng</label>
            <select name="ds[]" id="">
            <?php


    $users = $list_user->show_users();
    if($users){
        while($row = $users->fetch_assoc()){
        
    ?>
               <option value="<?=$row['Id'];?>" class="form-control"><?=$row['Id'];?></option>
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
                    $query = "select * from users where Id like '%$i%'";
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
                            echo "<th style='width:350px;'>Tên Người Dùng</th> ";
                            echo "<th style='width:350px;'>Email</th> ";
                            echo "<th style='width:350px;'>Mật Khẩu</th> ";
                            echo "<th style='width:350px;'>Ảnh Đại Diện</th> ";
                            echo "<th style='width:350px;'>Địa Chỉ</th> ";
                            echo "<th style='width:350px;'>Ngày Tạo</th> ";
                            echo "<th style='width:100px;'>Sửa</th>";
                            echo "<th style='width:100px;'>Xóa</th>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>{$row['Id']}</td>";
                        echo "<td>{$row['adminName']}</td>";
                        echo "<td>{$row['adminEmail']}</td>";
                        echo "<td>{$row['adminPass']}</td>";
                        echo "<td><img width='100px' src='../public/layout/uploads/{$row['avarta']}' alt=''></td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['created_at']}</td>";
                        echo "<td style='background-color:blue; '><a  class='btn btn-primary'  style='color: wheat;' href='adminuseredit.php?idEdit=<?php echo {$row['Id']}; ?>'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                        echo "<td style='background-color:red;'> <a  class='btn btn-danger'  onclick='return confirm('Bạn Có Muốn Xóa Người Dùng Này Không?')' href='indexadmin.php?delid=<?php echo {$row['Id']};?>'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
                    echo '</tr>';
                        }
                }
                    } 
    ?>
            </table>
        </div>

            <div class="search">
                <form action="indexadmin.php" method="post">
                <input type="text" class="form-control" placeholder="nhập mục cần tìm kiếm" name="search" />
                <input type="submit" name="ok" class="form-control" value="search" />
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
                $query = "select * from users where adminName like '%$search%'";
 
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
                            echo "<th style='width:350px;'>Tên Người Dùng</th> ";
                            echo "<th style='width:350px;'>Email</th> ";
                            echo "<th style='width:350px;'>Mật Khẩu</th> ";
                            echo "<th style='width:350px;'>Ảnh Đại Diện</th> ";
                            echo "<th style='width:350px;'>Địa Chỉ</th> ";
                            echo "<th style='width:350px;'>Ngày Tạo</th> ";
                            echo "<th style='width:100px;'>Sửa</th>";
                            echo "<th style='width:100px;'>Xóa</th>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>{$row['Id']}</td>";
                        echo "<td>{$row['adminName']}</td>";
                        echo "<td>{$row['adminEmail']}</td>";
                        echo "<td>{$row['adminPass']}</td>";
                        echo "<td><img width='100px' src='../public/layout/uploads/{$row['avarta']}' alt=''></td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['created_at']}</td>";
                        echo "<td style='background-color:blue; '><a  class='btn btn-primary'  style='color: wheat;' href='adminuseredit.php?idEdit=<?php echo {$row['Id']}; ?>'>Sửa</a><i class='fa-solid fa-screwdriver-wrench'></i></td>";
                        echo "<td style='background-color:red;'> <a  class='btn btn-danger'  onclick='return confirm('Bạn Có Muốn Xóa Người Dùng Này Không?')' href='indexadmin.php?delid=<?php echo {$row['Id']};?>'>Xóa</a><i class='fa-solid fa-trash-can'></i><td>";
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
        <form action="" method="post">
   </table>
        <div class="danhsach">
        <a style="color:red;" href="adminadd.php">Thêm Người Dùng</a><i class="fa-solid fa-plus"></i>
            <table class="table table-bordered">
                <tr>
                    <th></th>
                    <th style="width:70px;">ID</th>
                    <th style="width:350px;">Tên Người Dùng</th> 
                    <th style="width:350px;">Email</th> 
                    <th style="width:200px;">Mật Khẩu</th>
					<th style="width:200px;">Ảnh Đại Diện</th>
					<th style="width:200px;">Địa Chỉ</th>
                    <th style="width:200px;">Thời Gian Tạo</th>
                    <th style="width:100px;">Sửa</th>
                    <th style="width:100px;">Xóa</th>
                </tr>
                <?php
                $list_user = new users_class();
    $users = $list_user->show_users();
    if($users){
        while($row = $users->fetch_assoc()){
        
    ?>
                <tr>
                <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['Id'];?>"></td>
                    <td><?php echo $row['Id'];?></td>
                    <td><?php echo $row['adminName'];?></td>
                    <td><?php echo $row['adminEmail'];?></td>
                    <td><?php echo $row['adminPass'];?></td>
					 <td><img width="100px" src="../public/layout/uploads/<?php echo $row['avarta'];?>" alt=""></td>
					  <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['created_at'];?></td>
                    <td style="background-color:blue; "><a class='btn btn-primary' style="color: wheat;" href="adminuseredit.php?idEdit=<?php echo $row['Id']; ?>">Sửa</a><i class="fa-solid fa-screwdriver-wrench"></i></td>
                    <td style="background-color:red;"> <a class='btn btn-danger' onclick="return confirm('Bạn Có Muốn Xóa Người Dùng Này Không?')" href="indexadmin.php?delid=<?php echo $row['Id'];?>">Xóa</a><i class="fa-solid fa-trash-can"></i><td>
                </tr>
                <?php
            }
        }
        
    ?>
                                <input class='btn btn-danger'  type="submit" name="dell_all" value="Xóa Các  Mục Đã Chọn"></input>

            </table>
            </form> 
        </div>
    </div>
    </main>