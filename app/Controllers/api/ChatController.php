<?php
namespace App\Controllers\api;

use App\Models\UserModel;
use App\Models\ChatModel;
use App\Controllers\BaseController;

class ChatController extends BaseController
{
    protected $userModel;
    protected $chatModel;
    protected $profileImagePath;
    protected $productImagePath;

    public function __construct()
    {
        $this->profileImagePath = base_url('admin/public/upload_images/');
        $this->productImagePath = base_url('admin/public/assets/img/product_images/');

        $db = \Config\Database::connect();
        $this->userModel = new UserModel($db);
        $this->chatModel = new ChatModel($db);
    }

    public function index()
{   
    $userId = $this->request->getPost('userId');

    if (!$userId) {
        return $this->response->setJSON([
            'status' => 0,
            'message' => 'User ID is required.'
        ]);
    }
    $usersWithRole2 = $this->userModel
        ->select('chat.*, 
                  orders.OrderID, orders.OrderNumber, 
                  orderitems.ProductID, orderitems.Quantity, 
                  products.ProductName, products.ProductImage, 
                  users.UserFirstName, users.UserLastName, users.UserProfile, users.UserID')
        ->join('chat', 'users.UserID = chat.sender_id', 'left')
        ->join('orders', 'orders.OrderID = chat.order_id', 'left')
        ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left')
        ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
        ->where('orders.UserID', $userId)
        ->where('users.UserType', 2)
        ->orderBy('chat.chat_id', 'DESC')
        ->findAll();


    foreach ($usersWithRole2 as &$user) {
        $user['UserProfile'] = $user['UserProfile'] 
            ? $this->profileImagePath . $user['UserProfile'] 
            : base_url('admin/public/upload_images/default.jpg');

        $lastMessage = $this->chatModel->where("(sender_id = {$user['UserID']} AND receiver_id = {$userId}) OR (sender_id = {$userId} AND receiver_id = {$user['UserID']})")
            ->orderBy('chat_id', 'DESC')
            ->first();

        $user['last_message'] = $lastMessage ? [
            'message' => $lastMessage['message'] ?? '',
            'sender_id' => $lastMessage['sender_id'] ?? '',
            'receiver_id' => $lastMessage['receiver_id'] ?? '',
            'created_at' => $lastMessage['created_at'] ?? ''
        ] : null;

        $unreadCount = $this->chatModel->where('sender_id', $user['UserID'])
            ->where('receiver_id', $userId)
            ->where('read_status', 0)
            ->countAllResults();

        $user['unread_count'] = $unreadCount;
    }

    return $this->response->setJSON([
        'status' => 1,
        'message' => 'Users retrieved successfully.',
        'data' => $usersWithRole2,
    ]);
}

 private function getRecentsChatIds($recentsChat, $userId)
  {
            $recentsChatIds = [];
    
            foreach ($recentsChat as $latestChat) {
                $otherId = ($latestChat['sender_id'] != $userId) ? $latestChat['sender_id'] : $latestChat['receiver_id'];
                if (!in_array($otherId, $recentsChatIds)) {
                    $recentsChatIds[] = $otherId;
                }
            }
    
            return $recentsChatIds;
        }
        
        public function readNewMsg($userId,$chatUserId,$orderId)
    {
        $chatModel = new ChatModel();
        $checkUnreadMsg = $chatModel
        ->where('sender_id',$chatUserId)
        ->where('receiver_id',$userId)
        ->where('order_id',$orderId)
        ->where('read_status',0)
        ->first();
        
        if($checkUnreadMsg){
            $chatModel
            ->where('sender_id',$chatUserId)
            ->where('receiver_id',$userId)
             ->where('order_id',$orderId)
            ->set(['read_status' => 1])
            ->update();
            
            return $this->response->setJSON(['status' => 1, 'message' => 'Success']);
        }else{
            return $this->response->setJSON(['status' => 0, 'message' => 'Fail']);
        }         
    }
   public function fullChat($userId, $chatUserId, $orderId)
{
    $userModel = new UserModel();
    $chatModel = new ChatModel();
    $url = base_url('admin/public/upload_images/');
    $defaultImage = base_url('admin/public/assets/img/product_images/');
    
    $loginUser = $userModel->select('UserID, UserLastName, UserProfile')->where('UserID', $userId)->first();
    $chatUser = $userModel->select('UserID, UserLastName, UserProfile')->where('UserID', $chatUserId)->first();
   
    $data['loginUser'] = [
        'UserID' => $loginUser['UserID'],
        'UserLastName' => $loginUser['UserLastName'],
        'UserProfile' => $loginUser['UserProfile'] ? $url . $loginUser['UserProfile'] : $defaultImage
    ];
     
    $data['chatUser'] = [
        'UserID' => $chatUser['UserID'],
        'UserLastName' => $chatUser['UserLastName'],
        'UserProfile' => $chatUser['UserProfile'] ? $url . $chatUser['UserProfile'] : $defaultImage
    ];
  
    $data['livechat'] = $chatModel->select("chat_id, order_id, sender_id, receiver_id, msg_type, message, read_status , created_at")
                                  ->where('order_id', $orderId) // Filter by orderId
                                  ->groupStart()
                                    ->where('sender_id', $userId)
                                    ->where('receiver_id', $chatUserId)
                                  ->groupEnd()
                                  ->orGroupStart()
                                    ->where('sender_id', $chatUserId)
                                    ->where('receiver_id', $userId)
                                  ->groupEnd()
                                  ->orderBy('chat_id', 'desc')
                                  ->findAll();

    return $this->response->setJSON(['status' => 1, 'message' => 'LiveChat', 'data' => $data]);
}

public function sendMessage($userId, $chatUserId, $orderId)
{
    $chatModel = new ChatModel();
    $textMessage = $this->request->getPost('textMsg');
    $fileMessage = $this->request->getFile('file');
    $messageType = $this->request->getPost('mType');
    
    $success = false;

    if ($fileMessage && $fileMessage->isValid() && !$fileMessage->hasMoved()) {
        $directory = FCPATH . 'admin/public/upload_images/';
        $mimeType = $fileMessage->getMimeType();
        $newName = $fileMessage->getRandomName();
        $fileMessage->move($directory, $newName);
        $finalFileMessage = $newName;

        $success = $chatModel->insert([
            'sender_id' => $userId,
            'receiver_id' => $chatUserId,
            'order_id' => $orderId,
            'msg_type' => $messageType, 
            'message' => $finalFileMessage,
            'read_status' => 0,
        ]);
    }

    if (!empty($textMessage)) {
        $textInsert = $chatModel->insert([
            'sender_id' => $userId,
            'receiver_id' => $chatUserId,
            'order_id' => $orderId,
            'msg_type' => 1, 
            'message' => $textMessage,
            'read_status' => 0,
        ]);

        
        if ($textInsert) {
            $success = true;
        }
    }
    
    if ($success) {
        return $this->response->setJSON(['status' => 1, 'message' => 'Success']);
    } else {
        return $this->response->setJSON(['status' => 0, 'message' => 'Fail']);
    }
}


}
