<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan Tiket Museum</title>
    <style>
       /* Umum */
body {
    font-family: 'Arial', sans-serif;
    padding: 30px;
    background-color: #f0f2f5;
    color: #333;
}

/* Container Form */
.form-container {
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 30px 25px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Judul Form */
.form-container h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 1.8rem;
    color: #222;
}

/* Label */
label {
    display: block;
    margin-top: 18px;
    font-weight: 600;
    font-size: 0.95rem;
}

/* Input dan Select */
input, select {
    width: 100%;
    padding: 12px 14px;
    margin-top: 6px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 1rem;
    box-sizing: border-box;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input:focus, select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0,123,255,0.25);
}

/* Input readonly (kode transaksi) */
.kode-transaksi {
    background-color: #e9ecef;
    font-style: italic;
    color: #555;
    cursor: not-allowed;
}

/* Tombol Submit */
button {
    margin-top: 30px;
    width: 100%;
    padding: 14px;
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
    font-size: 1rem;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

/* Responsif */
@media (max-width: 600px) {
    .form-container {
        padding: 20px 15px;
    }
}

    </style>
</head>
<body>

<div class="form-container">
    <h2>Pemesanan Tiket Museum</h2>
    <form id="formPemesanan">
    
    <!-- HIGHLIGHT: Form dikirim ke backend -->
    <form id="formPemesanan" method="POST" action="simpan_pemesanan">

    <label for="kodeTransaksi">Kode Transaksi</label>
    <input type="text" id="kodeTransaksi" name="kodeTransaksi" class="kode-transaksi" readonly>

    <label for="namaMuseum">Nama Museum</label>
    <select id="namaMuseum" name="namaMuseum" required>
        <option value="Fatahillah">Museum Fatahillah</option>
        <option value="Siwalima">Museum Siwalima</option>
        <option value="UllenSentalu">Museum Ullen Sentalu</option>
    </select>

    <label for="namaPemesan">Nama Pemesan</label>
    <input type="text" id="namaPemesan" name="namaPemesan" placeholder="Masukkan nama lengkap Anda" required>


    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="nama@email.com" required>

    <label for="tanggal">Tanggal Kedatangan</label>
    <input type="date" id="tanggal" name="tanggal" required>

    <label for="telepon">Nomor Telepon</label>
    <input type="tel" id="telepon" name="telepon" placeholder="08xxxxxxxxxx" required>

    <button type="submit">Pesan Tiket</button>
</form>

</div>

<script>
    const namaMuseumSelect = document.getElementById("namaMuseum");
    const kodeTransaksiInput = document.getElementById("kodeTransaksi");

    let nomorUrut = Math.floor(Math.random() * 0000 + 1);

    function generateKodeTransaksi() {
        const nama = namaMuseumSelect.value;
        const tahun = new Date().getFullYear();
        if (nama) {
            kodeTransaksiInput.value = `${nama}/${tahun}/${nomorUrut}`;
        } else {
            kodeTransaksiInput.value = "";
        }
    }

    namaMuseumSelect.addEventListener("change", generateKodeTransaksi);
    window.addEventListener("load", generateKodeTransaksi);
</script>

</body>
</html>
