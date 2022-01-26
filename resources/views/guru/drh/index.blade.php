<html>
  <head>
    <title>Cetak CV - Simpeg</title>
    <style type="text/css">
      td{
        padding:5px;
      }
    </style>
  </head>
  <body onload="window.print()">
    <div style="width: 100%">
      <table width="100%">
        <tr>
          <td valign="top" align="right">
            KEPUTUSAN KEPALA BADAN<br>KEPEGAWAIAN NEGARA <br>NOMOR : 11 TAHUN <br>TANGGAL : 17 JUNI 2001  
          </td>
          <td valign="top" align="right" width="120">
            <img src="{{ asset('upload/pas_foto/'.$foto->pegPoto) }}" width="100">  
          </td>
        </tr>
      </table>
    </div>
    <div style="text-align:center;">
        <b><u>DAFTAR RIWAYAT HIDUP</u></b>
    </div>
    <br>
    <div style="text-align:left;">
        <b>I. KETERANGAN PERSEORANGAN</b>
    </div>
    <div>
      <table align="center" border="1" style="border-collapse:collapse;font-size:12px" width="100%">
        <thead>
        </thead>
        <tbody>
          <tr><td style="text-align: center">1</td><td colspan="2">Nama lengkap</td><td><?=$personal->pegGlrDpn.' '.$personal->pegNama.'., '.$personal->pegGlrBlg?></td></tr>
            <tr><td style="text-align: center">2</td><td colspan="2">NIP</td><td><?=$personal->pegNip?></td></tr>
            <tr><td style="text-align: center">3</td><td colspan="2">Pangkat dan golongan ruang</td><td><?=$personal->PANGKAT.', '.$personal->GOL?></td></tr>
            <tr><td style="text-align: center">4</td><td colspan="2">Tempat Lahir / Tanggal Lahir</td><td><?=$personal->pegTpLhr.' / '.date("d-m-Y",strtotime($personal->pegTglLhr))?></td></tr>
            <tr><td style="text-align: center">5</td><td colspan="2">Jenis Kelamin</td><td><?php if($personal->pegJenkel=='L') {echo 'Pria'; } else {echo 'Wanita';} ?></td></tr>
            <tr><td style="text-align: center">6</td><td colspan="2">Agama</td><td><?=$personal->NAMA?></td></tr>
            <tr><td style="text-align: center">7</td><td colspan="2">Status Perkawinan</td><td><?=$personal->pegKetkawin?></td></tr>
            <tr><td style="text-align: center">8</td><td rowspan="5" style="vertical-align: top">Alamat Rumah</td><td>a. Jalan</td><td><?=$personal->pegAlamat?></td></tr>
            <tr><td style="text-align: center">9</td><td>b. Kelurahan / Desa</td><td><?=$personal->pegDesa?></td></tr>
            <tr><td style="text-align: center">10</td><td>c. Kecamatan</td><td><?=$personal->pegKecamatan?></td></tr>
            <tr><td style="text-align: center">11</td><td>d. Kabupaten / Kota</td><td><?=$personal->pegKabupaten?></td></tr>
            <tr><td style="text-align: center">12</td><td>e. Provinsi</td><td><?=$personal->pegProvinsi?></td></tr>
            <tr><td style="text-align: center">13</td><td rowspan="7" style="vertical-align: top">Keterangan badan</td><td>a. Tinggi (cm)</td><td><?=$personal->pegTinggi?></td></tr>
            <tr><td style="text-align: center">14</td><td>b. Berat badan (kg)</td><td><?=$personal->pegBerat?></td></tr>
            <tr><td style="text-align: center">15</td><td>c. Rambut</td><td><?=$personal->pegRambut?></td></tr>
            <tr><td style="text-align: center">16</td><td>d. Bentuk muka</td><td><?=$personal->pegmuka?></td></tr>
            <tr><td style="text-align: center">17</td><td>e. Warna kulit</td><td><?=$personal->pegWarna?></td></tr>
            <tr><td style="text-align: center">18</td><td>f. Ciri-ciri khas</td><td><?=$personal->pegCirikhas?></td></tr>
            <tr><td style="text-align: center">19</td><td>g. Cacat tubuh</td><td><?=$personal->pegCacat?></td></tr>
            <tr><td style="text-align: center">20</td><td colspan="2">kegemaran (Hobby)</td><td><?=$personal->pegHobi?></td></tr>
        </tbody>
      </table>
    </div>
    <br>
    <div style="text-align:left;">
      <b>II. PENDIDIKAN</b>
    </div>
    <div>
      &nbsp1. Penddikan di Dalam dan di Luar Negeri
    </div>
    <div>
      <table align="center" border="1" style="border-collapse:collapse;font-size:12px" width="100%">
        <thead>
        <tr style="text-align: center">
          <td>No</td>
          <td>Tingkat</td>
          <td>Nama Pendidikan</td>
          <td>Jurusan</td>
          <td>STTB/Tanda Lulus/Ijazah Tahun</td>
          <td>Tempat</td>
          <td>Dokumen</td>
        </tr>
        </thead>
        <tbody>
          <?php $no=1;
            foreach ($pendidikan as $data) {?>
            <tr>
                <td align="center"><?=$no++ ?></td>
                <td><?=$data['pendNmSekol'] ?></td>
                <td><?=$data['pendNmSekol'] ?></td>
                <td><?=$data['pendJurusan'] ?></td>
                <td align="center"><?=$data['pendThnLls'] ?></td>
                <td><?=$data['pendTempat'] ?></td>
                <td align="center"><a target="_blank" href="{{ asset('upload/dokumen_pendidikan/'.\Illuminate\Support\Str::slug(Auth::user()->pegNama).'/'.$data->pltDokumen) }}">...</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <br>
    <div>
      &nbsp2. Kursus/Latihan di Dalam dan di Luar Negeri
    </div>
    <div>
      <table align="center" border="1" style="border-collapse:collapse;font-size:12px" width="100%">
        <thead>
        <tr style="text-align: center">
          <td>No</td>
          <td>Nama/Kursur/Latihan</td>
          <td>Lamanya Tgl/Bln/Thn/ s/d Tgl/Bln/Thn</td>
          <td>Ijazah/Tanda Lulus/Surat Keterangan Tahun</td>
          <td>Tempat</td>
          <td>Dokumen</td>
        </tr>
        </thead>
        <tbody>
          @php
              $no=1;
          @endphp
         @if (!empty($pelatihan))
          @foreach ($pelatihan as $item)
            <tr>
                <td align="center"><?=$no++ ?></td>
                <td><?=$item->pltNmdiklat ?></td>
                <td align="center"><?=date('d-m-Y',strtotime($item['pltTglmulai'])).' s.d '.date('d-m-Y',strtotime($item['pltTglakhir']))?></td>
                <td align="center"><?=$item['pltThnsertifikat'] ?></td>
                <td align="center"><?=$item['pltTempat'] ?></td>
                <td align="center"><a target="_blank" href="{{ asset('upload/dokumen_pelatihan/'.\Illuminate\Support\Str::slug(Auth::user()->pegNama).'/'.$item->pltDokumen) }}">...</a></td>
            </tr>
          @endforeach
         @endif
        </tbody>
      </table>
    </div>
    <br>
    <div style="text-align:left;">
      <b>III. RIWAYAT PEKERJAAN</b>
    </div>
    <div>
      &nbsp1. Riwayat kepangkatan golongan ruang
    </div>
    <div>
      <table align="center" border="1" style="border-collapse:collapse;font-size:12px" width="100%">
        <thead>
        <tr style="text-align: center">
          <td rowspan="2">NO</td>
          <td rowspan="2">Gol</td>
          <td rowspan="2">Berlaku terhitung mulai tgl</td>
          <td rowspan="2">Gaji pokok (Rp)</td>
          <td colspan="3">Surat Keputusan</td>
          <td rowspan="2">Dokumen</td>
        </tr>
        <tr style="text-align: center">
          <td>Pejabat</td>
          <td>Nomor</td>
          <td>Tanggal</td>
        </tr>
        </thead>
        <tbody>
          <?php $no=1;
            foreach ($kepangkatan as $data) {?>
            <tr>
                <td align="center"><?=$no++ ?></td>
                <td><?=$data['goGol'] ?></td>
                <td align="center"><?=date('d-m-Y',strtotime($data['goTmtGol']))?></td>
                <td align="right"><?=number_format($data['goGapok']) ?></td>
                <td><?=$data['goPejabat'] ?></td>
                <td><?=$data['goNoSk'] ?></td>
                <td align="center"><?=date("d-m-Y",strtotime($data['goTglSk'])) ?></td>
                <td align="center"><a target="_blank" href="{{ asset('upload/dokumen_kepangkatan/'.\Illuminate\Support\Str::slug(Auth::user()->pegNama).'/'.$data->pltDokumen) }}">...</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <br>
    <div>
      &nbsp2. Pengalaman Jabatan / Pekerjaan
    </div>
    <div>
      <table align="center" border="1" style="border-collapse:collapse;font-size:12px" width="100%">
        <thead>
        <tr style="text-align: center">
          <td rowspan="2">NO</td>
          <td rowspan="2">Jabatan/Pekerjaan</td>
          <td rowspan="2">TMT</td>
          <td colspan="3">Surat Keputusan</td>
          <td rowspan="2">Dokumen</td>
        </tr>
        <tr style="text-align: center">
          <td>Pejabat</td>
          <td>Nomor</td>
          <td>Tanggal</td>
        </tr>
        </thead>
        <tbody>
          <?php $no=1;
            foreach ($jabatan as $data) {?>
            <tr>
                <td align="center"><?=$no++ ?></td>
                <td><?=$data['jfNamajab'] ?></td>
                <td align="center"><?=date('d-m-Y',strtotime($data['jfTmtJab']))?></td>
                <td><?=$data['jfPejabat'] ?></td>
                <td><?=$data['jfNoSk'] ?></td>
                <td align="center"><?=date("d-m-Y",strtotime($data['jfTglSk'])) ?></td>
                <td align="center"><a target="_blank" href="{{ asset('upload/dokumen_pelatihan/'.\Illuminate\Support\Str::slug(Auth::user()->pegNama).'/'.$data->pltDokumen) }}">...</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <br>
    <div style="text-align:left;">
      <b>IV. KETERANGAN KELUARGA</b>
    </div>
    <div>
      &nbsp1. Istri / Suami
    </div>
    <div>
      <table align="center" border="1" style="border-collapse:collapse;font-size:12px" width="100%">
        <thead>
        <tr style="text-align: center">
          <td>No</td>
          <td>Nama</td>
          <td>Tempat Lahir</td>
          <td>Tgl. Lahir</td>
          <td>Tgl. Nikah</td>
          <td>Pekerjaan</td>
          <td>Dokumen</td>
        </tr>
        </thead>
        <tbody>
          <?php $no=1;
            foreach ($suami_istri as $data) {?>
            <tr>
                <td align="center"><?=$no++ ?></td>
                <td><?=$data['kelNama'] ?></td>
                <td align="center"><?=$data['kelTpLhr'] ?></td>
                <td align="center"><?=date('d-m-Y',strtotime($data['kelTglLhr']))?></td>
                <td align="center"><?=date('d-m-Y',strtotime($data['kelTglNikah']))?></td>
                <td align="center"><?=$data['kelKerjaan'] ?></td>
                <td align="center"><a href=""></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div>
      &nbsp2. Anak
    </div>
    <div>
      <table align="center" border="1" style="border-collapse:collapse;font-size:12px" width="100%">
        <thead>
        <tr style="text-align: center">
          <td>No</td>
          <td>Nama</td>
          <td>Jenis Kelamin</td>
          <td>Tempat Lahir</td>
          <td>Tgl. Lahir</td>
          <td>Pekerjaan</td>
          <td>Dokumen</td>
        </tr>
        </thead>
        <tbody>
          <?php $no=1;
            foreach ($anak as $data) {?>
            <tr>
                <td align="center"><?=$no++ ?></td>
                <td><?=$data['akNama'] ?></td>
                <td align="center"><?=$data['akJenkel'] ?></td>
                <td align="center"><?=$data['akTpLhr'] ?></td>
                <td align="center"><?=date('d-m-Y',strtotime($data['akTglLhr']))?></td>
                <td align="center"><?=$data['akKerjaan'] ?></td>
                <td align="center"><a href=""></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <br><br><br>
    <table align="right" border="0" cellpadding="3px" width="30%" style="border-collapse:collapse;font-size:12px">
      <tr><td valign="top">
        Bengkulu, <?=date('d-m-Y')?>
        <br><br><br><br><br>
        <?=$personal->pegGlrDpn.' '.$personal->pegNama.'., '.$personal->pegGlrBlg?>
        <br>NIP. <?=$personal->pegNip?>
      </td></tr>
    </table>
  </body>
</html>
