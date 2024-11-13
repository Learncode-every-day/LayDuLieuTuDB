<?php
include "database.php";

?>

<?php
class Form
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_form($lastName, $firstName, $gender, $dateTime, $location, $maBuuChinh, $email, $pass, $moreEmail, $questionForSecurity, $yourAnswer)
    {
        $query = "INSERT INTO form_1(Ten_ho, Ten_goi, Gioi_tinh, Ngay_thang_nam, Dia_diem_song, Ma_buu_chinh) VALUES ('$lastName', '$firstName', '$gender', '$dateTime', '$location', '$maBuuChinh');
        ";

        $result = $this->db->insert($query);

        $query = " INSERT INTO form_2(Yahoo_id_hoac_email, Mat_khau) VALUES ('$email', '$pass');";
        $result = $this->db->insert($query);

        $query = "INSERT INTO form_3(Email_thay_the, Cau_hoi_bao_mat, Cau_tra_loi) VALUES ('$moreEmail', '$questionForSecurity', '$yourAnswer');";
        $result = $this->db->insert($query);

        header('Location: http://localhost/layDuLieu/page2.php');
    }

    public function show_info_form()
    {
        $query = "SELECT * FROM form_1 
        inner join  form_2 on form_1.id = form_2.id
        inner join  form_3 on form_1.id = form_3.id
        ";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_info_form($info_id)
    {
        $query = "DELETE form_1, form_2, form_3 FROM form_1 inner join form_2 on form_1.id = form_2.id inner join form_3 on form_3.id = form_1.id where form_1.id = '$info_id'";
        $result = $this->db->delete($query);
        header("Location: http://localhost/layDuLieu/list-info.php");

        return $result;
    }

    public function get_info($info_id)
    {
        $query = "SELECT * FROM form_1 
        inner join  form_2 on form_1.id = form_2.id
        inner join  form_3 on form_1.id = form_3.id 
        Where form_1.id ='$info_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_info($info_id, $lastName, $firstName, $gender, $dateTime, $location, $maBuuChinh, $email, $pass, $moreEmail, $questionForSecurity, $yourAnswer)
    {
        // $query = "UPDATE (SELECT * FROM form_1 
        // inner join  form_2 on form_1.id = form_2.id
        // inner join  form_3 on form_1.id = form_3.id) SET Ten_ho = '$lastName', Ten_goi = '$firstName', Gioi_tinh = '$gender', Ngay_thang_nam = '$dateTime', Dia_diem_song = '$location', Ma_buu_chinh = '$maBuuChinh', Yahoo_id_hoac_email = '$email', Mat_khau = '$pass', Email_thay_the = '$moreEmail', Cau_hoi_bao_mat = '$questionForSecurity', Cau_tra_loi = '$yourAnswer'";
        $query = "UPDATE form_1
        SET Ten_ho = '$lastName',
            Ten_goi = '$firstName',
            Gioi_tinh = '$gender',
            Ngay_thang_nam = '$dateTime',
            Dia_diem_song = '$location', 
            Ma_buu_chinh = '$maBuuChinh'
        WHERE id IN (
            SELECT form_1.id
            FROM form_1
            INNER JOIN form_2 ON form_1.id = form_2.id
            INNER JOIN form_3 ON form_1.id = form_3.id
        );";
        $result = $this->db->update($query);
        $query = "UPDATE form_2
        SET Yahoo_id_hoac_email = '$email',
            Mat_khau = '$pass'
        WHERE id IN (
            SELECT form_2.id
            FROM form_1
            INNER JOIN form_2 ON form_1.id = form_2.id
            INNER JOIN form_3 ON form_1.id = form_3.id
        );";
        $result = $this->db->update($query);
        $query = "UPDATE form_3
        SET Email_thay_the = '$moreEmail',
            Cau_hoi_bao_mat = '$questionForSecurity',
            Cau_tra_loi = '$yourAnswer'
        WHERE id IN (
            SELECT form_3.id
            FROM form_1
            INNER JOIN form_2 ON form_1.id = form_2.id
            INNER JOIN form_3 ON form_1.id = form_3.id
        );";
        $result = $this->db->update($query);
        header("Location: http://localhost/layDuLieu/list-info.php");
        return $result;
    }
}

?>