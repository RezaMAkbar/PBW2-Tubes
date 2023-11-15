# PBW2-Tubes
Repo tubes untuk PBW2
Andre Fransiscus Masalle - 6706223155
Muhammad Rizki Anshari - 6706223168
Reza Mochamad Akbar - 6706223125



untuk ganti bg bisa di app.css di tambahin dulu class nya, terus tambah di *.blade.php nya
contoh .custom-background-color {
    background-color: ##5ee4ff;
}

di dashboard.php
div class="py-12">
        div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            div class="custom-background-color overflow-hidden shadow-sm sm:rounded-lg">
                div class="p-6 text-gray-900 dark:text-gray-100 ">
                    {{ __("You're logged in!") }}
                /div>
            /div>
        /div>
    /div
maka warna akan berubah


kalo datatables di scss
.custom-background-color {
    background-color: ##5ee4ff;
}


migration file di pindahkan ke backup, transaksi jual belum


expired date buat di edit stok opname di ambil dari obat




jika ada field dengan id yg sama contoh di transaksiObat.blade
harus di bedakan id nya, dan ubah di controller untuk menyamakan  id yg diubah tsb

kalo mau mengubah style navbar bisa di layouts/app.blade.php