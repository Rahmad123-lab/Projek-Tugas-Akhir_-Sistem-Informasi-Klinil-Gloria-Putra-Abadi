<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Data Pasien</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <header class="clearfix">
    <h1 class="text-center">Klinik Gloria Putra Abadi</h1>
    <div id="company" class="text-right">
      <div>Rekam Medis</div>
      <div>Tarutung</div>
      <div>(602) 519-0450</div>
      <div><a href="mailto:klinikgloriaputraabadi@email.com">klinikgloriaputraabadi@email.com</a></div>
    </div>
    <br>
  </header>
  <main>
    <table class="table table-bordered">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nama Pasien</th>
          <th scope="col">Alamat Pasien</th>
          <th scope="col">Tanggal Berobat</th>
          <th scope="col">Keluhan</th>
          <th scope="col">Diagnosa</th>
          <th scope="col">Nama Dokter</th>
          <th scope="col">Obat</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pasiens as $pasien)
        <tr>
          <td>{{ $pasien->nama_pasien }}</td>
          <td>{{ $pasien->alamat_pasien }}</td>
          <td>{{ $pasien->created_at->format('d/m/Y') }}</td>
          <td>{{ $pasien->keluhan_pasien }}</td>
          <td>{{ $pasien->diagnosis }}</td>
          <td>{{ $pasien->nama_dokter }}</td>
          <td>{{ $pasien->obat ? $pasien->obat->nama_obat : 'Tidak ada obat' }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div id="notices">
      <div>PERHATIAN:</div>
      <div class="notice">
        <strong>Segera menebus obat ke apoteker sesuai resep dokter</strong>
      </div>
    </div>
  </main>
  <footer class="text-center">
    <h2>Semoga Lekas Sembuh</h2>
  </footer>
</body>
</html>
