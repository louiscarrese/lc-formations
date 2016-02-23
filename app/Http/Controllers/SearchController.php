<?php
namespace ModuleFormation\Http\Controllers;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\Services\SearchServiceInterface;

class SearchController extends Controller
{
    public function index(SearchServiceInterface $searchService, Request $request)
    {
        $search_parameter = $request->input('q');

        $data = $searchService->search($search_parameter);

        return response()->json($data);
    }
}
