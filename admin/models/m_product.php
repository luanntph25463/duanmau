<?php  include_once ("database.php");?>
<?php
class products_class
{
    public $db;
    public function __construct()
    {
        // tạo đối tượng db
        $this->db = new database();
    }
    // dang nhap
    public function login($adminEmail,$adminPass)
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
            $flag = $row['adminId'];
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
    public function show_product9()
    {
        $query = "SELECT lo.id,lo.catName, COUNT(*) quantity,min(hh.price) 'Giá Rẻ nhất' ,max(hh.price) 'Giá Đắt Nhất' ,avg(hh.price) 'Giá Trung Bình' from products hh join categories lo on lo.id=hh.id_cate GROUP BY lo.id,lo.catName;";
        $result = $this->db->select($query);
        return $result;
    }
    // hien thi theo luot yeu thich
    public function show_usersp()
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
    public function show_userskh()
    {
        $query = "select * from khachhang order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
        // hien thi danh sach nguoi dung
        public function show_usersxz($id)
        {
            $query = "SELECT * from users where Id = '$id'";
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
        public function show_productc($id)
        {
            $query = "SELECT * from products where id_cate = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
    public function show_products()
    {
        $query = "select * from product_detail order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    // hiển thị danh sách danh mục
    public function show_cate()
    {
        $query = "select * from categories order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_icment()
    {
        $query = "select * from binhluan order by id  desc";
        $result = $this->db->select($query);
        return $result;
    }

        // hiển thị danh sách thông tin 1 mã loại
        public function loai_getinfo($maloai)
        {
            $query = "select * from categories where id ='maloai'";
            $result = $this->db->execute(($query));
            return $result;
        }
        // hiển thị comment
    public function show_cmmt()
    {
        $query = "select * from binhluan  GROUP BY id_product order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_cmmts($id)
    {
        $query = "select * from binhluan where id_product = '$id' order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    // đếm tổng số bình luận
    public function countbl()
    {
        $query = "SELECT mabinhluan FROM binhluan WHERE id > 0";
        $result = $this->db->select($query);
        return $result;
    }

 // đếm tổng số bình luận
 public function countbls()
 {
     $query = "SELECT count(noidung) FROM binhluan WHERE id > 0 group by id_product";
     $result = $this->db->select($query);
     return $result;
 }

    // hiển thị tổng số danh mục
    public function show_count()
    {
        $query = "SELECT COUNT(*) FROM categories where id >0;";
        return $query;
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

        // xoa sản phẩm
        public function del_productsz($id)
        {
            $query = "Delete from giohang where id = '$id'";
            $result = $this->db->execute(($query));
            if ($result)
                return "Đã Xóa Sản Phẩm Thành Công";
            else
                return "Xóa Sản Phẩm Không Thành Công";
        }
    // Xóa Danh Mục
    public function del_cate($id)
    {
        $query = "Delete from categories where id = '$id'";
        $result = $this->db->execute(($query));
        if ($result)
            return "Đã Danh Mục Dùng Thành Công";
        else
            return "Xóa Danh Mục Thành Công";
    }
    public function del_comment($id)
    {
        $query = "Delete from binhluan where id = '$id'";
        $result = $this->db->execute(($query));
        if ($result)
            return "Đã Danh Mục Dùng Thành Công";
        else
            return "Xóa Danh Mục Thành Công";
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
    
    // Sửa Lượt xem
    public function update_luotxem($id)
    {
        $query = "Update products set soluotxem = soluotxem + 1 where id='$id'";
        $result = $this->db->execute(($query));
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
    // sửa tên Sản Phẩm
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
            public function update_product7($emails, $id)
            {
                $query = "Update products set loaihangdb='$emails' where id ='$id'";
                $result = $this->db->execute(($query));
                if ($result) {
                    return "Đã Sửa Người Dùng Thành Công";
                } else
                    return "Sửa Người Dùng Không Thành Công";
            }
                    // sửa Ảnh
        public function update_anh($email, $id)
        {
            $query = "Update users set avarta='$email' where id='$id'";
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

    // sửa người dùng email
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
                    $query = "Update khachhang set detail ='$address' where id ='$id'";
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

    // sửa tên Danh Mục
    public function update_cate($name, $id)
    {
        $query = "Update categories set catName='$name' where id='$id'";
        $result = $this->db->execute(($query));
        if ($result) {
            return "Đã Sửa Danh Mục Thành Công";
        } else
            return "Sửa Danh Mục Không Thành Công";
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


    // thêm người dùng
    public function insert_user($adminName, $adminEmail, $adminPass,$avarta,$address)
    {
        $query = "Insert into users(adminName,adminEmail,adminPass,avarta,address) values('$adminName','$adminEmail','$adminPass','$avarta','$address')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }
        // thêm bình luân
    public function insert_comment($noidung,$masp,$nguoibinhluan)
    {
        $query = "Insert into binhluan(noidung,id_product,nguoibinhluan) values('$noidung','$masp','$nguoibinhluan')";
        $result = $this->db->execute($query);
    }
      // thêm khachhang
      public function insert_userkh($hoten, $taikhoan, $matkhau,$hinhanh,$detail,$vaitro,$kichhoat)
      {
          $query = "Insert into khachhang(hoten,taikhoan,matkhau,hinhanh,detail,vaitro,trangthai) values('$hoten','$taikhoan','$matkhau','$hinhanh','$detail','$vaitro','$kichhoat')";
          $result = $this->db->execute($query);
          if ($result) {
              return "Đã Thêm Người Dùng Thành Công";
          } else
              return "Sửa Người Dùng Không Thành Công";
      }
    // thêm sản phẩm
    public function insert_product($productName, $product_desc, $price,$quantity, $image,$status,$catId,$loaihang)
    {
        $query = "Insert into products(productName,product_desc,price,quantity,image,status,id_cate,loaihangdb) values('$productName','$product_desc','$price','$quantity','$image','$status','$catId','$loaihang')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Người Dùng Thành Công";
        } else
            return "Sửa Người Dùng Không Thành Công";
    }

    // thêm sản phẩm vào giỏ hàng
    public function insert_products($productName, $price,$image)
    {
        $query = "Insert into product_detail(productName,price,image) values('$productName','$price','$image')";
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
        public function insert_productm($productName,$quantity,$status,$catId,$price,$hoten)
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