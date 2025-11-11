<div class="modal fade" id="detailMesinModal" tabindex="-1" aria-labelledby="detailMesinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content elegant-card p-0">
            <div class="modal-header border-0 pb-0"> 
                <h5 class="modal-title elegant-modal-title" id="detailMesinModalLabel">
                    <i class="fas fa-info-circle me-2 text-primary-600"></i> Detail Data Mesin
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="elegant-modal-body"> 
                    
                    <div class="alert alert-info d-flex align-items-center mb-4 animate-slide-down">
                        <i class="fas fa-lightbulb me-2"></i>
                        Informasi detail mengenai mesin ini.
                    </div>

                    <div class="detail-grid"> 
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
                        <div class="detail-item detail-item-full animate-slide-down" style="animation-delay: 1.1s;">
                            <span class="detail-label"><i class="fas fa-file-alt"></i>Catatan</span>
                            <span class="detail-value" id="detail-catatan"></span>
                        </div>
                    </div>
                </div>
            </div>
           <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn elegant-btn elegant-btn-warning print-button" onclick="printModalContent()">
                    <i class="fas fa-print me-1"></i> Cetak PDF
                </button>
                <button type="button" class="btn elegant-btn elegant-btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function printModalContent() {
        const modalContent = document.querySelector('#detailMesinModal .modal-content');
        
        if (!modalContent) {
            alert('Konten detail mesin tidak ditemukan.');
            return;
        }
        const modalBodyHtml = modalContent.querySelector('.modal-body').innerHTML;
        const modalTitle = modalContent.querySelector('.modal-title').textContent.trim();
        const LOGO_URL = '{{ asset('images/nunggal.png') }}'; 
        const LOGO_ALT = 'Logo Perusahaan';

        const printContent = `
            <div style="padding: 2cm;">
                
                <div class="print-header-report" style="text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 10px;">
                    <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                        {{-- **PERBAIKAN UKURAN:** Tinggi dinaikkan menjadi 50px --}}
                        <img src="${LOGO_URL}" alt="${LOGO_ALT}" style="height: 50px; width: auto; margin-right: 10px;"> 
                        <h1 style="font-size: 24px; margin: 0; font-weight: bold;">${modalTitle.replace('Detail Data Mesin', 'LAPORAN DETAIL MESIN')}</h1>
                    </div>
                    <p style="font-size: 12px; margin-top: 5px;">Gudang Sparepart | Dicetak pada: ${new Date().toLocaleDateString('id-ID')}</p>
                </div>
                
                <div class="elegant-modal-body-print">
                    ${modalBodyHtml}
                </div>
            </div>
        `;
 
        const printWindow = window.open('', '_blank', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Laporan Mesin</title>');
        printWindow.document.write('<style>');
        printWindow.document.write(`
            /* 1. Aturan Page: Menghapus header/footer default browser */
            @page { 
                size: A4 portrait; 
                margin: 1.5cm; 
                /* Mencegah pencetakan URL, tanggal, dan nomor halaman (header/footer default) */
                @top-left { content: ""; }
                @top-right { content: ""; }
                @bottom-left { content: ""; }
                @bottom-right { content: ""; }
            }
            body { 
                font-family: Arial, sans-serif; 
                color: #333; 
                -webkit-print-color-adjust: exact; /* Pastikan warna latar belakang/font dicetak */
                print-color-adjust: exact;
            }
            
            /* 2. Tata Letak Detail Grid (sama seperti sebelumnya) */
            .detail-grid { 
                display: grid; 
                grid-template-columns: repeat(2, 1fr); 
                gap: 20px 30px; 
            }
            .detail-item { 
                display: flex; 
                flex-direction: column; 
                gap: 6px; 
                padding-bottom: 8px;
                border-bottom: 1px dashed #ddd;
            }
            .detail-label { 
                font-size: 0.85rem; 
                font-weight: 600; 
                color: #007bff; 
                text-transform: uppercase; 
                letter-spacing: 0.03em; 
                display: flex; 
                align-items: center; 
            }
            .detail-label i { margin-right: 5px; } 

            .detail-value { 
                font-size: 1rem; 
                font-weight: 500; 
                color: #343a40; 
                line-height: 1.4; 
            }
            .detail-item-full { 
                grid-column: 1 / -1; 
                margin-top: 15px; 
                padding-top: 10px;
                border-top: 2px solid #ccc !important; 
                border-bottom: none !important;
            }
            
            /* Sembunyikan elemen modal yang tidak perlu di laporan */
            .btn-close, .alert, .modal-header .btn-close { display: none !important; }
            .modal-body { padding: 0 !important; }

            /* 3. Menghapus Elemen Non-Konten di Print Preview */
            html::after, body::after {
                content: none !important;
                display: none !important;
            }
        `);
        printWindow.document.write('</style>');
        
        printWindow.document.write('</head><body>');
        printWindow.document.write(printContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
    }
</script>