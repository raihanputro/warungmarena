<!-- Bootstrap core JavaScript-->
<footer class="sticky-footer bg-dark mt-3">
                <div class="container my-auto">
                    <div class="copyright text-center text-white">
                        Warung Marena <br>
                        Jalan Cipedak Raya RT 07/ RW 09 Srengseng Sawah Jagakarsa <br>
                        085156637952 <br>
                        raihanputromaulana477@gmail.com
                    </div>
                    <br>
                    <div class="copyright text-center my-auto text-white">
                        <span>Copyright &copy; Warung Marena 2022</span>
                    </div>
                </div>
            </footer>
            
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<script>

$(function() {
    $('.disclaimer').hide();
});

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

$('#ekspedisi').change(function() {
      var val = $(this).val();
      var text = $('#template').text();
      var subtotal = $('#subtotal').text();
      let selected = "<?= @$user->rt ?>";
    //   text += '<br> Ongkir : ' + 0 + " <br> Total : " + addCommas(parseInt(subtotal))
      
      $('#total').html(text);
      
      if (val == 'ANTAR') {
          $('#rt').html(`
            <option data-harga="0">PILIH</option>
                                <option value="RT 07 / RW 09|2000" data-harga="2000" ${selected=='RT 07 / RW 09' ? 'selected' : ''}>RT 07 / RW 09</option>
                                <option value="RT 06 / RW 09|3000" data-harga="3000" ${selected=='RT 06 / RW 09' ? 'selected' : ''}>RT 06 / RW 09</option>
                                <option value="RT 05 / RW 09|4000" data-harga="4000" ${selected=='RT 05 / RW 09' ? 'selected' : ''}>RT 05 / RW 09</option>
                                <option value="RT 04 / RW 09|5000" data-harga="5000" ${selected=='RT 04 / RW 09' ? 'selected' : ''}>RT 04 / RW 09</option>
                                <option value="RT 14 / RW 09|6000" data-harga="6000" ${selected=='RT 14 / RW 09' ? 'selected' : ''}>RT 14 / RW 09</option>
          `)
      } else if (val == 'AMBIL SENDIRI') {
          $('#rt').html(`
            <option data-harga="0">PILIH</option>
                                <option value="RT 07 / RW 09|0" data-harga="0" ${selected=='RT 07 / RW 09' ? 'selected' : ''}>RT 07 / RW 09</option>
                                <option value="RT 06 / RW 09|0" data-harga="0" ${selected=='RT 06 / RW 09' ? 'selected' : ''}>RT 06 / RW 09</option>
                                <option value="RT 05 / RW 09|0" data-harga="0" ${selected=='RT 05 / RW 09' ? 'selected' : ''}>RT 05 / RW 09</option>
                                <option value="RT 04 / RW 09|0" data-harga="0" ${selected=='RT 04 / RW 09' ? 'selected' : ''}>RT 04 / RW 09</option>
                                <option value="RT 14 / RW 09|0" data-harga="0" ${selected=='RT 14 / RW 09' ? 'selected' : ''}>RT 14 / RW 09</option>
          `)
      }
      
      $('#rt').trigger('change');
    });
    
    
    $('#rt').change(function() {
      var harga = $(this).find(':selected').attr('data-harga');
      var subtotal = $('#subtotal').text();
      var text = $('#template').text();
      text += '<br> Ongkir : ' + addCommas(harga) + " <br> Total : " + addCommas(parseInt(harga)+parseInt(subtotal))
      $('#total').html(text);
    });
</script>

<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>



</body>

</html>