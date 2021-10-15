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
        //Supriyanto
        Dosen::create([
            'nipy' => '60160952',
            'nidn' => '0523068801',
            'jabfung' => 'AA',
            'avatar' => 'dosen/supri.jpg',
            'user_id' => '1',
        ]);

        //Ardiansyah
        Dosen::create([
            'nipy' => '60030476',
            'nidn' => '0523077902',
            'jabfung' => 'L',
            'avatar' => 'dosen/ardiansyah.jpg',
            'user_id' => '2',
        ]);

        //Adi prahara
        Dosen::create([
            'nipy' => '60150841',
            'nidn' => '0524118801',
            'jabfung' => 'AA',
            'avatar' => 'dosen/adhi.jpg',
            'user_id' => '4',
        ]);

         //Ahmad Azhari
         Dosen::create([
            'nipy' => '60160863',
            'nidn' => '0505118901',
            'jabfung' => 'L',
            'avatar' => 'dosen/azhari.jpg',
            'user_id' => '5',
        ]);

        //Ali Tarmuji
        //error
        Dosen::create([
            'nipy' => '197310142005011001',
            'nidn' => '0014107301',
            'jabfung' => 'L',
            'avatar' => 'dosen/ali.jpg',
            'user_id' => '6',
        ]);

        //Ana Hendri
        Dosen::create([
            'nipy' => '60110647',
            'nidn' => '0522018302',
            'jabfung' => 'AA',
            'avatar' => 'dosen/anna.jpg',
            'user_id' => '7',
        ]);

        //Ardi pujianto
        Dosen::create([
            'nipy' => '60030480',
            'nidn' => '0529056601',
            'jabfung' => 'AA',
            'avatar' => 'dosen/ardi.jpg',
            'user_id' => '8',
        ]);

        //Andri pranolo
        Dosen::create([
            'nipy' => '60030480',
            'nidn' => '0529056601',
            'jabfung' => 'AA',
            'avatar' => 'dosen/andripranolo.jpg',
            'user_id' => '9',
        ]);

         //Arfiani nur khusna
         Dosen::create([
            'nipy' => '60090586',
            'nidn' => '0526018502',
            'jabfung' => 'L',
            'avatar' => 'dosen/arfiani.jpg',
            'user_id' => '10',
        ]);

        //Dewi ismi
        Dosen::create([
            'nipy' => '60150842',
            'nidn' => '0521128502',
            'jabfung' => 'AA',
            'avatar' => 'dosen/ismi.jpg',
            'user_id' => '11',
        ]);
        
        //Dewi soyu
        Dosen::create([
            'nipy' => '60040497',
            'nidn' => '0530077601',
            'jabfung' => 'L',
            'avatar' => 'dosen/dewi.jpg',
            'user_id' => '12',
        ]);

        //Dinan yulinto
        Dosen::create([
            'nipy' => '60191223',
            'nidn' => '0514079201',
            'jabfung' => 'TP',
            'avatar' => 'dosen/dinan.jpeg',
            'user_id' => '13',
        ]);

        //Dwi normawati
        Dosen::create([
            'nipy' => '60160978',
            'nidn' => '0504088601',
            'jabfung' => 'AA',
            'avatar' => 'dosen/dwi.jpg',
            'user_id' => '14',
        ]);

        //Eko ab
        Dosen::create([
            'nipy' => '197002062005011001',
            'nidn' => '0006027001',
            'jabfung' => 'LK',
            'avatar' => 'dosen/eko.jpg',
            'user_id' => '15',
        ]);

        //Faisal fajri
        Dosen::create([
            'nipy' => '60191224',
            'nidn' => '0506079301',
            'jabfung' => 'TP',
            'avatar' => 'dosen/faisal.jpeg',
            'user_id' => '16',
        ]);

        //Fifitin noviyanto
        Dosen::create([
            'nipy' => '198011152005011002',
            'nidn' => '0015118001',
            'jabfung' => 'L',
            'avatar' => 'dosen/fiftin.jpg',
            'user_id' => '17',
        ]);

        //Fitri indikawati
        Dosen::create([
            'nipy' => '60181171',
            'nidn' => '0515058802',
            'jabfung' => 'AA',
            'avatar' => 'dosen/fitri.jpg',
            'user_id' => '18',
        ]);

        //Guntur zamroni
        Dosen::create([
            'nipy' => '60181172',
            'nidn' => '0509038402',
            'jabfung' => 'AA',
            'avatar' => 'dosen/guntur.jpeg',
            'user_id' => '19',
        ]);

        //Bambang robiin
        //error
        Dosen::create([
            'nipy' => '197907202005011002',
            'nidn' => '0020077901',
            'jabfung' => 'L',
            'avatar' => 'dosen/bambang.jpeg',
            'user_id' => '20',
        ]);

        //Ika arfiani
        Dosen::create([
            'nipy' => '60160951',
            'nidn' => '0520098702',
            'jabfung' => 'L',
            'avatar' => 'dosen/ika.jpg',
            'user_id' => '21',
        ]);

        //Jefree fahana
        Dosen::create([
            'nipy' => '60160979',
            'nidn' => '0528058401',
            'jabfung' => 'AA',
            'avatar' => 'dosen/jefree.jpg',
            'user_id' => '22',
        ]);

        //Lisna zahrotun
        Dosen::create([
            'nipy' => '60150773',
            'nidn' => '0511098401',
            'jabfung' => 'L',
            'avatar' => 'dosen/lisna.jpg',
            'user_id' => '23',
        ]);

        //Miftahurrosyada
        Dosen::create([
            'nipy' => '60191225',
            'nidn' => '0515069001',
            'jabfung' => 'TP',
            'avatar' => 'dosen/miftah.jpeg',
            'user_id' => '24',
        ]);

        //Murein miksa
        Dosen::create([
            'nipy' => '60160960',
            'nidn' => '0519108901',
            'jabfung' => 'AA',
            'avatar' => 'dosen/murein.jpg',
            'user_id' => '25',
        ]);

        //Murinto
        Dosen::create([
            'nipy' => '60040496',
            'nidn' => '0510077302',
            'jabfung' => 'L',
            'avatar' => 'dosen/murinto.jpg',
            'user_id' => '26',
        ]);

        //muslihudin
        Dosen::create([
            'nipy' => '60960147',
            'nidn' => '0506016701',
            'jabfung' => 'AA',
            'avatar' => 'dosen/mushlihudin.jpg',
            'user_id' => '27',
        ]);

        //Nuril anwar
        Dosen::create([
            'nipy' => '60160980',
            'nidn' => '0509048901',
            'jabfung' => 'AA',
            'avatar' => 'dosen/nuril.jpg',
            'user_id' => '28',
        ]);

        //Nur rochmah dyah
        //error
        Dosen::create([
            'nipy' => '197608192005012001',
            'nidn' => '0019087601',
            'jabfung' => 'L',
            'avatar' => 'dosen/budyah.jpeg',
            'user_id' => '29',
        ]);

        //Rusdi umar
        Dosen::create([
            'nipy' => '60980174',
            'nidn' => '0507087202',
            'jabfung' => 'L',
            'avatar' => 'dosen/rusydi.jpg',
            'user_id' => '30',
        ]);

        //Sri winiarti
        Dosen::create([
            'nipy' => '60020388',
            'nidn' => '0516127501',
            'jabfung' => 'L',
            'avatar' => 'dosen/wiwin.png',
            'user_id' => '31',
        ]);

        //Taufiq ismail
        Dosen::create([
            'nipy' => '60010314',
            'nidn' => '0521127303',
            'jabfung' => 'AA',
            'avatar' => 'dosen/taufik.jpg',
            'user_id' => '32',
        ]);

        //Tedy setiadi
        Dosen::create([
            'nipy' => '60030475',
            'nidn' => '0407016801',
            'jabfung' => 'L',
            'avatar' => 'dosen/tedy.jpg',
            'user_id' => '33',
        ]);

        //Wahyu pujiono
        Dosen::create([
            'nipy' => '60910095',
            'nidn' => '0504116601',
            'jabfung' => 'LK',
            'avatar' => 'dosen/wahyu.jpg',
            'user_id' => '34',
        ]);

    
    }
}
