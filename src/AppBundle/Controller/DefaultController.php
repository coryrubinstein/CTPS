<?php

namespace AppBundle\Controller;

use ctpsBundle\Entity\Issue;
use ctpsBundle\Entity\Reason;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{

    /**
     * @param $id
     * @return string
     * @Route("/list/{id}", name="issue_show")
     */
    public function showIssueAction ($id)
    {
        $em = $this->getDoctrine()->getManager();
        $issue = $em->getRepository('ctpsBundle:Issue')
            ->find($id);


        $reasons = array();
        $subreasons = array();


        foreach($issue->getIssueReasons() as $issueReason) {


            switch($issueReason->getReason()->getFamily()->getId()){
                case '104' :
                    foreach($issueReason->getIssueReasonSubReasons() as $issueReasonSubReason)
                    {
                        $reasons['Leadership'][$issueReason->getReason()->getId()] = array(
                            'Name' => $issueReason->getReason()->getName(),
                            'Subreason' => $subreasons['Leadership'] [$issueReasonSubReason->getSubReason()->getId()] = array(
                                'Name' => $issueReasonSubReason->getSubReason()->getName()
                            )

                        );
                    }



                    break;
                case '105' :
                    foreach($issueReason->getIssueReasonSubReasons() as $issueReasonSubReason)
                    {
                        $reasons['Frontline'][$issueReason->getReason()->getId()] = array(
                            'Name' => $issueReason->getReason()->getName(),
                            'Subreason' => $subreasons['Frontline'] [$issueReasonSubReason->getSubReason()->getId()] = array(
                                'Name' => $issueReasonSubReason->getSubReason()->getName()
                            )

                        );
                    }

                    break;
                case '106' :
                    foreach($issueReason->getIssueReasonSubReasons() as $issueReasonSubReason)
                    {
                        $reasons['BBE'][$issueReason->getReason()->getId()] = array(
                            'Name' => $issueReason->getReason()->getName(),
                            'Subreason' => $subreasons['BBE'] [$issueReasonSubReason->getSubReason()->getId()] = array(
                                'Name' => $issueReasonSubReason->getSubReason()->getName()
                            )

                        );
                    }

                    break;
            }

        }


        $object = array('Issue' => array(
           'id' => $issue->getId(),
            'name' => $issue->getName(),
            'reasons' => $reasons,
        ));



        return new JsonResponse($object);


//        return $this->render('landing/showIssue.html.twig', [
//            'id' => $issue->getId(),
//            'name' => $issue->getName(),
//            'reasons' => $reason,
//            'subreasons' => $subreasons
//           // 'json_reason' => json_encode($object)
//        ]);

    }


    /**
     * @Route("/list", name="list")
     */
   public function listAction()
   {

       $em = $this->getDoctrine()->getManager();
       $issues = $em->getRepository('ctpsBundle:Issue')->findAll();

       $em = $this->getDoctrine()->getManager();
       $reasons = $em->getRepository('ctpsBundle:Reason')->findAll();

       return $this->render('/landing/list.html.twig', [
           'issue' => $issues,
           'reason' => $reasons
       ]);
   }


}
