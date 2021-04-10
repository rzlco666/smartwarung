    <!-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> -->
<script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            margin: 10,
            autoWidth: true,
            // autoHeigth:true,
            items: 1
        });
        $("#target").submit(function(event) {
            if (parseInt($('#stock').text()) < parseInt($('#quantity').val())) {
                alert("Pesanan lebih banyak dari stok yang ada!");
                event.preventDefault();
            };
            <?php if ($this->session->userdata('role') == null) : ?>
                alert("Anda harus login terlebih dahulu!");
                event.preventDefault();
            <?php endif; ?>
        });
    });
</script>
</body>

</html>