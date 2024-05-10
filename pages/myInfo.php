<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/myInfo.css">

    <title>요리 음식: 내정보</title>
</head>

<body>
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <!-- 여기다가 코딩 시작 -->
                <header>
                    <div class="wrap">
                        <a href="#" class="logo">
                            <h1>요리음식</h1>
                        </a>
                    </div>
                </header>
                <!--my profile-->
                <div class="my_profile">
                    <a href="#n" class="profile_img">
                        <img alt="User profile image" class="round_img" src="../assets/profile.jpeg" />
                    </a>
                    <div class="my_id">
                        <a href="#n" class="txt_id">떡잎방범대</a>
                        <p>맹구</p>
                    </div>
                </div>
                <?php include "../php/myFeed.php"; ?>
            </div>
        </div>


        <ul class="nav nav-pills tabs" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="./upload.html" class="nav-link" id="pills-report-tab">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px"
                        fill="#000000">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M21 6h-3.17L16 4h-6v2h5.12l1.83 2H21v12H5v-9H3v9c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM8 14c0 2.76 2.24 5 5 5s5-2.24 5-5-2.24-5-5-5-5 2.24-5 5zm5-3c1.65 0 3 1.35 3 3s-1.35 3-3 3-3-1.35-3-3 1.35-3 3-3zM5 6h3V4H5V1H3v3H0v2h3v3h2z" />
                    </svg>
                    업로드
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="../index.php" class="nav-link" id="pills-articles-tab">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="48px"
                        viewBox="0 0 24 24" width="48px" fill="#000000">
                        <g>
                            <rect fill="none" height="24" width="24" />
                            <g>
                                <path
                                    d="M19,5v14H5V5H19 M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3L19,3z" />
                            </g>
                            <path d="M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z" />
                        </g>
                    </svg>
                    피드
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#" class="nav-link active" id="pills-news-tab">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px"
                        fill="#ffffff">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg>
                    내정보
                </a>
            </li>
        </ul>
    </div>
</body>

</html>