<?php
namespace ctpsBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Issue
 *
 * @ORM\Table(name="IssueReasonSubReason")
 * @ORM\Entity()
 */
class IssueReasonSubReason
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
     *
     * @ORM\ManyToOne(targetEntity="SubReason", inversedBy="issueReasonSubReasons")
     */
    private $subReason;

    /**
     * @ORM\ManyToOne(targetEntity="IssueReason", inversedBy="issueReasonSubReasons")
     *
     */
    private $issueReason;

//    /**
//     * @ORM\ManyToMany(targetEntity="Module")
//     */
//    private $modules;

    public function __construct(){
        $this->modules = new ArrayCollection();
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
     * @return mixed
     */
    public function getIssueReason()
    {
        return $this->issueReason;
    }
    /**
     * @param mixed $issueReason
     */
    public function setIssueReason($issueReason)
    {
        $this->issueReason = $issueReason;
    }
    /**
     * @return mixed
     */
    public function getModules()
    {
        return $this->modules;
    }
    /**
     * @param mixed $modules
     */
    public function setModules($modules)
    {
        $this->modules = $modules;
    }
    /**
     * @return mixed
     */
    public function getSubReason()
    {
        return $this->subReason;
    }
    /**
     * @param mixed $subReason
     */
    public function setSubReason($subReason)
    {
        $this->subReason = $subReason;
    }
}