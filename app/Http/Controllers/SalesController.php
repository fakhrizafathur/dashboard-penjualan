<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Sales::query();

        // Perbaikan: Konversi ke format yang benar jika input dari form
        if ($startDate) {
            $query->whereDate('sale_date', '>=', Carbon::createFromFormat('Y-m-d', $startDate));
        }
        
        if ($endDate) {
            $query->whereDate('sale_date', '<=', Carbon::createFromFormat('Y-m-d', $endDate));
        }

        $sales = $query->orderBy('sale_date', 'asc')->get();

        // Hitung total penjualan
        $totalSales = $sales->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        // Total item terjual
        $totalQuantity = $sales->sum('quantity');

        // Data untuk grafik (tren penjualan per tanggal)
        $chartData = $sales->groupBy(function ($item) {
            return $item->sale_date->format('Y-m-d');
        })
            ->map(function ($group) {
                return $group->sum(function ($item) {
                    return $item->quantity * $item->price;
                });
            })
            ->sortKeys();

        return view('dashboard.index', [
            'sales' => $sales,
            'totalSales' => $totalSales,
            'totalQuantity' => $totalQuantity,
            'chartData' => $chartData,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalesRequest $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
