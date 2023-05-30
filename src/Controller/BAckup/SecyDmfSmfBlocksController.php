<?php
namespace App\Controller\BAckup;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * SecyDmfSmfBlocks Controller
 *
 * @property \App\Model\Table\SecyDmfSmfBlocksTable $SecyDmfSmfBlocks
 *
 * @method \App\Model\Entity\SecyDmfSmfBlock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SecyDmfSmfBlocksController extends AppController
{
    public function addDmfPhh()
    {
        $connection                 = ConnectionManager::get('default');
        $session_data               = $this->getRequest()->getSession()->read();
        $user_id                    = $session_data['Auth']['User']['id'];
        $groupId                    = $session_data['Auth']['User']['group_id'];
        $dist                       = $session_data['Auth']['User']['rgi_district_code'];
        $blok                       = $session_data['Auth']['User']['rgi_block_code'];
        $groups                     = [12,20];

        if(!in_array($groupId, $groups)){
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller'=>'Users','action' => 'logout']);
        }

        if(!empty($session_data['FormData']) && isset($session_data['FormData'])){
            $formData   = $session_data['FormData'];
            $form_id    = base64_decode($formData['formId']);
            $form_name  = base64_decode($formData['formNamee']);
            $month      = base64_decode($formData['monthId']);
            $year       = base64_decode($formData['yearId']);
            $formNameHn = base64_decode($formData['formNameHn']);
        }else{
            $form_id = '';
            $month = '';
            $year = '';
            $form_name = '';
            $formNameHn = '';
        }

        // todo: for fornName
        $formName    = TableRegistry::get('secy_dept_form_masters');
        $query             = $formName->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $formName = $query->toArray();

        // todo: for years
        $years    = TableRegistry::get('years');
        $query              = $years->find('list', [
            'keyField'      => 'name',
            'valueField'    => 'id'
        ]);
        $years = $query->toArray();

        // todo: for monthName
        $mnths    = TableRegistry::get('months');
        $query              = $mnths->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $mnths = $query->toArray();

        // todo: for districts
        $distrcts    = TableRegistry::get('secc_districts');
        $query              = $distrcts->find('list', [
            'keyField'      => 'rgi_district_code',
            'valueField'    => 'name'
        ]);
        $distrcts = $query->toArray();

        // todo: for blocks
        $blocks    = TableRegistry::get('secc_blocks');
        $query              = $blocks->find('list', [
            'keyField'      => 'rgi_block_code',
            'valueField'    => 'name',
            'conditions'=>['secc_blocks.rgi_district_code='."'".$dist."'"]
        ]);
        $blocks = $query->toArray();
        //echo "<pre>"; print_r($blocks); "<pre>"; die;

        // todo: for Items
        $items    = TableRegistry::get('Items');
        $query              = $items->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
        ]);
        $items = $query->toArray();

        // todo: for cardType
        if($form_id == 3){      // if phh
            $cardTypeId = 5;
        }else if($form_id == 7){    //if aay
            $cardTypeId = 6;
        }else{
            $cardTypeId = '';
        }
        $cards    = TableRegistry::get('Cardtypes');
        $query              = $cards->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Cardtypes.id='."'".$cardTypeId."'"]
        ]);
        $cards = $query->toArray();

        $districtName   = $distrcts[$dist];
        $year_id        = $years[$year];
        $dmfSmfData     = [];
        $dmfSmfBlkData  = [];
        $frez           = [];
        $data           = [];
        $id             = '';


        if($this->getRequest()->is('post')){
            $request_data       = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; //die;
            if(array_key_exists('id', $request_data)){
                $id = $request_data['id'];
            }else{
                $id = '';
            }



            if(isset($id) && !empty($id)){
                // update part
                $getData = $connection->prepare("select rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, form_code_id, mapped_form_id, item_id, card_type_id, yojna, entry_level, formCodeName, total_allocated_amount, previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount, current_month_quantity, current_month_payable_amount, current_month_paid_amount, total_expenses, allocated_amount_balance, freeze, created, created_by, verified, verified_by from secy_dmf_smf_blocks where id=?");
                $getData->bindValue(1, $id);
                $getData->execute();
                $rsData = $getData->fetchAll('assoc');
                if(!empty($rsData)){
                    $data = $rsData[0];
                }
            }else{
                // insert Part
                $block                      = $request_data['blocks'];
                $item                       = $request_data['items'];
                $card                       = $request_data['card'];
                $dsdQuantity1               = $request_data['dsdQuantity1'];
                $forPay1                    = $request_data['forPay1'];
                $toPay1                     = $request_data['toPay1'];
                $dsdQuantity2               = $request_data['dsdQuantity2'];
                $forPay2                    = $request_data['forPay2'];
                $toPay2                     = $request_data['toPay2'];
                $mapped_form_id             = $this->getMappedFormId($form_id);
                $yojna                      = 3;
                if($groupId == 12){ $entry_level = 2; }else{ $entry_level = 1;}
                $created                    = date('Y-m-d H:i:s');
                $freeze                     = 0;
                $verified                   = date('Y-m-d H:i:s');
                $verified_by                = 0;
                $total_expenses             = (($forPay1 + $toPay1) + ($forPay2 + $toPay2));
                $allocated_amount_balance   = $dsdQuantity1 + $dsdQuantity2;
                $total_allocated_amount     = $dsdQuantity1 + $dsdQuantity2;
                $blockName                  = $blocks[$block];

                // insert
                $insertData =$connection->prepare("insert into secy_dmf_smf_blocks (rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, form_code_id, mapped_form_id, item_id, card_type_id, yojna, entry_level, formCodeName, total_allocated_amount, previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount, current_month_quantity, current_month_payable_amount, current_month_paid_amount, total_expenses, allocated_amount_balance, freeze, created, created_by, verified, verified_by) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

                //$insertData->bindValue(1,);
                $insertData->bindValue(1,$dist);
                $insertData->bindValue(2,$districtName);
                $insertData->bindValue(3,$blok);
                $insertData->bindValue(4,$blockName);
                $insertData->bindValue(5,$month);
                $insertData->bindValue(6,$year_id);
                $insertData->bindValue(7,$form_id);
                $insertData->bindValue(8,$mapped_form_id);
                $insertData->bindValue(9,$item);
                $insertData->bindValue(10,$card);
                $insertData->bindValue(11,$yojna);
                $insertData->bindValue(12,$entry_level);
                $insertData->bindValue(13,$form_name);
                $insertData->bindValue(14,$total_allocated_amount);
                $insertData->bindValue(15,$dsdQuantity1);
                $insertData->bindValue(16,$forPay1);
                $insertData->bindValue(17,$toPay1);
                $insertData->bindValue(18,$dsdQuantity2);
                $insertData->bindValue(19,$forPay2);
                $insertData->bindValue(20,$toPay2);
                $insertData->bindValue(21,$total_expenses);
                $insertData->bindValue(22,$allocated_amount_balance);
                $insertData->bindValue(23,$freeze);
                $insertData->bindValue(24,$created);
                $insertData->bindValue(25,$user_id);
                $insertData->bindValue(26,$verified);
                $insertData->bindValue(27,$verified_by);

                $insert = $insertData->execute();

                if($insert){
                    $this->Flash->success(__('The secy dmf smf block has been saved.'));
                    return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
                }else{
                    $this->Flash->error(__('Sorry !... The secy dmf smf block has not been saved.'));
                    return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
                }
            }


        }else{

            //echo "select id,item_id,rgi_district_code,rgi_block_code,previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount,current_month_quantity, current_month_payable_amount, current_month_paid_amount from secy_dmf_smf_blocks where form_code_id='$form_id' and month_id='$month' and year_id='$year_id' and rgi_district_code='$dist'";die;

            $dmfSmfBlkDataQry = $connection->prepare("select id,item_id,rgi_district_code,rgi_block_code,previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount,current_month_quantity, current_month_payable_amount, current_month_paid_amount from secy_dmf_smf_blocks where form_code_id=? and month_id=? and year_id=? and rgi_district_code=?");
            $dmfSmfBlkDataQry->bindValue(1, $form_id);
            $dmfSmfBlkDataQry->bindValue(2, $month);
            $dmfSmfBlkDataQry->bindValue(3, $year_id);
            $dmfSmfBlkDataQry->bindValue(4, $dist);
            $dmfSmfBlkDataQry->execute();
            $dmfSmfBlkData = $dmfSmfBlkDataQry->fetchAll('assoc');
            if(!empty($dmfSmfBlkData)){
                $rgiBlkCode = $dmfSmfBlkData[0]['rgi_block_code']; //die;
            }else{
                $rgiBlkCode = '';
            }
        }

        $this->set(compact('form_id','month','year','formName','mnths','form_name','distrcts','dist','blocks','items','cards','dmfSmfData','dmfSmfBlkData','formNameHn','frez','data','id'));
    }

    public function updateSmfDmfBlocks(){
        $connection                 = ConnectionManager::get('default');
        $session_data               = $this->getRequest()->getSession()->read();
        $user_id                    = $session_data['Auth']['User']['id'];
        $groupId                    = $session_data['Auth']['User']['group_id'];
        $dist                       = $session_data['Auth']['User']['rgi_district_code'];
        $blok                       = $session_data['Auth']['User']['rgi_block_code'];
        $groups                     = [12,20];

        if(!in_array($groupId, $groups)){
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller'=>'Users','action' => 'logout']);
        }

        if(!empty($session_data['FormData']) && isset($session_data['FormData'])){
            $formData   = $session_data['FormData'];
            $form_id    = base64_decode($formData['formId']);
            $form_name  = base64_decode($formData['formNamee']);
            $month      = base64_decode($formData['monthId']);
            $year       = base64_decode($formData['yearId']);
            $formNameHn = base64_decode($formData['formNameHn']);
        }else{
            $form_id = '';
            $month = '';
            $year = '';
            $form_name = '';
            $formNameHn = '';
        }

        // todo: for fornName
        $formName    = TableRegistry::get('secy_dept_form_masters');
        $query             = $formName->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $formName = $query->toArray();

        // todo: for years
        $years    = TableRegistry::get('years');
        $query              = $years->find('list', [
            'keyField'      => 'name',
            'valueField'    => 'id'
        ]);
        $years = $query->toArray();

        // todo: for monthName
        $mnths    = TableRegistry::get('months');
        $query              = $mnths->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $mnths = $query->toArray();
        // todo: for districts
        $distrcts    = TableRegistry::get('secc_districts');
        $query              = $distrcts->find('list', [
            'keyField'      => 'rgi_district_code',
            'valueField'    => 'name'
        ]);
        $distrcts = $query->toArray();

        // todo: for blocks
        $blocks    = TableRegistry::get('secc_blocks');
        $query              = $blocks->find('list', [
            'keyField'      => 'rgi_block_code',
            'valueField'    => 'name',
            'conditions'=>['secc_blocks.rgi_district_code='."'".$dist."'"]
        ]);
        $blocks = $query->toArray();

        // todo: for cardType
        if($form_id == 3){      // if phh
            $cardTypeId = 5;
        }else if($form_id == 7){    //if aay
            $cardTypeId = 6;
        }else{
            $cardTypeId = '';
        }


        $districtName = $distrcts[$dist];
        $year_id = $years[$year];

        if($this->getRequest()->is('post')){
            $request_data       = $this->getRequest()->getData();
            //echo "<pre>"; print_r($request_data); "<pre>"; die;
            $block                      = $request_data['blocks'];
            $item                       = $request_data['items'];
            $card                       = $request_data['card'];
            $dsdQuantity1               = $request_data['dsdQuantity1'];
            $forPay1                    = $request_data['forPay1'];
            $toPay1                     = $request_data['toPay1'];
            $dsdQuantity2               = $request_data['dsdQuantity2'];
            $forPay2                    = $request_data['forPay2'];
            $toPay2                     = $request_data['toPay2'];
            $mapped_form_id             = 1;
            $yojna                      = 3;
            $entry_level                = 3;
            $created                    = date('Y-m-d H:i:s');
            $freeze                     = 0;
            $verified                   = date('Y-m-d H:i:s');
            $verified_by                = 0;
            $total_expenses             = (($forPay1 + $toPay1) + ($forPay2 + $toPay2));
            $allocated_amount_balance   = $dsdQuantity1 + $dsdQuantity2;
            $total_allocated_amount     = $dsdQuantity1 + $dsdQuantity2;
            $blockName                  = $blocks[$block];

            $UpdateData =$connection->prepare("Update secy_dmf_smf_blocks set rgi_district_code =?, districtName=?, rgi_block_code=?, blockName=?, month_id=?, year_id =?, form_code_id=?, mapped_form_id=?, item_id=?, card_type_id=?, yojna=?, entry_level=?, formCodeName=?, total_allocated_amount=?, previous_month_quantity=?, previous_month_payable_amount=?, previous_month_paid_amount=?, current_month_quantity=?, current_month_payable_amount=?, current_month_paid_amount=?, total_expenses=?, allocated_amount_balance=?, freeze=?, created=?, created_by=?, verified=?, verified_by=?");

            //$insertData->bindValue(1,);
            $UpdateData->bindValue(1,$dist);
            $UpdateData->bindValue(2,$districtName);
            $UpdateData->bindValue(3,$block);
            $UpdateData->bindValue(4,$blockName);
            $UpdateData->bindValue(5,$month);
            $UpdateData->bindValue(6,$year_id);
            $UpdateData->bindValue(7,$form_id);
            $UpdateData->bindValue(8,$mapped_form_id);
            $UpdateData->bindValue(9,$item);
            $UpdateData->bindValue(10,$card);
            $UpdateData->bindValue(11,$yojna);
            $UpdateData->bindValue(12,$entry_level);
            $UpdateData->bindValue(13,$form_name);
            $UpdateData->bindValue(14,$total_allocated_amount);
            $UpdateData->bindValue(15,$dsdQuantity1);
            $UpdateData->bindValue(16,$forPay1);
            $UpdateData->bindValue(17,$toPay1);
            $UpdateData->bindValue(18,$dsdQuantity2);
            $UpdateData->bindValue(19,$forPay2);
            $UpdateData->bindValue(20,$toPay2);
            $UpdateData->bindValue(21,$total_expenses);
            $UpdateData->bindValue(22,$allocated_amount_balance);
            $UpdateData->bindValue(23,$freeze);
            $UpdateData->bindValue(24,$created);
            $UpdateData->bindValue(25,$user_id);
            $UpdateData->bindValue(26,$verified);
            $UpdateData->bindValue(27,$verified_by);

            $Update = $UpdateData->execute();

            if($Update){
                $this->Flash->success(__('The secy dmf smf block has been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
            }else{
                $this->Flash->error(__('Sorry !... The secy dmf smf block has not been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
            }
        }
    }

    public function addDmfPhhPvtg()
    {
        $connection                 = ConnectionManager::get('default');
        $session_data               = $this->getRequest()->getSession()->read();
        $user_id                    = $session_data['Auth']['User']['id'];
        $groupId                    = $session_data['Auth']['User']['group_id'];
        $dist                       = $session_data['Auth']['User']['rgi_district_code'];
        $blok                       = $session_data['Auth']['User']['rgi_block_code'];
        $groups                     = [12,20];

        if(!in_array($groupId, $groups)){
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller'=>'Users','action' => 'logout']);
        }

        if(!empty($session_data['FormData']) && isset($session_data['FormData'])){
            $formData       = $session_data['FormData'];
            $form_id        = base64_decode($formData['formId']);
            $form_name      = base64_decode($formData['formNamee']);
            $month          = base64_decode($formData['monthId']);
            $year           = base64_decode($formData['yearId']);
            $formNameHn     = base64_decode($formData['formNameHn']);
        }else{
            $form_id    = '';
            $month      = '';
            $year       = '';
            $form_name  = '';
            $formNameHn = '';
        }

        // todo: for fornName
        $formName    = TableRegistry::get('secy_dept_form_masters');
        $query             = $formName->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $formName = $query->toArray();

        // todo: for years
        $years    = TableRegistry::get('years');
        $query              = $years->find('list', [
            'keyField'      => 'name',
            'valueField'    => 'id'
        ]);
        $years = $query->toArray();

        // todo: for monthName
        $mnths    = TableRegistry::get('months');
        $query              = $mnths->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $mnths = $query->toArray();

        // todo: for districts
        $distrcts    = TableRegistry::get('secc_districts');
        $query              = $distrcts->find('list', [
            'keyField'      => 'rgi_district_code',
            'valueField'    => 'name'
        ]);
        $distrcts = $query->toArray();

        // todo: for blocks
        $blocks    = TableRegistry::get('secc_blocks');
        $query              = $blocks->find('list', [
            'keyField'      => 'rgi_block_code',
            'valueField'    => 'name',
            'conditions'=>['secc_blocks.rgi_district_code='."'".$dist."'"]
        ]);
        $blocks = $query->toArray();
        //echo "<pre>"; print_r($blocks); "<pre>"; die;

        // todo: for Items
        if($form_id == 22){      // if phh
            $item = 1;
        }
        else if ($form_id == 23) {
            $item = 1;
        }

        $items    = TableRegistry::get('Items');
        $query              = $items->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Items.id='."'".$item."'"]
        ]);
        $items = $query->toArray();

        // todo: for cardType
        if($form_id == 23 || $form_id == 7 || $form_id == 22){      // if phh
            $cardTypeId = 6;
        /*}else if($form_id == 7 || $form_id == 22){    //if aay
            $cardTypeId = 6;*/
        }else{
            $cardTypeId = '';
        }

        $cards    = TableRegistry::get('Cardtypes');
        $query              = $cards->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Cardtypes.id='."'".$cardTypeId."'"]
        ]);
        $cards = $query->toArray();

        $districtName   = $distrcts[$dist];
        $year_id        = $years[$year];
        $dmfSmfData     = [];
        $dmfSmfBlkData  = [];
//        $items = [];

        if($this->getRequest()->is('post')){
            $request_data       = $this->getRequest()->getData();
            echo "<pre>"; print_r($request_data); "<pre>"; die;

            $block                      = $request_data['blocks'];
            $blockName                  = $blocks[$block];
            $item                       = $request_data['items'];
            $card                       = $request_data['card'];
            $lstMnthQuan                = $request_data['lstMnthRstQuantity'];
            $currAlloc                  = $request_data['currAllocation'];
            $packQuant                  = $request_data['packageingQuantity'];
            $totalQuan                  = $request_data['totalQuantity'];
            $benCount                   = $request_data['BenCount'];
            $packCount                  = $request_data['packetCount'];
            $lstMnth                    = $request_data['lstMnth'];
            $currMnth                   = $request_data['currMnth'];
            $total                      = $request_data['total'];
            $remainBal                  = $request_data['remainBalance'];
            $unpaidBenCount             = $request_data['unpaidBenCnt'];
            $created                    = date('Y-m-d H:i:s');
            $verified                   = date('Y-m-d H:i:s');
            $verified_by                = 0;
            $freeze                     = 0;


            if($block == ''){
                echo "Block is Mandatory";
            }
            if($item == ''){
                echo "Item is Mandatory";
            }
            if($card == ''){
                echo "Card Type is Mandatory";
            }
            if($dsdQuantity1 == ''){
                echo "";
            }
            if($forPay1 == ''){
                echo "";
            }
            if($toPay1 == ''){
                echo "";
            }
            if($dsdQuantity2 == ''){
                echo "";
            }
            if($forPay2 == ''){
                echo "";
            }
            if($toPay2 == ''){
                echo "";
            }

            $getPreviousMonthDataQry = $connection->prepare("select previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount,current_month_quantity, current_month_payable_amount, current_month_paid_amount from secy_dmf_smf_blocks where form_code_id=? and month_id=? and year_id=?");
            $getPreviousMonthDataQry->bindValue(1, $form_id);
            $getPreviousMonthDataQry->bindValue(2, $month);
            $getPreviousMonthDataQry->bindValue(3, $year_id);
            $getPreviousMonthDataQry->execute();
            $getPreviousMonthData = $getPreviousMonthDataQry->fetchAll('assoc');
            //echo "<pre>"; print_r($getPreviousMonthData); "<pre>"; die;



            $insertData =$connection->prepare("insert into secy_smfs_pvtgs (rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, form_code_id, item_id, card_type_id, formCodeName, total_allocated_amount, previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount, current_month_quantity, current_month_payable_amount, current_month_paid_amount, total_expenses, allocated_amount_balance, freeze, created, created_by, verified, verified_by) values ($dist,$districtName,$block,$blockName,$month,$year_id,$card,$item,$form_id,$form_name,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
//
            $insertData =$connection->prepare("insert into secy_smfs_pvtgs ( rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, card_type_id, item_id, form_code_id, formCodeName, total_allocation, previous_month_lifting, previous_month_allocation, previous_month_distribution, current_month_lifting, current_month_allocation, current_month_distribution, total_expense, balance, created, created_by, modified, modified_by, freeze) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            //$insertData->bindValue(1,);
            $insertData->bindValue(1,$dist);
            $insertData->bindValue(2,$districtName);
            $insertData->bindValue(3,$block);
            $insertData->bindValue(4,$blockName);
            $insertData->bindValue(5,$month);
            $insertData->bindValue(6,$year_id);
            $insertData->bindValue(7,$card);
            $insertData->bindValue(8,$item);
            $insertData->bindValue(9,$form_id);
            $insertData->bindValue(10,$form_name);
            $insertData->bindValue(11,$total_allocated_amount);
            $insertData->bindValue(12,$dsdQuantity1);
            $insertData->bindValue(13,$forPay1);
            $insertData->bindValue(14,$toPay1);
            $insertData->bindValue(15,$dsdQuantity2);
            $insertData->bindValue(16,$forPay2);
            $insertData->bindValue(17,$toPay2);
            $insertData->bindValue(18,$total_expenses);
            $insertData->bindValue(19,$allocated_amount_balance);
            $insertData->bindValue(20,$created);
            $insertData->bindValue(21,$user_id);
            $insertData->bindValue(22,$verified);
            $insertData->bindValue(23,$verified_by);
            $insertData->bindValue(24,$freeze);

            $insert = $insertData->execute();

            if($insert){
                $this->Flash->success(__('The secy dmf smf block has been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhhPvtg']);
            }else{
                $this->Flash->error(__('Sorry !... The secy dmf smf block has not been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhhPvtg']);
            }


        }else{

            $dmfSmfBlkDataQry = $connection->prepare("select item_id,rgi_district_code,rgi_block_code,previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount,current_month_quantity, current_month_payable_amount, current_month_paid_amount from secy_dmf_smf_blocks where form_code_id=? and month_id=? and year_id=? and rgi_district_code=?");
            $dmfSmfBlkDataQry->bindValue(1, $form_id);
            $dmfSmfBlkDataQry->bindValue(2, $month);
            $dmfSmfBlkDataQry->bindValue(3, $year_id);
            $dmfSmfBlkDataQry->bindValue(4, $dist);
            $dmfSmfBlkDataQry->execute();
            $dmfSmfBlkData = $dmfSmfBlkDataQry->fetchAll('assoc');
            //echo "<pre>"; print_r($dmfSmfBlkData); "<pre>"; die;


//            if(!empty($dmfSmfBlkData)){
//                foreach($dmfSmfBlkData as $dsKey => $dsVal){
//                    $blkKey = $dsVal['rgi_block_code'];
//                    $dmfSmfData[$blkKey] = $dsVal;
//                }
//            }
//            echo "<pre>"; print_r($dmfSmfData); "<pre>"; die;

        }

        $this->set(compact('form_id','month','year','formName','mnths','form_name','distrcts','dist','blocks','items','cards','dmfSmfData','dmfSmfBlkData','formNameHn'));
    }

    public function updateDmfPhhPvtg()
    {

    }

    public function addDmfJscff()
    {
        $connection                 = ConnectionManager::get('default');
        $session_data               = $this->getRequest()->getSession()->read();
        $user_id                    = $session_data['Auth']['User']['id'];
        $groupId                    = $session_data['Auth']['User']['group_id'];
        $dist                       = $session_data['Auth']['User']['rgi_district_code'];
        $blok                       = $session_data['Auth']['User']['rgi_block_code'];
        $groups                     = [12,20];

        if(!in_array($groupId, $groups)){
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller'=>'Users','action' => 'logout']);
        }

        if(!empty($session_data['FormData']) && isset($session_data['FormData'])){
            $formData       = $session_data['FormData'];
            $form_id        = base64_decode($formData['formId']);
            $form_name      = base64_decode($formData['formNamee']);
            $month          = base64_decode($formData['monthId']);
            $year           = base64_decode($formData['yearId']);
            $formNameHn     = base64_decode($formData['formNameHn']);
        }else{
            $form_id = '';
            $month = '';
            $year = '';
            $form_name = '';
            $formNameHn = '';
        }

        // todo: for fornName
        $formName    = TableRegistry::get('secy_dept_form_masters');
        $query             = $formName->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $formName = $query->toArray();

        // todo: for years
        $years    = TableRegistry::get('years');
        $query              = $years->find('list', [
            'keyField'      => 'name',
            'valueField'    => 'id'
        ]);
        $years = $query->toArray();

        // todo: for monthName
        $mnths    = TableRegistry::get('months');
        $query              = $mnths->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $mnths = $query->toArray();

        // todo: for districts
        $distrcts    = TableRegistry::get('secc_districts');
        $query              = $distrcts->find('list', [
            'keyField'      => 'rgi_district_code',
            'valueField'    => 'name'
        ]);
        $distrcts = $query->toArray();

        // todo: for blocks
        $blocks    = TableRegistry::get('secc_blocks');
        $query              = $blocks->find('list', [
            'keyField'      => 'rgi_block_code',
            'valueField'    => 'name',
            'conditions'=>['secc_blocks.rgi_district_code='."'".$dist."'"]
        ]);
        $blocks = $query->toArray();
        //echo "<pre>"; print_r($blocks); "<pre>"; die;

        // todo: for Items
        /*if($form_id == 22){      // if phh
            $item = 1;
        }*/

        /*$items    = TableRegistry::get('Items');
        $query              = $items->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
//            'conditions'=>['Items.id='."'".$item."'"]
        ]);
        $items = $query->toArray();

        // todo: for cardType
        if($form_id == 3){      // if phh
            $cardTypeId = 5;
        }else if($form_id == 7 || $form_id == 22){    //if aay
            $cardTypeId = 6;
        }else{
            $cardTypeId = '';
        }

        $cards    = TableRegistry::get('Cardtypes');
        $query              = $cards->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Cardtypes.id='."'".$cardTypeId."'"]
        ]);
        $cards = $query->toArray();*/

        $districtName = $distrcts[$dist];
        $year_id = $years[$year];
        $dmfSmfData = [];
        $dmfSmfBlkData = [];

        if($this->getRequest()->is('post')){
            $request_data       = $this->getRequest()->getData();
            //echo "<pre>"; print_r($request_data); "<pre>"; //die;

            /* $block          = $request_data['blocks'];
             $item           = $request_data['items'];
             $card           = $request_data['card'];
             $dsdQuantity1   = $request_data['dsdQuantity1'];
             $forPay1        = $request_data['forPay1'];
             $toPay1         = $request_data['toPay1'];
             $dsdQuantity2   = $request_data['dsdQuantity2'];
             $forPay2        = $request_data['forPay2'];
             $toPay2         = $request_data['toPay2'];
           /*$mapped_form_id = 1;
             $yojna = 3;
             $entry_level = 3;
             $created = date('Y-m-d H:i:s');
             $freeze = 0;
             $verified = date('Y-m-d H:i:s');
             $verified_by = 0;
             $total_expenses = (($forPay1 + $toPay1) + ($forPay2 + $toPay2));
             $allocated_amount_balance = $dsdQuantity1 + $dsdQuantity2;
             $total_allocated_amount = $dsdQuantity1 + $dsdQuantity2;
             $blockName = $blocks[$block];*/

            /*if($block == ''){
                echo "Block is Mandatory";
            }
            if($item == ''){
                echo "Item is Mandatory";
            }
            if($card == ''){
                echo "Card Type is Mandatory";
            }
            if($dsdQuantity1 == ''){
                echo "";
            }
            if($forPay1 == ''){
                echo "";
            }
            if($toPay1 == ''){
                echo "";
            }
            if($dsdQuantity2 == ''){
                echo "";
            }
            if($forPay2 == ''){
                echo "";
            }
            if($toPay2 == ''){
                echo "";
            }*/



            /*$insertData =$connection->prepare("insert into secy_smfs_pvtgs (rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, form_code_id, mapped_form_id, item_id, card_type_id, yojna, entry_level, formCodeName, total_allocated_amount, previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount, current_month_quantity, current_month_payable_amount, current_month_paid_amount, total_expenses, allocated_amount_balance, freeze, created, created_by, verified, verified_by) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            //$insertData->bindValue(1,);
            $insertData->bindValue(1,$dist);
            $insertData->bindValue(2,$districtName);
            $insertData->bindValue(3,$blok);
            $insertData->bindValue(4,$blockName);
            $insertData->bindValue(5,$month);
            $insertData->bindValue(6,$year_id);
            $insertData->bindValue(7,$form_id);
            $insertData->bindValue(8,$mapped_form_id);
            $insertData->bindValue(9,$item);
            $insertData->bindValue(10,$card);
            $insertData->bindValue(11,$yojna);
            $insertData->bindValue(12,$entry_level);
            $insertData->bindValue(13,$form_name);
            $insertData->bindValue(14,$total_allocated_amount);
            $insertData->bindValue(15,$dsdQuantity1);
            $insertData->bindValue(16,$forPay1);
            $insertData->bindValue(17,$toPay1);
            $insertData->bindValue(18,$dsdQuantity2);
            $insertData->bindValue(19,$forPay2);
            $insertData->bindValue(20,$toPay2);
            $insertData->bindValue(21,$total_expenses);
            $insertData->bindValue(22,$allocated_amount_balance);
            $insertData->bindValue(23,$freeze);
            $insertData->bindValue(24,$created);
            $insertData->bindValue(25,$user_id);
            $insertData->bindValue(26,$verified);
            $insertData->bindValue(27,$verified_by);

            $insert = $insertData->execute();

            if($insert){
                $this->Flash->success(__('The secy dmf smf block has been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
            }else{
                $this->Flash->error(__('Sorry !... The secy dmf smf block has not been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
            }


        }else{

            $dmfSmfBlkDataQry = $connection->prepare("select item_id,rgi_district_code,rgi_block_code,previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount,current_month_quantity, current_month_payable_amount, current_month_paid_amount from secy_dmf_smf_blocks where form_code_id=? and month_id=? and year_id=? and rgi_district_code=?");
            $dmfSmfBlkDataQry->bindValue(1, $form_id);
            $dmfSmfBlkDataQry->bindValue(2, $month);
            $dmfSmfBlkDataQry->bindValue(3, $year_id);
            $dmfSmfBlkDataQry->bindValue(4, $dist);
            $dmfSmfBlkDataQry->execute();
            $dmfSmfBlkData = $dmfSmfBlkDataQry->fetchAll('assoc');*/
            //echo "<pre>"; print_r($dmfSmfBlkData); "<pre>"; die;


//            if(!empty($dmfSmfBlkData)){
//                foreach($dmfSmfBlkData as $dsKey => $dsVal){
//                    $blkKey = $dsVal['rgi_block_code'];
//                    $dmfSmfData[$blkKey] = $dsVal;
//                }
//            }
//            echo "<pre>"; print_r($dmfSmfData); "<pre>"; die;

        }

        $this->set(compact('form_id','month','year','formName','mnths','form_name','distrcts','dist','blocks','dmfSmfData','dmfSmfBlkData','formNameHn'));
    }

    public function addDmfAnnapurna()
    {
        $connection                 = ConnectionManager::get('default');
        $session_data               = $this->getRequest()->getSession()->read();
        $user_id                    = $session_data['Auth']['User']['id'];
        $groupId                    = $session_data['Auth']['User']['group_id'];
        $dist                       = $session_data['Auth']['User']['rgi_district_code'];
        $blok                       = $session_data['Auth']['User']['rgi_block_code'];
        $groups                     = [12,20];

        if(!in_array($groupId, $groups)){
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller'=>'Users','action' => 'logout']);
        }

        if(!empty($session_data['FormData']) && isset($session_data['FormData'])){
            $formData       = $session_data['FormData'];
            $form_id        = base64_decode($formData['formId']);
            $form_name      = base64_decode($formData['formNamee']);
            $month          = base64_decode($formData['monthId']);
            $year           = base64_decode($formData['yearId']);
            $formNameHn     = base64_decode($formData['formNameHn']);
        }else{
            $form_id = '';
            $month = '';
            $year = '';
            $form_name = '';
            $formNameHn = '';
        }

        // todo: for fornName
        $formName    = TableRegistry::get('secy_dept_form_masters');
        $query             = $formName->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $formName = $query->toArray();

        // todo: for years
        $years    = TableRegistry::get('years');
        $query              = $years->find('list', [
            'keyField'      => 'name',
            'valueField'    => 'id'
        ]);
        $years = $query->toArray();

        // todo: for monthName
        $mnths    = TableRegistry::get('months');
        $query              = $mnths->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $mnths = $query->toArray();

        // todo: for districts
        $distrcts    = TableRegistry::get('secc_districts');
        $query              = $distrcts->find('list', [
            'keyField'      => 'rgi_district_code',
            'valueField'    => 'name'
        ]);
        $distrcts = $query->toArray();

        // todo: for blocks
        $blocks    = TableRegistry::get('secc_blocks');
        $query              = $blocks->find('list', [
            'keyField'      => 'rgi_block_code',
            'valueField'    => 'name',
            'conditions'=>['secc_blocks.rgi_district_code='."'".$dist."'"]
        ]);
        $blocks = $query->toArray();
        //echo "<pre>"; print_r($blocks); "<pre>"; die;

        // todo: for Items
        if($form_id == 28){      // if phh
            $item = 1 && $item = 2;
        }

        $items    = TableRegistry::get('Items');
        $query              = $items->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Items.id='."'".$item."'"]
        ]);
        $items = $query->toArray();
/*
        // todo: for cardType
        if($form_id == 3){      // if phh
            $cardTypeId = 5;
        }else if($form_id == 7 || $form_id == 22){    //if aay
            $cardTypeId = 6;
        }else{
            $cardTypeId = '';
        }

        $cards    = TableRegistry::get('Cardtypes');
        $query              = $cards->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Cardtypes.id='."'".$cardTypeId."'"]
        ]);
        $cards = $query->toArray();*/

        $districtName = $distrcts[$dist];
        $year_id = $years[$year];
        $dmfSmfData = [];
        $dmfSmfBlkData = [];

        if($this->getRequest()->is('post')){
            $request_data       = $this->getRequest()->getData();
            //echo "<pre>"; print_r($request_data); "<pre>"; //die;

            /* $block          = $request_data['blocks'];
             $item           = $request_data['items'];
             $card           = $request_data['card'];
             $dsdQuantity1   = $request_data['dsdQuantity1'];
             $forPay1        = $request_data['forPay1'];
             $toPay1         = $request_data['toPay1'];
             $dsdQuantity2   = $request_data['dsdQuantity2'];
             $forPay2        = $request_data['forPay2'];
             $toPay2         = $request_data['toPay2'];
           /*$mapped_form_id = 1;
             $yojna = 3;
             $entry_level = 3;
             $created = date('Y-m-d H:i:s');
             $freeze = 0;
             $verified = date('Y-m-d H:i:s');
             $verified_by = 0;
             $total_expenses = (($forPay1 + $toPay1) + ($forPay2 + $toPay2));
             $allocated_amount_balance = $dsdQuantity1 + $dsdQuantity2;
             $total_allocated_amount = $dsdQuantity1 + $dsdQuantity2;
             $blockName = $blocks[$block];*/

            /*if($block == ''){
                echo "Block is Mandatory";
            }
            if($item == ''){
                echo "Item is Mandatory";
            }
            if($card == ''){
                echo "Card Type is Mandatory";
            }
            if($dsdQuantity1 == ''){
                echo "";
            }
            if($forPay1 == ''){
                echo "";
            }
            if($toPay1 == ''){
                echo "";
            }
            if($dsdQuantity2 == ''){
                echo "";
            }
            if($forPay2 == ''){
                echo "";
            }
            if($toPay2 == ''){
                echo "";
            }*/



            /*$insertData =$connection->prepare("insert into secy_smfs_pvtgs (rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, form_code_id, mapped_form_id, item_id, card_type_id, yojna, entry_level, formCodeName, total_allocated_amount, previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount, current_month_quantity, current_month_payable_amount, current_month_paid_amount, total_expenses, allocated_amount_balance, freeze, created, created_by, verified, verified_by) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            //$insertData->bindValue(1,);
            $insertData->bindValue(1,$dist);
            $insertData->bindValue(2,$districtName);
            $insertData->bindValue(3,$blok);
            $insertData->bindValue(4,$blockName);
            $insertData->bindValue(5,$month);
            $insertData->bindValue(6,$year_id);
            $insertData->bindValue(7,$form_id);
            $insertData->bindValue(8,$mapped_form_id);
            $insertData->bindValue(9,$item);
            $insertData->bindValue(10,$card);
            $insertData->bindValue(11,$yojna);
            $insertData->bindValue(12,$entry_level);
            $insertData->bindValue(13,$form_name);
            $insertData->bindValue(14,$total_allocated_amount);
            $insertData->bindValue(15,$dsdQuantity1);
            $insertData->bindValue(16,$forPay1);
            $insertData->bindValue(17,$toPay1);
            $insertData->bindValue(18,$dsdQuantity2);
            $insertData->bindValue(19,$forPay2);
            $insertData->bindValue(20,$toPay2);
            $insertData->bindValue(21,$total_expenses);
            $insertData->bindValue(22,$allocated_amount_balance);
            $insertData->bindValue(23,$freeze);
            $insertData->bindValue(24,$created);
            $insertData->bindValue(25,$user_id);
            $insertData->bindValue(26,$verified);
            $insertData->bindValue(27,$verified_by);

            $insert = $insertData->execute();

            if($insert){
                $this->Flash->success(__('The secy dmf smf block has been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
            }else{
                $this->Flash->error(__('Sorry !... The secy dmf smf block has not been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
            }


        }else{

            $dmfSmfBlkDataQry = $connection->prepare("select item_id,rgi_district_code,rgi_block_code,previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount,current_month_quantity, current_month_payable_amount, current_month_paid_amount from secy_dmf_smf_blocks where form_code_id=? and month_id=? and year_id=? and rgi_district_code=?");
            $dmfSmfBlkDataQry->bindValue(1, $form_id);
            $dmfSmfBlkDataQry->bindValue(2, $month);
            $dmfSmfBlkDataQry->bindValue(3, $year_id);
            $dmfSmfBlkDataQry->bindValue(4, $dist);
            $dmfSmfBlkDataQry->execute();
            $dmfSmfBlkData = $dmfSmfBlkDataQry->fetchAll('assoc');*/
            //echo "<pre>"; print_r($dmfSmfBlkData); "<pre>"; die;


//            if(!empty($dmfSmfBlkData)){
//                foreach($dmfSmfBlkData as $dsKey => $dsVal){
//                    $blkKey = $dsVal['rgi_block_code'];
//                    $dmfSmfData[$blkKey] = $dsVal;
//                }
//            }
//            echo "<pre>"; print_r($dmfSmfData); "<pre>"; die;

        }

        $this->set(compact('form_id','month','year','formName','mnths','form_name','distrcts','items','dist','blocks','dmfSmfData','dmfSmfBlkData','formNameHn'));
    }

    public function addDmfSugar()
    {
        $connection                 = ConnectionManager::get('default');
        $session_data               = $this->getRequest()->getSession()->read();
        $user_id                    = $session_data['Auth']['User']['id'];
        $groupId                    = $session_data['Auth']['User']['group_id'];
        $dist                       = $session_data['Auth']['User']['rgi_district_code'];
        $blok                       = $session_data['Auth']['User']['rgi_block_code'];
        $groups                     = [12,20];

        if(!in_array($groupId, $groups)){
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller'=>'Users','action' => 'logout']);
        }

        if(!empty($session_data['FormData']) && isset($session_data['FormData'])){
            $formData       = $session_data['FormData'];
            $form_id        = base64_decode($formData['formId']);
            $form_name      = base64_decode($formData['formNamee']);
            $month          = base64_decode($formData['monthId']);
            $year           = base64_decode($formData['yearId']);
            $formNameHn     = base64_decode($formData['formNameHn']);
        }else{
            $form_id = '';
            $month = '';
            $year = '';
            $form_name = '';
            $formNameHn = '';
        }

        // todo: for fornName
        $formName    = TableRegistry::get('secy_dept_form_masters');
        $query             = $formName->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $formName = $query->toArray();

        // todo: for years
        $years    = TableRegistry::get('years');
        $query              = $years->find('list', [
            'keyField'      => 'name',
            'valueField'    => 'id'
        ]);
        $years = $query->toArray();

        // todo: for monthName
        $mnths    = TableRegistry::get('months');
        $query              = $mnths->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $mnths = $query->toArray();

        // todo: for districts
        $distrcts    = TableRegistry::get('secc_districts');
        $query              = $distrcts->find('list', [
            'keyField'      => 'rgi_district_code',
            'valueField'    => 'name'
        ]);
        $distrcts = $query->toArray();

        // todo: for blocks
        $blocks    = TableRegistry::get('secc_blocks');
        $query              = $blocks->find('list', [
            'keyField'      => 'rgi_block_code',
            'valueField'    => 'name',
            'conditions'=>['secc_blocks.rgi_district_code='."'".$dist."'"]
        ]);
        $blocks = $query->toArray();
        //echo "<pre>"; print_r($blocks); "<pre>"; die;

        // todo: for Items
        if($form_id == 47){      // if phh
            $item = 5 ;
        }

        $items    = TableRegistry::get('Items');
        $query              = $items->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Items.id='."'".$item."'"]
        ]);
        $items = $query->toArray();
/*
        // todo: for cardType
        if($form_id == 3){      // if phh
            $cardTypeId = 5;
        }else if($form_id == 7 || $form_id == 22){    //if aay
            $cardTypeId = 6;
        }else{
            $cardTypeId = '';
        }

        $cards    = TableRegistry::get('Cardtypes');
        $query              = $cards->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Cardtypes.id='."'".$cardTypeId."'"]
        ]);
        $cards = $query->toArray();*/

        $districtName = $distrcts[$dist];
        $year_id = $years[$year];
        $dmfSmfData = [];
        $dmfSmfBlkData = [];
//        $items =[];

        if($this->getRequest()->is('post')){
            $request_data       = $this->getRequest()->getData();
            //echo "<pre>"; print_r($request_data); "<pre>"; //die;

            /* $block          = $request_data['blocks'];
             $item           = $request_data['items'];
             $card           = $request_data['card'];
             $dsdQuantity1   = $request_data['dsdQuantity1'];
             $forPay1        = $request_data['forPay1'];
             $toPay1         = $request_data['toPay1'];
             $dsdQuantity2   = $request_data['dsdQuantity2'];
             $forPay2        = $request_data['forPay2'];
             $toPay2         = $request_data['toPay2'];
           /*$mapped_form_id = 1;
             $yojna = 3;
             $entry_level = 3;
             $created = date('Y-m-d H:i:s');
             $freeze = 0;
             $verified = date('Y-m-d H:i:s');
             $verified_by = 0;
             $total_expenses = (($forPay1 + $toPay1) + ($forPay2 + $toPay2));
             $allocated_amount_balance = $dsdQuantity1 + $dsdQuantity2;
             $total_allocated_amount = $dsdQuantity1 + $dsdQuantity2;
             $blockName = $blocks[$block];*/

            /*if($block == ''){
                echo "Block is Mandatory";
            }
            if($item == ''){
                echo "Item is Mandatory";
            }
            if($card == ''){
                echo "Card Type is Mandatory";
            }
            if($dsdQuantity1 == ''){
                echo "";
            }
            if($forPay1 == ''){
                echo "";
            }
            if($toPay1 == ''){
                echo "";
            }
            if($dsdQuantity2 == ''){
                echo "";
            }
            if($forPay2 == ''){
                echo "";
            }
            if($toPay2 == ''){
                echo "";
            }*/



            /*$insertData =$connection->prepare("insert into secy_smfs_pvtgs (rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, form_code_id, mapped_form_id, item_id, card_type_id, yojna, entry_level, formCodeName, total_allocated_amount, previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount, current_month_quantity, current_month_payable_amount, current_month_paid_amount, total_expenses, allocated_amount_balance, freeze, created, created_by, verified, verified_by) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            //$insertData->bindValue(1,);
            $insertData->bindValue(1,$dist);
            $insertData->bindValue(2,$districtName);
            $insertData->bindValue(3,$blok);
            $insertData->bindValue(4,$blockName);
            $insertData->bindValue(5,$month);
            $insertData->bindValue(6,$year_id);
            $insertData->bindValue(7,$form_id);
            $insertData->bindValue(8,$mapped_form_id);
            $insertData->bindValue(9,$item);
            $insertData->bindValue(10,$card);
            $insertData->bindValue(11,$yojna);
            $insertData->bindValue(12,$entry_level);
            $insertData->bindValue(13,$form_name);
            $insertData->bindValue(14,$total_allocated_amount);
            $insertData->bindValue(15,$dsdQuantity1);
            $insertData->bindValue(16,$forPay1);
            $insertData->bindValue(17,$toPay1);
            $insertData->bindValue(18,$dsdQuantity2);
            $insertData->bindValue(19,$forPay2);
            $insertData->bindValue(20,$toPay2);
            $insertData->bindValue(21,$total_expenses);
            $insertData->bindValue(22,$allocated_amount_balance);
            $insertData->bindValue(23,$freeze);
            $insertData->bindValue(24,$created);
            $insertData->bindValue(25,$user_id);
            $insertData->bindValue(26,$verified);
            $insertData->bindValue(27,$verified_by);

            $insert = $insertData->execute();

            if($insert){
                $this->Flash->success(__('The secy dmf smf block has been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
            }else{
                $this->Flash->error(__('Sorry !... The secy dmf smf block has not been saved.'));
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
            }


        }else{

            $dmfSmfBlkDataQry = $connection->prepare("select item_id,rgi_district_code,rgi_block_code,previous_month_quantity, previous_month_payable_amount, previous_month_paid_amount,current_month_quantity, current_month_payable_amount, current_month_paid_amount from secy_dmf_smf_blocks where form_code_id=? and month_id=? and year_id=? and rgi_district_code=?");
            $dmfSmfBlkDataQry->bindValue(1, $form_id);
            $dmfSmfBlkDataQry->bindValue(2, $month);
            $dmfSmfBlkDataQry->bindValue(3, $year_id);
            $dmfSmfBlkDataQry->bindValue(4, $dist);
            $dmfSmfBlkDataQry->execute();
            $dmfSmfBlkData = $dmfSmfBlkDataQry->fetchAll('assoc');*/
            //echo "<pre>"; print_r($dmfSmfBlkData); "<pre>"; die;


//            if(!empty($dmfSmfBlkData)){
//                foreach($dmfSmfBlkData as $dsKey => $dsVal){
//                    $blkKey = $dsVal['rgi_block_code'];
//                    $dmfSmfData[$blkKey] = $dsVal;
//                }
//            }
//            echo "<pre>"; print_r($dmfSmfData); "<pre>"; die;

        }

        $this->set(compact('form_id','month','year','formName','mnths','form_name','distrcts','items','dist','blocks','dmfSmfData','dmfSmfBlkData','formNameHn'));
    }

    public function addDmpForm()
    {
        $connection                 = ConnectionManager::get('default');
        $session_data               = $this->getRequest()->getSession()->read();
        $user_id                    = $session_data['Auth']['User']['id'];
        $groupId                    = $session_data['Auth']['User']['group_id'];
        $dist                       = $session_data['Auth']['User']['rgi_district_code'];
        $blok                       = $session_data['Auth']['User']['rgi_block_code'];
        $groups                     = [12,20];

        if(!in_array($groupId, $groups)){
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller'=>'Users','action' => 'logout']);
        }

        if(!empty($session_data['FormData']) && isset($session_data['FormData'])){
            $formData   = $session_data['FormData'];
            $form_id    = base64_decode($formData['formId']);
            $form_name  = base64_decode($formData['formNamee']);
            $month      = base64_decode($formData['monthId']);
            $year       = base64_decode($formData['yearId']);
            $formNameHn = base64_decode($formData['formNameHn']);
        }else{
            $form_id = '';
            $month = '';
            $year = '';
            $form_name = '';
            $formNameHn = '';
        }

        // for fornName
        $formName    = TableRegistry::get('secy_dept_form_masters');
        $query             = $formName->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $formName = $query->toArray();

        // for years
        $years    = TableRegistry::get('years');
        $query              = $years->find('list', [
            'keyField'      => 'name',
            'valueField'    => 'id'
        ]);
        $years = $query->toArray();

        // for monthName
        $mnths    = TableRegistry::get('months');
        $query              = $mnths->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $mnths = $query->toArray();

        // for districts
        $distrcts    = TableRegistry::get('secc_districts');
        $query              = $distrcts->find('list', [
            'keyField'      => 'rgi_district_code',
            'valueField'    => 'name'
        ]);
        $distrcts = $query->toArray();

        // for blocks
        $blocks    = TableRegistry::get('secc_blocks');
        $query              = $blocks->find('list', [
            'keyField'      => 'rgi_block_code',
            'valueField'    => 'name',
            'conditions'=>['secc_blocks.rgi_district_code='."'".$dist."'"]
        ]);
        $blocks = $query->toArray();
//        echo "<pre>"; print_r($blocks); "<pre>"; die;

        // for Items
        if($form_id == 4 ){      // if phh
            $itmCond = "items.id = 1 OR items.id = 2";
        }
//        else if($form_id == 7){    //if aay
//            $itemId = 6;
//        }
        else{
            $itmCond = '';
        }

        $items    = TableRegistry::get('Items');
        $query              = $items->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'     => [$itmCond]
        ]);
        $items = $query->toArray();

//        echo "<pre>"; print_r($items); "<pre>"; die;

        // for cardType
        if($form_id == 4 ){      // if phh
            $cardTypeId = 5;
        }
        else if($form_id == 8){    //if aay
            $cardTypeId = 6;
        }
        else{
            $cardTypeId = '';
        }
        $cards    = TableRegistry::get('Cardtypes');
        $query              = $cards->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Cardtypes.id='."'".$cardTypeId."'"]
        ]);
        $cards = $query->toArray();

//        echo "<pre>"; print_r($cards); "<pre>"; die;

        $districtName   = $distrcts[$dist];
        $year_id        = $years[$year];
        $dmfSmfData     = [];
        $dmfSmfBlkData  = [];
        $frez           = [];
        $data           = [];
        $id             = '';

        if($this->getRequest()->is('post')) {
            $requestData = $this->getRequest()->getData();
            echo "<pre>"; print_r($requestData); "<pre>"; die;
        }




        $this->set(compact('form_id','month','year','formName','mnths','form_name','distrcts','dist','blocks','items','cards','dmfSmfData','dmfSmfBlkData','formNameHn','frez','data','id'));
    }

    public function mprSumRprt()
    {
        $connection = ConnectionManager::get('default');
//        echo "<pre>"; print_r($this->getRequest()->getSession()->read()); "<pre>"; //die;
        if ($this->request->getSession()->check('Auth')) {
            $user_id            = $this->getRequest()->getSession()->read('Auth.User.id');
            $username           = $this->getRequest()->getSession()->read('Auth.User.username');
            $group_id           = $this->getRequest()->getSession()->read('Auth.User.group_id');
            $rgi_district_code  = $this->getRequest()->getSession()->read('Auth.User.rgi_district_code');
            $rgi_block_code     = $this->getRequest()->getSession()->read('Auth.User.rgi_block_code');
        } else {
            return $this->redirect($this->Auth->logout());
        }
        $this->viewBuilder()->setLayout('default');

        $selectDatas = '';
        $monthId = '';
        $months ='';
        if($this->getRequest()->is('post')) {
            $data       = $this->getRequest()->getData();
//            echo "<pre>"; print_r($data); die;
//            $distCode   = $data['rgi_district_code'];
            $monthYr    = $data['mnthYr'];
            $monthYr    = explode('/',$monthYr);
            $month      = $monthYr[0];
            $year       = $monthYr[1];

            $yearsData = TableRegistry::get('Years');
            $query     = $yearsData->find('list', [
                'keyField'      => 'name',
                'valueField'    => 'id',
                'order'         =>'name'
            ]);
            $years      = $query->toArray();
            $yearId            = $years[$year];

            // fetching months id from months table (key is in app controller)
            $monthsData = TableRegistry::get('Months');
            $query      = $monthsData->find('list', [
                'keyField'      => 'id',
                'valueField'    => 'id',
                'order'         =>'id'
            ]);
            $months     = $query->toArray();
            $monthId    = $months[$month];

//          select data from
            $selectData = $connection->prepare(" select * from secy_mpr_freeze_reports where month_id=? and  year_id =?");
            $selectData->bindValue(1,$monthId);
            $selectData->bindValue(2,$yearId);
            $selectData->execute();
            $selectDatas = $selectData->fetchAll('assoc');

//            echo "<pre>"; print_r($selectDatas); "<pre>"; die;

        }
        $this->set(compact('selectDatas'));

    }
}
