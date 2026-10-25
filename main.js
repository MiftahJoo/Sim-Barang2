"use strict";

// Mengambil elemen
const form = document.querySelector("form");
const kodeInput = document.querySelector("#kode");
const namaInput = document.querySelector("#nama");
const kategoriInput = document.querySelector("#kategori");
const jumlahInput = document.querySelector("#jumlah");
const kondisiInput = document.querySelector("#kondisi");
const tbody = document.querySelector("#barang table tbody");

// Membuat elemen notifikasi
const toast = document.createElement("div");
toast.id = "toast";
document.body.appendChild(toast);

let toastTimer;

function tampilkanToast(pesan, tipe) {
    toast.textContent = pesan;
    toast.className = "toast " + tipe;

    clearTimeout(toastTimer);

    toastTimer = setTimeout(() => {
        toast.className = "";
    }, 3000);
}

// Kode barang otomatis huruf kapital
kodeInput.addEventListener("input", function () {
    this.value = this.value.toUpperCase();
});

// Proses formulir
form.addEventListener("submit", function (event) {
    event.preventDefault();

    const kode = kodeInput.value.trim();
    const nama = namaInput.value.trim();
    const kategori = kategoriInput.value;
    const jumlah = Number(jumlahInput.value);
    const kondisi = kondisiInput.value;

    // Validasi kode
    if (!/^BRG-\d+$/.test(kode)) {
        tampilkanToast("Kode harus diawali BRG-, contoh BRG-004!", "error");
        kodeInput.focus();
        return;
    }

    // Validasi nama
    if (nama === "") {
        tampilkanToast("Nama barang wajib diisi!", "error");
        namaInput.focus();
        return;
    }

    // Validasi jumlah
    if (!Number.isFinite(jumlah) || jumlah <= 0) {
        tampilkanToast("Jumlah barang harus lebih dari 0!", "error");
        jumlahInput.focus();
        return;
    }

    // Menambahkan barang ke tabel
    const baris = tbody.insertRow();

    [kode, nama, kategori, jumlah, kondisi].forEach(function (data) {
        const sel = baris.insertCell();
        sel.textContent = data;
    });

    // Menampilkan notifikasi
    tampilkanToast("Barang berhasil ditambahkan!", "success");

    // Mengosongkan formulir
    form.reset();

    // Kembali ke atas halaman
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});

// Fitur pencarian barang
const pencarian = document.querySelector("#pencarian");

pencarian.addEventListener("input", function () {
    const kataKunci = this.value.toLowerCase();
    const semuaBaris = tbody.querySelectorAll("tr");

    semuaBaris.forEach(function (baris) {
        const isiBaris = baris.textContent.toLowerCase();

        baris.style.display = isiBaris.includes(kataKunci)
            ? ""
            : "none";
    });
});