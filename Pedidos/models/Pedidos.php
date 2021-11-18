<?php
class Pedidos extends conectar{

    public function Get_Pedidos(){
        $conectar= parent :: conexion();
        parent::set_name();
        $sql = "SELECT * FROM ma_pedidos WHERE estado = 1";
        $sql = $conectar-> prepare($sql);
        $sql->execute();
        return $resultado= $sql -> fetchALL (PDO::FETCH_ASSOC);
    }
    public function Get_Pedido($ID){
        $conectar= parent::conexion();
        parent::set_name();
        $sql = "SELECT * FROM ma_pedidos WHERE estado = 1 AND ID = ?";
        $sql = $conectar-> prepare($sql);
        $sql ->bindValue(1,$ID);
        $sql ->execute();
        return $resultado= $sql -> fetchALL (PDO::FETCH_ASSOC);
}
    public function Insert_Pedido($ID_SOCIO, $FECHA_PEDIDO, $DETALLE, $SUB_TOTAL,$TOTAL_ISV,$TOTAL, $FECHA_ENTREGA){
        $conectar= parent :: conexion();
        parent:: set_name();
        $sql="INSERT INTO ma_pedidos(ID, ID_SOCIO, FECHA_PEDIDO,DETALLE,SUB_TOTAL,TOTAL_ISV,TOTAL,FECHA_ENTREGA, ESTADO) 
        VALUES(NULL,?,?,?,?,?,?,?,'1');";
        $sql = $conectar-> prepare($sql);
        $sql ->bindValue(1,$ID_SOCIO);
        $sql ->bindValue(2,$FECHA_PEDIDO);
        $sql ->bindValue(3,$DETALLE);
        $sql ->bindValue(4,$SUB_TOTAL);
        $sql ->bindValue(5,$TOTAL_ISV);
        $sql ->bindValue(6,$TOTAL);
        $sql ->bindValue(7,$FECHA_ENTREGA);
        $sql ->execute();
        return $resultado= $sql -> fetchALL (PDO::FETCH_ASSOC);    
}
public function Update_Pedido($ID,$ID_SOCIO, $FECHA_PEDIDO, $DETALLE, $SUB_TOTAL,$TOTAL_ISV, $TOTAL, $FECHA_ENTREGA, $ESTADO){
        $conectar= parent :: conexion();
        parent:: set_name();
        $sql= " UPDATE ma_pedidos SET ID_SOCIO = ?, FECHA_PEDIDO = ?, DETALLE = ?, SUB_TOTAL = ?, TOTAL_ISV = ?, TOTAL = ?, FECHA_ENTREGA = ?, ESTADO=?
        WHERE ID = ?;";
        $sql = $conectar-> prepare($sql);
        $sql ->bindValue(1,$ID_SOCIO);
        $sql ->bindValue(2,$FECHA_PEDIDO);
        $sql ->bindValue(3,$DETALLE);
        $sql ->bindValue(4,$SUB_TOTAL);
        $sql ->bindValue(5,$TOTAL_ISV);
        $sql ->bindValue(6,$TOTAL);
        $sql ->bindValue(7,$FECHA_ENTREGA);
        $sql ->bindValue(8,$ESTADO);
        $sql ->bindValue(9,$ID);
        $sql ->execute();
        return $resultado= $sql -> fetchALL (PDO::FETCH_ASSOC);
}
public function Delete_Pedido($ID){
        $conectar= parent::conexion();
        parent::set_name();
        $sql = "DELETE  FROM ma_pedidos WHERE ID = ?";
        $sql = $conectar-> prepare($sql);
        $sql ->bindValue(1,$ID);
        $sql ->execute();
        return $resultado= $sql -> fetchALL (PDO::FETCH_ASSOC);
}
}
?>