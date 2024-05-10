<?php
include "error.php";
include "database.php";

$response = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $img = $_POST['img'];
    $title = $_POST['title'];
    $foodName = $_POST['foodName'];
    $recipe = $_POST['recipe'];
    $recipe = nl2br($recipe);  // 줄바꿈
    $ingredients = $_POST['ingredients'];
    $user = $_POST['id'];

    $sql = "INSERT INTO Feed (`name`, `title`, `word`, `mtrl`, `img`, `username`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $foodName, $title, $recipe, $ingredients, $img, $user); // Adjust bind_param accordingly

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = '게시글이 성공적으로 저장되었습니다.';
    } else {
        $response['status'] = 'error';
        $response['message'] = '게시글 저장 중 오류가 발생했습니다.';
    }

    $stmt->close();
    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = '잘못된 요청입니다.';
}

// Send the response as JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>
