<?php

if (isset($_GET['mess'])) {
    $mess = $_GET['mess'];
    // addslashes() là một hàm trong PHP dùng để thêm dấu gạch chéo ngược (\) vào trước các ký tự đặc biệt trong chuỗi, giúp chuỗi an toàn hơn khi sử dụng trong các ngữ cảnh cần trích dẫn như SQL hoặc JavaScript.
    echo "<script type='text/javascript'>alert('" . addslashes($mess) . "');</script>";
}

include './admin/form_class.php';
session_start();
$form = new Form();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lastName = $_POST['last-name'];
    $firstName = $_POST['first-name'];
    $gender = $_POST['gender'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dateTime = $day . "/" . $month . "/" . $year;
    $location = $_POST['location'];
    $maBuuChinh = $_POST['maBuuChinh'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $reloadPass = $_POST['reload-password'];
    $moreEmail = $_POST['moreEmail'];
    $questionForSecurity = $_POST['questionForSecurity'];
    $yourAnswer = $_POST['yourAnswer'];
    // echo $day;
    $form->insert_form($lastName, $firstName, $gender, $dateTime, $location, $maBuuChinh, $email, $pass, $moreEmail, $questionForSecurity, $yourAnswer);

    if ($lastName !== '' && $firstName !== '' && $gender !== '#' && $maBuuChinh !== "" && $email !== "" && $pass !== '' && $reloadPass === $pass && $moreEmail !== '' && $questionForSecurity !== "#" && $yourAnswer !== "" && $location !== "") {
        $_SESSION['lastName'] = $lastName;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['gender'] = $gender;
        $_SESSION['day'] = (int)$day;
        $_SESSION['month'] = (int)$month;
        $_SESSION['year'] = (int)$year;
        $_SESSION['maBuuChinh'] = $maBuuChinh;
        $_SESSION['email'] = $email;
        $_SESSION['moreEmail'] = $moreEmail;
        $_SESSION['questionForSecurity'] = $questionForSecurity;
        $_SESSION['yourAnswer'] = $yourAnswer;
        $_SESSION['pass'] = $pass;
        $_SESSION['location'] = $location;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang 1</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header-top">
                <a href="#!"><img src="./assets/imgs/Yahoo-Logo-2013-2019.png" alt="" class="logo"></a>
                <div class="header-top__contact">
                    <a href="#!">Yahoo! - Trợ giúp</a>
                </div>
            </div>
            <div class="header-bottom">
                <div class="header-bottom-left">
                    <img src="./assets/imgs/header-bottom-1.png" alt="" class="header-bottom-img">
                    <div>
                        <h1>Chào Bạn!</h1>
                        <h2>Chúng tôi sẽ giúp bạn lập tài khoản Yahoo! theo 3 bước rất đơn giản! Bạn chỉ cần trả lời
                            một số
                            câu hỏi đơn giản. Chọn ID và mật khẩu và thế là xong</h2>
                    </div>
                </div>
                <div class="header-bottom-right">
                    <h2 class="header-bottom-right__heading">Bạn đã có ID hoặc địa chỉ Yahoo! Mail?</h2>
                    <a href="#!" class="button-sign-up">Đăng nhập</a>
                    <a href="#!" class="forgot-pass">Quên mật khẩu hoặc Yahoo! ID của bạn?</a>
                </div>
            </div>
        </div>
    </header>
    <div class="separator-mark"></div>
    <div class="middle">
        <div class="container">
            <div class="translateByLang">
                <span>Tôi thích nhận nội dung bằng tiếng:</span>
                <select name="" id="">
                    <option value="#!">--Mời chọn--</option>
                    <option value="Vn">Tiếng Việt</option>
                    <option value="Eng">Tiếng Anh</option>
                    <option value="Korean">Tiếng Hàn</option>
                </select>
            </div>
            <form action="#" method="post">
                <ol class="question">
                    <li class="quest-1">
                        <h3 class="quest-1__heading">Hãy cho tôi biết về bản thân bạn</h3>
                        <table>
                            <tr>
                                <td>
                                    <label for="#!">
                                        Tên của tôi
                                    </label>
                                </td>
                                <td>
                                    <input type="text" class="last-name" name="last-name" required placeholder="Tên họ">
                                    <input type="text" required class="first-name" name="first-name"
                                        placeholder="Tên gọi">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="#!">Giới tính</label>
                                </td>
                                <td>
                                    <select name="gender" id="">
                                        <option value="#">--Chọn--</option>
                                        <option value="female">Nữ</option>
                                        <option value="male">Nam</option>
                                        <option value="other">Khác</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="#!">Ngày tháng năm sinh</label>
                                </td>
                                <td>
                                    <select name="day" id="">
                                        <option value="#">--Chọn ngày--</option>
                                        <?php
                                        for ($i = 1; $i <= 31; $i++) {
                                            echo "<option value='" . $i . "'>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <select name="month" id="">
                                        <option value="1">--Chọn tháng</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <input type="number" name="year" id="" placeholder="Nhập năm" min="1924" max="2124">
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="#">Tôi sống tại</label>
                                </td>
                                <td>
                                    <select name="location" id="">
                                        <option value="#">--Chọn địa điểm--</option>
                                        <option value="VN">Việt Nam</option>
                                        <option value="America">Mĩ</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="#">Mã bưu chính</label>
                                </td>
                                <td>
                                    <input type="text" name="maBuuChinh" id="" placeholder="Nhập mã bưu chính">
                                </td>
                            </tr>
                        </table>


                    </li>
                    <li class="quest-2">
                        <h3 class="quest-2__heading">Chọn ID và mật khẩu</h3>
                        <table>
                            <tr>
                                <td>
                                    <label for="#">Yahoo ID và Email</label>
                                </td>
                                <td>
                                    <input type="text" name="email" id=""><span>@yahoo.com.vn</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="#">Mật khẩu</label>
                                </td>
                                <td>
                                    <input type="password" name="password" id="" placeholder="Mời nhập mật khẩu">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="#">Đánh lại mật khẩu</label>
                                </td>
                                <td>
                                    <input type="password" name="reload-password" id=""
                                        placeholder="Mời nhập lại mật khẩu của bạn">
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li class="quest-3">
                        <h3 class="quest-3__heading">Để đề phòng trường hợp bạn quên ID hoặc mật khẩu...</h3>
                        <table>
                            <tr>
                                <td>
                                    <label style="font-style:italic; " for="#">Email Thay Thế Khác</label>
                                </td>
                                <td>
                                    <input type="text" name="moreEmail" placeholder="Nhập thêm email">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="#">Câu hỏi bảo mật</label>
                                </td>
                                <td>
                                    <select name="questionForSecurity" id="">
                                        <option value="#">--Chọn một mục--</option>
                                        <option value="quest-1">Nhà bạn ở đâu?</option>
                                        <option value="quest-2">Số điện thoại của bạn là gì?</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="#">Câu trả lời của bạn</label>
                                </td>
                                <td>
                                    <input type="text" name="yourAnswer" id="">
                                </td>
                            </tr>
                        </table>
                    </li>
                </ol>
                <button class="submit-btn" type="submit">Đăng ký</button>
            </form>
        </div>
    </div>
</body>

</html>