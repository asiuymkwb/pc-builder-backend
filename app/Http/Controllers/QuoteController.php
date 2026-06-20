<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Quote;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuoteController extends Controller
{
    public function generate(string $buildId)
    {
        $build = Build::with(['components.specs', 'components.category'])
            ->where('user_id', Auth::id())
            ->findOrFail($buildId);

        Quote::create([
            'build_id'     => $build->id,
            'user_id'      => Auth::id(),
            'generated_at' => now(),
        ]);

        $pdf = Pdf::loadView('pdf.preventivo', ['build' => $build])
            ->setPaper('a4', 'portrait');

        $filename = 'preventivo-' . Str::slug($build->name) . '-' . now()->format('Ymd') . '.pdf';

        return $pdf->download($filename);
    }

    public function index()
    {
        $quotes = Auth::user()->quotes()->with('build')->orderByDesc('generated_at')->get();

        return response()->json($quotes);
    }
}