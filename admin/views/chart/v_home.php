<h3 class="alert alert-success">Biểu ĐỒ Thống Kê<h3>
<div id="myChart" style="width: 900px;height: 680px;"></div>
<script
src="https://www.gstatic.com/charts/loader.js">
</script>
<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {

var data = google.visualization.arrayToDataTable([
  ['tên', 'Số Lượng'],
  <?php
$list_user = new products_class();
  $product  = $list_user->show_product9();
  if( $product ){
      while($row = $product ->fetch_assoc()){  
    echo "['{$row['catName']}',{$row['quantity']} ],";  
    }
}
?>
]);

var options = {
  title: 'Bảng Thống kê Sản phẩm theo danh mục'
};

var chart = new google.visualization.BarChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>