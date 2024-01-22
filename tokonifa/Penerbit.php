<!DOCTYPE html> 
<html> 
<head> 
    <title>Tampil Data</title>

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
            <a href="Index.php">Home</a>
            <a href="Penerbit.php">Pengadaan</a>
            <a href="Admin.php">Admin</a>
        </div>
    </nav>
    <fieldset> 
    <form method="GET" action="index.php" style="text-align: center;"> 
        <label>Cari Penerbit : </label> 
        <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo 
        $_GET['kata_cari']; } ?>" /> 
        <button type="submit">Cari</button> 
    </form>

        <br> 

        <table border="2"> 
            <thead> 
                <tr> 
                    <th>ID Penerbit</th> 
                    <th>Nama</th> 
                    <th>Alamat</th> 
                    <th>Kota</th> 
                    <th>Telepon</th> 
                    <th>OPSI</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php 
                // untuk me-include kan koneksi 
                include 'koneksi.php'; 

                if(isset($_GET['kata_cari'])) { 
                    $kata_cari = $_GET['kata_cari']; 

                    $query = "SELECT * FROM penerbit WHERE id_penerbit like '%".$kata_cari."%' OR 
                        nama like '%".$kata_cari."%' ORDER BY id_penerbit ASC"; 
                } else { 
                    // jika tidak ada pencarian, default yang dijalankan query ini
                    $query = "SELECT * FROM penerbit ORDER BY id_penerbit ASC";
                } 

                $result = mysqli_query($koneksi, $query); 
                if(!$result) { 
                    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi)); 
                } 

                // kalau ini melakukan foreach atau perulangan 
                while ($row = mysqli_fetch_assoc($result)) { 
                ?> 
                <tr> 
                    <td><?php echo $row['id_penerbit']; ?></td> 
                    <td><?php echo $row['nama']; ?></td> 
                    <td><?php echo $row['alamat']; ?></td> 
                    <td><?php echo $row['kota']; ?></td> 
                    <td><?php echo $row['telepon']; ?></td> 

                    <td> 
                        <a href="Edit_penerbit.php?id_penerbit=<?php echo $row['id_penerbit']; ?>">EDIT</a> 
                        <a href="Delete_penerbit.php?id_penerbit=<?php echo $row['id_penerbit']; ?>">HAPUS</a> 
                    </td> 
                </tr> 
                <?php 
                } 
                ?> 
            </tbody> 
        </table> 
    </fieldset> 
</body> 
</html>
