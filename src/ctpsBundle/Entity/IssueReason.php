<?php
namespace ctpsBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Issue
 *
 * @ORM\Table(name="IssuesReason")
 * @ORM\Entity(repositoryClass="cbway\cbwayBundle\Entity\IssueReasonRepository")
 */
class IssueReason
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
     * @ORM\ManyToOne(targetEntity="Issue", inversedBy="issueReasons")
     */
    private $issue;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Reason", inversedBy="issueReasons")
     */
    private $reason;

    /**
     *
     * @ORM\OneToMany(targetEntity="IssueReasonSubReason", mappedBy="issueReason")
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
     * @return mixed
     */
    public function getIssue()
    {
        return $this->issue;
    }

    /**
     * @param mixed $issue
     */
    public function setIssue($issue)
    {
        $this->issue = $issue;
    }
    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }
    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
    /**
     * @return mixed
     */
    public function getIssueReasonSubReasons()
    {
        return $this->issueReasonSubReasons;
    }
}