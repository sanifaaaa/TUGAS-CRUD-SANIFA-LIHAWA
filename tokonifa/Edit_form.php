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
            width: 80%;
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
        <!-- Judul pada fieldset--> 
        <legend align="center">Edit Data Buku</legend> 
        <h3>Edit Data</h3> 
        <?php 
        include "koneksi.php"; 
        $id = $_GET['id_buku']; 
        $edit = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id'");
        while ($row = mysqli_fetch_array($edit)) { 
        ?>
        <form method="post" action="Edit_proses.php"> 
            <table>
                <tr> 
                    <td>ID Buku</td> 
                    <td>
                        <input type="text" name="id_buku" value="<?php echo $row['id_buku']; ?>"> 
                    </td> 
                </tr>

                <tr> 
                    <td>Kategori</td> 
                    <td> 
                        <input type="text" name="kategori" value="<?php echo $row['kategori']; ?>"> 
                    </td> 
                </tr>

                <tr> 
                    <td>Nama Buku</td> 
                    <td> 
                        <input type="text" name="nama_buku" value="<?php echo $row['nama_buku']; ?>"> 
                    </td> 
                </tr>

                <tr>
                    <td>Harga</td> 
                    <td> 
                        <input type="text" name="harga" value="<?php echo $row['harga']; ?>"> 
                    </td> 
                </tr>

                <tr>
                    <td>Stok</td> 
                    <td> 
                        <input type="text" name="stok" value="<?php echo $row['stok']; ?>"> 
                    </td> 
                </tr>

                <tr>
                    <td>Penerbit</td> 
                    <td> 
                        <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>"> 
                    </td> 
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="SIMPAN">
                    </td> 
                </tr> 
            </table> 
        </form> 
        <?php 
        } 
        ?> 
    </fieldset> 
</body> 
</html>
