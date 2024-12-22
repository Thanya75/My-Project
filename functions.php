<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'new_rmu_package_db');

    class DB_con {
        private $dbcon;
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }
        //เพิ่ม user
        public function insert($user_login, $user_name, $user_phone, $major_id, $faculty_id) {
            $result = mysqli_query($this->dbcon, "INSERT INTO td_user(user_login,user_name, user_phone, major_id, faculty_id)
            VALUES('$user_login,','$user_name','$user_phone','$major_id','$faculty_id')");
            return $result;
        }
        //เพิ่มพัสดุ
        public function insertparcel($messenger_id, $user_id, $admin_id, $name_messenger, $phone_messenger, $type_id, $major_id, $recipient_name, $recipient_phone, $recipient_status) {
            $result = mysqli_query($this->dbcon, "INSERT INTO td_recipient(messenger_id, user_id, admin_id, name_messenger, phone_messenger, type_id, major_id, recipient_name, recipient_phone, recipient_status)
            VALUES('$messenger_id', '$user_id', '$admin_id', '$name_messenger', '$phone_messenger', '$type_id', '$major_id', '$recipient_name', '$recipient_phone', '$recipient_status')");
            return $result;
        }
        //เพิ่มคณะ
        public function insertfaculty($faculty_name, $faculty_phone) {
            $result = mysqli_query($this->dbcon, "INSERT INTO td_faculty(faculty_name, faculty_phone)
            VALUES('$faculty_name', '$faculty_phone')");
            return $result;
        }
        // เพิ่มสาขา
        public function insertmajor($major_name, $faculty_id, $major_phone) {
            $result = mysqli_query($this->dbcon, "INSERT INTO td_major(major_name, faculty_id, major_phone)
            VALUES('$major_name', '$faculty_id', '$major_phone')");
            return $result;
        }
        // เพิ่มผู้ขนส่ง
        public function insertmessenger($messenger_name, $mobile_num) {
            $result = mysqli_query($this->dbcon, "INSERT INTO td_messenger(messenger_name, mobile_num)
            VALUES('$messenger_name', '$mobile_num')");
            return $result;
        }

        //เพิ่มข้อมูลจ่ายพัสดุ
        public function insertsend($recipient_id, $send_recipient, $faculty_id, $send_status, $admin_id, $user_id, $user_name) {
            $result = mysqli_query($this->dbcon, "INSERT INTO td_send(recipient_id, user_name, user_id, send_recipient, faculty_id, send_status, admin_id)
            VALUES('$recipient_id', '$user_name', '$user_id', '$send_recipient', '$faculty_id', '$send_status', '$admin_id')");
            return $result;
        }

        // แสดงuser
        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_user");
            return $result;
        }
        //แสดงพัสดุ
        public function parceldata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_recipient");
            return $result;
        }
        //แสดงคณะ
        public function facultydata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_faculty");
            return $result;
        }
        //แสดงสาขา
        public function majordata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_major ORDER BY faculty_id ASC");
            return $result;
        }
        //แสดงผู้ขนส่ง
        public function messengerdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_messenger");
            return $result;
        }
        //แสดงข้อมูลส่งพัสดุ
        public function senddata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_send");
            return $result;
        }
        //แก้ไขuser
        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_user WHERE user_id = '$userid'");
            return $result;
        }
        //parcel
        public function parcelcord($recipientid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_recipient WHERE recipient_id = '$recipientid'");
            return $result;
        }
        //คณะ
        public function facultycord($facultyid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_faculty WHERE faculty_id = '$facultyid'");
            return $result;
        }

        // สาขา
        public function majorcord($majorid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_major WHERE major_id = '$majorid'");
            return $result;
        }
        // ผู้ขนส่ง
        public function messengercord($messengerid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_messenger WHERE messenger_id = '$messengerid'");
            return $result;
        }

        //send (ข้อมูลส่งพัสดุ)
        public function sendcord($sendid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM td_send WHERE send_id = '$sendid'");
            return $result;
        }
        
        // แก้ไข user
        public function update($userid, $user_login, $user_name, $user_phone, $major_id, $faculty_id) {
            $result = mysqli_query($this->dbcon, "UPDATE td_user SET
                user_login = '$user_login',
                user_name = '$user_name',
                user_phone = '$user_phone',
                major_id = '$major_id',
                faculty_id = '$faculty_id'
                WHERE user_id = '$userid'
            ");
            return $result;
        }

        //แก้ไข parcel
        public function updatedata($recipientid, $messenger_id, $user_id, $admin_id, $name_messenger, $phone_messenger, $type_id, $major_id, $recipient_name, $recipient_phone, $recipient_status) {
            $result = mysqli_query($this->dbcon, "UPDATE td_recipient SET 
                messenger_id = '$messenger_id',
                user_id = '$user_id',
                admin_id = '$admin_id',
                name_messenger = '$name_messenger',
                phone_messenger = '$phone_messenger',
                type_id = '$type_id',
                major_id = '$major_id',
                recipient_name = '$recipient_name',
                recipient_phone = '$recipient_phone',
                recipient_status = '$recipient_status'
                WHERE recipient_id = '$recipientid'
            ");
            return $result;
        }

        public function fixrecipientstatus($recipientid, $recipient_status){
            $result = mysqli_query($this->dbcon, "UPDATE td_recipient SET 
                recipient_status = '$recipient_status'
                WHERE recipient_id = '$recipientid'
            ");
            return $result;
        }

        //แก้ไขคณะ
        public function updatefaculty($facultyid, $faculty_name, $faculty_phone) {
            $result = mysqli_query($this->dbcon, "UPDATE td_faculty SET 
                faculty_name = '$faculty_name',
                faculty_phone = '$faculty_phone'
                WHERE faculty_id = '$facultyid'
            ");
            return $result;
        }
        //แก้ไขผู้ขนส่ง
        public function updatemessenger($messengerid, $messenger_name, $mobile_num) {
            $result = mysqli_query($this->dbcon, "UPDATE td_messenger SET 
                messenger_name = '$messenger_name',
                mobile_num = '$mobile_num'
                WHERE messenger_id = '$messengerid'
            ");
            return $result;
        }

        // แก้ไขสาขา
        public function updatemajor($majorid, $major_name, $faculty_id, $major_phone) {
            $result = mysqli_query($this->dbcon, "UPDATE td_major SET 
                major_name = '$major_name',
                faculty_id = '$faculty_id',
                major_phone = '$major_phone'
                WHERE major_id = '$majorid'
            ");
            return $result;
        }

        //แก้ไขข้อมูลจ่ายพัสดุ
        public function updatesend($sendid, $recipient_id, $send_recipient, $faculty_id, $send_status, $admin_id, $user_name, $user_id) {
            $result = mysqli_query($this->dbcon, "UPDATE td_send SET 
                recipient_id = '$recipient_id',
                user_name = '$user_name',
                user_id = '$user_id',
                send_recipient = '$send_recipient',
                faculty_id = '$faculty_id',
                send_status = '$send_status',
                admin_id = '$admin_id'
                WHERE send_id = '$sendid'
            ");
            return $result;
        }
        
        // ลบ user
        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM td_user WHERE user_id = '$userid'");
            return $deleterecord;
        }

        //ลบพัสดุ
        public function frmdelete($recipientid) {
            $deleteparcel = mysqli_query($this->dbcon, "DELETE FROM td_recipient WHERE recipient_id = '$recipientid'");
            return $deleteparcel;
        }

        //ลบคณะ
        public function facultydelete($facultyid) {
            $deletefaculty = mysqli_query($this->dbcon, "DELETE FROM td_faculty WHERE faculty_id = '$facultyid'");
            return $deletefaculty;
        }
        //ลบคณะ
        public function majordelete($majorid) {
            $deletemajor = mysqli_query($this->dbcon, "DELETE FROM td_major WHERE major_id = '$majorid'");
            return $deletemajor;
        }

        //ลบผู้ขนส่ง
        public function messengerdelete($messengerid) {
            $deletemessenger = mysqli_query($this->dbcon, "DELETE FROM td_messenger WHERE messenger_id = '$messengerid'");
            return $deletemessenger;
        }

        //ลบข้อมูลส่งพัสดุ
        public function senddelete($sendid) {
            $deletesend = mysqli_query($this->dbcon, "DELETE FROM td_send WHERE send_id = '$sendid'");
            return $deletesend;
        }

        // login admin
        public function signin($uname, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT * FROM td_admin WHERE admin_name = '$uname' AND admin_phone = '$password'");
            return $signinquery;
        }

    }
?> 