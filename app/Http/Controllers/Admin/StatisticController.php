<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = request()->validate([
            'summation' => 'numeric',
            'paid_amount' => 'numeric',
            'debt' => 'numeric',
            'transmitted' => 'numeric',
            'remaining_amount' => 'numeric',
        ]);
        $statistics = Statistic::findOrFail(1);

        $statistics->update($validated);
        $notify[] = ['success', 'statistics updated!'];
        return back()->withNotify($notify);

    }
}
