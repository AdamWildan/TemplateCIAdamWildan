<div class="block-header">
<center> <h1> DATA BARANG </h1> </center>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2> Data Barang </h2>
                            </div>
                            <div class="col-xs-12 col-sm-6 align-right">
                                
                            </div>
                        </div>
                    
                    </div>

                <div class="body">
                    <div class="row">
                    <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"> </span>Tambah</a>

                        <table class="table table-hover table-striped">
                        <tr>
                            <th>NO</th> 
                            <th>ID BARANG</th>
                            <th>NAMA BARANG</th> 
                            <th>HARGA BARANG</th>
                            <th>STOK</th>
                            <th>ID KATEGORI</th>
                            <th>AKSI</th>
                        </tr>

                        <?php
                        $no=0;
                        foreach($data_barang as $dt_bar){
                            $no++;
                            echo '<tr>
                            <td> '.$no.' </td> 
                            <td> '.$dt_bar->id_barang.' </td> 
                            <td> '.$dt_bar->nama_barang.' </td> 
                            <td> '.$dt_bar->harga.'</td>
                            <td> '.$dt_bar->stok.'</td>
                            <td> '.$dt_bar->nama_kategori.'</td>
                            <td> <a href="#update_barang" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_bar->id_barang.')"> Update </a> 
                            <a href='.base_url('index.php/barang/deleteBarang/'.$dt_bar->id_barang).' class="btn btn-success" onclick="return confirm(\'anda yakin\')"> Delete </a> </td>
                                </tr>';

                        }
                        ?>
                        </table>
                    
                    <?php
                    if($this->session->flashdata('pesan')!=null);
                    ?>

                    <div class="alert alert-danger">
                    <?= $this->session->flashdata('pesan');?>
                    </div>

                    </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Tambah Kategori</h4>
        </div>
        <div class="modal-body">
        <form action="<?=base_url('index.php/barang/simpan_barang')?>" method="post" enctype="multipart/form-data">
            Nama Barang
            <input type="text" name="nama_barang" class="form-control"> 
            <form action="<?=base_url('index.php/barang/simpan_barang')?>" method="post"><br>
            Harga Barang
            <input type="text" name="harga_barang" class="form-control"> 
            <form action="<?=base_url('index.php/barang/simpan_barang')?>" method="post"><br>
            Stok
            <input type="text" name="stok" class="form-control"> 
            <form action="<?=base_url('index.php/barang/simpan_barang')?>" method="post"><br>
            Id Kategori
            <br>
            <select name="id_kategori">
            <?php
            foreach ($data_kategori as $dt_kat)
            {
                echo"<option value='".$dt_kat->id_kategori."'>
                ".$dt_kat->nama_kategori."
                </option>";
            }
            ?>
            <br>

            Upload Gambar
            <input type="file" name="gambar" class="form-control">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </form>
        </div>
 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="update_barang">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Update Barang</h4>
        </div>

        <div class="modal-body">
        <form action="<?=base_url('index.php/barang/update_barang')?>" method="post">

        <input type="hidden" name="id_barang" id="id_barang">

            Nama Barang
            <input id="nama_barang" type="text" name="nama_barang" class="form-control"> 
            <form action="<?=base_url('index.php/barang/update_barang')?>" method="post"><br>

            Harga Barang
            <input id="harga_barang" type="text" name="harga_barang" class="form-control"> 
            <form action="<?=base_url('index.php/barang/update_barang')?>" method="post"><br>

            Stok
            <input id="stok"type=" text" name="stok" class="form-control"> 
            <form action="<?=base_url('index.php/barang/update_barang')?>" method="post"><br>

            Id Kategori
            <br>
            <select id="id_kategori" name="id_kategori">
            <?php
            foreach ($data_kategori as $dt_kat)
            {
                echo"<option value='".$dt_kat->id_kategori."'>
                ".$dt_kat->nama_kategori."
                </option>";
            }
            ?>
            
            <br>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </form>
        </div>
 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
    function tm_detail(id_brng){
        $.getJSON("<?=base_url()?>index.php/barang/get_detail_barang/"+id_brng,function(data){
            $("#id_barang").val(data['id_barang']);
            $("#nama_barang").val(data['nama_barang']);
            $("#harga_barang").val(data['harga_barang']);
            $("#stok").val(data['stok']);
            $("#id_kategori").val(data['id_kategori']);
        });
    }
    </script>