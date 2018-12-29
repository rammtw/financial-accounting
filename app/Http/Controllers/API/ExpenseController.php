<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExpenseRequest;
use App\Http\Requests\API\IndexExpenseRequest;
use App\Http\Requests\API\UpdateExpenseRequest;
use App\Models\Expense;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    /**
     * @var Repository
     */
    private $model;

    /**
     * ExpenseController constructor.
     * @param Expense $news
     */
    public function __construct(Expense $news)
    {
        $this->model = new Repository($news);
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexExpenseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexExpenseRequest $request)
    {
        $data = $this->model->getModel()->orderBy('created_at', 'DESC')
            ->where('category_id', $request->category_id)
            ->with('category')
            ->whereBetween('created_at', [$request->from, $request->to])
            ->get()
            ->groupBy('category.name');

        return response()->json(['status' => true, 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateExpenseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExpenseRequest $request)
    {
        $data = $this->model->create($request->only('sum', 'category_id', 'description'));

        return response()->json(['status' => true, 'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateExpenseRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request, $id)
    {
        try {
            $this->model->update($request->only('sum', 'category_id', 'description'), $id);

            return response()->json(['status' => true]);
        } catch (\Exception $exception) {
            return response()->json(['status' => false, 'message' => $exception->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->model->delete($id);

            return response()->json(['status' => true]);
        } catch (\Exception $exception) {
            return response()->json(['status' => false, 'message' => $exception->getMessage()], 422);
        }
    }
}
