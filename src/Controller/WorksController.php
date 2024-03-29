<?php

namespace App\Controller;

use App\Model\Table\UsersTable;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use http\Env\Response;
use function mysql_xdevapi\expression;

/**
 * Users Controller
 *
 * @property UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorksController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['serverMonitor']);

        // Include the FlashComponent
        $this->loadComponent('Flash');

        // Load Files model
        $this->loadModel('Files');

        // Set the layout
//        $this->layout = 'frontend';
    }

    public function index()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getCfDistricts();
        $state = $this->getCfStateName();
        $cfDistricts = [];
        $blocks = [];

        $this->set(compact('districts', 'state', 'cfDistricts', 'blocks'));

    }

    public function dob()
    {

    }

    public function upload()
    {
        $connection = ConnectionManager::get('default');
        $uploadData = '';
        $filesRowNum = '';
        $duplicate = '';
        if ($this->request->is('post')) {
            $data = $this->getRequest()->getData();
//            print_r($data);
            $fileName = $data['file']['name'];
            $fileSize = $data['file']['size'];
            $maxsize = 500000; // allowed file size 500kb
            $allowed = array('png', 'pdf'); //allowed extentions

            //serever side validation
            if ($fileName == '') {
                $this->Flash->error(__('Choose a file.'));
                return $this->redirect(['controller' => 'works', 'action' => 'upload']);
            }

            //checking file already available
            $q1 = $connection->execute("select name from files where name = '$fileName'")->fetchAll('assoc');
            $duplicate = $q1[0]['name'];
            if ($duplicate) {
                $this->Flash->error(__('File already available.'));
                return $this->redirect(['controller' => 'works', 'action' => 'upload']);
            }
            //file insert
            if (!empty($data['file']['name'])) {
                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath . $fileName;
                //check extention
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed)) {
                    $this->Flash->error(__('only PNG is allowed.'));
                    return $this->redirect(['controller' => 'works', 'action' => 'upload']);
                }
                //check file size
                if (($fileSize >= $maxsize) || ($fileSize == 0)) {
                    $this->Flash->error(__('File too large. File must be less than 500 kb.'));
                    return $this->redirect(['controller' => 'works', 'action' => 'upload']);
                }
                if (move_uploaded_file($data['file']['tmp_name'], $uploadFile)) {
                    $uploadData = $this->Files->newEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");
//                    print_r($this->Files->save($uploadData)); die;
                    if ($this->Files->save($uploadData)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('Unable to upload file, please try again.')); // check folder permission once
                }
            } else {
                $this->Flash->error(__('Please choose a file to upload.'));
            }

        }
        //fetching uploaded files
//        $uploadedFiles = $this->Files->find('all',['order'=>['Files.created'=>'DESC']]);
//        echo "select * from files order by created DESC"; die;
        $upFiles = $connection->execute("select * from files order by created DESC limit 1")->fetchAll('assoc');
//        "<pre>";print_r($upFiles);"</pre>";die;


        /*$files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);*/
        $this->set(compact('uploadData', 'upFiles'));

//        echo "<pre>"; print_r($files); "</pre>"; die();
    } //end of function

    public function serverMonitor()
    {
        $connection = ConnectionManager::get('dbRationTest');

        if ($this->request->is('post')) {
            $data = $this->getRequest()->getData();
//            print_r($data); die;
            $ip = $data['IpAddress'];
            $getRecords = $connection->execute("select hostName, ip, totalMem, freeMem, usedMem, totalSpace, FreeSpace, UsedSpace, UsedSpacePercent, created from server_monitor order by created desc limit 5 ")->fetchAll('assoc');
//            print_r($getRecords); die;
        }
        $this->set(compact('getRecords'));

    } //end of function

    public function upImg()
    {

        $connection = ConnectionManager::get('default');
        // $connection = ConnectionManager::get('dbRationTest');
        // If file upload form is submitted
        $session_data = $this->getRequest()->getSession()->read();
        $username = $session_data['Auth']['User']['username'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [12, 13];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $uploadData = '';
        $status = $statusMsg = '';
        if ($this->request->is('post')) {
            $data = $this->getRequest()->getData();
//            print_r($data); die;

            $empId = $data['empId'];
            $fileName = $data['file']['name'];
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            // array('png','pdf');
            $allowTypes = ['png', 'jpeg', 'jpg'];
//            $fileType   = $data['file']['type'];
//            echo $fileType        = $data[pathinfo($fileName, PATHINFO_EXTENSION)];

            if ($username != $empId) {
                $statusMsg = "File upload failed, please try again.";
            }
            if (in_array($fileType, $allowTypes)) {
//                $image = ['file']['tmp_name'];
                $image = $_FILES['file']['tmp_name']; //die;
                $imgContent = addslashes(file_get_contents($image));
                // Insert image content into database
                $update = $connection->query("update users set img='$imgContent', doc_ext='$fileType' where username='$empId'");

                if ($update) {
                    $status = 'success';
                    $statusMsg = "File uploaded successfully.";
                    // $this->redirect(['controller' => 'Users', 'action' => 'employee']);
                } else {
                    $statusMsg = "File upload failed, please try again.";
                    // $this->redirect(['controller' => 'Users', 'action' => 'employee']);
                }
                // die;
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.';
            }

        } else {
            // $statusMsg = 'Please select an image file to upload.';
        }
        // Display status message
        echo $statusMsg;

        // $upFiles = $connection->execute("select * from images order by created DESC")->fetchAll('assoc');
//        "<pre>";print_r($upFiles);"</pre>";die;


        /*$files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);*/
        $this->set(compact('upFiles', 'uploadData', 'groups', 'username'));
    } //end of function

    /*check in*/
    public function checkIn()
    {
        $this->set('title', 'Employee');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [13];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        } else {
            if ($this->request->is('post')) {
                $data = $this->getRequest()->getData();
//                echo "<pre>";print_r($data);die;
                $id = $data['user_id'];
                $detail = $connection->execute("select * from users where id = '$id'")->fetchAll('assoc');
//                echo "<pre>";print_r($detail);die;
                $uname = $detail[0]['username'];
                $fname = $detail[0]['f_name'];
                $lname = $detail[0]['l_name'];
                $desig = $detail[0]['desig'];
                date_default_timezone_set('Asia/Kolkata');
                $chkin = date("h:i:s");
                $created = date('Y-m-d');

//                echo "insert into in_out_records(username,f_name,l_name,designation,in_time,created) values ('$uname','$fname','$lname','$desig','$chkin','$created')"; die;
                $insrt = $connection->execute("insert into in_out_records(username,f_name,l_name,designation,in_time,created) values ('$uname','$fname','$lname','$desig','$chkin','$created')");
//                echo $insrt; die;
                if ($insrt) {
                    $this->Flash->success(__('Checked in successfully.'));
                    $this->redirect(['controller' => 'Users', 'action' => 'employee']);
                } else {
                    $this->Flash->success(__('Oops!, some technical issue.'));
                    $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                }
            }
            $this->set(compact('insrt'));
        }
    }  //end of function

    /*check out*/
    public function checkOut()
    {
        $this->set('title', 'Employee');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [13];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        } else {
            if ($this->request->is('post')) {
                $data = $this->getRequest()->getData();
//                echo "<pre>";print_r($data);die;
                $id = $data['user_id'];
                $detail = $connection->execute("select * from users where id = '$id'")->fetchAll('assoc');
//                echo "<pre>";print_r($detail);die;
                $uname = $detail[0]['username'];
                $desig = $detail[0]['desig'];
                $dat = $detail[0]['created'];
                date_default_timezone_set('Asia/Kolkata');
                $today = date('Y-m-d');
                $chkout = date("h:i:s");
                $modified = date('Y-m-d');
//                echo "select * from in_out_records where username = '$uname' and created = '$today' order by in_time desc "; die;
                $getchekin = $connection->execute("select * from in_out_records where username = '$uname' and created = '$today' order by in_time desc ")->fetchAll('assoc');
//                echo "<pre>";print_r($getchekin);die;
                $chkInCretd = $getchekin[0]['created'];
                $chkInTime = $getchekin[0]['in_time'];
//                echo "<pre>";print_r($getchekin);die;

//                echo "select * from in_out_records where username = '$uname' and created = '$today'";die;

//                echo "update in_out_records set out_time='$chkout', modified = '$modified' where username= '$uname' and created ='$chkInCretd'"; die;
                $updat = $connection->execute("update in_out_records set out_time='$chkout', modified = '$modified' where  username= '$uname' and created ='$chkInCretd'");
//                echo $insrt; die;
                if ($updat) {
                    $this->Flash->success(__('Checked out successfully.'));
                    $this->redirect(['controller' => 'Users', 'action' => 'employee']);
                } else {
                    $this->Flash->success(__('Oops!, some technical issue.'));
                    $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                }
            }
            $this->set(compact('chkInTime'));
        }
    } //end of function

    /*Reports*/
    public function reports()
    {
//        die('123');
        $this->set('title', 'Reports');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $uname = $session_data['Auth']['User']['username'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [13];
        $desigData = TableRegistry::get('desination');
        $query = $desigData->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
        ]);
        $desig = $query->toArray();
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        } else {
            date_default_timezone_set('Asia/Kolkata');
            $year = date('Y');
            $month = date('m');
            // $inOut = $connection->execute("Select in_time, out_time from in_out_records where username ='$uname'")->fetchAll('assoc');
            // // echo "<pre>";print_r($inOut);die;
            // $in  = $inOut[0]['in_time'];
            // $out = $inOut[0]['out_time'];
            // echo SELECT TIMEDIFF('12:05:36','11:43:49') as diff;die;
            $timeDiff = $connection->execute("SELECT TIMEDIFF(out_time, in_time) as diff from in_out_records where username ='$uname' ")->fetchAll('assoc');
            $diff = $timeDiff[0]['diff'];
            $img = $connection->execute("select img from users where username='$uname'")->fetchAll('assoc')[0];

            // echo "<pre>";print_r($img);die;
            if ($this->request->is('post')) {
                $data = $this->getRequest()->getData();
//                echo "<pre>";print_r($data);die;
                $queryCondition = "";
                $from = $data['from'];
                $to = $data['to'];
                $details = $connection->execute("select * from in_out_records WHERE (date(created) between '" . $from . "' AND '" . $to . "' and  username= '" . $uname . "') order by created desc")->fetchAll('assoc');
                //    echo "<pre>";print_r($details);die;
            } else {
                $details = $connection->execute("select * from in_out_records where month(created)='$month' and username='$uname' order by created desc")->fetchAll('assoc');
                // echo "<pre>";print_r($details);die;
            }
        }
        $this->set(compact('details', 'diff', 'desig', 'img'));

    } //end of function

    /*Admin Reports*/
    public function adminReports()
    {
//        die('123');
        $this->set('title', 'Admin Reports');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $uname = $session_data['Auth']['User']['username'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [12];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        } else {
            $desigData = TableRegistry::get('desination');
            $query = $desigData->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]);
            $desig = $query->toArray();
            $usersDetails = $connection->execute("Select username, f_name, l_name from users")->fetchAll('assoc');
            $new_array = [];
            foreach ($usersDetails as $value)
                $new_array[$value['id']] = $value;

            // Total work
            date_default_timezone_set('Asia/Kolkata');
            $year = date('Y');
            $month = date('m');
            $totalWorks = $connection->execute("select username, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(out_time, in_time)))) as total from in_out_records  group by username")->fetchAll('assoc');
            $workHr = array();
            // echo "<pre>";print_r($totalWorks);die;
            foreach ($totalWorks as $totalWork) {
                $workHr[] = $totalWork;
            }
            // echo "<pre>";print_r($workHr);die;
            if ($this->request->is('post')) {
                $data = $this->getRequest()->getData();
//                echo "<pre>";print_r($data);die;
                $condition = "";
                $from = $data['from'];
                $to = $data['to'];
                $empId = $data['empid'];
//                date_default_timezone_set('Asia/Kolkata');
//                $month = date('m');
//                    /*server side validation*/
//                    if($empId==''){
//                        $this->Flash->error(__('Employee Id can not be empty.'));
//                        $this->redirect(['action' => 'adminReports']);
//                    }if($from==''){
//                        $this->Flash->error(__('Employee Id can not be empty.'));
//                        $this->redirect(['action' => 'adminReports']);
//                    }if($to==''){
//                        $this->Flash->error(__('Employee Id can not be empty.'));
//                        $this->redirect(['action' => 'adminReports']);
//                    }
                $details = $connection->execute("select username, f_name, l_name, designation, in_time from in_out_records WHERE (date(created) between '" . $from . "' AND '" . $to . "') group by username ")->fetchAll('assoc');
//              echo "<pre>";print_r($details);die;
                // Total work
                $totalWorks = $connection->execute("select username, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(out_time, in_time)))) as total from in_out_records WHERE (date(created) between '" . $from . "' AND '" . $to . "') and status='1' group by username")->fetchAll('assoc');
                // echo "<pre>";print_r($totalWorks);die;
                // echo "<pre>";print_r($workHr);die;
            } else {
                $details = $connection->execute("select username, f_name, l_name, designation, in_time from in_out_records where EXTRACT(YEAR FROM created)='$year' and  EXTRACT(MONTH FROM created) ='$month' and status='1' group by username ")->fetchAll('assoc');
                // Total work
                // echo "select username, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(out_time, in_time)))) as total from in_out_records where EXTRACT(YEAR FROM created)='$year' and  EXTRACT(MONTH FROM created) ='$month'  group by username"; die;
                $totalWorks = $connection->execute("select username, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(out_time, in_time)))) as total from in_out_records where EXTRACT(YEAR FROM created)='$year' and  EXTRACT(MONTH FROM created) ='$month' and status='1'  group by username")->fetchAll('assoc');
                // echo "<pre>";print_r($totalWorks);die;
                // echo "<pre>";print_r($workHr);die;
            }
            $workHr = array();
            foreach ($totalWorks as $totalWork) {
                $workHr[] = $totalWork;
            }
        }
        $this->set(compact('details', 'name', 'desig', 'workHr'));

    } //end of function

    /*Admin Report in details*/
    public function adminReportDetails()
    {
        $this->set('title', 'Admin Reports');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $uname = $session_data['Auth']['User']['username'];
        $groupId = $session_data['Auth']['User']['group_id'];
        if ($groupId != 12) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        } else {
            date_default_timezone_set('Asia/Kolkata');
            $year = date('Y');
            $month = date('m');

            $desigData = TableRegistry::get('desination');
            $query = $desigData->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]);
            $desig = $query->toArray();

            if ($this->request->is('post')) {
                $data = $this->getRequest()->getData();
//                echo "<pre>";
//                print_r($data);
//                die;
                $user_id = $data['empid'];
                // create a write and read session in cakephp
                $a_session = $this->getRequest()->getSession()->write('user_id', $user_id);
                $sdc = $this->getRequest()->getSession()->read('user_id');
                echo $sdc;
//                die;
                $condition = "";
                $from = $data['from'];
                $to = $data['to'];
                $empId = $data['detail'];
                $timeDiffs = $connection->execute("SELECT TIMEDIFF(out_time, in_time) as diff from in_out_records where username ='$sdc'")->fetchAll('assoc');
                $diff = array();
                foreach ($timeDiffs as $timeDiff) {
                    $diff[] = $timeDiff;
                }
                if ($from != '' && $to != '') {
                    $details = $connection->execute("select * from in_out_records WHERE (date(created) between '" . $from . "' AND '" . $to . "') and username='$sdc' order by created desc")->fetchAll('assoc');
                    echo "if";
                } else {
                    $details = $connection->execute("select * from in_out_records where month(created)='$month' and username='$sdc' order by created desc")->fetchAll('assoc');
                    echo "else";
                }
                $this->set(compact('details', 'name', 'diff', 'desig', 'empId'));   //end of if
            }
        } //end of else
    } //end of function
} //end of class






