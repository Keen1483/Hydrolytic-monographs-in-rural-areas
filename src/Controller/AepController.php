<?php

namespace App\Controller;

use App\Entity\Aep;
use App\Entity\AgentCommunicationMode;
use App\Entity\DrillingPmh;
use App\Entity\EquipmentAep;
use App\Entity\FundingMode;
use App\Entity\GpsCoordinates;
use App\Entity\ImproveSourceEquipmentType;
use App\Entity\LocalInformations;
use App\Entity\LostWell;
use App\Entity\Maintenance;
use App\Entity\ManagementMode;
use App\Entity\StickingBack;
use App\Entity\Storage;
use App\Entity\TraditionalWellEquipmentType;
use App\Entity\WaterTraitmentAnalysis;
use App\Form\AepType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AepController extends AbstractController
{
    /**
     * @Route("/aep", name="aep")
     */
    public function formAep(Request $request, EntityManagerInterface $entityManager)
    {
        $aep = new Aep();

        $stickingBack = new StickingBack();
        $aep->getStickingBack()->add($stickingBack);

        $storage = new Storage();
        $aep->getStorage()->add($storage);

        $agentCommunicationMode = new AgentCommunicationMode();
        $aep->getAgentCommunicationMode()->add($agentCommunicationMode);

        $equipmentAep = new EquipmentAep();
        $aep->getEquipmentAep()->add($equipmentAep);

        $waterTraitmentAnalysis = new WaterTraitmentAnalysis();
        $aep->getWaterTraitmentAnalysis()->add($waterTraitmentAnalysis);

        $managementMode = new ManagementMode();
        $aep->getManagementMode()->add($managementMode);

        $fundingMode = new FundingMode();
        $aep->getFundingMode()->add($fundingMode);

        $maintenance = new Maintenance();
        $aep->getMaintenance()->add($maintenance);

        $lostWell = new LostWell();
        $aepPmh = new DrillingPmh();
        $aepPmh->getLostWell()->add($lostWell);
        $aep->getAepPmh()->add($aepPmh);

        $aepImproveSource = new ImproveSourceEquipmentType();
        $aep->getAepImproveSource()->add($aepImproveSource);

        $aepTraditionalWell = new TraditionalWellEquipmentType();
        $aep->getAepTraditionalWell()->add($aepTraditionalWell);

        $gpsCoordinates = new GpsCoordinates();
        $localInformations = new LocalInformations();
        $localInformations->getGpsCoordinates()->add($gpsCoordinates);
        $aep->getLocalInformations()->add($localInformations);

        $form = $this->createForm(AepType::class, $aep);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $aep = $form->getData();
            $entityManager->persist($aep);
            $entityManager->flush();
            
            return $this->redirectToRoute('/');
        }

        return $this->render('aep/form_aep.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
