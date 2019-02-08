<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductoRepository")
 */
class Producto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NombreProducto", type="string", length=256)
     * @Assert\Length(
     *      min = 3,
     *      max = 25,
     *      minMessage = "El nombre del producto tiene que tener {{ limit }} caracteres como minimo",
     *      maxMessage = "El nombre del producto tiene que tener {{ limit }} caracteres como maximo"
     * )
     */
    private $nombreProducto;

    /**
     * @var float
     *
     * @ORM\Column(name="Precio", type="float")
     * @Assert\Length(
     *      min = 1,
     *      max = 5,
     *      minMessage = "El precio tiene que tener {{ limit }} caracteres como minimo",
     *      maxMessage = "El precio tiene que tener {{ limit }} caracteres como maximo"
     * )
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="Categoria", type="string", length=256)
     * @Assert\Length(
     *      min = 3,
     *      max = 10,
     *      minMessage = "La categoria tiene que tener {{ limit }} caracteres como minimo",
     *      maxMessage = "El categoria tiene que tener {{ limit }} caracteres como maximo"
     * )
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="Imagen", type="string", length=256)
     */
    private $imagen;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreProducto
     *
     * @param string $nombreProducto
     *
     * @return Producto
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get nombreProducto
     *
     * @return string
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Producto
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Producto
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }
}
