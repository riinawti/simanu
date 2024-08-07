  <footer id="footer" class="footer">
    <div class="copyright"> &copy; Copyright <strong><span>SIMANU</span></strong>. <?= date('Y') ?></div>
    <div class="credits"> with love <a href="https://www.instagram.com/riinawti_/" target="_blank">Rinawati</a></div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="<?= base_url('public/assets/js/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/chart.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/echarts.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/quill.min.js') ?>"></script>
  <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
  <script src="<?= base_url('public/assets/js/tinymce.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/validate.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/main.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    let table = new DataTable('#myTable');
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
      $('.select2').select2();
    });

    $(document).ready(function() {
      $.ajax({
        url: '/simanu/barang/getDataAjax',
        type: 'get',
        success: function(response) {
          tes(response)
        }
      })

      function tes(response) {
        var obatCount = 1;
        $('#tombol-item').on('click', function(e) {
          e.preventDefault();
          obatCount++;
          var newObatDiv = ` 
          <div class = "row mb-3" > 
          <label for = "inputEmail3" class = "col-sm-2 col-form-label" > Nama Barang ${obatCount} </label> 
          <div class = "col-sm-10" >
       <select name="barang[]" class="form-control">
                     ${generateOptions(response)}
                    </select> </div> 
          </div>
                <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Harga ${obatCount}</label>
                                <div class="col-sm-10"> <input type="number" class="form-control" id="inputText" required name="harga_beli[]"></div>
                           
                            </div>
            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah ${obatCount}</label>
                                <div class="col-sm-10"> <input type="number" class="form-control" id="inputText" required name="jumlah[]"></div>
                           
                            </div>
              `;
          $('#barang-container').append(newObatDiv);
        });
      }

      function generateOptions(response) {
        let optionsHTML = '';
        // Loop through the response data and generate HTML options
        response.forEach(function(item) {
          optionsHTML += `<option value="${item.id_barang}">${item.nama_barang}</option>`;
        });
        return optionsHTML;
      }

    });
    $(document).ready(function() {
      $('input[name="metode"]').change(function() {
        if ($('#kredit').is(':checked')) {
          $('#tunaiInput').val(0).prop('readonly', true);
          $('#orang').show()
        } else {
          $('#tunaiInput').val('').prop('readonly', false);
          $('#orang').hide()
        }
      });
      $('#diskon').on('change', function() {
        let tunai = parseFloat($('#total').val()) || 0; // Konversi nilai input menjadi angka, default 0 jika NaN
        let diskon = parseFloat($(this).val()) || 0; // Konversi nilai input menjadi angka, default 0 jika NaN

        $('#total').val(tunai - diskon);
      })
      $('#tunaiInput').on('input', function() {
        var total = parseFloat($('#total').val()) || 0;
        var tunai = parseFloat($(this).val()) || 0;
        var kembalian = tunai - total;
        if ($(this).val() === '') {
          $('#kembalian').val('');
        } else {
          var kembalian = tunai - total;
          $('#kembalian').val(kembalian);
        }
      });
    });
  </script>
  <script>
    // $(document).ready(function() {

    // })

    $('#jenis').change(function() {
      const opt = $(this).val();
      $.ajax({
        url: '<?php echo site_url('angsuran/getData'); ?>',
        type: 'POST',
        data: {
          jenis: opt
        },
        dataType: 'json',
        success: function(data) {
          let html = `
                <div class="row mb-3" id="status-container">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">${opt == 'hutang' ? 'Kode Hutang' : 'Kode Piutang'}</label>
                    <div class="col-sm-10">
                        <select name="kode" class="form-control" id="jenis_pembayaran">`;

          if (opt == 'hutang') {
            data.forEach(function(item) {
              html += `<option value="${item.id_hutang}">${item.kd_hutang}</option>`;
            });
          } else {
            data.forEach(function(item) {
              html += `<option value="${item.id_piutang}">${item.kd_piutang}</option>`;
            });
          }

          html += `</select>
                    </div>
                </div>`;

          // Hapus elemen sebelumnya
          $('#status-container').remove();

          // Tambahkan elemen baru setelah elemen dengan id 'jenis'
          $('#status').after(html);
        }
      });
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const grafikstok = <?php echo json_encode($grafikstok); ?>;

      const ctx = document.getElementById('myChart').getContext('2d');

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: grafikstok.map(product => product.nama_barang),
          datasets: [{
            label: 'Jumlah stok',
            data: grafikstok.map(product => product.stok),
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: true,
              position: 'top'
            },
            tooltip: {
              callbacks: {
                label: function(context) {
                  let label = context.dataset.label || '';
                  if (label) {
                    label += ': ';
                  }
                  if (context.parsed.y !== null) {
                    label += context.parsed.y;
                  }
                  return label;
                }
              }
            }
          },
          scales: {
            x: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Nama Barang'
              }
            },
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Jumlah Stok'
              }
            }
          }
        }
      });
    });
  </script>
  </body>

  </html>