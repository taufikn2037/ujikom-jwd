<?php
require 'koneksi.php';

/**
 * Fungsi mengambil seluruh data kamar yang ada pada db.
 *
 * @return array array asosiatif berisi seluruh data kamar.
 */
function getAllDataKamar()
{
    global $conn;
    $query = "SELECT * FROM tb_kamar";
    if (mysqli_query($conn, $query)) {
        return mysqli_query($conn, $query);
    } else {
        echo mysqli_error($conn);
    }
}


/**
 * Fungsi menambahkan data pesan hotel kedalam db.
 * 
 * @param array $data data dari form pesan.
 */
function insertDataHotel($data)
{
    global $conn;
    $now = date("Y-m-d H:i:s");
    if ($data['breakfast'] != 'Ya') {
        $data['breakfast'] = 'Tidak';
    }


    $query = "INSERT INTO tb_hotel VALUES ('', '$data[nama]', '$data[jenis_kelamin]','$data[no_identitas]', '$data[tanggal]', $data[durasi], 
              '$data[breakfast]', $data[kamar], '$now', NULL)";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo mysqli_error($conn);
    }
}