<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10); // Lấy dữ liệu với phân trang
        return view('issues.index', compact('issues'));
    }


    public function create()
    {
        $computers = \App\Models\Computer::all(); // Lấy danh sách máy tính
        return view('issues.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        \App\Models\Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Thêm vấn đề mới thành công.');
    }


    public function edit($id)
{
    $issue = \App\Models\Issue::findOrFail($id);
    $computers = \App\Models\Computer::all();

    if (!$computers->count()) {
        return redirect()->route('issues.index')->with('error', 'Không có máy tính nào.');
    }

    return view('issues.edit', compact('issue', 'computers'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue = \App\Models\Issue::findOrFail($id);
        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Cập nhật thành công.');
    }


    public function destroy($id)
    {
        $issue = \App\Models\Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Xóa thành công.');
    }
}
