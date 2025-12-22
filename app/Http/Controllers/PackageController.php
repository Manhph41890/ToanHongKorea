<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Package::query();

        // Nếu có từ khóa tìm kiếm theo tên gói
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $packages = $query->latest()->paginate(10);

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        try {
            Package::create($request->validated());
            return redirect()->route('admin.packages.index')
                ->with('success', 'Thêm gói cước mới thành công!');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        try {
            $package->upate($request->validated());
            return redirect()->route('admin.packages.index')
                ->with('success', 'Cập nhật gói cước thành công!');
        } catch (\Exception $e) {
            return back()->with('error', 'Cập nhật thất bại: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        try {
            // Kiểm tra nếu có SIM đang dùng gói này thì cân nhắc có cho xóa không
            if ($package->sims()->count() > 0) {
                return back()->with('error', 'Không thể xóa vì đang có SIM sử dụng gói cước này.');
            }
            $package->delete();
            return redirect()->route('admin.packages.index')
                ->with('success', 'Đã chuyển gói cước vào thùng rác.');
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi khi xóa: ' . $e->getMessage());
        }
    }

    /**
     * Hiển thị danh sách trong thùng rác
     */
    public function trash()
    {
        $packages = Package::onlyTrashed()->latest()->paginate(10);
        return view('admin.packages.trash', compact('packages'));
    }

    /**
     * Khôi phục gói cước đã xóa
     */
    public function restore($id)
    {
        $package = Package::onlyTrashed()->findOrFail($id);
        $package->restore();
        return redirect()->route('admin.packages.trash')
            ->with('success', 'Khôi phục gói cước thành công!');
    }

    /**
     * Xóa vĩnh viễn
     */
    public function forceDelete($id)
    {
        $package = Package::onlyTrashed()->findOrFail($id);
        $package->forceDelete();
        return redirect()->route('admin.packages.trash')
            ->with('success', 'Đã xóa vĩnh viễn gói cước khỏi hệ thống.');
    }
}
