<?php
		$getidTanya = $_GET["kodepertanyaan"];
		$getStatus = $_GET["status"];
	   	$tampildetail = mysql_query("SELECT * FROM tbl_kriteria WHERE id_kriteria='$getidTanya'");
  		$d=mysql_fetch_array($tampildetail);
		$idkrit = $d['id_kriteria'];
		$namakrit = $d['nama_kriteria'];
		
		$sql="select * from tbl_detailpenilaian order by id_jawaban desc ";
  $q=mysql_query($sql);
  $jum=mysql_num_rows($q);
  $d=mysql_fetch_array($q);
  $kode=$d["id_jawaban"];
  $urut=substr($kode,-3)+1;
  	if($urut>9){$kodeauto="$kd"."j0".$urut;}
	else if($urut>99){$kodeauto="$kd"."j".$urut;}
	else{$kodeauto="$kd"."j00".$urut;}
	
	$tampilwisata = mysql_query("SELECT * FROM tbl_objek WHERE id='".$_SESSION["s_idwisata"]."'");
  	$dw=mysql_fetch_array($tampilwisata);
	$namawis = $dw['nama'];

		?>
                <h3 class="content-header-title">Skor Penilaian Kelayakan</h3></br>
           <!-- /.content-header -->
            <h4>Tabel Skor Kriteria</h4>
            </p>
            Nama Wisata : <?php echo $namawis ?></br>
            <form action="" method="post"> 
            <table  class="table table-striped table-bordered table-highlight">
                 <thead>
                  <tr>
                    <th> No.</th>
                    <th width ="20%">Jenis Kriteria</th>
                    <th width = "75%">skor</th>
                    </tr>
                  </thead>
                <tbody>
				<?php
				$no = 1;
                $s="select * from `tbl_kriteria`";
                $q=mysql_query($s);
				$jum=mysql_num_rows($q);
                while($d=mysql_fetch_array($q)){
					$idk = $d["id_kriteria"];
                    $namak = $d["nama_kriteria"];
					$bobot = $d['bobot'];
					//$sessionkodetanya = ($_SESSION["kodetanya"] = $idk);
					$skorsession = $_SESSION["total".$idk.""] ;
                    echo"
					<tr>
					<td>$no</td>
					<td>$namak</td>
					<td>$skorsession</td>
					</tr>";
					$no++;
                }
				
				$totalawal = 0;
				for($a=1; $a<=$jum; $a++){
			
				$nilaiperkriteria =  $_SESSION["totalK00".$a.""] ;
				 $totalskor += $nilaiperkriteria;
				}
				echo "<tr class='warning'><td colspan='2' align='right'><b>Total skor dari semua kriteria</b></td>
				<td>$totalskor</td></tr>";
                 ?>
                 </tbody>
            </table>
            <button class="btn btn-sm btn-success" type="submit">Simpan Skor</button>
            </form>
 <?php
			
			 if($_SERVER['REQUEST_METHOD'] == "POST"){
					$sidjawaban = $_SESSION["s_idjawaban"];
				
					  $sqlsimpan = "INSERT INTO tbl_detailpenilaian SET
									id_jawaban = '$kodeauto',
									id_objek = '".$_SESSION["s_idwisata"]."',
									skor_kriteria1 ='".$_SESSION["totalK001"]."',
									skor_kriteria2 ='".$_SESSION["totalK002"]."',
									skor_kriteria3 ='".$_SESSION["totalK003"]."',
									skor_kriteria4 ='".$_SESSION["totalK004"]."',
									skor_kriteria5 ='".$_SESSION["totalK005"]."', 
									skor = '$totalskor'";
					  mysql_query($sqlsimpan)
					  or die ("Terjadi Kesalahan ! Jenis Error = ". mysql_error());
					  echo "<script>alert('Skor Berhasil Disimpan');document.location.href='?menu=dashboard';</script>";
					  session_destroy();
			}
			 ?>
             </p>
