<?php

namespace App\Components;

class Sidebar {
    private $items;

    public function __construct() {
        $this->items = $this->default();
    }

    public function for(String $role) {
        $this->items = Sidebar::default();
        $roleGroup = match ($role) {
            'ketua_rw',
            'ketua_rt',
            'sekretaris_rw',
            'sekretaris_rt',
            'bendahara_rw',
            'bendahara_rt'
                    => 'admin',
            'warga' => 'warga',
            'admin' => null,
            default => null
        };
        if ($roleGroup === 'admin') {
                $this->items['surat']['route'] = 'surat.riwayat';
                $this->items['pelaporan']['route'] = 'pelaporan.riwayat';
                unset($this->items['bansos']['children']['pengajuan-bansos']);
        }
        switch ($role) {
            case 'admin':
                break;
            case 'ketua_rw':
                break;
            case 'ketua_rt':
                unset($this->items['bansos']);
                break;
            case 'sekretaris_rw':
                break;
            case 'sekretaris_rt':
                unset($this->items['bansos']);
                break;
            case 'bendahara_rw':
                break;
            case 'bendahara_rt':
                unset($this->items['bansos']);
                break;
            case 'warga':
                $this->removeItem('data-warga');
                unset($this->items['bansos']['children']['evaluasi-penerima']);
                unset($this->items['bansos']['children']['daftar_pengajuan']);
                unset($this->items['users']);
                break;
            default:
                break;
        };
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

    public static function default() {
        return [
            // 'data-warga' => [
            //     'icon' => 'bi bi-people-fill',
            //     'label' => 'Data Warga',
            //     'route' => 'data-warga.index',
            //     'children' => []
            // ],
            'data-warga' => [
                'icon' => 'bi bi-people-fill',
                'label' => 'Data Warga',
                'route' => 'datawarga.index',
                'children' => []
            ],
            'surat' => [
                'icon' => 'bi bi-envelope',
                'label' => 'Surat',
                'route' => null,
                'children' => [
                    'pengajuan-surat' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Pengajuan Surat',
                        'route' => 'surat.pengajuan'
                    ],
                    'riwayat' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Riwayat Surat',
                        'route' => 'surat.riwayat'
                    ]
                ]
            ],
            'pelaporan' => [
                'icon' => 'bi bi-megaphone',
                'label' => 'Pelaporan',
                'route' => null,
                'children' => [
                    'lapor' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Pengajuan Lapor',
                        'route' => 'pelaporan.lapor'
                    ],
                    'riwayat' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Riwayat Pelaporan',
                        'route' => 'pelaporan.riwayat'
                    ]
                ]
            ],
            'kegiatan-dan-iuran' => [
                'icon' => 'bi bi-calendar',
                'label' => 'Kegiatan dan Iuran',
                'route' => null,
                'children' => [
                    'kegiatan' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Kegiatan Warga',
                        'route' => 'kegiatan.index'
                    ],
                    'iuran' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Iuran Warga',
                        'route' => 'iuran.index'
                    ]
                ]
            ],
            'bansos' => [
                'icon' => 'fa-solid fa-hand-holding-heart',
                'label' => 'Bantuan Sosial',
                'route' => null,
                'children' => [
                    // 'riwayat' => [
                    //     'icon' => 'bi bi-circle',
                    //     'label' => 'Riwayat Bansos',
                    //     'route' => 'bansos.riwayat'
                    // ],
                    // 'pengajuan' => [
                    //     'icon' => 'bi bi-circle',
                    //     'label' => 'Pengajuan Bansos',
                    //     'route' => 'bansos.pengajuan',
                    // ],
                    // 'permintaan' => [
                    //     'icon' => 'bi bi-circle',
                    //     'label' => 'Permintaan Bansos',
                    //     'route' => 'bansos.permintaan'
                    // ],
                    // 'data' => [
                    //     'icon' => 'bi bi-circle',
                    //     'label' => 'Data Bansos',
                    //     'route' => 'bansos.data'
                    // ],p
                    'evaluasi-penerima' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Evaluasi Penerima',
                        'route' => 'bansos.evaluasi-penerima'
                    ],
                    'pengajuan-bansos' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Pengajuan Bansos',
                        'route' => 'bansos.pengajuan-bansos'
                    ],
                    'daftar_pengajuan' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Daftar Pengajuan',
                        'route' => 'bansos.daftar_pengajuan'
                    ],
                    'penerima' => [
                        'icon' => 'bi bi-circle',
                        'label' => 'Penerima Bansos',
                        'route' => 'bansos.penerima'
                    ],
                ]
            ],
            'users' => [
                'icon' => 'bi bi-person',
                'label' => 'Pengguna',
                'route' => 'users.index',
                'children' => []
            ],
            // 'data-warga' => [
            //     'icon' => 'bi bi-people-fill',
            //     'label' => 'Data Warga',
            //     'route' => 'datawarga.index',
            //     'children' => []
            // ]
            // 'contoh-dengan-route' => [
            //     'icon' => 'bi bi-menu-button-wide',
            //     'label' => 'Contoh dengan Route',
            //     'route' => 'placeholder1',
            //     'children' => []
            // ]
        ];
    }
}
