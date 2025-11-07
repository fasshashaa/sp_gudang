<!-- Modal Tambah Mesin -->
<div class="modal fade" id="createMesinModal" tabindex="-1" aria-labelledby="createMesinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMesinModalLabel">Tambah Data Mesin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mesin.store') }}" method="POST" id="createMesinForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kode" class="form-label">Kode Mesin</label>
                            <input type="text" class="form-control" id="kode" name="kode" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_mesin" class="form-label">Nama Mesin</label>
                            <input type="text" class="form-control" id="nama_mesin" name="nama_mesin" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="no_motor" class="form-label">No. Motor</label>
                            <input type="text" class="form-control" id="no_motor" name="no_motor">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="type_motor" class="form-label">Tipe Motor</label>
                            <input type="text" class="form-control" id="type_motor" name="type_motor">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kw_motor" class="form-label">KW Motor</label>
                            <input type="number" step="0.01" class="form-control" id="kw_motor" name="kw_motor">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rpm_motor" class="form-label">RPM Motor</label>
                            <input type="number" class="form-control" id="rpm_motor" name="rpm_motor">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="bearing_depan" class="form-label">Bearing Depan</label>
                            <input type="text" class="form-control" id="bearing_depan" name="bearing_depan">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="bearing_belakang" class="form-label">Bearing Belakang</label>
                            <input type="text" class="form-control" id="bearing_belakang" name="bearing_belakang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="seal_depan" class="form-label">Seal Depan</label>
                            <input type="text" class="form-control" id="seal_depan" name="seal_depan">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="seal_belakang" class="form-label">Seal Belakang</label>
                            <input type="text" class="form-control" id="seal_belakang" name="seal_belakang">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn elegant-btn elegant-btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn elegant-btn elegant-btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
