/* 로그인 여부 쿠키 체크 */
function checkLogin() {
    const userCookie = getCookie('user_data') || { status: 'undefined' };

    if (userCookie.status === 'login') {
        return true;
    } else {
        return false;
    }
}

/* 내가 만든 쿠키~ 만들기 */
function setCookie(name, data, hours, secure) {
    const expires = new Date();
    expires.setTime(expires.getTime() + (hours * 60 * 60 * 1000));

    const cookieData = {
        expires: expires.toUTCString(),
        data: data
    };

    let cookieString = `${name}=${encodeURIComponent(JSON.stringify(cookieData))}; expires=${expires.toUTCString()}; path=/`;

    if (secure) cookieString += '; Secure'; // https 보안 추가

    document.cookie = cookieString;
}

/* 내가 만든 쿠키~ 가져오기 */
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) {
        return JSON.parse(decodeURIComponent(parts.pop().split(';').shift()));
    } else {
        return undefined;
    }
}

/* YYYY-MM-DD 날짜 변환 */
function getDate() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, "0");
    const day = String(today.getDate()).padStart(2, "0");
    const formattedDate = `${year}-${month}-${day}`;
    return formattedDate;
}

/* 로그인 함수 */
function signin() {
    var userid = $("#idInput").val();
    var passwd = $("#passwordInput").val();

    $.ajax({
        type: "POST",
        url: "../php/signin.php",
        data: {
            userid: userid,
            passwd: passwd,
        },
        success: function (data) {
            if (data.status === "success") {
                setCookie('user', userid, 99999, false); // 쿠키 설정
                // 이름, 데이터, 쿠키파괴시간, 쿠키저장경로, 쿠키사용도메인제한, https보안, https통과로만 제한 
                window.location.href = "./myInfo.php";
            } else {
                alert(data.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: " + status + " - " + error);
            alert("정보 전송 중 오류가 발생했습니다.");
        },
    });
}

// 로그인 필드 체크
function signinCheck() {
    var userid = $("#idInput").val();
    var passwd = $("#passwordInput").val();

    if (userid == "") {
        alert("아이디를 입력하세요.");
    } else if (passwd == "") {
        alert("비밀번호를 입력하세요.");
    } else {
        signin();
    }
}