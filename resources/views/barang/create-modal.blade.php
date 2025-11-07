<div class="modal fade" id="createBarangModal" tabindex="-1" aria-labelledby="createBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content elegant-card border-0">
            <div class="modal-header border-0 pb-0 d-flex justify-content-between align-items-center">
                <h6 class="modal-title elegant-modal-title page-title fw-bold m-0 fs-5" id="createBarangModalLabel">
                    <div class="title-icon">
                           <i class="fas fa-plus me-2 text-primary-600"></i>      Tambah Barang Baru
                    </div>
                 
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="modal-body py-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="code" class="form-label detail-label">
                                <i class="fas fa-hashtag"></i>Kode Barang
                            </label>
                            <input type="text" class="form-control" id="code" name="code" required>
                        </div>
                        <div class="col-md-6">
                            <label for="machine" class="form-label detail-label">
                                <i class="fas fa-microchip"></i>Mesin
                            </label>
                            <input type="text" class="form-control" id="machine" name="machine" required>
                        </div>
                        <div class="col-12">
                            <label for="name_of_good" class="form-label detail-label">
                                <i class="fas fa-cube"></i>Nama Barang
                            </label>
                            <input type="text" class="form-control" id="name_of_good" name="name_of_good" required>
                        </div>
                        <div class="col-12">
                            <label for="specification" class="form-label detail-label">
                                <i class="fas fa-clipboard-list"></i>Spesifikasi
                            </label>
                            <input type="text" class="form-control" id="specification" name="specification" required>
                        </div>
                        <div class="col-md-6">
                            <label for="box" class="form-label detail-label">
                                <i class="fas fa-archive"></i>Box
                            </label>
                            <input type="text" class="form-control" id="box" name="box" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="using_2024" class="form-label detail-label">
                                <i class="fas fa-calendar-check"></i>Using 2024
                            </label>
                            <input type="text" class="form-control" id="using_2024" name="using_2024">
                        </div>
                        <div class="col-md-6">
                            <label for="opening" class="form-label detail-label">
                                <i class="fas fa-door-open"></i>Opening
                            </label>
                            <input type="text" class="form-control" id="opening" name="opening">
                        </div>
                        <div class="col-md-6">
                            <label for="received" class="form-label detail-label">
                                <i class="fas fa-arrow-down"></i>Received
                            </label>
                            <input type="text" class="form-control" id="received" name="received">
                        </div>
                        <div class="col-md-6">
                            <label for="used" class="form-label detail-label">
                                <i class="fas fa-arrow-up"></i>Used
                            </label>
                            <input type="text" class="form-control" id="used" name="used">
                        </div>
                        <div class="col-md-6">
                            <label for="closing" class="form-label detail-label">
                                <i class="fas fa-door-closed"></i>Closing
                            </label>
                            <input type="text" class="form-control" id="closing" name="closing">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 justify-content-end">
                    <button type="button" class="btn elegant-btn elegant-btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn elegant-btn elegant-btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>