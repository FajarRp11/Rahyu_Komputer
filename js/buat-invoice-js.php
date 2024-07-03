<script>
    document.addEventListener('DOMContentLoaded', function () {
        function formatRupiah(angka) {
            let number_string = angka.toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return rupiah;
        }

        function updateSubtotal(row) {
            let jumlah = row.querySelector('.jumlah-barang').value;
            let harga = parseFloat(row.querySelector('.harga-barang').getAttribute('data-value'));
            if (!isNaN(harga) && !isNaN(jumlah)) {
                let subtotal = (jumlah * harga).toFixed(2);
                row.querySelector('.subtotal-barang').value = formatRupiah(subtotal);
                row.querySelector('.subtotal-barang').setAttribute('data-value', subtotal);
                updateTotal();
            }
        }

        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.subtotal-barang').forEach(function (input) {
                let subtotal = parseFloat(input.getAttribute('data-value'));
                if (!isNaN(subtotal)) {
                    total += subtotal;
                }
            });
            document.querySelector('.total-harga').textContent = formatRupiah(total.toFixed(2));
        }

        function addRowListeners(row) {
            row.querySelector('.jumlah-barang').addEventListener('input', function () {
                updateSubtotal(row);
            });

            row.querySelector('.remove-row').addEventListener('click', function (e) {
                e.preventDefault();
                row.remove();
                updateTotal();
            });

            row.querySelector('.pilih-produk').addEventListener('click', function () {
                document.querySelectorAll('tr').forEach(function (tr) {
                    tr.classList.remove('selected-row');
                });
                row.classList.add('selected-row');
            });
        }

        document.querySelectorAll('.pilihCustomer').forEach(function (button) {
            button.addEventListener('click', function () {
                let idCustomer = this.getAttribute('data-id-customer');
                let nama = this.getAttribute('data-nama-customer');
                let telepon = this.getAttribute('data-telepon-customer');
                let alamat = this.getAttribute('data-alamat-customer');

                document.getElementById('ID_Customer').value = idCustomer;
                document.getElementById('Nama_Customer').value = nama;
                document.getElementById('Telepon_Customer').value = telepon;
                document.getElementById('Alamat_Customer').value = alamat;
            });
        });

        document.querySelectorAll('.pilihBarang').forEach(function (button) {
            button.addEventListener('click', function () {
                let namaBarang = this.getAttribute('data-nama-barang');
                let hargaBarang = this.getAttribute('data-harga-barang');
                let selectedRow = document.querySelector('.selected-row');

                if (selectedRow) {
                    selectedRow.querySelector('.nama-barang').value = namaBarang;
                    selectedRow.querySelector('.harga-barang').value = formatRupiah(hargaBarang);
                    selectedRow.querySelector('.harga-barang').setAttribute('data-value',
                        hargaBarang);
                    updateSubtotal(selectedRow);
                    selectedRow.classList.remove('selected-row');
                }
            });
        });

        document.querySelectorAll('.pilih-produk').forEach(function (button) {
            button.addEventListener('click', function () {
                let row = this.closest('tr');
                document.querySelectorAll('tr').forEach(function (tr) {
                    tr.classList.remove('selected-row');
                });
                row.classList.add('selected-row');
            });
        });

        document.querySelector('.add-row').addEventListener('click', function (e) {
            e.preventDefault();
            let table = document.getElementById('tabelBarang').getElementsByTagName('tbody')[0];
            let newRow = table.insertRow();
            newRow.innerHTML = `<tr>
                                    <td>
                                        <div class="form-group row">
                                            <div class="col-1">
                                                <a href="#" class="btn btn-danger remove-row">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="col-7">
                                                <input type="text" class="form-control nama-barang" readonly>
                                            </div>
                                            <div class="col-4">
                                                <a href="#" class="btn btn-primary pilih-produk" data-toggle="modal" data-target="#pilihBarang">
                                                    Pilih Produk
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control jumlah-barang" value="1">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control harga-barang" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control subtotal-barang" readonly>
                                    </td>
                                </tr>`;

            addRowListeners(newRow);
        });

        document.querySelectorAll('#tabelBarang tbody tr').forEach(function (row) {
            addRowListeners(row);
        });
    });
</script>