<div class="modal fade" id="editBarangModal" tabindex="-1" aria-labelledby="editBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content elegant-card">
            <form id="editBarangForm" action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title page-title fw-bold" id="editBarangModalLabel">
                        <div class="title-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        Edit Barang
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="edit-code" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="edit-code" name="code" readonly disabled>
                            <input type="hidden" name="code" id="edit-code-hidden">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-machine" class="form-label">Mesin</label>
                            <input type="text" class="form-control" id="edit-machine" name="machine" required>
                        </div>
                        <div class="col-12">
                            <label for="edit-name_of_good" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="edit-name_of_good" name="name_of_good" required>
                        </div>
                        <div class="col-12">
                            <label for="edit-specification" class="form-label">Spesifikasi</label>
                            <input type="text" class="form-control" id="edit-specification" name="specification" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit-box" class="form-label">Box</label>
                            <input type="text" class="form-control" id="edit-box" name="box" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit-using_2024" class="form-label">Using 2024</label>
                            <input type="text" class="form-control" id="edit-using_2024" name="using_2024">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-opening" class="form-label">Opening</label>
                            <input type="text" class="form-control" id="edit-opening" name="opening">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-received" class="form-label">Received</label>
                            <input type="text" class="form-control" id="edit-received" name="received">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-used" class="form-label">Used</label>
                            <input type="text" class="form-control" id="edit-used" name="used">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-closing" class="form-label">Closing</label>
                            <input type="text" class="form-control" id="edit-closing" name="closing">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 justify-content-end">
                    <button type="button" class="btn elegant-btn elegant-btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn elegant-btn elegant-btn-warning">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Pastikan nilai dari input 'code' yang disabled juga ikut terkirim
    document.getElementById('editBarangForm').addEventListener('submit', function() {
        document.getElementById('edit-code-hidden').value = document.getElementById('edit-code').value;
    });
</script>