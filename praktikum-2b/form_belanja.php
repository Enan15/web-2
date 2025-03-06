<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM BELANJA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: aliceblue;
        }

        .kulkas {
            color: black;
            font-size: large;
            font-weight: 600;
        }

        .mesin_cuci {
            color: black;
            font-weight: 600;
        }

        .tv {
            color: black;
            font-weight: 600;
        }

        .daftar {
            background-color: aqua;
            font-weight: 800;
        }

        h5 {
            color: blue
        }

        h3 {
            color: blue;
        }
    </style>

</head>

<body>
    <h3>BELANJA ONLINE</h3>
    <div style="display: flex; justify-content: space-between;">
        <form method="post" action="form_belanja.php" style="width: 60%;">
            <div class="form-group row">
                <label for="nama_customer" class="col-4 col-form-label">Nama Customer</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-card"></i>
                            </div>
                        </div>
                        <input id="nama_customer" name="nama_customer" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Pilih Produk</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="pilih_produk" id="pilih_produk_0" type="radio" class="custom-control-input" value="TV">
                        <label for="pilih_produk_0" class="custom-control-label">TV</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="pilih_produk" id="pilih_produk_1" type="radio" class="custom-control-input" value="KULKAS">
                        <label for="pilih_produk_1" class="custom-control-label">KULKAS</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="pilih_produk" id="pilih_produk_2" type="radio" class="custom-control-input" value="MESIN">
                        <label for="pilih_produk_2" class="custom-control-label">MESIN CUCI</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-4 col-form-label">Jumlah</label>
                <div class="col-8">
                    <input id="jumlah" name="jumlah" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <div style="width: 30%;">
            <table class="table table-hover table-bordered">
                <tr>
                    <td class="daftar">
                        DAFTAR HARGA
                    </td>
                </tr>
                <tr>
                    <td class="tv">
                        TV: 4.200.000
                    </td>
                </tr>
                <tr>
                    <td class="kulkas">
                        Kulkas: 3.100.000
                    </td>
                </tr>
                <tr>
                    <td class="mesin_cuci">
                        Mesin Cuci: 3.800.000
                    </td>
            </table>
        </div>
    </div>
    <h3>DAFTAR CUSTOMER</h3>

    <?php
    $nama_customer = $_POST["nama_customer"];
    $pilih_produk = $_POST["pilih_produk"];
    $jumlah = $_POST["jumlah"];

    switch ($pilih_produk) {
        case "TV":
            $harga_produk = 4200000;
            break;
        case "KULKAS":
            $harga_produk = 3100000;
            break;
        case "MESIN":
            $harga_produk = 3800000;
            break;
        default:
            $harga_produk = 0;
    }
    $total_harga = $harga_produk * $jumlah;

    echo "Nama Customer : $nama_customer <br>";
    echo "Pilih Produk : $pilih_produk <br>";
    echo "Jumlah : $jumlah <br>";
    echo "Total : Rp. $total_harga <br>";
    ?>
</body>

</html>