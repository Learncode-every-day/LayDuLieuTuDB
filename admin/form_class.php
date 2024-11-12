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
        $query = "SELECT * FROM form_1 ORDER BY ID DESC
        UNION ALL
        Select * FROM form_2 Order by ID desc
        UNION ALL
        Select * from form_3 order by ID desc
        ";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_info_form() {}
}

?>