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
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Pengajuan Surat',
                        'route' => 'pengajuansurat.index'
                    ],
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Riwayat Surat',
                        'route' => 'riwayatsurat.index'
                    ]
                ]
            ],
            'pelaporan' => [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Pelaporan',
                'route' => null,
                'children' => [
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Pengajuan Lapor',
                        'route' => 'pelaporan.index'
                    ],
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Riwayat Pelaporan',
                        'route' => 'riwayatpelaporan.index'
                    ]
                ]
            ],
            'kegiatan-dan-iuran' => [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Kegiatan dan Iuran',
                'route' => null,
                'children' => [
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Kegiatan Warga',
                        'route' => 'kegiatandaniuran.index'
                    ],
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Iuran Warga',
                        'route' => 'iuranwarga.index'
                    ]
                ]
            ],
            'bantuan-sosial' => [
                'icon' => 'bi-menu-button-wide',
                'label' => 'Bantuan Sosial',
                'route' => null,
                'children' => [
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Riwayat Bansos',
                        'route' => 'placeholder1'
                    ],
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Pengajuan Bansos',
                        'route' => 'placeholder1'
                    ],
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Permintaan Bansos',
                        'route' => 'placeholder1'
                    ],
                    [
                        'icon' => 'bi-circle',
                        'label' => 'Data Bansos',
                        'route' => 'placeholder1'
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
