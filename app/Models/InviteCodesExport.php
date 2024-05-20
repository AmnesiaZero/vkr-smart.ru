<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;

class InviteCodesExport extends Model implements FromCollection
{
    use HasFactory;
    public function __construct(int $organizationId,int $type)
    {
       $this->organization_id = $organizationId;
       $this->type = $type;
    }

    public function collection()
    {
        $query = InviteCode::query();

        if ($this->organization_id) {
            $query->where('organization_id', '=', $this->organization_id);
        }

        if ($this->type) {
            $query->where('type', '=', $this->type);
        }

        $result = $query->get();

        $query->delete();

        return $result;
    }
}
