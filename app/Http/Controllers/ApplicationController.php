<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        if (Auth::user()->role == 'admin') {
            $applications = Application::all();
            return view('admin.index', compact('applications', 'categories'));
        } else {
            $applications = Application::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();
            return view('users.index', compact('applications', 'categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('users.applications', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        $image = $request->file('photo_before');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);

        $application = Application::create([
            'title' => $request->title,
            'description' => $request->description,
            'price'=>$request->price,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'photo_before' => $imageName,
        ]);

        $application->save();

        return redirect()->route('applications.index');
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
        $application = Application::findOrFail($id);
        return view('admin.status', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, string $id)
    {
        $application = Application::findOrFail($id);
        $application->status = $request->status;

        if ($request->status == 'Модерация') {
            // Загрузка изображения
            $image = $request->file('photo_after');
            // Имя изображения
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Сохранение изображения в папке хранения
            $image->storeAs('public/images', $imageName);
            // добавление имени фото в БД
            $application->photo_after = $imageName;
        }

        if ($request->status == 'Отклонено') {
            // добавление причины откза в БД
            $application->reason = $request->reason;
        }

        $application->save();
        return redirect()->route('applications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);

        Storage::disk('public')
            ->delete('images/' . $application->photo_before);

        $application->delete();
        return redirect()->route('applications.index');
    }
}
