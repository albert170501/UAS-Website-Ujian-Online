<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 5000);
class MasterData {

    private $ismysql = false;
    private $servername = "localhost";
    private $usernameDB = "root";
    private $passwordDB = "";
    private $dbname = "ujianonline";
    private $userlogin;
    private $conn;
    private $data;

    function login($username, $password) {

        $this->open();

        $query = "SELECT id, username, id_master_kelas, id_master_jabatan, nama FROM master_user WHERE username=? AND password = ? AND is_active = 1";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        $test = mysqli_stmt_get_result($stmt);
        
        $i = 0;
        $data = [];
        while($row = mysqli_fetch_array($test)){
            $data['id'] = $row['id'];
            $data['username'] = $row['username'];
            $data['nama'] = $row['nama'];
            $data['id_master_kelas'] = $row['id_master_kelas'];
            $data['id_master_jabatan'] = $row['id_master_jabatan'];
            
            $i++;
        }

        $this->close();

        return $data;

    }

    function open() {
        require('Setup.php');
        $this->conn = mysqli_connect($this->servername, $this->usernameDB, $this->passwordDB, $this->dbname);
        // Check connection
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
       
    }

    function close() {
        mysqli_close($this->conn);
    }

    function getGroupAkses($group, $username) {
        $this->open();
        $query = "SELECT top 1 * FROM master_user u, master_hak_akses h,master_modul_form f, master_modul_group g WHERE u.id_master_jabatan = h.id_master_jabatan and f.id_master_modul_group = g.id_master_modul_group and f.id_master_modul_form = h.id_master_modul_form and f.id_master_modul_group = ? and u.username = ?";
        $param = array(&$group, &$username);
        $stmt = mysqli_query($this->conn, $query, $param, array("Scrollable" => SQLSRV_CURSOR_KEYSET));
        $row_count = mysqli_num_rows($stmt);
        return $row_count;
        $this->close();
    }

    function getHakAkses($form, $username) {
        $this->open();
        $query = "SELECT * FROM master_user u, master_hak_akses h WHERE u.id_master_jabatan = h.id_master_jabatan and h.id_master_modul_form = ? and u.username = ?";
        $param = array(&$form, &$username);
        $stmt = mysqli_query($this->conn, $query, $param, array("Scrollable" => SQLSRV_CURSOR_KEYSET));
        $row_count = mysqli_num_rows($stmt);
        return $row_count;
        $this->close();
    }

    function getMasterUserById($id) {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM master_user WHERE id = '".$id."' ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function getMasterUser() {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM master_user WHERE is_active = 1 ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function addMasterUser($data){
        $this->open();
        
        $query = 'INSERT INTO master_user (username, password, nama, alamat, email, telepon, kelamin, sekolah, jurusan, id_master_kelas, hobi, catatan, id_master_jabatan) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?) ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssssississi", $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[13]);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function updateMasterUser($id, $data){
        $this->open();
        
        $query = 'UPDATE master_user SET username = ?, password = ?, nama = ?, alamat = ?, email = ?, telepon = ?, kelamin = ?, sekolah = ?, jurusan = ?, id_master_kelas = ?, hobi = ?, catatan = ?, id_master_jabatan = ? WHERE id = ? ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssssississii", $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[13], $id);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function getMasterKelas() {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM master_kelas WHERE is_active = 1 ORDER BY id ASC ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function getMasterKelasById($id) {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM master_kelas WHERE id = ".$id." ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function addMasterKelas($nama){
        $this->open();
        
        $query = 'INSERT INTO master_kelas (nama) VALUES (?) ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $nama);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function updateMasterKelas($id, $nama){
        $this->open();
        
        $query = 'UPDATE master_kelas SET nama = ? WHERE id = ? ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "si", $nama, $id);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function getMasterJudulUjian() {
        $this->open();
        $this->clearArray();

        $query = "SELECT mju.id, mju.nama, mk.nama AS nama_kelas, mju.tanggal_awal, mju.tanggal_akhir, mju.warna
                FROM master_judul_ujian mju, master_kelas mk
                WHERE mju.id_master_kelas = mk.id AND mju.is_active = 1
                ORDER BY id ASC ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function getMasterJudulUjianByJabatan($jabatan, $kelas) {
        $this->open();
        $this->clearArray();

        if($jabatan == 1){
            $query = "SELECT mju.id, mju.nama, mju.deskripsi, mju.tanggal_awal, mju.tanggal_akhir, mju.kesempatan 
                FROM master_judul_ujian mju
                WHERE mju.id_master_kelas AND mju.is_active = 1
                ORDER BY id ASC ";
        }else{
            $query = "SELECT mju.id, mju.nama, mju.deskripsi, mju.tanggal_awal, mju.tanggal_akhir, mju.kesempatan 
                FROM master_judul_ujian mju
                WHERE mju.id_master_kelas AND mju.id_master_kelas = ".$kelas." AND mju.is_active = 1
                ORDER BY id ASC ";
        }
        
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function getMasterJudulUjianById($id) {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM master_judul_ujian WHERE id = ".$id." ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function addMasterJudulUjian($nama, $deskripsi, $kelas, $tanggalAwal, $tanggalAkhir, $durasi, $kesempatan, $warna){
        $this->open();
        
        $query = 'INSERT INTO master_judul_ujian (nama, deskripsi, id_master_kelas, tanggal_awal, tanggal_akhir, durasi, kesempatan, warna) VALUES (?,?,?,?,?,?,?,?) ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "ssissiis", $nama, $deskripsi, $kelas, $tanggalAwal, $tanggalAkhir, $durasi, $kesempatan, $warna);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function updateMasterJudulUjian($id, $nama, $deskripsi, $kelas, $tanggalAwal, $tanggalAkhir, $durasi, $kesempatan, $warna){
        $this->open();
        
        $query = 'UPDATE master_judul_ujian SET nama = ?, deskripsi = ?, id_master_kelas = ?, tanggal_awal = ?, tanggal_akhir = ?, durasi = ?, kesempatan = ?, warna = ? WHERE id = ? ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "ssissiisi", $nama, $deskripsi, $kelas, $tanggalAwal, $tanggalAkhir, $durasi, $kesempatan, $warna, $id);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }
    
    function getMasterSoalUjian() {
        $this->open();
        $this->clearArray();

        $query = "SELECT msu.id, msu.soal, mju.nama AS judul_ujian, mju.tanggal_awal, mk.nama AS nama_kelas, msu.soal, mju.tanggal_akhir
                    FROM master_soal_ujian msu, master_judul_ujian mju, master_kelas mk 
                    WHERE msu.id_master_judul_ujian = mju.id AND mju.id_master_kelas = mk.id AND msu.is_active = 1 ORDER BY msu.id ASC ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function getMasterSoalUjianById($id) {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM master_soal_ujian WHERE id = ".$id." ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function getMasterSoalUjianByIdMasterJudulujian($id) {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM master_soal_ujian WHERE is_active = 1 AND id_master_judul_ujian = ".$id." ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function addMasterSoalUjian($data){
        $this->open();
        
        $query = 'INSERT INTO master_soal_ujian (id_master_judul_ujian, soal, soal_gambar, pilihan_a, pilihan_a_gambar, pilihan_b, pilihan_b_gambar, pilihan_c, pilihan_c_gambar, pilihan_d, pilihan_d_gambar, jawaban) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?) ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "issssssssssi", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11]);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function updateMasterSoalUjian($data, $id){
        $this->open();
        
        $query = 'UPDATE master_soal_ujian SET id_master_judul_ujian = ?, soal = ?, soal_gambar = ?, pilihan_a = ?, pilihan_a_gambar = ?, pilihan_b = ?, pilihan_b_gambar = ?, pilihan_c = ?, pilihan_c_gambar = ?, pilihan_d = ?, pilihan_d_gambar = ?, jawaban = ? WHERE id = ? ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "issssssssssii", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $id);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function addHeaderUjian($idUser, $kelas, $idMasterUjian, $jamAkhir){
        $this->open();
        
        $query = 'INSERT INTO ujian (id_master_user, id_master_kelas, id_master_judul_ujian, tanggal_ujian, jam_akhir) VALUES (?,?,?,?,?) ';
        $stmt = mysqli_prepare($this->conn, $query);
        $tanggal = date("Y-m-d H:i:s");
        mysqli_stmt_bind_param($stmt, "iiiss", $idUser, $kelas, $idMasterUjian, $tanggal, $jamAkhir);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function addDetailUjian($data){
        $this->open();
        
        $query = 'INSERT INTO ujian_detail (id_ujian, soal, soal_gambar, pilihan_a, pilihan_a_gambar, pilihan_b, pilihan_b_gambar, pilihan_c, pilihan_c_gambar, pilihan_d, pilihan_d_gambar, jawaban, jawaban_user) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?) ';
        $stmt = mysqli_prepare($this->conn, $query);
        $tanggal = date("Y-m-d H:i:s");
        mysqli_stmt_bind_param($stmt, "issssssssssii", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12]);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function setStatusHeaderUjian($idUser){
        $this->open();
        
        $query = 'UPDATE ujian SET status = 0 WHERE status = 1 AND id_master_user = ? ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $idUser);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function updateHeaderUjian($idUser, $totalSoal, $totalBenar){
        $this->open();
        
        $query = 'UPDATE ujian SET total_soal = ?, total_benar = ?, status = 2 WHERE status = 1 AND id_master_user = ? ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "iii", $totalSoal, $totalBenar, $idUser);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function getHeaderUjian($id) {
        $this->open();
        $this->clearArray();

        $query = "SELECT id, tanggal_ujian, jam_akhir, id_master_judul_ujian FROM ujian WHERE status = 1 AND id_master_user = ".$id." ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function getHeaderUjianByUser($id) {
        $this->open();
        $this->clearArray();

        $query = "SELECT u.*, mk.nama, mk.deskripsi FROM ujian u, master_judul_ujian mk WHERE u.id_master_judul_ujian = mk.id AND u.status = 2 AND u.id_master_user = ".$id." ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }
    
    function getKesempatan($idUser, $idMasterUjian) {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM ujian WHERE status = 2 AND id_master_user = ".$idUser." AND id_master_judul_ujian = ".$idMasterUjian." ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function getHeaderUjianById($idUjian) {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM ujian WHERE id = ".$idUjian." ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function getDetailHasilUjian($idUjian) {
        $this->open();
        $this->clearArray();

        $query = "SELECT * FROM ujian_detail WHERE id_ujian = ".$idUjian." ";
        $stmt = mysqli_query($this->conn, $query);
        $numFields = mysqli_num_fields($stmt);
        $currow = 0;
        while ($row = mysqli_fetch_array($stmt)) {
            for ($i = 0; $i < $numFields; $i++) {
                $this->data[$currow][$i] = $row[$i];
            }
            $currow++;
        }

        $this->close();
        return $this->data;
    }

    function saveSetting($id, $password, $nama, $email, $sekolah, $kelamin, $alamat, $telepon, $jurusan, $hobi, $catatan){
        $this->open();
        
        $query = 'UPDATE master_user SET password = ?, nama = ?, email = ?, sekolah = ?, kelamin = ?, alamat = ?, telepon = ?, jurusan = ?, hobi = ?, catatan = ? WHERE id = ? ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssisssssi", $password, $nama, $email, $sekolah, $kelamin, $alamat, $telepon, $jurusan, $hobi, $catatan, $id);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
          }
        $this->close();
        
    }

    function hapusData($id, $tabel){
        $this->open();

        $query = 'UPDATE '.$tabel.' SET is_active = 0 WHERE id = ? ';
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        if ( !mysqli_execute($stmt) ) {
            die( 'stmt error: '.mysqli_stmt_error($stmt) );
        }

        $this->close();
    }

    function clearArray() {
        if (is_array($this->data) || is_object($this->data)) {
            foreach ($this->data as $i => $value) {
                unset($this->data[$i]);
            }
        }
    }
}

?>