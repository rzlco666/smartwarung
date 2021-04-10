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
<section class="ftco-section">
    <div class="container heading-section">
        <h2 class="text-center mb-4">Kritik Saran/Hubungi Warung <?php echo $user['name']; ?></h2>
        <!-- <div class="row">
        <?php foreach ($comment as $key => $value) { ?>
            <div class="col-sm-12">
                <b><?= $value['sender_name']; ?><b> (<?= $value['username']; ?>)<br>
                <p><?= $value['message'] ?></p>
                <span class="text-small text-muted"><?= $value['date'] ?></span>
            </div>
            <?php if ($value['type'] == 1) { ?>
            <?php } ?>
        <?php } ?>
    </div> -->
        <form method="post" id="form-comment" enctype="multipart/form-data">
            <div class="form-group">
                <label for="comment-name">Nama Lengkap</label>
                <input class="form-control" id="comment-to=whom" type="hidden" name="to_whom" value="<?= $uswarung ?>" required>
                <input class="form-control" id="comment-name" type="text" name="name" value="<?= $name ?>" required>
            </div>
            <div class="form-group">
                <label for="comment-usname">Username / Email</label>
                <input class="form-control" id="comment-usname" type="text" name="usname" value="<?= $email ?>" required>
            </div>
            <div class="form-group">
                <label for="comment-file">Upload Bukti</label>
                <input class="form-control" id="comment-file" type="file" name="file" required>
            </div>
            <div class="form-group">
                <label for="inp_comment">Pesan Anda</label>
                <textarea class="form-control" name="comment" id="inp_comment" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <button id="tombol_tambah" type="button" class="btn btn-primary btn-block">Kirim</button>
            </div>
        </form>
    </div>
</section>
<!-- <script type="text/javascript" src="https://cdn.rawgit.com/lamhotsimamora/Filter-Kata-Kotor/master/filter-bad-word.js"></script> -->
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