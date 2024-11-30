<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\TagService;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['valid'] = Tag::getListTagValid()->get();
        $data['invalid'] = Tag::getListTagInValid()->get();
        $data['trash'] = Tag::onlyTrashed()->get();
        return view("admin.pages.tags.tag_list")->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.components.tags.tag_add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        try {
            // $tag = Tag::create($request->except('_token'));
            $tag = new Tag();
            $tag->name = $request->name;
            $tag->description = $request->description;
            $tag->status = (int) $request->status;
            $tag->save();
            if (!$tag)
                return redirect()->back()->with('error', 'Something went wrong! Please try again');
            return redirect()->back()->with('success', 'Add Tag Success');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Ajax function active Tag
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function activeTag(Request $request)
    {

        // $validate = $request->validate(['id' => 'required']);
        // if(!$validate) {

        // }
        $tag = Tag::find($request->id);

        if (!$tag) {
            session()->flash('error', 'Something went wrong! Please try again.');
            return response()->json([
                'success' => false,
                'message' => 'Item not found',
            ], 401);
        }

        $tag->status = Tag::STATUS_DEFAULT;
        $tag->save();

        $view = view('admin.components.tags.tag_active_item')->with(['id' => $request->id, 'name' => $tag->name])->render();

        return response()->json([
            'success' => true,
            'message' => 'Active Tag Success',
            'view' => $view
        ], 200);
    }

    /**
     * Ajax function inactive Tag
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function inactiveTag(Request $request)
    {
        // $validate = $request->validate(['id' => 'required']);
        // if (!$validate) {

        // }
        $tag = Tag::find($request->id);
        if (!$tag)
            return response()->json([
                'success' => false,
                'message' => 'Item not found'
            ], 401);

        $tag->status = Tag::STATUS_INVALID;
        $tag->save();

        $view = view('admin.components.tags.tag_inactive_item')->with(['id' => $request->id, 'name' => $tag->name])->render();

        return response()->json([
            'success' => true,
            'message' => 'Inactive Tag Success',
            'view' => $view
        ], 200);
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
        $tag = Tag::find($id)->withoutLocalized();
        if (!$tag)
            return response()->json([
                'success' => false,
                'message' => 'Item not found',
            ], 401);

        $view = view('admin.components.tags.tag_edit_item', compact('tag'))->render();
        // dump($view);

        return response()->json([
            'view' => $view,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        $tag = Tag::find($id)->withoutLocalized();
        if (!$tag)
            return redirect()->back()->with('error', 'Item not found');

        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->status = (int) $request->status;
        $tag->save();

        return redirect()->back()->with('success', 'Update Tag Success');
    }

    /**
     * Ajax function destroy tag 2621 - 5240 101294
     */
    public function destroy(Request $request)
    {
        $tag = Tag::find($request->id);
        if (!$tag)
            return response()->json([
                'success' => false,
                'message' => 'Item not found',
            ], 401);

        $tag->delete();

        $view = view('admin.components.tags.tag_deleted_item')->with(['id' => $request->id, 'name' => $tag->name])->render();

        return response()->json([
            'success' => true,
            'message' => 'Delete Tag Success',
            'view' => $view
        ], 200);
    }

    /**
     * Ajax function Force Delete tag
     */
    public function forceDelete(Request $request)
    {
        $tag = Tag::onlyTrashed()->find($request->id);

        if (!$tag)
            return response()->json([
                'success' => false,
                'message' => 'Item not found',
            ], 404);

        $tag->forceDelete();

        return response()->json([
            'success' => true,
            'message' => 'Force Delete Tag Success',
        ], 200);
    }

    /**
     * Ajax function restore
     */
    public function restore(Request $request)
    {
        $tag = Tag::onlyTrashed()->find($request->id);

        if (!$tag)
            return response()->json([
                'success' => false,
                'message' => 'Item not found',
            ], 404);

        $tag->restore();

        if ($tag->status)
            $view = view('admin.components.tags.tag_active_item')->with(['id' => $tag->_id, 'name' => $tag->name])->render();
        else
            $view = view('admin.components.tags.tag_inactive_item')->with(['id' => $tag->_id, 'name' => $tag->name])->render();

        return response()->json([
            'success' => true,
            'message' => 'Restore Tag Success',
            'status' => $tag->status,
            'view' => $view
        ], 200);
    }
}
