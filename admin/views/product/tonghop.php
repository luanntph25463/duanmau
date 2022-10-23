
</br>
</br>
    <main>
            <table class="table table-bordered">
                <tr>
                    <td></td>
                    <th style="width:70px;">loại Hàng</th>
                    <th style="width:350px;">Số Lượng</th> 
                    <th style="width:350px;">Giá Cao Nhất</th> 
                    <th style="width:200px;">Giá Thấp Nhất</th>
					<th style="width:200px;">Giá trug BÌnh</th>
                </tr>
                <?php
     $list_user = new products_class();
    $users = $list_user->show_product9();
    if($users){
        while($row = $users->fetch_assoc()){
        
    ?>
                <tr>
                    
                    <td><input type="checkbox" name="ma_kh[]" value="<?php echo $row['id'];?>"></td>
                    <td><?php echo $row['catName'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['Giá Rẻ nhất'];?></td>
                    <td><?php echo $row['Giá Đắt Nhất'];?></td>
                    <td><?php echo $row['Giá Trung Bình'];?></td>
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