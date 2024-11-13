<?php
include 'admin/form_class.php';
$form = new Form();

$form_id = $_GET['form_id'];
$delete_info = $form->delete_info_form($form_id);
