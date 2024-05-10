<?php
include "error.php";
include "database.php";

$response = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userid = $_POST['userid'];
    $passwd = $_POST['passwd'];

    if (empty($userid) || empty($passwd)) {
        $response['status'] = 'error';
        $response['message'] = '모든 필드를 입력하세요.';
    } else {
        $sql = "SELECT * FROM User WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $userid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['passwd'];

            // 로그인 성공 시
            if (password_verify($passwd, $hashedPassword)) {
                $response['status'] = 'success';
                $response['message'] = '로그인 성공!';

            } else {
                $response['status'] = 'error';
                $response['message'] = '비밀번호가 일치하지 않습니다.';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = '해당 유저는 존재하지 않습니다.';
        }

        $stmt->close();
    }

    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = '잘못된 요청입니다.';
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
