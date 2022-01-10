<?php
ob_start();
session_start();

include 'baglan.php';
include '../../fonksiyon.php';

if (isset($_POST['admingiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
	));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../..//index.php");
		exit;

	} else {

		header("Location:../..//login.php?durum=no");
		exit;
	}
}

if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum']
	));

	if ($update) {

		Header("Location:../../kullanici.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../../kullanici.php?kullanici_id=$kullanici_id&durum=no");
	}
}

if (isset($_POST['kullanicibilgiguncelle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_adsoyad=:kullanici_adsoyad
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad']
	));

	if ($update) {

		Header("Location:../../kullanici.php?durum=ok");

	} else {

		Header("Location:../../kullanici.php?durum=no");
	}
}

if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
	));

	if ($kontrol) {

		header("location:../../kullanici.php?sil=ok");

	} else {

		header("location:../../kullanici.php?sil=no");

	}
}

if (isset($_POST['kategoriduzenle'])) {

	$kategori_id=$_POST['kategori_id'];
	$kategori_seourl=seo($_POST['kategori_ad']);
	$kaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:ad
		WHERE kategori_id={$_POST['kategori_id']}");
	$update=$kaydet->execute(array(
		'ad' => $_POST['kategori_ad']		
	));

	if ($update) {

		Header("Location:../../kategori.php?durum=ok&kategori_id=$kategori_id");

	} else {

		Header("Location:../../kategori.php?durum=no&kategori_id=$kategori_id");
	}
}

if (isset($_POST['kategoriekle'])) {

	$kategori_seourl=seo($_POST['kategori_ad']);

	$kaydet=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:ad
		");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['kategori_ad']		
	));

	if ($insert) {

		Header("Location:../../kategori.php?durum=ok");

	} else {

		Header("Location:../../kategori.php?durum=no");
	}
}

if ($_GET['kategorisil']=="ok") {
	
	$sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
	$kontrol=$sil->execute(array(
		'kategori_id' => $_GET['kategori_id']
	));

	if ($kontrol) {

		Header("Location:../../kategori.php?durum=ok");

	} else {

		Header("Location:../../kategori.php?durum=no");
	}
}

if ($_GET['urunsil']=="ok") {
	
	$sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
	));

	if ($kontrol) {

		Header("Location:../../urun.php?durum=ok");

	} else {

		Header("Location:../../urun.php?durum=no");
	}
}

if (isset($_POST['urunekle'])) {

	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("INSERT INTO urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_fiyat=:urun_fiyat,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok	
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],		
		'urun_fiyat' => $_POST['urun_fiyat'],				
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok']

	));

	if ($insert) {

		Header("Location:../../urun.php?durum=ok");

	} else {

		Header("Location:../../urun.php?durum=no");
	}
}

if (isset($_POST['urunduzenle'])) {

	$urun_id=$_POST['urun_id'];
	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("UPDATE urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_fiyat=:urun_fiyat,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok	
		WHERE urun_id={$_POST['urun_id']}");
	$update=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
	));

	if ($update) {

		Header("Location:../../urun.php?durum=ok&urun_id=$urun_id");

	} else {

		Header("Location:../../urun.php?durum=no&urun_id=$urun_id");
	}
}
?>