<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    /*
     * 誕生日一覧
     */
    public function getIndex()
    {

        // データを取得
        /** @noinspection PhpUndefinedMethodInspection */
        $actors = Actor::orderBy('birth_year', 'asc')->get();

        // 仮の配列を作成
        $tmpData = [];
        for ($i = 0; $i <= 12; $i++) {
            $tmpData[$i] = '';
        }

        // 取得したデータを表示用の配列に整形
        $birthData = [];
        foreach ($actors as $actor) {
            $birthData[$actor->birth_year] = $tmpData;
            $birthData[$actor->birth_year][$actor->birth_month] .= $actor->name;
        }

        return view('birthday', compact('birthData'));
    }
}
