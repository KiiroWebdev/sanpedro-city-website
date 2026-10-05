<?php

namespace App\Http\Controllers;

class DepartmentController extends Controller
{
    private function departments(): array
    {
        return [
            'public-affairs-and-information-office' => [
    'name' => 'Public Affairs and Information Office',
    'acronym' => 'PAIO',
    'description' => 'Handles public information, communications, and information dissemination of the City Government.',
    'icon' => 'bi-megaphone',

    'head' => null,

    'address' => '4F New City Hall Bldg., Brgy. Poblacion, City of San Pedro, Laguna',

    'phone' => '(02) 8808-2020',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

            'city-administrators-office' => [
    'name' => 'City Administrator’s Office',
    'acronym' => 'CAO',
    'description' => 'Provides administrative support and coordinates the implementation of city government programs.',
    'icon' => 'bi-building',

    'head' => null,

    'address' => '4/F, City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020 Local 320/410',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

            'city-planning-and-development-office' => [
    'name' => 'City Planning and Development Office',
    'acronym' => 'CPDO',
    'description' => 'Responsible for city development planning and related planning activities.',
    'icon' => 'bi-map',

    'head' => 'Cherry Lou I. Zoleta',

    'address' => '4/F, City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020 Local 406/407',

   'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

           'city-engineering-office' => [
    'name' => 'City Engineering Office',
    'acronym' => 'CEO',
    'description' => 'Handles engineering-related programs, infrastructure, and public works.',
    'icon' => 'bi-cone-striped',

    'head' => 'Engr. Raphael S. Garcia, Jr.',

    'address' => '2/F, City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020 Local 202/203',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

            'city-health-office' => [
    'name' => 'City Health Office',
    'acronym' => 'CHO',
    'description' => 'Provides health programs and services to the residents of San Pedro.',
    'icon' => 'bi-heart-pulse',

    'head' => 'Dr. Robert R. Olivarez',

    'address' => '3/F, City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020 Local 302',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

            'city-social-welfare-and-development-office' => [
    'name' => 'City Social Welfare and Development Office',
    'acronym' => 'CSWDO',
    'description' => 'Provides social welfare programs and assistance to individuals, families, and communities.',
    'icon' => 'bi-people',

    'head' => null,

    'address' => 'B/F, City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020 Local 210',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

           'city-environment-and-natural-resources-office' => [
    'name' => 'City Environment and Natural Resources Office',
    'acronym' => 'CENRO',
    'description' => 'Supports environmental management and natural resource protection programs.',
    'icon' => 'bi-tree',

    'head' => 'Marilou Q. Balba',

    'address' => 'City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => null,

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

            'city-treasurers-office' => [
    'name' => 'City Treasurer’s Office',
    'acronym' => 'CTO',
    'description' => 'Handles local revenue collection and treasury-related functions.',
    'icon' => 'bi-cash-stack',

    'head' => 'Enelyn DS Abaigar',

    'address' => 'G/F, City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020 Local 110/111 | (02) 8868-0143',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

           'city-assessors-office' => [
    'name' => 'City Assessor’s Office',
    'acronym' => 'CAssO',
    'description' => 'Handles assessment and valuation of real properties within the city.',
    'icon' => 'bi-house',

    'head' => null,

    'address' => null,

    'phone' => null,

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

            'city-human-resource-management-office' => [
    'name' => 'City Human Resource Management Office',
    'acronym' => 'CHRMO',
    'description' => 'Manages human resource programs and personnel-related services of the city government.',
    'icon' => 'bi-person-badge',

    'head' => null,

    'address' => 'City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],
'city-education-and-development-office' => [
    'name' => 'City Education and Development Office',
    'acronym' => 'CEDO',
    'description' => 'Manages city education programs, scholarships, and educational assistance initiatives.',
    'icon' => 'bi-mortarboard',

    'head' => 'Jamie R. Ambayec',

    'address' => 'City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

            'city-disaster-risk-reduction-and-management-office' => [
    'name' => 'City Disaster Risk Reduction and Management Office',
    'acronym' => 'CDRRMO',
    'description' => 'Leads disaster risk reduction and management, emergency preparedness, response, and related programs of the City Government.',
    'icon' => 'bi-shield-exclamation',

    'head' => null,

    'address' => 'City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8403-2648 / 0998-594-1743',

    'hours' => '24/7 Emergency and Disaster Response',
],

            'city-general-services-office' => [
    'name' => 'City General Services Office',
    'acronym' => 'CGSO',
    'description' => 'Provides general support, property, supplies, and logistical services to the city government.',
    'icon' => 'bi-box-seam',

    'head' => null,

    'address' => 'City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => null,

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

'city-veterinary-office' => [
    'name' => 'City Veterinary Office',
    'acronym' => 'CVO',
    'description' => 'Provides veterinary services and supports animal health, welfare, and related programs in the city.',
    'icon' => 'bi-heart-pulse',

    'head' => null,

    'address' => 'B/F, City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020 Local 109',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],
'persons-with-disability-affairs-office' => [
    'name' => 'Persons with Disability Affairs Office',
    'acronym' => 'PDAO',
    'description' => 'Coordinates programs, services, and assistance for persons with disabilities and promotes their rights and inclusion in the community.',
    'icon' => 'bi-universal-access',

    'head' => null,

    'address' => 'City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020 Local 122',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

'city-tourism-culture-and-arts-office' => [
    'name' => 'City Tourism, Culture and Arts Office',
    'acronym' => 'CTCAO',
    'description' => 'Promotes the city’s tourism, cultural heritage, arts, and related programs and activities.',
    'icon' => 'bi-camera',
    
    'head' => null,

    'address' => 'City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => null,

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],

           'city-legal-office' => [
    'name' => 'City Legal Office',
    'acronym' => 'CLO',
    'description' => 'Provides legal advice and assistance to the City Government.',
    'icon' => 'bi-briefcase',

    'head' => null,

    'address' => 'City Hall of San Pedro, San Pedro City, Laguna',

    'phone' => '(02) 8808-2020',

    'hours' => 'Monday to Friday, 8:00 AM – 5:00 PM',
],
        ];
    }

    public function index()
    {
        $departments = $this->departments();

        return view('departments.index', compact('departments'));
    }

    public function show(string $slug)
    {
        $departments = $this->departments();

        abort_unless(isset($departments[$slug]), 404);

        $department = $departments[$slug];

        return view(
            'departments.show',
            compact('department')
        );
    }
}