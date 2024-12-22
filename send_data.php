<?php
$conn= mysqli_connect("localhost","root","","new_rmu_package_db") 
or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");
//query
$query=mysqli_query($conn,"SELECT COUNT(send_id) FROM `td_send`");
	$row = mysqli_fetch_row($query);
 
	$rows = $row[0];
 
	$page_rows = 10;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
 
	$last = ceil($rows/$page_rows);
 
	if($last < 1){
		$last = 1;
	}
 
	$pagenum = 1;
 
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}
 
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
 
	$nquery=mysqli_query($conn,"SELECT * from  td_send $limit");
 
	$paginationCtrls = '';
 
	if($last != 1){
 
	if ($pagenum > 1) {
$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
			}
	}
}
 
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
 
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
 
if ($pagenum != $last) {
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">Next</a> ';
}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าข้อมูลการจ่ายพัสดุ</title>

</head>
<?php include 'header.php'; ?>
<body>
    <div class="container">
        <h2 class="mt-3">ข้อมูลการจ่ายพัสดุ</h2>

        <form action="searchSend.php" class="form-group" method="POST">
            <label for="">ค้นหาข้อมูล</label>
            <input type="text" placeholder="ป้อนข้อมูล" name="recipient_id" class="form-control"><br>
            <input type="submit" value="ค้นหา" class="btn btn-primary my-2">
        </form>
        <br>
        <a href="insert_send.php" class="btn btn-success">เพิ่มข้อมูล</a>
        <hr>
        <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <th>รหัสจ่ายพัสดุ</th>
                <th>เลขพัสดุ</th>
                <th>วันเวลาจ่ายพัสดุ</th>
                <th>รหัสเจ้าของพัสดุ</th>
                <th width="11%">ชื่อเจ้าของพัสดุ</th>
                <th width="11%">ชื่อผู้มารับพัสดุ</th>
                <th>หน่วยงาน</th>
                <th>สถานะผู้รับพัสดุ</th>
                <th width="7%">ลงชื่อเจ้าหน้าที่</th>
            </thead>
            <tbody>
                <?php
                include_once('functions.php');
                $senddata = new DB_con();
                $sql = $senddata->senddata();
                while ($row = mysqli_fetch_array($nquery)) {
                ?>
                    <tr>
                        <td><?php echo $row['send_id']; ?></td>
                        <td><?php echo $row['recipient_id']; ?></td>
                        <td><?php echo $row['send_day']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['send_recipient']; ?></td>
                        <td><?php echo $row['faculty_id']; ?></td>
                        <td><?php echo $row['send_status']; ?></td>
                        <td><?php echo $row['admin_id']; ?></td> 
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
        <div id="pagination_controls"><?php echo $paginationCtrls; ?></div><br><br>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>