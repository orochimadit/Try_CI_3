<?php echo $this->session->flashdata('pesan') ?>
<?php $this->load->helper('url'); ?>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th><?php echo anchor('karyawan/tambah_karyawan','Tambah') ?></th>
        </tr>
        <tbody>
            <?php $i=0; foreach($karyawan as $row) { $i++; ?>
            <tr>
                <td> <?php echo $i ?></td>
                <td> <?php echo $row->nama_lengkap ?></td>
                <td> <?php echo anchor('karyawan/update_karyawan/'.$row->id,'Update')?>
                <?php echo anchor('karyawan/delete_karyawan/'.$row->id,'Hapus',
                array('onclick'=>'return confirm(\'Apkah anda yakin ingin hapus \')'))?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </thead>

</table>