<?php
namespace ctpsBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Reason
 *
 * @ORM\Table(name="SubReason")
 * @ORM\Entity()
 */
class SubReason
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
     *
     * @ORM\OneToMany(targetEntity="IssueReasonSubReason", mappedBy="subReason")
     */
    private $issueReasonSubReasons;

    public function __construct(){
        $this->issueReasonSubReasons = new ArrayCollection();
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
     * @return string
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
    public function getIssueReasonSubReasons()
    {
        return $this->issueReasonSubReasons;
    }
}