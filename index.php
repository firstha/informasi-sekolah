<?php 
include 'session_check.php'; 

// ambil session
$user = $_SESSION; 
?>
<?php include 'header.php'; ?>



<div class="container mt-5">
  <h3>Hallo, <b> <?php echo $user['nama']; ?>! </b></h3>
  <p>Selamat datang di Aplikasi Sistem Informasi Sekolah</p>
</div>
<div class="position-absolute" style="top: 105px; right: 50px;">
      <div class="card p-3 text-center shadow-sm">
        <img src="/data_sekolah_firstha/img/<?= $user['gambar']; ?>" alt="Foto Profil" class="foto-profil mb-3">
        <p style="font-size: 15px; color: #006400;"><?php echo $user['nama']; ?></p>
        <a href="/data_sekolah_firstha/profil.php" class="btn btn-sm btn-secondary">Edit Profil</a>
      </div>
    </div>
    

<style>
    /*.judul {
        font-size: 80px;
        font-family: "Moirai One", system-ui;
        color: #4A7C59;
        padding: 0px;
    }
*/    .foto-profil {
        width: 120px;  
        height: 120px;
        border: 2px solid #006400; 
        border-radius: 50%;       
        object-fit: cover; /* Ga gepeng */
    }
</style>

<?php include 'footer.php'; ?>
