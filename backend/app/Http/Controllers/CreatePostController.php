<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use Illuminate\Http\Request; 
use PhpParser\Node\Expr\Print_; 
use App\Models\CreatePostModel; 


class CreatePostController extends AppController {
    public function create() {
     
        $requestData = request()->all(); 
        // print_R( $requestData);
        $validator   = \Validator::make($requestData,
            [
            'txtTitle'     => 'required',
            'txtDesc'     => 'required',  
            ]);

            if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->errors()
            ]);
            } else {
                $CreatePostModel = new CreatePostModel(); 
                $CreatePostModel->vch_title = $requestData['txtTitle'];
                $CreatePostModel->vch_desc  = $requestData['txtDesc'];
                $CreatePostModel->int_publishStatus  = 1;
                $CreatePostModel->created_at  = now();
                $CreatePostModel->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'Post added successfully'
                ])
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
            }
    }

    public function view(Request $request){
        // echo 111;exit;
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 3);

        $arrResQuery= DB::table('t_create_posts')
            ->select('post_id', 'vch_title', 'vch_desc', 'int_publishStatus', 'created_at', 'updated_at', 'deleted_flag')
            ->where('deleted_flag', 0)
            ->orderByDesc('post_id')
            // ->get();
            ->paginate($limit); 
            return response()->json([
                'status' => 200,
                'message' => 'Posts retrieved successfully',
                'db_bind_data' => $arrResQuery->items(), 
                'current_page' => $arrResQuery->currentPage(), 
                'last_page' => $arrResQuery->lastPage(), 
                'total' => $arrResQuery->total(), 
            ])
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization')
            ->header('Content-Type', 'application/json; charset=UTF-8');
    }

    public function edit_by_id($id) {
        if ($id > 0) { 
            $postQuery = CreatePostModel::select('vch_title', 'vch_desc')
            ->where('post_id', $id)
            ->where('deleted_flag', 0)
            ->first(); 
            
            if (!$postQuery) {
                return response()->json(['message' => 'Post not found'], 404);
            }
        } else {
            return response()->json(['message' => 'Invalid post ID'], 400);
        }

        return response()->json([
            'status' => 200,
            'clicked_response' => $id,
            'getPostData' => $postQuery
        ])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization')
        ->header('Content-Type', 'application/json; charset=UTF-8');
    }

    public function update($id) {
        $requestData = request()->all(); 
        // print_R( $requestData);
        $validator   = \Validator::make($requestData,
            [
                'txtTitle'     => 'required',
                'txtDesc'     => 'required',  
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => 422,
                    'error' => $validator->errors()
                ]);
            } else {
                $CreatePostModel = CreatePostModel::find($id);
                $CreatePostModel->vch_title = $requestData['txtTitle'];
                $CreatePostModel->vch_desc  = $requestData['txtDesc'];
                $CreatePostModel->int_publishStatus  = 1;
                $CreatePostModel->updated_at  = now();
                $CreatePostModel->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'Post updated successfully'
                ])
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
            }    
    }

    public function softdelete($id) {
        if (empty($id)) {
            return response()->json([
                'status' => 422,
                'error' => 'Delete request Error: ID is missing'
            ]);
        }

        // Find the post by ID
        $CreatePostModel = CreatePostModel::find($id);

        if (!$CreatePostModel) {
            return response()->json([
                'status' => 404,
                'error' => 'Post not found'
            ]);
        }

        // Set the deleted_flag to 1 to indicate soft delete and save the model
        $CreatePostModel->deleted_flag = 1;
        $CreatePostModel->save();

        return response()->json([
            'status' => 200,
            'message' => 'Post deleted successfully'
        ])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
    }


}