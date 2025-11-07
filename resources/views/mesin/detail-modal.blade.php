<!-- Detail Mesin Modal --><div class="modal fade" id="detailMesinModal" tabindex="-1" aria-labelledby="detailMesinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> {{-- Ukuran modal diperbesar --}}
        <div class="modal-content elegant-card p-0"> {{-- Card elegant untuk modal --}}
            <div class="modal-header border-0 pb-0"> {{-- Hapus border dan padding bawah --}}
                <h5 class="modal-title elegant-modal-title" id="detailMesinModalLabel">
                    <i class="fas fa-info-circle me-2 text-primary-600"></i> Detail Data Mesin
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0"> {{-- Padding atas dihilangkan untuk menyambung header --}}
                <div class="elegant-modal-body"> {{-- Wrapper untuk padding dan style internal --}}
                    
                    <div class="alert alert-info d-flex align-items-center mb-4 animate-slide-down">
                        <i class="fas fa-lightbulb me-2"></i>
                        Informasi detail mengenai mesin ini.
                    </div>

                    <div class="detail-grid"> {{-- Menggunakan CSS Grid untuk tata letak rapi --}}
                        <div class="detail-item animate-slide-down" style="animation-delay: 0.1s;">
                            <span class="detail-label"><i class="fas fa-hashtag"></i>Kode Mesin</span>
                            <span class="detail-value item-code" id="detail-kode"></span>
                        </div>
                        <div class="detail-item animate-slide-down" style="animation-delay: 0.2s;">
                            <span class="detail-label"><i class="fas fa-cogs"></i>Nama Mesin</span>
                            <span class="detail-value" id="detail-nama_mesin"></span>
                        </div>
                        <div class="detail-item animate-slide-down" style="animation-delay: 0.3s;">
                            <span class="detail-label"><i class="fas fa-bolt"></i>No. Motor</span>
                            <span class="detail-value" id="detail-no_motor"></span>
                        </div>
                        <div class="detail-item animate-slide-down" style="animation-delay: 0.4s;">
                            <span class="detail-label"><i class="fas fa-tools"></i>Tipe Motor</span>
                            <span class="detail-value" id="detail-type_motor"></span>
                        </div>
                        <div class="detail-item animate-slide-down" style="animation-delay: 0.5s;">
                            <span class="detail-label"><i class="fas fa-gauge-high"></i>KW Motor</span>
                            <span class="detail-value" id="detail-kw_motor"></span>
                        </div>
                        <div class="detail-item animate-slide-down" style="animation-delay: 0.6s;">
                            <span class="detail-label"><i class="fas fa-arrow-rotate-right"></i>RPM Motor</span>
                            <span class="detail-value" id="detail-rpm_motor"></span>
                        </div>
                        <div class="detail-item animate-slide-down" style="animation-delay: 0.7s;">
                            <span class="detail-label"><i class="fas fa-circle"></i>Bearing Depan</span>
                            <span class="detail-value" id="detail-bearing_depan"></span>
                        </div>
                        <div class="detail-item animate-slide-down" style="animation-delay: 0.8s;">
                            <span class="detail-label"><i class="fas fa-circle-dot"></i>Bearing Belakang</span>
                            <span class="detail-value" id="detail-bearing_belakang"></span>
                        </div>
                        <div class="detail-item animate-slide-down" style="animation-delay: 0.9s;">
                            <span class="detail-label"><i class="fas fa-ring"></i>Seal Depan</span>
                            <span class="detail-value" id="detail-seal_depan"></span>
                        </div>
                        <div class="detail-item animate-slide-down" style="animation-delay: 1.0s;">
                            <span class="detail-label"><i class="fas fa-ring"></i>Seal Belakang</span>
                            <span class="detail-value" id="detail-seal_belakang"></span>
                        </div>
                        {{-- Catatan akan menempati satu baris penuh --}}
                        <div class="detail-item detail-item-full animate-slide-down" style="animation-delay: 1.1s;">
                            <span class="detail-label"><i class="fas fa-file-alt"></i>Catatan</span>
                            <span class="detail-value" id="detail-catatan"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0"> {{-- Hapus border dan padding atas --}}
                <button type="button" class="btn elegant-btn elegant-btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Untuk styling tambahan yang spesifik untuk modal ini --}}
<style>
    /* Styling untuk judul modal */
    .elegant-modal-title {
        font-size: 1.5rem; /* Ukuran font lebih besar */
        font-weight: 700;
        color: var(--gray-800);
        display: flex;
        align-items: center;
    }

    /* Styling untuk body modal */
    .elegant-modal-body {
        padding: 24px; /* Atur padding di sini */
        background: white; /* Latar belakang putih */
        border-radius: 0 0 20px 20px; /* Sudut bawah melengkung */
        box-shadow: inset 0 2px 5px rgba(0,0,0,0.03); /* Sedikit shadow ke dalam */
        border-top: 1px solid var(--gray-100); /* Garis pemisah dari header */
    }

    /* Grid untuk detail item */
    .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* 2 kolom di layar lebar */
        gap: 20px 30px; /* Jarak antar item */
    }

    /* Styling untuk setiap item detail */
    .detail-item {
        display: flex;
        flex-direction: column;
        gap: 6px; /* Jarak antara label dan value */
        padding-bottom: 5px; /* Sedikit padding di bawah */
    }

    .detail-label {
        font-size: 0.9rem; /* Ukuran label lebih kecil */
        font-weight: 600;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.03em;
        display: flex;
        align-items: center;
    }

    .detail-label i {
        color: var(--primary-500);
        margin-right: 8px;
        font-size: 1.1rem; /* Ukuran ikon lebih besar */
    }

    .detail-value {
        font-size: 1.05rem; /* Ukuran value lebih besar */
        font-weight: 600;
        color: var(--gray-800);
        line-height: 1.4;
    }

    .detail-item-full {
        grid-column: 1 / -1; /* Membuat catatan mengambil lebar penuh */
    }

    /* Responsive untuk layar kecil */
    @media (max-width: 768px) {
        .detail-grid {
            grid-template-columns: 1fr; /* 1 kolom di layar kecil */
            gap: 15px;
        }
    }
</style>
