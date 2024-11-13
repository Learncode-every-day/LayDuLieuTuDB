<?php session_start();

include_once "admin/form_class.php";

$form = new Form();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang 2</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/styles.css">

    <style>
        .btn-bottom {
            display: flex;
            margin-top: 20px;
        }

        .submit-btn,

        .data-to-database {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.3rem;
            height: 50px;
            width: 150px;
            border-radius: 5px;
            background: #ccc;
            color: #050;
            transition: all .5s linear;
            cursor: pointer;
        }

        .submit-btn {
            border: none;
            margin-right: 10px;
        }

        .submit-btn:hover,

        .data-to-database:hover {
            background: #fff;
            color: #040;
        }
    </style>
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
                                    <input type="text" class="last-name" name="last-name" placeholder="Tên họ"
                                        value="<?php echo $_SESSION['lastName'] ?>">
                                    <input type="text" class="first-name" placeholder="Tên gọi"
                                        value="<?php echo $_SESSION['firstName'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="#!">Giới tính</label>
                                </td>
                                <td>
                                    <select name="gender" id="">
                                        <option value="<?php echo $_SESSION['gender'] ?>">
                                            <?php
                                            if ($_SESSION['gender'] === "female")
                                                echo "Nữ";
                                            else if ($_SESSION['gender'] === "male")
                                                echo "Nam";
                                            else
                                                echo "Khác";
                                            ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="#!">Ngày tháng năm sinh</label></td>
                                <td><select name="" id="">
                                        <option value="<?php echo $_SESSION['day'] ?>">
                                            <?php echo $_SESSION['day'] ?>
                                        </option>

                                    </select>
                                    <select name="month" id="">
                                        <option value="<?php echo $_SESSION['month'] ?>">
                                            <?php echo $_SESSION['month'] ?>
                                        </option>
                                    </select>
                                    <input type="number" name="" id="" placeholder="Nhập năm" min="1924" max="2124"
                                        value="<?php echo $_SESSION['year'] ?>">
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="#">Tôi sống tại</label></td>
                                <td><select name="location" id="">
                                        <option value="<?php echo $_SESSION['location'] ?>">
                                            <?php
                                            if ($_SESSION['location'] === "VN")
                                                echo "Việt Nam";
                                            else if ($_SESSION['location'] === "America")
                                                echo "Mĩ";
                                            ?>
                                        </option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><label for="#">Mã bưu chính</label></td>
                                <td><input type="text" name="maBuuChinh" id="" placeholder="Nhập mã bưu chính"
                                        value="<?php echo $_SESSION['maBuuChinh'] ?>"></td>
                            </tr>
                        </table>


                    </li>
                    <li class="quest-2">
                        <h3 class="quest-2__heading">Chọn ID và mật khẩu</h3>
                        <table>
                            <tr>
                                <td><label for="#">Yahoo ID và Email</label></td>
                                <td><input type="text" name="email" id=""
                                        value="<?php echo $_SESSION['email'] ?>"><span>@yahoo.com.vn</span></td>
                            </tr>
                            <tr>
                                <td><label for="#">Mật khẩu</label></td>
                                <td><input type="password" name="password" id="" placeholder="Mời nhập mật khẩu"
                                        value="<?php echo $_SESSION['pass'] ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="#">Đánh lại mật khẩu</label></td>
                                <td><input type="password" name="reload-password" id=""
                                        placeholder="Mời nhập lại mật khẩu của bạn"
                                        value="<?php echo $_SESSION['pass'] ?>"></td>
                            </tr>
                        </table>
                    </li>
                    <li class="quest-3">
                        <h3 class="quest-3__heading">Để đề phòng trường hợp bạn quên ID hoặc mật khẩu...</h3>
                        <table>
                            <tr>
                                <td><label style="font-style:italic; " for="#">Email Thay Thế Khác</label>
                                </td>
                                <td><input type="text" name="moreEmail" placeholder="Nhập thêm email"
                                        value="<?php echo $_SESSION['moreEmail'] ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="#">Câu hỏi bảo mật</label></td>
                                <td><select name="questionForSecurity" id="">
                                        <option value="<?php echo $_SESSION['questionForSecurity'] ?>">
                                            <?php
                                            if ($_SESSION['questionForSecurity'] === "quest-1")
                                                echo "Nhà bạn ở đâu?";
                                            else
                                                echo "Số điện thoại của bạn là gì?";
                                            ?>
                                        </option>
                                        <option value="quest-1">Nhà bạn ở đâu?</option>
                                        <option value="quest-2">Số điện thoại của bạn là gì?</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><label for="#">Câu trả lời của bạn</label></td>
                                <td><input type="text" name="yourAnswer" id=""
                                        value="<?php echo $_SESSION['yourAnswer'] ?>"></td>
                            </tr>
                        </table>
                    </li>
                </ol>
                <div class="btn-bottom">
                    <button class="submit-btn" type="submit">Đăng ký</button>
                    <a class="data-to-database"
                        href="http://localhost/layDuLieu/page1.php?mess='Chúc mừng bạn thêm thành công dữ liệu vào database'">Thêm
                    </a>
                    <a style="width: 250px; margin-left: 15px;" class="data-to-database"
                        href="http://localhost/layDuLieu/list-info.php">Xem
                        database</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>