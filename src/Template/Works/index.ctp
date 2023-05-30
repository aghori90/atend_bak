<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">Drop Down</div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'works', 'action'=>'index']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>State :</b></label>
                                <?php echo $this->Form->control('state', ['label' => '', 'class' => 'form-control','id'=>'state_code', 'empty'=>'--Select State-- ','options'=>$state]); ?>                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>District:</b></label>
                                <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control', 'empty'=>'--Select District--','options'=>$cfDistricts]); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Block:</b></label>
                                <?php echo $this->Form->control('block', ['label' => '', 'class' => 'form-control ', 'empty'=>'--Select Block--','options'=>$blocks]); ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // get district based on state (permanent)
    $('#state_code').change(function(){ //alert("hi");return false;
        var url         = "<?php echo $this->Url->build(['controller' => 'App', 'action' => 'getCfDistrictsBasedOnState']);?>";
        var state_code  = $(this).val();
        var token       = '<?php echo $this->request->getParam('_csrfToken'); ?>';
        //alert(url + " == " + token);return false;
        $.ajax({
            type: 'POST',
            url: url,
            async:true,
            data: ({state_code : state_code}),
            dataType:'html',
            beforeSend: function(xhr){
                xhr.setRequestHeader('X-CSRF-Token', token);
            },
            success: function(response, textStatus)
            {
                $('#permantdist').empty();
                var result = JSON.parse(response); //alert(result);return false;
                $.each(result, function(val, text) {
                    $('#permantdist').append(
                        $('<option></option>').val(val).html(text)
                    );
                });
                $("select[id=permantdist]").prepend("<option value='' selected>-- Select District--</option>");
            },
            error: function(e)
            {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
    });


    $('#permantdist').change(function(){ //alert("hi");return false;
        var url         = "<?php echo $this->Url->build(['controller' => 'App', 'action' => 'getBlocksBasedOnDistrict']);?>";
        var permantdist    = $(this).val();
        var token       = '<?php echo $this->request->getParam('_csrfToken'); ?>';
        //alert(url + " == " + token);return false;
        $.ajax({
            type: 'POST',
            url: url,
            async:true,
            data: ({permantdist : permantdist}),
            dataType:'html',
            beforeSend: function(xhr){
                xhr.setRequestHeader('X-CSRF-Token', token);
            },
            success: function(response, textStatus)
            {
                $('#block').empty();
                var result = JSON.parse(response); //alert(result);return false;
                $.each(result, function(val, text) {
                    $('#block').append(
                        $('<option></option>').val(val).html(text)
                    );
                });
                $("select[id=block]").prepend("<option value='' selected>-- Select Block--</option>");
            },
            error: function(e)
            {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
    });
</script>