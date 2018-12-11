<?php
// membuat koneksi
$conn = mysqli_connect("localhost","root","","project_database");
// cek koneksi jika error
if (!$conn) {
    die('Koneksi Error : '.mysql_connect_errno()
    .' - '.mysqli_connect_error());
}
// ambil data dari tabel community/query data community
$result = mysqli_query($conn,"SELECT * FROM community");

// function query akan menerima isi parameter dari string query yang ada pada index2.php
function query($query_kedua)
{
    // dikarenakan $conn diluar function query maka dibutuhkan scope global $conn
    global $conn;
    $result = mysqli_query($conn,$query_kedua);
    // wadah kosong untuk menampung isi array pada saat looping
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah ($data)
{
    global $conn;

    $nama = $data["Nama"];
    $nohp = $data["No. Hp"];
    $alamat = $data["Alamat"];
    $email = $data["Email"];
    $foto = $data["Foto"];
    $proses = $data["Proses"];

    $query = " INSERT INTO community
                VALUES
                ('','$nama','$nohp','$alamat','$email','$foto','proses')";
                mysqli_query($conn,$query);

                return mysqli_affected_rows($conn);
}

function hapus ($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM community WHERE id = $id ");
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["Nama"]);
    $nohp = htmlspecialchars($data["No. Hp"]);
    $alamat = htmlspecialchars($data["Alamat"]);
    $email = htmlspecialchars($data["Email"]);
    $foto = htmlspecialchars($data["Foto"]);
    $proses = htmlspecialchars($data["Proses"]);

    $query= " UPDATE community SET
                Nama = '$nama',
                No. Hp = '$nohp',
                Alamat = '$alamat'
                Email = '$email',
                Foto = '$foto',
                Proses = '$proses'
                WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $sql="SELECT * FROM community
            WHERE
            Nama LIKE '%$keyword%' OR
            No. Hp LIKE '%$keyword%' OR
            Alamat LIKE '%$keyword%' OR
            Email LIKE '%$keyword%' 
            ";

        //kembalikan ke function query dengan parameter $sql
        return query($sql);

        // cat: pastikan $keyword pada line 82 terdapat petik satu karena nilainya berupa string
        
}

?>