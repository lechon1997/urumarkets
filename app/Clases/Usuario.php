<?php
Class Usuario{
    private $nombre;
    private $apellido;
    private $corre;
    private $contrasenia;
    //private $tipoDoc;

    public function __construct($nom,$ape,$corre,$contra){
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->correo = $corre;
        $this->contrasenia = $contra;
   //     $this->tipoDoc = $tipoDoc;
    }

    

    /*
     Get the value of tipoDoc
     
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    
    public function setTipoDoc($tipoDoc) : self
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }
    */

    /**
     * Get the value of contrasenia
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * Set the value of contrasenia
     */
    public function setContrasenia($contrasenia) : self
    {
        $this->contrasenia = $contrasenia;

        return $this;
    }

    /**
     * Get the value of corre
     */
    public function getCorre()
    {
        return $this->corre;
    }

    /**
     * Set the value of corre
     */
    public function setCorre($corre) : self
    {
        $this->corre = $corre;

        return $this;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     */
    public function setApellido($apellido) : self
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre) : self
    {
        $this->nombre = $nombre;

        return $this;
    }
}

?>