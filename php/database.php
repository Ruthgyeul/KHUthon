<?php
// 데이터베이스 연결 정보
$host = "localhost";
$username = "user";
$password = "9623*";
$dbname = "KHUthon";

// mysqli 객체 생성
$conn = new mysqli($host, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    //die();
    die("연결 실패: " . $conn->connect_error);
}