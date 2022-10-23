<?php include_once("database.php"); ?>
<?php
class categories_class
{
    public $db;
    public function __construct()
    {
        // tạo đối tượng db
        $this->db = new database();
    }
    // hiển thị danh sách thông tin 1 mã loại
    public function loai_getinfo($maloai)
    {
        $query = "select * from categories where id ='maloai'";
        $result = $this->db->execute(($query));
        return $result;
    }
    // hiển thị danh sách danh mục
    public function show_cate()
    {
        $query = "select * from categories order by id desc";
        $result = $this->db->select($query);
        return $result;
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
    // thêm Danh Mục
    public function insert_cate($catName)
    {
        $query = "Insert into categories(catName) values('$catName')";
        $result = $this->db->execute($query);
        if ($result) {
            return "Đã Thêm Danh Mục Thành Công";
        } else
            return "Sửa Danh Mục Không Thành Công";
    }
    // đếm tổng số sản phẩm dựa theo danh mục
    public function count()
    {
        $query = "SELECT COUNT(*) FROM categories where id >0;";
        $result = $this->db->execute($query);
        return $query;
    }

    // hiển thị tổng số danh mục
    public function show_count()
    {
        $query = "SELECT COUNT(*) FROM categories where id >0;";
        return $query;
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
}
?>