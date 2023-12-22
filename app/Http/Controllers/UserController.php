<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends BaseController
{
    public function api()
    {
        try {

            $data = Http::get('https://newsapi.org/v2/everything?q=all&from=2023-12-20&sortBy=popularity&apiKey=59772770dab64f8f971173fe8e30292c');
            // $data = Http::get('https://api.imgflip.com/get_memes');
            // $data = Http::get('https://dog.ceo/api/breeds/image/random');

            $response = $data['articles'];

            return view('welcome', compact('response'));

        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function apiGet()
    {
        try {

            $user = User::all();
            $data = UserResource::collection($user);

            return $this->sendResponse($data, 'Data will be find...');

        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function apiPost(Request $request)
    {
        try {
            $data = User::create($request->all('name', 'email', 'password'));

            return $this->sendResponse(new UserResource($data), 'Data will be created...');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function apiPut(Request $request)
    {
        try {
            $data = User::find($request->id);

            $put = $data->update($request->all('name', 'email', 'password'));

            if ($put == true) {
                return $this->sendResponse($put, 'Data will be updated...');
            } else {
                return $this->sendResponse($put, 'Data not found..');
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function apiDelete(Request $request)
    {
        try {
            $data = User::find($request->id);

            $user = $data->delete();

            if ($user == true) {
                return $this->sendResponse($user, 'Data will be deleted...');
            } else {
                return $this->sendResponse($user, 'Data not found..');
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
