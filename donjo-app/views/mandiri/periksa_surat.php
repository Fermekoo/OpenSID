<style type="text/css">
	.content-wrapper.periksa {min-height: 0px !important;}
	div.form-surat .content-wrapper {padding-top: 0px !important; padding-left: 30px;}
	.breadcrumb.admin {display: none;}
	.box-header.admin {display: none;}
	.tdk-periksa {display: none;}
	.content.periksa
	{
		min-height: 0px !important;
		padding-bottom: 0px;
	}
	div.form-surat .content-header {padding-top: 0px !important;}
</style>

<div class="content-wrapper periksa">
	<section class="content-header">
		<h1>Permohonan Surat</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?= site_url('permohonan_surat_admin/index/1/0')?>"> Daftar Permohonan Surat</a></li>
			<li class="active">Surat Keterangan</li>
		</ol>
	</section>
	<section class="content periksa">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-warning collapsed-box">
					<div class="box-header">
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
	          </div>
						<h4>Periksa persyaratan</h4>
					</div>
					<div class="box-body">
						Periksa setiap dokumen untuk memastikan sesuai dengan persyaratan surat ini.
						Kalau persyaratan belum lengkap:
						<ul>
							<li>Klik tombol Belum Lengkap</li>
							<li>Beritahu pemohon persyaratan mana yang belum lengkap</li>
						</ul>
						<p>Status permohonan akan secara otomatis diubah menjadi 'Belum Lengkap'.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="box box-info" style="margin-top: 10px;">
			<div class="box-header with-border">
				<h4 class="box-title">DOKUMEN / KELENGKAPAN PENDUDUK YANG DIBUTUHKAN</h4>
				<div class="box-tools pull-right">
					<input type="hidden" id="jenis_surat" name="jenis_surat" value="<?=$jenis?>">
					<button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#surat"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body" id="surat">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
					<thead>
						<tr>
							<th width="2">No</th>
							<th width="7">Lengkap</th>
							<th width="800">Nama Dokumen</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody id="tbody-dokumen">
					</tbody>
				</table>
			</div>
		</div>

		<div class="box box-info" style="margin-top: 10px;">
	    <div class="box-header with-border">
	      <h4 class="box-title">DOKUMEN / KELENGKAPAN PENDUDUK YANG TERSEDIA</h4>
	      <div class="box-tools">
	        <button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#dokumen"><i class="fa fa-minus"></i></button>
	      </div>
	    </div>
	    <div class="box-body">
	      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
	        <thead>
	          <tr>
	            <th width="2">No</th>
	            <th width="220">Nama Dokumen</th>
	            <th width="360">Berkas</th>
	            <th width="200">Tanggal Upload</th>
	            <th>&nbsp;</th>
	          </tr>
	        </thead>
	        <tbody>
	          <?php foreach($list_dokumen as $data){?>
	            <tr>
	              <td align="center" width="2"><?php echo $data['no']?></td>
	              <td><?php echo $data['nama']?></td>
	              <td><a href="<?php echo base_url().LOKASI_DOKUMEN?><?php echo urlencode($data['satuan'])?>" ><?php echo $data['satuan']?></a></td>
	              <td><?php echo tgl_indo2($data['tgl_upload'])?></td>
	              <td></td>
	            </tr>
	          <?php }?>
	        </tbody>
	      </table>
	    </div>
	  </div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-warning collapsed-box">
					<div class="box-header">
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
	          </div>
						<h4>Periksa isian form</h4>
					</div>
					<div class="box-body">
						Kalau isian sudah lengkap:
						<ul>
							<li>Klik Ekspor Dok untuk mencetak surat. Lampiran dapat diunduh di Arsip Layanan.</li>
							<li>Berikan surat kepada petugas untuk ditandatangani</li>
						</ul>
						<p>Status permohonan akan secara otomatis diubah menjadi 'Menunggu Tandatangan'.</p>
						Kalau isian belum lengkap:
						<ul>
							<li>Klik tombol Belum Lengkap</li>
							<li>Beritahu pemohon isian mana yang belum lengkap</li>
						</ul>
						<p>Status permohonan akan secara otomatis diubah menjadi 'Belum Lengkap'.</p>
						<input id="isian_form" type="hidden" value='<?= $isian_form?>'>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="form-surat" id="periksa-permohonan">
	<?php $this->load->view($form_surat); ?>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Di form surat ubah isian admin menjadi disabled
    $("#periksa-permohonan .readonly-periksa").attr('disabled', true);
		setTimeout(function() {isi_form();}, 100);
  });

  function isi_form()
  {
    var isian_form = JSON.parse($('#isian_form').val(), function(key, value)
    {
    	if (key)
    	{
	    	$('*[name=' + key + ']').val(value);
    	}
  	});
	}
</script>

<script type='text/javascript'>
  $(document).ready(function(){

		var nama_surat = $('#jenis_surat').val();
    var url = "<?= site_url('permohonan_surat_admin/ajax_table_surat_permohonan')?>";

    $.ajax({
      type: "POST",
      url: url,
      data: {
        nama_surat: nama_surat
      },
      dataType: "JSON",
      success: function(data)
      {
        var html;
        if (data.length == 0)
        {
          html = "<tr><td colspan='3' align='center'>No Data Available</td></tr>";
        }
        for (var i = 0; i < data.length; i++)
				{
					html += "<tr>"
					+"<td>"+data[i].no+"</td>"
					+"<td>"+data[i].cb+"<center><input type='checkbox' name='lengkap[]'></center>"+"</td>"
					+"<td>"+data[i].ref_surat_nama+"</td>";
				}
        $('#tbody-dokumen').html(html);
      },
      error: function(err, jqxhr, errThrown)
      {
        console.log(err);
      }
    });
 });
 </script>
