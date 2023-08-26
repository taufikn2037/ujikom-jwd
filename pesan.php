<?php include 'db/function_db.php'; ?>
<?php include 'layout/header.php'; ?>
<?php include 'layout/navbar.php'; ?>


<?php
if (isset($_POST['submit'])) {
    insertDataHotel($_POST);
}
if (isset($_GET['id_kamar'])) {
    $id_kamar = $_GET['id_kamar'];
} else {
    $id_kamar = 0;
}
$data_kamar = getAllDataKamar();
?>

<section class="py-5">
    <h1 class="text-center">Pesan Kamar</h1>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card custom-card shadow">
                    <h5 class="card-header text-center">Form Pemesanan</h5>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label">Nama Pemesan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="exampleRadios1" value="Laki-laki" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Laki-laki
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="exampleRadios2" value="Perempuan">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="no_identitas" class="col-sm-3 col-form-label">Nomor Identitas</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_identitas" name="no_identitas"
                                        pattern=".{16,16}" title="Harus 16 digit" required
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kelas" class="col-sm-3 col-form-label">Tipe Kamar</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="kamar" name="kamar" onchange="updateHarga()"
                                        required>
                                        <option value="0" disabled="disabled" selected>Pilih Tipe Kamar</option>
                                        <?php
                                    foreach ($data_kamar as $kamar): ?>
                                        <option value="<?= $kamar['id_kamar'] ?>"
                                            <?= $kamar['id_kamar'] == $id_kamar ? "selected" : "" ?>>
                                            <?= $kamar['jenis_kamar'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3 col-form-label">Harga</div>
                                <div class="col-sm-9 col-form-label" id="block_harga_hotel"></div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Pesan</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="durasi" class="col-sm-3 col-form-label">Durasi Menginap</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" class="form-control" id="durasi" name="durasi">
                                </div>
                                <label class="col-sm-2 col-form-label">Hari</label>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Termasuk Breakfast</label>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Ya" id="breakfast"
                                            name="breakfast">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Ya
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3 col-form-label">Total Bayar</div>
                                <div class="col-sm-9 col-form-label" id="total_bayar"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 my-1">
                                    <button type="button" class="btn btn-primary btn-block text-white"
                                        style="width:100%" onclick="totalHarga()">Hitung Total Bayar</button>
                                </div>
                                <div class="col-md-4 my-1">
                                    <button type="submit" class="btn btn-primary btn-block text-white"
                                        style="width:100%" name="submit">Simpan</button>
                                </div>
                                <div class="col-md-4 my-1">
                                    <button type="button" class="btn btn-primary btn-block text-white"
                                        style="width:100%">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
document.getElementById('kamar').setAttribute('selected', 'selected');
var harga = <?php
    $harga = array(0); foreach ($data_kamar as $kamar) {
        $harga += ["$kamar[id_kamar]" => intval($kamar['harga'])];
    }
    echo json_encode($harga); ?>;

function updateHarga() {
    let kamar = document.getElementById('kamar').value;
    if (kamar != 0) {
        document.getElementById('block_harga_hotel').textContent = "Rp. " + numberFormat(harga[kamar]);
    }
}

function totalHarga() {
    let kamar = document.getElementById('kamar').value;
    let durasi = document.getElementById('durasi').value;
    let breakfast = document.getElementById('breakfast');
    let total_bayar = harga[kamar] * durasi;
    if (durasi > 3) {
        total_bayar = total_bayar - total_bayar * 1 / 10
    }
    if (breakfast.checked) {
        total_bayar = total_bayar + 80000
    }
    document.getElementById('total_bayar').textContent = "Rp. " + numberFormat(total_bayar);

}

function numberFormat(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

updateHarga();
</script>


<?php include 'layout/footer.php'; ?>