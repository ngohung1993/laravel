<?php
/**
 * Created by PhpStorm.
 * User: vietlv
 * Date: 11/30/2018
 * Time: 9:40 AM
 */

namespace App\Http\Controllers\Api;

use App\Category;
use App\CustomField;
use App\District;
use App\Helpers\FunctionHelpers;
use App\Page;
use App\Post;
use App\Product;
use App\Utilitie;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxController extends BaseController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function enableColumn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'table' => 'required',
            'column' => 'required',
        ]);

        if (!$validator->fails()) {
            $id = $request->get('id');
            $column = $request->get('column');

            $model = null;
            switch ($request->get('table')) {

                case 'categories':
                    $model = Category::all()->find($id);
                    break;
                case 'posts':
                    $model = Post::all()->find($id);
                    break;
                case 'pages':
                    $model = Page::all()->find($id);
                    break;
                case 'products':
                    $model = Product::all()->find($id);
                    break;
                default:
                    break;
            }

            if ($model) {
                $result = $model->update([
                    $column => $model[$column] ? 0 : 1
                ]);

                return $this->sendResponse($result, 'Product created successfully.');
            }
        }

        return $this->sendResponse(false, 'Product created successfully.');
    }

    /**
     * @param Request $request
     * @return bool|string
     */
    public function showDistrict(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'province_id' => 'required'
        ]);

        if (!$validator->fails()) {
            $districts = District::all()->where('province_id', '=', $request['province_id'])->toArray();

            $data = '<option>Chọn Quận/Huyện</option>';

            foreach ($districts as $district) {
                $data .= '<option value="' . $district['id'] . '">' . $district['ten'] . '</option>';
            }

            return $this->sendResponse($data, 'Product created successfully.');
        }

        return $this->sendResponse(false, 'errors');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function serial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'table' => 'required',
            'serialize' => 'required'
        ]);

        if (!$validator->fails()) {
            $serialize = json_decode($request->get('serialize'));

            foreach ($serialize as $key => $item) {
                $this->save_serial($request->get('table'), $item, $key + 1, null);
            }

            return $this->sendResponse(true, $serialize, 'Product created successfully.');
        }

        return $this->sendResponse(false, 'Product created not successfully.');
    }

    /**
     * @param $table
     * @param $item
     * @param $serial
     * @param $parent
     */
    private function save_serial($table, $item, $serial, $parent)
    {
        $array = get_object_vars($item);

        $model = null;

        switch ($table) {
            case 'categories':
                $model = Category::all()->find($array['id']);
                break;
            case 'products':
                $model = Product::all()->find($array['id']);
                break;
            case 'utilities':
                $model = Utilitie::all()->find($array['id']);
                break;
            default:
                break;
        }

        if ($model) {
            $model->update([
                'serial' => $serial,
                'parent_id' => $parent
            ]);
        }

        if (isset($array['children'])) {
            foreach ($array['children'] as $key_c => $item_c) {
                $this->save_serial($table, $item_c, $key_c + 1, $array['id']);
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveCustomFields(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent' => 'required',
            'serialize' => 'required'
        ]);

        if (!$validator->fails()) {

            $serialize = json_decode($request->get('serialize'));

            foreach ($serialize as $key => $item) {
                $this->save_custom_fields($item, $key + 1, $request->get('parent'));
            }

            return $this->sendResponse(true, 'Product created successfully.');
        }

        return $this->sendResponse(true, 'Product created successfully.');
    }

    /**
     * @param $item
     * @param $serial
     * @param $parent
     */
    private function save_custom_fields($item, $serial, $parent)
    {
        $array = (array)$item;

        $data = $array['id'] == 0 ? new CustomField() : CustomField::all()->find($array['id']);

        $data->title = $array['title'];
        $data->parent_id = $parent;

        if (isset($array['description'])) {
            $data->description = $array['description'];
        }

        if (isset($array['value'])) {
            $data->value = $array['value'];
        }

        if (isset($array['placeholder'])) {
            $data->placeholder = $array['placeholder'];
        }

        if (isset($array['type'])) {
            $data->type = $array['type'];
        }

        if (!$data->avatar) {
            $data->avatar = 'dashboard/img/placeholder.png';
        }

        if (isset($array['key'])) {
            $data->key = $array['key'] ? $array['key'] : FunctionHelpers::slug($array['title']);
        }

        $data->serial = $serial;
        $data->released = true;
        $data->theme_id = 1;

        $data->save();

        $data->key .= '-' . $data->id;

        $data->save();

        if (isset($array['children'])) {
            foreach ($array['children'] as $key_c => $item_c) {
                $this->save_custom_fields($item_c, $key_c + 1, $data->id);
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCustomField(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if (!$validator->failed()) {
            $custom_field = CustomField::all()->find($request->get('id'));

            return $this->sendResponse($custom_field, 'Product created successfully.');
        }

        return $this->sendResponse(false, 'Product created successfully.');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateContentCustomField(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if (!$validator->failed()) {
            $custom_field = CustomField::all()->find($request->get('id'));

            return $this->sendResponse($custom_field->update(['content' => $request->get('content')]), 'Product created successfully.');
        }

        return $this->sendResponse(false, 'Product created successfully.');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitSettingTheme(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CustomFields' => 'required'
        ]);

        if (!$validator->failed()) {
            foreach ($request->get('CustomFields') as $key => $value) {
                $exp = explode('--', $key);

                $key = $exp[0];
                $column = $exp[1];

                $custom_filed = CustomField::all()->where('key', '=', $key)->first();

                $custom_filed->$column = $value;
                $custom_filed->save();
            }
        }

        return $this->sendResponse(true, 'Product created successfully.');
    }

    public function editColumn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'pk' => 'required',
            'value' => 'required',
        ]);

        if (!$validator->fails()) {
            $table_column = explode('#', $request->get('name'));

            if (count($table_column) === 2) {
                $table = $table_column[0];
                $column = $table_column[1];

                $model = null;

                switch ($table) {
                    case 'category':
                        $model = Category::findOne($request->get('pk'));
                        break;
                    case 'image':
                        $model = Image::findOne($request->get('pk'));
                        break;

                    case 'tab':
                        $model = Product::findOne($request->get('pk'));
                        break;
                    default:
                        break;
                }

                if ($model) {
                    $model[$column] = $request->get('value');

                    return $model->save();
                }

            }
        }

        return false;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'images' => 'required',
            'id' => 'required',
            'column_parent_id' => 'required',
        ]);
        if (!$validator->fails()) {
            $images = json_decode($request->get('images'));
            var_dump($images);
            foreach ($images as $key => $value) {
                $image = new Image();

                $image->title = $value;
                $image->avatar = '/advertises/' . $value;
                $image->status = 1;
                $image[$request->get('column_parent_id')] = $request->get('id');
                $image->save();
            }

            return true;
        }

        return false;

    }

    public function deleteImage(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['id' => 'required']
        );

        if (!$validator->fails()) {
            $image = Image::all()->find($request->get('id'));

            return $image->delete();
        }

        return false;

    }
}
