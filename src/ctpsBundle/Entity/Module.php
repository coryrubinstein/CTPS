<?php
namespace ctpsBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Module
 *
 * @ORM\Table(name="Modules")
 * @ORM\Entity(repositoryClass="ModuleRepository")
 */
class Module
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="moduleName", type="string", length=255, nullable=false)
     */
    private $name;


    /**
     * @var \ctpsBundle\Entity\ModuleFamily
     *
     * @ORM\ManyToOne(targetEntity="\ctpsBundle\Entity\ModuleFamily")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="moduleFamily", referencedColumnName="id")
     * })
     */
    private $family;


    /**
     * @var string
     *
     * @ORM\Column(name="moduleDescription", type="text", nullable=true)
     */
    private $description;



    public function __construct(){

    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ModuleFamily
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param ModuleFamily $family
     */
    public function setFamily($family)
    {
        $this->family = $family;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }




}