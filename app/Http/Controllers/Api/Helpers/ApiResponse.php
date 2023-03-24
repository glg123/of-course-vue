<?php

namespace App\Http\Controllers\Api\Helpers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

trait ApiResponse
{
    public $resource_namespace = "\App\Http\Resources\\";

    public function apiResponse($data = null, $message = '', $code = 200, $last_page = false, $count = 0, $status = true)
    {
        if ($message != '' or $message) {
            if (is_object($message)) {
                $message = is_array($message->getMessages()) ? head($message->getMessages())[0] : $message;
            }
        } else {
            $message = '';
        }

        $code = in_array($code, $this->successCodes()) ? 200 : $code;

        $last_page = $last_page == true ? 1 : 0;

        if (!$status) {
            $status = $data ? true : false;
        }

        return response(compact('data', 'message', 'last_page', 'count', 'status'), $code);
    }

    public function apiResponseCollection($data = null, $message = '', $code = 200, $last_page = false, $count = 0, $status = true)
    {
        if ($message != '' or $message) {
            if (is_object($message)) {
                $message = is_array($message->getMessages()) ? head($message->getMessages())[0] : $message;
            }
        } else {
            $message = '';
        }

        if (!$status) {
            $status = $data ? true : false;
        }

        $code = in_array($code, $this->successCodes()) ? 200 : $code;

        $last_page = $last_page == true ? 1 : 0;


        return response(compact('data', 'message', 'last_page', 'count', 'status'), $code);
    }

    public function file_response($file, $name = 'ofCourse', $type = '', $extension = 'pdf')
    {
        return response()->download($file, $name . '' . $type . '.' . $extension, [
            'Content-Type: application/pdf'
        ]);
    }

    public function resource_make($resource, $data)
    {
        $resource = $this->resource_namespace . $resource;
        return new $resource($data);
    }

    public function successResponse($data = null, $message = '')
    {
        return $this->apiResponse($data, $message, 200, 0, 0, true);
    }

    public function failedResponse($data = null, $message = '', $code = 200)
    {
        return $this->apiResponse($data, $message, $code, 0, 0, false);
    }

    public function unauthenticated()
    {
        $message = 'UnAuthenticated';
        return $this->apiResponse(null, $message, 403);
    }

    public function unauthorized()
    {
        $message = 'Un Authorized';
        return $this->apiResponse(null, $message, 401);
    }

    public function successCodes()
    {
        return [200, 201, 202, 302];
    }

    public function failedCodes()
    {
        return [403, 404, 422];
    }

    public function notFound()
    {
        return $this->apiResponse(null, 'Not Found');
    }

    public function collection($resource, $collection, $flag = true, $last_page = 0, $count = null)
    {
        $resource = $this->resource_namespace . $resource;

        $collection = $resource::collection($collection);

        $count = $count ?? $collection->count();

        return $flag ? $this->apiResponse(!$collection->isEmpty() ? $collection : null, null, 200, $last_page, $count) : $collection;
    }

    public function PaginatedCollection($resource, $collection, $flag = true, $last_page = null, $count = 0)
    {
        $resource = $this->resource_namespace . $resource;

        $count = $count ?: ($collection instanceof Collection ? $collection->total() : count($collection));
        $collection = $resource::collection($collection);
        $last = $last_page ? true : false;

        return $flag ? $this->apiResponseCollection(!$collection->isEmpty() ? $collection : null, null, $last, $count) : $collection;
    }

    public function collectionPaginte($resource, $collection, $flag = true, $last_page = null, $count = 0)
    {
        $resource = $this->resource_namespace . $resource;

        $count = $count ?: ($collection instanceof Collection ? $collection->total() : count($collection));
        $collection = $resource::collection($collection);
        $last = $last_page ? true : false;

        return $flag ? $this->apiResponseCollection(!$collection->isEmpty() ? $collection : null, null, $last, $count) : $collection;
    }

    public function PaginatedCollectionWeb($resource, $collection, $flag = true, $last_page = null, $count = 0)
    {
        $resource = $this->resource_namespace . $resource;

        $collection = $resource::collection($collection);
        $last = $last_page ? true : false;
        $_count = $count;
        return $flag ? $this->apiResponseCollection(!$collection->isEmpty() ? $collection : null, null, $last, $_count) : $collection;
    }

    public function single_row($resource, $row, $message = '', $code = 200)
    {
        if ($row) {
            $resource = $this->resource_namespace . $resource;

            $row = new $resource($row);

            return $this->apiResponse($row, $message, $code);
        }

        return $this->notFound();
    }



    public function api_user()
    {

        return auth('api')->user();
    }

    public function api_admin()
    {
        return auth('admin')->user();
    }
}
