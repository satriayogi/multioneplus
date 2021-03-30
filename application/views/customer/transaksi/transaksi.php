<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <style>
    tr td{
        text-align:center;
    }
    </style>
</head>
<body>
    <table>
    <thead>
    <tr>
    <th>No.</th>
    <th>Image</th>
    <th>Description</th>
    <th>Color</th>
    <th>Price</th>
    <th>Amount</th>
    <th>total</th>
    <th>action</th>
    </tr>
    </thead>
    <tbody>
    <form action="<?= base_url('transaksi_customer/updatekeranjang') ?>" method="post">
    <?php
    $no = 1;
    foreach ($keranjang as $value):?>
    <tr>
    <td><?= $no++; ?></td>
    <td>
    <?php 
    $id_product = $value['id_product'];
    $query = $this->db->query("SELECT * FROM gambar where id_product='$id_product' ")->row_array();
    echo $query['gambar'];
    ?>
    </td>
    <td><?= $value['catatan']; ?></td>
    <td>1</td>
    <td><?= $value['harga']; ?></td>
    <td><button type="submit" name="min"> <i class="fas fa-minus"></i> </button><input type="text" name="pcs" id="" value="<?= $value['pcs'] ?>">
    <input type="hidden" name="id_keranjang" id="" value="<?= $value['id'] ?>">
    <input type="hidden" name="id_product" id="" value="<?= $this->uri->segment(3); ?>">
    <input type="hidden" name="id_customer" id="" value="<?= $this->uri->segment(4); ?>">
    <button type="submit" name="plus"> <i class="fas fa-plus"></i> </button></td>
    <td><?php
    $harga = $value['harga'];
    $pcs = $value['pcs'];
    $jumlah = $harga * $pcs;
    echo $jumlah;
    ?></td>
    <td><a href="<?= base_url('transaksi_customer/hapus_keranjang/'.$value['id'].'/'.$value['id_product'].'/'.$value['id_customer']) ?>"> <i class="fas fa-trash"></i> </a></td>
    </tr> 
    <?php endforeach; ?>
    <tr>
    <td colspan="6" style="text-align:end">total paid</td>
    <td >RP. <?php $customer = $customer['id']; $qu = $this->db->query("SELECT SUM(total) as jumlah from keranjang WHERE id_customer='$customer'")->row_array(); ?> <?= $qu['jumlah'] ?> </td>
    </tr>
    <tr>
    </tr>
    </form>
    </tbody>
    </table>
    <button>Shopping Again</button>
    <button>Checkout</button>
</body>
</html>