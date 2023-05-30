<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
</form>


<!--==================================================================================-->

<?php
use Cake\Routing\Router;
echo $this->Html->css('monthpicker');
echo $this->Html->script('jquery');
echo $this->Html->script('monthpicker.min');
?>
<style type="text/css">
    .rectangle{
        box-shadow: 1.5px 2px 2px #150f0fb0;
        border-radius: 5px;
        padding: 9px 0px;
        position:relative;
        display: table-cell;
        margin-right: 10px !important;
        vertical-align: middle;
        padding:2px;
        width: 130px;
    }
    .trHead{
        background-color:#12b1a2;
        color: #ffffff;
    }
    #licence{
        color: #19b50e;
        font-weight: bold;
    }
    button.btnBx {
        background-color: none;
        background-color: #fdfdfd00;
        border: none;
        color: blue;
        cursor: pointer;
    }
    .row {
        display: -ms-flexbox;
        display: flex;
        width: 100%;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: 0px;
        margin-left: 0px;
        margin-top: 14px;
    }
    label.orTag {
        border: 1px solid red;
        margin-top: 32px;
        margin-right: -20px;
        padding: 4px 8px 5px 7px;
        border-radius: 18px;
        color: red;
        margin-left: 53px;
    }
    .input.text {
        margin-top: -2px;
    }
    *, ::after, ::before {
        box-sizing: border-box;
        border-radius: 3px;
        /*font-weight: bolder;*/
    }
    .fldDc {
        margin-left: 67px;
    }
    .table {
        width: 95%;
        margin-bottom: 1rem;
        background-color: rgba(0,0,0,0);
        margin-left: 21px;
        border-radius: 23px;
    }
    sub, sup {
        position: relative;
        font-size: 100%;
        line-height: 0;
        vertical-align: baseline;
        color: red;
    }
</style>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php
// echo "test";
?>
<div class="bg-light">
    <div class="container">
        <ul class="breadcrumb bg-light pl-0">
        </ul>
    </div>
</div>
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">FORM 42 ENTRY</div>
            <?php echo $this->Form->create('nfsaRationcardApprovalFrm',['name'=>'nfsaRationcardApprovalFrm','id'=>'nfsaRationcardApprovalFrm']); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Form :</b></label>
                                <?php echo $this->Form->select('secy_smp_dmp_id', $formType, ['id' => 'secy_smp_dmp_id', 'class' => 'form-control', 'empty' => '--Select Form--']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Months :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('month',  ['label'=>'','id' => 'demo-1', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
                                </div>
                            </div>
                            <div style="float: right; margin-right: 16px; margin-bottom: 15px;">
                                <button type="submit" class="btn btn-outline-info submitt">Search</button>
                            </div>
                </fieldset>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<script type="text/javascript">
    // todo: monthPicker
    $('#demo-1').Monthpicker();
</script>

<!--========================================================================-->
<!--Table-->
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <div class="card-header bg-primary text-white"><b>REPORT ON UID ERROR CODES</b></div>
                    <fieldset>
                        <?php echo $this->Form->create('districtFrm',['name'=>'districtFrm','id'=>'districtFrm','url'=>['controller'=>'Reports','action'=>'distReport']]) ?>
                        <div class="row" style="margin-top: 18px;">
                            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12" style="margin-left: 26%;">
                                <div class="form-group" >
                                    <label for="form"><b>Month/Year :</b></label>
                                    <?php echo $this->Form->control('mnthYr', ['label' => '','empty'=>'--Select Month Year--', 'class' => 'form-control inpBx', 'id' => 'demo-1']); ?>
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                                <div class="form-group btnDeco">
                                    <button class="btn btn-outline-success" style="">Search</button>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                        <?php if($this->getRequest()->is('post')) { ?>
                            <small><span style="color: red; font-weight: bold;">Note:</span> District Name is a link click for more Details.</small>
                            <small><span style="color: red; font-weight: bold">811:</span> Biometric Data did not match.</small>
                            <small><span style="color: red; font-weight: bold">300:</span> Missing Biometric Data in CIDR for the given Aadhar Number. </small>
                            <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                            <div>
                                <div class="tabb">
                                    <?php echo $this->Form->create('districtDetail',['name'=>'districtDetail','id'=>'districtDetail','url'=>['controller'=>'Reports','action'=>'blkReport']]) ?>
                                    <table class="table table-striped table-bordered" id="exclDnld">
                                        <thead align="center">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Block</th>
                                            <th scope="col">UID Records</th>
                                        </tr>
                                        </thead>
                                        <tbody align="center">
                                        <?php
                                        $SlNo = 1;
                                        foreach($blocks as $block){
                                        ?>
                                        <tr>
                                            <td><?php echo $SlNo;?></td>
                                            <td>
                                                <span class="distButton" onclick="javascript:submitFrm('<?php echo $dKey;?>')"><?php echo $dVal;?></span>
                                            </td>
                                            <td><?php echo $block; ?></td>
                                            <td><?php echo '10'; ?></td>

                                            <?php } ?>
                                            <!--                                        <tr style="background-color: darkcyan; color: white;font-weight: bold">-->
                                            <!--                                            <td colspan="2">Total</td>-->
                                            <!--                                        </tr>-->
                                        </tbody>
                                    </table>
                                    <?php
                                    //                                    echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code']);
                                    //                                    echo $this->Form->hidden('month_id',['name'=>'month_id','id'=>'month_id','value'=>$monthId]);
                                    //                                    echo $this->Form->hidden('year_id',['name'=>'year_id','id'=>'year_id','value'=>$yearId]);
                                    //                                    echo $this->Form->end();
                                    ?>
                                </div>
                            </div>
                        <?php }else {
                            echo "";
                        } ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================================================================================-->
<!--rowspan/colspan work-->
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
    .btnContainer{
        margin-right: -120px;
        margin-bottom: 10px;
    }
    .inputErrBorder{
        border: 1px solid #ff0000 !important;
    }
    .frm_error{
        font-style: italic;
        color: #ff0000;
    }
    #btnSubmit{
        float: right;
        margin-top: 15px;
    }
    .distButton {
        cursor: pointer;
        color: #0804ff;
    }
    .btnDeco {
        margin-top: 19px;
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
    .tabb {
        width:100%;
        height:100%;
        overflow-y:hidden;
    }
    /*header BC color*/
    .bg-primary {
        background-color: #ff0000!important;
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
        margin: -12px 2px 0px 0px;
        cursor: pointer;
        height: 36px;
    }
    thead tr:first-child th {
        position: sticky;
        top: 0;
    }
    thead tr:nth-child(2) th {
        position: sticky;
        top: 48px;
    }
    th{
        background-color: darkcyan; color: white;
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
                    <div class="card-header bg-primary text-white"><b>Transaction Distribution Report</b></div>
                    <fieldset>
                        <div class="tabb">
                            <table class="table table-bordered " id="exclDnld">
                                <thead style="" align="center">
                                <tr>
                                    <th rowspan="4">#</th>
                                    <th rowspan="4">Month/Year</th>
                                    <th rowspan="4">State</th>
                                    <th rowspan="4">District</th>
                                    <th rowspan="4">Block</th>
                                    <th rowspan="4">FPS Id</th>
                                    <th rowspan="4">FPS Name</th>
                                    <th rowspan="4">FPS Mobile</th>
                                    <th rowspan="4">FPS Status</th>
                                    <th rowspan="4">HHD Sl. No.</th>
                                    <th rowspan="4">HHD Status</th>
                                    <th rowspan="4">Weighing Machine Installed</th>
                                    <th rowspan="4">IRIS Scanner</th>
                                    <th colspan="10">Count of RC & Beneficiary</th>
                                    <th colspan="9">Total Transactions</th>
                                    <th colspan="8">Transaction PHH</th>
                                    <th colspan="8">Transaction AAY</th>
                                    <th colspan="17">Distribution(MT)</th>
                                    <th colspan="27">Distribution</th>
                                </tr>
                                <!--Count of RC & Beneficiary-->
                                <tr>
                                    <th rowspan="2">AAY RC</th>
                                    <th rowspan="2">AAY Members</th>
                                    <th rowspan="2">UID Seeding</th>
                                    <th rowspan="2">Dormant RC</th>
                                    <th rowspan="2">Duplicate RC</th>
                                    <th rowspan="2">PHH RC</th>
                                    <th rowspan="2">PHH Members</th>
                                    <th rowspan="2">UID Seeding</th>
                                    <th rowspan="2">Dormant RC</th>
                                    <th rowspan="2">Duplicate RC</th>
                                    <!--Total Transaction-->
                                    <th rowspan="2">Aadhar Based Online</th>
                                    <th rowspan="2">OTP Based Online</th>
                                    <th rowspan="2">UID Seeding</th>
                                    <th rowspan="2">Offline(Un-authenticated)</th>
                                    <th rowspan="2">Inter State</th>
                                    <th rowspan="2">Intra State</th>
                                    <th rowspan="2">Inter District</th>
                                    <th rowspan="2">Intra District</th>
                                    <th rowspan="2">Total TRansaction</th>
                                    <!--Transactions PHH-->
                                    <th rowspan="2">Aadhar Based Online</th>
                                    <th rowspan="2">Other Mode Online</th>
                                    <th rowspan="2">Offline(Un-authenticated)</th>
                                    <th rowspan="2">Inter State</th>
                                    <th rowspan="2">Intra State</th>
                                    <th rowspan="2">Inter District</th>
                                    <th rowspan="2">Intra District</th>
                                    <th rowspan="2">Total Transaction</th>
                                    <!--Transactions AAY-->
                                    <th rowspan="2">Aadhar Based Online</th>
                                    <th rowspan="2">Other Mode Online</th>
                                    <th rowspan="2">Offline(Un-authenticated)</th>
                                    <th rowspan="2">Inter State</th>
                                    <th rowspan="2">Intra State</th>
                                    <th rowspan="2">Inter District</th>
                                    <th rowspan="2">Intra District</th>
                                    <th rowspan="2">Total Transaction</th>
                                    <!--Distribution(MT)-->
                                    <th colspan="2">Aadhar Based Online</th>
                                    <th colspan="2">OTP Based Online</th>
                                    <th colspan="2">Offline(Un-authenticated)</th>
                                    <th colspan="2">Inter State (KG)</th>
                                    <th colspan="2">Intra State (KG)</th>
                                    <th colspan="2">Inter District (KG)</th>
                                    <th colspan="2">Intra District (KG)</th>
                                    <th colspan="2">Un-Automated (KG)</th>
                                    <th rowspan="2">Total Distribution (MT)</th>
                                    <!--Distribution-->
                                    <th colspan="3">Aadhar Based Online</th>
                                    <th colspan="3">OTP Based Online</th>
                                    <th colspan="3">Offline(Un-authenticated)</th>
                                    <th colspan="3">Inter State (KG)</th>
                                    <th colspan="3">Intra State (KG)</th>
                                    <th colspan="3">Inter District (KG)</th>
                                    <th colspan="3">Intra District (KG)</th>
                                    <th colspan="3">Un-Automated (KG)</th>
                                    <th rowspan="3">Total Distribution (MT)</th>
                                </tr>
                                <tr>
                                    <!--Distribution(MT)-->
                                    <th>Wheat</th>
                                    <th>Rice</th>
                                    <th>Wheat</th>
                                    <th>Rice</th>
                                    <th>Wheat</th>
                                    <th>Rice</th>
                                    <th>Wheat</th>
                                    <th>Rice</th>
                                    <th>Wheat</th>
                                    <th>Rice</th>
                                    <th>Wheat</th>
                                    <th>Rice</th>
                                    <th>Wheat</th>
                                    <th>Rice</th>
                                    <th>Wheat</th>
                                    <th>Rice</th>
                                    <!--Distribution(MT)-->
                                    <th>Sugar</th>
                                    <th>Salt</th>
                                    <th>K.Oil</th>
                                    <th>Sugar</th>
                                    <th>Salt</th>
                                    <th>K.Oil</th>
                                    <th>Sugar</th>
                                    <th>Salt</th>
                                    <th>K.Oil</th>
                                    <th>Sugar</th>
                                    <th>Salt</th>
                                    <th>K.Oil</th>
                                    <th>Sugar</th>
                                    <th>Salt</th>
                                    <th>K.Oil</th>
                                    <th>Sugar</th>
                                    <th>Salt</th>
                                    <th>K.Oil</th>
                                    <th>Sugar</th>
                                    <th>Salt</th>
                                    <th>K.Oil</th>
                                    <th>Sugar</th>
                                    <th>Salt</th>
                                    <th>K.Oil</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===============================================================================================-->
