<!DOCTYPE html>
<html>

<head>
    <title>Laporan | Data Surat Pengantar KTP</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 10px;
        }

        th {
            text-align: center;
            background-color: #04AA6D;
            border: 1px solid #000000;
            padding: 8px;
        }

        td {
            text-align: left;
            border: 1px solid #000000;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Data Surat Pengantar KTP</h1>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Warga</th>
                    <th>Tanggal Permohonan</th>
                    <th>Status</th>
                    <th>Tanggal Surat Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $row)
                    <tr>
                        <td style="text-align: center;">{{ $index + 1 }}</td>
                        <td style="text-align: center;">{{ $row->user->name }}</td>
                        <td style="text-align: center;">
                            {{ \Carbon\Carbon::parse($row->tanggal_request)->format('d M Y H:i') }}</td>
                        <td style="text-align: center;">
                            @if ($row->status === 'selesai')
                                Surat Pengantar Telah Selesai Dibuat
                            @elseif ($row->status === 'tolak')
                                Permohonan Ditolak
                            @elseif ($row->status === 'proses')
                                Surat Pengantar Sedang Diproses
                            @else
                                Belum Ditentukan
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($row->tanggal_dibuat != null)
                                {{ \Carbon\Carbon::parse($row->tanggal_dibuat)->format('d M Y H:i') }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
