<div class="block-header">
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <div class="card">
 <div class="header">
 <div class="row clearfix">
 <div class="col-xs-12 col-sm-6">
 <h1 style="text-align:left;">Kategori</h1>
 </div>
 </div>
<div class="body">
 <div class="row">
 <a style="margin: 35px;margin-left: 1px;" href="#tambah"
class="btn btn-primary" data-toggle="modal">
 <span class="glyphicon glyphicon-plus"></span> Tambah</a>
 <table class="table table-hover table-striped">
 <tr>
 <th>NO</th><th>ID</th><th>NAMA KATEGORI</th>
 </tr>
<?php
 $no=0;
 foreach ($data_kategori as $dt_kat) {
 $no++;
echo '<tr>
 <td>'.$no.'</td>
 <td>'.$dt_kat->id_kategori.'</td>
 <td>'.$dt_kat->nama_kategori.'</td>
 </tr>';
 }
 ?>
 </table>
<?php if($this->session->flashdata('pesan')!=null): ?>
<div class="alert alert-danger">
<?= $this->session->flashdata('pesan');?></div>
<?php endif ?>
 </div>
 </div>
 </div>
 </div>
<div class="modal fade" id="tambah">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal"><span ariahidden="true">&times;</span><span class="sr-only">Close</span></button>
 <h4 class="modal-title">Tambah Kategori</h4>
 </div>
 <div class="modal-body">
 <form action="<?=base_url('index.php/kategori/simpan_kategori')?>"
method="post">
 Nama Kategori
 <input type="text" name="nama_kategori" class="form-control"><br>
 <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
 </form>
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-default" datadismiss="modal">Close</button>
 </div>
 </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
