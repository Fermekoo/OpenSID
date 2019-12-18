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

<div class="form-surat">
	<?php $this->load->view($form_surat); ?>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Di form surat ubah isian admin menjadi disabled
    $(".readonly-periksa").attr('disabled', true);
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
