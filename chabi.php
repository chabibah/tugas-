<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'id8143172_admin'; // User Server
$db_pass = '12345c'; // Password Server
$db_name = 'id8143172_akademik'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * FROM mahasiswa';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table>
		<thead>
			<tr>
				<th>NIM</th>
				<th>NAMA</th>
				<th>PRODI</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_assoc($query))
{
	echo '<tr>
			<td>'.$row['nim'].'</td>
			<td>'.$row['nama'].'</td>
			<td>'.$row['prodi'].'</td>
			
		</tr>';
}
echo '
	</tbody>
</table>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
mysqli_close($conn);