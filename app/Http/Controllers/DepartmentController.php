<?php

namespace App\Http\Controllers;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = [
            [
                'name' => 'Public Affairs and Information Office',
                'acronym' => 'PAIO',
                'description' => 'Handles public information, communications, and information dissemination of the City Government.',
                'icon' => 'bi-megaphone',
            ],
            [
                'name' => 'City Administrator’s Office',
                'acronym' => 'CAO',
                'description' => 'Provides administrative support and coordinates the implementation of city government programs.',
                'icon' => 'bi-building',
            ],
            [
                'name' => 'City Planning and Development Office',
                'acronym' => 'CPDO',
                'description' => 'Responsible for city development planning and related planning activities.',
                'icon' => 'bi-map',
            ],
            [
                'name' => 'City Engineering Office',
                'acronym' => 'CEO',
                'description' => 'Handles engineering-related programs, infrastructure, and public works.',
                'icon' => 'bi-cone-striped',
            ],
            [
                'name' => 'City Health Office',
                'acronym' => 'CHO',
                'description' => 'Provides health programs and services to the residents of San Pedro.',
                'icon' => 'bi-heart-pulse',
            ],
            [
                'name' => 'City Social Welfare and Development Office',
                'acronym' => 'CSWDO',
                'description' => 'Provides social welfare programs and assistance to individuals, families, and communities.',
                'icon' => 'bi-people',
            ],
            [
                'name' => 'City Environment and Natural Resources Office',
                'acronym' => 'CENRO',
                'description' => 'Supports environmental management and natural resource protection programs.',
                'icon' => 'bi-tree',
            ],
            [
                'name' => 'City Treasurer’s Office',
                'acronym' => 'CTO',
                'description' => 'Handles local revenue collection and treasury-related functions.',
                'icon' => 'bi-cash-stack',
            ],
            [
                'name' => 'City Assessor’s Office',
                'acronym' => 'CAssO',
                'description' => 'Handles assessment and valuation of real properties within the city.',
                'icon' => 'bi-house',
            ],
            [
                'name' => 'City Human Resource Management Office',
                'acronym' => 'CHRMO',
                'description' => 'Manages human resource programs and personnel-related services of the city government.',
                'icon' => 'bi-person-badge',
            ],
            [
                'name' => 'City General Services Office',
                'acronym' => 'CGSO',
                'description' => 'Provides general support, property, supplies, and logistical services to the city government.',
                'icon' => 'bi-box-seam',
            ],
            [
                'name' => 'City Legal Office',
                'acronym' => 'CLO',
                'description' => 'Provides legal advice and assistance to the City Government.',
                'icon' => 'bi-briefcase',
            ],
        ];

        return view('departments.index', compact('departments'));
    }
}