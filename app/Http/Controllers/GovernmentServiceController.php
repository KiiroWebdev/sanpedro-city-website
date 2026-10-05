<?php

namespace App\Http\Controllers;

class GovernmentServiceController extends Controller
{
    private function categories(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Business & Permits
            |--------------------------------------------------------------------------
            */

            'business-permits' => [
                'name' => 'Business & Permits',
                'description' => 'Services related to business registration, permits, and licensing.',
                'icon' => 'bi-shop',

                'office' => 'Business Permits and Licensing Office (BPLO)',

'contact' => [
    'address' => 'New City Hall Bldg., Brgy. Poblacion, City of San Pedro, Laguna',
    'phone' => '(02) 8808-2020',
    'email' => 'paio.cityofsanpedro@gmail.com',
],

'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',

                'services' => [

                    [
                        'name' => 'Business Permit',
                        'slug' => 'business-permit',
                        'description' => 'Application for a new business permit for eligible business owners or business entities.',

                        'office' => 'Business Permits and Licensing Office',
                        'classification' => 'Simple',
                        'transaction_type' => 'G2B - Government to Business Entity',
                        'who_may_avail' => 'Business Owner or Business Entity',

                        'requirements' => [
                            'Pre-printed filled-out Application Form for Business Permit (NEW) — 3 copies',
                            'DTI / SEC Registration — 1 original copy',
                            'Barangay Tax Order of Payment — 1 original copy',
                            'Contract of Lease, if rented — 1 original copy',
                            'Real Property Tax Official Receipt — 1 original copy',
                            'Sketch of Business Location — 1 original copy',
                            'Clearances — 1 original copy',
                            'Unified Clearance — 1 original copy',
                            'Tax Order of Payment (TOP) — 3 copies',
                            'Community Tax Certificate — 1 original copy',
                            'Official Receipt — 1 original copy',
                            'Fire Safety Inspection Certificate — 1 original copy',
                        ],

                       'procedure' => [
    [
        'client_step' => 'Application',
        'agency_action' => 'Receive and process the business permit application.',
        'fee' => 'None',
        'processing_time' => 'Part of the overall processing time.',
        'person_responsible' => 'Business Permits and Licensing Office',
    ],

    [
        'client_step' => 'Assessment and Tax Order of Payment (TOP)',
        'agency_action' => 'Assess applicable taxes and charges and issue the TOP.',
        'fee' => 'Business Tax and applicable fees.',
        'processing_time' => 'Part of the overall processing time.',
        'person_responsible' => 'Business Permits and Licensing Office',
    ],

    [
        'client_step' => 'Payment',
        'agency_action' => 'Receive payment of assessed taxes and applicable fees.',
        'fee' => 'Business Tax + Mayor’s Permit + Other Fees + Fire Safety Inspection Fee + CTC Fee.',
        'processing_time' => 'Varies according to payment transaction.',
        'person_responsible' => 'Appropriate City Government payment office.',
    ],

    [
        'client_step' => 'Releasing',
        'agency_action' => 'Release the approved Business Permit together with supporting documents and Business Plate.',
        'fee' => 'None',
        'processing_time' => '5 minutes for release after approval.',
        'person_responsible' => 'BPLO Clerk / Tax Mapping Aide, as applicable.',
    ],
],

                        'processing_time' => 'Post-Audit/Inspection Business: 1 Hour and 35 Minutes. Pre-Audit/Inspection Business: 1 Hour and 20 Minutes, with 1 day inspection where applicable.',
                        'fees' => 'Business Tax + Mayor’s Permit + Other Fees + Fire Safety Inspection Fee + CTC Fee.',
                    ],

                   [
    'name' => 'Business Permit Renewal',
    'slug' => 'business-permit-renewal',
    'description' => 'Renewal of an existing business permit for business owners or business entities operating within the City of San Pedro.',

    'office' => 'Business Permits and Licensing Office',
    'classification' => 'Simple',
    'transaction_type' => 'G2B - Government to Business Entity',
    'who_may_avail' => 'Business Owner or Business Entity',

    'requirements' => [
        'Accomplished Business Permit Renewal Application Form',
        'Unified Clearance',
        'Declaration of Gross Sales / Financial Statement, as applicable',
        'Applicable BIR Form/s',
        'Tax Order of Payment (TOP)',
        'Community Tax Certificate (CTC)',
        'Official Receipt',
        'Fire Safety Inspection Certificate',
    ],

    'procedure' => [
        [
            'client_step' => 'Application',
            'agency_action' => 'Submit the accomplished application and required supporting documents for renewal.',
            'fee' => 'None',
            'processing_time' => 'Part of the overall processing time.',
            'person_responsible' => 'Business Permits and Licensing Office',
        ],

        [
            'client_step' => 'Assessment and Tax Order of Payment (TOP)',
            'agency_action' => 'Assess the applicable business taxes and fees and issue the Tax Order of Payment.',
            'fee' => 'Applicable business taxes and fees.',
            'processing_time' => 'Part of the overall processing time.',
            'person_responsible' => 'Business Permits and Licensing Office',
        ],

        [
            'client_step' => 'Payment',
            'agency_action' => 'Pay the assessed business taxes and applicable fees.',
            'fee' => 'Applicable business taxes and fees.',
            'processing_time' => 'Varies according to payment transaction.',
            'person_responsible' => 'Appropriate City Government payment office.',
        ],

        [
            'client_step' => 'Releasing',
            'agency_action' => 'Claim the approved renewed Business Permit and related documents.',
            'fee' => 'None',
            'processing_time' => 'Part of the overall processing time.',
            'person_responsible' => 'Business Permits and Licensing Office',
        ],
    ],

    'processing_time' => 'Processing time varies depending on the completeness of requirements, assessment, payment, and applicable inspection or verification.',
    
    'fees' => 'Applicable business taxes, Mayor’s Permit, other fees, Fire Safety Inspection Fee, and CTC Fee, as applicable.',

    'source' => 'City Government of San Pedro, Laguna Citizens’ Charter',
    'last_updated' => 'Reference: Citizens’ Charter',
],

                ],
            ],


            /*
            |--------------------------------------------------------------------------
            | Civil Registry
            |--------------------------------------------------------------------------
            */

'civil-registry' => [
    'name' => 'Civil Registry',
    'description' => 'Civil registration and document services for birth, marriage, and death records.',
    'icon' => 'bi-file-earmark-person',

    'office' => 'City Civil Registrar’s Office',

    'services' => [

        [
            'name' => 'Certified True Copy of Birth, Marriage or Death Certificate',
            'slug' => 'certified-true-copy',
            'description' => 'Request a certified true copy of a birth, marriage, or death certificate registered with the City Civil Registrar’s Office.',

            'office' => 'City Civil Registrar’s Office',
            'classification' => 'Simple',
            'transaction_type' => 'G2C - Government to Citizen',
            'who_may_avail' => 'Document-owners or the nearest surviving kin of the document-owner, as applicable.',

            'requirements' => [
                'At least two (2) valid government-issued IDs of the document-owner — 1 original and 1 photocopy.',
            ],

            'procedure' => [
                [
                    'client_step' => 'Submit Request',
                    'agency_action' => 'Submit the request form and required identification documents to the City Civil Registrar’s Office for verification.',
                    'fee' => 'None',
                    'processing_time' => '5 minutes',
                    'person_responsible' => 'City Civil Registrar’s Office',
                ],

                [
                    'client_step' => 'Payment',
                    'agency_action' => 'Issue the Order of Payment and instruct the client to pay the applicable fee.',
                    'fee' => 'PHP 100.00',
                    'processing_time' => '5 minutes',
                    'person_responsible' => 'City Civil Registrar’s Office',
                ],

                [
                    'client_step' => 'Preparation and Certification',
                    'agency_action' => 'Prepare and certify the requested copy.',
                    'fee' => 'None',
                    'processing_time' => '20 minutes',
                    'person_responsible' => 'City Civil Registrar’s Office',
                ],

                [
                    'client_step' => 'Claim Document',
                    'agency_action' => 'Release the Certified True Copy upon presentation of the official receipt.',
                    'fee' => 'None',
                    'processing_time' => '5 minutes',
                    'person_responsible' => 'City Civil Registrar’s Office',
                ],
            ],

            'processing_time' => '35 minutes',
            'fees' => 'PHP 100.00 per request, based on the 2025 Citizen’s Charter.',

            'source' => 'City Government of San Pedro, Laguna — 2025 Citizen’s Charter, City Civil Registrar’s Office.',
            'last_updated' => '2025 Citizen’s Charter',
        ],


        /*
        |--------------------------------------------------------------------------
        | Correction of Entry under R.A. 9048
        |--------------------------------------------------------------------------
        */

        [
            'name' => 'Correction of Entry under R.A. 9048',
            'slug' => 'correction-of-entry',
            'description' => 'Petition for correction of eligible civil registry entries under Republic Act No. 9048.',

            'office' => 'City Civil Registrar’s Office',
            'classification' => 'Highly-technical (Quasi-judicial)',
            'transaction_type' => 'G2C - Government to Citizen',
            'who_may_avail' => 'Persons whose Certificate of Live Birth, Marriage, or Death are registered in San Pedro, Laguna.',

            'requirements' => [

                'Erroneous PSA Certificate of Live Birth, Marriage, or Death — 1 original and 3 photocopies.',

                'At least two (2) valid government-issued IDs of the erroneous document-owner — 1 original and 3 photocopies.',

                'Current-year Community Tax Certificate (CTC) of the petitioner — 1 original and 3 photocopies.',

                'If the document-owner of the erroneous certificate is married: PSA Certificate of Marriage of the erroneous document-owner — 1 original and 3 photocopies.',

                'If the document-owner has children: PSA Certificate of Live Birth of the erroneous document-owner’s children — 1 original and 3 photocopies.',

                'If the document-owner is deceased: PSA Certificate of Death of the erroneous document-owner — 1 original and 3 photocopies.',

            ],

            'procedure' => [

                [
                    'client_step' => 'File Petition',
                    'agency_action' => 'Submit the petition and supporting documents to the City Civil Registrar’s Office for examination and verification.',
                    'fee' => 'Applicable petition fee.',
                    'processing_time' => 'Subject to evaluation and processing requirements.',
                    'person_responsible' => 'City Civil Registrar’s Office',
                ],

                [
                    'client_step' => 'Evaluation and Verification',
                    'agency_action' => 'Examine the petition and supporting documents and determine whether the petition is sufficient in form and substance.',
                    'fee' => 'None',
                    'processing_time' => 'Depends on document evaluation.',
                    'person_responsible' => 'City Civil Registrar’s Office',
                ],

                [
                    'client_step' => 'Posting / Publication, When Applicable',
                    'agency_action' => 'Complete the posting or publication requirements applicable to the petition.',
                    'fee' => 'Publication expenses, when applicable.',
                    'processing_time' => 'Depends on applicable posting or publication requirements.',
                    'person_responsible' => 'City Civil Registrar’s Office / Petitioner',
                ],

                [
                    'client_step' => 'Decision',
                    'agency_action' => 'Evaluate the completed petition and render the appropriate decision in accordance with applicable rules.',
                    'fee' => 'None',
                    'processing_time' => 'Subject to applicable processing requirements.',
                    'person_responsible' => 'City Civil Registrar’s Office',
                ],

            ],

            'processing_time' => 'The total processing time is dependent on the Civil Registrar’s processing and on activities outside the office’s control, including PSA processing or cases involving another Civil Registry Office.',

            'fees' => 'Applicable petition fees. The Citizen’s Charter notes that processing time excludes acts beyond the control of the City Civil Registrar’s Office.',

            'source' => 'City Government of San Pedro, Laguna — 2025 Citizen’s Charter, City Civil Registrar’s Office, Filing of Petitions under R.A. 9048.',

            'last_updated' => '2025 Citizen’s Charter',
        ],

    ],
],


            /*
            |--------------------------------------------------------------------------
            | Health Services
            |--------------------------------------------------------------------------
            */
'health-services' => [
    'name' => 'Health Services',
    'description' => 'Health consultation and other health services provided by the City Health Office.',
    'icon' => 'bi-heart-pulse',

    'office' => 'City Health Office (CHO)',

'contact' => [
    'address' => 'New City Hall Bldg., Brgy. Poblacion, City of San Pedro, Laguna',
    'phone' => '(02) 8808-2020 local 302',
    'email' => 'paio.cityofsanpedro@gmail.com',
],

    'services' => [

        [
            'name' => 'Out-patient Consultation (New Patient)',
            'slug' => 'out-patient-consultation',
            'description' => 'Medical consultation for individuals seeking outpatient assessment and treatment through the City Health Office.',

            'office' => 'City Health Office – RHU 1 & 2',
            'classification' => 'Simple',
            'transaction_type' => 'G2C - Government to Citizen',
            'who_may_avail' => 'Individuals seeking medical consultation.',

            'requirements' => [
                'None.',
            ],

            'procedure' => [

                [
                    'client_step' => 'Secure Queuing Number and Provide Patient Information',
                    'agency_action' => 'Issue a queuing number and prepare the patient’s Individual Patient Record (IPR).',
                    'fee' => 'None',
                    'processing_time' => '3 minutes',
                    'person_responsible' => 'Nursing Attendant — CHO-RHU I',
                ],

                [
                    'client_step' => 'Proceed for Initial Assessment',
                    'agency_action' => 'Conduct assessment, interview, and recording of vital signs.',
                    'fee' => 'None',
                    'processing_time' => '5 minutes',
                    'person_responsible' => 'Registered Nurse — CHO-RHU I',
                ],

                [
                    'client_step' => 'Proceed to Consultation Room',
                    'agency_action' => 'Conduct consultation, provide appropriate prescription and give follow-up instructions.',
                    'fee' => 'None',
                    'processing_time' => '30 minutes',
                    'person_responsible' => 'Medical Officer III — CHO-RHU I',
                ],

            ],

            'processing_time' => '38 minutes',
            'fees' => 'None',

            'source' => 'City Government of San Pedro, Laguna — 2025 Citizen’s Charter, City Health Office – RHU 1 & 2.',
            'last_updated' => '2025 Citizen’s Charter',
        ],


        [
            'name' => 'Out-patient Consultation (Follow-up Patient)',
            'slug' => 'out-patient-consultation-follow-up',
            'description' => 'Follow-up medical consultation for patients who have previously received outpatient care.',

            'office' => 'City Health Office – RHU 1 & 2',
            'classification' => 'Simple',
            'transaction_type' => 'G2C - Government to Citizen',
            'who_may_avail' => 'Individuals requiring follow-up medical consultation.',

            'requirements' => [
                'None.',
            ],

            'procedure' => [
                [
                    'client_step' => 'Secure Queuing Number and Provide Patient Information',
                    'agency_action' => 'Issue a queuing number and retrieve or prepare the patient record.',
                    'fee' => 'None',
                    'processing_time' => 'As prescribed in the Citizen’s Charter.',
                    'person_responsible' => 'City Health Office – RHU 1 & 2',
                ],

                [
                    'client_step' => 'Initial Assessment',
                    'agency_action' => 'Conduct the required assessment and recording of vital signs.',
                    'fee' => 'None',
                    'processing_time' => 'As prescribed in the Citizen’s Charter.',
                    'person_responsible' => 'City Health Office – RHU 1 & 2',
                ],

                [
                    'client_step' => 'Follow-up Consultation',
                    'agency_action' => 'Conduct follow-up consultation and provide appropriate medical advice or instructions.',
                    'fee' => 'None',
                    'processing_time' => 'As prescribed in the Citizen’s Charter.',
                    'person_responsible' => 'City Health Office – RHU 1 & 2',
                ],
            ],

            'processing_time' => 'Please verify the current processing time with the City Health Office before availing of the service.',
            'fees' => 'None.',

            'source' => 'City Government of San Pedro, Laguna — 2025 Citizen’s Charter, City Health Office – RHU 1 & 2.',
            'last_updated' => '2025 Citizen’s Charter',
        ],

    ],
],

            /*
            |--------------------------------------------------------------------------
            | Social Welfare
            |--------------------------------------------------------------------------
            */

            'social-welfare' => [
    'name' => 'Social Welfare',
    'description' => 'Social welfare programs and assistance for individuals and families in need.',
    'icon' => 'bi-people',

    'office' => 'City Social Welfare and Development Office (CSWDO)',

'contact' => [
    'address' => 'B/F, City Hall of San Pedro, San Pedro City, Laguna',
    'phone' => '(02) 8808-2020 local 210',
    'email' => 'paio.cityofsanpedro@gmail.com',
],

    'services' => [

        [
            'name' => 'Emergency Financial Assistance',
            'slug' => 'emergency-financial-assistance',
            'description' => 'Financial assistance for indigent residents of San Pedro City who are experiencing emergency situations, particularly victims of disasters such as fire incidents.',

            'office' => 'City Social Welfare and Development Office',
            'classification' => 'Complex',
            'transaction_type' => 'G2C - Government to Citizen',
            'who_may_avail' => 'Indigent Citizens of San Pedro City, Laguna who are in emergency situations.',

            'requirements' => [
                'Fire Incident Report — 1 original or 1 certified true copy.',
                'Accomplished Intake Sheet — 1 original copy.',
            ],

            'procedure' => [

                [
                    'client_step' => 'Submit Requirements and Attend Interview',
                    'agency_action' => 'Assign the client to an interviewer who will prepare a Social Case Study Report. Provide a contact number for follow-up and submit the documents to the Office of the Mayor for processing.',
                    'fee' => 'None',
                    'processing_time' => '30 minutes',
                    'person_responsible' => 'CSWDO Staff',
                ],

                [
                    'client_step' => 'Claim Financial Assistance',
                    'agency_action' => 'Release the approved financial assistance and facilitate the signing of the payroll.',
                    'fee' => 'None',
                    'processing_time' => '5 minutes',
                    'person_responsible' => 'CSWDO Staff / City Treasury Office Staff',
                ],

            ],

            'processing_time' => '35 minutes',

            'fees' => 'None',

            'source' => 'City Government of San Pedro, Laguna — 2025 Citizen’s Charter, City Social Welfare and Development Office.',

            'last_updated' => '2025 Citizen’s Charter',
        ],

    ],
],


            /*
            |--------------------------------------------------------------------------
            | Taxes & Payments
            |--------------------------------------------------------------------------
            */

            'taxes-payments' => [
    'name' => 'Taxes & Payments',
    'description' => 'Local tax assessment, payment, tax clearance, and related treasury services.',
    'icon' => 'bi-cash-stack',

    'office' => 'City Treasurer’s Office',

    'services' => [

        [
            'name' => 'Tax Clearance and Transfer Tax Certificate',
            'slug' => 'tax-clearance-transfer-tax-certificate',
            'description' => 'Request for tax computation and, when applicable, Tax Clearance and/or Transfer Tax Certificate from the City Treasurer’s Office.',

            'office' => 'City Treasurer’s Office',
            'classification' => 'Simple',
            'transaction_type' => 'G2C - Government to Citizen',
            'who_may_avail' => 'Taxpayers and persons requesting tax clearance or transfer tax-related certificates, subject to applicable requirements.',

            'requirements' => [
                'Required documents applicable to the requested tax clearance or transfer tax certificate.',
                'Proof of payment of the applicable amount due, when payment is required.',
            ],

            'procedure' => [

                [
                    'client_step' => 'Submit Required Documents',
                    'agency_action' => 'Receive and check the required documents submitted by the client.',
                    'fee' => 'None',
                    'processing_time' => '5 minutes',
                    'person_responsible' => 'Clerk — City Treasurer’s Office',
                ],

                [
                    'client_step' => 'Request Tax Computation, if Needed',
                    'agency_action' => 'Assist the client in the computation of applicable taxes.',
                    'fee' => 'None',
                    'processing_time' => '3 minutes',
                    'person_responsible' => 'Clerk — City Treasurer’s Office',
                ],

                [
                    'client_step' => 'Pay Amount Due and Request Certificate',
                    'agency_action' => 'Receive payment of the amount due, prepare the requested certificate, verify and sign the certificate, and release the requested certificate together with the official receipt and required documents.',
                    'fee' => 'Pursuant to the applicable provisions of the Revenue Code.',
                    'processing_time' => '7 minutes',
                    'person_responsible' => 'City Treasurer / Officer-in-Charge / Clerk — City Treasurer’s Office',
                ],

            ],

            'processing_time' => '15 minutes',

            'fees' => 'Applicable taxes, charges, and certification fees pursuant to the City Revenue Code.',

            'source' => 'City Government of San Pedro, Laguna — 2025 Citizen’s Charter, City Treasurer’s Office.',

            'last_updated' => '2025 Citizen’s Charter',
        ],

    ],
],


            /*
            |--------------------------------------------------------------------------
            | Permits & Clearances
            |--------------------------------------------------------------------------
            */

           'permits-clearances' => [
    'name' => 'Permits & Clearances',
    'description' => 'Permits, clearances, and regulatory approvals required for various activities and establishments.',
    'icon' => 'bi-file-earmark-check',

    'office' => 'Office of the Building Official – Business Section',

    'services' => [

        [
            'name' => 'Unified Clearance for Business',
            'slug' => 'unified-clearance-business',
            'description' => 'Processing of the Unified Clearance required for business permit applications and related regulatory clearances.',

            'office' => 'Office of the Building Official – Business Section',
            'classification' => 'Simple',
            'transaction_type' => 'G2C - Government to Citizen',
            'who_may_avail' => 'Business applicants who are required to secure a Unified Clearance for business permit purposes.',

            'requirements' => [
                'Unified Clearance for Business submitted through the Business Permits and Licensing Office (BPLO).',
            ],

            'procedure' => [

                [
                    'client_step' => 'Submit Unified Clearance for Business',
                    'agency_action' => 'Receive the required document and check it for completeness.',
                    'fee' => 'None',
                    'processing_time' => 'None',
                    'person_responsible' => 'Business Permits and Licensing Office Staff',
                ],

                [
                    'client_step' => 'Wait for Checking and Evaluation',
                    'agency_action' => 'Evaluate and assess the application, compute the applicable regulatory fees, sign the Unified Clearance, and return it to the BPLO.',
                    'fee' => 'Based on PD 1096 Schedule of Fees',
                    'processing_time' => '20 minutes',
                    'person_responsible' => 'Engineer — OBO-Business Section',
                ],

            ],

            'processing_time' => '20 minutes, excluding processing time from other departments.',

            'fees' => 'Based on the applicable PD 1096 Schedule of Fees.',

            'source' => 'City Government of San Pedro, Laguna — 2025 Citizen’s Charter, Office of the Building Official.',

            'last_updated' => '2025 Citizen’s Charter',
        ],

    ],
],

        ];
    }


    public function index()
{
    $categories = $this->categories();

    return view('services.index', compact('categories'));
}


    public function show(string $slug)
    {
        $categories = $this->categories();

        abort_unless(isset($categories[$slug]), 404);

        $category = $categories[$slug];
        $categorySlug = $slug;

        return view(
            'services.show',
            compact('category', 'categorySlug')
        );
    }


    public function service(string $categorySlug, string $serviceSlug)
    {
        $categories = $this->categories();

        abort_unless(isset($categories[$categorySlug]), 404);

        $category = $categories[$categorySlug];

        $service = collect($category['services'])
            ->firstWhere('slug', $serviceSlug);

        abort_unless($service, 404);

        return view(
            'services.service',
            compact('category', 'service', 'categorySlug')
        );
    }
}