
<body>
    <main>
        <div class="wrapper">
            <div class="danhsach1">
            <div class="danhsach">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:70px;">nội dung</th>
                        <th style="width:600px;">ngày Bình Luận</th>
                        <th style="width:600px;">người Bình Luận</th>
                        <th style="width:300px;">xóa</th>
                    </tr>
                    <?php
                    $id = $_GET['delsssid'];
                    $cmt = $list_user->show_cmmts($id);
                    if ($cmt) {
                        while ($row = $cmt->fetch_assoc()) {

                    ?>
                            <tr>
                                <td>
                            <?php echo $row['noidung']; ?>
                                <td> <?php echo $row['create_at'] ?></td>
                                <td><?php echo $row['nguoibinhluan']; ?></td>
                                <td style="background-color:red;"> <a class='btn btn-danger'  onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không?')" href="indexcment.php?delid=<?php echo $row['id']; ?>&delsssid=<?php echo $_GET['delsssid'] ?>">Xóa</a><i class="fa-solid fa-trash-can"></i>
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