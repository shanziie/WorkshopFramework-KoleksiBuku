<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <style>
        @page {
            size: A4 portrait;
            margin: 3mm; 
        }

        body {
        margin: 0;
        font-family: "Segoe UI", "Inter", Arial, sans-serif;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
        }

        .sheet {
            width: 100%;
        }

        table {
            border-collapse: separate;
            border-spacing: 2mm; /* jarak antar label */
        }

        td {
            width: 38mm;
            height: 18mm;
            text-align: center;
            vertical-align: middle;
            border: 0.05mm solid rgba(0,0,0,0.15); /* tipis banget */
            padding: 0;
        }

        .nama-barang {
            font-size: 7px;
            font-weight: 400;   /* normal */
            letter-spacing: 0.3px;
            color: #222;
            line-height: 1.1;
            margin-bottom: 0.8mm;
        }

        .harga {
            font-size: 8px;
            font-weight: 400;   /* normal */
            color: #0d47a1;
            letter-spacing: 0.5px;
            line-height: 1.1;
            margin-bottom: 0.5mm;
        }

        small {
            font-size: 8px;
        }
    </style>
</head>

<body>

<div class="sheet">

    <table>

        @php $itemIndex = 0; @endphp

        @for($row = 1; $row <= 8; $row++)
            <tr>

                @for($col = 1; $col <= 5; $col++)
                    <td>

                        @if($itemIndex >= $skipCount && isset($items[$itemIndex - $skipCount]))

                            <div class="nama-barang">
                                {{ $items[$itemIndex - $skipCount]->nama }}
                            </div>

                            <div class="harga">
                                Rp {{ number_format($items[$itemIndex - $skipCount]->harga,0,',','.') }}
                            </div>

                        @endif

                        @php $itemIndex++; @endphp

                    </td>
                @endfor

            </tr>
        @endfor

    </table>

</div>

</body>
</html>