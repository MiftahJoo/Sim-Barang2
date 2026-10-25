"use strict";

// Mengambil elemen HTML
const form = document.querySelector("form");
const kodeInput = document.querySelector("#kode");
const namaInput = document.querySelector("#nama");
const jumlahInput = document.querySelector("#jumlah");
const pencarian = document.querySelector("#pencarian");

// Membuat notifikasi Toast
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

// Kode barang otomatis menjadi huruf kapital
kodeInput.addEventListener("input", function () {
    this.value = this.value.toUpperCase();
});

// Validasi formulir sebelum dikirim ke simpan.php
form.addEventListener("submit", function (event) {
    const kode = kodeInput.value.trim();
    const nama = namaInput.value.trim();
    const jumlah = Number(jumlahInput.value);

    // Validasi kode barang
    if (!/^BRG-\d+$/.test(kode)) {
        event.preventDefault();
        tampilkanToast(
            "Kode harus diawali BRG-, contoh BRG-004!",
            "error"
        );
        kodeInput.focus();
        return;
    }

    // Validasi nama barang
    if (nama === "") {
        event.preventDefault();
        tampilkanToast("Nama barang wajib diisi!", "error");
        namaInput.focus();
        return;
    }

    // Validasi jumlah barang
    if (!Number.isFinite(jumlah) || jumlah <= 0) {
        event.preventDefault();
        tampilkanToast("Jumlah barang harus lebih dari 0!", "error");
        jumlahInput.focus();
        return;
    }

    // Jika valid, formulir dikirim ke simpan.php
});

// Fitur pencarian barang
if (pencarian) {
    pencarian.addEventListener("input", function () {
        const kataKunci = this.value.toLowerCase();

        const tbody = document.querySelector("#barang table tbody");

        if (!tbody) return;

        const semuaBaris = tbody.querySelectorAll("tr");

        semuaBaris.forEach(function (baris) {
            const isiBaris = baris.textContent.toLowerCase();

            baris.style.display = isiBaris.includes(kataKunci)
                ? ""
                : "none";
        });
    });
}