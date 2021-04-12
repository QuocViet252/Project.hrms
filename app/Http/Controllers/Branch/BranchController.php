<?php /** @noinspection PhpUndefinedVariableInspection */

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Branch;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Request as RequestAlias;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $branch = Branch::all();

        return view('admin.Dashboard.Branch.branch', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('admin.Dashboard.Branch.add_branch');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RequestAlias $request
     * @return Application|Factory|Response|View
     */
    public function store(Request $request)
    {
        $branch = new Branch();

//       $this->validate($request, [
//           'name_branch'=> 'required',
//           'image_branch' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//           'director_branch' => 'required',
//           'email_branch' => 'required',
//           'phone_branch' => 'required',
//           'local_branch' => 'required'
//           ],
//           [
//               'nam_branch.required' => 'Chưa nhập tên chi nhánh',
//               'image_branch.required' => 'Không đúng định dạng hình ảnh',
//               'director_branch.required' => 'Chưa nhập tên giám đốc chi nhánh',
//               'email_branch.required' => 'Chưa nhập địa chỉ email',
//               'phone_branch.required' => 'Chưa nhập số điện thoại',
//               'local_branch.required' => 'Chưa nhập địa chỉ chi nhánh'
//
//           ]
//       );


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = $image->getClientOriginalName();
            $name = time().'_'.$file;
            $destinationPath = public_path('project_asset/images/image_branch/');
            $image->move($destinationPath, $name);
        }

        $branch->name_branch = $request->name_branch;
        $branch->image_branch = $request->image_branch;
        $branch->director_branch = $request->director_branch;
        $branch->email_branch = $request->email_branch;
        $branch->phone_branch = $request->phone_branch;
        $branch->local_branch = $request->local_branch;
        $branch->save();
        return redirect('branch');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('admin.Dashboard.Branch.update', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RequestAlias $request
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = $image->getClientOriginalName();
            $name = time().'_'.$file;
            $destinationPath = public_path('project_asset/images/image_branch/');
            $image->move($destinationPath, $name);
        }

        $branch->name_branch = $request->name_branch;
        $branch->image_branch = $request->image_branch;
        $branch->director_branch = $request->director_branch;
        $branch->email_branch = $request->email_branch;
        $branch->phone_branch = $request->phone_branch;
        $branch->local_branch = $request->local_branch;
        $branch->save();
        return redirect('branch')->with('message', 'CẬP NHẬT THÀNH CÔNG!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        $branch = Branch::find($id)->delete();
        return redirect('branch');
    }
}
