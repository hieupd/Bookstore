<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bt_category;
use App\bt_book;
use App\bt_type;
use PHPUnit\Util\Type;

require "simple_html_dom.php";


class CrawlController extends Controller
{
    public function CrawlCate()
    {
        $this->getCate();
        $this->getType();
        return redirect()->back()->with('Thongbao','Cập nhập dữ liệu thành công !');
    }
    public function Crawlallbook()
    {
        $listtype = bt_type::all();
        foreach ($listtype as $item)
        {
            $this->getBook($item->type_id);
        }
        return redirect()->back()->with('Thongbao','Cập nhập sách thành công !');
    }
    public function getCate()
    {
        set_time_limit(1000);
        $html = file_get_html("https://www.vinabook.com");
        $menu = $html->find('li.level-0');
        for ($i = 5; $i < count($menu); $i++) {
            $category_name = $menu[$i]->find('a', 0)->title;
            $tmp = bt_category::where('category_name',$category_name)->first();
            if($tmp == null) {
                $category = new bt_category();
                $category->category_name = $category_name;
                $link = $menu[$i]->find('a', 0)->href;
                $str = "https://www.vinabook.com";
                if (strpos($link, $str) === false) {
                    $link = $str . $link;
                }
                $category->category_link = $link;
                $category->save();
            }
        }
    }

    public function getType()
    {
        set_time_limit(1000);
        $category = bt_category::all();
        foreach ($category as $cate) {
            $html2 = file_get_html("$cate->category_link");
            $menu2 = $html2->find('div.box-widget-categories ul li a');
            foreach ($menu2 as $item2) {
                $type_name = $item2->title;
                $tmp = bt_type::where('type_name',$type_name)->first();
                if($tmp != null) {
                    $type_link = $item2->href;
                    $type = new bt_type();
                    $type->type_name = $type_name;
                    $type->category_id = $cate->category_id;
                    $type->type_link = $type_link;
                    $type->save();
                }
            }
        }
    }

    public function getBook($Typeid)
    {
        set_time_limit(10000);
        $type = bt_type::where('type_id',$Typeid)->first();
        $html3 = file_get_html("$type->type_link");
        $product = $html3->find('div.product_thumb a');
        foreach ($product as $p) {
            $product_link = $p->href;
            $html4 = file_get_html("$product_link");
            $product_i = $html4->find('div.product-feature ul li ');
            $product_size = "";
            $product_language = "";
            $product_page = "";
            $product_quanlity = "";
            $product_yearpublish = "";
            foreach ($product_i as $item) {
                $spinfo = $item->plaintext;
                $strss = "Kích thước:";
                if (strpos($spinfo, $strss) > 0) {

                    $spinfo = str_replace($strss, '', $spinfo);
                    $spinfo = str_replace('cm', '', $spinfo);
                    $product_size = $spinfo;

                }

                $strss = "Số trang:";

                if (strpos($spinfo, $strss) > 0) {

                    $spinfo = str_replace($strss, '', $spinfo);
                    $product_page = $spinfo;

                }

                $strss = "Ngày phát hành:";

                if (strpos($spinfo, $strss) > 0) {

                    $spinfo = str_replace($strss, '', $spinfo);
                    $product_yearpublish = $spinfo;

                }

                $strss = "Định dạng:";

                if (strpos($spinfo, $strss) > 0) {

                    $spinfo = str_replace($strss, '', $spinfo);
                    $product_quanlity = $spinfo;

                }
                $strss = "Ngôn ngữ:";

                if (strpos($spinfo, $strss) > 0) {

                    $spinfo = str_replace($strss, '', $spinfo);
                    $product_language = $spinfo;

                }
            }
            $product_detail = $html4->find('div.product-main-info');
            foreach ($product_detail as $pd) {
                try {
                    $product_name = $pd->find('div.product-info h1', 0)->plaintext;
                    $product_author = $pd->find('div.product-author-share a.author', 0)->plaintext;
                    $product_publish = $pd->find('div.product-author-share span.publishers', 0)->plaintext;
                    $product_dsc = $pd->find('div.introduction-contents div.mainbox2-body', 0)->plaintext;
                    $product_dsc = trim(str_replace('Xem thêm','',$product_dsc));
                    $product_provider = $pd->find('div.product-author-share a.publishers', 0)->plaintext;
                    $product_price = $pd->find('div.product-prices span.strike', 0)->plaintext;
                    $product_price = str_replace('₫', '', $product_price);
                    $product_price = str_replace('.', '', $product_price);
                    $product_price = str_replace('&nbsp;', '', $product_price);
                    $product_sale = $pd->find('div.product-prices span.price-num', 0)->plaintext;
                    $product_sale = str_replace('.', '', $product_sale);
                    $product_image = $pd->find('div.bk-cover img', 0)->src;
//                    $img = 'upload/book_image/' . basename($product_image);
//                    file_put_contents($img, file_get_contents($product_image));
                } catch (\Exception $e) {
                }
            }
            $tmp = bt_book::where('book_name',$product_name)->first();
            if($tmp == null) {
                $book = new bt_book();
                $book->book_name = $product_name;
                $book->book_author = $product_author;
                $book->book_publish = $product_publish;
                $book->book_dsc = $product_dsc;
                $book->book_provider = $product_provider;
                $book->book_price = $product_price;
                $img = 'upload/book_image/' . basename($product_image);
                file_put_contents($img, file_get_contents($product_image));
                $book->book_image = basename($product_image);
                $sale = (((int)$product_price - (int)$product_sale) / (int)$product_price) * 100;
                $book->book_sale = round($sale);
                $book->book_status = 1;
                $book->category_id = $type->category_id;
                $book->type_id = $type->type_id;
                $book->book_quantity = 10;
                $book->book_translator = 'Đang cập nhật';
                $book->book_language = trim($product_language);
                $book->book_yearpublish = trim($product_yearpublish);
                $book->book_jackettype = trim($product_quanlity);
                $book->book_size = trim($product_size);
                $book->book_page = (int)$product_page;
                $book->save();
            }
        }
        return redirect()->back()->with('Thongbao','Cập nhập sách cho danh mục thành công !');
    }

    public function getT()
    {
        $html4 = file_get_html("https://www.vinabook.com/ban-hang-thoi-ky-thuat-so-p85375.html");
        $product_i = $html4->find('div.product-feature ul li ');
        $product_size = "";
        $product_language = "";
        $product_page = "";
        $product_quanlity = "";
        $product_yearpublish = "";
        foreach ($product_i as $item) {
            $spinfo = $item->plaintext;
            $strss = "Kích thước:";
            if (strpos($spinfo, $strss) > 0) {

                $spinfo = str_replace($strss, '', $spinfo);
                $spinfo = str_replace('cm', '', $spinfo);
                $product_size = $spinfo;
                echo $product_size;
            }

            $strss = "Số trang:";

            if (strpos($spinfo, $strss) > 0) {

                $spinfo = str_replace($strss, '', $spinfo);
                $product_page = $spinfo;
                echo $product_page;
            }

            $strss = "Ngày phát hành:";

            if (strpos($spinfo, $strss) > 0) {

                $spinfo = str_replace($strss, '', $spinfo);
                $product_yearpublish = $spinfo;
                echo $product_yearpublish;
            }

            $strss = "Định dạng:";

            if (strpos($spinfo, $strss) > 0) {

                $spinfo = str_replace($strss, '', $spinfo);
                $product_quanlity = $spinfo;
                echo $product_quanlity;
            }
            $spinfo = $item->plaintext;
            $strss = "Ngôn ngữ:";

            if (strpos($spinfo, $strss) > 0) {

                $spinfo = str_replace($strss, '', $spinfo);
                $product_language = $spinfo;
                echo $product_language;
            }
        }
    }
}
