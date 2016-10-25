<?php

namespace ctpsBundle\Controller;

use ctpsBundle\ctpsBundle;
use ctpsBundle\Entity\Issue;
use ctpsBundle\Entity\IssueReason;
use ctpsBundle\Entity\Reason;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @param $id
     * @return string
     * @Route("/get/issue/{id}", name="issue_get")
     */
    public function issueGetAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $issue = $em->getRepository('ctpsBundle:Issue')
            ->find($id);


        $finalArray = array
        (
            'Issue' => $this->parseIssue($issue),
            'name' => $issue->getName(),

        );

        return $this->render('/landing/showIssue.html.twig', array
        (
            'Issue' => $finalArray,

        ));
    }


    /**
     * @param $issueId
     * @return string
     *
     */
    public function showIssueAction($issueId)
    {
        $em = $this->getDoctrine()->getManager();
        $issue = $em->getRepository('ctpsBundle:Issue')
            ->find($issueId);

        header('Content-type: text/javascript');

        $finalArray = array
        (
            'Issue' => $this->parseIssue($issue)
        );

        return new JsonResponse($finalArray);

    }


    /**
     * @Route("/get", name="list")
     */
    public function listAction()
    {

        $em = $this->getDoctrine()->getManager();
        $issues = $em->getRepository('ctpsBundle:Issue')->findAll();

        $em = $this->getDoctrine()->getManager();
        $reasons = $em->getRepository('ctpsBundle:Reason')->findAll();

        return $this->render('/landing/list.html.twig',
            [

                'issue' => $issues,
                'reason' => $reasons

            ]);
    }


    private function parseIssue($issue)
    {

        $reasonsArr = array();
        $reasons = $issue->getIssueReasons();


        foreach ($reasons as $reasonObj)
        {
            $parsedReason = $this->parseReason($reasonObj);
            array_push($reasonsArr,$parsedReason);
        }

        $returnIssue = array
        (
            'id' => $issue->getId(),
            'name' => $issue->getName(),
            'reasons' => $reasonsArr

        );
        return $returnIssue;
    }


    private function parseReason($reasonObj)
    {
        $subReasonArr = array();
        $subReasons = $reasonObj->getIssueReasonSubReasons();

        foreach ($subReasons as $subReasonObj)
        {
            $parsedSubReason = $this->parseSubReason($subReasonObj);
            array_push($subReasonArr, $parsedSubReason);
        }


        $returnReason = array
        (
            'id' => $reasonObj->getReason()->getId(),
            'name' => $reasonObj->getReason()->getName(),
            'family' => $reasonObj->getReason()->getFamily()->getName(),
            'familyId' => $reasonObj->getReason()->getFamily()->getId(),
            'subreasons' => $subReasonArr
        );

        return $returnReason;
    }


    private function parseSubReason($subReasonObj)
    {
        $solutionsArr = array();
        $modules = $subReasonObj->getModules();

        foreach ($modules as $moduleObj)
        {
            $parsedModule = $this->parseModules($moduleObj);
            array_push($solutionsArr, $parsedModule);
        }

        $returnSubReason = array
        (
            'id' => $subReasonObj->getSubReason()->getId(),
            'name' => $subReasonObj->getSubReason()->getName(),
            'solutions' => $solutionsArr
        );

        return $returnSubReason;
    }


    private function parseModules($moduleObj)
    {

        $returnModule = array
        (
            'id' => $moduleObj->getId(),
            'name' => $moduleObj->getName(),
        );

        return $returnModule;
    }
}
