<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Peserta;
use App\Models\Onboarding;
use Carbon\Carbon;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $adminGeneral = User::where('role', 'admin general')->count();
        $adminIn = User::where('role', 'admin in')->count();
        $adminOut = User::where('role', 'admin out')->count();
        $adminMaintenance = User::where('role', 'admin maintenace')->count();

        $tahun = date('Y');

        // Inisialisasi array bulan dengan 0 untuk onboarding
        $onboardingPerBulan = array_fill(0, 12, 0);

        // Ambil data onboarding per bulan berdasarkan tanggal mulai
        $onboardingPerBulanQuery = Onboarding::selectRaw('MONTH(tanggal_mulai) as bulan, COUNT(*) as total')
            ->whereYear('tanggal_mulai', $tahun)
            ->groupByRaw('MONTH(tanggal_mulai)')
            ->pluck('total', 'bulan');

        // Isi array onboardingPerBulan dengan hasil query
        foreach ($onboardingPerBulanQuery as $bulan => $total) {
            $onboardingPerBulan[$bulan - 1] = $total;
        }

        return view("home.dashboard", compact(
            "adminGeneral",
            'adminIn',
            'adminOut',
            'adminMaintenance',
            'onboardingPerBulan'
        ));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
