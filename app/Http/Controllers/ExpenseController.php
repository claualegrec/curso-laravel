<?php

namespace App\Http\Controllers;

use App\Models\ExpenseReport;
use App\Models\Expense;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ExpenseReport $expenseReport)
    {
        return view('expense.create', [
            'report' => $expenseReport
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ExpenseReport $expenseReport)
    {
        $validaData = $request->validate([
            'description' => 'required|min:3',
            'amount' => 'required|numeric|min:1'
        ]);

        $expense = new Expense();
        $expense->description = $request->get('description');
        $expense->amount = $request->get('amount');
        $expense->expense_report_id = $expenseReport->id;
        $expense->save();

        return redirect('/expense_reports/' . $expenseReport->id);
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
