<?php
require '../server/baglan.php';
$customCSS = array(
  '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
  '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
  '<script src="../assets/plugins/apexcharts/apexcharts.min.js"></script>',
  '<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>',
  '<script src="../assets/js/pages/dashboard.js"></script>'
);
$page_title = 'UwU PANEL';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

$query = "SELECT * FROM sh_kullanici";

if ($result = mysqli_query($conn, $query)) {
  $rowcount = mysqli_num_rows($result);
  $rowcount;
} else {
  $rowcount = "0";
}
?>
<style>
  .kural {
    color: #fff;
    font-size: 18px;
  }

  table thead tr th {
    color: #fff !important;
  }

  tr td {
    color: #fff;
  }
</style>
<!--BAŞLANGIC-->
<div class="main-wrapper">
  <div class="row">
    <div class="col-md-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="stats-info">
            <h9 class="card-title">TOPLAM KULLANICILAR<span class="stats-change stats-change-info"></span></h9>
            <h4 style="color: #fff" class="stats-text"><?php echo $rowcount; ?></h4>
          </div>
          <div class="stats-icon change-danger">
            <i class="material-icons">account_circle</i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="stats-info">
            <h9 class="card-title">ÜYELİK<span class="stats-change stats-change-success"></span></h9>
            <p style="color: #fff" class="stats-text"><?php echo $uyelik; ?></p>
          </div>
          <div class="stats-icon change-success">
            <i class="material-icons">verified_user</i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="card card-bg">
        <div class="card-body">
          <h5 style="font-size: 26px" class="card-title">DUYURU PANELİ</h5>
          <table class="table crypto-table">
            <tr>
              <th scope="col">DUYURU İÇERİĞİ</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">YAYIN TARİHİ</th>
            </tr>
            <tbody>
              <?php
              $query = mysqli_query($conn, "SELECT * FROM `sh_duyuru`");
              while ($getvar = mysqli_fetch_assoc($query)) {
                echo '
                                <tr>
                                  <td style="color: #fff"><img src="" alt="">' . $getvar['d_icerik'] . '</td>
                                  <td style="color: #fff"></td>
                                  <td style="color: #fff" class="text-danger"></td>
                                  <td style="color: #fff"><button type="button" class="btn btn-link">' . $getvar['d_time'] . '</button></td>
                                </tr>
								';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-bg">
        <div class="card-body" style="height: 206.2px !important;">
          <h5 class="card-title">ÜYELİK BİLGİLERİNİZ</h5>
          <table class="table">
            <tr>
              <th scope="col">ÜYELİK</th>
              <th scope="col">BİTİŞ TARİHİ</th>
            </tr>
            <tbody>
              <?php
              switch ($uyelik) {
                case 'Freemium':
                  echo '                                          <tr>
                                        <td>Freemuim</td>
                                        <td><span class="badge bg-success">Süresiz</span></td>
                                        </tr>';
                  break;
                case 'Premium':
                  echo '                                          <tr>
                                        <td>Premium</td>
                                        <td><span class="badge bg-success">' . $bitis_tarihi . '</span></td>
                                        </tr>';
                  break;
                case 'Admin':
                  echo '
                                        <td>Admin</td>
                                        <td><span class="badge bg-success">Süresiz</span></td>
                                        </tr>';
                  break;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-bg">
          <div class="card-body">
            <h5 style="font-size: 26px" class="card-title">KURALLAR</h5>
            <ul class="kural">
            <li class="kural" style="text-shadow: #6495ed 1px 1px 25px; background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);">Sorgu panelimizde <span style="color: yellow; font-weight: 500"><b>MULTİ (ÇİFT HESAP) ÜYELİK KULLANIMI</b></span>
                kesinlikle yasaktır, kullanmanız durumunda sistem otomatik algılayıp hesabınızı silecektir.</li>
              <li class="kural">Ünlülere ve Devlet yetkililerine sorgu atıldığı taktirde hesabınız otomatik olarak silinecektir.
              </li>
              <li class="kural">UwU Panel üyeliğini farklı kişilere ucuz yoldan, komisyonculuğunu kovayalan kişiler tespit edilirse siteden Permanent BAN yiyecektir.
              </li>
              <li class="kural">Kendisini UwU Adminiyim & Yetkilisiyim diye tanıtan şahıslara itibar etmeyiniz.
              </li>
              <li class="kural">Üyelik satın alındıktan sonra iade kabul edilmez!<br>
              </li>
              <li class="kural">Sitemizde ban atılan kişiler tekrar üyelik alabilir.<br>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="content py-3">
  <div class="row fs-sm">
    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
      Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="Kronik.org" target="_blank">UwU v2.1</a>
    </div>
    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
      <a class="fw-semibold" href="Kronik.org" target="_blank">UwU v2.1</a> © <span data-toggle="year-copy" class="js-year-copy-enabled">2022 - 2023</span>
    </div>
  </div>
</div>

<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>