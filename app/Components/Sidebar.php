<?php

namespace App\Components;

class Sidebar {
    private $items;

    public function __construct() {
        $this->items = [
            'pengajuan-surat' => [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Pengajuan Surat',
                'route' => null,
                'children' => [
                    'pengajuan-surat' => [
                        'icon' => 'bi-circle',
                        'label' => 'Pengajuan Surat',
                        'route' => 'surat.pengajuan'
                    ],
                    'riwayat' => [
                        'icon' => 'bi-circle',
                        'label' => 'Riwayat Surat',
                        'route' => 'surat.riwayat'
                    ]
                ]
            ],
            'pelaporan' => [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Pelaporan',
                'route' => null,
                'children' => [
                    'lapor' => [
                        'icon' => 'bi-circle',
                        'label' => 'Pengajuan Lapor',
                        'route' => 'pelaporan.lapor'
                    ],
                    'riwayat' => [
                        'icon' => 'bi-circle',
                        'label' => 'Riwayat Pelaporan',
                        'route' => 'pelaporan.riwayat'
                    ]
                ]
            ],
            'kegiatan-dan-iuran' => [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Kegiatan dan Iuran',
                'route' => null,
                'children' => [
                    'kegiatan' => [
                        'icon' => 'bi-circle',
                        'label' => 'Kegiatan Warga',
                        'route' => 'kegiatan.index'
                    ],
                    'iuran' => [
                        'icon' => 'bi-circle',
                        'label' => 'Iuran Warga',
                        'route' => 'iuran.index'
                    ]
                ]
            ],
            'bansos' => [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Bantuan Sosial',
                'route' => null,
                'children' => [
                    'riwayat' => [
                        'icon' => 'bi-circle',
                        'label' => 'Riwayat Bansos',
                        'route' => 'bansos.riwayat'
                    ],
                    'pengajuan' => [
                        'icon' => 'bi-circle',
                        'label' => 'Pengajuan Bansos',
                        'route' => 'bansos.pengajuan',
                    ],
                    'permintaan' => [
                        'icon' => 'bi-circle',
                        'label' => 'Permintaan Bansos',
                        'route' => 'bansos.permintaan'
                    ],
                    'data' => [
                        'icon' => 'bi-circle',
                        'label' => 'Data Bansos',
                        'route' => 'bansos.data'
                    ],
                ]
            ],
            'contoh-dengan-route' => [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Contoh dengan Route',
                'route' => 'placeholder1',
                'children' => []
            ]
        ];
    }

    public function getItem($key) {
        return $this->items[$key];
    }

    public function getItems() {
        return $this->items;
    }

    public function addItem($key, $item) {
        if (isset($this->items[$key])) {
            throw new \Exception("Item {$key} already exists.");
        }
        if (!isset($item['icon']) && !isset($item['label']) && !isset($item['route']) && !isset($item['children'])) {
            throw new \Exception("Item is not valid.");
        }
        foreach ($item['children'] as $childKey => $childItem) {
            ($childKey); //unused, remove this line if used later
            if (!isset($childItem['icon']) && !isset($childItem['label']) && !isset($childItem['route'])) {
                throw new \Exception("Child item is not valid.");
            }
        }
        $this->items[$key] = $item;
        return $this;
    }

    // public function addItems($items) {
    //     foreach ($items as $key => $item) {
    //         $this = $this->addItem($key, $item);
    //     }
    //     return $this;
    // }

    public function removeItem($key) {
        unset($this->items[$key]);
        return $this;
    }

    // public function removeItems($keys) {
    //     foreach ($keys as $key) {
    //         $this = $this->removeItem($key);
    //     }
    //     return $this;
    // }
}
