<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPL - Perhitungan Akar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin: 50px auto;
            max-width: 600px;
            display: flex; /* Menggunakan flexbox */
            align-items: center; /* Pusatkan vertikal */
        }

        .container-log {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin: 50px auto;
            max-width: 800px;
            display: flex; /* Menggunakan flexbox */
            align-items: center; /* Pusatkan vertikal */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Perhitungan Akar Kuadrat 🧮</h1>
        <form action="{{ route('calculate') }}" method="post" id="calculateForm">
            @csrf
            <label for="inputAngka">Masukkan Angka:</label>
            <input type="number" id="inputAngka" name="angka" required>
            <input style="display: none;" type="text" id="tipe" name="tipe">
            <button type="button" onclick="submitAkarKuadrat('SP')">DB</button>
            <button type="button" onclick="submitAkarKuadrat('API')">API</button>
        </form>
    </div>

    <h3 style="text-align:center">Riwayat Perhitungan</h3>
    <div class="container-log">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th><button id="sortNIM">NIM</button></th>
            <th>Tipe</th>
            <th>Angka Input</th>
            <th>Angka Output</th>
            <th>Lama (microsecond)</th>
            <th>Waktu</th>
        </tr>

        @forelse ($logs as $log)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <th>{{ $log->user->name }}</th>
                <th>{{ $log->tipe }}</th>
                <th>{{ $log->angka_input }}</th>
                <th>{{ $log->angka_output }}</th>
                <th>{{ $log->lama }}</th>
                <th>{{ $log->created_at }}</th>
            </tr>
        @empty
            <tr>
                <th>-</th>
                <th>-</th>
                <th>-</th>
                <th>-</th>
                <th>-</th>
                <th>-</th>
                <th>-</th>
            </tr>
        @endforelse
    </table>
    </div>


    <form action="" method="post">
        @csrf
        <center><button type="submit" name="delete">DELETE RIWAYAT</button></center>
    </form>

    <script>
        function submitAkarKuadrat(tipe) {
            console.log(tipe);
            document.getElementById('tipe').value = tipe; // Mengubah nilai input dengan ID 'tipe'
            document.getElementById('calculateForm').submit(); // Melakukan submit form
        }
    </script>

</body>
</html>
