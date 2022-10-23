<?php include_once("database.php"); ?>
<?php
class users_class
{
    public $db;
    public function __construct()
    {
        // tạo đối tượng db
        $this->db = new database();
    }
    public function login($adminEmail, $adminPass)
    {
        $query = "select * from users where adminEmail = '$adminEmail' and adminPass = '$adminPass' limit 1";
        $result = $this->db->select($query);
        if ($result) {
            $row = $result->fetch_assoc();

            // thiet lap session
            $_SESSION['isLogin'] = true;
            $_SESSION['adminName'] = $row['adminName'];
            $_SESSION['hinhanh'] = $row['avarta'];
            $_SESSION['adminEmail'] = $row['adminEmail'];
            $_SESSION['id'] = $row['id'];
            $flag = $row['adminId'];
            header("Location: index.php");
        } else return "Sai email hoặc mật khẩu";
    }
    public function loginuservip($adminEmail,$adminPass)
    {
        $query = "select * from khachhang where taikhoan = '$adminEmail' and matkhau = '$adminPass' and trangthai = 1 and vaitro = 0 limit 1";
        $result = $this->db->select($query);
        if ($result) {
            $row = $result->fetch_assoc();

            // thiet lap session
            $_SESSION['isLogin'] = true;
            $_SESSION['adminName'] = $row['hoten'];
            $_SESSION['hinhanh'] = $row['hinhanh'];
            $_SESSION['adminEmail'] = $row['taikhoan'];
            $_SESSION['matkhau'] = $row['matkhau'];
            $_SESSION['id'] = $row['id'];
            $flag = $row['adminId'];
            header("Location: index.php");
        } else return "Sai email hoặc mật khẩu";
    }
     // quen mat khau
    public function loginforgot($adminEmail)
    {
        $query = "select * from khachhang where taikhoan = '$adminEmail' limit 1";
        $result = $this->db->select($query);
        if ($result) {
            header("Location: forgot.php?id=$adminEmail");
        } else return "Sai email hoặc mật khẩu";
    }
    // hien thi danh sach nguoi dung
    public function show_users()
    {
        $query = "select * from users order by Id desc";
        $result = $this->db->select($query);
        return $result;
    }
      // sửa hinh anh
      public function update_hinhanh($name, $id)
      {
          $query = "Update khachhang set hinhanh='$name' where id='$id'";
          $result = $this->db->execute(($query));
          if ($result) {
              return "Đã Sửa Danh Mục Thành Công";
          } else
              return "Sửa Danh Mục Không Thành Công";
      }
    // hien thi theo luot yeu thich
    public function show_usersp()
    {
        $query = "select * from products order by soLuotyeuThich desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_userskh()
    {
        $query = "select * from khachhang order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    // hien thi danh sach nguoi dung
    public function show_usersxz($id)
    {
        $query = "SELECT * from khachhang where Id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
        // hien thi nguoidung khi quen mat khau
        public function show_userforgot()
        {
            $query = "SELECT * from khachhang";
            $result = $this->db->select($query);
            return $result;
        }
        // hien thi nguoidung khi quen mat khau
        public function show_userforgot2($id)
        {
            $query = "SELECT * from khachhang where taikhoan =  '$id'  ";
            $result = $this->db->select($query);
            return $result;
        }
    public function show_userss($id)
    {
        $query = "select * from users order by '$id' desc";
        $result = $this->db->select($query);
        return $result;
    }
    // xoa nguoi dung
    public function del_user($id)
    {
        $query = "Delete from users where Id = '$id'";
        $result = $this->db->execute(($query));
        if ($result)
            return "Đã Xóa Người Dùng Thành Công";
        else
            return "Xóa Người Dùng Thành Công";
    }
    // xóa khách hàng
    public function del_userkh($id)
    {
        $query = "Delete from khachhang where id = '$id'";
        $result = $this->db->execute(($query));
        if ($result)
            return "Đã Xóa Người Dùng Thành Công";
        else
            return "Xóa Người Dùng Thành Công";
    }
    // sửa người dùng tên
    public function update_user($name, $id)
    {
        $query = "Update users set adminName='$name' where id='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // sửa vai trò nhân viên
    public function update_vaitro($name, $id)
    {
        $query = "Update khachhang set vaitro='$name' where id='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // sửa tên nhân viên
    public function update_userkh($name, $id)
    {
        $query = "Update khachhang set hoten='$name' where id='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // sửa Ảnh người dùng
    public function update_anh($email, $id)
    {
        $query = "Update users set avarta='$email' where id='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    public function update_useremail($email, $id)
    {
        $query = "Update users set adminEmail='$email' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // sửa nhân viên email
    public function update_useremailkh($email, $id)
    {
        $query = "Update khachhang set taikhoan='$email' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // sửa địa chỉ
    public function update_adress($address, $id)
    {
        $query = "Update users set address='$address' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // sửa nhan vien detaill
    public function update_adresskh($address, $id)
    {
        $query = "Update khachhang set detaill='$address' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
       // sửa nhan vien detaill
       public function updatemk($address, $id)
       {
           $query = "Update khachhang set matkhau = $address where id = '$id' ";
           $result = $this->db->execute(($query));
           if ($result) {
               return "Đã Sửa Người Dùng Thành Công";
           } else
               return "Sửa Người Dùng Không Thành Công";
       }
    // sửa người dùng pass word
    public function update_Pass($pass, $id)
    {
        $query = "Update users set adminPass='$pass' where id='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // sửa nhanvien pass word
    public function update_Passkh($pass, $id)
    {
        $query = "Update khachhang set matkhau='$pass' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // sửa trang thai
    public function update_trangthai($name, $id)
    {
        $query = "Update khachhang set trangthai='$name' where id='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Danh Mục Thành Công";
        } else
            return "Sửa Danh Mục Không Thành Công";
    }


    // thêm người dùng
    public function insert_user($adminName, $adminEmail, $adminPass, $avarta, $address)
    {
        $query = "Insert into users(adminName,adminEmail,adminPass,avarta,address) values('$adminName','$adminEmail','$adminPass','$avarta','$address')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // thêm khachhang
    public function insert_userkh($hoten, $taikhoan, $matkhau, $hinhanh, $detail, $vaitro, $kichhoat)
    {
        $query = "Insert into khachhang(hoten,taikhoan,matkhau,hinhanh,detail,vaitro,trangthai) values('$hoten','$taikhoan','$matkhau','$hinhanh','$detail','$vaitro','$kichhoat')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // thêm khachhang
    public function insert_userregister($taikhoan,$matkhau)
    {
        $query = "Insert into khachhang(taikhoan,matkhau) values('$taikhoan','$matkhau')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
}
?>