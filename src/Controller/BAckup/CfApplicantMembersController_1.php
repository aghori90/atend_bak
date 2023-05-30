<?php
namespace App\Controller\BAckup;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use function App\Controller\count;

/**
 * CfApplicantMembers Controller
 *
 * @property \App\Model\Table\CfApplicantMembersTable $CfApplicantMembers
 *
 * @method \App\Model\Entity\CfApplicantMember[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CfApplicantMembersController extends AppController
{
    public function consumerRegistration()
    {
        $connection = ConnectionManager::get('default');

        //gender Data
        $genderData = TableRegistry::get('Genders');
        $query = $genderData->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
//            'conditions' => ['Dealers.rgi_block_code=' . "'" . $id . "'"]

        ]);
        $genders = $query->toArray();

        //consumer form post Data
        $vacancy = [];

//        echo "<pre>"; print_r($vacancy); "<pre>"; die;

        if ($this->getRequest()->is('post')){
            $postData = $this->getRequest()->getData();
            $id = Text::uuid();
            $vaccId = $postData['vaccId'];
            $vaccGrp = $postData['vaccGrp'];
            $name = $postData['name'];
            $email = $postData['email'];
            $mobile = $postData['contact'];
            $dob = $postData['dob'];
            $gender = $postData['genders'];
            $created = date('Y-m-d H:i:s');
            $stpNo = '1';
            $regNO = date('U');
        //    echo "<pre>"; print_r($postData); "<pre>"; //die;
        //    echo "select mobile from cf_applicant_members where mobile='$mobile' and vaccancy_id='$vaccId'";die;
            $getCfMobQry = $connection->prepare("select mobile from cf_applicant_members where mobile='$mobile' and vaccancy_id='$vaccId'");
            $getCfMobQry->execute();
            $getCfMob = $getCfMobQry->fetchAll('assoc');
            if(!empty($getCfMob) && count($getCfMob) >= 1){
                $this->Flash->error(__("You have already applied for this vacancy with this mobile number !. ". $mobile));
                return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerRegistration']);
            }

            $registration = $connection->prepare("insert into cf_applicant_members (id, vaccancy_id, vaccancy_group, name, email, mobile, dob,  gender, created, step_no, registration_no) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $registration->bindvalue(1,$id);
            $registration->bindvalue(2,$vaccId);
            $registration->bindvalue(3,$vaccGrp);
            $registration->bindvalue(4,$name);
            $registration->bindvalue(5,$email);
            $registration->bindvalue(6,$mobile);
            $registration->bindvalue(7,$dob);
            $registration->bindvalue(8,$gender);
            $registration->bindvalue(9,$created);
            $registration->bindvalue(10,$stpNo);
            $registration->bindvalue(11,$regNO);
            $registrations = $registration->execute();

            if($registrations){
                $this->Flash->success(__("Registration Done Successfully Registration No is " .$regNO. " keep registration No for future refrence."));
                return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerLogin']);
            }else{
                $this->Flash->error(__("Some Problem While Registration !."));
                return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerRegistration']);
            }
        }

        $this->set(compact('genders','vacancy'));
    }

    public function consumerLogin()
    {
        $connection = ConnectionManager::get('default');
        $session = $this->request->getSession();
        $data = '';
        $registraonNo = '';
        $birthDate = '';
        if ($this->getRequest()->is('post')) {
            $postData = $this->getRequest()->getData();
//            echo "<pre>"; print_r($postData); "<pre>"; die;
            $reggNo = $postData['regNo'];
            $dob = $postData['dob'];

            if($reggNo == ''){
                $this->Flash->success(__("Enter Registration No."));
                return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerLogin']);
            }if($dob == ''){
                $this->Flash->success(__("Enter Dob as Password."));
                return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerLogin']);
            }

            if(!empty($reggNo) && !empty($dob)){
                $selectData = $connection->prepare("select vaccancy_id, vaccancy_group, name, email, mobile, dob,  gender, created, step_no, registration_no, step_no,flag from cf_applicant_members where registration_no = ? and dob = ?");
                $selectData->bindValue(1,$reggNo);
                $selectData->bindValue(2,$dob);
                $selectData->execute();
                $selectDatas = $selectData->fetchAll('assoc');

                $data=[];
                if(!empty($selectDatas)) {
                    $data = $selectDatas[0];
                    $registraonNo = $data['registration_no'];
                    $birthDate = $data['dob'];
                    $vaccancyId = $data['vaccancy_id'];
                    $step = $data['step_no'];
                    $cfFlag = $data['flag'];
                }else{
                    $cfFlag = 0;
                }

                if($reggNo === $registraonNo && $dob === $birthDate) {
//                    $this->Flash->success(__("Login Success"));
//                    $session->write('regNo',$registraonNo);
//                    $session->write('vaccId',$vaccancyId);
                    if($cfFlag == 1){
                        $this->Flash->success(__("Login Success"));
                        $session->write('regNo',$registraonNo);
                        $session->write('vaccId',$vaccancyId);
                        return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                    }else{
                        if ($step == 1){
                            $this->Flash->success(__("Login Success"));
                            $session->write('regNo',$registraonNo);
                            $session->write('vaccId',$vaccancyId);
                            return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                        }
                        if ($step == 2){
                            $this->Flash->success(__("Login Success"));
                            $session->write('regNo',$registraonNo);
                            $session->write('vaccId',$vaccancyId);
                            return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerDocuments']);
                        }
                        if ($step == 3){
                            $this->Flash->success(__("Login Success"));
                            $session->write('regNo',$registraonNo);
                            $session->write('vaccId',$vaccancyId);
                            return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                        }
//                        if ($step == 4){
//                            $this->Flash->success(__("Login Success"));
//                            $session->write('regNo',$registraonNo);
//                            $session->write('vaccId',$vaccancyId);
//                            return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
//                        }
                    }


                }
                else {
                    $this->Flash->success(__("Sorry Invalid Login please try with correct credentials."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerLogin']);
                }
                $this->set(compact('data','cfFlag'));
            }
        }
    }

    public function consumerForms()
    {
        $connection = ConnectionManager::get('default');
        $session = $this->request->getSession();
        $sessionReg = $session->read('regNo');
        $sessionVacId = $session->read('vaccId');
        $districts = $this->getCfDistricts();
        $cfDistricts = [];
        $state = $this->getCfStateName();
        $vacName = $this->getCfVacancyName($sessionVacId);


//        echo "<pre>"; print_r($state ); "</pre>"; die;

        $selectData = $connection->prepare("select vaccancy_id, vaccancy_group, name, email, mobile, dob,  gender, created, step_no, registration_no from cf_applicant_members where registration_no = ?");
        $selectData->bindValue(1,$sessionReg);
        $selectData->execute();
        $selectDatas = $selectData->fetchAll('assoc');

        $data=[];
        $age = 0;
        if(!empty($selectDatas)) {
            $data = $selectDatas[0];
            $currYear = date('Y');
            $birth_date = $data['dob'];
            $birthYr = date('Y',strtotime($birth_date));
            $age = $currYear-$birthYr;
        }
        if ($this->getRequest()->is('post')) {
            $postData = $this->getRequest()->getData();
//            echo "<pre>"; print_r($postData); "<pre>"; die;
//
            if($sessionVacId == 1){
                $namHn = $postData['namHn'];
                $fatNam = $postData['fatNam'];
                $fatNamHn = $postData['fatNamHn'];
                $permantStat = $postData['permantStat'];
                $permantDist = $postData['permantDist'];
                $permantAdd = $postData['permantAdd'];
                $permantPin = $postData['permantPin'];
                $currStat = $postData['currStat'];
                $currDist = $postData['currDist'];
                $currAdd = $postData['currAdd'];
                $currPin = $postData['currPin'];
                $age = $postData['age'];
                $cate = $postData['cate'];
                $exp7 = $postData['exp7'];
                if($exp7 == 1){
                $othrExpDetails = $postData['othrExpDetails'];
                }else{
                    $othrExpDetails = '0';
                }
                $highCrtJudge = $postData['highCrtJudge'];

                if($highCrtJudge == 1){
                    $courtNam = $postData['courtNam'];
                    $highCrtExp = $postData['highCrtExp'];
                }else{
                    $courtNam = '0';
                    $highCrtExp = '0';
                }
//                $highCrtExp = $postData['highCrtExp'];
                $ghosna1 = $postData['ghosna1'];
                $ghosna2 = $postData['ghosna2'];
                $ghosna3 = $postData['ghosna3'];
                $ghosna4 = $postData['ghosna4'];
                $ghosna5 = $postData['ghosna5'];
                $ghosna6 = $postData['ghosna6'];
                $step = '2';

                // validations
//                if($post == ''){
//                    $this->Flash->error(__("Post is mandatory."));
//                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
//                }
                if($namHn == ''){
                    $this->Flash->error(__("Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($fatNam == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($fatNamHn == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantStat == ''){
                    $this->Flash->error(__("Select Permanent State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantDist == ''){
                    $this->Flash->error(__("Select Permanent District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currStat == ''){
                    $this->Flash->error(__("Select current State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currDist == ''){
                    $this->Flash->error(__("Select Current District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($age == ''){
                    $this->Flash->error(__("Age is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($cate == ''){
                    $this->Flash->error(__("Category is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }

                if($ghosna1 == ''){
                    $this->Flash->error(__("Select swa-ghosna1."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna2."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna3."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna4 == ''){
                    $this->Flash->error(__("Select swa-ghosna4."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna5 == ''){
                    $this->Flash->error(__("Select swa-ghosna5."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna6 == ''){
                    $this->Flash->error(__("Select swa-ghosna6."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }

                $updateDatas = $connection->execute("update cf_applicant_members set  name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age', catagory = '$cate',other_exp = '$exp7',other_exp_details = '$othrExpDetails',high_court_judge='$highCrtJudge',high_court_name='$courtNam',high_court_exp='$highCrtExp',declaration_1='$ghosna1',declaration_2='$ghosna2',declaration_3='$ghosna3',declaration_4='$ghosna4',declaration_5='$ghosna5',declaration_6='$ghosna6', step_no='$step' where registration_no = '$sessionReg'");
                if($updateDatas) {
                    $this->Flash->success(__("Data Saved Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerDocuments']);
                }
            }

            if($sessionVacId == 2){
                // postVariableData
                $workPlc = $postData['workPlc'];
                $mulDist = $postData['multiiDist'];
                $namHn = $postData['namHn'];
                $fatNam = $postData['fatNam'];
                $fatNamHn = $postData['fatNamHn'];
                $permantStat = $postData['permantStat'];
                $permantDist = $postData['permantDist'];
                $permantAdd = $postData['permantAdd'];
                $permantPin = $postData['permantPin'];
                $currStat = $postData['currStat'];
                $currDist = $postData['currDist'];
                $currAdd = $postData['currAdd'];
                $currPin = $postData['currPin'];
                $age = $postData['age'];
//                $age = $postData['age'];
                $experince = $postData['exp1'];
                if(array_key_exists('exp1_1',$postData)){
                    $expDurationMnth = $postData['exp1_1'];
                }else{
                    $expDurationMnth= '';
                }
                $graduTotMrk = $postData['graduTotMrk'];
                $graduObtMrk = $postData['graduObtMrk'];
                $graduPrecntMrk = $postData['graduPrecntMrk'];
                $master = $postData['master'];
                if($master == 1){
                    $masterTotMrk = $postData['masterTotMrk'];
                    $masterObtMrk = $postData['masterObtMrk'];
                    $masterPrecntMrk = $postData['masterPrecntMrk'];
                }else{
                    $masterTotMrk = '';
                    $masterObtMrk = '';
                    $masterPrecntMrk = '';
                }
                $phd = $postData['phd'];
                if($phd == 1){
                    $phdTotMrk = $postData['phdTotMrk'];
                    $phdObtMrk = $postData['phdObtMrk'];
                    $phdPrecntMrk = $postData['phdPrecntMrk'];
                }else{
                    $phdTotMrk = '';
                    $phdObtMrk = '';
                    $phdPrecntMrk = '';
                }
                $exp1 = $postData['exp2'];
                $exp2 = $postData['exp3'];
                $exp3 = $postData['exp4'];
                $exp4 = $postData['exp5'];
                $exp5 = $postData['exp6'];
                if(array_key_exists('exp2Month',$postData)){
                    $exp1Mnth = $postData['exp2Month'];
                    $exp2Mnth = $postData['exp3Mnth'];
                    $exp3Mnth = $postData['exp4Mnth'];
                    $exp4Mnth = $postData['exp5Mnth'];
                    $exp5Mnth = $postData['exp6Mnth'];
                }
                else{
                    $exp1Mnth   = '';
                    $exp2Mnth   = '';
                    $exp2Mnth   = '';
                    $exp3Mnth   = '';
                    $exp4Mnth   = '';
                }
                $pdsStDistWork = $postData['exp7'];
                $pdsStDistWorkMnth = $postData['exp7Mnth'];
                $pdsStDistWrkAdd = $postData['knownAddress'];
                $minExp20 = $postData['minExp20'];
                $step = '2';

                // validations
                if($workPlc == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($namHn == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($fatNam == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($fatNamHn == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantStat == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantDist == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantAdd == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantPin == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currStat == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currDist == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currAdd == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currPin == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($age == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($experince == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($graduTotMrk == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($graduObtMrk == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($graduPrecntMrk == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($master == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($phd == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($exp1 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($exp2 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($exp3 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($exp4 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($exp5 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($minExp20 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }

                $updateDatas = $connection->execute("update cf_applicant_members set work_skill = '$workPlc','district_priority_by_post'='$mulDist', name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age',experience = '$experince',experience_duration_month = '$expDurationMnth',graduation_total_marks = '$graduTotMrk',graduation_obtain_marks = '$graduObtMrk',graduation_percentage = '$graduPrecntMrk',master_degree = '$master',master_degree_total_marks = '$masterTotMrk',master_degree_obtain_marks = '$masterObtMrk',master_degree_percentage = '$masterPrecntMrk',phd_degree = '$phd',phd_degree_total_marks = '$phdTotMrk',phd_degree_obtain_marks = '$phdObtMrk',phd_degree_percentage = '$phdPrecntMrk',experience_1 = '$exp1',experience_2 = '$exp2',experience_3 = '$exp3',experience_4 = '$exp4',experience_5 = '$exp5',experience_1_duration = '$exp1Mnth',experience_2_duration = '$exp2Mnth',experience_3_duration = '$exp3Mnth',experience_4_duration = '$exp4Mnth',experience_5_duration = '$exp5Mnth',pds_st_dist_work = '$pdsStDistWork',pds_st_dist_work_address = '$pdsStDistWrkAdd',pds_st_dist_work_duration = '$pdsStDistWorkMnth',exp_duration_20yrs = '$minExp20', step_no='$step' where registration_no = '$sessionReg'"); //die;
                if($updateDatas) {
                    $this->Flash->success(__("Data Saved Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerDocuments']);
                }
            }

            if($sessionVacId == 3){
                $post = $postData['post'];
                $mulDist = $postData['multiiDist'];
                $namHn = $postData['namHn'];
                $fatNam = $postData['fatNam'];
                $fatNamHn = $postData['fatNamHn'];
                $permantStat = $postData['permantStat'];
                $permantDist = $postData['permantDist'];
                $permantAdd = $postData['permantAdd'];
                $permantPin = $postData['permantPin'];
                $currStat = $postData['currStat'];
                $currDist = $postData['currDist'];
                $currAdd = $postData['currAdd'];
                $currPin = $postData['currPin'];
                $age = $postData['age'];
                $cate = $postData['cate'];
                $expe = $postData['expp'];
                $expInMnth = $postData['expInMnth'];
                $ghosna1 = $postData['ghosna1'];
                $ghosna2 = $postData['ghosna2'];
                $ghosna3 = $postData['ghosna3'];
                $ghosna4 = $postData['ghosna4'];
                $ghosna5 = $postData['ghosna5'];
                $ghosna6 = $postData['ghosna6'];
                $step = '2';

                // validations
                if($post == ''){
                    $this->Flash->error(__("Post is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($namHn == ''){
                    $this->Flash->error(__("Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($fatNam == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($fatNamHn == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantStat == ''){
                    $this->Flash->error(__("Select Permanent State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantDist == ''){
                    $this->Flash->error(__("Select Permanent District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currStat == ''){
                    $this->Flash->error(__("Select current State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currDist == ''){
                    $this->Flash->error(__("Select Current District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($age == ''){
                    $this->Flash->error(__("Age is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($cate == ''){
                    $this->Flash->error(__("Category is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($expe == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }

                if($ghosna1 == ''){
                    $this->Flash->error(__("Select swa-ghosna1."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna2."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna3."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna4 == ''){
                    $this->Flash->error(__("Select swa-ghosna4."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna5 == ''){
                    $this->Flash->error(__("Select swa-ghosna5."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna6 == ''){
                    $this->Flash->error(__("Select swa-ghosna6."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }

                $updateDatas = $connection->execute("update cf_applicant_members set post_name = '$post',district_priority_by_post='$mulDist', name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age', catagory = '$cate',experience = '$expe',experience_duration_month = '$expInMnth',declaration_1='$ghosna1',declaration_2='$ghosna2',declaration_3='$ghosna3',declaration_4='$ghosna4',declaration_5='$ghosna5',declaration_6='$ghosna6', step_no='$step' where registration_no = '$sessionReg'");
                if($updateDatas) {
                    $this->Flash->success(__("Data Saved Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerDocuments']);
                }

            }

            if($sessionVacId == 4){
                $post = $postData['post'];
//                $mulDist = $postData['multiiDist'];
//                $mulDists = '';
//                if(!empty($mulDist) && count($mulDist) > 1){
//                    foreach($mulDist as $pKey => $pVal){
//                        $mulDists .= $pVal.',';
//                    }
//                }
//                $mulDists = rtrim($mulDists,',');//die;
//                echo "<pre>"; print_r($mulDists); "<pre>"; die;
                $mulDist = $postData['multiiDist'];
                $namHn = $postData['namHn'];
                $fatNam = $postData['fatNam'];
                $fatNamHn = $postData['fatNamHn'];
                $permantStat = $postData['permantStat'];
                $permantDist = $postData['permantDist'];
                $permantAdd = $postData['permantAdd'];
                $permantPin = $postData['permantPin'];
                $currStat = $postData['currStat'];
                $currDist = $postData['currDist'];
                $currAdd = $postData['currAdd'];
                $currPin = $postData['currPin'];
                $age = $postData['age'];
                $cate = $postData['cat'];
                $graduTotMrk = $postData['graduTotMrk'];
                $graduObtMrk = $postData['graduObtMrk'];
                $graduPrecntMrk = $postData['graduPrecntMrk'];
                $master = $postData['master'];
                if($master == 1){
                    $masterTotMrk = $postData['masterTotMrk'];
                    $masterObtMrk = $postData['masterObtMrk'];
                    $masterPrecntMrk = $postData['masterPrecntMrk'];
                }else{
                    $masterTotMrk = '';
                    $masterObtMrk = '';
                    $masterPrecntMrk = '';
                }
                $phd = $postData['phd'];
                if($phd == 1){
                    $phdTotMrk = $postData['phdTotMrk'];
                    $phdObtMrk = $postData['phdObtMrk'];
                    $phdPrecntMrk = $postData['phdPrecntMrk'];
                }else{
                    $phdTotMrk = '';
                    $phdObtMrk = '';
                    $phdPrecntMrk = '';
                }
                $exp1 = $postData['exp2'];
                $exp2 = $postData['exp3'];
                $exp3 = $postData['exp4'];
                $exp4 = $postData['exp5'];
                $exp5 = $postData['exp6'];
                if(array_key_exists('exp2Month',$postData)){
                    $exp1Mnth = $postData['exp2Month'];
                    $exp2Mnth = $postData['exp3Mnth'];
                    $exp3Mnth = $postData['exp4Mnth'];
                    $exp4Mnth = $postData['exp5Mnth'];
                    $exp5Mnth = $postData['exp6Mnth'];
                }
                else{
                    $exp1Mnth   = '';
                    $exp2Mnth   = '';
                    $exp2Mnth   = '';
                    $exp3Mnth   = '';
                    $exp4Mnth   = '';
                }
                $pdsStDistWork = $postData['exp7'];
                $pdsStDistWorkMnth = $postData['exp7Mnth'];
                $pdsStDistWrkAdd = $postData['knownAddress'];
                $minExp15 = $postData['minExp15'];
                $ghosna1 = $postData['ghosna1'];
                $ghosna2 = $postData['ghosna2'];
                $ghosna3 = $postData['ghosna3'];
                $ghosna4 = $postData['ghosna4'];
                $ghosna5 = $postData['ghosna5'];
                $ghosna6 = $postData['ghosna6'];
                $step = '2';

                // validations
//                if($post == ''){
//                    $this->Flash->error(__("Post is mandatory."));
//                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
//                }
                if($namHn == ''){
                    $this->Flash->error(__("Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($fatNam == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($fatNamHn == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantStat == ''){
                    $this->Flash->error(__("Select Permanent State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantDist == ''){
                    $this->Flash->error(__("Select Permanent District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($permantPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currStat == ''){
                    $this->Flash->error(__("Select current State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currDist == ''){
                    $this->Flash->error(__("Select Current District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($currPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($age == ''){
                    $this->Flash->error(__("Age is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($cate == ''){
                    $this->Flash->error(__("Category is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
//                if($expe == ''){
//                    $this->Flash->error(__("All the fields are mandatory."));
//                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
//                }

                if($ghosna1 == ''){
                    $this->Flash->error(__("Select swa-ghosna1."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna2."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna3."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna4 == ''){
                    $this->Flash->error(__("Select swa-ghosna4."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna5 == ''){
                    $this->Flash->error(__("Select swa-ghosna5."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }
                if($ghosna6 == ''){
                    $this->Flash->error(__("Select swa-ghosna6."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerForms']);
                }

                $updateDatas = $connection->execute("update cf_applicant_members set post_name = '$post',district_priority_by_post = '$mulDist', name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age',catagory='$cate',exp_duration_15yrs = '$minExp15',graduation_total_marks = '$graduTotMrk',graduation_obtain_marks = '$graduObtMrk',graduation_percentage = '$graduPrecntMrk',master_degree = '$master',master_degree_total_marks = '$masterTotMrk',master_degree_obtain_marks = '$masterObtMrk',master_degree_percentage = '$masterPrecntMrk',phd_degree = '$phd',phd_degree_total_marks = '$phdTotMrk',phd_degree_obtain_marks = '$phdObtMrk',phd_degree_percentage = '$phdPrecntMrk',experience_1 = '$exp1',experience_2 = '$exp2',experience_3 = '$exp3',experience_4 = '$exp4',experience_5 = '$exp5',experience_1_duration = '$exp1Mnth',experience_2_duration = '$exp2Mnth',experience_3_duration = '$exp3Mnth',experience_4_duration = '$exp4Mnth',experience_5_duration = '$exp5Mnth',pds_st_dist_work = '$pdsStDistWork',pds_st_dist_work_address = '$pdsStDistWrkAdd',pds_st_dist_work_duration = '$pdsStDistWorkMnth',declaration_1='$ghosna1',declaration_2='$ghosna2',declaration_3='$ghosna3',declaration_4='$ghosna4',declaration_5='$ghosna5',declaration_6='$ghosna6', step_no='$step' where registration_no = '$sessionReg'");

                if($updateDatas) {
                    $this->Flash->success(__("Data Saved Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerDocuments']);
                }
            }
        }
        $this->set(compact('data','sessionVacId','districts','state','cfDistricts','age','vacName'));
//        echo "<pre>"; print_r($data); "<pre>"; die;
    }

    public function consumerDocuments(){
        $connection = ConnectionManager::get('default');
        $session = $this->request->getSession();
        $sessionReg = $session->read('regNo');
        $sessionVacId = $session->read('vaccId');
        $vacName = $this->getCfVacancyName($sessionVacId);
        $selectData = $connection->prepare("select vaccancy_id, vaccancy_group, name, email, mobile, dob,  gender, created, step_no, registration_no,master_degree,phd_degree, other_exp from cf_applicant_members where registration_no = ?");
        $selectData->bindValue(1,$sessionReg);
        $selectData->execute();
        $selectDatas = $selectData->fetchAll('assoc');

        $data=[];
        if(!empty($selectDatas)) {
            $data = $selectDatas[0];
        }

        $functionName = __FUNCTION__;
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
            $validateUploadFile = $this->checkValidateFile($this->getRequest()->getData(), $sessionReg, $functionName);
        }

        $this->set(compact('data','sessionVacId','vacName'));
    }

    public function checkValidateFile($fileArr, $consumerRegNo= null, $functionName = null, $rgi_district_code = null, $rgi_block_code = null)
    {
        $fileTypeKeys = array_keys($fileArr);
        $total_files = count($fileTypeKeys);
        $connection = ConnectionManager::get('default');
        $encoded_beneficiary_id = base64_encode($consumerRegNo);
        $session_data = $this->getRequest()->getSession()->read();
        $vacancy_id = $session_data['vaccId'];
//        echo "<pre>";print_r($fileArr); die;
        // update cf_applicant_members

//        $vacancyId = $fileArr['vacancyId'];
        if($vacancy_id == 1){
            $plce = $fileArr['plce'];
            $dat = $fileArr['dat'];
            $today = date('Y-m-d H:i:s');
            $step = '3';
            $update = $connection->execute("update cf_applicant_members set date='$dat', place='$plce', submited_date='$today', step_no='$step' where registration_no= '$consumerRegNo' and vaccancy_id = '$vacancy_id'");
            $n = 4;
        }else if($vacancy_id == 2){
            $ghosna1 = $fileArr['ghosna1'];
            $ghosna2 = $fileArr['ghosna2'];
            $ghosna3 = $fileArr['ghosna3'];
            $ghosna4 = $fileArr['ghosna4'];
            $ghosna5 = $fileArr['ghosna5'];
            $ghosna6 = $fileArr['ghosna6'];
            $plce = $fileArr['plce'];
            $dat = $fileArr['dat'];
            $today = date('Y-m-d H:i:s');
            $step = '3';
            // update query for vacancy id 2
            $update = $connection->execute("update cf_applicant_members set declaration_1='$ghosna1',declaration_2='$ghosna2',declaration_3='$ghosna3',declaration_4='$ghosna4',declaration_5='$ghosna5',declaration_6='$ghosna6', date='$dat', place='$plce', submited_date='$today', step_no='$step' where registration_no= '$consumerRegNo' and vaccancy_id = '$vacancy_id'");
            $n = 10;
        }else if($vacancy_id == 3){
            $plce = $fileArr['plce'];
            $dat = $fileArr['dat'];
            $today = date('Y-m-d H:i:s');
            $step = '3';
            $update = $connection->execute("update cf_applicant_members set date='$dat', place='$plce', submited_date='$today', step_no='$step' where registration_no= '$consumerRegNo' and vaccancy_id = '$vacancy_id'");
            $n = 3;
        }else if($vacancy_id == 4){
            $plce = $fileArr['plce'];
            $dat = $fileArr['dat'];
            $today = date('Y-m-d H:i:s');
            $step = '3';
            $update = $connection->execute("update cf_applicant_members set date='$dat', place='$plce', submited_date='$today', step_no='$step' where registration_no= '$consumerRegNo' and vaccancy_id = '$vacancy_id'");
            $n = 4;
        }

//        $update = $connection->execute("update cf_applicant_members set ");
        for($s=1;$s <= $n;$s++){
            array_shift($fileArr);
        }
        $total_doc_files = count(array_keys($fileArr));

        //echo "<pre>";print_r($_FILES);//die;
//        echo "<pre>";print_r($fileArr);die;
        $fileKey = array_keys($_FILES);
        //echo "<pre>";print_r($fileKey);die;

        $message = "Document Has been uploaded successfully.";

        /* Start : Create Directory for User's Document */
        $www_root = ABS_PATH;
        $registr_dir1 = $www_root . '/' . 'cf_documents'.'/'.$consumerRegNo;

        if (!file_exists($registr_dir1)) {
            mkdir($registr_dir1, 0777, true);
        }

        /* Ended : Create Directory for User's Document */
        $ben_reg_no = $consumerRegNo;
        $beneficiary_reg_no = base64_encode($consumerRegNo);    // encoded registration_no
        if (!empty($fileArr) && $total_doc_files >= 1) {
            for ($i = 0; $i < $total_doc_files; $i++) {
                $allowed_exts = ['pdf', 'jpeg', 'jpg', 'png'];
                //$tempFile = explode('.', $_FILES[$fileKey[$i]]['name']);
                $tempFile = explode('.', $_FILES[$fileKey[$i]]['name']);
                $ext = end($tempFile);

                if ($_FILES[$fileKey[$i]]['size'] == 0) {
                    $this->Flash->error(__('File Fields are Mandatory.'));
                    return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => $functionName, $encoded_beneficiary_id]);
                }

                if ($_FILES[$fileKey[$i]]['error'] == 0) {
                    if (($_FILES[$fileKey[$i]]['type'] == 'application/pdf') || ($_FILES[$fileKey[$i]]['type'] == 'image/jpeg') || ($_FILES[$fileKey[$i]]['type'] == 'image/png')) {
                        if (in_array($ext, $allowed_exts)) {
                            if(($fileKey[$i] == 'photo') || ($fileKey[$i] == 'signature')){ // file size validation for passport  and signature
                                if ($_FILES[$fileKey[$i]]['size'] > 200000000) {
                                    $this->Flash->error(__('Sorry!, Too large file for '.$fileKey[$i].'.'));
                                    return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => $functionName, $encoded_beneficiary_id]);
                                }
                            }else{
                                if ($_FILES[$fileKey[$i]]['size'] > 200000000) {
                                    $this->Flash->error(__('Sorry!, Too large file for '.$fileKey[$i].'.'));
                                    return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => $functionName, $encoded_beneficiary_id]);
                                }
                            }
                        } else {
                            $this->Flash->error(__('Sorry!, Invalid File Formats/extension.'));
                            return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => $functionName, $encoded_beneficiary_id]);
                        }
                    } else {
                        $this->Flash->error(__('Sorry!, Invalid File MIME Type.'));
                        return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => $functionName, $encoded_beneficiary_id]);
                    }
                } else {
                    $this->Flash->error(__('Sorry!, Error in opening file.'));
                    return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => $functionName, $encoded_beneficiary_id]);
                }
            }
            //$getDocumentMasters = $connection->execute("SELECT * FROM cf_document_masters")->fetchAll('assoc');
            // Ended : Get Document Masters
            // Start : inserting document data
            for ($i = 0; $i < $total_doc_files; $i++) {
                $explodeFileKey = explode('_', $fileKey[$i]);
                $document_master_id = $explodeFileKey[0];//die;
                $orgFileName = $_FILES[$fileKey[$i]]['name'];
                $fileExt = explode('.', $orgFileName);
                $ext = strtolower(end($fileExt));
                $fileNewName = $fileKey[$i] . '_' . Text::uuid() . '_' . time() . '.' . $ext;
                $fileTmpName = $_FILES[$fileKey[$i]]['tmp_name'];
                $fileDestination = $registr_dir1 . '/' . $fileNewName;
                $filedir = ABS_PATH . '/' . $consumerRegNo . '/' . $fileNewName;
                //$imgFileDestination         = $img_dir.'/'. $fileNewName;
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    //move_uploaded_file($fileTmpName, $imgFileDestination);
                    $insertDocuments = $connection->insert('cf_consumer_docs', [
                        'id' => Text::uuid(),
                        'cf_registration_no' => $consumerRegNo,
                        'name' => $fileNewName,
                        'cf_document_masters_id' => 1,
                        'document_path' => $registr_dir1,
                        'document_type_id' => $fileKey[$i],
                        'created_by' => 5,
                        'created' => date('Y-m-d H:i:s'),
                        'modified' => date('Y-m-d H:i:s')
                    ]);
                } else {
                    $this->Flash->error(__('Sorry, Documents not uploaded successfully.'));
                    return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => $functionName, $encoded_beneficiary_id]);
                }
            }
            if ($insertDocuments) {
                $updateDocumentFlag = $connection->execute("UPDATE cf_applicant_members SET step_no='3' WHERE id='" . base64_decode($beneficiary_reg_no) . "'");
                $this->Flash->success(__($message));
                return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => 'consumerPreview']);
                //return $this->redirect(['controller' => 'DealerTemps','action' => 'documentDetails', $encoded_beneficiary_id]);
            } else {
                $this->Flash->error(__('Sorry, There is an error.'));
                return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => $functionName, $encoded_beneficiary_id]);
            }
            // Ended : inserting document data
        } else {
            $this->Flash->error(__('Sorry!, File fields are Mandatory.'));
            return $this->redirect(['controller' => 'CfApplicantMembers', 'action' => $functionName, $encoded_beneficiary_id]);
        }
    }

    public function consumerPreview(){
        $connection = ConnectionManager::get('default');
        $session = $this->request->getSession();
        $sessionReg = $session->read('regNo');
        $sessionVacId = $session->read('vaccId');
        $vacName = $this->getCfVacancyName($sessionVacId);
        $districts = $this->getCfDistricts();
        $cfPrmDistricts = [];
        $cfDistricts = [];
        $state = $this->getCfStateName();
        /* $regNo = 1625768785;
         $vcID =4;*/
        $selectData = $connection->prepare("select * from cf_applicant_members where registration_no = ? and vaccancy_id=?");
        $selectData->bindValue(1,$sessionReg);
        $selectData->bindValue(2,$sessionVacId);
        $selectData->execute();
        $selectDatas = $selectData->fetchAll('assoc');
//        echo "<pre>";print_r($selectDatas);die;
        $data=[];
        if(!empty($selectDatas)) {
            $data = $selectDatas[0];
            $prm_stat = $data['permanent_state'];
            $tmp_stat = $data['temporary_state'];
            $tmp_dist = $data['temporary_district'];
            $prm_dist = $data['permanent_district'];
            $cfFlag = $data['flag'];

            $cfDistricts = $this->getCfDistrictsBasedOnState($tmp_stat);
            $cfPrmDistricts = $this->getCfDistrictsBasedOnState($prm_stat);
            //echo "<pre>"; print_r($cfPrmDistricts); "</pre>"; die;
        }else{
            $cfFlag = 0;
        }
        // get consumer documents
        $getConsumerDocs = $connection->prepare("select * from cf_consumer_docs where cf_registration_no = ? ");
        $getConsumerDocs->bindValue(1,$sessionReg);
        $getConsumerDocs->execute();
        $getCfDocs = $getConsumerDocs->fetchAll('assoc');
        //echo "<pre>"; print_r($getCfDocs); "</pre>"; die;


        $this->set(compact('data','sessionVacId','sessionReg','districts','cfDistricts','state','getCfDocs','cfPrmDistricts','vacName','cfFlag'));
    }

    public function updateCfUser(){
        $connection = ConnectionManager::get('default');
        $session = $this->request->getSession();
        $sessionReg = $session->read('regNo');
        $sessionVacId = $session->read('vaccId');

        if($this->getRequest()->is('post')){
            $postData = $this->getRequest()->getData();
//            echo "<pre>";print_r($postData); die;
            // variable le lo
            if($sessionVacId == 1){ //echo "1";die;
//                $workPlc = $postData['workPlc'];
                $namHn = $postData['namHn'];
                $fatNam = $postData['fatNam'];
                $fatNamHn = $postData['fatNamHn'];
                $permantStat = $postData['permantStat'];
                $permantDist = $postData['permantDist'];
                $permantAdd = $postData['permantAdd'];
                $permantPin = $postData['permantPin'];
                $currStat = $postData['currStat'];
                $currDist = $postData['currDist'];
                $currAdd = $postData['currAdd'];
                $currPin = $postData['currPin'];
                $age = $postData['age'];
                $cate = $postData['cat'];
                $exp7 = $postData['exp7'];
                if($exp7 == 1){
                    $knownAddress = $postData['knownAddress'];
                }else{
                    $knownAddress = '0';
                }
//                $othrExpDetails = $postData['exp7'];
//                $knownAddress = $postData['knownAddress'];
                $highCrtJudge = $postData['highCrtJudge'];
                if($highCrtJudge ==1 ){
                    $courtNam = $postData['courtNam'];
                    $highCrtExp = $postData['highCrtExp'];
                }else{
                    $courtNam = '0';
                    $highCrtExp = '0';
                }

                $ghosna1 = $postData['ghosna1'];
                $ghosna2 = $postData['ghosna2'];
                $ghosna3 = $postData['ghosna3'];
                $ghosna4 = $postData['ghosna4'];
                $ghosna5 = $postData['ghosna5'];
                $ghosna6 = $postData['ghosna6'];
                $step = '2';

                // validations
                if($namHn == ''){
                    $this->Flash->error(__("Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($fatNam == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($fatNamHn == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantStat == ''){
                    $this->Flash->error(__("Select Permanent State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantDist == ''){
                    $this->Flash->error(__("Select Permanent District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currStat == ''){
                    $this->Flash->error(__("Select current State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currDist == ''){
                    $this->Flash->error(__("Select Current District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($age == ''){
                    $this->Flash->error(__("Age is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($cate == ''){
                    $this->Flash->error(__("Category is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }

                if($ghosna1 == ''){
                    $this->Flash->error(__("Select swa-ghosna1."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna2."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna3."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna4 == ''){
                    $this->Flash->error(__("Select swa-ghosna4."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna5 == ''){
                    $this->Flash->error(__("Select swa-ghosna5."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna6 == ''){
                    $this->Flash->error(__("Select swa-ghosna6."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }

                $updateDatas = $connection->execute("update cf_applicant_members set  name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age', catagory = '$cate',other_exp = '$exp7',other_exp_details = '$knownAddress',high_court_judge='$highCrtJudge',high_court_name='$courtNam',high_court_exp='$highCrtExp',declaration_1='$ghosna1',declaration_2='$ghosna2',declaration_3='$ghosna3',declaration_4='$ghosna4',declaration_5='$ghosna5',declaration_6='$ghosna6', step_no='$step' where registration_no = '$sessionReg'");

                if($updateDatas) { //echo "yes";die;
                    $this->Flash->success(__("Data Saved Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }else{ //echo "no";die;
                    $this->Flash->error(__("Data not Updated Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
            }

            if($sessionVacId == 2){
                // postVariableData
                $workPlc = $postData['workPlc'];
                $namHn = $postData['namHn'];
                $fatNam = $postData['fatNam'];
                $fatNamHn = $postData['fatNamHn'];
                $permantStat = $postData['permantStat'];
                $permantDist = $postData['permantDist'];
                $permantAdd = $postData['permantAdd'];
                $permantPin = $postData['permantPin'];
                $currStat = $postData['currStat'];
                $currDist = $postData['currDist'];
                $currAdd = $postData['currAdd'];
                $currPin = $postData['currPin'];
                $age = $postData['age'];
                $cate = $postData['cat'];
                $experince = $postData['exp1'];
                if(array_key_exists('exp1_1',$postData)){
                    $expDurationMnth = $postData['exp1_1'];
                }else{
                    $expDurationMnth= '';
                }
                $graduTotMrk = $postData['graduTotMrk'];
                $graduObtMrk = $postData['graduObtMrk'];
                $graduPrecntMrk = $postData['graduPrecntMrk'];
                $master = $postData['master'];
                if($master == 1){
                    $masterTotMrk = $postData['masterTotMrk'];
                    $masterObtMrk = $postData['masterObtMrk'];
                    $masterPrecntMrk = $postData['masterPrecntMrk'];
                }else{
                    $masterTotMrk = '';
                    $masterObtMrk = '';
                    $masterPrecntMrk = '';
                }
                $phd = $postData['phd'];
                if($phd == 1){
                    $phdTotMrk = $postData['phdTotMrk'];
                    $phdObtMrk = $postData['phdObtMrk'];
                    $phdPrecntMrk = $postData['phdPrecntMrk'];
                }else{
                    $phdTotMrk = '';
                    $phdObtMrk = '';
                    $phdPrecntMrk = '';
                }
                $exp1 = $postData['exp2'];
                $exp2 = $postData['exp3'];
                $exp3 = $postData['exp4'];
                $exp4 = $postData['exp5'];
                $exp5 = $postData['exp6'];
                if(array_key_exists('exp2Month',$postData)){
                    $exp1Mnth = $postData['exp2Month'];
                }else{
                    $exp1Mnth ='0';
                }
                if(array_key_exists('exp3Mnth',$postData)){
                    $exp2Mnth = $postData['exp3Mnth'];
                }else{
                    $exp2Mnth ='0';
                }
                if(array_key_exists('exp4Month',$postData)){
                    $exp3Mnth = $postData['exp4Mnth'];
                }else{
                    $exp3Mnth ='0';
                }
                if(array_key_exists('exp5Month',$postData)){
                    $exp4Mnth = $postData['exp5Mnth'];
                }else{
                    $exp4Mnth ='0';
                }
                if(array_key_exists('exp6Mnth',$postData)){
                    $exp5Mnth = $postData['exp6Mnth'];
                }
                else{
                    $exp5Mnth   = '0';
                }

                $pdsStDistWork = $postData['exp7'];
                if(array_key_exists('exp7Mnth',$postData)){
                    $pdsStDistWorkMnth = $postData['exp7Mnth'];
                }
                else{
                    $pdsStDistWorkMnth   = 0;
                }
                $pdsStDistWrkAdd = $postData['knownAddress'];
                $minExp20 = $postData['minExp20'];
                $step = '2';

                // validations
                if($workPlc == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($namHn == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($fatNam == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($fatNamHn == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantStat == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantDist == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantAdd == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantPin == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currStat == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currDist == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currAdd == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currPin == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($age == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($experince == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($graduTotMrk == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($graduObtMrk == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($graduPrecntMrk == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($master == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($phd == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($exp1 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($exp2 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($exp3 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($exp4 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($exp5 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($minExp20 == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }

                $updateDatas = $connection->execute("update cf_applicant_members set work_skill = '$workPlc', name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age',catagory='$cate',experience = '$experince',experience_duration_month = '$expDurationMnth',graduation_total_marks = '$graduTotMrk',graduation_obtain_marks = '$graduObtMrk',graduation_percentage = '$graduPrecntMrk',master_degree = '$master',master_degree_total_marks = '$masterTotMrk',master_degree_obtain_marks = '$masterObtMrk',master_degree_percentage = '$masterPrecntMrk',phd_degree = '$phd',phd_degree_total_marks = '$phdTotMrk',phd_degree_obtain_marks = '$phdObtMrk',phd_degree_percentage = '$phdPrecntMrk',experience_1 = '$exp1',experience_2 = '$exp2',experience_3 = '$exp3',experience_4 = '$exp4',experience_5 = '$exp5',experience_1_duration = '$exp1Mnth',experience_2_duration = '$exp2Mnth',experience_3_duration = '$exp3Mnth',experience_4_duration = '$exp4Mnth',experience_5_duration = '$exp5Mnth',pds_st_dist_work = '$pdsStDistWork',pds_st_dist_work_address = '$pdsStDistWrkAdd',pds_st_dist_work_duration = '$pdsStDistWorkMnth',exp_duration_20yrs = '$minExp20', step_no='$step' where registration_no = '$sessionReg'"); //die;
                if($updateDatas) {
                    $this->Flash->success(__("Data Saved Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
            }

            if($sessionVacId == 3){
                $post = $postData['post'];
                $postByPriority = $postData['multiiDist'];
                $namHn = $postData['namHn'];
                $fatNam = $postData['fatNam'];
                $fatNamHn = $postData['fatNamHn'];
                $permantStat = $postData['permantStat'];
                $permantDist = $postData['permantDist'];
                $permantAdd = $postData['permantAdd'];
                $permantPin = $postData['permantPin'];
                $currStat = $postData['currStat'];
                $currDist = $postData['currDist'];
                $currAdd = $postData['currAdd'];
                $currPin = $postData['currPin'];
                $age = $postData['age'];
                $cate = $postData['cat'];
                $expe = $postData['expp'];
                $expInMnth = $postData['expInMnth'];
                $ghosna1 = $postData['ghosna1'];
                $ghosna2 = $postData['ghosna2'];
                $ghosna3 = $postData['ghosna3'];
                $ghosna4 = $postData['ghosna4'];
                $ghosna5 = $postData['ghosna5'];
                $ghosna6 = $postData['ghosna6'];
                $step = '2';

                // validations
//                if($post == ''){
//                    $this->Flash->error(__("Post is mandatory."));
//                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
//                }
                if($namHn == ''){
                    $this->Flash->error(__("Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($fatNam == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($fatNamHn == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantStat == ''){
                    $this->Flash->error(__("Select Permanent State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantDist == ''){
                    $this->Flash->error(__("Select Permanent District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currStat == ''){
                    $this->Flash->error(__("Select current State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currDist == ''){
                    $this->Flash->error(__("Select Current District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($age == ''){
                    $this->Flash->error(__("Age is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($cate == ''){
                    $this->Flash->error(__("Category is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($expe == ''){
                    $this->Flash->error(__("All the fields are mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }

                if($ghosna1 == ''){
                    $this->Flash->error(__("Select swa-ghosna1."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna2."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna3."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna4 == ''){
                    $this->Flash->error(__("Select swa-ghosna4."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna5 == ''){
                    $this->Flash->error(__("Select swa-ghosna5."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna6 == ''){
                    $this->Flash->error(__("Select swa-ghosna6."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }

//                echo "update cf_applicant_members set post_name = '$post',district_priority_by_post='$postByPriority', name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age', catagory = '$cate',experience = '$expe',experience_duration_month = '$expInMnth',declaration_1='$ghosna1',declaration_2='$ghosna2',declaration_3='$ghosna3',declaration_4='$ghosna4',declaration_5='$ghosna5',declaration_6='$ghosna6', step_no='$step' where registration_no = '$sessionReg'"; die;

                $updateDatas = $connection->execute("update cf_applicant_members set post_name = '$post',district_priority_by_post='$postByPriority', name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age', catagory = '$cate',experience = '$expe',experience_duration_month = '$expInMnth',declaration_1='$ghosna1',declaration_2='$ghosna2',declaration_3='$ghosna3',declaration_4='$ghosna4',declaration_5='$ghosna5',declaration_6='$ghosna6', step_no='$step' where registration_no = '$sessionReg'");

                if($updateDatas) {
                    $this->Flash->success(__("Data Saved Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }else{
                    $this->Flash->error(__("Data Saved Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
            }

            if($sessionVacId == 4){
//                echo "<pre>";print_r($postData); die;
                $post = $postData['post'];
//                $mulDist = $postData['multiiDist'];
//                $mulDists = '';
//                if(!empty($mulDist) && count($mulDist) > 1){
//                    foreach($mulDist as $pKey => $pVal){
//                        $mulDists .= $pVal.',';
//                    }
//                }
//                $mulDists = rtrim($mulDists,',');//die;
//                echo "<pre>"; print_r($mulDists); "<pre>"; die;
                $postByPriority = $postData['multiiDist'];
                $namHn = $postData['namHn'];
                $fatNam = $postData['fatNam'];
                $fatNamHn = $postData['fatNamHn'];
                $permantStat = $postData['permantStat'];
                $permantDist = $postData['permantDist'];
                $permantAdd = $postData['permantAdd'];
                $permantPin = $postData['permantPin'];
                $currStat = $postData['currStat'];
                $currDist = $postData['currDist'];
                $currAdd = $postData['currAdd'];
                $currPin = $postData['currPin'];
                $age = $postData['age'];
                $cate = $postData['cat'];
                $graduTotMrk = $postData['graduTotMrk'];
                $graduObtMrk = $postData['graduObtMrk'];
                $graduPrecntMrk = $postData['graduPrecntMrk'];
                $master = $postData['master'];
                if(empty($master)){
                    $master = 2;
                }

                if($master == 1){
                    $masterTotMrk = $postData['masterTotMrk'];
                    $masterObtMrk = $postData['masterObtMrk'];
                    $masterPrecntMrk = $postData['masterPrecntMrk'];
                }else{
                    $masterTotMrk = '0';
                    $masterObtMrk = '0';
                    $masterPrecntMrk = '0';
                }
                $phd = $postData['phd'];
                if(empty($phd)){
                    $phd = 2;
                }

                if($phd == 1){
                    $phdTotMrk = $postData['phdTotMrk'];
                    $phdObtMrk = $postData['phdObtMrk'];
                    $phdPrecntMrk = $postData['phdPrecntMrk'];
                }else{
                    $phdTotMrk = '0';
                    $phdObtMrk = '0';
                    $phdPrecntMrk = '0';
                }
                $exp1 = $postData['exp2'];
                $exp2 = $postData['exp3'];
                $exp3 = $postData['exp4'];
                $exp4 = $postData['exp5'];
                $exp5 = $postData['exp6'];
                if(array_key_exists('exp2Month',$postData)){
                    $exp1Mnth = $postData['exp2Month'];
                }else{
                    $exp1Mnth ='0';
                }
                if(array_key_exists('exp3Mnth',$postData)){
                    $exp2Mnth = $postData['exp3Mnth'];
                }else{
                    $exp2Mnth ='0';
                }
                if(array_key_exists('exp4Mnth',$postData)){
                    $exp3Mnth = $postData['exp4Mnth'];
                }else{
                    $exp3Mnth ='0';
                }
                if(array_key_exists('exp5Mnth',$postData)){
                    $exp4Mnth = $postData['exp5Mnth'];
                }else{
                    $exp4Mnth ='0';
                }
                if(array_key_exists('exp6Mnth',$postData)){
                    $exp5Mnth = $postData['exp6Mnth'];
                }
                else{
                    $exp5Mnth   = '0';
                }

                $pdsStDistWork = $postData['exp7'];
                if(array_key_exists('exp7Mnth',$postData)){
                    $pdsStDistWorkMnth = $postData['exp7Mnth'];
                }
                else{
                    $pdsStDistWorkMnth   = 0;
                }
                $pdsStDistWrkAdd  = $postData['knownAddress'];
                $minExp15 = $postData['minExp15'];
                $ghosna1 = $postData['ghosna1'];
                $ghosna2 = $postData['ghosna2'];
                $ghosna3 = $postData['ghosna3'];
                $ghosna4 = $postData['ghosna4'];
                $ghosna5 = $postData['ghosna5'];
                $ghosna6 = $postData['ghosna6'];
                $finSave = $postData['finSave'];
                $step = '2';

                // validations
                if($post == ''){
                    $this->Flash->error(__("Post is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($namHn == ''){
                    $this->Flash->error(__("Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($fatNam == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($fatNamHn == ''){
                    $this->Flash->error(__("Father's Name is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantStat == ''){
                    $this->Flash->error(__("Select Permanent State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantDist == ''){
                    $this->Flash->error(__("Select Permanent District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($permantPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currStat == ''){
                    $this->Flash->error(__("Select current State."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currDist == ''){
                    $this->Flash->error(__("Select Current District."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currAdd == ''){
                    $this->Flash->error(__("Address Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($currPin == ''){
                    $this->Flash->error(__("Pincode Is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($age == ''){
                    $this->Flash->error(__("Age is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($cate == ''){
                    $this->Flash->error(__("Category is mandatory."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
//                if($expe == ''){
//                    $this->Flash->error(__("All the fields are mandatory."));
//                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
//                }

                if($ghosna1 == ''){
                    $this->Flash->error(__("Select swa-ghosna1."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna2."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna2 == ''){
                    $this->Flash->error(__("Select swa-ghosna3."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna4 == ''){
                    $this->Flash->error(__("Select swa-ghosna4."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna5 == ''){
                    $this->Flash->error(__("Select swa-ghosna5."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
                if($ghosna6 == ''){
                    $this->Flash->error(__("Select swa-ghosna6."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }

//                echo "update cf_applicant_members set post_name = '$post',district_priority_by_post = '$postByPriority', name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age',catagory='$cate',exp_duration_15yrs = '$minExp15',graduation_total_marks = '$graduTotMrk',graduation_obtain_marks = '$graduObtMrk',graduation_percentage = '$graduPrecntMrk',master_degree = '$master',master_degree_total_marks = '$masterTotMrk',master_degree_obtain_marks = '$masterObtMrk',master_degree_percentage = '$masterPrecntMrk',phd_degree = '$phd',phd_degree_total_marks = '$phdTotMrk',phd_degree_obtain_marks = '$phdObtMrk',phd_degree_percentage = '$phdPrecntMrk',experience_1 = '$exp1',experience_2 = '$exp2',experience_3 = '$exp3',experience_4 = '$exp4',experience_5 = '$exp5',experience_1_duration = '$exp1Mnth',experience_2_duration = '$exp2Mnth',experience_3_duration = '$exp3Mnth',experience_4_duration = '$exp4Mnth',experience_5_duration = '$exp5Mnth',pds_st_dist_work = '$pdsStDistWork',pds_st_dist_work_address = '$pdsStDistWrkAdd',pds_st_dist_work_duration = '$pdsStDistWorkMnth',declaration_1='$ghosna1',declaration_2='$ghosna2',declaration_3='$ghosna3',declaration_4='$ghosna4',declaration_5='$ghosna5',declaration_6='$ghosna6', step_no='$step' where registration_no = '$sessionReg'";die;

                $updateDatas = $connection->execute("update cf_applicant_members set post_name = '$post',district_priority_by_post = '$postByPriority', name_hn='$namHn',fathername='$fatNam',fathername_hn = '$fatNamHn', permanent_state = '$permantStat', permanent_district = '$permantDist', permanent_pincode = '$permantPin', permanent_address = '$permantAdd', temporary_state = '$currStat', temporary_district = '$currDist', temporary_address = '$currAdd', temporary_pincode = '$currPin', age = '$age',catagory='$cate',exp_duration_15yrs = '$minExp15',graduation_total_marks = '$graduTotMrk',graduation_obtain_marks = '$graduObtMrk',graduation_percentage = '$graduPrecntMrk',master_degree = '$master',master_degree_total_marks = '$masterTotMrk',master_degree_obtain_marks = '$masterObtMrk',master_degree_percentage = '$masterPrecntMrk',phd_degree = '$phd',phd_degree_total_marks = '$phdTotMrk',phd_degree_obtain_marks = '$phdObtMrk',phd_degree_percentage = '$phdPrecntMrk',experience_1 = '$exp1',experience_2 = '$exp2',experience_3 = '$exp3',experience_4 = '$exp4',experience_5 = '$exp5',experience_1_duration = '$exp1Mnth',experience_2_duration = '$exp2Mnth',experience_3_duration = '$exp3Mnth',experience_4_duration = '$exp4Mnth',experience_5_duration = '$exp5Mnth',pds_st_dist_work = '$pdsStDistWork',pds_st_dist_work_address = '$pdsStDistWrkAdd',pds_st_dist_work_duration = '$pdsStDistWorkMnth',declaration_1='$ghosna1',declaration_2='$ghosna2',declaration_3='$ghosna3',declaration_4='$ghosna4',declaration_5='$ghosna5',declaration_6='$ghosna6', step_no='$step' where registration_no = '$sessionReg'");

                if($updateDatas) {
                    $this->Flash->success(__("Data Saved Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }else{
                    $this->Flash->success(__("Data Not Updated Successfully."));
                    return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerPreview']);
                }
            }
        }
        //$this->set(compact('data','sessionVacId','sessionReg'));
    }

    public function cfLogout(){
        $session = $this->getRequest()->getSession();
        $session->delete('regNo');
		$session->delete('vaccId');
        $session->destroy();
        $this->Flash->success(__('Logout successfully'));
        return $this->redirect(['controller'=>'CfApplicantMembers', 'action'=>'consumerLogin']);
    }
}
