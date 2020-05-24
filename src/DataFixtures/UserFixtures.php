<?php

namespace App\DataFixtures;

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
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 46; $i++) {
            $user = new User();

            $user->setEmail($faker->email)
                ->setPassword($this->passwordEncoder->encodePassword(
                    $user, 'testest'
                ))
                ->setUsername($faker->name)
                ->setPseudo($faker->userName)
                ->setCode($faker->localIpv4)
                ->setCreatedAt(new \DateTime())
            ;
            $manager->persist($user);

            for($j = 1; $j <= random_int(1, 11); $j++) {
                if(random_int(0, 1)) {
                    $aep = new Aep();

                    $funding = ['CAS', 'BIP'];
                    $adductionType = ['Par refoulement', 'Par gravitation', 'Mixte'];
                    $operatingState = ['Fonctionnel', 'Non fonctionnel'];
                    $aep->setDepth($faker->randomFloat(random_int(2, 4), 70, 160))
                        ->setBuildingYear(new \DateTime($faker->date()))
                        ->setFunding($funding[array_rand($funding, 1)])
                        ->setProductionCapacity($faker->randomFloat(random_int(2, 4), 150000, 250000))
                        ->setNetworkLength($faker->randomFloat(random_int(2, 4), 2000, 20000))
                        ->setAdductionType($adductionType[array_rand($adductionType, 1)])
                        ->setLinearNetwork($faker->sentence())
                        ->setOperatingState($operatingState[array_rand($operatingState, 1)])
                        ->setCreatedAt(new \DateTime())
                        ->setUser($user)
                    ;

                    // Dossier de recollement
                    $stickingBack = new StickingBack();

                    $exist = ['Existant', 'Non existant'];
                    $stickingBack->setExist($exist[array_rand($exist, 1)])
                                ->setComments($faker->paragraph())
                                ->setAep($aep)
                    ;
                    $manager->persist($stickingBack);

                    // Stockage
                    $storage = new Storage();

                    $sufficient = ['Suffisant', 'Non suffisant'];
                    $structureStatus = ['Bonne structure', 'Structure endommagée'];
                    $storage->setQuantity($faker->randomFloat(random_int(2, 4), 5000, 25000))
                            ->setSufficient($sufficient[array_rand($sufficient, 1)])
                            ->setStructureStatus($structureStatus[array_rand($structureStatus, 1)])
                            ->setAep($aep)
                    ;
                    $manager->persist($storage);

                    // Mode de communication entre l'agent ou comité de gestion et la commune
                    $agentCommunicationMode = new AgentCommunicationMode();

                    $boolean = ['true', 'false'];
                    $agentCommunicationMode->setContract($boolean[array_rand($boolean, 1)])
                                            ->setCapacityBuilding($boolean[array_rand($boolean, 1)])
                                            ->setOthers($faker->sentence())
                                            ->setAep($aep)
                    ;
                    $manager->persist($agentCommunicationMode);

                    // Type d'équipement
                    $equipmentAep = new EquipmentAep();

                    $pumpQuality = [
                        'Pompe immergé solaire',
                        'Pompe immergé raccordée à un réseau électrique',
                        'Pompe immergé raccordée à un groupe électrogène',
                        'Pas d\'équipement'
                    ];
                    $equipmentAep->setPumpQuality($pumpQuality[array_rand($pumpQuality, 1)])
                                ->setOthers($faker->sentence())
                                ->setAep($aep)
                    ;
                    $manager->persist($equipmentAep);

                    // Analyse et traitment de l'eau
                    $waterTraitmentAnalysis = new WaterTraitmentAnalysis();

                    $unitTraitmentPresence = ['Oui', 'Non'];
                    $analysisFrequency = [
                        'Par jour',
                        'Par semaine',
                        'Par mois',
                        'Par trimestre',
                        'Par semestre',
                        'Par année'
                    ];
                    $waterTraitmentAnalysis->setUnitTraitmentPresence($unitTraitmentPresence[array_rand($unitTraitmentPresence, 1)])
                                            ->setAnalysisFrequency($analysisFrequency[array_rand($analysisFrequency, 1)])
                                            ->setLastAnalysisAt(new \DateTime($faker->date()))
                                            ->setAppliedTraitmentType($faker->paragraph(2))
                                            ->setAep($aep)
                    ;
                    $manager->persist($waterTraitmentAnalysis);

                    // Etat de fonctionnement
                    $managementMode = new ManagementMode();

                    $managementAgent = [
                        'Existence d\'un comité de tratement',
                        'Commune en régie',
                        'Aucun'
                    ];
                    $managementMode->setManagementAgent($managementAgent[array_rand($managementAgent, 1)])
                                    ->setOthers($faker->paragraph())
                                    ->setAep($aep)
                    ;
                    $manager->persist($managementMode);

                    // Mode de financement
                    $fundingMode = new FundingMode();

                    $facturationMode = [
                        'Facturation par volume',
                        'Taux forfaitaire',
                        'Aucun'
                    ];
                    $fundingMode->setFacturationMode($facturationMode[array_rand($facturationMode, 1)])
                                ->setOthers($faker->paragraph())
                                ->setAep($aep)
                    ;
                    $manager->persist($fundingMode);

                    // Maintenance
                    $maintenance = new Maintenance();

                    $agent = ['Par artisan réparateur', 'Service de la commune'];
                    $maintenance->setAgent($agent[array_rand($agent, 1)])
                                ->setOthers($faker->paragraph())
                                ->setAep($aep)
                    ;
                    $manager->persist($maintenance);

                    // Renseignement à PMH
                    $aepPmh = new DrillingPmh();

                    $superstructure = ['Bonne', 'Défectueux'];
                    //$drainingChannel = ['Fonctionnel', 'Non fonctionnel'];
                    $aepPmh->setPompBrand($faker->company)
                            ->setPumpPower($faker->randomFloat(random_int(2, 4), 5000, 20000))
                            ->setSuperstructure($superstructure[array_rand($superstructure, 1)])
                            ->setDrainingChannel($operatingState[array_rand($operatingState, 1)])
                            ->setAep($aep)
                    ;
                    $manager->persist($aepPmh);
                        // Puit perdu
                        $lostWell = new LostWell();

                        $lostWell->setExist($exist[array_rand($exist, 1)])
                                ->setFunctional($operatingState[array_rand($operatingState, 1)])
                                ->setDrillingPmh($aepPmh)
                        ;
                        $manager->persist($lostWell);

                    // Pour une source améliorée
                    $aepImproveSource = new ImproveSourceEquipmentType();

                    //$distributionMode = ['Construction d\'une superstructure', 'Canalisation de l\'eau'];
                    $aepImproveSource->setSuperstructure((string)$boolean[array_rand($boolean, 1)])
                                    ->setPipeline((string)$boolean[array_rand($boolean, 1)])
                                    ->setAep($aep)
                    ;
                    $manager->persist($aepImproveSource);

                    // Pour puit traditionnel
                    $aepTraditional = new TraditionalWellEquipmentType();

                    $aepTraditional->setBucket($boolean[array_rand($boolean, 1)])
                                    ->setRope($boolean[array_rand($boolean, 1)])
                                    ->setLid($boolean[array_rand($boolean, 1)])
                                    ->setPulley($boolean[array_rand($boolean, 1)])
                                    ->setSuperstructure($boolean[array_rand($boolean, 1)])
                                    ->setAep($aep)
                    ;
                    $manager->persist($aepTraditional);

                    // Information locale
                    $localInformations = new LocalInformations();

                    $localInformations->setRegion($faker->country)
                                    ->setBorough($faker->city)
                                    ->setLocality($faker->streetName)
                                    ->setDistrict($faker->streetAddress)
                                    ->setPopulation($faker->numberBetween(500000, 4000000))
                                    ->setDepartment($faker->streetName)
                                    ->setAep($aep)
                    ;
                    $manager->persist($localInformations);

                        // Coordonnées GPS
                        $gpsCoordinates = new GpsCoordinates();

                        $gpsCoordinates->setLatitude($faker->latitude)
                                        ->setLongitude($faker->longitude)
                                        ->setLocalInformations($localInformations)
                        ;
                        $manager->persist($gpsCoordinates);

                        
                    $manager->persist($aep);
                }
            }
        }

        $manager->flush();
    }
}
