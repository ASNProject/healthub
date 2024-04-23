<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data Pasien</title>
    </head>
    <body>
        <h2>Tambah Data Pasien</h2>
        <br>
        <a href="index.php" class="button">Kembali</a>
        <br>
        <br>
        <form action="add_action.php" method="POST">
            <table>
                <tr>
                    <td>Nama Pasien</td>
                    <td><input type="text" name="nama_pasien"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin (L/P)</td>
                    <td><input type="text" name="jenis_kelamin"></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir (1 Januari 2000)</td>
                    <td><input type="text" name="tanggal_lahir"></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td><input type="text" name="nik"></td>
                </tr>
                <tr>
                    <td>Berat Badan (kg)</td>
                    <td><input type="number" name="berat_badan"></td>
                </tr>
                <tr>
                    <td>Tinggi Badan</td>
                    <td><input type="number" name="tinggi_badan"></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td><input type="text" name="pekerjaan"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN" name="simpan"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
