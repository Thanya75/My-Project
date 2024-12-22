<?php 
include('server.php'); 
if(isset($_POST) && !empty($_POST) && $_POST['function'] == "faculty_id"){
    // echo $_POST['faculty_name'];
    $faculty_name = $_POST['faculty_name'];
    $sql_faculty = "SELECT * FROM td_faculty WHERE faculty_name = '$faculty_name'";
    $query_faculty = mysqli_query($conn,$sql_faculty);
    $row_faculty = mysqli_num_rows($query_faculty);
    if($row_faculty > 0){
        $result_faculty = mysqli_fetch_assoc($query_faculty);
        // echo $result_faculty['faculty_name'];
        $department_name = $result_faculty['faculty_name'];
        $sql_major = "SELECT * FROM td_major WHERE faculty_id = '$department_name' ";
        $query_major = mysqli_query($conn, $sql_major);
        echo '<option selected disabled>------------กรุณาเลือกสาขาวิชา------------</option>' ;
        foreach($query_major as $value){
            echo '<option value="'.$value['major_name'].'">'.$value['major_name'].'</option>';
        }
    }
}
?>