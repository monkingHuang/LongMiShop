<?php
namespace Index\Controller;

class WidgetController extends IndexBaseController {

    function exceptAuthActions()
    {
        return array(
            "getExpress"
        );
    }

    public function _initialize() {
        parent::_initialize();
    }

    //物流信息
    public function express(){
        $id = I('get.id',null);

//         $result = getExpress($id);
//         if( callbackIsTrue($result) ){
//            if($result['data']['status'] == 1){
//                //支付时间
//                $pay_time = M('order')->field('pay_time')->where("order_id = '".$id."'")->find();
//                $this->assign('pay_time',$pay_time['pay_time']);
//                $this->assign('expressData', $result['data']);
//            }else{
//                $this->assign('expressMessage', $result['data']['message']);
//            }
//         }else{
//             $this->assign('expressMessage', $result['msg'] );
//         }
        $delivery = M('delivery_doc')->where("order_id='$id'")->limit(1)->find();
        if(empty($delivery)){
            $this->assign('expressMessage', '查询物流失败' );
        }
        $result = kuaidi($delivery['invoice_no'],$delivery['shipping_name']);
//        dd($result);
        if( $result['status'] == 200  ){
//            dd($result['data']);
            //支付时间
            $pay_time = M('order')->field('pay_time')->where("order_id = '".$id."'")->find();
            $this->assign('pay_time',$pay_time['pay_time']);
            $this->assign('expressData', $result);
            $this->assign('odd_numbers',$delivery['invoice_no']);
        }else{
            $this->assign('expressMessage', $result['message'] );
        }
        $this->display();
    }
}