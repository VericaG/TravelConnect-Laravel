<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'country' => ['nullable', 'string', 'max:255'],
            'min_data' => ['nullable', 'integer', 'min:1'],
            'max_price' => ['nullable', 'numeric', 'min:0'],
        ]);

        $query = Plan::query()
            ->where('is_active', true);

        if (!empty($filters['country'])) {
            $query->where(
                'country',
                'ILIKE',
                '%' . $filters['country'] . '%'
            );
        }

        if (!empty($filters['min_data'])) {
            $query->where(
                'data_amount',
                '>=',
                $filters['min_data']
            );
        }

        if (!empty($filters['max_price'])) {
            $query->where(
                'price',
                '<=',
                $filters['max_price']
            );
        }

        $plans = $query
            ->orderBy('price')
            ->paginate(8)
            ->withQueryString();

        return view('pages.plans.index', compact('plans'));
    }

    public function show(Plan $plan): View
    {
        abort_unless($plan->is_active, 404);

        return view('pages.plans.show', compact('plan'));
    }
}
