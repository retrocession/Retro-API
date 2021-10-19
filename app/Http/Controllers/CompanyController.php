<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $currentUser = auth()->user();
            $company = Company::create(array_merge(
                $request->all(),
                ['ceo_id' => $currentUser->id]
            ));
            $currentUser->update(['company_id' => $company->id]);
            return response()->json($company, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return JsonResponse
     */
    public function show(Company $company)
    {
        $company->users = $company->users()->get();
        return response()->json($company);
    }

    /**
     * get All company with an unverified APE
     *
     * @return JsonResponse
     */
    public function unverifiedCompanies()
    {
        $company = Company::where('ape_verified_at', null)->with('ceo')->get();
        return response()->json($company, 200);
    }

    /**
     * Accept a company
     *
     * @param Company $company
     * @return JsonResponse
     */
    public function acceptCompany(Company $company)
    {
        $company->update(['ape_verified_at' => now()]);
        return Response()->json('Company accepted !', 200);
    }

    /**
     * Accept a company
     *
     * @param Company $company
     * @return JsonResponse
     */
    public function declineCompany(Company $company)
    {
        $company->delete();
        return Response()->json('Company deleted !', 200);
    }

    /**
     * Get Company Offers
     */
    public function companyOffers(Company $company)
    {
        $offers = $company->offers();

        return Response()->json($offers->with('brand')->get(), 200);
    }

    /**
     * @param Request $request
     * @param Company $company
     * @return JsonResponse
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->all());
        return Response()->json('Company successfully updated !', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return JsonResponse
     */
    public function destroy(Company $company)
    {
        //
    }
}
