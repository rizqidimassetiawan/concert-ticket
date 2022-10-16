<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Registrasi</title>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
        }
        .cop{
            display: flex;
            justify-content: center
        }
        .rata-tengah{
            text-align: center !important;
        }
        td div{
            font-size: 15px;
            margin-bottom: -20px;
        }

        .informasi{
            margin-top:0px;
        }
        .identitas div{
            margin-top:10px;
            margin-bottom: -5px
        }
        .qr-code{
            display: inline;
            position: relative;
            top: -22rem;
            left: 35rem;
        }
        .footer{
            margin-top:5rem;
        }
        table{
            border-collapse: collapse;
        }
        .footer,.table,.tr,.td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="cop">
        <table width="100%">
            <tr>
                <td><img src="{{ asset('assets/img/cropped.png') }}" width="95" height="95"></td>
                <td>
                    <div class="rata-tengah">
                        <div>Konser Menggapai Semesta</div><br>
                        <div>Nikmati Bersama Rasakan Musiknya</div><br>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="2"><hr style="margin-top:-4px"></td>
            </tr>
        </table>
    </div>    
    <table width="100%">
        <tr>
            <td style="text-align: center"><h3>Kartu Peserta Penonton Konser</h3></td>
        </tr>
    </table>
    <div class="conten">
        <table width="80%" style="margin-left: 10px">
            <tr>
                <td class="identitas">
                    <div>Nama Pengunjung</div><br>
                    <div>No Tiket</div><br>
                    <div>Alamat</div><br>
                    <div>Tanggal Registrasi</div><br>
                    <div>Band Favorit</div><br>
                    <div>Tanggal Konser</div><br>
                </td>  
                <td class="identitas">
                    <div>: {{ $data->name }}</div><br>
                    <div>: {{ $data->no_ticket }}</div><br>
                    <div>: {{ $data->village->name }}</div><br>
                    <div>: {{ $data->created_at }}</div><br>
                    <div>: {{ $data->band->name }}</div><br>
                    <div>: {{ $data->event_time }}</div><br>
                </td>  
            </tr>
        </table>
    </div>
    
    <div class="footer">
        <table class="table" width="100%">
            <tr class="tr">
                <td class="td">
                    <p style="margin:0 5px">PERHATIAN</p>
                </td>
            </tr>
            <tr class="tr">
                <div>
                    <p style="margin-top:1px; margin-bottom: -8px; margin-left:5px">1. Kartu Pemesanan Tiket Konser Wajib dibawa/p>
                    <p style="margin-bottom: -8px;margin-left:5px">2. Nomer Registrasi Tiket digunakan untuk konfirmasi</p>
                </div>
            </tr>
        </table>
    </div>
</body>
</html>
