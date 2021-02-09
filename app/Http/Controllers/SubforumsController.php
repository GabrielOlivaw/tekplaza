<?php

namespace App\Http\Controllers;

use App\Models\Subforum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubforumsController extends Controller
{
    
    /**
     * GET /subforums
     * 
     * Devuelve la vista de la lista de subforos.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function view() {
        $subforums = Subforum::select('subforums.id', 'subforums.name',
            'subforums.description', DB::raw('COUNT(threads.id) AS thread_number'))
            ->join('threads', 'threads.subforum', 'subforums.id')
            ->groupBy('subforums.id')
            ->get();
            
            return view('subforums', [
                'subforums' => $subforums
            ]);
    }
}
