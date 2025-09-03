<div class="modal fade" id="editMesinModal" tabindex="-1" aria-labelledby="editMesinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMesinModalLabel"><i class="fas fa-edit me-2"></i>Edit Data Mesin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editMesinForm" method="POST" action="{{ route('mesin.update', ':kode') }}">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="edit-kode" class="form-label">Kode Mesin</label>
                            <input type="text" class="form-control" id="edit-kode" name="kode" required maxlength="10" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="edit-nama_mesin" class="form-label">Nama Mesin</label>
                            <input type="text" class="form-control" id="edit-nama_mesin" name="nama_mesin" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit-no_motor" class="form-label">No. Motor</label>
                            <input type="text" class="form-control" id="edit-no_motor" name="no_motor">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-type_motor" class="form-label">Tipe Motor</label>
                            <input type="text" class="form-control" id="edit-type_motor" name="type_motor">
                        </div>
                        <div class="col-md-4">
                            <label for="edit-kw_motor" class="form-label">Kw Motor</label>
                            <input type="number" step="0.01" class="form-control" id="edit-kw_motor" name="kw_motor">
                        </div>
                        <div class="col-md-4">
                            <label for="edit-rpm_motor" class="form-label">RPM Motor</label>
                            <input type="number" class="form-control" id="edit-rpm_motor" name="rpm_motor">
                        </div>
                        <div class="col-md-4">
                            <label for="edit-bearing_depan" class="form-label">Bearing Depan</label>
                            <input type="text" class="form-control" id="edit-bearing_depan" name="bearing_depan">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-bearing_belakang" class="form-label">Bearing Belakang</label>
                            <input type="text" class="form-control" id="edit-bearing_belakang" name="bearing_belakang">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-seal_depan" class="form-label">Seal Depan</label>
                            <input type="text" class="form-control" id="edit-seal_depan" name="seal_depan">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-seal_belakang" class="form-label">Seal Belakang</label>
                            <input type="text" class="form-control" id="edit-seal_belakang" name="seal_belakang">
                        </div>
                        <div class="col-12">
                            <label for="edit-catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="edit-catatan" name="catatan" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn elegant-btn elegant-btn-warning">
                        <i class="fas fa-save me-2"></i>Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>