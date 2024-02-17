<?php
include("../connect.php");

$txt = $_POST['txt'];
$index = $_POST['index'];

if ($index == 1) {
    $sql = "SELECT * FROM tb_book WHERE b_id LIKE '%$txt%' ";
} else if ($index == 2) {
    $sql = "SELECT * FROM tb_book WHERE b_name LIKE '%$txt%' ";
} else if ($index == 3) {
    $sql = "SELECT * FROM tb_book WHERE b_writer LIKE '%$txt%'";
} else {
    $sql = "SELECT * FROM tb_book WHERE b_id LIKE '%$txt%' OR b_name LIKE '%$txt%' OR b_writer LIKE '%$txt%'";
}

$qSql = $conn->query($sql);
$rSql = $qSql->num_rows;
if ($rSql == 0) { ?>
    <div class="card">
        <div class="card-body">
            <div class="fs-3">ไม่พบข้อมูลที่คุณค้นหา <br> กรุณาลองค้นหาใหม่</div>
        </div>
    </div>
<?php } else {
    while($data = $qSql->fetch_object()){?>
        <div class="card my-3">
            <div class="card-body">
                <p>รหัสหนังสือ : <span><?php echo $data->b_id  ?></span></p>
                <p>ชื่อหนังสือ : <span><?php echo $data->b_name  ?></span></p>
                <p>นักเขียน : <span><?php echo $data->b_writer  ?></span></p>
                <p>หมวดหมู่ : <span><?php echo $data->b_category  ?></span></p>
                <p>ราคา : <span><?php echo $data->b_price  ?></span></p>
            </div>
        </div>
    <?}

}
?>