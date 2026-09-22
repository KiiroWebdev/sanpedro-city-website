<?php

namespace App\Http\Controllers;

class CityOfficialsController extends Controller
{
    public function index()
    {
        $officials = [
            [
                'name' => 'Art Joseph Francis Mercado',
                'position' => 'City Mayor',
                'icon' => 'bi-person-badge',
                'featured' => true,
            ],
            [
                'name' => 'Sheriliz "Niña" B. Almoro',
                'position' => 'City Vice Mayor',
                'icon' => 'bi-person-badge',
                'featured' => true,
            ],
        ];

        $councilors = [
            'Michael M. Casacop',
            'Atty. Mark S. Oliveros',
            'Leslie E. Lu',
            'Joie Chelsea V. Villegas',
            'Kent S. Lagasca',
            'Abraham S. Cataquiz',
            'Vincent Jude T. Solidum',
            'Maria Rosario P. Campos',
            'Aldrin Gerrold C. Mercado',
            'Mark Eliezer A. Acierto',
            'Iryne V. Vierneza',
            'Earl Gius Z. Castasus',
        ];

        return view(
            'city-officials.index',
            compact('officials', 'councilors')
        );
    }
}