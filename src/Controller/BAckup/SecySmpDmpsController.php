<?php
namespace App\Controller\BAckup;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * SecySmpDmps Controller
 *
 * @property \App\Model\Table\SecySmpDmpsTable $SecySmpDmps
 *
 * @method \App\Model\Entity\SecySmpDmp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SecySmpDmpsController extends AppController
{


    public function forms()
    {
        $connection         = ConnectionManager::get('default');
        $formType    = TableRegistry::get('secy_dept_form_masters');
        $query              = $formType->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'form_name'
        ]);
        $formType = $query->toArray();

        $formNameHnType    = TableRegistry::get('secy_dept_form_masters');
        $query              = $formNameHnType->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name_hn'
        ]);
        $formNameHn = $query->toArray();

        if($this->getRequest()->is('post')){
            $request_data       = $this->getRequest()->getData();
            $form_id            = $request_data['form_id'];
//            echo $formType[$form_id];

            $month_year = $request_data['month_year'];
            $monthYr = explode('/', $month_year);
            $month = (INT)$monthYr[0];
            $year = $monthYr[1];//die();
            $monthName = $connection->prepare("SELECT name FROM months WHERE id=?");
            $monthName->bindValue(1, $month);
            $monthName->execute();
            $month_name = $monthName->fetch('assoc');

            $this->getRequest()->getSession()->write([
                'FormData.formId' => base64_encode($form_id),
                'FormData.formNamee' => base64_encode($formType[$form_id]),
                'FormData.monthId' => base64_encode($month),
                'FormData.yearId' => base64_encode($year),
                'FormData.formNameHn' => base64_encode($formNameHn[$form_id]),
            ]);


            // DMF-01-PHH
            if($form_id == 3 || $form_id == 7 || $form_id == 11 || $form_id == 15 ){
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']);
            }
            //DMF-05-PVTG // DMP-06-PVTG
            if($form_id == 22 || $form_id == 23 ) {
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhhPvtg']);
            }
            //SMF-05-PVTG
            if($form_id == 21) {
                return $this->redirect(['controller'=>'SecyDmfSmfDistricts', 'action'=>'addDmfPhhPvtg']);
            }
            //DMF-06-JSCFF
            if($form_id == 25) {
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfJscff']);
            }
            //DMF-07-ANNAPURNA
            if($form_id == 28) {
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfAnnapurna']);
            }
            //DMF-07-SUGAR
            if($form_id == 47) {
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfSugar']);
            }

            // SMF-01-PHH
            if($form_id == 2 || $form_id == 6 || $form_id == 10 || $form_id == 14 ){
                return $this->redirect(['controller'=>'SecyDmfSmfDistricts', 'action'=>'' ]);
            }
            if($form_id == 4 || $form_id == 8 || $form_id == 12 || $form_id == 16) {
                return $this->redirect(['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmpForm']);
            }
        }
        $this->set(compact('formType'));
    }
}
