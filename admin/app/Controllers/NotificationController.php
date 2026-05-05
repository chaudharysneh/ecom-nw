<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CouponModel;
use App\Models\FaqsModel;
use App\Models\SeoModel;
use App\Models\Ordermodel;
use App\Models\TestimonialModel;
use App\Models\EnquiryModel;
use App\Models\productmodel;
use App\Models\Orderitemmodel;
use App\Models\Ordercommentmodel;
use App\Models\catagorymodel;
use App\Models\UserModel;
use App\Models\shippingmethodmodel;
use App\Models\shippingratemodel;
use App\Models\shippingzonemodel;
use App\Models\CountryModel;
use App\Models\ChatModel;
use App\Models\ShippingDataModel;
use App\Models\Allsettingsmodel;
use App\Models\CityModel;
use App\Models\StateModel;
use App\Models\TaxesModel;
use App\Models\NotificationModel;



class NotificationController extends BaseController
{
    public function index()
    {
        $ordermodel = new Ordermodel();

        $notifications = $ordermodel->where('is_read',0)->orderBy('Created_at', 'DESC')->findAll(5);

        $formattedNotifications = [];

        foreach ($notifications as $notification) {
            $order_number = $notification['fname'];
            $order_status = $notification['OrderStatus'];
            $order_date = date('F j, Y, g:i a', strtotime($notification['Created_at'])); 

            $formattedNotifications[] = [
                'id' => $notification['OrderID'], 
                'title' => $order_number,
                'description' => 'Order Status: ' . $order_status ,
            ];
        }

        return $this->response->setJSON($formattedNotifications);
    }

    public function deleteNotification($id)
    {
        $ordermodel = new Ordermodel();

        $existing_data = $ordermodel->where('OrderID', $id)->first();

        if ($existing_data) 
        {
            $data = [
                'is_read' => 1
            ];

            if ($ordermodel->update($id, $data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Notification marked as read.']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to remove notification.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Notification not found.']);
        }
    }

    public function notification_page()
    {
        $ordermodel = new Ordermodel();

        $notifications = $ordermodel->where('is_read',0)->orderBy('Created_at', 'DESC')->findAll();

        $formattedNotifications = [];

        foreach ($notifications as $notification) {
            $order_number = $notification['OrderNumber'];
            $order_status = $notification['OrderStatus'];
            $order_date = date('F j, Y, g:i a', strtotime($notification['Created_at'])); 

            $formattedNotifications[] = [
                'id' => $notification['OrderID'], 
                'title' => 'New Order : ' . $order_number,
                'description' => 'Order Status : ' . $order_status . '. The order was placed on ' . $order_date . ' and is currently being processed.',
            ];
        }

        return view('notification_view',['data'=>$formattedNotifications]);

    }

    




}
