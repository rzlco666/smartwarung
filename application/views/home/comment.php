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
<section class="ftco-section" id="contact_usss">
    <div class="container heading-section">
        <h2 class="text-center mb-4">Hubungi Kami</h2>
        <form method="post" id="form-comment" enctype="multipart/form-data">
            <div class="form-group">
                <label for="comment-name">Nama Lengkap</label>
                <input class="form-control" id="comment-to=whom" type="hidden" name="to_whom" value="admin" required>
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
        <hr>
        <h4 class="text-center">Atau Hubungi Kami Melalui WhatApps</h4>
        <div class="text-center">
            <a href="https://wa.me/" target="_blank">
                <svg height="50pt" viewBox="-1 0 512 512" width="50pt" xmlns="http://www.w3.org/2000/svg">
                    <path d="m10.894531 512c-2.875 0-5.671875-1.136719-7.746093-3.234375-2.734376-2.765625-3.789063-6.78125-2.761719-10.535156l33.285156-121.546875c-20.722656-37.472656-31.648437-79.863282-31.632813-122.894532.058594-139.941406 113.941407-253.789062 253.871094-253.789062 67.871094.0273438 131.644532 26.464844 179.578125 74.433594 47.925781 47.972656 74.308594 111.742187 74.289063 179.558594-.0625 139.945312-113.945313 253.800781-253.867188 253.800781 0 0-.105468 0-.109375 0-40.871093-.015625-81.390625-9.976563-117.46875-28.84375l-124.675781 32.695312c-.914062.238281-1.84375.355469-2.761719.355469zm0 0" fill="#e5e5e5" />
                    <path d="m10.894531 501.105469 34.46875-125.871094c-21.261719-36.839844-32.445312-78.628906-32.429687-121.441406.054687-133.933594 109.046875-242.898438 242.976562-242.898438 64.992188.027344 125.996094 25.324219 171.871094 71.238281 45.871094 45.914063 71.125 106.945313 71.101562 171.855469-.058593 133.929688-109.066406 242.910157-242.972656 242.910157-.007812 0 .003906 0 0 0h-.105468c-40.664063-.015626-80.617188-10.214844-116.105469-29.570313zm134.769531-77.75 7.378907 4.371093c31 18.398438 66.542969 28.128907 102.789062 28.148438h.078125c111.304688 0 201.898438-90.578125 201.945313-201.902344.019531-53.949218-20.964844-104.679687-59.09375-142.839844-38.132813-38.160156-88.832031-59.1875-142.777344-59.210937-111.394531 0-201.984375 90.566406-202.027344 201.886719-.015625 38.148437 10.65625 75.296875 30.875 107.445312l4.804688 7.640625-20.40625 74.5zm0 0" fill="#fff" />
                    <path d="m19.34375 492.625 33.277344-121.519531c-20.53125-35.5625-31.324219-75.910157-31.3125-117.234375.050781-129.296875 105.273437-234.488282 234.558594-234.488282 62.75.027344 121.644531 24.449219 165.921874 68.773438 44.289063 44.324219 68.664063 103.242188 68.640626 165.898438-.054688 129.300781-105.28125 234.503906-234.550782 234.503906-.011718 0 .003906 0 0 0h-.105468c-39.253907-.015625-77.828126-9.867188-112.085938-28.539063zm0 0" fill="#64b161" />
                    <g fill="#fff">
                        <path d="m10.894531 501.105469 34.46875-125.871094c-21.261719-36.839844-32.445312-78.628906-32.429687-121.441406.054687-133.933594 109.046875-242.898438 242.976562-242.898438 64.992188.027344 125.996094 25.324219 171.871094 71.238281 45.871094 45.914063 71.125 106.945313 71.101562 171.855469-.058593 133.929688-109.066406 242.910157-242.972656 242.910157-.007812 0 .003906 0 0 0h-.105468c-40.664063-.015626-80.617188-10.214844-116.105469-29.570313zm134.769531-77.75 7.378907 4.371093c31 18.398438 66.542969 28.128907 102.789062 28.148438h.078125c111.304688 0 201.898438-90.578125 201.945313-201.902344.019531-53.949218-20.964844-104.679687-59.09375-142.839844-38.132813-38.160156-88.832031-59.1875-142.777344-59.210937-111.394531 0-201.984375 90.566406-202.027344 201.886719-.015625 38.148437 10.65625 75.296875 30.875 107.445312l4.804688 7.640625-20.40625 74.5zm0 0" />
                        <path d="m195.183594 152.246094c-4.546875-10.109375-9.335938-10.3125-13.664063-10.488282-3.539062-.152343-7.589843-.144531-11.632812-.144531-4.046875 0-10.625 1.523438-16.1875 7.597657-5.566407 6.074218-21.253907 20.761718-21.253907 50.632812 0 29.875 21.757813 58.738281 24.792969 62.792969 3.035157 4.050781 42 67.308593 103.707031 91.644531 51.285157 20.226562 61.71875 16.203125 72.851563 15.191406 11.132813-1.011718 35.917969-14.6875 40.976563-28.863281 5.0625-14.175781 5.0625-26.324219 3.542968-28.867187-1.519531-2.527344-5.566406-4.046876-11.636718-7.082032-6.070313-3.035156-35.917969-17.726562-41.484376-19.75-5.566406-2.027344-9.613281-3.035156-13.660156 3.042969-4.050781 6.070313-15.675781 19.742187-19.21875 23.789063-3.542968 4.058593-7.085937 4.566406-13.15625 1.527343-6.070312-3.042969-25.625-9.449219-48.820312-30.132812-18.046875-16.089844-30.234375-35.964844-33.777344-42.042969-3.539062-6.070312-.058594-9.070312 2.667969-12.386719 4.910156-5.972656 13.148437-16.710937 15.171875-20.757812 2.023437-4.054688 1.011718-7.597657-.503906-10.636719-1.519532-3.035156-13.320313-33.058594-18.714844-45.066406zm0 0" fill-rule="evenodd" />
                    </g>
                </svg>
            </a>
        </div>
    </div>
</section>
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