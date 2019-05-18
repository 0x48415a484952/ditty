<?php

namespace App\Http\Controllers\Api\v1;

use App\Classes\Response;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use App\Http\Requests\OrganizationRequest;
use App\Repositories\OrganizationsRepository;

class OrganizationsController extends Controller
{

    private $organizations;

    public function __construct(OrganizationsRepository $organizations)
    {
        $this->organizations = $organizations;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::success('', $this->organizations->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationRequest $request)
    {
        $this->authorize('create', Organization::class);

        try {
            DB::beginTransaction();
            $user = $this->createUser($request);
            $request->request->add(['user_id' => $user->id]);

            $organization = $this->organizations->create(
                $request->only($this->organizations->model->getFillable())
            );

            DB::commit();

            return Response::success('با موفقیت ثبت شد', $organization);
        } catch(\Excpetion $e) {
            DB::rollBack();
            return Response::error($e->getMessage());
        }
    }

    private function createUser(Request $request)
    {
        $users = app('users');

        $user = $users->create([
            'name' => $request->title,
            'email' => $request->email,
            'password' => randomHexCharacters(10)
        ]);

        $user->assignPredefinedRoles('organizations');

        return $user;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationRequest $request, Organization $organization)
    {
        $organization = $this->organizations->update(
            $organization,
            $request->only($this->organizations->model->getFillable())
        );

        return Response::success('با موفقیت ویرایش شد', $organization);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();

        return Response::success('با موفقیت حذف شد');
    }
}
