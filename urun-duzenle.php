<?php

include 'header.php';

$urunsor = $db->prepare("SELECT * FROM urun where urun_id=:id");
$urunsor->execute(array(
  'id' => $_GET['urun_id']
));

$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

?>

<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Düzenleme<small>

                <?php

                if (@$_GET['durum'] == "ok") { ?>

                  <b style="color:green;">İşlem Başarılı...</b>

                <?php } elseif (@$_GET['durum'] == "no") { ?>

                  <b style="color:red;">İşlem Başarısız...</b>

                <?php }

                ?>

              </small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <form action="admin/connect/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <!-- Kategori seçme başlangıç -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php

                  $urun_id = $uruncek['kategori_id'];

                  $kategorisor = $db->prepare("select * from kategori where kategori_order=:kategori_order order by kategori_id");
                  $kategorisor->execute(array(
                    'kategori_order' => 0
                  ));

                  ?>
                  <select class="select2_multiple form-control" required="" name="kategori_id">

                    <?php

                    while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {

                      $kategori_id = $kategoricek['kategori_id'];

                    ?>

                      <option <?php if ($kategori_id == $urun_id) {
                                echo "selected='select'";
                              } ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

                    <?php } ?>

                  </select>
                </div>
              </div>

              <!-- kategori seçme bitiş -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_ad" value="<?php echo $uruncek['urun_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Fiyat
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_fiyat" value="<?php echo $uruncek['urun_fiyat'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Stok
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_stok" value="<?php echo $uruncek['urun_stok'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="heard" class="form-control" name="urun_durum" required>

                    <!-- Kısa İf Kulllanımı 

                    <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->

                    <option value="1" <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>

                    <option value="0" <?php if ($uruncek['urun_durum'] == 0) {
                                        echo 'selected=""';
                                      } ?>>Pasif</option>
                    <!-- <?php

                          if ($uruncek['urun_durum'] == 0) { ?>

                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>

                   <?php } else { ?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                    ?> -->

                  </select>
                </div>
              </div>

              <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">

              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="urunduzenle" class="btn btn-success">Güncelle</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>