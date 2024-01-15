<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DealerTemp[]|\Cake\Collection\CollectionInterface $dealerTemps
 */
echo $this->Html->script('jquery');
echo $this->Html->script('injection');
//echo "<pre>";print_r($details);die;
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
        margin-top: 51px;
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
    /*-------*/
    .main-menu {
        display: inline-block;
        padding: -8px 0px;
        width: 100%;
        margin-top: -1px;
        margin-bottom: -33px;
    }
    .adjst{
        margin-top: 20px;
    }
    .adj{
        margin-top: 10px;
    }
    .box {
        background-color: transparent;
        border: 0;
        color: blue;
        font-size: larger;
    }

</style>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <div class="card-header bg-primary text-white"><b>Attendance Record</b></div>
                    <?php echo $this->Form->create('range',['name'=>'range','id'=>'range','url'=>['controller'=>'works','action'=>'adminReports']]) ?>
                    <div class="container-fluid">
                        <fieldset>
                            <div class="row">
                                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="form" class="adjst"><b>From :</b></label>
                                        <div class="col-sm-12 adj"><?php echo $this->Form->control("from", ["type" => "text", "label" => false, "placeholder" => "dd/mm/yyyy", "class" => "form-control from","readonly" => true]); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="form" class="adjst"><b>To :</b></label>
                                        <div class="col-sm-12 adj"><?php echo $this->Form->control("to", ["type" => "text", "label" => false, "placeholder" => "dd/mm/yyyy", "class" => "form-control to",  "readonly" => true]); ?></div>
                                    </div>
                                </div>
<!--                                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="form" class="adjst"><b>Employee Name :</b></label>-->
<!--                                        <div class="col-sm-12 adj">--><?php //echo $this->Form->select("empid", $name, ["label" => false,  'empty' => '--Select Employee--', "class" => "form-control numonly"]); ?><!--</div>-->
<!--                                         <div class="col-sm-12 adj">--><?php ////echo $this->Form->control("empid", ["type" => "text", "label" => false, "placeholder" => "--Enter Employee Id--", "class" => "form-control numonly"]); ?><!--</div> -->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                    <div class="btnDeco">
                                        <?php echo $this->Form->button(__('Submit'),['type'=>'submit', 'class' => 'form-controlbtn btn btn-success','id'=>'bt']); ?>
                                        <!--                                        <button type="submit" class="btn btn-outline-success">Success</button>-->
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php echo $this->Form->end(); ?>
                    </div>
<!--                    --><?php //echo "<pre>";print_r($details);die; ?>
                    <fieldset>
                        <?php if($details!= 1) { ?>
                            <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Attendance Report SDC');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                            <div>
                                <div class="tabb">
                                    <table class="table table-bordered border-primary " id="exclDnld">
                                        <thead style="" align="center">
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Id</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                           <th>Total Work</th>
<!--                                            <th>In Time</th>-->
<!--                                            <th>Out Time</th>-->
                                        </tr>
                                        </thead>
                                        <tbody style="" align="center">
                                            <?php
//                                            echo "<pre>";print_r($details);die;
                                            $i=1;
                                            foreach ($details as $server) { ?>

                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td>
                                                        <?php echo $this->Form->create('detail',['name'=>'detail','url'=>['controller'=>'works','action'=>'adminReportDetails']]) ?>
                                                            <input type="submit" name="detail" value="<?php echo $server['username']; ?>" class="box">
                                                    </td>
                                                    <td><?php echo $server['f_name'].' '.$server['l_name']; ?></td>
                                                    <td><?php echo $desig[$server['designation']]; ?></td>
                                                    <td><?php echo $workHr[$a++]['total']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <!-- <input type="hidden" name="empid" value="<?php// echo $server['username']; ?>"/> -->
                                            <?php echo $this->Form->end(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <span style="color: red; font-weight: bold">Sorry No Records found</span>
                        <?php } ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Html->script("jquery-ui.js") ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#bt').click(function(){
            let cal1 = $('#from').val();
            let cal2 = $('#to').val();
            let empid = $('#empid').val();
            // alert(cal2);
            if(cal1 == '' || cal2 == ''){
                // $('#from').html('Please Select date');
                alert('Select Date Range');return false;
            }
            if(empid == ''){
                alert('Enter Employee Id');return false;
            }
            // return false;
        });
    });

        /*datepicker*/
        $(function() {
            $('.from').datepicker({
                language: "es",
                autoclose: true,
                todayHighlight: true,
                changeMonth: true,
                changeYear: true,
                maxDate: "D M Y",
                yearRange: "-20:-0",
                dateFormat: "yy-mm-dd",
                // defaultDate: "-720m",

            });

            /*To*/
            $('.to').datepicker({
                language: "es",
                autoclose: true,
                todayHighlight: true,
                changeMonth: true,
                changeYear: true,
                maxDate: "D M Y",
                yearRange: "-20:-0",
                dateFormat: "yy-mm-dd",
                // defaultDate: "-720m",

            });
        });

</script>
