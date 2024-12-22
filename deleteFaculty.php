<?php 

    include_once('functions.php');

    if (isset($_GET['del'])) {
        $facultyid = $_GET['del'];
        $facultydelete = new DB_con();
        $sql = $facultydelete->facultydelete($facultyid);

        if ($sql) {
            echo "<script>alert('ลบข้อมูล เรียบร้อยค่ะ!');</script>";
            echo "<script>window.location.href='faculty_data.php'</script>";
            
        }
    }

?> 