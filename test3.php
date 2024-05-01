<label for="subkegiatan" class="form-label">Sub Kegiatan</label>
<select name="subkegiatan" type="text" class="form-select" value="<?= $isi['subkegiatan']; ?>"
id="autocompleteSelect" aria-label="Default select example" >
<option selected disabled >PILIH NAMA</option>
<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM kegiatan") or die(mysqli_error($koneksi));
while ($data = mysqli_fetch_array($query)) {
    echo "<option value='$data[norek]'>$data[namakegiatan]</option>";
}
?>
</select>
</div>
<div class="col mb-2">
<label for="selectedItem" class="form-label">Kode Anggaran</label>
<input name="selectedItem" type="text" id="selectedItem" class="form-control" placeholder="Kode Rekening" />
</div>
</div>
<!--auto kegiatan -->
<script>
document.addEventListener('DOMContentLoaded', function () {
 new Autocomplete('#autocompleteSelect', {
    serviceUrl: 'ajax3.php', // Ganti dengan URL dari file PHP Anda
    onSelect: function (suggestion) {
      document.getElementById('selectedItem').value = suggestion.selectedItem;
    }
 });
});
</script>
<!-- akhir -->