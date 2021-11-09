<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18"></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Konsumen</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="checkout-tabs">
                <div class="row">

                    <div class="col-xl-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-pane fade show active" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h4 class="card-title">Metode Pembayaran: <?= $check['metode']; ?></h4>
                                        <?php if ($order['metode'] == 'Tunai') : ?>
                                            <p></p>
                                        <?php else : ?>
                                            <div>
                                                <button type="button" class="btn btn-info btn-lg waves-effect btn-label waves-light" data-toggle="modal" data-target="#myModal"><i class="bx bx-upload label-icon"></i> Upload Bukti Pembayaran DP</button>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($check['metode'] === 'KPR') : ?>

                                        <div class="row mt-3">
                                            <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6 ">
                                                <h3>Contoh Simulasi KPR</h3>
                                                <form method="post" onsubmit="return process()">
                                                    <div class="form-group">
                                                        <label for="harga_rumah">Harga Rumah (dalam Rp)</label>
                                                        <input type="text" name="harga_rumah" id="harga_rumah" class="form-control input-sm" required="required" value="<?= $order['harga_rumah']; ?>" disabled />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uang_muka">Uang Muka (DP) (minimal 20% dari harga rumah, dalam Rp)</label>
                                                        <input type="number" name="uang_muka" min="1" id="uang_muka" class="form-control input-sm" required="required" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="margin">Bunga Flat (dalam persen disetarakan, asumsi kisaran 7.00 - 12.50)</label>
                                                        <input type="number" name="margin" min="5" max="20" id="margin" class="form-control input-sm" required="required" step="any" placeholder="Contoh : 8.50" value="7" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tenor">Jangka Waktu (dalam tahun)</label>
                                                        <select name="tenor" id="tenor" class="form-control input-sm">
                                                            <option value="5">5 tahun</option>
                                                            <option value="10">10 tahun</option>
                                                            <option value="15" selected>15 tahun</option>
                                                            <option value="20">20 tahun</option>
                                                            <option value="25">25 tahun</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="penghasilan">Total Penghasilan Bulanan (gabungan suami istri, dalam Rp)</label>
                                                        <input type="number" name="penghasilan" id="penghasilan" class="form-control input-sm" required="required" placeholder="Contoh : 10000000" value="10000000" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cicilan_lain">Cicilan Lain per Bulan (bila ada (misal kredit mobil atau KPR), dalam Rp)</label>
                                                        <input type="number" name="cicilan_lain" id="cicilan_lain" class="form-control input-sm" placeholder="Contoh : 1500000" value="0" />
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-md col-xs-12">HITUNG CICILAN</button>
                                                </form>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                                                <h3>Perhitungan</h3>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="3" valign="top">Pinjaman </td>
                                                            <td> = Harga Rumah - Uang Muka</td>
                                                        </tr>
                                                        <tr>
                                                            <td> = Rp <span id="hasil_harga_rumah">0</span> - Rp <span id="hasil_uang_muka">0</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td> = Rp <strong><span id="pinjaman">0</span></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3" valign="top">Total Pinjaman</td>
                                                            <td> = Pinjaman + (Pinjaman * Bunga * Tenor)</td>
                                                        </tr>
                                                        <tr>
                                                            <td> = Rp <span class="hasil_pinjaman">0</span> + (Rp <span class="hasil_pinjaman">0</span> * <span id="hasil_margin">0</span>% * <span class="hasil_tenor">0</span> tahun)</td>
                                                        </tr>
                                                        <tr>
                                                            <td> = Rp <strong><span id="total_pinjaman">0</span></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3" valign="top">Cicilan / bulan </td>
                                                            <td> = Total Pinjaman / Tenor / 12 bulan</td>
                                                        </tr>
                                                        <tr>
                                                            <td> = Rp <span id="hasil_total_pinjaman">0</span> / <span class="hasil_tenor">0</span> / 12 </td>
                                                        </tr>
                                                        <tr>
                                                            <td> = Rp <strong><span id="cicilan_bulanan">0</span></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2" valign="top">Persentase Cicilan</td>
                                                            <td> = Cicilan Bulanan / Penghasilan Bulanan</td>
                                                        </tr>
                                                        <tr>
                                                            <td> = <strong><span id="persentase_cicilan">0</span> %</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">Pengajuan KPR kemungkinan besar diterima bila persentase cicilan &lt;= 40 persen</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="my-3">
                                            <div class="alert alert-danger" role="alert">
                                                <h5 class="text-justify">Catatan: perhitungan ini adalah hasil perkiraan aplikasi KRP secara umum dengan bunga anuitas flat. Data perhitungan di atas dapat berbeda dengan perhitungan bank. <br> Untuk perhitungan yang akurat silahkan hubungi kantor atau dapat dicek pada KPR masing-masing bank di bawah. </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mt-4">
                                                    <h5 class="font-size-15 mb-3">Simulasi KPR BANK :</h5>

                                                    <div class="button-items">
                                                        <a href=https://bri.co.id/simulasi-kpr" target="_blank" type="button" class="btn btn-primary waves-effect waves-light w-sm" data-toggle="tooltip" data-placement="bottom" title="Simulasi KPR BRI">
                                                            BRI
                                                        </a>
                                                        <a href="https://www.btnproperti.co.id/simulasi-kpr.html" target="_blank" type="button" class="btn btn-warning waves-effect waves-light w-sm" data-toggle="tooltip" data-placement="bottom" title="Simulasi KPR BTN">
                                                            BTN
                                                        </a>
                                                        <a href="https://www.bankmandiri.co.id/web/guest/kalkulator-kpr" target="_blank" type="button" class="btn btn-info waves-effect waves-light w-sm" data-toggle="tooltip" data-placement="bottom" title="Simulasi KPR Mandiri">
                                                            Mandiri
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            function process(e) {
                                                if (!e) e = window.event;
                                                e.preventDefault();
                                                var harga_rumah = parseInt(document.getElementById('harga_rumah').value);
                                                var uang_muka = parseInt(document.getElementById('uang_muka').value);
                                                var margin = parseFloat(document.getElementById('margin').value).toFixed(2);
                                                var tenor = parseInt(document.getElementById('tenor').value);
                                                var penghasilan = parseInt(document.getElementById('penghasilan').value);
                                                var cicilan_lain = parseInt(document.getElementById('cicilan_lain').value);
                                                const LIMIT = 40;
                                                // error if...
                                                // uang_muka >= harga_rumah
                                                if (uang_muka >= harga_rumah) {
                                                    alert('Uang Muka tidak boleh lebih dari Harga Rumah');
                                                    return;
                                                }
                                                // uang_muka < 0.2 * harga_rumah
                                                if (uang_muka < 0.2 * harga_rumah) {
                                                    alert('Uang Muka minimal 20 persen dari Harga Rumah');
                                                    return;
                                                }
                                                // penghasilan >= harga rumah - uang_muka
                                                if (penghasilan >= harga_rumah) {
                                                    alert('Penghasilan per bulan lebih dari Harga Rumah');
                                                    return;
                                                }
                                                // cicilan_lain >= penghasilan
                                                if (cicilan_lain >= penghasilan) {
                                                    alert('Cicilan Lain lebih dari Penghasilan per Bulan');
                                                    return;
                                                }
                                                var pinjaman = harga_rumah - uang_muka;
                                                var total_pinjaman = pinjaman + (margin / 100 * pinjaman * tenor);
                                                var cicilan_bulanan = parseInt(total_pinjaman / tenor / 12);
                                                var persentase_cicilan = parseFloat((cicilan_bulanan + cicilan_lain) / penghasilan * 100).toFixed(2);
                                                document.getElementById('hasil_harga_rumah').innerHTML = addCommas(harga_rumah);
                                                document.getElementById('hasil_uang_muka').innerHTML = addCommas(uang_muka);
                                                document.getElementById('hasil_margin').innerHTML = margin;
                                                document.querySelectorAll('.hasil_pinjaman')[0].innerHTML = document.querySelectorAll('.hasil_pinjaman')[1].innerHTML = addCommas(pinjaman);
                                                document.querySelectorAll('.hasil_tenor')[0].innerHTML = document.querySelectorAll('.hasil_tenor')[1].innerHTML = tenor;
                                                document.querySelectorAll('.hasil_pinjaman')[0].innerHTML =
                                                    document.querySelectorAll('.hasil_pinjaman')[1].innerHTML =
                                                    document.getElementById('pinjaman').innerHTML = addCommas(pinjaman);
                                                document.getElementById('hasil_total_pinjaman').innerHTML =
                                                    document.getElementById('total_pinjaman').innerHTML = addCommas(total_pinjaman);
                                                document.getElementById('cicilan_bulanan').innerHTML = addCommas(cicilan_bulanan);
                                                document.getElementById('persentase_cicilan').innerHTML = persentase_cicilan;
                                                if (persentase_cicilan > LIMIT)
                                                    document.getElementById('persentase_cicilan').style.color = 'red';
                                                else
                                                    document.getElementById('persentase_cicilan').style.color = 'green';
                                            }

                                            function addCommas(x) {
                                                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }
                                        </script>
                                    <?php else : ?>
                                        <div class="p-4 border">
                                            <form action="<?= base_url('konsumen/buktibayar'); ?>" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group row mb-2">
                                                            <label class="col-md-4 col-form-label">Pilih Bank</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control select2" name="bank_id" required>
                                                                    <option value="">--Pilih Bank--</option>
                                                                    <?php foreach ($bank as $b) : ?>
                                                                        <option value="<?= $b['id']; ?>"><?= $b['nama_bank']; ?> - <?= $b['no_rek']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <input type="hidden" name="id" value="<?= $order['id']; ?>">
                                                            <label class="col-md-4 col-form-label" for="image">Bukti Pembayaran</label>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control customs-file-input" name="image" id="image" placeholder="Bukti Pembayaran" required>
                                                                <!-- <label class="custom-file-label opacity-0" for="image"> Select File </label> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-sm-6">

                                                    </div> <!-- end col -->
                                                    <div class="col-sm-6">
                                                        <div class="text-sm-right">
                                                            <button type="submit" type class="btn btn-success">
                                                                <i class="mdi mdi-truck-fast mr-1"></i> Simpan </button>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card shadow-none border mb-0">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Data Pesanan Rumah</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 table-nowrap">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><img src="<?= base_url('rumah/') . $order['image']; ?>" alt="product-img" title="product-img" class="avatar-md"></th>
                                                    <td>
                                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark"><?= $order['kategori']; ?></a></h5>
                                                        <?php $rupiah = "Rp " . number_format($order['harga_rumah'], 2, ',', '.'); ?>
                                                        <b><?= $rupiah; ?></b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?= base_url('konsumen/buktibayarkpr'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $order['id']; ?>">
                    <div class="form-group row mb-2">
                        <label class="col-md-12 col-form-label">Pilih Bank</label>
                        <div class="col-md-12">
                            <select class="form-control select2" name="bank_id" required>
                                <option value="">--Pilih Bank--</option>
                                <?php foreach ($bank as $b) : ?>
                                    <option value="<?= $b['id']; ?>"><?= $b['nama_bank']; ?> - <?= $b['no_rek']; ?> - <?= $b['nama_pemilik']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Upload Bukti Pembayaran</label><br>
                        <input type="file" class="form-control customs-file-input" name="image" id="image" placeholder="Bukti Pembayaran" required>
                        <!-- <label class="custom-file-label opacity-0" for="image"> Select File </label> -->
                    </div>

                    <div class="form-group">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-lg waves-effect btn-label waves-light"><i class="bx bx-save label-icon "></i> Save</button>
                            <button type="button" class="btn btn-warning btn-lg waves-effect btn-label waves-light" data-dismiss="modal"><i class="bx bx-error label-icon "></i> Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Page-content -->
<script src="<?= base_url('assets/js/jquery-3.6.0.js'); ?>"></script>
<script>
    $('.customs-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<script src="<?= base_url('assets/jquery/jquery-3.5.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/jquery/jquery.validate.min.js'); ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/numeraljs/numeral.min.js'); ?>"></script>
<script src="<?= base_url('assets/custom.js'); ?>"></script>