<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DealerTemp[]|\Cake\Collection\CollectionInterface $dealerTemps
 */
?>
<script>
    // print excel document----------------------------------------------------------------------------
    var table_excel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
            ,
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]-->' +
                '</head><body><table>{table}</table></body></html>'
            , base64 = function (s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            }
            , format = function (s, c) {
                return s.replace(/{(\w+)}/g, function (m, p) {
                    return c[p];
                })
            }
        return function (table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
        }
    })()
</script>
<style type="text/css">
    .btnContainer {
        margin-right: -120px;
        margin-bottom: 10px;
    }

    .inputErrBorder {
        border: 1px solid #ff0000 !important;
    }

    .frm_error {
        font-style: italic;
        color: #ff0000;
    }

    #btnSubmit {
        float: right;
        margin-top: 15px;
    }

    .distButton {
        cursor: pointer;
        color: #0804ff;
        font-weight: 700;
    }

    .btnDeco {
        margin-top: 45px;
    }

    /*.table thead th {*/
    /*    vertical-align: bottom;*/
    /*    border-bottom: 2px solid #dee2e6;*/
    /*    font-size: x-small;*/
    /*}*/
    /*thead {*/
    /*    background-color: darkcyan;*/
    /*    color: white;*/
    /*    font-size: x-small;*/
    /*    !* width: 2%; *!*/
    /*}*/

    /* header scroll*/
    /*.tabb {
        width: 1150px;
        height: 550px;
        overflow-y: scroll;
    }
    thead {
        position: sticky;
        top: 0;
        z-index: 1;
        font-size: x-small;
    }*/
    /* header sticky*/
    td.leftScroll {
        background-color: gold;
        position: sticky;
        left: 0px;
    }
    th {
        background-color: darkcyan;
        color: white;
    }

    /*header BC color*/
    .bg-primary {
        background-color: #65a13f !important;
    }

    /*bold*/
    b, strong {
        font-weight: bolder;
        border-bottom-style: solid;
    }

    /*excdel image*/
    img.suk_st {
        display: inline-block;
        float: right;
        margin: 0px 2px 0px 0px;
        cursor: pointer;
        height: 36px;
    }

    /*thead tr:first-child th {
        position: sticky;
        top: 0;
    }
    thead tr:nth-child(2) th {
        position: sticky;
        top: 48px;
    }*/

    .required:after {
        content: " *";
        color: red;
    }

    /*th {*/
    /*     padding: 5px;*/
    /*     background-color: #4cb96b;*/
    /*     position: -webkit-sticky;*/
    /*     position: sticky;*/
    /*     top: 0;*/
    /* }*/

</style>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <div class="card-header bg-primary text-white"><b>Server Report</b></div>
                    <?php echo $this->Form->create('serverIp',['name'=>'serverIp','id'=>'serverIp','url'=>['controller'=>'works','action'=>'serverMonitor']]) ?>
                    <div class="container-fluid">
                        <fieldset>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="form"><b>IP Address :</b></label>
                                        <?php $ip = ['192.168.122.1' => '192.168.122.1']; ?>
                                        <?php
                                            echo $this->Form->control('IpAddress', ['label' => '', 'class' => 'form-control','id'=>'IpAddress', 'empty'=>'--Select IP Address-- ','options'=>$ip]);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <div class="btnDeco">
                                        <?php echo $this->Form->button(__('Submit'),['type'=>'submit', 'class' => 'form-controlbtn btn btn-success']); ?>
<!--                                        <button type="submit" class="btn btn-outline-success">Success</button>-->
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php echo $this->Form->end(); ?>
                    </div>

                    <fieldset>
                        <?php if($this->getRequest()->is('post')) { ?>
                            <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Transaction Distribution Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                            <div>
                                <div class="tabb">
                                    <table class="table table-bordered border-primary " id="exclDnld">
                                        <thead style="" align="center">
                                            <tr>
                                                <th rowspan="4">#</th>
                                                <th rowspan="4">Host Name</th>
                                                <th class="stkHdr" rowspan="4">IP</th>
                                                <th rowspan="4">Date</th>
                                                <th colspan="3">Memory</th>
                                                <th colspan="4">Disk Space</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="2">Total</th>
                                                <th rowspan="2">Free</th>
                                                <th rowspan="2">Used</th>
                                                <th rowspan="2">Total</th>
                                                <th rowspan="2">Free</th>
                                                <th rowspan="2">Used</th>
                                                <th rowspan="2">Used(%)</th>
                                            </tr>
                                        </thead>
                                        <tbody style="" align="center">
                                            <?php
                                            $i=1;
                                            foreach ($getRecords as $server) { ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $server['hostName']; ?></td>
                                                    <td><?php echo $server['ip']; ?></td>
                                                    <td><?php echo $server['created']; ?></td>
                                                    <td><?php echo $server['totalMem']; ?></td>
                                                    <td><?php echo $server['freeMem']; ?></td>
                                                    <td>
                                                        <?php if($server['usedMem'] > '9Gi') { ?>
                                                            <span style="color: red"><?php echo $server['usedMem']; ?> </span>
                                                        <?php }else{ ?>
                                                            <?php echo $server['usedMem']; ?>
                                                        <?php } ?>
                                                    </td>
<!--                                                    <td>--><?php //echo $server['usedMem']; ?><!--</td>-->
                                                    <td><?php echo $server['totalSpace']; ?></td>
                                                    <td><?php echo $server['FreeSpace']; ?></td>
                                                    <td><?php echo $server['UsedSpace']; ?></td>
                                                    <td>
                                                    <?php if($server['UsedSpacePercent'] > '80%') { ?>
                                                        <span style="color: red"><?php echo $server['UsedSpacePercent']; ?> </span>
                                                    <?php }else{ ?>
                                                        <?php echo $server['UsedSpacePercent']; ?>
                                                    <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>