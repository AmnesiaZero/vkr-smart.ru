<?php

namespace App\Exports;
use App\Models\InviteCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Maatwebsite\Excel\Concerns\FromCollection;

class WorksExport implements FromCollection
{
    use HasFactory;

    public function __construct(int $organizationId, int $type)
    {
        parent::__construct();
        $this->organization_id = $organizationId;
        $this->type = $type;
    }

    public function collection()
    {
        $query = InviteCode::query();

        $query->select(['id', 'code']);

        if ($this->organization_id) {
            $query->where('organization_id', '=', $this->organization_id);
        }

        if ($this->type) {
            $query->where('type', '=', $this->type);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Код приглашения',
            'Дата окончания',
            'Тип приглашения'
        ];
    }

    public function map($code): array
    {
        $codeExport = $code->id . '-' . $code->code;
        if ($code->type == 1) {
            $type = 'Для студентов';
        } else {
            $type = 'Для преподавателей';
        }
        return [
            $codeExport,
            $code->expires_at,
            $type
        ];
    }
}
