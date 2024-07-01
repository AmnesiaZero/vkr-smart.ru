<?php

namespace App\Exports;

use App\Models\InviteCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class InviteCodesExport implements FromView
{
    use HasFactory;


    public function __construct(int $organizationId, int $type)
    {
        $this->organization_id = $organizationId;
        $this->type = $type;
    }


    public function view(): \Illuminate\Contracts\View\View
    {
        $query = InviteCode::query();

        if ($this->organization_id) {
            $query->where('organization_id', '=', $this->organization_id);
        }

        if ($this->type) {
            $query->where('type', '=', $this->type);
        }

        $inviteCodes = $query->get();
        Log::debug('invite codes = '.$inviteCodes);
        return view('exports.codes', [
            'invite_codes' => $inviteCodes
        ]);
    }

}
