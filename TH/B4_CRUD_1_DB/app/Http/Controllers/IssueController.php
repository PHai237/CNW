<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index() {
        $issues = Issue::with('computer')->paginate(10);
        return view('issues.index', compact('issues'));
    }

    public function create() {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    public function store(Request $request) {
        $request->validate([
            'computer_name' => 'required|max:50',
            'model' => 'required|max:100',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công!');
    }

    public function edit($id) {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'computer_name' => 'required',
            'model' => 'required',
            'reported_by' => 'required',
            'reported_date' => 'nullable|date',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        $issue = Issue::find($id);
        $issue->update($request->all());
        
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật thành công!');
    }

    public function destroy($id) {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa thành công!');
    }
}
