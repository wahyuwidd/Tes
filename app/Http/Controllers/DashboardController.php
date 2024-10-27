<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village; 

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $query = Member::query();
        
        switch ($user->role) {
            case 'admin_provinsi':
                $query->where('province_id', $user->province_id);
                break;
            case 'admin_kabupaten':
                $query->where('regency_id', $user->regency_id);
                break;
            case 'admin_kecamatan':
                $query->where('district_id', $user->district_id);
                break;
            case 'admin_kelurahan':
                $query->where('village_id', $user->village_id);
                break;
        }

        $registrationChart = $query->where('created_at', '>=', now()->subMinutes(30))
        ->select(DB::raw('COUNT(*) as count'), 
                 DB::raw('FLOOR(UNIX_TIMESTAMP(created_at) / (5 * 60)) as timekey'))
        ->groupBy(DB::raw('FLOOR(UNIX_TIMESTAMP(created_at) / (5 * 60))')) // Gunakan ekspresi yang sama di GROUP BY
        ->orderBy('timekey', 'desc')
        ->get()
        ->map(function ($item) {
            return [
                'time' => Carbon::createFromTimestamp($item->timekey * 5 * 60)
                    ->format('H:i'),
                'count' => $item->count
            ];
        });

        $todayCount = $query->whereDate('created_at', Carbon::today())->count();

        $totalCount = $query->count();

        return view('dashboard.index', compact('registrationChart', 'todayCount', 'totalCount'));
    }

    public function recap()
    {
        $user = auth()->user();
        $query = Member::query();
        
        switch ($user->role) {
            case 'admin_provinsi':
                $query->where('province_id', $user->province_id);
                break;
            case 'admin_kabupaten':
                $query->where('regency_id', $user->regency_id);
                break;
            case 'admin_kecamatan':
                $query->where('district_id', $user->district_id);
                break;
            case 'admin_kelurahan':
                $query->where('village_id', $user->village_id);
                break;
        }

        if ($user->role === 'admin_kelurahan') {
            $members = $query->with(['province', 'regency', 'district', 'village'])
                ->latest()
                ->paginate(5);
            
            return view('dashboard.recap-kelurahan', compact('members'));
        }

        $data = [];
        
        if (in_array($user->role, ['admin_pusat', 'admin_provinsi'])) {
            $data['provinces'] = Province::withCount('members')
                ->when($user->province_id, function ($query) use ($user) {
                    return $query->where('id', $user->province_id);
                })
                ->get();
        }

        if (in_array($user->role, ['admin_pusat', 'admin_provinsi', 'admin_kabupaten'])) {
            $data['regencies'] = Regency::withCount('members')
                ->when($user->province_id, function ($query) use ($user) {
                    return $query->where('province_id', $user->province_id);
                })
                ->when($user->regency_id, function ($query) use ($user) {
                    return $query->where('id', $user->regency_id);
                })
                ->get();
        }

        if (in_array($user->role, ['admin_pusat', 'admin_provinsi', 'admin_kabupaten', 'admin_kecamatan'])) {
            $data['districts'] = District::withCount('members')
                ->when($user->regency_id, function ($query) use ($user) {
                    return $query->where('regency_id', $user->regency_id);
                })
                ->when($user->district_id, function ($query) use ($user) {
                    return $query->where('id', $user->district_id);
                })
                ->get();
        }

        return view('dashboard.recap', compact('data'));
    }

   
}