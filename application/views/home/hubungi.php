   <?php
    $name = '';
    $email = '';
    if ($this->session->userdata('login', TRUE)) {
        if ($this->session->userdata('role') == 0) {
            $name = $this->session->userdata('name');
            $email = $this->session->userdata('username');
        }
    }
    ?>
   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Hubungi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  Start  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <?php if($this->session->flashdata('errors') != ''): ?>
                    <div class="alert alert-danger text-center" role="alert">
                      <?php echo $this->session->flashdata('errors'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('success')!= ''): ?>
                    <div class="alert alert-success text-center" role="alert">
                      <?php echo $this->session->flashdata('success') ?>
                    </div>
                    <?php endif; ?>
                <!--
                <div class="col-12">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2136.986005919501!2d-73.9685579655238!3d40.75862446708152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258e4a1c884e5%3A0x24fe1071086b36d5!2sThe%20Atrium!5e0!3m2!1sen!2sbd!4v1585132512970!5m2!1sen!2sbd" allowfullscreen></iframe>
                    </div>
                </div>
            -->
                <div class="col-lg-4 col-md-5">
                    <div class="contact-info-wrap gray-bg m-t-40">
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="contact-info-dec">
                                <a target="_blank" href="https://api.whatsapp.com/">+62 82149638130</a>
                            </div>
                        </div>
                        <div class="contact-social m-t-40">
                            <div class="section-content">
                                <h5 class="section-content__title">Follow Us</h5>
                            </div>
                            <div class="social-link m-t-30">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form gray-bg m-t-40">
                        <div class="section-content">
                            <h5 class="section-content__title">Hubungi Kami</h5>
                        </div>
                        <form action="<?php echo base_url(); ?>/comment/send" class="contact-form-style" method="post" id="form-comment" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-box__single-group">
                                        <label for="comment-name">Nama Lengkap</label>
                                        <input class="form-control" id="comment-to=whom" type="hidden" name="to_whom" value="admin" required>
                                        <input class="form-control" id="comment-name" type="text" name="name" value="<?= $name ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="form-box__single-group">
                                        <label for="comment-usname">Username / Email</label>
                                        <input class="form-control" id="comment-usname" type="text" name="usname" value="<?= $email ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-box__single-group">
                                        <label for="comment-file">Upload Bukti</label>
                                        <input id="comment-file" type="file" name="file" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box__single-group">
                                        <label for="inp_comment">Pesan Anda</label>
                                        <textarea class="form-control" name="comment" id="inp_comment" rows="10" required></textarea>
                                    </div>
                                    <button id="tombol_tambah" type="submit" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-30">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->
    <script type="text/javascript">
    $(document).ready(function() {
        const _badWord = ['Anjing', 'Babi', 'Kunyuk', 'Bajingan', 'Asu', 'Bangsat', 'Kampret', 'Kontol', 'Memek', 'Ngentot', 'Pentil', 'Perek', 'Pepek', 'Pecun', 'Bencong', 'Banci', 'Maho', 'Gila', 'Sinting', 'Tolol', 'Sarap', 'Setan', 'Lonte', 'Hencet', 'Taptei', 'Kampang', 'Pilat', 'Keparat', 'Bejad', 'Gembel', 'Brengsek', 'Tai', 'Anjrit', 'Bangsat', 'Fuck', 'Tetek', 'Ngulum', 'Jembut', 'Totong', 'Kolop', 'Pukimak', 'Bodat', 'Heang', 'Jancuk', 'Burit', 'Titit', 'Nenen', 'Bejat', 'Silit', 'Sempak', 'Fucking', 'Asshole', 'Bitch', 'Penis', 'Vagina', 'Klitoris', 'Kelentit', 'Borjong', 'Dancuk', 'Pantek', 'Taek', 'Itil', 'Teho', 'Bejat', 'Pantat', 'Bagudung', 'Babami', 'Kanciang', 'Bungul', 'Idiot', 'Kimak', 'Henceut', 'Kacuk', 'Blowjob', 'Pussy', 'Dick', 'Damn', 'Ass'];
        String.prototype._replaceAllString = function(s, r) {
            return this.split(s).join(r);
        };

        function _filterBadWord(str, txt, dt) {
            if (str) {
                var str = str.toLowerCase();
                txt = txt ? txt : "***";
                dt = dt ? dt : _badWord;
                for (var i = 0; i < dt.length; i++) {
                    var kk = dt[i].toLowerCase();
                    var ii = str.search(kk);
                    if (ii != -1) {
                        // str = str._replaceAllString(kk, txt);
                        return false
                    }
                }
                return true;
            } else {
                return undefined;
            }
        }
        $("#tombol_tambah").click(function() {
            event.preventDefault();
            // var data = $('#form-comment').serialize();

            var data = new FormData($('#form-comment')[0]);
            var inp_comment = $("#inp_comment").val();

            var result = _filterBadWord(inp_comment);
            console.log(result);
            if (result == false) {
                alert("Pesan Anda Berisi Kata-Kata Buruk, Harap Hapus Kata-Kata Buruk Sebelum Melanjutkan");
                // $("#inp_comment").val("");
                return false;
            }
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>/comment/send",
                data: data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#inp_comment").val("");
                    alert("Terimakasih telah menghubungi/memberi kami pesan kami");
                },
                error: (e) => {
                    console.log(e);

                    alert("Error, something wrong.");
                }
            });
        });
    });
</script>