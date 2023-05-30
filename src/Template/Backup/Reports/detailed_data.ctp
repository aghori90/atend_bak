<style>
    span.vcp_head {
        display: inline-block;
        width: 100%;
        text-align: center;
        margin: 0px 0 15px 0;
        font-size: x-large;
        font-weight: 800;
        color: black;
    }
</style>
<div class="container-fluid table border rounded border border-primary">
    <fieldset>
        <legend><?= __('Dealer Details') ?></legend>
        <div class="row">
            <table class="table table-hover">
                <tbody>
                    <span class="vcp_head">Acknowledgement No. : <?php echo $datas[0]['ack_no']; ?></span>
                    <!--<tr>
                        <td scope="col"><b>Acknowledgement No. :</b></td><td><?php /*echo $datas[0]['ack_no']; */?></td>
                        <td></td><td></td>
                    </tr>-->
                    <tr>
                        <td scope="col"><b>District Name :</b></td><td><?php echo $datas[0]['districtName']; ?></td>
                        <td scope="col"><b>Block Name :</b></td><td><?php echo $datas[0]['blockName']; ?></td>
                    </tr>
                    <tr>
                        <td scope="col"><b>Name :</b></td><td><?php echo $datas[0]['name']; ?></td>
                        <td scope="col"><b>Father/Husband Name :</b></td><td><?php echo $datas[0]['father_husband_name']; ?></td>
                    </tr>
                    <tr>
                        <td scope="col"><b>Dealer Type :</b></td><td><?php echo $datas[0]['dealer_groups_id']; ?></td>
                        <td scope="col"><b>Dealer Licence No. :</b></td><td><?php echo $datas[0]['dealerLicence']; ?></td>
                    </tr>
                    <tr>
                        <td scope="col"><b>Shop No. :</b></td><td><?php echo $datas[0]['shop_no']; ?></td>
                        <td scope="col"><b>Shop Name :</b></td><td><?php echo $datas[0]['shop_name']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </fieldset>
</div>
