<?php
include 'admin/form_class.php';

session_start();

$form = new Form();
$form_id = $_GET['form_id'];
$date_time = $_GET['dateTime'];
$element = explode('/', $date_time);
$get_form_info = $form->get_info($form_id);
if ($get_form_info) {
    $resultA = $get_form_info->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $last_name = $_POST['last-name'];
    $first_name = $_POST['first-name'];
    $gender = $_POST['gender'];
    $date_time = $_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year'];
    $location = $_POST['location'];
    $maBuuChinh = $_POST['maBuuChinh'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $more_email = $_POST['moreEmail'];
    $question_for_security = $_POST['questionForSecurity'];
    $your_answer = $_POST['yourAnswer'];
    $update_info = $form->update_info($form_id, $last_name, $first_name, $gender, $date_time, $location, $maBuuChinh, $email, $pass, $more_email, $question_for_security, $your_answer);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/styles.css">

    <style>
        header {
            margin-top: 50px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
        }

        .separate {
            margin-top: 15px;
            display: flex;
            height: 2px;
            width: 100%;
            justify-content: center;
        }

        .line {
            width: 80%;
            height: inherit;
            background: #000;
        }

        .container {
            margin: 0 30px;
        }
    </style>
</head>

<body>
    <header>Sửa thông tin người dùng</header>
    <div class="separate">
        <div class="line"></div>
    </div>
    <div class="container">
        <form action="#!" class="form-edit" method="post">
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
                                    value="<?php echo $resultA['Ten_ho'] ?>">
                                <input type="text" class="first-name" name="first-name" placeholder="Tên gọi"
                                    value="<?php echo $resultA['Ten_goi'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="#!">Giới tính</label>
                            </td>
                            <td>
                                <select name="gender" id="">
                                    <option value="<?php echo $resultA['Gioi_tinh'] ?>">
                                        <?php
                                        if ($resultA['Gioi_tinh'] === "female")
                                            echo "Nữ";
                                        else if ($resultA['Gioi_tinh'] === "male")
                                            echo "Nam";
                                        else
                                            echo "Khác";
                                        ?></option>
                                    <?php
                                    if ($resultA['Gioi_tinh'] === "female") {
                                        echo "<option value='male'>" . "Nam" . "</option>";
                                        echo "<option value='other'>" . "Khác" . "</option>";
                                    } else if ($resultA['Gioi_tinh'] === "male") {
                                        echo "<option value='female'>" . "Nữ" . "</option>";
                                        echo "<option value='other'>" . "Khác" . "</option>";
                                    } else {
                                        echo "<option value='female'>" . "Nữ" . "</option>";
                                        echo "<option value='male'>" . "Nam" . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="#!">Ngày tháng năm sinh</label></td>
                            <td><select name="day" id="">
                                    <option value="<?php echo $element[0] ?>">
                                        <?php echo $element[0] ?>
                                        <?php
                                        for ($i = 1; $i <= 31; $i++) {
                                            if ($i === (int)$element[0])
                                                continue;
                                            echo "<option value='" . $i . "'>" . $i . "</option>";
                                        }
                                        ?>
                                    </option>

                                </select>
                                <select name="month" id="">
                                    <option value="<?php echo $element[1] ?>">
                                        <?php echo $element[1] ?>
                                    </option>
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        if ($i === (int)$element[1])
                                            continue;
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                                <input type="number" name="year" id="" placeholder="Nhập năm" min="1924" max="2124"
                                    value="<?php echo $element[2] ?>">
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="#">Tôi sống tại</label></td>
                            <td><select name="location" id="">
                                    <option value="<?php echo $resultA['Dia_diem_song'] ?>">
                                        <?php
                                        if ($resultA['Dia_diem_song'] === "VN")
                                            echo "Việt Nam";
                                        else if ($resultA['Dia_diem_song'] === "America")
                                            echo "Mĩ";
                                        ?>
                                    </option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="#">Mã bưu chính</label></td>
                            <td><input type="text" name="maBuuChinh" id="" placeholder="Nhập mã bưu chính"
                                    value="<?php echo $resultA['Ma_buu_chinh'] ?>"></td>
                        </tr>
                    </table>


                </li>
                <li class="quest-2">
                    <h3 class="quest-2__heading">Chọn ID và mật khẩu</h3>
                    <table>
                        <tr>
                            <td><label for="#">Yahoo ID và Email</label></td>
                            <td><input type="text" name="email" id=""
                                    value="<?php echo $resultA['Yahoo_id_hoac_email'] ?>"><span>@yahoo.com.vn</span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="#">Mật khẩu</label></td>
                            <td><input type="password" name="password" id="" placeholder="Mời nhập mật khẩu"
                                    value="<?php echo $resultA['Mat_khau'] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="#">Đánh lại mật khẩu</label></td>
                            <td><input type="password" name="reload-password" id=""
                                    placeholder="Mời nhập lại mật khẩu của bạn"
                                    value="<?php echo $resultA['Mat_khau'] ?>">
                            </td>
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
                                    value="<?php echo $resultA['Email_thay_the'] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="#">Câu hỏi bảo mật</label></td>
                            <td><select name="questionForSecurity" id="">
                                    <option value="<?php echo $resultA['Cau_hoi_bao_mat'] ?>">
                                        <?php
                                        if ($resultA['Cau_hoi_bao_mat'] === "quest-1")
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
                                    value="<?php echo $resultA['Cau_tra_loi'] ?>">
                            </td>
                        </tr>
                    </table>
                </li>
            </ol>
            <button type="submit">Sửa</button>
        </form>
    </div>
</body>

</html>