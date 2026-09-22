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
            ],

            'city-administrators-office' => [
                'name' => 'City Administrator’s Office',
                'acronym' => 'CAO',
                'description' => 'Provides administrative support and coordinates the implementation of city government programs.',
                'icon' => 'bi-building',
            ],

            'city-planning-and-development-office' => [
                'name' => 'City Planning and Development Office',
                'acronym' => 'CPDO',
                'description' => 'Responsible for city development planning and related planning activities.',
                'icon' => 'bi-map',
            ],

            'city-engineering-office' => [
                'name' => 'City Engineering Office',
                'acronym' => 'CEO',
                'description' => 'Handles engineering-related programs, infrastructure, and public works.',
                'icon' => 'bi-cone-striped',
            ],

            'city-health-office' => [
                'name' => 'City Health Office',
                'acronym' => 'CHO',
                'description' => 'Provides health programs and services to the residents of San Pedro.',
                'icon' => 'bi-heart-pulse',
            ],

            'city-social-welfare-and-development-office' => [
                'name' => 'City Social Welfare and Development Office',
                'acronym' => 'CSWDO',
                'description' => 'Provides social welfare programs and assistance to individuals, families, and communities.',
                'icon' => 'bi-people',
            ],

            'city-environment-and-natural-resources-office' => [
                'name' => 'City Environment and Natural Resources Office',
                'acronym' => 'CENRO',
                'description' => 'Supports environmental management and natural resource protection programs.',
                'icon' => 'bi-tree',
            ],

            'city-treasurers-office' => [
                'name' => 'City Treasurer’s Office',
                'acronym' => 'CTO',
                'description' => 'Handles local revenue collection and treasury-related functions.',
                'icon' => 'bi-cash-stack',
            ],

            'city-assessors-office' => [
                'name' => 'City Assessor’s Office',
                'acronym' => 'CAssO',
                'description' => 'Handles assessment and valuation of real properties within the city.',
                'icon' => 'bi-house',
            ],

            'city-human-resource-management-office' => [
                'name' => 'City Human Resource Management Office',
                'acronym' => 'CHRMO',
                'description' => 'Manages human resource programs and personnel-related services of the city government.',
                'icon' => 'bi-person-badge',
            ],

            'city-general-services-office' => [
                'name' => 'City General Services Office',
                'acronym' => 'CGSO',
                'description' => 'Provides general support, property, supplies, and logistical services to the city government.',
                'icon' => 'bi-box-seam',
            ],

            'city-legal-office' => [
                'name' => 'City Legal Office',
                'acronym' => 'CLO',
                'description' => 'Provides legal advice and assistance to the City Government.',
                'icon' => 'bi-briefcase',
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