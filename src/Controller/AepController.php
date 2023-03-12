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
use App\Entity\User;
use App\Entity\WaterTraitmentAnalysis;
use App\Form\AepType;
use App\Repository\AepRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @Route("/aep", name="aep_")
 */
class AepController extends AbstractController
{
    /**
     * @Route("/{type}/{src}", name="new", requirements={
     *      "type"="forage|prise-en-eau-de-surface|captage-par-source",
     *      "src"="pmh|source-amelioree|puit-traditionel|autre"}
     * )
     */
    public function formAep(Request $request, EntityManagerInterface $entityManager, $type, $src)
    {
        // If the entities are null, we instantiate them
        $aep = new Aep();
        
        $stickingBack = new StickingBack();
        
        $storage = new Storage();
        
        $agentCommunicationMode = new AgentCommunicationMode();
        
        $equipmentAep = new EquipmentAep();
        
        $waterTraitmentAnalysis = new WaterTraitmentAnalysis();
        
        $managementMode = new ManagementMode();
        
        $fundingMode = new FundingMode();
        
        $maintenance = new Maintenance();
        
        $lostWell = new LostWell();
        $aepPmh = new DrillingPmh();
        
        $aepImproveSource = new ImproveSourceEquipmentType();
        
        $aepTraditionalWell = new TraditionalWellEquipmentType();
        
        $gpsCoordinates = new GpsCoordinates();
        $localInformations = new LocalInformations();
        

        $aep->getStickingBack()->add($stickingBack);

        $aep->getStorage()->add($storage);

        $aep->getAgentCommunicationMode()->add($agentCommunicationMode);

        $aep->getEquipmentAep()->add($equipmentAep);

        $aep->getWaterTraitmentAnalysis()->add($waterTraitmentAnalysis);

        $aep->getManagementMode()->add($managementMode);

        $aep->getFundingMode()->add($fundingMode);

        $aep->getMaintenance()->add($maintenance);

        $aepPmh->getLostWell()->add($lostWell);
        $aep->getAepPmh()->add($aepPmh);

        $aep->getAepImproveSource()->add($aepImproveSource);

        $aep->getAepTraditionalWell()->add($aepTraditionalWell);

        $localInformations->getGpsCoordinates()->add($gpsCoordinates);
        $aep->getLocalInformations()->add($localInformations);
        
        $form = $this->createForm(AepType::class, $aep);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            // We fill the fields not fill by the user

            // ------ On chope un user dans la base
            $repo = $this->getDoctrine()->getRepository(User::class);
            $user = $repo->find(163);
            $aep->setUser($user);

            // On complète les données manquantes du formulaire
            $aep->setCreatedAt(new \DateTime())
                ->setType($type)
                ->setSource($src)
            ;

            $stickingBack->setAep($aep);

            $storage->setAep($aep);

            $agentCommunicationMode->setAep($aep);

            $equipmentAep->setAep($aep);

            $waterTraitmentAnalysis->setAep($aep);

            $managementMode->setAep($aep);

            $fundingMode->setAep($aep);

            $maintenance->setAep($aep);

            $lostWell->setDrillingPmh($aepPmh);
            $aepPmh->setAep($aep);

            $aepImproveSource->setAep($aep);

            $aepTraditionalWell->setAep($aep);

            $gpsCoordinates->setLocalInformations($localInformations);
            $localInformations->setAep($aep);

            // Récupération des données du formulaire
            $aep = $form->getData();

            // Persistance des données du formulaire
            $entityManager->persist($stickingBack);
            $entityManager->persist($storage);
            $entityManager->persist($agentCommunicationMode);
            $entityManager->persist($equipmentAep);
            $entityManager->persist($waterTraitmentAnalysis);
            $entityManager->persist($managementMode);
            $entityManager->persist($fundingMode);
            $entityManager->persist($maintenance);
            $entityManager->persist($lostWell);
            $entityManager->persist($aepPmh);
            $entityManager->persist($aepImproveSource);
            $entityManager->persist($aepTraditionalWell);
            $entityManager->persist($gpsCoordinates);
            $entityManager->persist($localInformations);
            $entityManager->persist($aep);

            // Sauvegarde des données
            $entityManager->flush();
            
            return $this->redirectToRoute('aep_show', ['id' => $aep->getId()], 301);
        }

        return $this->render('aep/form_aep.html.twig', [
            'form' => $form->createView(),
            'type' => $type,
            'source' => $src,
            'title' => $type.': '.$src,
            'edit_mode' => $aep->getId() !== null,
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="edit")
     */
    public function editAep(Aep $aep, Request $request, EntityManagerInterface $entityManager)
    {
        $stickingBack = $this->getDoctrine()->getRepository(StickingBack::class)->findOneByAep($aep);
        $storage = $this->getDoctrine()->getRepository(Storage::class)->findOneByAep($aep);
        $agentCommunicationMode = $this->getDoctrine()->getRepository(AgentCommunicationMode::class)->findOneByAep($aep);
        $equipmentAep = $this->getDoctrine()->getRepository(EquipmentAep::class)->findOneByAep($aep);
        $waterTraitmentAnalysis = $this->getDoctrine()->getRepository(WaterTraitmentAnalysis::class)->findOneByAep($aep);
        $managementMode = $this->getDoctrine()->getRepository(ManagementMode::class)->findOneByAep($aep);
        $fundingMode = $this->getDoctrine()->getRepository(FundingMode::class)->findOneByAep($aep);
        $maintenance = $this->getDoctrine()->getRepository(Maintenance::class)->findOneByAep($aep);

        $aepPmh = $this->getDoctrine()->getRepository(DrillingPmh::class)->findOneByAep($aep);
        $lostWell = $this->getDoctrine()->getRepository(LostWell::class)->findOneByDrillingPmh($aepPmh);

        $aepImproveSource = $this->getDoctrine()->getRepository(ImproveSourceEquipmentType::class)->findOneByAep($aep);
        $aepTraditionalWell = $this->getDoctrine()->getRepository(TraditionalWellEquipmentType::class)->findOneByAep($aep);

        $localInformations = $this->getDoctrine()->getRepository(LocalInformations::class)->findOneByAep($aep);
        $gpsCoordinates = $this->getDoctrine()->getRepository(GpsCoordinates::class)->findOneByLocalInformations($localInformations);
    
        $aep->getStickingBack()->add($stickingBack);

        $aep->getStorage()->add($storage);

        $aep->getAgentCommunicationMode()->add($agentCommunicationMode);

        $aep->getEquipmentAep()->add($equipmentAep);

        $aep->getWaterTraitmentAnalysis()->add($waterTraitmentAnalysis);

        $aep->getManagementMode()->add($managementMode);

        $aep->getFundingMode()->add($fundingMode);

        $aep->getMaintenance()->add($maintenance);

        $aepPmh->getLostWell()->add($lostWell);
        $aep->getAepPmh()->add($aepPmh);

        $aep->getAepImproveSource()->add($aepImproveSource);

        $aep->getAepTraditionalWell()->add($aepTraditionalWell);

        $localInformations->getGpsCoordinates()->add($gpsCoordinates);
        $aep->getLocalInformations()->add($localInformations);
        
        $form = $this->createForm(AepType::class, $aep);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            // Récupération des données du formulaire
            $aep = $form->getData();

            // Persistance des données du formulaire
            $entityManager->persist($stickingBack);
            $entityManager->persist($storage);
            $entityManager->persist($agentCommunicationMode);
            $entityManager->persist($equipmentAep);
            $entityManager->persist($waterTraitmentAnalysis);
            $entityManager->persist($managementMode);
            $entityManager->persist($fundingMode);
            $entityManager->persist($maintenance);
            $entityManager->persist($lostWell);
            $entityManager->persist($aepPmh);
            $entityManager->persist($aepImproveSource);
            $entityManager->persist($aepTraditionalWell);
            $entityManager->persist($gpsCoordinates);
            $entityManager->persist($localInformations);
            $entityManager->persist($aep);

            // Sauvegarde des données
            $entityManager->flush();
            
            return $this->redirectToRoute('aep_show', ['id' => $aep->getId()], 301);
        }

        return $this->render('aep/form_aep.html.twig', [
            'form' => $form->createView(),
            'title' => 'Edit mode',
            'type' => $aep->getType(),
            'source' => $aep->getSource(),
            'edit_mode' => $aep->getId() !== null,
        ]);
    }

    /**
     * @Route("/liste", name="liste")
     */
    public function aepListe(AepRepository $repo, Request $request)
    {
        $aeps = $repo->findAll();

        // Ajax action
        if ($request->isXmlHttpRequest()) {
            $aepInfos = [];

            foreach ($aeps as $aep) {
                $stickingBack = $this->getDoctrine()->getRepository(StickingBack::class)->findOneByAep($aep);
                $storage = $this->getDoctrine()->getRepository(Storage::class)->findOneByAep($aep);
                $agentCommunicationMode = $this->getDoctrine()->getRepository(AgentCommunicationMode::class)->findOneByAep($aep);
                $equipmentAep = $this->getDoctrine()->getRepository(EquipmentAep::class)->findOneByAep($aep);
                $waterTraitmentAnalysis = $this->getDoctrine()->getRepository(WaterTraitmentAnalysis::class)->findOneByAep($aep);
                $managementMode = $this->getDoctrine()->getRepository(ManagementMode::class)->findOneByAep($aep);
                $fundingMode = $this->getDoctrine()->getRepository(FundingMode::class)->findOneByAep($aep);
                $maintenance = $this->getDoctrine()->getRepository(Maintenance::class)->findOneByAep($aep);

                $aepPmh = $this->getDoctrine()->getRepository(DrillingPmh::class)->findOneByAep($aep);
                $lostWell = $this->getDoctrine()->getRepository(LostWell::class)->findOneByDrillingPmh($aepPmh);

                $aepImproveSource = $this->getDoctrine()->getRepository(ImproveSourceEquipmentType::class)->findOneByAep($aep);
                $aepTraditionalWell = $this->getDoctrine()->getRepository(TraditionalWellEquipmentType::class)->findOneByAep($aep);

                $localInformations = $this->getDoctrine()->getRepository(LocalInformations::class)->findOneByAep($aep);
                $gpsCoordinates = $this->getDoctrine()->getRepository(GpsCoordinates::class)->findOneByLocalInformations($localInformations);
            

                $aepInfos[] = [
                    'email_aep' => $aep->getUser()->getEmail(),
                    'date_aep' => $aep->getCreatedAt(),
                    'type_aep' => $aep->getType(),
                    'source_aep' => $aep->getSource(),
                    'region_localInformations' => $localInformations->getRegion(),
                    'department_localInformations' => $localInformations->getDepartment(),
                    'borough_localInformations' => $localInformations->getBorough(),
                    'locality_localInformations' => $localInformations->getLocality(),
                    'district_localInformations' => $localInformations->getDistrict(),
                ];
            }

            return new JsonResponse($aepInfos);
        } else {
            $form_search = $this->createFormBuilder(null)
                ->add('value', SearchType::class, [
                    'constraints' => [
                        new NotBlank(),
                        new Length(['min' => 3, 'max' => 30],)
                    ],
                ])
                ->add('property', HiddenType::class, [
                    'constraints' => [
                        new NotBlank(),
                        new Length(['min' => 3, 'max' => 30],)
                    ],
                ])
                ->add('entity', HiddenType::class, [
                    'constraints' => [
                        new NotBlank(),
                        new Length(['min' => 3, 'max' => 30],)
                    ],
                ])
                ->add('search', SubmitType::class)
                ->getForm()
            ;

            $form_search->handleRequest($request);

            if($form_search->isSubmitted() && $form_search->isValid()) {
                $data = $form_search->getData();

                $request->request->set('value', null);
                $request->request->set('property', null);
                $request->request->set('entity', null);

                $value = trim($data['value']);
                $property = trim($data['property']);
                $entity = trim($data['entity']);

                $class = sprintf('\App\Entity\%s', ucfirst($entity));
                $findByProperty = 'findBy' . ucfirst($property);
                
                $backup = $this->getDoctrine()->getRepository($class)->$findByProperty($value);
                
                return $this->render('aep/aep_liste.html.twig', [
                    'aeps' => $backup,
                    'title' => 'Résultat de la recherche <i>' . $value . '</i>',
                    'form_search' => $form_search->createView(),
                ]);
            }
            
            return $this->render('aep/aep_liste.html.twig', [
                'aeps' => $aeps,
                'title' => 'Liste des AEP',
                'form_search' => $form_search->createView(),
            ]);
        }   
    }

    /**
     * @Route("/{id<\d+>}", name="show")
     */
    public function showAep(AepRepository $repo, $id)
    {
        $aep = $repo->find($id);
        $user = $aep->getUser();
        $stickingBack = $this->getDoctrine()->getRepository(StickingBack::class)->findOneByAep($aep);
        $storage = $this->getDoctrine()->getRepository(Storage::class)->findOneByAep($aep);
        $agentCommunicationMode = $this->getDoctrine()->getRepository(AgentCommunicationMode::class)->findOneByAep($aep);
        $equipmentAep = $this->getDoctrine()->getRepository(EquipmentAep::class)->findOneByAep($aep);
        $waterTraitmentAnalysis = $this->getDoctrine()->getRepository(WaterTraitmentAnalysis::class)->findOneByAep($aep);
        $managementMode = $this->getDoctrine()->getRepository(ManagementMode::class)->findOneByAep($aep);
        $fundingMode = $this->getDoctrine()->getRepository(FundingMode::class)->findOneByAep($aep);
        $maintenance = $this->getDoctrine()->getRepository(Maintenance::class)->findOneByAep($aep);

        $aepPmh = $this->getDoctrine()->getRepository(DrillingPmh::class)->findOneByAep($aep);
        $lostWell = $this->getDoctrine()->getRepository(LostWell::class)->findOneByDrillingPmh($aepPmh);

        $aepImproveSource = $this->getDoctrine()->getRepository(ImproveSourceEquipmentType::class)->findOneByAep($aep);
        $aepTraditionalWell = $this->getDoctrine()->getRepository(TraditionalWellEquipmentType::class)->findOneByAep($aep);

        $localInformations = $this->getDoctrine()->getRepository(LocalInformations::class)->findOneByAep($aep);
        $gpsCoordinates = $this->getDoctrine()->getRepository(GpsCoordinates::class)->findOneByLocalInformations($localInformations);

        return $this->render('aep/show_aep.html.twig', [
            'aep' => $aep,
            'user' => $user,
            'stickingBack' => $stickingBack,
            'storage' => $storage,
            'agentCommunicationMode' => $agentCommunicationMode,
            'equipmentAep' => $equipmentAep,
            'waterTraitmentAnalysis' => $waterTraitmentAnalysis,
            'managementMode' => $managementMode,
            'fundingMode' => $fundingMode,
            'maintenance' => $maintenance,

            'aepPmh' => $aepPmh,
            'lostWell' => $lostWell,

            'aepImproveSource' => $aepImproveSource,
            'aepTraditionalWell' => $aepTraditionalWell,

            'localInformations' => $localInformations,
            'gpsCoordinates' => $gpsCoordinates,

            'title' => 'AEP '.$aep->getId(),
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function homeAep()
    {
        return $this->render('aep/home_aep.html.twig', [
            'title' => 'Accueil AEP',
        ]);
    }

    /**
     * @Route("/type", name="type")
     */
    public function typeAep()
    {
        return $this->render('aep/type_aep.html.twig', [
            'title' => 'Type AEP',
        ]);
    }

    /**
     * @Route("/{type}", name="source", requirements={"type"="forage|prise-en-eau-de-surface|captage-par-source|autre"})
     */
    public function sourceAep($type)
    {
        return $this->render('aep/source_aep.html.twig', [
            'source' => $type,
            'title' => 'Source d\'AEP',
        ]);
    }
}
