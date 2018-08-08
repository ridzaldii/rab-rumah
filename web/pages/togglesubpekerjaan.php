
<!-- toggle -->
<div class="dropdown-menu animated zoomIn col-12" style="padding:10px;">
    <ul class="mega-dropdown-menu row">
        <li class="col-md-12">
            <h4 class="m-b-20">Sub-pekerjaan  -  <?php echo $row['pekerjaan'] ?>
                <button onclick="addRow(<?php echo $row['id'] ?>)" id="addrow<?php echo $row['id'] ?>" class="btn btn-success" style="float:right"><i class="fa fa-plus"></i> Tambah Sub-pekerjaan</button></h4>
        </li>
        <li class="col-md-12">
            <div class="table-responsive">
                <table id="tblSub-<?php echo $row['id'] ?>" class="table display table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Volume</th>
                            <th>Biaya</th>
                            <th>Total Biaya</th>
                            <th style="min-width:100px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr><th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Volume</th>
                            <th>Biaya</th>
                            <th>Total Biaya</th>
                            <th>Action</th></tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            $querys = "SELECT * FROM sub_pekerjaan WHERE id_uraian=".$row['id'];
                            $resultss = $conn->query($querys);
                            while ($rowss = $resultss->fetch_assoc()) { ?>
                                <tr><form action="../proses/crud_subpekerjaan.php" method="post">
                                    <td><input type="hidden" name="idd" value="<?php echo $_GET['id'] ?>">
                                        <input type="hidden" name="id" value="<?php echo $rowss['id'] ?>">
                                        <input name="ket" type="text" class="form-control input-default" value="<?php echo $rowss['keterangan']; ?>"></td>
                                    <td><input name="satuan" type="text" class="form-control input-default" value="<?php echo $rowss['satuan']; ?>"></td>
                                    <td><input onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46" name="volume" type="text" class="form-control input-default" value="<?php echo $rowss['volume'] ?>"></td>
                                    <td><input onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46" name="biaya" type="text" class="form-control input-default" value="<?php echo $rowss['biaya'] ?>"></td>
                                    <td><input type="text" class="form-control input-default" value="Rp. <?php echo number_format($rowss['biaya']*$rowss['volume'],2); ?>" disabled></td>
                                    <td>
                                        <button title="Simpan Perubahan" name="update" type="submit" onclick="return confirm('Update sub-pekerjaan, <?php echo $rowss['keterangan']; ?>?');" class="btn-sm btn-info" id="update"><i style="font-size:150%" class="fa fa-save"></i></button></a></form>
                                        <a href="../proses/crud_subpekerjaan.php?hapus=<?php echo $rowss['id'] ?>&idd=<?php echo $_GET['id'] ?>"><button title="Hapus" onclick="return confirm('Hapus sub-pekerjaan, <?php echo $rowss['keterangan']; ?>?');" class="btn-sm btn-danger"><i style="font-size:150%" class="fa fa-trash"></i></button></a>
                                    </td></tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </li>
    </ul>
</div>
<!-- end toggle -->

<script>
    function addRow(id){
        var idd = "tblSub-"+id;
        var rows = $('#'+idd+' tbody tr').length;
        var table = document.getElementById(idd);

        var row = table.insertRow(rows+1);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        // Add some text to the new cells:
        cell1.innerHTML = "<input placeholder='Keterangan' id='ket"+id+"' name='ket"+id+"' type='text' class='form-control input-default' value='' required>";
        cell2.innerHTML = "<input placeholder='Satuan' id='sat"+id+"' name='sat"+id+"' type='text' class='form-control input-default' value='' required>";
        cell3.innerHTML = "<input onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46' placeholder='Volume' id='volume"+id+"' name='volume"+id+"' type='text' class='form-control input-default' value='' required>";
        cell4.innerHTML = "<input onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46' placeholder='Biaya' id='biaya"+id+"' name='biaya"+id+"' type='text' class='form-control input-default' value='' required></form>";
        cell6.innerHTML = "<button title='Submit' onclick='submit("+id+")' class='btn-sm btn-info'><i style=\"font-size:150%\" class=\"fa fa-save\"></i></button><button title='Batal' style='margin-left:4px' onclick='batal("+id+")' class='btn-sm btn-danger'><i style=\"font-size:150%\" class=\"fa fa-times\"></i></button>";

        var btn = document.getElementById("addrow"+id);
        btn.disabled=true;


    }

    function batal(id){
        var btn = document.getElementById("addrow"+id);
        btn.disabled=false;
        var idd = "tblSub-"+id;
        var rows = $('#'+idd+' tbody tr').length;
        var table = document.getElementById(idd);
        table.deleteRow(rows+1);
    }

    function submit(id){
        var k='ket'+id, s='sat'+id, v='volume'+id, h='biaya'+id;
        var ket = document.getElementById(k).value;
        var sat = document.getElementById(s).value;
        var vol = document.getElementById(v).value;
        var hrg = document.getElementById(h).value;
        window.location.href = "../proses/crud_subpekerjaan.php?submit="+id+"&ket="+ket+"&sat="+sat+"&vol="+vol+"&bia="+hrg+"&idd=<?php echo $_GET['id'] ?>";
    }

    function cek(ev){
        return ev.target.charCode >= 48 && ev.target.charCode <= 57 || ev.target.charCode == 46;
    }

</script>