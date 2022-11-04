<?php
namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class StatProductsTable extends DataBaseTable  {

    function getName()
    {
        return $this->wpdb->prefix . "pys_stat_product_order";
    }

    function getCreateSql()
    {
        $collate = '';
        $tableName = $this->getName();
        if ( $this->wpdb->has_cap( 'collation' ) && $this->wpdb->get_charset_collate() != false) {
            $collate = $this->wpdb->get_charset_collate();
        }
        return "CREATE TABLE $tableName (
              id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
              order_id BIGINT UNSIGNED NOT NULL,
              product_id BIGINT UNSIGNED NOT NULL,
              product_name  char(100)  NOT NULL,
              qty INT UNSIGNED NOT NULL, 
              gross_sale FLOAT UNSIGNED NOT NULL,
              type TINYINT NOT NULL,
              date timestamp default current_timestamp, 
              PRIMARY KEY  (id)
            ) $collate;";
    }

    /**
     * @param \EDD_Payment $payment
     */
    function addEddOrderProducts($payment) {
        $cart_details = $payment->cart_details;

        foreach ($cart_details as $cart_item_key => $cart_item) {
            $productId = (int)$cart_item['id'];
            $post = get_post($productId);
        }
    }


    function addOrderProducts($orderItems) {
        foreach ($orderItems as $item) {
            $this->wpdb->insert($this->getName(),$item,[
                "%d","%d","%s",
                "%d","%f",
                "%d",'%s'
            ]);
        }
    }

    function getProductsList($orderIds,$orderBy,$order,$type,$perPage,$page) {
        $start = ($page - 1) * $perPage;
        $data = [];
        $in = '(' . implode(',', $orderIds) .')';
        $sql = $this->wpdb->prepare("
                   SELECT product_id, product_name, count(DISTINCT order_id) as count_order,  ROUND(SUM(gross_sale),2) as gross,SUM(qty) as qty
                    FROM {$this->getName()}
                    WHERE order_id in $in and type = %d
                    GROUP BY product_id
                    ORDER BY $orderBy $order
                    LIMIT %d, %d"
            ,$type,$start,$perPage);
        PYS()->getLog()->debug("getProductsList ".$sql);
        $rows = $this->wpdb->get_results($sql);
        foreach ($rows as $row) {
            $data[] = ["id"=>$row->product_id,"name"=>$row->product_name,"qty"=>$row->qty,"orders"=>$row->count_order,"gross"=>$row->gross];
        }
        return $data;
    }




    function getProductsStat($products,$orders,$typeId,$orderBy,$order) {
        $data = [];
        $in = '(' . implode(',', $products) .')';
        $inOrders = '(' . implode(',', $orders) .')';
        $col = "";
        if($orderBy == "qty") {
            $col = "sum(qty) as qty";
        }
        if($orderBy == "count_order") {
            $col = "count(DISTINCT order_id) as count_order";
        }
        if($orderBy == "gross") {
            $col = "ROUND(SUM(gross_sale),2) as gross";
        }

        $sql = $this->wpdb->prepare("
                    SELECT $col,CAST(date AS DATE) createDate  
                    FROM {$this->getName()}
                    WHERE product_id in $in AND order_id in $inOrders AND type = %d 
                    GROUP BY createDate
                    ORDER BY $orderBy $order ",$typeId);

        PYS()->getLog()->debug("getStatForProducts $orderBy ".$sql);
        $rows = $this->wpdb->get_results($sql);
        foreach ($rows as $row) {
            $data[] = ["y"=>$row->$orderBy,"x"=>$row->createDate];
        }

        return $data;

    }

    function getProductsTotal($orders,$typeId) {
        $data = [];
        $inOrders = '(' . implode(',', $orders) .')';
        $sql = $this->wpdb->prepare("
                    SELECT count(DISTINCT product_id) as ids,count(DISTINCT order_id) as orders, SUM(qty) as qty, ROUND(SUM(gross_sale),2) as gross  
                    FROM {$this->getName()}
                    WHERE order_id in $inOrders AND type = %d 
                   
                    ",$typeId);

        PYS()->getLog()->debug("getStatForProducts ".$sql);
        $row = $this->wpdb->get_row($sql);
        $symbols = $typeId == 0 ? get_woocommerce_currency_symbol() : edd_currency_symbol();
        $data[] = ["name"=>"Products: ","value"=>$row->ids];
        $data[] = ["name"=>"Quantity: ","value"=>$row->qty];
        $data[] = ["name"=>"Orders: ","value"=>$row->orders];
        $data[] = ["name"=>"Gross Sale: ","value"=>$row->gross.$symbols];
        return $data;
    }

    function deleteOrderProduct($orderId,$typeId) {
        $this->wpdb->delete($this->getName(),['order_id' => $orderId,'type' => $typeId],["%d","%d"]);
    }
    /**
     * @param int $typeId
     */
    function clear($typeId) {
        $this->wpdb->delete($this->getName(),['type' => $typeId],["%d"]);
    }


}