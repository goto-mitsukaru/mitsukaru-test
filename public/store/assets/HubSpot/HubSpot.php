<?php
echo ('inc_test');
require(__DIR__ . '/vendor/autoload.php');
// $tm = __DIR__ . '/vendor/autoload.php';
// var_dump($tm);
use HubSpot\Factory;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInputForCreate as ContactsSimplePublicObjectInputForCreate;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput as ContactsSimplePublicObjectInput;
use HubSpot\Client\Crm\Contacts\ApiException as ContactsApiException;

// var_dump($_ENV);
// var_dump($_SERVER);
// phpinfo();
class HubSpot {
	private $env_value;
    public function __construct() {
        $this->loadEnv();
    }
    private function loadEnv() {
        $envFilePath = __DIR__ . '/.env';
        if (file_exists($envFilePath)) {
            // ファイルを読み込んでトリムしてプロパティに設定
            list($key, $this->env_value) = explode('=', trim(file_get_contents($envFilePath)), 2);
        } else {
            echo '.env ファイルが見つかりません。';
        }
    }
	private function export_log($array) {
		$log_dir = __DIR__ . '/log/';
		$log = $log_dir . date('Ymd') . '.txt';

		$log_record = "\n" . '[export_log] ' . date('Y-m-d H:i:s') . "\n";

		error_log($log_record, 3, $log);
		error_log(var_export($array, true), 3, $log);
	}
	function post($data = []) {
		if (empty($data)) {
			$empty = [
				'success' => false,
				'result' => [
					'msg' => '[error]登録: no data',
				],
			];
			$this->export_log($empty);
			return $empty;
		}
		$names = [
			'state',
			'vvzz3',
			'n224135',
			'lastname',
			'firstname',
			'email',
			'phone'
		];

		foreach ($names as $index => $name) {
			if (!isset($data[$name])) {
				$unidentified = [
					'success' => false,
					'result' => [
						'msg' => '[error]登録: unidentified ["' . $name . '"]',
					],
				];
				$this->export_log($unidentified);
				return $unidentified;
			} elseif (empty($data[$name])) {
				// HubSpotコンタクトのキー'email'が空の場合はエラー
				if ($name == 'email') {
					$empty = [
						'success' => false,
						'result' => [
							'msg' => '[error]登録: empty ["' . $name . '"]',
						],
					];
					$this->export_log($empty);
					return $empty;
				} else {
					unset($data[$name]);
				}
			}
		}
		// プロパティ：コンテンツ接触履歴（内部値：contents_history）
		// ラベル：年収診断（内部値：年収診断）
		$data['contents_history'] = '年収診断';

		// プロパティ：初回接触コンテンツ（内部値：first_contact）
		// ラベル：年収診断（内部値：年収診断）
		$data['first_contact'] = '年収診断';

		// プロパティ：リードソース（内部値：n4456）
		// ラベル：【toC】問い合わせ（内部値：問い合わせ）
		$data['n4456'] = '問い合わせ';

		// コンタクト登録
		$contact_result = $this->postContact($data);
		if ($contact_result['success']) {
			// 登録成功
			$post_result = [
				'success' => true,
				'result' => [
					'msg' => '[success]POST',
					'contact_result' => $contact_result,
					'post_data' => $data,
				],
			];
			$this->export_log($post_result);
			return $post_result;
		} else {
			$this->export_log($contact_result);
			return $contact_result;
		}
	}
	function skillPost($data = []) {
         echo('skillPost_test');
		if (empty($data)) {
			$empty = [
				'success' => false,
				'result' => [
					'msg' => '[error]登録: no data',
				],
			];
			$this->export_log($empty);
			return $empty;
		}
		$names = [
			'lastname',
			'firstname',
			'vvzz3',
			'state',
			'email',
			'phone'
		];

		foreach ($names as $index => $name) {
			if (!isset($data[$name])) {
				$unidentified = [
					'success' => false,
					'result' => [
						'msg' => '[error]登録: unidentified ["' . $name . '"]',
					],
				];
				$this->export_log($unidentified);
				return $unidentified;
			} elseif (empty($data[$name])) {
				// HubSpotコンタクトのキー'email'が空の場合はエラー
				if ($name == 'email') {
					$empty = [
						'success' => false,
						'result' => [
							'msg' => '[error]登録: empty ["' . $name . '"]',
						],
					];
					$this->export_log($empty);
					return $empty;
				} else {
					unset($data[$name]);
				}
			}
		}

		if(isset($data['specific_frag'])){
			if($data['specific_frag'] == 'ver2'){
				// プロパティ：コンテンツ接触履歴（内部値：contents_history）
				// ラベル：診療スキル診断ver2（内部値：診療スキル診断ver2）
				$data['contents_history'] = '診療スキル診断ver2';
				unset($data['specific_frag']);
				echo'testA';

				// プロパティ：初回接触コンテンツ（内部値：first_contact）
				// ラベル：診療スキル診断ver2（内部値：診療スキル診断ver2）
				$data['first_contact'] = '診療スキル診断ver2';
			}
		} else {
			// プロパティ：コンテンツ接触履歴（内部値：contents_history）
			// ラベル：診療スキル診断ver1（内部値：診療スキル診断ver1）
			$data['contents_history'] = '診療スキル診断ver1';
			unset($data['specific_frag']);
			echo'testB';

			// プロパティ：初回接触コンテンツ（内部値：first_contact）
			// ラベル：診療スキル診断ver1（内部値：診療スキル診断）
			$data['first_contact'] = '診療スキル診断';
		}
		var_dump($data);



		// プロパティ：リードソース（内部値：n4456）
		// ラベル：【toC】問い合わせ（内部値：問い合わせ）
		$data['n4456'] = '問い合わせ';

		// コンタクト登録
		$contact_result = $this->postContact($data);
		if ($contact_result['success']) {
			// 登録成功
			$post_result = [
				'success' => true,
				'result' => [
					'msg' => '[success]POST',
					'contact_result' => $contact_result,
					'post_data' => $data,
				],
			];
			$this->export_log($post_result);
			return $post_result;
		} else {
			$this->export_log($contact_result);
			return $contact_result;
		}
	}

	// ############################################################################################
	// Starting November 30, 2022, API keys will be sunset as an authentication method. Learn more about this change: https://developers.hubspot.com/changelog/upcoming-api-key-sunset and how to migrate an API key integration: https://developers.hubspot.com/docs/api/migrate-an-api-key-integration-to-a-private-app to use a private app instead.

	// コンタクト登録
	private function postContact($data = []) {
		// $client = Factory::createWithAccessToken(getenv('HubspotAPIToken'));
		$client = Factory::createWithAccessToken($this->env_value);

		$simplePublicObjectInputForCreate = new ContactsSimplePublicObjectInputForCreate([
			'properties' => $data,
		]);

		// Request
		try {
			$apiResponse = $client->crm()->contacts()->basicApi()->create($simplePublicObjectInputForCreate);
			$msg = '[success]コンタクト登録: ' . $apiResponse['id'];
			$result = [
				'success' => true,
				'result' => [
					'id' => $apiResponse['id'],
					'msg' => $msg,
				],
			];
			// $this->export_log($result);
			return $result;
		} catch (ContactsApiException $e) {
			if ($e->getCode() == '409') { // Email重複時
				$pattern = '/Contact already exists\. Existing ID: (\d+)/';
				preg_match($pattern, $e->getMessage(), $matches);
				$contact_id = '';
				if (isset($matches[1])) {
					$contact_id = $matches[1];
				}
				// 既存のコンタクトを更新
				$result = $this->updateContact($contact_id, $data);
				return $result;
			} else {
				$msg = '[error]コンタクト登録: ';
				$result = [
					'success' => false,
					'result' => [
						'id' => '',
						'msg' => $msg . $e->getMessage(),
						'error' => $e,
					],
				];
				$this->export_log($result);
				return $result;
			}
		}
	}
	private function updateContact($contactId, $data) {
		// $client = Factory::createWithAccessToken(getenv('HubspotAPIToken'));
		$client = Factory::createWithAccessToken($this->env_value);
		$simplePublicObjectInput = new ContactsSimplePublicObjectInput([
			'properties' => $data,
		]);
		try {
			$apiResponse = $client->crm()->contacts()->basicApi()->update($contactId, $simplePublicObjectInput);
			$msg = '[success]コンタクト更新成功: ' . $apiResponse['id'];
			$result = [
				'success' => true,
				'result' => [
					'id' => $apiResponse['id'],
					'msg' => $msg,
				],
			];
			return $result;
		} catch (ContactsApiException $e) {
			$msg = '[error]コンタクト更新失敗: ';
			$result = [
				'success' => false,
				'result' => [
					'id' => '',
					'msg' => $msg . $e->getMessage(),
					'error' => $e,
				],
			];
			$this->export_log($result);
			return $result;
		}
	}
}
