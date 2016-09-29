<?php
namespace ctpsBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Issue
 *
 * @ORM\Table(name="Issues")
 * @ORM\Entity(repositoryClass="cbway\cbwayBundle\Entity\IssueRepository")
 */
class Issue
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
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=255)
     */
    private $class;
//    /**
//     *
//     * @ORM\OneToMany(targetEntity="IssueReason", mappedBy="issue")
//     */
  // private $issueReasons;
    public function __construct(){
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
     * @return mixed
     */
    public function getIssueReasons()
    {
        return $this->issueReasons;
    }
    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
    /**
     * @param string $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }
}