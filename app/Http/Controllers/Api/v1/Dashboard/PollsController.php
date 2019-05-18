<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Poll;
use App\Classes\Response;
use Illuminate\Http\Request;
use App\Http\Requests\PollsRequest;
use App\Http\Controllers\Controller;
use App\Repositories\PollsRepository;

class PollsController extends Controller
{

    private $polls;

    public function __construct(PollsRepository $polls)
    {
        $this->polls = $polls;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read', Poll::class);

        $organization = auth()->user()->organization;

        if ($organization) {
            return Response::success('', $this->polls->get($organization->id));
        }
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
    public function store(PollsRequest $request)
    {
        $this->authorize('create', Poll::class);

        $organization = auth()->user()->organization;

        if (!empty($organization)) {
            $request->request->add(['organization_id' => $organization->id]);

            $poll = $this->polls->create($request->only(
                $this->polls->model->getFillable()
            ));

            return Response::success('', $poll);
        }

        return Response::error('Bad request', 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        $this->authorize('update', $poll);

        $poll = $this->polls->update(
            $poll,
            $request->only($this->polls->model->getFillable())
        );

        return Response::success('با موفقیت ویرایش شد', $poll);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $this->authorize('delete', $poll);
        $poll->delete();
        $poll->deleteImage();

        return Response::success('با موفقیت حذف شد');
    }
}
