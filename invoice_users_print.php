<?php require_once "users_block.php"; ?>
<?php 
$ids = intval($_GET['cetak']);
require_once "admin_connect.php";


$sql = "SELECT s.* , u.* , h.* from sewa s JOIN users u ON (s.id_member = u.id) JOIN hunian h ON (s.id_hunian = h.id_hunian) WHERE id_sewa = $ids ";

$result = $link -> query($sql);

if ($result -> num_rows > 0 )
{
    while ($row = $result -> fetch_assoc())
    {
    $idpesan = $row["id_sewa"];
    $nominal = $row["nominal"];
    $harga = $row["harga_hunian"];
    $user= $row["fullname"];
    $email= $row["email"];
    $nama_hunian=$row["nama_hunian"];
    $gambar = $row["gambar"];
    $date = $row["tanggal"];
    $month = date("F",strtotime($date));
       $txt1 = '"uploads/asset/img/room/';
    }
}


?>
<!doctype html>
<html>
    <meta charset="utf-8">
<head>
<script>
window.print();
</script>
    <title> SODA2A INVOICE </title>
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }

    </style>
</head>

<body>
    <div id="content2" class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="uploads/sodalogo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: <?= $idpesan; ?><br>
                                Created: <?= $date ?> <br>
                                Bulan: <?= $month; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                KOST SODA2A,<br>
                                081-2222-99-105 Sukodami III 2A<br>
                                Surabaya , Kode Pos 60116.
                            </td>
                            
                            <td>
                                Saudara,<br>
                                <?= $user; ?><br>
                                <?= $email; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    PEMBAYARAN KOST
                </td>
                
                <td>
                    Tunai #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    JUMLAH
                </td>
                
                <td>
                <?= "Rp.",number_format($nominal,0,".",".");  ?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Kamar
                </td>
                
                <td>
                    Harga
                </td>
            </tr>
            
            <tr class="item">
                <td>
                <?= $nama_hunian;?>
                
                
                <td>
                <?= "Rp.",number_format($harga,0,".","."); echo "</td><tr><td><img src=" .$txt1.$gambar.'"style="width:100px;height:90px;"'."</td>";  ?>
                
                </td>
                <td><img src="uploads/asset/img/complement/lunas.png"style="width:200px;height:60px;"></td>
            </tr>
            
            
            <tr class="total">
                <td></td>
                <td>
                Total Bayar 
                <?= "Rp.",number_format($harga,0,".",".");  ?>
                </td>
            </tr>
        </table>
    </div>
<br>
</body>
</html>