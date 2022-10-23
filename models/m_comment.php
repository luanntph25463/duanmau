<?php include_once("database.php"); ?>
<?php
class comment_class
{
    public $db;
    public function __construct()
    {
        // tạo đối tượng db
        $this->db = new database();
    }
    public function show_comment()
    {
        $query = "select * from binhluan order by Id desc";
        $result = $this->db->select($query);
        return $result;
    }
    // hiển thị chi tiết bình luận
    public function show_icment()
    {
        $query = "select * from binhluan order by id  desc";
        $result = $this->db->select($query);
        return $result;
    }
    // hiển thị comment
    public function show_cmmt()
    {
        $query = "select * from binhluan order by id desc";
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
    // xóa comment
    public function del_comment($id)
    {
        $query = "Delete from binhluan where id = '$id'";
        $result = $this->db->execute(($query));
        if ($result)
            return "Đã Danh Mục Dùng Thành Công";
        else
            return "Xóa Danh Mục Thành Công";
    }
    // thêm bình luân
    public function insert_comment($noidung,$masp,$nguoibinhluan,$hinhanh,$id)
    {
        $query = "Insert into binhluan(noidung,id_product,nguoibinhluan,hinhanh,id_user) values('$noidung','$masp','$nguoibinhluan','$hinhanh','$id')";
        $result = $this->db->execute($query);
    }
    // show comment
    public function show_comments($id)
    {
        $query = "select * from binhluan bl join khachhang kh on kh.id = bl.id_user where id_product = '$id' order by create_at desc ";
        $result = $this->db->select($query);
        return $result;
    }
}
?>