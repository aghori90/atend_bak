<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use http\Env\Response;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    // public $components = array('BarCode.BarCode');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public $components = array('CustomValidation');

    public function index()
    {

        /*$this->paginate = [
            //'contain' => ['Roles', 'DsoMasters', 'SdoMasters', 'BsoMasters', 'MoMasters', 'DepotMasters', 'DmsfcMasters', 'Groups', 'Districts', 'BlockCities', 'SubDivisions']
            'contain' => []
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));*/
    }

    /*Registration*/
    public function registration()
    {
        $connection = ConnectionManager::get('default');
        // designations
        // $desig = $connection->execute("select name from desination")->fetchAll('assoc');
        // $empid  = $det[0]['username'];
        //gender Data
        $desigData = TableRegistry::get('desination');
        $query = $desigData->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
//            'conditions' => ['Dealers.rgi_block_code=' . "'" . $id . "'"]

        ]);
        $desig = $query->toArray();
        // echo "<pre>";print_r($desig);die;
        $uploadData = '';
        $status = $statusMsg = '';
        if ($this->request->is('post')) {
            $request_data = $this->getRequest()->getData();
        //    echo "<pre>";print_r($request_data);die;
            /*Fetching data using Post method*/
            $desig      = $request_data['desig'];
            $dob        = $request_data['dob'];
            $fName      = $request_data['fname'];
            $lName      = $request_data['lname'];
            $empId      = $request_data['empId'];
            $passwd     = sha1($request_data['Pass']);
            $cnfpaswd   = sha1($request_data['cpass']);
            $gend       = $request_data['gend'];
            $email      = $request_data['email'];
            $mobile     = $request_data['mob'];
            // $fileName   = $request_data['file'];
            // $fileType   = pathinfo($fileName, PATHINFO_EXTENSION);
            // $imag       = $request_data['img'];
            // $fileType   = pathinfo($imag, PATHINFO_EXTENSION); // for file extnsn
//            $allowTypes = array('jpg','png','jpeg');
            $groupId    = '13';
            $created    = date('Y-m-d H:i:s');;
            $modified   = date('Y-m-d H:i:s');;
            //echo $imag; die;

            /*Server Side Validation*/
            if ($passwd!=$cnfpaswd){
                $this->Flash->error(__('Password & Confirm Passwrd should be same.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'registration']);
            }

            $det = $connection->execute("select username,email,mobile from users where username ='$empId'")->fetchAll('assoc');
            // echo "<pre>";print_r($det);die;
            $empid  = $det[0]['username'];
            $em     = $det[0]['email'];
            $mob    = $det[0]['mobile'];
            // echo $empid; die;
            if($empid==1){
                $this->Flash->error(__('Employee Id already exist.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'registration']);
            }
            if($em==1){
                $this->Flash->error(__('Email already exist.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'registration']);
            }
            if($mob==1){
                $this->Flash->error(__('Mobile No already exist.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'registration']);
            }

            /*Data Insertion into table*/
//            if(in_array($fileType, $allowTypes)){
                // $image = $_FILES['file']['tmp_name']; die;
                // $imgContent = addslashes(file_get_contents($image));
                // echo "insert into users(desig, dob, f_name, l_name, username, password, gender, email, mobile, img, group_id,created, modified) Values ('$desig','$dob','$fName', '$lName', '$empId', '$passwd','$gend','$email','$mobile', '$imag','$groupId','$created', '$modified')"; die;
                $insert = $connection->execute("insert into users(desig, dob, f_name, l_name, username, password, gender, status, email, mobile, group_id,created, modified) Values ('$desig','$dob','$fName', '$lName', '$empId', '$passwd','$gend', '1' ,'$email','$mobile', '$groupId','$created', '$modified')");
                if($insert){
                    $this->Flash->success(__('User has been Registered Successfully'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }else{
                    $this->Flash->error(__('User Registration Failed, Try again.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'registration']);
                }
//            }else{
//                $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
//            }

        }
        $this->set(compact('desig','uploadData'));
    }

    public function login()
    {
    //    die('123');
        $connection = ConnectionManager::get('default');
        $this->set("title", "Login");
//        $otp = '';
//        $yFlg = '';
        if ($this->request->is('post')) {
            $request_data = $this->getRequest()->getData();
        //    echo "<pre>";print_r($request_data);die;
            $u_name = $request_data['username'];
            $password = $request_data['password'];

            // server side validations
            if (empty($u_name)) {
                $this->Flash->error(__('Please enter Username.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            if (empty($password)) {
                $this->Flash->error(__('Please enter Password.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }

            // checking authentication
            if ($this->Auth->user('id')) { //if already loggedin
                // print_r($this->Auth->user('id')); die;
                $this->Flash->error(__('You are already logged in!'));
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            } else {
                $user = $this->Auth->identify();
                // echo $user['id'];die;
                $this->request->session()->write('loggedinUser.id', $user['id']);
                $this->request->session()->write('loggedinUser.username', $user['username']);
                $getStatus=$connection->execute("select status from users where username='$u_name'")->fetchAll('assoc');
                $status = $getStatus[0]['status'];
                // For correct  Login
                if( $status==1){
                    if ($user) {
                        $this->Auth->setUser($user);
                        // $this->Flash->success(__('Login Successfull'));
    //                    echo "<pre>";print_r($user);die;
                        if (($user['group_id'] == 12)) {
                            $this->Flash->success(__('Login Successfull'));
                            return $this->redirect(['controller' => 'Users', 'action' => 'admin']);
                        }
                        if (($user['group_id'] == 13)) {
                            $this->Flash->success(__('Login Successfull'));
                            return $this->redirect(['controller' => 'Users', 'action' => 'employee']);
                        }
                    }
                    // For incorrect Login
                    $this->Flash->error(__('Incorrect Login.'));
                }else{
                    $this->Flash->error(__('User is Inactive.'));
                }              
            }
        }
    }

    public function admin()
    {
        // die('abc');
        $this->set('title', 'District Supervision Officer Home');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [12];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
    }

    public function employee()
    {
        // die('abc');
        $this->set('title', 'Employee');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $username = $session_data['Auth']['User']['username'];
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [13];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }else{
            date_default_timezone_set('Asia/Kolkata');
            $chkout = date("h:i:s");
            $date   = date('Y-m-d');
//            echo "Select * from in_out_records where username = '$username' and created = '$date'"; die;
            $record=$connection->execute("Select * from in_out_records where username = '$username' and created = '$date'")->fetchAll('assoc');
//             echo "<pre>";print_r($record);die;
            $detail=$connection->execute("Select * from users where id = '$user_id'")->fetchAll('assoc');
            // echo "<pre>";print_r($detail);die;
            $uname = $detail[0]['username'];
            $fname = $detail[0]['f_name'];
            $lname = $detail[0]['l_name'];
            $desig = $detail[0]['desig'];
            $img   = $detail[0]['img'];
            // echo $img;exit;
            $today   = date('Y-m-d');

            /*check in_out_record*/
//            echo "select * from in_out_record where username ='$uname' and created='$dat'"; die;
            $getchekin =$connection->execute("select * from in_out_records where username = '$uname' and created = '$today' order by in_time desc ")->fetchAll('assoc');
            // echo "<pre>";print_r($getchekin);die;
            $chkInCretd = $getchekin[0]['created'];
            $chkInTime  = $getchekin[0]['in_time'];

        }

        $this->set(compact('uname','fname', 'lname','desig', 'img','user_id','chkInTime','record'));
    }

    public function logout()
    {
        $session = $this->getRequest()->getSession();
        // Start : Update logout_time in UserLogs Table
        $session_data = $this->getRequest()->getSession()->read();
        //echo "<pre>";print_r($session_data);die;
        $connection = ConnectionManager::get('default');
        $session->destroy();
//        $this->Flash->success(__('Logout successfully'));
        return $this->redirect($this->Auth->logout());
    }

    // password reset
    public function resetPass()
    {

        // echo sha1('Sdc@12345'); die;
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $sGroups = [12];

        if ($this->request->is('post')) {
            $username = $this->request->data['username'];
            // echo $username; die;
            $check = $connection->execute("SELECT group_id, username from users where username='" . $username . "'");
            $check = $check->fetchAll('assoc');
            $usrNm = $check[0]['username'];
            $grpId = $check[0]['group_id'];

            if (!empty($username)) {
                // if ($sGroupId == 12) {
                    // if (in_array($grpId, $sGroups)) {
                        // if (count($check) == 1) {
                            $check = $check[0]['username'];
                            // echo "UPDATE users SET password = '8f99b2e01d93a0a9be7029fa24eafd9aaab49fbe' WHERE username ='" . $usrNm . "'";die;
                            $true = $connection->execute("UPDATE users SET password = '8f99b2e01d93a0a9be7029fa24eafd9aaab49fbe' WHERE username ='" . $usrNm . "'");
                            if ($true) {
                                $this->Flash->success('Your Password has been reset.');
                                // return $this->redirect(['controller' => 'users', 'action' => 'dsoHome']);
                            }
                        // } else {
                        //     $this->Flash->error('Please Enter Correct Username');
                        //     // return $this->redirect(['controller' => 'users', 'action' => 'resetPass']);
                        // }
                    // }
                    // else {
                    //     $this->Flash->success('You are not authorised to change this password');
                        // return $this->redirect(['controller' => 'users', 'action' => 'resetPass']);
                    // }

                // }
                // else if ($sGroupId == 13) {
                //     if (count($check) == 1) {
                //         $check = $check[0]['username'];
                //         $true = $connection->execute("UPDATE users SET password = '1d04e026a75e3ac75ee8bbae7e4e976557ebac88' WHERE username ='" . $usrNm . "'");
                //         if ($true) {
                //             $this->Flash->success('Your Password has been reset.');
                //             return $this->redirect(['controller' => 'users', 'action' => 'departmentHome']);
                //         }
                //     } else {
                //         $this->Flash->error('Please Enter Correct Username');
                //         return $this->redirect(['controller' => 'users', 'action' => 'resetPass']);
                //     }
                // } else {
                //     $this->Flash->success('You are not authorised to change this password');
                //     return $this->redirect(['controller' => 'users', 'action' => 'resetPass']);
                // }
            }
        }
    }

    // change password
    public function changePass()
    {

        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $sUserNm = $session_data['Auth']['User']['username'];
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [12,13];
//        $otp = '';

        if ($this->request->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $oldpassword        = $request_data['oldpassword'];
            $random             = $request_data['random'];
            $password           = $request_data['password'];
            $confirmpassword    = $request_data['confirmpassword'];
            $random_one         = $request_data['random_one'];
            $currTime           = date('Y-m-d H:i:s');

            $this->loadModel('UsersTable');
            $passchange = TableRegistry::getTableLocator()->get('users')->find('all', array('fields' => array('users.password'), 'conditions' => array('users.username=' . "'" . $sUserNm . "'")));
            $obj_to_array_passchange    = $passchange->toArray();
            $db_pass                    = $obj_to_array_passchange[0]['password'];
            $enc_pass                   = sha1($db_pass . $random);
            $random_one                 = sha1($random_one);

            if ($password != $confirmpassword) {
                $this->Flash->error(__('New and Confirm Password do not match.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'changePass']);
            }

            if ($enc_pass == $oldpassword) {
                $updatePass = $connection->execute("UPDATE users SET password = '$random_one' WHERE username ='" . $sUserNm . "'" );
                if($updatePass){
                    $this->Flash->success(__('Password has been updated'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'changePass']);
                }
            } else {
                $this->Flash->error('Incorrect Old Password');
                return $this->redirect(['controller' => 'users', 'action' => 'changepass']);
            }
        }
    }

    //user status
    public function userStatus(){
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $sUserNm = $session_data['Auth']['User']['username'];
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [12];

        $desigData = TableRegistry::get('desination');
            $query = $desigData->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]);
            $desig = $query->toArray();

        $details = $connection->execute("select username, f_name, l_name, desig, status from users")->fetchAll('assoc');
        // echo "<pre>"; print_r($details); "<pre>"; die;
        if ($this->request->is('post')) {
            $request_data = $this->getRequest()->getData();
            // echo "<pre>"; print_r($request_data); "<pre>"; die;
            $empId = $request_data['username'];
            $getStatus=$connection->execute("select status from users where username='$empId'")->fetchAll('assoc');
            $status = $getStatus[0]['status'];
            if($status!=0){
                $updateStatus = $connection->execute("update users set status='0' where username='$empId'");
                $this->Flash->error('User Status has been Updated.');
                return $this->redirect(['controller' => 'users', 'action' => 'userStatus']);
            }else{
                $updateStatus = $connection->execute("update users set status='1' where username='$empId'");
                $this->Flash->error('User Status has been Updated.');
                return $this->redirect(['controller' => 'users', 'action' => 'userStatus']);
            }
        }

        $this->set(compact('details','desig'));
    }

}
