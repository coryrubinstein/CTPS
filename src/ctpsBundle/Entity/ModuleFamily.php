<?php
namespace ctpsBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * ModuleFamily
 *
 * @ORM\Table(name="ModulesFamily")
 * @ORM\Entity
 */
class ModuleFamily
{
    /**
     * @var string
     *
     * @ORM\Column(name="moduleFamily", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=false)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }
    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}