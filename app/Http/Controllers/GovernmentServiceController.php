<?php

namespace App\Http\Controllers;

class GovernmentServiceController extends Controller
{
    public function index()
    {
        $categories = [
            [
                'name' => 'Business & Permits',
                'description' => 'Services related to business registration, permits, and licensing.',
                'icon' => 'bi-shop',
            ],
            [
                'name' => 'Civil Registry',
                'description' => 'Civil registry and related document services.',
                'icon' => 'bi-file-earmark-person',
            ],
            [
                'name' => 'Health Services',
                'description' => 'Health programs, medical assistance, and related services.',
                'icon' => 'bi-heart-pulse',
            ],
            [
                'name' => 'Social Welfare',
                'description' => 'Assistance and social welfare programs for individuals and families.',
                'icon' => 'bi-people',
            ],
            [
                'name' => 'Taxes & Payments',
                'description' => 'Local taxes, assessments, payments, and treasury services.',
                'icon' => 'bi-cash-stack',
            ],
            [
                'name' => 'Permits & Clearances',
                'description' => 'Applications for permits, clearances, and certifications.',
                'icon' => 'bi-file-earmark-check',
            ],
        ];

        return view('services.index', compact('categories'));
    }
}