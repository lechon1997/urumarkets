<?php
class Publicacion{
	private $titulo;
	private $descripcion;
	private $estado;
	private $tipoMoneda;
	private $precio;
	private $conPrecio;
	private $oferta;
	private $limitePorPersona;
	private $foto;

	public function __construct($tit, $desc, $est, $tipoM, $prec, $conPrec, $of, $limitexPers, $foto){
		$this->titulo = $tit;
		$this->descripcion = $desc;
		$this->estado = $est;
		$this->tipoMoneda = $tipoM;
		$this->precio = $prec;
		$this->conPrecio = $conPrec;
		$this->oferta = $of;
		$this->limitePorPersona = $limitexPers;
		$this->foto = $foto;
	}



    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     *
     * @return self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

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

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoMoneda()
    {
        return $this->tipoMoneda;
    }

    /**
     * @param mixed $tipoMoneda
     *
     * @return self
     */
    public function setTipoMoneda($tipoMoneda)
    {
        $this->tipoMoneda = $tipoMoneda;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     *
     * @return self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConPrecio()
    {
        return $this->conPrecio;
    }

    /**
     * @param mixed $conPrecio
     *
     * @return self
     */
    public function setConPrecio($conPrecio)
    {
        $this->conPrecio = $conPrecio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * @param mixed $oferta
     *
     * @return self
     */
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLimitePorPersona()
    {
        return $this->limitePorPersona;
    }

    /**
     * @param mixed $limitePorPersona
     *
     * @return self
     */
    public function setLimitePorPersona($limitePorPersona)
    {
        $this->limitePorPersona = $limitePorPersona;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     *
     * @return self
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }
}
?>