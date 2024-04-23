<!DOCTYPE html>
<html>
    <head>
        <title>Edit Pasien</title>
    </head>
    <body>
        <h2>Edit Data Pasien</h2>
        <br>
        <a href="index.php" class="button">Kembali</a>
        <br>
        <br>
        <?php
        include 'connection.php';
        $id = $_GET['id'];
        $data = mysqli_query($connection, "select * from pasien_data where id='$id'");
        while($d = mysqli_fetch_array($data)){
            ?>
            <form action="edit_action.php" method="POST">
            <table>
                <tr>
                    <td>Nama Pasien</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text" name="nama_pasien" value="<?php echo $d['nama_pasien']?>">
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin (L/P)</td>
                    <td><input type="text" name="jenis_kelamin" value="<?php echo $d['jenis_kelamin']?>"></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir (1 Januari 2000)</td>
                    <td><input type="text" name="tanggal_lahir" value="<?php echo $d['tanggal_lahir']?>"></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td><input type="text" name="nik" value="<?php echo $d['nik']?>"></td>
                </tr>
                <tr>
                    <td>Berat Badan (kg)</td>
                    <td><input type="number" name="berat_badan" value="<?php echo $d['berat_badan']?>"></td>
                </tr>
                <tr>
                    <td>Tinggi Badan</td>
                    <td><input type="number" name="tinggi_badan" value="<?php echo $d['tinggi_badan']?>"></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td><input type="text" name="pekerjaan" value="<?php echo $d['pekerjaan']?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $d['alamat']?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN" name="simpan"></td>
                </tr>
            </table>
        </form>
        <?php
        }
        ?>
    </body>
</html>