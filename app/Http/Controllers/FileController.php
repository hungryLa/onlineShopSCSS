<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\General;
use Illuminate\Support\Facades\File as FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FileController extends Controller
{
    public function storeFiles(Request $request, $modelType, $modelId, $fileType, $key = "files")
    {

        if($request->hasFile($key)){
            $result = self::store($request, $modelType, $modelId, $fileType, $key);
        }

        return response()->json([
            'message' => $result->original['message'],
        ],$result->original['status']);


    }

    static function store(Request $request, $modelType, $modelId, $fileType, $key = "files")
    {
        if(!$request->file($key)){
            return response()->json([
                'status' => 422,
                'message' => __('other.No file selected')
            ],422);
        }

        $manager = new ImageManager(new Driver());

        $upload_folder = $modelType .'/'. $modelId .'/'. $fileType;

        $path = public_path('/storage/' .$upload_folder);

        if (!file_exists(public_path('/storage/' .$upload_folder))) {
            FileManager::makeDirectory($path, $mode = 0755, true, true);
        }

        foreach ($request->file($key) as $file){

            if (self::checkCurrentCountFiles($modelType,$modelId,$fileType)){
                $position = File::getPosition($modelType,$modelId,$fileType);

                $name = $file->getClientOriginalName();
                $format = $file->getClientOriginalExtension();

                if ($format == 'jpg' || $format == 'jpeg' || $format == 'png') {
                    // Убирается подстрока с форматом файла из названия
                    $name = pathinfo($name, PATHINFO_FILENAME);

                    // Добавляется ".webp" в конец строки
                    $name = Str::finish($name, '.webp');

                    $img = $manager->read($file);

                    $img->toWebp(70)->save($path.'/'.$name);
                    $upload_file = 'storage/'. $upload_folder . '/' . $name;

                }else{
                    $upload_file = 'storage/'.$file->store($upload_folder, 'public');
                }

                File::create([
                    'model_type' => $modelType,
                    'model_id' => $modelId,
                    'type' => $fileType,
                    'position' => $position,
                    'name' => $name,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => $upload_file,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => __('other.The files have been uploaded successfully')
                ]);

            }else{
                return response()->json([
                    'status' => 422,
                    'message' => __('flash.The limit on the number of uploaded files has been reached')
                ],422);
            }

        }
    }



    public function downlandFile(File $file)
    {
        $path = str_replace('storage/', '', $file->path);



        $path =  Storage::disk('public')->path($path);

        return response()->download($path, $file->original_name);
    }

    public function delete(File $file)
    {
        Storage::disk('public')->delete($file->path);

        $files = File::where([
            'model_type' => $file->model_type,
            'model_id' => $file->model_id,
            'type' => $file->type,
        ])->where('position', '>', $file->position)->orderBy('position')->get();

        foreach ($files as $item){
            $item->update([
                'position' => $item->position - 1,
            ]);
        }



    }

    static function checkCurrentCountFiles($name_table, $model_id, $model_file)
    {
        $model = General::model($name_table);

        $instance = $model->find($model_id);

        if(in_array($model_file, File::TYPE)){
            $count_files = count($instance->files($model_file)->get());

            if(array_key_exists($model_file, $instance::MAX_FILES)){

                return $count_files < $instance::MAX_FILES[$model_file];
            }else{
                return  $count_files < File::MAX_FILES[$model_file];
            }
        }
    }

}
