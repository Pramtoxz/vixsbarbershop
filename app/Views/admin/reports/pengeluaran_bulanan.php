<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Laporan Pengeluaran Bulanan</h1>
        <p class="mb-0 text-black">Data Uang Keluar per Bulan</p>
    </div>
    <div>
        <a href="<?= site_url('admin/reports/pengeluaran-bulanan/print') ?>" id="printBtn" target="_blank" class="btn btn-primary btn-sm">
            <i class="bi bi-printer me-1"></i> Cetak
        </a>
    </div>
    </div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Filter Data</h6>
    </div>
    <div class="card-body">
        <form id="filterForm">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <select class="form-control" id="bulan" name="bulan">
                            <option value="">- Pilih Bulan -</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select class="form-control" id="tahun" name="tahun">
                            <option value="">- Pilih Tahun -</option>
                            <?php $currentYear = date('Y'); for ($year = $currentYear - 5; $year <= $currentYear + 5; $year++) { echo "<option value=\"$year\">$year</option>"; } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" style="margin-top: 32px;">
                        <button type="button" id="filterBtn" class="btn btn-primary">Filter</button>
                        <button type="button" id="showAllBtn" class="btn btn-info">Tampilkan Semua</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran</h6>
                <div id="loadingIndicator" class="spinner-border spinner-border-sm text-primary d-none" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="card-body">
                <div id="instructionMessage" class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Silakan pilih bulan dan tahun terlebih dahulu.
                </div>
                <div id="tableContent" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">Tanggal</th>
                                    <th>Keterangan</th>
                                    <th width="20%" class="text-end">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <p id="tableInfo2" class="text-center">Menampilkan 0 data</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function () {
        var tableData = [];

        function loadData(bulan, tahun, showAll) {
            $('#loadingIndicator').removeClass('d-none');
            $.get('<?= site_url('admin/reports/pengeluaran-bulanan/data') ?>', {
                bulan: bulan,
                tahun: tahun,
                show_all: showAll ? 'true' : 'false'
            }, function (resp) {
                if (resp.success) {
                    tableData = resp.data || [];
                    renderTable();
                    updatePrintUrl(bulan, tahun);
                    if (tableData.length > 0) {
                        $('#instructionMessage').hide();
                        $('#tableContent').show();
                    } else {
                        $('#instructionMessage').show();
                        $('#tableContent').hide();
                    }
                }
            }, 'json').always(function () {
                $('#loadingIndicator').addClass('d-none');
            });
        }

        function renderTable() {
            var tbody = $('#tableData tbody');
            tbody.empty();
            if (!tableData.length) {
                tbody.html('<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>');
                $('#tableInfo2').text('Menampilkan 0 data');
                return;
            }
            var no = 1;
            tableData.forEach(function (item) {
                var row = '<tr>' +
                    '<td>' + (no++) + '</td>' +
                    '<td>' + (item.tanggal || '') + '</td>' +
                    '<td>' + (item.keterangan || '') + '</td>' +
                    '<td class="text-end">' + (item.jumlah_formatted || 'Rp 0') + '</td>' +
                    '</tr>';
                tbody.append(row);
            });
            $('#tableInfo2').text('Menampilkan ' + tableData.length + ' data');
        }

        function updatePrintUrl(bulan, tahun) {
            var url = '<?= site_url('admin/reports/pengeluaran-bulanan/print') ?>';
            var params = [];
            if (bulan) params.push('bulan=' + bulan);
            if (tahun) params.push('tahun=' + tahun);
            if (params.length) url += '?' + params.join('&');
            $('#printBtn').attr('href', url);
        }

        $('#filterBtn').on('click', function () {
            var bulan = $('#bulan').val();
            var tahun = $('#tahun').val();
            if (!bulan || !tahun) {
                alert('Silakan pilih bulan dan tahun');
                return;
            }
            loadData(bulan, tahun, false);
        });

        $('#showAllBtn').on('click', function () {
            loadData('', '', true);
        });
    });
</script>
<?= $this->endSection() ?>


