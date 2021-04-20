<?php
class Vendedor extends Usuario{
	private $nombreTienda;
	private $tipoOrganizacion;
	private $rubro;
	private $telefono;
	private $otroTelefono;
	private $celular;
	private $otroCelular;
	private $segundoNombre;
	private $segundoApellido;
	private $localidad;
	private $calle;
	private $numeroEmpresa;
	private $descripcion;

	public function __construct($nomT, $tipoO, $rubro, $tel, $tel2, $cel, $cel2, $segNom, $segApe, $local, $calle, $nroEmp, $desc){
		$this->nombreTienda = $nomT;
		$this->tipoOrganizacion = $tipoO;
		$this->rubro = $rubro;
		$this->telefono = $tel;
		$this->otroTelefono = $tel2;
		$this->celular = $cel;
		$this->otroCelular = $cel2;
		$this->segundoNombre = $segNom;
		$this->segundoApellido = $segApe;
		$this->localidad = $local;
		$this->calle = $calle;
		$this->numeroEmpresa = $nroEmp;
		$this->descripcion = $desc;
	}

    /**
     * @return mixed
     */
    public function getNombreTienda()
    {
        return $this->nombreTienda;
    }

    /**
     * @param mixed $nombreTienda
     *
     * @return self
     */
    public function setNombreTienda($nombreTienda)
    {
        $this->nombreTienda = $nombreTienda;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoOrganizacion()
    {
        return $this->tipoOrganizacion;
    }

    /**
     * @param mixed $tipoOrganizacion
     *
     * @return self
     */
    public function setTipoOrganizacion($tipoOrganizacion)
    {
        $this->tipoOrganizacion = $tipoOrganizacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRubro()
    {
        return $this->rubro;
    }

    /**
     * @param mixed $rubro
     *
     * @return self
     */
    public function setRubro($rubro)
    {
        $this->rubro = $rubro;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtroTelefono()
    {
        return $this->otroTelefono;
    }

    /**
     * @param mixed $otroTelefono
     *
     * @return self
     */
    public function setOtroTelefono($otroTelefono)
    {
        $this->otroTelefono = $otroTelefono;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     *
     * @return self
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtroCelular()
    {
        return $this->otroCelular;
    }

    /**
     * @param mixed $otroCelular
     *
     * @return self
     */
    public function setOtroCelular($otroCelular)
    {
        $this->otroCelular = $otroCelular;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    /**
     * @param mixed $segundoNombre
     *
     * @return self
     */
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * @param mixed $segundoApellido
     *
     * @return self
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     *
     * @return self
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param mixed $calle
     *
     * @return self
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroEmpresa()
    {
        return $this->numeroEmpresa;
    }

    /**
     * @param mixed $numeroEmpresa
     *
     * @return self
     */
    public function setNumeroEmpresa($numeroEmpresa)
    {
        $this->numeroEmpresa = $numeroEmpresa;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
?>