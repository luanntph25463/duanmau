<?php include_once("database.php"); ?>
<?php
class product_class
{
    public $db;
    public function __construct()
    {
        // tạo đối tượng db
        $this->db = new database();
    }
    // dang nhap
    public function login($adminEmail, $adminPass)
    {
        $query = "select * from users where adminEmail = '$adminEmail' and adminPass = '$adminPass' limit 1";
        $result = $this->db->select($query);
        if ($result) {
            $row = $result->fetch_assoc();

            // thiet lap session
            $_SESSION['isLogin'] = true;
            $_SESSION['adminName'] = $row['adminName'];
            $_SESSION['avarta'] = $row['avarta'];
            $_SESSION['adminEmail'] = $row['adminEmail'];
            $flag = $row['adminId'];
            header("Location: indexadmin.php");
        } else return "Sai email hoặc mật khẩu";
    }
    public function show_productc($id)
    {
        $query = "SELECT * from products where id_cate = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function loginuser($adminEmail,$adminPass)
    {
        $query = "select * from khachhang where taikhoan = '$adminEmail' and matkhau = '$adminPass' limit 1";
        $result = $this->db->select($query);
        if ($result) {
            $row = $result->fetch_assoc();

            // thiet lap session
            $_SESSION['isLogin'] = true;
            $_SESSION['adminName'] = $row['hoten'];
            $_SESSION['avarta'] = $row['avarta'];
            $_SESSION['adminEmail'] = $row['taikhoan'];
            $_SESSION['matkhau'] = $row['matkhau'];
            $_SESSION['hinhanh'] = $row['hinhanh'];
            $_SESSION['vaitro'] = $row['vaitro'];
            $_SESSION['trangthai'] = $row['trangthai'];
            $_SESSION['hinhanh'] = $row['hinhanh'];
            $_SESSION['id'] = $row['id'];
            header("Location: index.php");
        } else return "Sai email hoặc mật khẩu";
    }
    // hien thi danh sach nguoi dung
    public function show_users()
    {
        $query = "select * from users order by Id desc";
        $result = $this->db->select($query);
        return $result;
    }
    // hien thi theo luot yeu thich
    public function show_productlike()
    {
        $query = "select * from products order by soLuotyeuThich desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_comment()
    {
        $query = "select * from binhluan order by Id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_comments($id)
    {
        $query = "select * from binhluan  where id_product = '$id' order by create_at desc ";
        $result = $this->db->select($query);
        return $result;
    }
    //
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
    public function show_userss($id)
    {
        $query = "select * from users order by '$id' desc";
        $result = $this->db->select($query);
        return $result;
    }
    // hien thi danh sach sản phẩm
    public function show_product()
    {
        $query = "select * from products order by id desc;";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_productgh($id)
    {
        $query = "select * from products where id = '$id';";
        $result = $this->db->select($query);
        return $result;
    }
    // hien thi danh sach sản phẩm
    public function show_productv()
    {
        $query = "select * from products order by id desc LIMIT 3;";
        $result = $this->db->select($query);
        return $result;
    }
    // hien thi Xác Nhận sản phẩm
    public function show_productsz()
    {
        $query = "select * from giohang order by id_products desc";
        $result = $this->db->select($query);
        return $result;
    }
    // hien thi chi tiết sản phẩm
    public function show_producta($id)
    {
        $query = "SELECT * from products where id = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_productlq($id)
    {
        $query = "SELECT * from products where id_cate = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    // hiển thị sản phẩm dựa vào tài khoản
    public function show_products($id)
    {
        $query = "select * from product_detail where nguoimua like '%$id%' order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    // hiển thị sản phẩm đặc biệt
    public function show_productdb()
    {
        $query = "select * from products where loaihangdb = 1 order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
        // hiển thị sản phẩm đặc biệt listproduct
        public function show_productdb1($id)
        {
            $query = "select * from products where loaihangdb = '$id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }


    // xoa sản phẩm
    public function del_product($id)
    {
        $query = "Delete from products where id = '$id'";
        $result = $this->db->execute(($query));
        if ($result)
            return "Đã Xóa Sản Phẩm Thành Công";
        else
            return "Xóa Sản Phẩm Không Thành Công";
    }

    // xoa Giỏ hàng
    public function del_productsz($id)
    {
        $query = "Delete from giohang where id = '$id'";
        $result = $this->db->execute(($query));
        if ($result)
            return "Đã Xóa Sản Phẩm Thành Công";
        else
            return "Xóa Sản Phẩm Không Thành Công";
    }

    // Xóa khỏi giỏ hàng
    public function del_products($id)
    {
        $query = "Delete from product_detail where id = '$id'";
        $result = $this->db->execute(($query));
        if ($result)
            return "Đã Xóa Sản Phẩm Thành Công";
        else
            return "Xóa Sản Phẩm Không Thành Công";
    }

    // Sửa Lượt xem sản phẩm
    public function update_luotxem($id)
    {
        $query = "Update products set soluotxem = soluotxem + 1 where id='$id'";
        $result = $this->db->execute(($query));
    }

    // sửa tên Sản Phẩm
    public function update_product($name, $id)
    {
        $query = "Update products set productName='$name' where id='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Sản Phẩm Thành Công";
        } else
            return "Sửa Sản Phẩm Không Thành Công";
    }
    // sửa mô tả Sản Phẩm
    public function update_product1($name, $id)
    {
        $query = "Update products set product_desc='$name' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Sản Phẩm Thành Công";
        } else
            return "Sửa Sản Phẩm Không Thành Công";
    }

    // sửa giá Sản Phẩm
    public function update_product2($name, $id)
    {
        $query = "Update products set price='$name' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Sản Phẩm Thành Công";
        } else
            return "Sửa Sản Phẩm Không Thành Công";
    }
    // sửa số Lượng Sản Phẩm
    public function update_product3($name, $id)
    {
        $query = "Update products set quantity='$name' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Sản Phẩm Thành Công";
        } else
            return "Sửa Sản Phẩm Không Thành Công";
    }
    // sửa Ảnh Sản Phẩm
    public function update_product6($emails, $id)
    {
        $query = "Update products set image='$emails' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }

    // sửa trạng Trái Sản Phẩm
    public function update_product4($name, $id)
    {
        $query = "Update products set status='$name' where id='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Sản Phẩm Thành Công";
        } else
            return "Sửa Sản Phẩm Không Thành Công";
    }

    // sửa Danh Mục Sản Phẩm
    public function update_product5($name, $id)
    {
        $query = "Update products set id_cate ='$name' where id ='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Sản Phẩm Thành Công";
        } else
            return "Sửa Sản Phẩm Không Thành Công";
    }

    // thêm sản phẩm
    public function insert_product($productName, $product_desc, $price, $quantity, $image, $status, $catId)
    {
        $query = "Insert into products(productName,product_desc,price,quantity,image,status,id_cate) values('$productName','$product_desc','$price','$quantity','$image','$status','$catId')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }

    // thêm sản phẩm vào giỏ hàng
    public function insert_products($productName, $price, $image,$nguoimua,$quantity)
    {
        $query = "Insert into product_detail(productName,price,image,nguoimua,quantity) values('$productName','$price','$image','$nguoimua','$quantity')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
    // thêm sản phẩm
    public function insert_cate($catName)
    {
        $query = "Insert into categories(catName) values('$catName')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Danh Mục Thành Công";
        } else
            return "Sửa Danh Mục Không Thành Công";
    }
    // thêm vào giỏ hàng
    public function insert_giohang($catgiohang)
    {
        $query = "Insert into product_detail(date_order) values('$catgiohang')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Danh Mục Thành Công";
        } else
            return "Sửa Danh Mục Không Thành Công";
    }

    // thêm vào xác Nhận Mua Hàng
    public function insert_productm($productName, $quantity, $status, $catId, $price,$hoten)
    {
        $query = "Insert into giohang(id_products,quantity,phone,place,price,hoten) values('$productName','$quantity','$status','$catId','$price','$hoten')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Danh Mục Thành Công";
        } else
            return "Sửa Danh Mục Không Thành Công";
    }

    // đếm sản phẩm
    public function count()
    {
        $query = "SELECT COUNT(*) FROM categories where id >0;";
        $result = $this->db->execute($query);
        return $query;
    }
}
?>