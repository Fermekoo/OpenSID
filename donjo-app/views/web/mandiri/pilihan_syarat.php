    <select class="form-control required input-sm required" name="syarat[]" >
      <option value=""> -- Pilih dokumen yang melengkapi syarat -- </option>
      <?php foreach ($dokumen AS $data): ?>
        <option value="<?= $data['id']?>" <?php selected($data['id'], $permohonan['id_surat'])?>><?= $data['nama']?></option>
      <?php endforeach;?>
    </select>
