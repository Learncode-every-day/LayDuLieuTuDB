<?php
include 'admin/form_class.php';

session_start();

$form = new Form();


$show_form = $form->show_info_form();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách thông tin</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/styles.css">

    <style>
    .container {
        margin: 0 40px;
    }

    .header {
        text-align: center;
        font-size: 3rem;
        font-weight: bold;
        margin: 50px 40px;
    }

    .separate {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .line {
        width: 80%;
        height: 2px;
        background: #000;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #400090;
        color: white;
    }

    td a {
        text-decoration: none;
        color: #400090;
        font-weight: bold;
    }

    td a:hover {
        color: #0056b3;
    }

    tbody .action {
        height: inherit;
        display: flex;
        justify-content: center;
    }

    .btn-edit:first-child {
        position: relative;
    }

    .btn-edit:first-child::before {
        position: absolute;
        content: "|";
        top: 0;
        bottom: 0;
        right: 0;
    }

    .btn-edit {
        display: block;
        width: 50px;
        border-radius: 5px;
        color: #ddd;
    }
    </style>
</head>

<body>
    <header class="header">Danh sách thông tin người dùng</header>
    <div class="separate">
        <div class="line"></div>
    </div>
    <div class="info-table">
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên họ</th>
                        <th>Tên gọi</th>
                        <th>Giới tính</th>
                        <th>Ngày/tháng/năm</th>
                        <th>Địa điểm sống</th>
                        <th>Mã Bưu Chính</th>
                        <th>Yahoo hoặc Email</th>
                        <th>Mật khẩu</th>
                        <th>Email thay thế</th>
                        <th>Câu hỏi bảo mật</th>
                        <th>Câu trả lời</th>
                        <th>Lựa chọn</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if ($show_form) {
                        $i = 0;
                        while ($result = $show_form->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['Ten_ho']; ?></td>
                        <td>
                            <?php echo $result['Ten_goi']; ?>
                        </td>
                        <td>
                            <?php
                                    if ($result['Gioi_tinh'] === "male")
                                        echo "Nam";
                                    else if ($result['Gioi_tinh'] === "female")
                                        echo "Nữ";
                                    else
                                        echo "Khác";
                                    ?>
                        </td>
                        <td><?php echo $result['Ngay_thang_nam']; ?></td>
                        <td><?php echo $result['Dia_diem_song']; ?></td>
                        <td><?php echo $result['Ma_buu_chinh']; ?></td>
                        <td><?php echo ($result['Yahoo_id_hoac_email'] . "@yahoo.com.vn"); ?></td>
                        <td><?php echo $result['Mat_khau'] ?></td>
                        <td><?php echo $result['Email_thay_the'] ?></td>
                        <td>
                            <?php
                                    if ($result['Cau_hoi_bao_mat'] === "quest-1")
                                        echo "Nhà bạn ở đâu?";
                                    else if ($result['Cau_hoi_bao_mat'] === "quest-2")
                                        echo "Số điện thoại của bạn là gì?";
                                    ?>
                        </td>
                        <td><?php echo $result['Cau_tra_loi']; ?></td>
                        <td>
                            <div class="action">
                                <a class="btn-edit"
                                    href="http://localhost/layDuLieu/edit-info.php?form_id=<?php echo $result['ID']?>&dateTime=<?php echo $result['Ngay_thang_nam'] ?>">Sửa</a>
                                <a class="btn-edit"
                                    href="http://localhost/layDuLieu/delete-info.php?form_id=<?php echo $result['ID'] ?>">Xóa</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>