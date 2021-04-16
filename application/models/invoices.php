<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoices extends CI_Model {
    public function store(){
        if($this->input->post('method') == 'COD'){
            $data = array(
                'id'            => uniqid('invoice'),
                'user'          => $this->session->userdata('username'),
                'warung'        => $this->input->post('warung'),
                //'origin'        => $this->input->post('origin'),
                'origin'        => $this->input->post('origin'),
                'origin_id'     => $this->input->post('origin-place_id'),
                //'origin_id'     => $this->input->post('origin-place_id'),
                //'destination'   => $this->input->post('destination'),
                //'destination_id'=> $this->input->post('destination-place_id'),
                'destination'   => $this->input->post('destination'),
                'destination_id'=> $this->input->post('destination-place_id'),
                'distance'      => floatval($this->input->post('distance')),
                'delivery_fee'  => $this->input->post('delivery_fee'),
                'billing'       => $this->input->post('billing'),
                'total'         => $this->input->post('total'),
                'status'        => 'Menunggu proses penjual',
                'method'            => $this->input->post('method'),
                
            );
        }else{
            $data = array(
                'id'            => uniqid('invoice'),
                'user'          => $this->session->userdata('username'),
                'warung'        => $this->input->post('warung'),
                //'origin'        => $this->input->post('origin'),
                'origin'        => $this->input->post('origin'),
                'origin_id'     => $this->input->post('origin-place_id'),
                //'origin_id'     => $this->input->post('origin-place_id'),
                //'destination'   => $this->input->post('destination'),
                //'destination_id'=> $this->input->post('destination-place_id'),
                'destination'   => $this->input->post('destination'),
                'destination_id'=> $this->input->post('destination-place_id'),
                'distance'      => floatval($this->input->post('distance')),
                'delivery_fee'  => $this->input->post('delivery_fee'),
                'billing'       => $this->input->post('billing'),
                'total'         => $this->input->post('total'),
                'status'        => 'Menunggu verif pembayaran',
                'method'        => $this->input->post('method'),
                'bank_account_number'        => $this->input->post('account_number'),
                'bank_account_name'        => $this->input->post('account_name'),
                'bank_type'        => $this->input->post('bank_type'),
                'bank_to'        => $this->input->post('bank_tujuan'),
            );
        }

        $this->db->insert('invoices',$data);

        $count  = count($_POST['item']);
        for($i=0; $i<$count; $i++){
            $this->store_details($data['id'],$_POST['item'][$i],$_POST['price'][$i],$_POST['quantity'][$i]);
            $this->delete_cart_details($this->input->post('cart_id'),$_POST['item'][$i]);
        }
    }

    public function store_details($id,$item,$price,$quantity){
        $data = array(
            'id' => $id,
            'item' => $item,
            'price' => $price,
            'quantity' => $quantity
        );

        $this->db->insert('invoice_details',$data);
    }

    public function delete_cart_details($id,$item){
        $this->db->where('id',$id);
        $this->db->where('item',$item);
        return $this->db->delete('cart_details');
    }

    public function get_all_invoices($username){
        $this->db->select('
        invoices.id invoice_id, invoices.status invoice_status, invoices.total total, invoices.billing billing,
        users.name warung_name, users.username warung_username, invoices.method, invoices.proof_of_payment,invoices.date          
        ');
        $this->db->from('invoices');
        $this->db->join('users','users.username = invoices.warung');
        if($this->session->userdata('role') == 0){
            $this->db->where('invoices.user',$username);
        }elseif($this->session->userdata('role') == 1){
            $this->db->where('invoices.warung',$username);
        }else {
            return null;
        };
        $this->db->group_by('invoices.id');
        $this->db->order_by('date','DESC');
        return $this->db->get()->result_array();

    }

    public function get_invoice_details_items($id){
        $this->db->select('items.id item_id,items.stock item_stock, invoice_details.quantity quantity');
        $this->db->from('invoice_details');
        $this->db->join('items','invoice_details.item = items.id');
        $this->db->where('invoice_details.id',$id);
        return $this->db->get()->result_array();
    }

    public function get_invoice_details($username,$id){
        $this->db->select('
        items.photo item_photo, items.name item_name, items.id item_id, DATE_FORMAT(invoices.date , "%d-%m-%Y %k:%i")as tanggal,
        invoices.id invoice_id, invoices.status invoice_status, invoices.total total, invoices.destination destination, invoices.distance distance, invoices.delivery_fee, invoices.billing,
        invoice_details.quantity details_quantity, invoice_details.price  details_price,
        users.name user_name, users.username user_username          
        ');
        $this->db->from('invoices');
        $this->db->join('invoice_details','invoices.id = invoice_details.id');
        $this->db->join('items','items.id = invoice_details.item');
        if($this->session->userdata('role') == 0){
            $this->db->join('users','users.username = invoices.warung');
            $this->db->where('invoices.user',$username);
        }elseif ($this->session->userdata('role') == 1) {
            $this->db->join('users','users.username = invoices.user');
            $this->db->where('invoices.warung',$username);
        }
        $this->db->where('invoices.id',$id);

        return $this->db->get()->result_array();

    }

}?>