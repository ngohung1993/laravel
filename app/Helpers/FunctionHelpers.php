<?php
/**
 * Created by PhpStorm.
 * User: vietlv
 * Date: 11/26/2018
 * Time: 11:29 PM
 */

namespace App\Helpers;

use App\Classified;
use App\Collection;
use App\Menu;
use App\Post;
use App\Product;
use App\User;
use App\Category;
use App\CustomField;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FunctionHelpers
{
    /**
     * @param $str
     *
     * @return mixed|string
     */
    public static function slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);

        return $str;
    }

    /**
     * @param $file
     */
    public static function download($file)
    {
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

    /**
     * @param $table
     * @param $attributes
     * @param $file
     * @param $start
     * @param $end
     * @throws BadRequestHttpException
     */
    public static function import_data_excel($table, $attributes, $file, $start, $end)
    {
        ini_set('memory_limit', '-1');
        set_time_limit(1200);
        $inputFileName = $file;

        if (!file_exists($inputFileName)) {
            throw new BadRequestHttpException('File doesn\'t exists.');
        }

        $inputFileName = $file;

        try {
            $spreadsheet = IOFactory::load($inputFileName);

            try {
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                $data = [];
                foreach ($sheetData as $key => $value) {
                    if ($key >= $start && $key <= $end) {
                        $row = [];
                        foreach ($attributes as $key_att => $value_att) {
                            $row[$value_att] = $value[$key_att];
                        }
                        $data[] = $row;
                    }
                }

                DB::table($table)->insert($data);
            } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {

            }
        } catch (Exception $e) {

        }
    }

    /**
     * @param $table
     * @param $columns
     * @param $rows
     */
    public static function batchInsert($table, $columns, $rows)
    {
        $inserts = [];

        foreach ($rows as $key => $row) {
            $inserts[] = array_combine($columns, $row);
        }

        DB::table($table)->insert($inserts);
    }

    /**
     * @param $utilities
     */
    public static function show_utilities_menu($utilities)
    {
        usort($utilities, function ($a, $b) {
            return $a->serial > $b->serial;
        });

        foreach ($utilities as $key => $item) {

            $util_child = FunctionHelpers::get_utilities_by_parent_id(null, $item->id);

            usort($util_child, function ($a, $b) {
                return $a->serial > $b->serial;
            });

            if ($util_child) {
                echo '<li class="nav-item has-ul">';
                echo '<a href="" class="nav-link nav-toggle">';
                echo '<i class="' . $item->icon . '"></i >';
                echo '<span class="title" >' . $item->title . '</span>';
                echo '<span class="arrow"></span>';
                echo '</a>';
                echo '<ul class="sub-menu hidden-ul">';
                foreach ($util_child as $key_child => $item_child) {
                    echo '<li class="nav-item">';
                    echo '<a href="' . url($item_child->path) . '" class="nav-link">';
                    echo '<i class="' . $item_child->icon . '"></i >';
                    echo '<span class="title"> ' . $item_child->title . '</span>';
                    echo '</a>';
                    echo ' </li>';
                }
                echo '</ul>';
                echo '</li>';
            } else {
                echo '<li class="nav-item">';
                echo '<a href="' . url($item->path) . '" class="nav-link nav-toggle">';
                echo '<i class="' . $item->icon . '"></i >';
                echo '<span class="title">' . $item->title . '</span>';
                echo '</a>';
                echo ' </li>';
            }
        }
    }

    /**
     * @param null $permission
     * @param null $parent_id
     * @return \Illuminate\Support\Collection|array
     */
    public static function get_utilities_by_parent_id($permission = null, $parent_id = null)
    {
        $query = DB::table('utilities');

        if ($parent_id) {
            $query->where(['parent_id' => $parent_id]);
        } else {
            $query->whereNull('parent_id');
        }

        if ($permission) {
            $query->where(['permission', '>=', $permission]);
        }

        $utilities = $query->where(['released' => 1])->get()->toArray();

        return $utilities;
    }

    /**
     * @param $categories
     * @param int $parent_id
     */
    public static function show_categories_nestable($categories, $parent_id = 0)
    {
        $cate_child = array();
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }

        usort($cate_child, function ($a, $b) {
            return $a['serial'] > $b['serial'];
        });

        if ($cate_child) {
            echo '<ol class="dd-list">';
            foreach ($cate_child as $key => $item) {
                echo '<li class="dd-item" data-id="' . $item['id'] . '"><div class="dd-handle">' . $item['title'] . '</div > ';
                FunctionHelpers::show_categories_nestable($categories, $item['id']);
                echo '</li>';
            }
            echo '</ol>';
        }
    }

    /**
     * @param $products
     * @param int $parent_id
     */
    public static function show_products_nestable($products, $parent_id = 0)
    {
        $cate_child = array();
        foreach ($products as $key => $item) {
            if ($item->parent_id == $parent_id) {
                $cate_child[] = $item;
                unset($products[$key]);
            }
        }

        usort($cate_child, function ($a, $b) {
            return $a->serial > $b->serial;
        });

        if ($cate_child) {
            echo '<ol class="dd-list">';
            foreach ($cate_child as $key => $item) {
                echo '<li class="dd-item" data-id="' . $item->id . '"><div class="dd-handle">' . $item->title . '</div > ';
                FunctionHelpers::show_categories_nestable($products, $item->id);
                echo '</li>';
            }
            echo '</ol>';
        }
    }

    /**
     * @param $categories
     * @param int $parent_id
     * @param string $serial
     */
    public static function show_categories_table($categories, $parent_id = 0, $serial = '')
    {
        $cate_child = array();
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }

        usort($cate_child, function ($a, $b) {
            return $a['serial'] > $b['serial'];
        });

        if ($cate_child) {
            foreach ($cate_child as $key => $item) {

                $dot = $serial == '' ? $item['serial'] : $serial . '.' . $item['serial'];
                echo '<tr>';
                echo '<td>';
                echo '<input title="" data-id="' . $item['id'] . '" type="checkbox" class="minimal">';
                echo '</td>';
                echo '<td>' . $dot . '</td>';
                echo '<td><a href="#" class="editable" data-name="category#title" data-type="text"
                                               data-pk="' . $item['id'] . '" data-title="Nhập tiêu đề" data-url="' . route('ajax.edit-column') . '">' . $item['title'] . '</a></td>';
                echo '<td>' . $item->page['title'] . '</td>';
                echo '<td>';
                echo '<div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-mini" style="border:none">';
                echo '<input data-id="' . $item['id'] . '" data-api="' . route('ajax.enable-column') . '" data-column="status" data-table="categories" type="checkbox" ' . ($item['status'] ? 'checked="checked"' : '') . ' title="" name="switch-checkbox">';
                echo '</div></td>';
                echo '<td class="text-center"><div class="table-actions">';
                echo '<a class="btn btn-icon btn-sm btn-primary tip" href="' . url('admin/categories/' . $item['id'] . '/edit') . '"><i class="fa fa-edit"></i></a>';
                echo '<a class="btn btn-icon btn-sm btn-danger tip btn-destroy" href="#" role="button" data-action="' . url('admin/categories/' . $item['id']) . '"
                            data-toggle="modal" data-target="#modal-confirm-delete"><i class="fa fa-trash-o"></i></a>';
                echo '</div></td>';
                echo '</tr>';
                FunctionHelpers::show_categories_table($categories, $item['id'], $dot);
            }
        }
    }

    /**
     * @param $custom_fields
     * @param int $parent_id
     */
    public static function show_custom_fields_nestable($custom_fields, $parent_id = 0)
    {
        if (!FunctionHelpers::get_custom_fields_by_parent_id($parent_id)) {
            echo '<ol class="dd-list"></ol>';
        } else {
            $cate_child = array();
            foreach ($custom_fields as $key => $item) {
                if ($item['parent_id'] == $parent_id) {
                    $cate_child[] = $item;
                    unset($custom_fields[$key]);
                }
            }

            usort($cate_child, function ($a, $b) {
                return $a['serial'] > $b['serial'];
            });

            $type_setting = ['title' => 'Tiêu đề', 'description' => 'Mô tả', 'icon' => 'Icon'];
            $type_value = ['title' => 'Tiêu đề', 'description' => 'Mô tả', 'placeholder' => 'placeholder', 'value' => 'Giá trị'];
            $type_name = [CustomField::TYPE_SETTING => 'setting', CustomField::TYPE_SECTION => 'section', CustomField::TYPE_TEXT => 'text', CustomField::TYPE_IMAGE => 'image', CustomField::TYPE_SELECT => 'select', CustomField::TYPE_CHECKBOX => 'checkbox', CustomField::TYPE_AREA => 'area'];

            if (count($cate_child)) {
                echo '<ol class="dd-list">';
                foreach ($cate_child as $key => $item) {
                    echo '<li class="dd-item dd3-item" data-title="' . $item['title'] . '" data-description="' . $item['description'] . '" data-icon="' . $item['icon'] . '" data-table="component" data-id="' . $item['id'] . '">';
                    echo '<div class="dd-handle dd3-handle"></div><div class="dd3-content">';
                    echo '<span class="text float-left" data-update="title">' . $item['title'];

                    if (!$item['parent_id']) {
                        echo '<a class="show-item-link" target="_blank" href="' . url('admin/custom-fields/' . $item['id']) . '"><span class="fa fa-external-link"></span></a>';
                    }

                    echo '</span>';
                    echo '<span class="text float-right">';
                    echo $item['key'];

                    echo '(' . $type_name[$item['type']] . ')';
                    echo '</span>';
                    echo '<a href="#" title="" class="show-item-details active"><i class="fa fa-angle-down"></i></a>';
                    echo '<div class="show-item-details show-item-active">';
                    echo '<div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-mini" style="border:none">';
                    echo '<input data-api="ajax/released" data-table="custom-field" data-id="' . $item['id'] . '" type="checkbox" ' . ($item['released'] == 1 ? 'checked' : '') . ' title="" name="switch-checkbox">';
                    echo '</div></div>';
                    echo '<div class="clearfix"></div></div>';
                    echo '<div class="item-details">';

                    if ($item['type'] == CustomField::TYPE_SETTING || $item['type'] == CustomField::TYPE_SECTION) {
                        foreach ($type_setting as $k => $column) {
                            echo '<label class="pad-bot-5">';
                            echo '<span class="text pad-top-5 dis-inline-block" data-update="title">' . $column . '</span>';
                            echo '<input type="text" name="' . $k . '" value="' . $item[$k] . '" data-old="' . $item[$k] . '">';
                            echo '</label>';
                        }
                    } else {
                        foreach ($type_value as $k => $column) {
                            echo '<label class="pad-bot-5">';
                            echo '<span class="text pad-top-5 dis-inline-block" data-update="title">' . $column . '</span>';
                            echo '<input type="text" name="' . $k . '" value="' . $item[$k] . '" data-old="' . $item[$k] . '">';
                            echo '</label>';
                        }

                        echo '<label class="pad-bot-5">';
                        echo '<span class="text pad-top-5 dis-inline-block" data-update="title">Type</span>';
                        echo '<select class="select-type form-control" type="text" name="type">';
                        foreach ($type_name as $k => $column) {
                            if ($item['type'] == $k) {
                                echo '<option selected="" value="' . $k . '">' . $column . '</option>';
                            } else {
                                echo '<option value="' . $k . '">' . $column . '</option>';
                            }
                        }
                        echo '</select>';
                        echo '</label>';
                    }

                    echo '<div class="clearfix"></div>';
                    echo '<div class="text-right" style="margin-top: 5px">';
                    echo '<a href="#" class="btn btn-danger btn-remove btn-sm">Xóa</a>';
                    echo '<a href="#" class="btn btn-primary btn-cancel btn-sm">Hủy</a>';
                    echo '</div>';
                    echo '</div><div class="clearfix"></div>';
                    FunctionHelpers::show_custom_fields_nestable($custom_fields, $item['id']);
                    echo '</li>';
                }
                echo '</ol>';
            }
        }
    }

    /**
     * @param null $parent_id
     * @param null $released
     * @return array
     */
    public static function get_custom_fields_by_parent_id($parent_id = null, $released = null)
    {
        $query = DB::table('custom_fields');

        if ($released) {
            $query->where('released', '=', $released);
        }

        if ($parent_id) {
            $query->where('parent_id', '=', $parent_id);
        } else {
            $query->whereNull('parent_id');
        }

        $components = $query->get()->toArray();

        return $components;
    }

    /**
     * @param $utilities
     * @param int $parent_id
     * @param string $serial
     */
    public static function show_utilities_table($utilities, $parent_id = 0, $serial = '')
    {
        $cate_child = array();
        foreach ($utilities as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                $cate_child[] = $item;
                unset($utilities[$key]);
            }
        }

        usort($cate_child, function ($a, $b) {
            return $a['serial'] > $b['serial'];
        });

        if ($cate_child) {
            foreach ($cate_child as $key => $item) {
                $dot = $serial == '' ? $item['serial'] : $serial . '.' . $item['serial'];
                echo '<tr>';
                echo '<td>';
                echo '<input title="" data-id="' . $item['id'] . '" type="checkbox" class="minimal">';
                echo '</td>';
                echo '<td>' . $dot . '</td>';
                echo '<td>' . $item['icon'] . '</td>';
                echo '<td><a href="#" class="editable" data-name="utilities#title" data-type="text"
                                               data-pk="' . $item['id'] . '" data-title="Nhập tiêu đề" data-url="' . url('ajax/edit-column') . '">' . $item['title'] . '</a></td>';
                echo '<td>' . ($item['permission'] == User::ROLE_SENIOR ? 'Cao cấp' : 'Mọi người') . '</td>';
                echo '<td>';
                echo '<div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-mini" style="border:none">';
                echo '<input data-id="' . $item['id'] . '" data-api="ajax/enable-column" data-column="released" data-table="utilities" type="checkbox" ' . ($item['released'] ? 'checked="checked"' : '') . ' title="" name="switch-checkbox">';
                echo '</div></td>';
                echo '<td class="text-center"><div class="table-actions"><a class="btn btn-icon btn-sm btn-primary tip" href="' . url('admin/utilities/' . $item['id' . '/update']) . '"><i class="fa fa-edit"></i></a>' . '</div></td>';
                echo '</tr> ';
                FunctionHelpers::show_utilities_table($utilities, $item['id'], $dot);
            }
        }
    }

    /**
     * @param $utilities
     * @param int $parent_id
     */
    public static function show_utilities_nestable($utilities, $parent_id = 0)
    {
        $cate_child = array();
        foreach ($utilities as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                $cate_child[] = $item;
                unset($utilities[$key]);
            }
        }

        usort($cate_child, function ($a, $b) {
            return $a['serial'] > $b['serial'];
        });

        if ($cate_child) {
            echo '<ol class="dd-list">';
            foreach ($cate_child as $key => $item) {
                echo '<li class="dd-item" data-id="' . $item['id'] . '"><div class="dd-handle">' . $item['title'] . '</div > ';
                FunctionHelpers::show_utilities_nestable($utilities, $item['id']);
                echo '</li>';
            }
            echo '</ol>';
        }
    }

    /**
     * @return CustomField[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function get_custom_fields()
    {
        return CustomField::all();
    }

    /**
     * @param $type
     * @return array
     */
    public static function get_custom_fields_by_type($type)
    {
        $custom_fields = CustomField::all()->where('type', '=', $type)->where('parent_id', 'is', null)->all();

        return $custom_fields;
    }

    /**
     * @param $key
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|null|object
     */
    public static function get_custom_field_by_key($key)
    {
        $custom_field = DB::table('custom_fields')->where(['key' => $key])->where(['status' => 1])->where(['released' => 1])->first();

        return $custom_field;
    }

    /**
     * @param $menu
     */
    public static function show_links_nestable($menu)
    {
        $items = json_decode($menu['items']);

        if (!$items) {
            echo '<ol class="dd-list"></ol>';
        } else {
            usort($items, function ($a, $b) {
                return ((array)$a)['serial'] > ((array)$b)['serial'];
            });

            echo '<ol class="dd-list">';
            foreach ($items as $key => $item) {
                $item = (array)$item;
                $category = Category::all()->find($item['category_id']);
                if ($category) {
                    echo '<li class="dd-item dd3-item" data-table="component" data-id="' . $item['category_id'] . '">';
                    echo '<div class="dd-handle dd3-handle"></div><div class="dd3-content">';
                    echo '<span class="text float-left" data-update="title">' . $category['title'] . '</span>';
                    echo '<a href="" class="show-item-details"><i class="fa fa-trash"></i></a>';
                    echo '<div class="clearfix"></div></div>';
                    echo '</li>';
                }
            }
            echo '</ol>';
        }
    }

    /**
     * @param $collection
     */
    public static function show_collection_nestable($collection)
    {
        $items = json_decode($collection['items']);

        $query = null;
        switch ($collection['table']) {
            case 'posts':
                $query = Post::all();
                break;
            case 'products':
                $query = Product::all();
                break;
            case 'classifieds':
                $query = Classified::all();
                break;
            default:
                break;
        }

        if (!$items) {
            echo '<ol class="dd-list"></ol>';
        } else {
            echo '<ol class="dd-list">';
            foreach ($items as $key => $item) {
                $item = $query->find($item);
                if ($item) {
                    echo '<li class="dd-item dd3-item" data-id="' . $item['id'] . '">';
                    echo '<div class="dd-handle dd3-handle"></div><div class="dd3-content">';
                    echo '<img src="' . $item['avatar'] . '" width="50" class="text float-left" data-update="title">';
                    echo '<span class="text float-left" data-update="title">' . $item['title'] . '</span>';
                    echo '<a href="" class="show-item-details"><i class="fa fa-trash"></i></a>';
                    echo '<div class="clearfix"></div></div>';
                    echo '</li>';
                }
            }
            echo '</ol>';
        }
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public static function get_location_menus()
    {
        $location_menus = DB::table('location_menus')->where(['released' => 1])->get();

        return $location_menus;
    }

    /**
     * @param $key
     * @return array
     */
    public static function get_location_menu_by_key($key)
    {
        $location_menu = DB::table('location_menus')->where(['key' => $key])->where(['released' => 1])->first();

        $menu = Menu::all()->find($location_menu->menu_id)->first();

        $items = [];

        foreach (json_decode($menu->items, true) as $key => $value) {
            $items[] = DB::table('categories')->where('status', '=', 1)->where('id', '=', $value['category_id'])->first();
        }

        return $items;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|null|object
     */
    public static function get_logo()
    {
        $logo = DB::table('custom_fields')->where(['key' => 'logo'])->where(['status' => 1])->where(['released' => 1])->first();

        return $logo;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|null|object
     */
    public static function get_favicon()
    {
        $favicon = DB::table('custom_fields')->where(['key' => 'favicon'])->where(['status' => 1])->where(['released' => 1])->first();

        return $favicon;
    }

    /**
     * @return array|\Illuminate\Support\Collection
     */
    public static function get_sliders()
    {
        $section_slider = DB::table('custom_fields')->where(['key' => 'section-slider'])->where(['released' => 1])->first();

        $sliders = [];
        if ($section_slider) {
            $sliders = DB::table('custom_fields')->where(['parent_id' => $section_slider->id])->get();
        }

        return $sliders;
    }

    /**
     * @return array
     */
    public static function get_main_menu()
    {
        $location_menu = DB::table('location_menus')->where(['key' => 'main-menu'])->where(['released' => 1])->first();

        $menus = Menu::all()->find($location_menu['menus_id']);

        $items = [];

        foreach (json_decode($menus['items']) as $key => $value) {
            $items[] = DB::table('categories')->where('status', '=', 1)->where('id', '=', $value['category_id'])->first();
        }

        return $items;
    }

    /**
     * @return array
     */
    public static function get_home_page_section()
    {
        $home_page_section = Db::table('custom_fields')->where(['key' => 'home-page-section'])->first();

        $selected = Db::table('custom_fields')->where(['parent_id' => $home_page_section->id])->get();

        $sections = [];

        foreach ($selected as $key => $value) {
            if ($value->value) {
                $sections[] = CustomField::all()->find($value->value);
            }
        }

        return $sections;
    }

    /**
     * Start function helper of post
     */

    /**
     * @param null $limit
     * @param null $display_homepage
     * @param null $featured
     * @return Post[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public static function get_posts($limit = null, $featured = null, $display_homepage = null)
    {
        $query = Post::all()
            ->where('status', '=', 1)
            ->where('featured', '=', $featured)
            ->where('display_homepage', '=', $display_homepage)
            ->take($limit);

        return $limit == 1 ? $query->first() : $query->all();
    }

    /**
     * @param null $category_id
     * @param null $limit
     * @param null $display_homepage
     * @param null $featured
     * @return Post[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public static function get_posts_by_category_id($category_id = null, $limit = null, $featured = null, $display_homepage = null)
    {
        $query = Post::all()
            ->where('status', '=', 1)
            ->where('category_id', $category_id ? '=' : 'is', $category_id ? $category_id : NULL)
            ->where('display_homepage', $display_homepage == null ? '>=' : '=', $display_homepage)
            ->where('featured', $featured == null ? '>=' : '=', $featured)
            ->take($limit);

        return $limit == 1 ? $query->first() : $query->all();
    }

    /**
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|null|object
     */
    public static function get_post_by_slug($slug)
    {
        $query = Post::all()->where('status', '=', 1)->where('slug', '=', $slug);

        return $query->first();
    }

    /**
     * @param $resource_id
     * @return mixed
     */
    public static function get_resource_by_id($resource_id)
    {
        $query = Resource::all()->where('id', '=', $resource_id);

        return $query->first();
    }

    /**
     * End function helper of post
     */

    /**
     * Start function helper of category
     */

    /**
     * @param null $limit
     * @param null $display_homepage
     * @param null $featured
     * @return Category[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public static function get_categories($limit = null, $display_homepage = null, $featured = null)
    {
        $query = Category::all()
            ->where('status', '=', 1)
            ->where('display_homepage', $display_homepage == null ? '>=' : '=', $display_homepage)
            ->where('featured', $featured == null ? '>=' : '=', $featured)
            ->take($limit);

        return $limit == 1 ? $query->first() : $query->all();
    }

    /**
     * @param null $parent_id
     * @param null $limit
     * @param null $display_homepage
     * @param null $featured
     * @return mixed
     */
    public static function get_categories_by_parent_id($parent_id = null, $limit = null, $display_homepage = null, $featured = null)
    {
        $query = Category::all()
            ->where('status', '=', 1)
            ->where('parent_id', $parent_id ? '=' : 'is', $parent_id ? $parent_id : NULL)
            ->where('display_homepage', $display_homepage == null ? '>=' : '=', $display_homepage)
            ->where('featured', $featured == null ? '>=' : '=', $featured)
            ->take($limit);

        return $limit == 1 ? $query->first() : $query->all();
    }

    /**
     * @param null $parent_slug
     * @param null $limit
     * @param int $display_homepage
     * @param int $featured
     * @return mixed
     */
    public static function get_categories_by_parent_slug($parent_slug = null, $limit = null, $featured = null, $display_homepage = null)
    {
        $category_parent = Category::all()
            ->where('status', '=', 1)
            ->where('slug', '=', $parent_slug)->first();

        return FunctionHelpers::get_categories_by_parent_id($category_parent->id, $limit, $featured, $display_homepage);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public static function get_category_by_slug($slug)
    {
        $query = Category::all()
            ->where('status', '=', 1)
            ->where('slug', '=', $slug);

        return $query->first();
    }

    /**
     * End function helper of category
     */

    /**
     * Start function helper of product
     */

    /**
     * @param null $limit
     * @param int $display_homepage
     * @param int $featured
     * @return Category[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public static function get_products($limit = null, $featured = 0, $display_homepage = 0)
    {
        $query = Product::all()
            ->where('status', '=', 1)
            ->where('display_homepage', $display_homepage == null ? '>=' : '=', $display_homepage)
            ->where('featured', $featured == null ? '>=' : '=', $featured)
            ->take($limit);

        return $limit == 1 ? $query->first() : $query;
    }

    /**
     * @param null $category_id
     * @param null $limit
     * @param null $featured
     * @param null $display_homepage
     * @return array|mixed
     */
    public static function get_products_by_category_id($category_id = null, $limit = null, $featured = null, $display_homepage = null)
    {
        $query = Product::all()
            ->where('status', '=', 1)
            ->where('category_id', $category_id ? '=' : 'is', $category_id ? $category_id : NULL)
            ->where('display_homepage', $display_homepage == null ? '>=' : '=', $display_homepage)
            ->where('featured', $featured == null ? '>=' : '=', $featured)
            ->take($limit);

        return $limit == 1 ? $query->first() : $query->all();
    }

    /**
     * @param null $parent_slug
     * @param null $limit
     * @param int $display_homepage
     * @param int $featured
     * @return mixed
     */
    public static function get_products_by_parent_slug($parent_slug = null, $limit = null, $display_homepage = 0, $featured = 0)
    {
        $category_parent = Product::all()
            ->where('status', '=', 1)
            ->where('slug', '=', $parent_slug)->first();

        return FunctionHelpers::get_products_by_parent_id($category_parent->id, $limit, $featured, $display_homepage);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public static function get_product_by_slug($slug)
    {
        $query = Product::all()
            ->where('status', '=', 1)
            ->where('slug', '=', $slug);

        return $query->first();
    }

    public static function get_product_by_id($id)
    {
        $query = Product::all()
            ->where('status', '=', 1)
            ->where('id', '=', $id);

        return $query->first();
    }

    /**
     * End function helper of product
     */

    /**
     * Start function helper of classified
     */

    /**
     * @param null $limit
     * @param int $display_homepage
     * @param int $featured
     * @return Category[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public static function get_classifieds($limit = null, $featured = null, $display_homepage = null)
    {
        $query = Classified::all()
            ->where('status', '=', 1)
            ->where('display_homepage', $display_homepage == null ? '>=' : '=', $display_homepage)
            ->where('featured', $featured == null ? '>=' : '=', $featured)
            ->take($limit);

        return $limit == 1 ? $query->first() : $query;
    }

    /**
     * @param null $parent_id
     * @param null $limit
     * @param int $display_homepage
     * @param int $featured
     * @return mixed
     */
    public static function get_classifieds_by_parent_id($parent_id = null, $limit = null, $featured = null, $display_homepage = null)
    {
        $query = Classified::all()
            ->where('status', '=', 1)
            ->where('parent_id', $parent_id ? '=' : 'is', $parent_id ? $parent_id : NULL)
            ->where('display_homepage', $display_homepage == null ? '>=' : '=', $display_homepage)
            ->where('featured', $featured == null ? '>=' : '=', $featured)
            ->take($limit);

        return $limit == 1 ? $query->first() : $query->all();
    }

    /**
     * @param null $parent_slug
     * @param null $limit
     * @param int $display_homepage
     * @param int $featured
     * @return mixed
     */
    public static function get_classifieds_by_parent_slug($parent_slug = null, $limit = null, $featured = null, $display_homepage = null)
    {
        $category_parent = Classified::all()
            ->where('status', '=', 1)
            ->where('slug', '=', $parent_slug)->first();

        return FunctionHelpers::get_classifieds_by_parent_id($category_parent->id, $limit, $featured, $display_homepage);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public static function get_classified_by_slug($slug)
    {
        $query = Classified::all()
            ->where('status', '=', 1)
            ->where('slug', '=', $slug);

        return $query->first();
    }

    /**
     * End function helper of classified
     */

    /**
     * Start function helper of collection
     */

    /**
     * @param $id
     * @return mixed
     */
    public static function get_collection_by_id($id)
    {
        $collection = Collection::all()->find($id)->first()->toArray();

        $items = json_decode($collection['items']);

        $collection['items'] = [];
        foreach ($items as $key => $item) {
            $query = null;
            switch ($collection['table']) {
                case 'posts':
                    $query = Post::all();
                    break;
                case 'products':
                    $query = Product::all();
                    break;
                case 'classifieds':
                    $query = Classified::all();
                    break;
                default:
                    break;
            }

            $collection['items'][] = $query->find($item)->first();
        }

        return $collection;
    }

    /**
     * End function helper of collection
     */
}
