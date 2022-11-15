<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class UserProfileQuery
{
    protected $safeParms = [
        'username' => ['eq'],
        'profileId' => ['eq'],
        'active' => ['eq'],
    ];

    protected $columnMap = [
        'profileId' => 'profile_id'
    ];

    protected $operatorMap = [
        'eq' => '='
    ];

    public function transform(Request $request)
    {
        $eloQuery = [];
        foreach ($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);
            if (!isset($query)) {
                continue;
            }
            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
