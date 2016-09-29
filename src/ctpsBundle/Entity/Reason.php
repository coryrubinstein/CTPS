<?php
namespace ctpsBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Reason
 *
 * @ORM\Table(name="Reason")
 * @ORM\Entity
 */
class Reason
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="ModuleFamily")
     * @ORM\JoinColumn(name="family", referencedColumnName="id")
     */
    private $family;

    /**
     *
     * @ORM\OneToMany(targetEntity="IssueReason", mappedBy="reason")
     */
    private $issueReasons;




    public function __construct(){
        //Initiate companies array.
        $this->issueReasons = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Video
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * @return mixed
     */
    public function getIssueReasons()
    {
        return $this->issueReasons;
    }
}