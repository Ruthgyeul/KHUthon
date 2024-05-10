<?php
include "error.php";
include "database.php";

// Number of posts per page
$postPerPage = 20;

// Get the username from the cookie
$username_cookie = isset($_COOKIE['user']) ? json_decode($_COOKIE['user'], true)['data'] : '';

// Calculate the start index for the current page
$pageidx = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($pageidx - 1) * $postPerPage;

// SQL query to fetch posts for the current page from a specific username, ordered by idx in descending order
$sql = "SELECT * FROM Feed WHERE username = ? ORDER BY idx DESC LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $username_cookie, $start, $postPerPage);

$html = '';

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $html .= '
                <main class="container wrap">
                    <!--FEED BOARD-->
                    <div class="feed_board">
                        <!--FEED COMPONENT-->
                        <article class="feed">
                            <!--top-->
                            <div class="food_name">
                                <a href="#" class="poster_id txt_id">'. $row['title'] .' | '. $row['name'] . '</a>
                                <a>'. $row['username'] .'</a>
                            </div>
                            <!--content-->
                            <section class="feed_imgs" style="display: flex; flex-direction: column;">
                                <img alt="음식사진" src="'. $row['img'] .'" style="align-self: center;" />
                                <div class="interactions">
                                    <div class="my_emotion">
                                        <button type="button">
                                            <img alt="하트" src="assets/heart-empty.png" />
                                        </button>
                                    </div>
                                    <div class="pagnation"></div>
                                </div>
                                <!-- 몇명이 좋아하는지 -->
                                <p>
                                    <a href="#" class="txt_id">'. $row['mtrl'] .'</a>
                                </p>
                            </section>
                            <!--comment-->
                            <div class="comments">
                                <div id="listComment" class="list_comment">
                                    <p class="txt_comment">
                                        <span>
                                            <p>'. $row['word'] .'</p>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!--//FEED BOARD-->
                </main>';
        }
    } else {
        $html = '<p>No posts found for the specified username.</p>';
    }
} else {
    // Handle query execution failure
    $html = '<p>Error fetching posts.</p>';
}

$stmt->close();
$conn->close();

echo $html;
?>
