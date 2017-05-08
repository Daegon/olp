<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Attribute;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Characteristic;

/**
 * Class LoadCharacteristicsData
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadCharacteristicsData implements FixtureInterface
{
    /**
     * @var array
     */
    protected $characteristics = [

        'FunctionalSuitability' => [
            'FunctionalCompleteness' => [
                'NumberOfFunctions',
                'FunctionalImplementationCompleteness',
                'FunctionalAdequacy',
                'FunctionalImplementationCoverage',
            ],
            'FunctionalCorrectness' => [
                'OperationTime',
                'NumberOfInaccurateComputationsEncounteredByUsers',
                'NumberOfDataItems',
                'ComputationalAccuracy',
                'Precision',
            ],
            'FunctionalAppropriateness' => [
                'OperationTime',
                'NumberOfFunctions',
                'FunctionalImplementationCompleteness',
                'FunctionalAdequacy',
                'FunctionalImplementationCoverage',
                'Precision',
            ]
        ],
        'Reliability' => [
            'Maturity' => [
                'OperationTime',
                'NumberOfFaults',
                'NumberOfFailures',
                'ProductSize',
                'NumberOfTestCases',
                'NumberOfResolvedFailures',
                'NumberOfCorrectedFaults',
                'FailureDensityAgainstTestCases',
                'FailureResolution',
                'FaultRemoval',
                'MeanTimeBetweenFailures',
                'TestMaturity',
                'EstimatedLatentFaultDensity',
                'FaultDensity',
            ],
            'Availability' => [
                'OperationTime',
                'TotalTimeDuringWhichTheSoftwareIsInAnUpState',
                'NumberOfObservedBreakdowns',
                'TotalDownTime',
            ],
            'FaultTolerance' => [
                'NumberOfFailures',
                'NumberOfTestCases',
                'NumberOfBreakdowns',
                'NumberOfFunctions',
                'NumberOfIllegalOperations',
            ],
            'Recoverability' => [
                'OperationTime',
                'NumberOfBreakdowns',
                'TimeToRepair',
                'DownTime',
                'NumberOfRestarts',
                'NumberOfRestoration',
                'Restartability',
            ]
        ],
        'PerformanceEfficiency' => [
            'TimeBehaviour' => [
                'OperationTime',
                'NumberOfTasks',
                'ResponseTime',
                'NumberOfEvaluations',
                'TurnaroundTime',
                'TaskTime',
                'MeanAmountOfThroughput',
            ],
            'ResourceUtilization' => [
                'OperationTime',
                'NumberOfFailures',
                'NumberOfEvaluations',
                'NumberOfIORelatedErrors',
                'UserWaitingTimeOfIODeviceUtilization',
                'NumberOfMemoryRelatedErrors',
                'NumberOfTransmissionRelatedError',
                'TransmissionCapacity',
                'IOUtilization(NumberOfBuffers)',
                'NumberOfLineOfCodeDirectly',
                'IOLoadingLimits',
                'MaximumMemoryUtilization',
                'MaximumTransmissionUtilizaton',
                'MeanOccurrenceOfTransmissionError',
            ],
            'Capacity' => [
                'NumberOfDataItems',
                'NumberOfConcurrentUsers',
                'CommunicationBandwidth',
                'MeanAmountOfThroughput',
                'SizeOfDatabase',
            ]
        ],
        'Usability' => [
            'AppropriatenessRecognisability' => [
                'NumberOfFunctions',
                'NumberOfTutorials',
                'NumberOfIODataItems',
                'CompletenessOfDescription',
                'FunctionUnderstandability',
                'UnderstandableInputAndOutput',
            ],
            'Learnability' => [
                'NumberOfFunctions',
                'OperationTime',
                'EaseOfFunctionLearning',
                'NumberOfTasks',
                'HelpFrequency',
                'EffectivenessOfTheUserDocumentationAndOrHelpSystem',
                'HelpAccessibility',
                'CompletenessOfUserDocumentationAndOrHelpFacility',
            ],
            'Operability' => [
                'NumberOfFunctions',
                'OperationTime',
                'ErrorCorrection',
                'NumberOfScreensOrForms',
                'NumberOfUserErrorsOrChanges',
                'NumberOfAttemptsToCustomize',
                'NumberOfIORelatedErrors',
                'NumberOfOperations',
                'NumberOfItemsWhichCouldCheckForValidData',
                'NumberOfMessagesImplemented',
                'NumberOfInterfaceElements',
                'PhysicalAccessibility',
                'NumberOfEasilyUnderstoodMessages',
            ],
            'UserErrorProtection' => [
                'NumberOfUnsuccessfullyRecoveredSituation',
                'NumberOfUserErrorsOrChanges',
                'OperationTime',
                'PeriodDuringObservation',
                'NumberOfOccurrencesOfUser\'sHumanErrorOperation',
                'NumberOfInputErrorsWhichTheUserSuccessfullyCorrects',
                'NumberOfAttemptsToCorrectInputErrors',
                'NumberOfErrorConditionsWhichTheUserSuccessfullyCorrects',
                'TotalNumberOfErrorConditionsTested',
                'NumberOfFunctions',
                'ImplementedWithUserErrorTolerance',
                'TotalNumberOfFunctions',
                'RequiringTheToleranceCapability',
                'TotalNumberOfIncorrectOperationPatterns',
            ],
            'UserInterfaceAesthethics' => [
                'NumberOfInterfaceElements',
                'NumberOfInterfaceGraphicalElements',
                'DegreeOfIncreaseThePleasureOfUser',
                'DegreeOfIncreaseTheSatisfactionOfUser',
                'DegreeOfErgonomicAttractiveness',
                'DegreeOfRealWorldMetaphorsUse',
            ],
            'Accessibility' => [
                'ExtentToWhichSoftwareCanBeUsedByUsersWithSpecifiedDisabilities',
                'EffectivenessOfWorkOfUsersWithSpecifiedDisabilities',
                'FreedomFromRiskForUsersWithSpecifiedDisabilities',
                'SatisfactionOfUsersWithSpecifiedDisabilities',
                'PresenceOfPropertiesThatSupportAccessibility',
            ]
        ],
        'Maintainability' => [
            'Modularity' => [
                'OperationTime',
                'NumberOfFailures',
                'NumberOfResolvedFailures',
                'NumberOfModificationsMade',
                'NumberOfVariables',
                'NumberOfFunctions',
                'NumberOfModules',
            ],
            'Reusability' => [
                'FunctionalCommonality',
                'NonFunctionalCommonality',
                'VariabilityRichness',
                'Applicability',
                'Tailorability',
                'ComponentReplaceability',
            ],
            'Analysability' => [
                'NumberOfFailures',
                'NumberOfDataItems',
                'ErrorTime',
                'NumberOfItemsRequiredToBeLogged',
                'NumberOfDiagnosticFunctionsRequired',
                'AuditTrailCapability',
            ],
            'Modifability' => [
                'OperationTime',
                'NumberOfRevisedVersions',
                'NumberOfResolvedFailures',
                'ErrorTime',
                'NumberOfFunctions',
                'ChangeControlCapability',
                'NumberOfTroublesWithinCertainPeriodBeforeModification',
                'NumberOfTroublesInSamePeriodAfterModification',
            ],
            'Testability' => [
                'OperationTime',
                'NumberOfTestCases',
                'NumberOfResolvedFailures',
                'NumberOfBuiltInTestFunctionsRequired',
                'NumberOfTestDependenciesOnOtherSystems',
                'NumberOfCheckpoints',
            ]
        ],
        'Security' => [
            'Confidentiality' => [
                'OperationTime',
                'NumberOfIllegalOperations',
                'NumberOfTestCases',
                'NumberOfInstancesOfDataCorruption',
                'NumberOfDataItems',
                'NumberOfAccessTypes',
                'NumberOfControllabilityRequirements',
                'AccessControllability',
                'CorrectlyEncrypedDecryped',
                'ToBeRequiredEncryptionDecryption',
            ],
            'Integrity' => [
                'OperationTime',
                'NumberOfIllegalOperations',
                'NumberOfTestCases',
                'NumberOfInstancesOfDataCorruption',
                'NumberOfDataItems',
                'NumberOfAccessTypes',
                'NumberOfControllabilityRequirements',
                'AccessControllability',
            ],
            'NonRepudiation' => [
                'NumberOfEventsProcessedUsingDigitalSignature',
                'NumberOfEventsRequiringNon',
                'RepudiationProperty'
            ],
            'Accountability' => [
                'NumberOfAccessesToSystemAndDataRecordedInTheSystemLog',
                'NumberOfAccessesActuallyOccured',
            ],
            'Authenticity' => [
                'NumberOfProvidedAuthentificationMethods',
            ]
        ],
        'Compatibility' => [
            'CoExistence' => [
                'OperationTime',
                'NumberOfFailures',
                'NumberOfFunctions',
                'NumberOfDataItems',
            ],
            'Interoperability' => [
                'OperationTime',
                'NumberOfDataFormatsRegardedByTool',
                'NumberOfDataFormatsToBeExchanged',
                'NumberOfInterfaceProtocols',
                'DataExchangeability',
            ]
        ],
        'Portability' => [
            'Adaptability' => [
                'NumberOfFunctions',
                'OperationTime',
                'NumberOfFaults',
                'PortingUserFriendliness',
                'NumberOfDataItems',
                'NumberOfDataStructures',
                'AdaptabilityOfDataStructures',
                'HardwareEnvironmentalAdaptability',
                'SoftwareEnvironmentalAdaptability',
                'NumberOfOperationalFunctionsOfWhichTasksWereNotCompletedOrAdequated',
                'TotalNumberOfFunctions',
                'WhichWereTestedInDifferentEnvironment',
            ],
            'Installability' => [
                'NumberOfFaults',
                'NumberOfSetupOperations',
                'NumberOfInstallationSteps',
                'EaseOfInstallation',
            ],
            'Replaceability' => [
                'NumberOfFunctions',
                'NumberOfDataItems',
                'NumberOfEntities',
            ]
        ]
    ];

    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        $attributes = [];

        foreach ($this->characteristics as $characteristicName => $subCharacteristics) {
            $characteristic = new Characteristic();
            $characteristic->setName($characteristicName);

            foreach ($subCharacteristics as $subCharacteristicName => $attributesNames) {
                $subCharacteristic = new Characteristic();
                $subCharacteristic->setName($subCharacteristicName);
                $subCharacteristic->setParent($characteristic);
                $characteristic->addChild($subCharacteristic);

                foreach ($attributesNames as $attributeName) {
                    $attribute = $attributes[$attributeName] ?? null;
                    if (!$attribute) {
                        $attribute = new Attribute();
                        $attribute->setName($attributeName);
                        $attributes[$attributeName] = $attribute;
                        $manager->persist($attribute);
                    }

                    $subCharacteristic->addAttribute($attribute);
                }
            }

            $manager->persist($characteristic);
        }

        $manager->flush();
    }
}
