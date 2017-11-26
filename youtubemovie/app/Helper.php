<?php

namespace App;

use App\Video;

class Helper {
	public static function getCatagory($id)
	{
		if ($id == 1) {
			return "Bangla";
		} elseif ($id == 2) {
			return "Hindi";
		} elseif ($id == 3) {
			return "English";
		} elseif ($id == 4) {
			return "Tamil";
		} elseif ($id == 5) {
			return "Telugu";
		} else {
			return "No Catagory";
		}
	}

	public static function getNumberCatagory($slug)
	{
		if ($slug == 'bangla') {
			return 1;
		} elseif ($slug == 'hindi') {
			return 2;
		} elseif ($slug == 'english') {
			return 3;
		} elseif ($slug == 'tamil') {
			return 4;
		} elseif ($slug == 'telugu') {
			return 5;
		} else {
			return "No Catagory";
		}
	}

	public static function getRate($id)
	{
		$sum = Rate::where('video_id', $id)->sum('rate');
		$count = Rate::where('video_id', $id)->count('rate');

		if ($sum == 0) {
			return 0;
		} else {
			$rate = ($sum / $count);
			return number_format($rate, 1, '.', ',');
		}

	}

	public static function getVideoCount($id)
	{
		$count = Video::where('catagory', $id)->count('catagory');
		return $count;
	}
}