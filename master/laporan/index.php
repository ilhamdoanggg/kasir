<html>
<body>
<form name='nota' action='' method='post'>
<table border='1? align='center' bgcolor='lightgreen'>
<tr>
<td colspan='3? align='center'><h2 align='center'>Toko Peracangan Sukses Dunia dan Akhirat</h2></td>
</tr>
<tr>
<td>id nota <input name='id_nota' type='hidden'></td>
<td>nama <input name='textnama' type='text' size='32? maxlength='32? value='tuan/toko'></td>
</tr>
<tr>
<td>tanggal <input name='texttanggal' type='text' size='24? maxlength='24? value='YYYY-MM-DD'></td>
<td>nama barang <input name='textnama_barang' type='text' size='32? maxlength='32?></td>
</tr>
<tr>
<td>jumlah barang <input name='textjumlah_barang' type='text' size='32? maxlength='32?></td>
<td>harga satuan <input name='textharga_satuan' type='text' size='32? maxlength='32?></td>
</tr>
<tr>
<td colspan='3? align='center'>jumlah harga <input name='textjumlah_harga' type='text' size='32? maxlength='32?></td>
</tr>
<tr>
<td><p>barang yang sudah dibeli tidak dapat ditukar atau dikembalikan <br> kecuali bila ada perjanjian sebelumnya</p>
</td>
<td>
<p>mohon untuk tidak meminta nota kosong saat melakukan<br> transaksi belanja atau pembelian barang</p>
</td>
</tr>
<tr>
<td colspan='3? align='center'>
<input name='buttonsave' type='submit' value='save'>
<input name='buttoncancel' type='reset' value='cancel'>
</td>
</tr>
</table>
</form>
<?php
if($_POST['buttonsave']=='save')
{
$textnama = $_POST[‘textnama’];
$texttanggal = $_POST[‘texttanggal’];
$textnama_barang = $_POST[‘textnama_barang’];
$textjumlah_barang = $_POST[‘textjumlah_barang’];
$textharga_satuan = $_POST[‘textharga_satuan’];
$textjumlah_harga = $_POST[‘textjumlah_harga’];
$host='localhost';
$user='root';
$password='';
$id_mysql=mysql_connect($host,$user,$password);
$db_notaphoto=mysql_select_db('cendikia', $id_mysql);
$sql = 'INSERT INTO `notaphoto`.`nota` (`nama`, `tanggal`, `nama_barang`, `jumlah_barang`, `harga_satuan`, `jumlah_harga`) VALUES (‘$textnama’, ‘$texttanggal’, ‘$textnama_barang’, ‘$textjumlah_barang’, ‘$textharga_satuan’, ‘$textjumlah_harga’)';
$hasil = mysql_query($sql, $id_mysql);
if(empty($hasil))
print('nota pembelian pada tanggal = ‘$texttanggal’ belum terinput di database');
else
print('nota pembelian pada tanggal = ‘$texttanggal’ sukses terinput di database');
mysql_close($id_mysql);
}
?>
</body>
</html>