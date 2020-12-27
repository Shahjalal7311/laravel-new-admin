<?php

namespace App\Exports;

use App\PerosnalInformation;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class personalInformationExport implements FromCollection, WithHeadings
{
    use Exportable;
    private $query;
    public function __construct(array $query)
    {
        $this->query = $query;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $builder = PerosnalInformation::query();
        $export = $this->query;
        if(!empty($export['area_name'])){
            $builder->where('area_name','=',$export['area_name']);
        }
        if(!empty($export['district_name'])){
            $builder->where('district_name','=',$export['district_name']);
        }
        if(!empty($export['upzilla_name'])){
            $builder->where('upzilla_name','=',$export['upzilla_name']);
        }
        if(!empty($export['union_name'])){
            $builder->where('union_name','=',$export['union_name']);
        }
        if(!empty($export['village_name'])){
            $builder->where('village_name','=',$export['village_name']);
        }
        $result = $builder->orderBy('id')->get(
            ['id','area_name', 'district_name','upzilla_name','union_name','address','village_name','total_familly_number',
            'ni_goshtir_sreni','bosot_vitar_tottho','abadi_jomir_poriman','pesha','batsohorik_ay','shompoder_biboron',
            'tin_bela_khabarer_dhoron','goverment_facilities','rin_shonkranto_tottho','sheba_grohitar_nam','montobbo']
        );
        return $result;
    }
    /**
    * @return \Illuminate\Support\headings
    */
    public function headings(): array
    {
        return [
            [
                'ক্র. নং ',
                'এলাকা নাম',
                'জেলা নাম',
                'উপজেলা নাম',
                'ইউনিয়ন নাম',
                'গ্রামের নাম',
                'পরিবারের প্রধান নাম',
                'পরিবারের মোট সদস্য',
                'নৃ গোষ্ঠীর শ্রেণী',
                'বসত ভিটা তথ্য',
                'আবাদি জমির পরিমাণ',
                'পেশা',
                'বাৎসরিক আয়',
                'সম্পদের বিবরণ',
                'তিন বেলা খাবারের ধরন',
                'গভমেন্ট ফ্যাসিলিটিজ',
                'ঋন সংক্রান্ত তত্থ',
                'সেবা গ্রহীতার নাম',
                'মন্তব্য'
            ],
            [
                '',
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12',
                '13',
                '14',
                '15',
                '16',
                '17',
                '18'
            ]
        ];
    }

}
