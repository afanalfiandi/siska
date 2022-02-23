<footer class="main-footer d-flex p-2 px-3 bg-white border-top sticky">
    <span class="copyright ml-auto my-auto mr-2">Copyright © 2022
        <a href="https://designrevision.com" rel="nofollow">SMKN1Purwokerto</a>
    </span>
</footer>
</main>
</div>
</div>

<div class="modal fade" id="keluarModal" tabindex="-1" role="dialog" aria-labelledby="keluarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keluarModalLabel">Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <a href="../api/logout.php" class="btn btn-primary">Keluar</a>
            </div>
        </div>
    </div>
</div>
<!-- <div class="promo-popup animated">
        <div class="pp-intro-bar"> Need More Templates?
            <span class="close">
                <i class="material-icons">close</i>
            </span>
            <span class="up">
                <i class="material-icons">keyboard_arrow_up</i>
            </span>
        </div>
        <div class="pp-inner-content">
            <h2>Shards Dashboard Pro</h2>
            <p>A premium & modern Bootstrap 4 admin dashboard template pack.</p>
            <a class="pp-cta extra-action" href="http://bit.ly/shards-dashboard-pro">Download</a>
        </div>
    </div> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
<script src="../assets/scripts/extras.1.1.0.min.js"></script>
<script src="../assets/scripts/shards-dashboards.1.1.0.min.js"></script>
<script src="../assets/scripts/app/app-blog-overview.1.1.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
    function getUser() {
        var getNama = window.localStorage.getItem('nama');
        var getNip = window.localStorage.getItem('nip');
        var getJurusan = window.localStorage.getItem('jurusan');
        var getImg = window.localStorage.getItem('img');

        document.getElementById('nama').innerHTML = getNama;
        document.getElementById('nip').value = getNip;
        document.getElementById('img').src = getImg;
        document.getElementById('form-pembimbing').value = getNama;
    }

    $(document).ready(function() {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function() {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

    });

    $(".select_peserta").select2({
        placeholder: "-- Nama Peserta Didik --"
    });
    
    $(document).ready(function() {
        var maxField = 14;
        var addButton = $('#add_button');
        var wrapper = $('.field_wrapper');
        var fieldHTML = "<tr><td style='width: 65%;'><input type='text' class='form-control' name='kegiatan[]' value='' placeholder='Kegiatan PKL' /></td><td><select name='relevansi[]' id='' class='form-control'><option value=''>Relevansi Dengan KK</option><option value='Ya'>Ya</option><option value='Tidak'>Tidak</option></select></td><!--td><a href='javascript:void(0);' class='btn btn-danger remove_button' title='Hapus'>-</a></td--></tr>";
        var x = 1;


        $(addButton).click(function() {
            if (x < maxField) {
                x++;
                $(wrapper).append(fieldHTML);
            }
        });

        $(wrapper).on('click', '#remove_button', function(e) {
            e.preventDefault();
            $(this).parent('tr').remove();
            x--;
        });
    });

    $(document).ready(function() {
        var maxField = 14; //Input fields increment limitation
        var addButton = $('#add_saran'); //Add button selector
        var wrapper = $('.saran_wrapper'); //Input field wrapper
        var fieldHTML = "<div class='row'><div class='col-sm-4 mt-1 mb-1'><input type='text' class='form-control' name='kegiatan_saran[]' placeholder='Kegiatan'></div><div class='col-sm-4 mt-1 mb-1'><input type='text' class='form-control' name='saran[]' placeholder='Saran/Masukan'></div><div class='col-sm-4 mt-1 mb-1'><textarea name='catatan[]' placeholder='Catatan' class='form-control' cols='30' rows='1'></textarea></div></div><hr>";
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

    /** bukti monitoring alamat iduka */
    <?php echo $jsArray; ?>

    function changeValue(id) {
        document.getElementById('alamat').value = ditIduka[id].alamat;
    };
</script>
</body>

</html>