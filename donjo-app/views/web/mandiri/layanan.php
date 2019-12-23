<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<section class="content">
	<div class="row">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#daftar_rekam" data-toggle="tab">Daftar rekam cetak surat</a>
			</li>
			<li>
				<a href="#permohonan_surat" data-toggle="tab">Status permohonan surat</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane" id="permohonan_surat">
				permohonan surat
			</div>	
 			<div class="tab-pane active" id="daftar_rekam">
				<span style="font-size: x-large"><strong>DAFTAR REKAM CETAK SURAT</strong></span>
				<table class="table table-striped" id="list-rekam">
					<thead>
						<tr>
							<th>No</th>
							<th align="left">Nomor Surat</th>
							<th align="left">Jenis Surat</th>
							<th align="left">Nama Staf</th>
							<th align="left">Tanggal</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						<?php foreach($surat_keluar as $data): ?>
							<tr>
								<td align="center" width="2"><?= $no++ ?></td>
								<td><?= $data['no_surat']?></td>
								<td><?= $data['format']?></td>
								<td><?= $data['pamong']?></td>
								<td><?= tgl_indo2($data['tanggal'])?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<div class="teks">
					<?php //$this->load->view('surat/signature.php');?>
				</div>
			</div>
		</div>
	</div>
</section>
