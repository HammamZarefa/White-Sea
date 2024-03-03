<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;

class ExpenseController extends Controller
{

    public function index()
    {
        $page_title = "expenses";
        $empty_message = "Not Found";
        $expenses = Expense::get();
        return view("admin.expenses_management.index", compact('expenses', 'page_title', 'empty_message'));
    }


    public function store(CreateExpenseRequest $request)
    {
        $validated = $request->validated();
        $expense = Expense::create($validated);
        if (!$expense) {
            $notify[] = ['error', 'Error occured during saving expense!'];
            return back()->withNotify($notify);
        }
        $notify[] = ['success', 'Expense added!'];
        return back()->withNotify($notify);
    }


    public function update(UpdateExpenseRequest $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $validated = $request->validated();
        $expense->update($validated);
        $notify[] = ['success', 'Expense updated!'];
        return back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        $notify[] = ['success', 'Expense deleted!'];
        return back()->withNotify($notify);
    }
}
