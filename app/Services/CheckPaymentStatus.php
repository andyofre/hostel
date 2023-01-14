<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CheckPaymentStatus{


    public static function get($code, $session)
	{



		$re = file_get_contents('https://myunical.edu.ng/verifyfee/GetSchoolFee.ashx?pin=' . $code.'');

		$res = json_decode($re, true);


		if (isset($res['status']) && $res['status'] == 'success') {
			$name = $res['data']['fullname'];
			$regNumber = $res['data']['mat_no'];
			$faculty = $res['data']['faculty'];
			$department = $res['data']['department'];
			$level = $res['data']['level'];
			$session = $res['data']['session'];

			$data = [
				'name' => $name,
				'registeration_number' => $regNumber,
				'session' => $session,
				'payment_code' => $code,
				'faculty' => $faculty,
				'department' => $department,
				'level' => $level,
			];
		} else {
			$data = null;
		}



		return $data;
	}
}