<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\bt_rate;
use Auth;
use phpDocumentor\Reflection\Types\Array_;

class MLController extends Controller
{
    function Check($rating,$ratequantity,$x,$y ) // kiem tra xem rate da co trong mang hay chua
    {
            for ($j = 0; $j < $ratequantity; $j++) {
                if(($rating[$j]->member_id == $x) && ($rating[$j]->book_id == $y))
                {
                    return true;
                }
            }
        return false;
    }
    function GetVector(array $ratmatrix,$totalrate,$itemid) // lay vector
    {
        $vector =array();
        for ($i = 0 ; $i < $totalrate; $i++)
        {
            if($ratmatrix[$i][1] == $itemid)
            {
                $vector[$ratmatrix[$i][0]] = $ratmatrix[$i][2];
            }

        }
        return $vector;
    }
    function Cosin(array $a, array $b,$userquantity) // tinh cosin
    {
        $LengthOfVtora = 0;
        $LengthOfVtorb = 0;
        $Scalarofanb = 0;
        for ($i = 1 ; $i <= $userquantity; $i++ )
        {
            $LengthOfVtora += pow($a[$i],2);
            $LengthOfVtorb += pow($b[$i],2);
            $Scalarofanb += ($a[$i]*$b[$i]);
        }
        if($LengthOfVtora!=0 && $LengthOfVtorb!=0)
            $Cosin = $Scalarofanb/(sqrt($LengthOfVtora)*sqrt($LengthOfVtorb));
        return $Cosin;
    }
    public function ratematrix($rating)
    {
        $ratmatrix = array();
        foreach ($rating as $rt)
        {
            $subarr = array($rt->member_id,$rt->book_id,$rt->book_rating);
            $ratmatrix[] = $subarr;
        }
        return $ratmatrix;
    }
    public function avgrating($ratequantity,$rating,$Litem,$itemquantity)
    {
        $avgrating = array();
        for($i = 0 ; $i < $itemquantity; $i++)
        {
            $d = 0;
            $totalrating = 0;
            for($j = 0;$j < $ratequantity;$j++)
            {
                if($rating[$j]->book_id == $Litem[$i]->book_id)
                {
                    $d++;
                    $totalrating += $rating[$j]->book_rating;
                }
            }
            $avgrating[$Litem[$i]->book_id] = ($totalrating/$d);
        }
        return $avgrating;
    }
//    public function Normaliziedmatrix( $avgrating,$ratequantity,$ratmatrix)
//    {
//        foreach ($avgrating as $key=>$val)
//        {
//            for($i = 0;$i < $ratequantity;$i++) {
//                if($ratmatrix[$i][1] == $key)
//                {
//                    (float)$ratmatrix[$i][2] = (float)($ratmatrix[$i][2]) - (float)$val;
//                }
//            }
//        }
//
//    }
    public function Similarmatrix($itemquantity,$Litem,$itemid,$ratmatrix,$totalrate,$userquantity)
    {
        $Vectorofitemid = $this->GetVector($ratmatrix,$totalrate,$itemid);
        ksort($Vectorofitemid);
        $Arrofsimilarity = array();
        for ($i = 0;$i < $itemquantity;$i++)
        {
            if($Litem[$i]->book_id != $itemid)
            {
                $Vectorofitemcompared = $this->GetVector($ratmatrix,$totalrate,$Litem[$i]->book_id);
                ksort($Vectorofitemcompared);
                $Arrofsimilarity[$Litem[$i]->book_id] = $this->Cosin($Vectorofitemid,$Vectorofitemcompared,$userquantity);
            }
        }
        return $Arrofsimilarity;
    }
    public function arritemnaverage($rating,$userid,$totalrate,$ratmatrix)
    {
        $arritem = array();
        foreach ($rating as $rate)
        {
            if($userid == $rate->member_id)
                $arritem[] =  $rate->book_id;
        }
        $arritemnavgrate = array();
        for($i = 0;$i < $totalrate;$i++)
        {
            foreach ($arritem as $item)
            {
                if(($ratmatrix[$i][1] == $item) && ($ratmatrix[$i][0] == $userid))
                {
                    $arritemnavgrate[$ratmatrix[$i][1]] = $ratmatrix[$i][2];
                }
            }

        }
        return $arritemnavgrate;
    }
    public function Recommend($itemquantity,$Litem,$itemid,$ratmatrix,$totalrate,$userquantity,$rating,$userid)
    {
        $Arrofsimilarity = $this->Similarmatrix($itemquantity,$Litem,$itemid,$ratmatrix,$totalrate,$userquantity);//ma trận tương đồng giữ item id;
        $arritemnavgrate = $this->arritemnaverage($rating,$userid,$totalrate,$ratmatrix);

        $x = 0;
        $y = 0;
        foreach ($arritemnavgrate as $key=>$val)
        {
            foreach ($Arrofsimilarity as $keysimilar=>$valsimilar)
            {
                if(($key == $keysimilar)&&($valsimilar >= 0))
                {

                    $x = $x+($valsimilar*$val);
                    $y = $y+abs($val);
                    break;
                }
            }
        }
        if($y > 0)
            $predictcommend = $x/$y;
        else
            $predictcommend = 0;
        if($predictcommend >= 0 )
            return true;
        return false;
    }
    public function recomemded($userid)
    {
        $rating = bt_rate::all();
        $Luser = bt_rate::select('member_id')->groupby('member_id')->get();
        $Litem = bt_rate::select('book_id')->groupby('book_id')->get();
        $ratequantity = $rating->count();
        $itemquantity = $Litem->count();
        $userquantity = $Luser->count();
        $totalrate =$itemquantity*$userquantity;
        $ratmatrix = $this->ratematrix($rating);
        $avgrating = $this->avgrating($ratequantity,$rating,$Litem,$itemquantity);
        foreach ($avgrating as $key=>$val)
        {
            for($i = 0;$i < $ratequantity;$i++) {
                if($ratmatrix[$i][1] == $key)
                {
                    (float)$ratmatrix[$i][2] = (float)($ratmatrix[$i][2]) - (float)$val;
                }
            }
        }
        $arrtmp = array();
        for ($j = 0 ; $j < $userquantity; $j++)
        {
            for ($i = 0 ; $i < $itemquantity; $i++)
            {
                $sub = array($Luser[$j]->member_id,$Litem[$i]->book_id);
                $arrtmp[]=$sub;
            }
        }
        for($i = 0 ; $i < $totalrate; $i++) {

            if(!$this->Check($rating,$ratequantity,$arrtmp[$i][0],$arrtmp[$i][1]))
            {
                $subarrtmp = array($arrtmp[$i][0],$arrtmp[$i][1],0);
                $ratmatrix[] = $subarrtmp;
            }
        }
        $arrRecommended = array();
        for($i = 0 ; $i < $totalrate;$i++)
        {
            if(($userid == $ratmatrix[$i][0])&&($ratmatrix[$i][2]==0))
            {
                if($this->Recommend($itemquantity,$Litem,$ratmatrix[$i][1],$ratmatrix,$totalrate,$userquantity,$rating,$userid))
                {
                    $arrRecommended[] = $ratmatrix[$i][1];
                }
            }
        }
        return $arrRecommended;

    }
}
