<?php

namespace App\Http\Controllers;

use App\Models\ExpenseReport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('expenseReports.index', ['expenseReports' => ExpenseReport::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenseReports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required|min:3'
        ]);

        $report =   new ExpenseReport();
        $report->title = $request->get('title');
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseReport $expenseReport)
    {
        return view('expenseReports.show', [
            'report' => $expenseReport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReports.edit', [
            'report' => $report
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->title = $request->get('title');
        $report->save();
        return redirect('expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->delete();
        return redirect('expense_reports');
    }

    public function confirmDelete($id) {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReports.confirmDelete', [
            'report' => $report
        ]);
    }
}
