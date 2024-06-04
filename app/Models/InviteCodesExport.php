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

        $query->select(['id','code']);

        if ($this->organization_id) {
            $query->where('organization_id', '=', $this->organization_id);
        }

        if ($this->type) {
            $query->where('type', '=', $this->type);
        }

        $codes = $query->get();

        $result = [];
        foreach ($codes as $code)
        {
            $codeExport = $code->id.'-'.$code->code;
            $result[] = $codeExport;
        }

        $query->delete();

        return collect($result);
    }
}
