<?php

class C_P{

    private $fecha_compra;
    private $Publicacion;

    function __construct($fecha_compra)
    {
        $this->fecha_compra = $fecha_compra;
    }

    public function getFechaCompra()
    {
        return $this->fecha_compra;
    }

    public function setFechaCompra($fecha_compra)
    {
        $this->fecha_compra = $fecha_compra;

        return $this;
    }
}
?>