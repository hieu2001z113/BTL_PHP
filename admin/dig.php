<?php
// Đường dẫn tới thư mục jpGraph trong dự án của bạn
$patch = __DIR__;
require_once($patch.'\lb\jpgraph-4.4.1/src/jpgraph.php');
require_once ($patch.'\lb\jpgraph-4.4.1/src/jpgraph_bar.php');

// Dữ liệu cột
$data = array(40, 60, 90, 70, 99);

// Tạo đối tượng biểu đồ cột
$graph = new Graph(400, 300, 'auto');
$graph->SetScale("textlin");

// Tạo đối tượng dữ liệu biểu đồ
$barplot = new BarPlot($data);

// Thêm đối tượng dữ liệu vào biểu đồ
$graph->Add($barplot);

// Hiển thị biểu đồ
$graph->Stroke();
?>