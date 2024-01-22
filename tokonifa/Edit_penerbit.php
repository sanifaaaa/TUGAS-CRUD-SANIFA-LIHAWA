<!DOCTYPE html>
<html>

<head>
    <title>Edit Data</title>
    <style>        
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            margin-bottom: 50px;
        }
        nav {
            background-color: #b3a492;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }
        nav a {
            color: white;
            text-align: center;
            text-decoration: none;
            padding: 10px;
            margin: 0 5px;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        fieldset {
            width: 300px;
            margin: auto;
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        #JendelaBaca {
            font-size: 40px; 
            font-family: 'Arial', sans-serif; 
            color: #f2f2f2;
        }
    </style>
</head>

<body>
    <nav>
            <div id="JendelaBaca">Jendela Baca</div>
            <div>
                <a href="Admin.php">Kembali</a>
            </div>
        </nav>


    <fieldset>
        <!-- Judul pada fieldset -->
        <legend align="center">Edit Data Penerbit</legend>
        <h3>Edit Data</h3>

        <?php
        include "koneksi.php";
        $id = $_GET['id_penerbit'];
        $edit = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id_penerbit='$id'");
        while ($row = mysqli_fetch_array($edit)) {
        ?>
            <form method="post" action="Edit_penerbit_form.php">
                <table>
                    <tr>
                        <td>ID Penerbit</td>
                        <td>
                            <input type="hidden" name="id_penerbit" value="<?php echo $row['id_penerbit']; ?>">
                            <input type="text" name="id_penerbit" value="<?php echo $row['id_penerbit']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Nama</td>
                        <td>
                            <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Alamat</td>
                        <td>
                            <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Kota</td>
                        <td>
                            <input type="text" name="kota" value="<?php echo $row['kota']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Telepon</td>
                        <td>
                            <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td><input type="submit" value="SIMPAN"></td>
                    </tr>
                </table>
            </form>
        <?php
        }
        ?>
    </fieldset>
</body>

</html>
