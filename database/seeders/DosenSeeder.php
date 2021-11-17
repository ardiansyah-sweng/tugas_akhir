<?php

namespace Database\Seeders;

use App\Models\Dosen;

use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataDosen = (new DosenInformatika())->getDataDosen();
        foreach ($dataDosen as $dosen) {
            Dosen::create([
                'nipy' => $dosen['nipy'],
                'nidn' => $dosen['nidn'],
                'jabfung' => $dosen['jabfung'],
                'avatar' => $dosen['avatar'],
                'user_id' => $dosen['user_id'],
            ]);
        }
    }
}

class DosenInformatika
{
    function getDataDosen()
    {
        return [
            [
                'nipy' => '60160952',
                'nidn' => '0523068801',
                'jabfung' => 'AA',
                'avatar' => 'dosen/supri.jpg',
                'user_id' => '1',
            ],
            [
                'nipy' => '60030476',
                'nidn' => '0523077902',
                'jabfung' => 'L',
                'avatar' => 'dosen/ardiansyah.jpg',
                'user_id' => '2',
            ],
            [
                'nipy' => '60150841',
                'nidn' => '0524118801',
                'jabfung' => 'AA',
                'avatar' => 'dosen/adhi.jpg',
                'user_id' => '4',
            ],
            [
                'nipy' => '60160863',
                'nidn' => '0505118901',
                'jabfung' => 'L',
                'avatar' => 'dosen/azhari.jpg',
                'user_id' => '5',
            ],
            [
                'nipy' => '197310142005011001',
                'nidn' => '0014107301',
                'jabfung' => 'L',
                'avatar' => 'dosen/ali.jpg',
                'user_id' => '6',
            ],
            [
                'nipy' => '60110647',
                'nidn' => '0522018302',
                'jabfung' => 'AA',
                'avatar' => 'dosen/anna.jpg',
                'user_id' => '7',
            ],
            [
                'nipy' => '60030480',
                'nidn' => '0529056601',
                'jabfung' => 'AA',
                'avatar' => 'dosen/ardi.jpg',
                'user_id' => '8',
            ],
            [
                'nipy' => '60030480',
                'nidn' => '0529056601',
                'jabfung' => 'AA',
                'avatar' => 'dosen/andripranolo.jpg',
                'user_id' => '9',
            ],
            [
                'nipy' => '60090586',
                'nidn' => '0526018502',
                'jabfung' => 'L',
                'avatar' => 'dosen/arfiani.jpg',
                'user_id' => '10',
            ],
            [
                'nipy' => '60150842',
                'nidn' => '0521128502',
                'jabfung' => 'AA',
                'avatar' => 'dosen/ismi.jpg',
                'user_id' => '11',
            ],
            [
                'nipy' => '60040497',
                'nidn' => '0530077601',
                'jabfung' => 'L',
                'avatar' => 'dosen/dewi.jpg',
                'user_id' => '12',
            ],
            [
                'nipy' => '60191223',
                'nidn' => '0514079201',
                'jabfung' => 'TP',
                'avatar' => 'dosen/dinan.jpeg',
                'user_id' => '13',
            ],
            [
                'nipy' => '60160978',
                'nidn' => '0504088601',
                'jabfung' => 'AA',
                'avatar' => 'dosen/dwi.jpg',
                'user_id' => '14',
            ],
            [
                'nipy' => '197002062005011001',
                'nidn' => '0006027001',
                'jabfung' => 'LK',
                'avatar' => 'dosen/eko.jpg',
                'user_id' => '15',
            ],
            [
                'nipy' => '60191224',
                'nidn' => '0506079301',
                'jabfung' => 'TP',
                'avatar' => 'dosen/faisal.jpeg',
                'user_id' => '16',
            ],
            [
                'nipy' => '198011152005011002',
                'nidn' => '0015118001',
                'jabfung' => 'L',
                'avatar' => 'dosen/fiftin.jpg',
                'user_id' => '17',
            ],
            [
                'nipy' => '60181171',
                'nidn' => '0515058802',
                'jabfung' => 'AA',
                'avatar' => 'dosen/fitri.jpg',
                'user_id' => '18',
            ],
            [
                'nipy' => '60181172',
                'nidn' => '0509038402',
                'jabfung' => 'AA',
                'avatar' => 'dosen/guntur.jpeg',
                'user_id' => '19',
            ],
            [
                'nipy' => '197907202005011002',
                'nidn' => '0020077901',
                'jabfung' => 'L',
                'avatar' => 'dosen/bambang.jpeg',
                'user_id' => '20',
            ],
            [
                'nipy' => '60160951',
                'nidn' => '0520098702',
                'jabfung' => 'L',
                'avatar' => 'dosen/ika.jpg',
                'user_id' => '21',
            ],
            [
                'nipy' => '60160979',
                'nidn' => '0528058401',
                'jabfung' => 'AA',
                'avatar' => 'dosen/jefree.jpg',
                'user_id' => '22',
            ],
            [
                'nipy' => '60150773',
                'nidn' => '0511098401',
                'jabfung' => 'L',
                'avatar' => 'dosen/lisna.jpg',
                'user_id' => '23',
            ],
            [
                'nipy' => '60191225',
                'nidn' => '0515069001',
                'jabfung' => 'TP',
                'avatar' => 'dosen/miftah.jpeg',
                'user_id' => '24',
            ],
            [
                'nipy' => '60160960',
                'nidn' => '0519108901',
                'jabfung' => 'AA',
                'avatar' => 'dosen/murein.jpg',
                'user_id' => '25',
            ],
            [
                'nipy' => '60040496',
                'nidn' => '0510077302',
                'jabfung' => 'L',
                'avatar' => 'dosen/murinto.jpg',
                'user_id' => '26',
            ],
            [
                'nipy' => '60960147',
                'nidn' => '0506016701',
                'jabfung' => 'AA',
                'avatar' => 'dosen/mushlihudin.jpg',
                'user_id' => '27',
            ],
            [
                'nipy' => '60160980',
                'nidn' => '0509048901',
                'jabfung' => 'AA',
                'avatar' => 'dosen/nuril.jpg',
                'user_id' => '28',
            ],
            [
                'nipy' => '197608192005012001',
                'nidn' => '0019087601',
                'jabfung' => 'L',
                'avatar' => 'dosen/budyah.jpeg',
                'user_id' => '29',
            ],
            [
                'nipy' => '60980174',
                'nidn' => '0507087202',
                'jabfung' => 'L',
                'avatar' => 'dosen/rusydi.jpg',
                'user_id' => '30',
            ],
            [
                'nipy' => '60020388',
                'nidn' => '0516127501',
                'jabfung' => 'L',
                'avatar' => 'dosen/wiwin.png',
                'user_id' => '31',
            ],
            [
                'nipy' => '60010314',
                'nidn' => '0521127303',
                'jabfung' => 'AA',
                'avatar' => 'dosen/taufik.jpg',
                'user_id' => '32',
            ],
            [
                'nipy' => '60030475',
                'nidn' => '0407016801',
                'jabfung' => 'L',
                'avatar' => 'dosen/tedy.jpg',
                'user_id' => '33',
            ],
            [
                'nipy' => '60910095',
                'nidn' => '0504116601',
                'jabfung' => 'LK',
                'avatar' => 'dosen/wahyu.jpg',
                'user_id' => '34',
            ]
        ];
    }
}
