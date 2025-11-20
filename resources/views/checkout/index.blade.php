@extends('Layouts.main')

@section('content')
<style>
    .checkout-container {
        max-width: 600px;
        margin: 0 auto;
        padding-bottom: 100px;
        background: linear-gradient(180deg, #FFFBF5 0%, #FFE8F0 25%, #FFD4E5 50%, #FFB6D9 100%);
        min-height: 100vh;
    }

    .checkout-header {
        background: white;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .header-address {
        display: flex;
        gap: 10px;
        margin-bottom: 12px;
        font-size: 13px;
        color: #555;
    }

    .header-address svg {
        min-width: 16px;
        color: #C91F6A;
    }

    .store-info {
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
        padding: 12px;
        border-radius: 10px;
        margin-bottom: 12px;
        display: flex;
        gap: 12px;
        align-items: flex-start;
    }

    .store-icon {
        width: 35px;
        height: 35px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #C91F6A;
        font-size: 20px;
        flex-shrink: 0;
    }

    .store-text h3 {
        margin: 0 0 5px 0;
        font-size: 15px;
        font-weight: bold;
    }

    .store-text p {
        margin: 0;
        font-size: 12px;
        opacity: 0.95;
        line-height: 1.4;
    }

    .product-item {
        background: white;
        padding: 15px;
        margin: 0 15px 15px 15px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        display: flex;
        gap: 12px;
    }

    .product-image {
        width: 150px;
        height: 150px;
        background: #FFE8F0;
        border-radius: 8px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-details {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-name {
        font-weight: bold;
        font-size: 14px;
        color: #333;
        margin-bottom: 5px;
    }

    .product-price {
        color: #C91F6A;
        font-weight: bold;
        font-size: 14px;
    }

    .product-qty {
        font-size: 12px;
        color: #999;
        margin-top: 5px;
    }

    .qty-selector {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 8px;
        background: #FFE8F0;
        border-radius: 8px;
        padding: 6px;
        width: fit-content;
    }

    .qty-btn {
        background: white;
        border: none;
        width: 28px;
        height: 28px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        color: #C91F6A;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    }

    .qty-btn:hover {
        background: #C91F6A;
        color: white;
    }

    .qty-display {
        min-width: 35px;
        text-align: center;
        font-weight: bold;
        color: #8B1538;
        font-size: 14px;
    }

    .info-box {
        background: white;
        margin: 0 15px 15px 15px;
        padding: 12px;
        border-radius: 10px;
        font-size: 12px;
        color: #666;
        line-height: 1.5;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .info-box-title {
        color: #8B1538;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .summary-section {
        background: white;
        margin: 0 15px 15px 15px;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .summary-title {
        font-weight: bold;
        color: #333;
        margin-bottom: 12px;
        font-size: 15px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px solid #F0F0F0;
        font-size: 13px;
        color: #555;
    }

    .summary-row:last-child {
        border-bottom: none;
    }

    .summary-row.total {
        border-top: 2px solid #FFB6D9;
        padding-top: 12px;
        margin-top: 12px;
        font-weight: bold;
        font-size: 16px;
        color: #8B1538;
    }

    .payment-section {
        background: white;
        margin: 0 15px 15px 15px;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .payment-title {
        font-weight: bold;
        color: #333;
        margin-bottom: 12px;
        font-size: 15px;
    }

    .payment-method {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #F0F0F0;
        cursor: pointer;
    }

    .payment-method:last-child {
        border-bottom: none;
    }

    .payment-icon {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        font-size: 18px;
    }

    .payment-label {
        flex: 1;
        font-size: 14px;
        color: #555;
    }

    .payment-radio {
        width: 20px;
        height: 20px;
        border: 2px solid #C91F6A;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .payment-radio input {
        display: none;
    }

    .payment-radio input:checked + div {
        width: 10px;
        height: 10px;
        background: #C91F6A;
        border-radius: 50%;
    }

    .payment-radio div {
        width: 0;
        height: 0;
        transition: all 0.3s ease;
    }

    .btn-checkout {
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
        border: none;
        padding: 16px;
        margin: 0 15px 20px 15px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        width: calc(100% - 30px);
        box-shadow: 0 4px 12px rgba(139, 21, 56, 0.3);
        transition: all 0.3s ease;
    }

    .btn-checkout:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(139, 21, 56, 0.4);
    }

    .back-button {
        position: fixed;
        top: 15px;
        left: 15px;
        background: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        z-index: 100;
        color: #8B1538;
    }

    .back-button:hover {
        background: #FFE8F0;
    }

    @media (max-width: 480px) {
        .checkout-container {
            padding-bottom: 120px;
        }

        .product-item {
            flex-direction: column;
        }

        .product-image {
            width: 100%;
            height: 150px;
        }
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .modal-content {
        background-color: white;
        margin: 50px auto;
        padding: 0;
        border-radius: 15px;
        max-width: 500px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        animation: slideUp 0.3s ease;
    }

    @keyframes slideUp {
        from { transform: translateY(50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .modal-header {
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
        padding: 20px;
        border-radius: 15px 15px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h2 {
        margin: 0;
        font-size: 18px;
    }

    .close {
        color: white;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        border: none;
        background: none;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .close:hover {
        opacity: 0.8;
    }

    .modal-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
        font-size: 14px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px 12px;
        border: 2px solid #FFD4E5;
        border-radius: 8px;
        font-size: 14px;
        font-family: inherit;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #C91F6A;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .modal-footer {
        padding: 15px 20px;
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        border-top: 1px solid #F0F0F0;
    }

    .btn-modal {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .btn-modal-primary {
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
    }

    .btn-modal-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(139, 21, 56, 0.3);
    }

    .btn-modal-secondary {
        background: #F0F0F0;
        color: #333;
    }

    .btn-modal-secondary:hover {
        background: #E0E0E0;
    }

    .edit-btn {
        color: #C91F6A;
        cursor: pointer;
        font-weight: 500;
        margin-left: auto;
    }

    .edit-btn:hover {
        text-decoration: underline;
    }
</style>

<button class="back-button" onclick="window.history.back();">←</button>

<div class="checkout-container">
    <!-- Header -->
    <div class="checkout-header">
        <div class="header-address">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M12 2C7.58 2 4 5.58 4 10c0 7 8 13 8 13s8-6 8-13c0-4.42-3.58-8-8-8z" fill="currentColor"/></svg>
            <div style="flex: 1;">
                <strong id="addressName">Kayna (+62)83**********15</strong><br>
                <span id="addressText">Blok Kemundingan Rt 01 Bb 05 Mateong, Kaliksumo, Kendal, Jawa Tengah, Indonesia</span>
            </div>
            <button class="edit-btn" onclick="openAddressModal();">Edit</button>
        </div>

        <div class="store-info">
            <div class="store-icon">🏪</div>
            <div class="store-text">
                <h3>Kayna Beauty</h3>
                <p>Jadi dikirimin itu akan + diskon. Tambahkan 1 item lagi untuk mendapatkan gratis ongkir.</p>
            </div>
        </div>
    </div>

    <!-- Cart Items -->
    @forelse(session('cart', []) as $key => $item)
        <div class="product-item">
            <div class="product-image">
                <img src="{{ asset('images/' . $item['gambar']) }}" alt="{{ $item['nama'] }}">
            </div>
            <div class="product-details">
                <div>
                    <div class="product-name">{{ $item['nama'] }}</div>
                    <div class="qty-selector">
                        <button type="button" class="qty-btn" onclick="updateQty('{{ $key }}', -1);">−</button>
                        <div class="qty-display" id="qty-{{ $key }}">{{ $item['qty'] }}</div>
                        <button type="button" class="qty-btn" onclick="updateQty('{{ $key }}', 1);">+</button>
                    </div>
                </div>
                <div class="product-price" id="price-{{ $key }}">Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</div>
            </div>
        </div>
    @empty
        <div class="product-item">
            <p style="text-align: center; width: 100%; color: #999;">Keranjang kosong</p>
        </div>
    @endforelse

    <!-- Promo Info -->
    <div class="info-box">
        <div class="info-box-title">🎁 Tiba Paling Lambat pada 23-25 OKT</div>
        <p>Dapatkan voucher senilai mulai dari Rp35k jika pemesanan tidak tiba sebelum lambatnya pada 25 OKT.</p>
    </div>

    <!-- Order Summary -->
    <div class="summary-section">
        <div class="summary-title">Ringkasan Pesanan</div>
        @php
            $subtotal = 0;
            $cart = session('cart', []);
            foreach($cart as $item) {
                $subtotal += $item['harga'] * $item['qty'];
            }
            // Gratis ongkir jika subtotal > 30.000
            $ongkir = $subtotal >= 30000 ? 0 : 25000;
            $diskon = 0;
            $total = $subtotal + $ongkir - $diskon;
        @endphp
        
        <div class="summary-row">
            <span>Subtotal Produk</span>
            <span id="subtotalDisplay">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row">
            <span>Subtotal Ongkir</span>
            <span>-</span>
        </div>
        <div class="summary-row">
            <span>Ongkir</span>
            <span id="ongkirDisplay">
                @if($subtotal >= 30000)
                    <span style="color: #00AA00; font-weight: bold;">GRATIS</span>
                @else
                    Rp{{ number_format($ongkir, 0, ',', '.') }}
                @endif
            </span>
        </div>
        <div class="summary-row">
            <span>Diskon Ongkir</span>
            <span>Rp{{ number_format($diskon, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row">
            <span>Biaya Layanan Pelanggan</span>
            <span>Rp1.000</span>
        </div>
        <div class="summary-row">
            <span>Biaya Penanganan</span>
            <span>Rp500</span>
        </div>
        <div class="summary-row total">
            <span>Total</span>
            <span id="totalDisplay">Rp{{ number_format($total + 1000 + 500, 0, ',', '.') }}</span>
        </div>
    </div>

    <!-- Payment Methods -->
    <div class="payment-section">
        <div class="payment-title">Metode Pembayaran</div>
        
        <form id="checkoutForm" method="POST" action="{{ route('order.create') }}">
            @csrf
            
            <div class="payment-method">
                <div class="payment-icon">📦</div>
                <label class="payment-label">
                    <input type="radio" name="payment_method" value="cod" checked>
                    COD
                </label>
                <div class="payment-radio">
                    <input type="radio" name="payment_method" value="cod" checked>
                    <div></div>
                </div>
            </div>

            <div class="payment-method">
                <div class="payment-icon">📱</div>
                <label class="payment-label">
                    <input type="radio" name="payment_method" value="qris">
                    QRIS
                </label>
                <div class="payment-radio">
                    <input type="radio" name="payment_method" value="qris">
                    <div></div>
                </div>
            </div>

            <div class="payment-method">
                <div class="payment-icon">💳</div>
                <label class="payment-label">
                    <input type="radio" name="payment_method" value="transfer">
                    Transfer
                </label>
                <div class="payment-radio">
                    <input type="radio" name="payment_method" value="transfer">
                    <div></div>
                </div>
            </div>

            <button type="submit" class="btn-checkout">Buat Pesanan</button>
        </form>
    </div>
</div>

<script>
    // Product data untuk kalkulasi harga
    const cartData = {
        @php
            $cartItems = session('cart', []);
            $itemCount = count($cartItems);
            $index = 0;
        @endphp
        @foreach($cartItems as $key => $item)
            '{{ $key }}': { harga: {{ $item['harga'] }}, nama: '{{ $item['nama'] }}' }{{ $index < $itemCount - 1 ? ',' : '' }}
            @php $index++; @endphp
        @endforeach
    };

    // Update quantity
    function updateQty(key, change) {
        const qtyDisplay = document.getElementById('qty-' + key);
        const priceDisplay = document.getElementById('price-' + key);
        let currentQty = parseInt(qtyDisplay.textContent);
        let newQty = currentQty + change;

        if (newQty < 1) {
            newQty = 1;
        }

        qtyDisplay.textContent = newQty;
        
        // Update harga display
        const harga = cartData[key].harga;
        const totalHarga = harga * newQty;
        priceDisplay.textContent = 'Rp ' + totalHarga.toLocaleString('id-ID', { maximumFractionDigits: 0 });

        // Update total keseluruhan
        updateTotal();

        // Update di server (AJAX)
        updateCartQty(key, newQty);
    }

    // Update cart di server
    function updateCartQty(key, newQty) {
        const formData = new FormData();
        formData.append('key', key);
        formData.append('qty', newQty);

        fetch('{{ route('cart.update') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .catch(error => console.error('Error:', error));
    }

    // Radio button styling
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelectorAll('.payment-radio').forEach(r => r.style.borderColor = '#DDD');
            this.closest('.payment-method').querySelector('.payment-radio').style.borderColor = '#C91F6A';
        });
    });

    // Set initial state
    document.querySelector('input[type="radio"]:checked').closest('.payment-method').querySelector('.payment-radio').style.borderColor = '#C91F6A';

    // Form submission
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        const method = document.querySelector('input[name="payment_method"]:checked').value;
        // Allow normal form submission to POST to /order route
        // which will redirect to success page
    });

    // Update total when quantities change
    function updateTotal() {
        let newSubtotal = 0;
        
        for (const key in cartData) {
            const qtyElement = document.getElementById('qty-' + key);
            if (qtyElement) {
                const qty = parseInt(qtyElement.textContent);
                const harga = cartData[key].harga;
                newSubtotal += harga * qty;
            }
        }

        // Hitung ongkir - GRATIS jika subtotal >= 30.000
        const ongkir = newSubtotal >= 30000 ? 0 : 25000;
        const biayaLayanan = 1000;
        const biayaPenanganan = 500;
        const finalTotal = newSubtotal + ongkir + biayaLayanan + biayaPenanganan;

        document.getElementById('subtotalDisplay').textContent = 'Rp ' + newSubtotal.toLocaleString('id-ID', { maximumFractionDigits: 0 });
        
        // Update ongkir display
        const ongkirDisplay = document.getElementById('ongkirDisplay');
        if (newSubtotal >= 30000) {
            ongkirDisplay.innerHTML = '<span style="color: #00AA00; font-weight: bold;">GRATIS</span>';
        } else {
            ongkirDisplay.textContent = 'Rp ' + ongkir.toLocaleString('id-ID', { maximumFractionDigits: 0 });
        }
        
        document.getElementById('totalDisplay').textContent = 'Rp ' + finalTotal.toLocaleString('id-ID', { maximumFractionDigits: 0 });
    }

    // Address Modal Functions
    function openAddressModal() {
        document.getElementById('addressModal').style.display = 'block';
    }

    function closeAddressModal() {
        document.getElementById('addressModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('addressModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    function saveAddress() {
        const name = document.getElementById('addressName2').value;
        const address = document.getElementById('addressArea').value;
        const notes = document.getElementById('addressNotes').value;

        if (!name || !address) {
            alert('Nama dan alamat harus diisi!');
            return;
        }

        document.getElementById('addressName').textContent = name;
        document.getElementById('addressText').textContent = address;
        
        if (notes) {
            document.getElementById('addressText').textContent += ' (' + notes + ')';
        }

        // Save to session via AJAX (optional)
        const formData = new FormData();
        formData.append('address_name', name);
        formData.append('address', address);
        formData.append('notes', notes);

        fetch('{{ url('/checkout/update-address') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        }).catch(error => console.log('Address saved locally'));

        closeAddressModal();
    }

    // Re-calculate total on page load
    updateTotal();
</script>

<!-- Address Modal -->
<div id="addressModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Edit Alamat Pengiriman</h2>
            <button class="close" onclick="closeAddressModal();">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Penerima</label>
                <input type="text" id="addressName2" placeholder="Masukkan nama penerima" value="Kayna">
            </div>
            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea id="addressArea" placeholder="Blok, No. Rumah, Jalan, Kota, Provinsi, Kode Pos">Blok Kemundingan Rt 01 Bb 05 Mateong, Kaliksumo, Kendal, Jawa Tengah, Indonesia</textarea>
            </div>
            <div class="form-group">
                <label>Catatan Tambahan (Opsional)</label>
                <input type="text" id="addressNotes" placeholder="Contoh: Rumah bertanda biru, dekat warung">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-modal btn-modal-secondary" onclick="closeAddressModal();">Batal</button>
            <button class="btn-modal btn-modal-primary" onclick="saveAddress();">Simpan Alamat</button>
        </div>
    </div>
</div>

@endsection
