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

/* 게시글 함수 */
function write() {
    var img = "http://via.placeholder.com/640x480";//$("#image-preview").attr('src');
    var title = $("#title").val();
    var foodName = $("#food-name").val();
    var recipe = $("#recipe").val();
    var ingredients = $("#ingredients").val();
    var id = getCookie('user') ? getCookie('user').data : null;

    $.ajax({
        type: "POST",
        url: "../php/write.php",
        data: {
            img: img,
            title: title,
            foodName: foodName,
            recipe: recipe,
            ingredients: ingredients,
            id: id
        },
        success: function (data) {
            if (data.status === "success") {
                window.location.href = "../index.php";
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