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

    public function activeTag(Request $request)
    {

        // $validate = $request->validate(['id' => 'required']);
        // if(!$validate) {

        // }
        $tag = Tag::find($request->id);

        if (!$tag) {
            session()->flash('error','Something went wrong! Please try again.');
            return response()->json([
                'success' => 'Item not found',
            ], 401);
        }

        $tag->status = Tag::STATUS_DEFAULT;
        $tag->save();

        session()->flash('success','Active Tag Success');

        return response()->json([
            'success' => 'Active Tag Success',
        ], 200);
    }

    public function inactiveTag(Request $request)
    {
        // $validate = $request->validate(['id' => 'required']);
        // if (!$validate) {

        // }
        $tag = Tag::find($request->id);
        if (!$tag) {
            session()->flash('error','Something went wrong! Please try again.');
            return response()->json([
                'success' => 'Item not found',
            ], 401);
        }
        $tag->status = Tag::STATUS_INVALID;
        $tag->save();

        session()->flash('success','Inactive Tag Success');

        return response()->json([
            'success' => 'Inactive Tag Success',
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
        if (!$tag) {
            return response()->json([
                'error' => 'Item not found',
            ], 401);
        }

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
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $tag = Tag::find($request->id);
        if (!$tag) {
            session()->flash('error','Not found tag');

            return response()->json([
                'error' => 'Item not found',
            ], 401);
        }
        $tag->delete();

        session()->flash('success','Delete Tag Success');

        return response()->json([
            'success' => 'Delete Tag Success',
        ], 200);
    }

    /**
     * Force Delete the specified resource from storage.
     */
    public function forceDelete(Request $request)
    {
        $tag = Tag::onlyTrashed()->find($request->id);

        if (!$tag) {
            session()->flash('error','Not found tag');

            return response()->json([
                'error' => 'Item not found',
            ], 401);
        }

        $tag->forceDelete();

        session()->flash('success','Delete Tag Success');

        return response()->json([
            'success' => 'Delete Tag Success',
        ], 200);
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Request $request)
    {
        $tag = Tag::onlyTrashed()->find($request->id);

        if (!$tag) {
            session()->flash('error','Not found tag');

            return response()->json([
                'error' => 'Item not found',
            ], 401);
        }

        $tag->restore();

        session()->flash('error','Restore Tag Success');

        return response()->json([
            'success' => 'Restore Tag Success',
        ], 200);
    }
}
