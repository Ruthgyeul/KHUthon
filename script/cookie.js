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
getCookie('user')
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) {
        return JSON.parse(decodeURIComponent(parts.pop().split(';').shift()));
    } else {
        return undefined;
    }
}

/* 쿠키 만들기 예시 */
const data = { name: 'ehe', status: 'bad' }; // 데이터
const duration = 1; // 1시간
setCookie('myCookie~', data, duration, true);

/* 쿠키 읽기 예시 */
getCookie('myCookie'); // JSON data 형식으로 나옴 (위에 data 변수 참고)