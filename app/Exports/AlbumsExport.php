<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\Photo;
use App\Models\User;

class AlbumsExport implements FromCollection, WithHeadings, WithStyles
{
    protected $albumIds;

    public function __construct($albumIds)
    {
        $this->albumIds = $albumIds;
    }

    public function collection()
    {
        $photos = Photo::whereIn('album_id', $this->albumIds)->with('album.user')->get();
        $data = [];
        foreach ($photos as $photo) {
            $data[] = [
                'User ID' => $photo->album->user->id, 
                'Username' => $photo->album->user->name, 
                'Album Name' => $photo->album->namaalbum, 
                'Description' => $photo->album->deskripsi, 
                'Photo Location' => $photo->lokasifile,
            ];
        }

        return collect($data);

    }

    public function headings(): array
    {
        return [
            'User ID',
            'Username',
            'Album Name',
            'Description',
            'Photos',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
            'A1:E1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'B0E0E6']]]
        ];
    }
}
